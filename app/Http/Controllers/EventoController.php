<?php

namespace App\Http\Controllers;

use App\Events\EventEmail;
use App\Models\Evento;
use App\Models\Paquete;
use App\Models\Registro;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Storage;

class EventoController extends Controller
{
    public function index()
    {
        // Verificar si el usuario es administrador
        if (auth()->user()->tipo === 'administrador'|| auth()->user()->tipo === 'empleado') {
            // Obtener todos los eventos con sus relaciones cargadas
            $eventos = Evento::all();
        } else {
            // Obtener los eventos del usuario actual con sus relaciones cargadas
            $eventos = auth()->user()->eventos;
        }

        if(request()->expectsJson()){
            return response()->json($eventos);
        }else{
            // Retorna la vista con los eventos
            return view('eventos.index', compact('eventos'));
        }

    }



    public function create()
    {
        $grupos_paquetes = Paquete::all();

        $servicios = Servicio::all();

        $this->authorize('create', Evento::class);

        return view('eventos.create', compact('grupos_paquetes', 'servicios'));
    }

    public function store(Request $request)
    {
        // Validar los campos del formulario si es necesario
        $request->validate([
            'nombre' => 'required',
            'fecha' => 'required|date',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'numero_invitados' => 'required|integer',
            'servicios' => 'required|array',
            'grupopaquete_id' => 'required',
        ]);

        // Obtener el precio del paquete seleccionado
        $paquete = Paquete::find($request->grupopaquete_id);
        $precioPaquete = $paquete->precio;

        // Obtener los precios de los servicios seleccionados
        $serviciosSeleccionados = $request->input('servicios');
        $precioServicios = Servicio::whereIn('id', $serviciosSeleccionados)->sum('precio');

        // Calcular el precio total sumando el precio del paquete y los servicios
        $precioTotal = $precioPaquete + $precioServicios;

        //guardar imagen
        $archivos = $request->file('imagen');
        $urls = [];

        if ($archivos) {
            foreach ($archivos as $archivo) {
                $nombreArchivo = $archivo->getClientOriginalName();
                $r = Storage::disk('publico')->putFileAs('fotos', $archivo, $nombreArchivo);
                $urls[] = $r;
            }
        }

        $imagenesCadena = implode(',', $urls);

        // Crear una nueva instancia de Evento y asignar los valores del formulario
        $evento = new Evento();
        $evento->nombre = $request->nombre;
        $evento->fecha = $request->fecha;
        $evento->hora_inicio = $request->hora_inicio;
        $evento->hora_fin = $request->hora_fin;
        $evento->numero_invitados = $request->numero_invitados;
        $evento->precio_total = $precioTotal;
        $evento->grupopaquete_id = $request->grupopaquete_id;
        $evento->imagen = $imagenesCadena;
        $evento->estado = 'No confirmado'; // Estado inicial

        // Obtener el registro_id del usuario autenticado
        $evento->registro_id = auth()->user()->id;

        // Guardar el evento en la base de datos
        Event::dispatch(new EventEmail($evento->nombre));
        $evento->save();

        // Guardar los servicios asociados al evento
        $evento->servicios()->sync($request->servicios);

        // Redireccionar o realizar alguna acción adicional
        return redirect()->route('eventos.index')->with('success', 'El evento se ha creado correctamente.');
    }

    public function edit($id)
    {
        // Buscar el evento por su ID
        $evento = Evento::find($id);

        // Obtener todos los paquetes con sus servicios relacionados cargados
        $grupos_paquetes = Paquete::all();
        $servicios = Servicio::all();

         // Verificar si el estado del evento es "validando" y si el usuario es un cliente
    if ($evento->estado === 'Validando' && auth()->user()->tipo === 'cliente') {
        // Redirigir a una página de error o mostrar un mensaje de error
        return redirect()->back()->with('error', 'No tienes permiso para editar este evento.');
    }

        // Retorna la vista de edición con el evento y los paquetes
        return view('eventos.edit', compact('evento', 'grupos_paquetes', 'servicios'));
    }

    public function update(Request $request, $id)
    {
        // Validar los campos del formulario si es necesario
        $request->validate([
            'nombre' => 'required',
            'fecha' => 'required|date',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'numero_invitados' => 'required|integer',
            'servicios' => 'required|array',
            'grupopaquete_id' => 'required',
            'estado' => 'required|in:Agendado,Rechazado,No confirmado,Validando,Completado',

        ]);

        // Obtener el evento por su ID
        $evento = Evento::find($id);



        // Obtener el precio del paquete seleccionado
        $paquete = Paquete::find($request->grupopaquete_id);
        $precioPaquete = $paquete->precio;

        // Obtener los precios de los servicios seleccionados
        $serviciosSeleccionados = $request->input('servicios');
        $precioServicios = Servicio::whereIn('id', $serviciosSeleccionados)->sum('precio');

        // Calcular el precio total sumando el precio del paquete y los servicios
        $precioTotal = $precioPaquete + $precioServicios;

        // Actualizar los valores del evento con los valores del formulario
        $evento->nombre = $request->nombre;
        $evento->fecha = $request->fecha;
        $evento->hora_inicio = $request->hora_inicio;
        $evento->hora_fin = $request->hora_fin;
        $evento->numero_invitados = $request->numero_invitados;
        $evento->precio_total = $precioTotal;
        $evento->grupopaquete_id = $request->grupopaquete_id;
        $evento->estado = $request->estado;

        // Guardar las nuevas imágenes si se seleccionaron y no existen previamente
        $archivos = $request->file('imagen');
        $urls = [];

        if ($archivos) {
            foreach ($archivos as $archivo) {
                $nombreArchivo = $archivo->getClientOriginalName();
                $r = Storage::disk('publico')->putFileAs('fotos', $archivo, $nombreArchivo);

                // Verificar si la imagen ya existe en la lista de imágenes actuales
                if (!in_array($r, explode(',', $evento->imagen))) {
                    $urls[] = $r;
                }
            }
        }

        // Verificar si hay nuevas imágenes antes de realizar la concatenación
        if (!empty($urls)) {
            // Concatenar las nuevas imágenes con las imágenes existentes
            $imagenesActuales = explode(',', $evento->imagen);
            $nuevasImagenes = implode(',', $urls);
            $imagenesCadena = implode(',', array_merge($imagenesActuales, $urls));

            // Actualizar la propiedad 'imagen' del evento con las nuevas imágenes
            $evento->imagen = $imagenesCadena;
        }

        // Guardar los cambios en la base de datos
        $evento->save();

        // Actualizar los servicios asociados al evento
        $evento->servicios()->sync($request->servicios);

        // Redireccionar o realizar alguna acción adicional
        return redirect()->route('eventos.index')->with('success', 'El evento se ha actualizado correctamente.');
    }

    public function destroy($id)
    {
        // Buscar el evento por su ID
        $evento = Evento::find($id);

        // Verificar si el estado del evento es "validando"
        if ($evento->estado === 'Validando' || $evento->estado === 'Agendado') {
            return redirect()->route('eventos.index')->with('error', 'No se puede eliminar el evento en estado "validando" o "agendado".');
        }

        // Desvincular los servicios asociados al evento
        $evento->servicios()->detach();

        // Eliminar la imagen
        $r = Storage::disk('publico')->delete($evento->imagen);

        // Eliminar el evento de la base de datos
        $evento->delete();

        $r = Storage::disk('publico')->delete($evento->imagen);
        // Redireccionar o realizar alguna acción adicional
        return redirect()->route('eventos.index')->with('success', 'El evento ha sido eliminado correctamente.');
    }
    public function vistaAbonar($id)
    {
        // Buscar el evento por su ID
        $evento = Evento::find($id);

        $this->authorize('vistaAbonar', $evento);

        // Pasar el evento a la vista
        return view('eventos.vistaAbonar', compact('evento'));
    }

    public function abonar(Request $request, $id)
    {
        // Buscar el evento por su ID
        $evento = Evento::find($id);

        $this->authorize('abonar', $evento);

        // Obtener la cantidad abonada del formulario
        $abonoRealizado = $request->input('abono');

        // Realizar la lógica de abonar (restar la cantidad abonada a la cantidad actual)
        // Puedes implementar la lógica específica según tus requerimientos

        // Actualizar la cantidad total del evento con el abono realizado
        $evento->precio_total -= $abonoRealizado;

        // Guardar los cambios en la base de datos
        $evento->save();

        // Redireccionar o realizar alguna acción adicional
        return redirect()->route('eventos.index')->with('success', 'Se ha realizado el abono correctamente.');
    }




public function vistaCargosExtras($id)
    {
        // Buscar el evento por su ID
        $evento = Evento::find($id);

        // Pasar el evento a la vista
        return view('eventos.vistaCargosExtras', compact('evento'));
    }

    public function cargosExtras(Request $request, $id)
    {
        // Buscar el evento por su ID
        $evento = Evento::find($id);

        $this->authorize('cargosExtras', $evento);
        // Obtener la cantidad abonada del formulario
        $cargoRealizado = $request->input('cargo');

        // Realizar la lógica de abonar (restar la cantidad abonada a la cantidad actual)
        // Puedes implementar la lógica específica según tus requerimientos

        // Actualizar la cantidad total del evento con el abono realizado
        $evento->precio_total += $cargoRealizado;

        // Guardar los cambios en la base de datos
        $evento->save();

        // Redireccionar o realizar alguna acción adicional
        return redirect()->route('eventos.index')->with('success', 'Se ha realizado el cargo extra correctamente.');
    }



}

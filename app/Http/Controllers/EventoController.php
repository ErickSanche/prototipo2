<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Paquete;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventoController extends Controller
{

    public function index()
    {
        // Obtiene todos los eventos con sus relaciones cargadas
        $eventos = Evento::all();

        // Retorna la vista con los eventos
        return view('eventos.index', compact('eventos'));


    }

    public function create()
    {
        // Obtiene todos los paquetes con sus servicios relacionados cargados
        $grupos_paquetes = Paquete::all();
        $servicios = Servicio::all();

        // Retorna la vista con los paquetes
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

        $archivo = $request->file('imagen');
        $nombreArchivo = 'Evento';

        $r = Storage::disk('publico')->putFileAs('',$archivo,$nombreArchivo);


        // Crear una nueva instancia de Evento y asignar los valores del formulario
            $evento = new Evento();
            $evento->fill($request->all());
            $evento->imagen=$r;
            $evento->nombre = $request->nombre;
            $evento->fecha = $request->fecha;
            $evento->hora_inicio = $request->hora_inicio;
            $evento->hora_fin = $request->hora_fin;
            $evento->numero_invitados = $request->numero_invitados;
            $evento->precio_total = $precioTotal;
            $evento->grupopaquete_id = $request->grupopaquete_id;

            // Establecer el estado como inactivo (0) si no se ha marcado el checkbox
            //$evento->estado = $request->estado ?? 0;



            // Guardar el evento en la base de datos
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

    // Desvincular los servicios asociados al evento
    $evento->servicios()->detach();

    // Eliminar el evento de la base de datos
    $evento->delete();

    $r = Storage::disk('publico')->unlink($evento->imagen);
    // Redireccionar o realizar alguna acción adicional
    return redirect()->route('eventos.index')->with('success', 'El evento ha sido eliminado correctamente.');
}


}

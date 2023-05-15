<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Paquete;
use App\Models\Servicio;
use Illuminate\Http\Request;

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
            'precio_total' => 'required|numeric',
            'servicios' => 'required|array',
            'grupopaquete_id' => 'required',
        ]);

        // Crear una nueva instancia de Evento y asignar los valores del formulario
        $evento = new Evento();
        $evento->nombre = $request->nombre;
        $evento->fecha = $request->fecha;
        $evento->hora_inicio = $request->hora_inicio;
        $evento->hora_fin = $request->hora_fin;
        $evento->numero_invitados = $request->numero_invitados;
        $evento->precio_total = $request->precio_total;
        $evento->grupopaquete_id = $request->grupopaquete_id;

        // Guardar el evento en la base de datos
        $evento->save();

        // Guardar los servicios asociados al evento
        $evento->servicios()->sync($request->servicios);

        // Redireccionar o realizar alguna acción adicional
        return redirect()->route('eventos.index')->with('success', 'El evento se ha creado correctamente.');
    }




    public function update(Request $request, $id)
    {
        $evento = Evento::find($id);

        // Obtener los datos del formulario de la solicitud
        $datosEvento = $request->only(['nombre', 'fecha', 'hora_inicio', 'hora_fin', 'numero_invitados']);

        // Actualizar los datos del evento
        $evento->fill($datosEvento);

        // Desvincular todos los servicios que estén relacionados con el evento
        $evento->servicios()->detach();

        // Volver a vincular los servicios que el usuario haya seleccionado en el formulario
        $serviciosSeleccionados = $request->input('servicios_id');
        if (!empty($serviciosSeleccionados)) {
            $evento->servicios()->attach($serviciosSeleccionados);
        }

        // Guardar los cambios y redirigir al usuario a la página de detalles del evento actualizado
        $evento->save();

        return redirect()->route('eventos.show', ['id' => $evento->id]);
    }

}

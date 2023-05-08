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
        $eventos = Evento::with('grupopaquete')->get();

        // Retorna la vista con los eventos
        return view('eventos.index', compact('eventos'));


    }

    public function create()
    {
        // Obtiene todos los paquetes con sus servicios relacionados cargados
        $grupos_paquetes = Paquete::with('servicios')->get();
        $servicios = Servicio::all();

        // Retorna la vista con los paquetes
        return view('eventos.create', compact('grupos_paquetes', 'servicios'));
    }


    public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'fecha' => 'required|date',
        'hora_inicio' => 'required',
        'hora_fin' => 'required',
        'numero_invitados' => 'required|integer|min:1',
        'grupopaquete_id' => 'required|exists:grupopaquetes,id', // Validación para asegurarse de que se seleccione un grupo de paquetes existente
        'paquetes' => 'array',
        'servicios' => 'array',
    ]);

    $evento = Evento::create([
        'nombre' => $request->nombre,
        'fecha' => $request->fecha,
        'hora_inicio' => $request->hora_inicio,
        'hora_fin' => $request->hora_fin,
        'numero_invitados' => $request->numero_invitados,
        'precio_total' => 0, // precio inicial en cero
        'grupopaquete_id' => $request->grupopaquete_id, // Guardar el id del grupo de paquetes seleccionado por el usuario
    ]);

    if ($request->has('paquetes')) {
        $evento->paquetes()->attach($request->paquetes);
    }

    if ($request->has('servicios')) {
        $evento->servicios()->attach($request->servicios);
    }

    // calcular el precio total
    $precioTotal = $evento->paquetes->sum('precio') + $evento->servicios->sum('precio');
    $evento->update(['precio_total' => $precioTotal]);

    return redirect()->route('eventos.index', $evento);
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

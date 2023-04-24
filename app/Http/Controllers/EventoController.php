<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Paquete;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EventoController extends Controller
{
    // Mostrar todos los eventos
    public function index()
    {
        $eventos = Evento::all();
        return view('Eventos.index', compact('eventos'));
    }

    // Mostrar el formulario para crear un nuevo evento
    public function create()
    {
        $paquetes = Paquete::all();
        $servicios = Servicio::all();
        return view('Eventos.create', compact('paquetes', 'servicios'));
    }
    public function store(Request $request)

{

    // Validar los datos
    $request->validate([
        'nombre' => 'required',
        'fecha' => 'required|date',
        'hora_inicio' => 'required|date_format:H:i',
        'hora_fin' => 'required|date_format:H:i',
        'numero_invitados' => 'required|integer',
        'paquete_id' => 'required|exists:paquetes,id',
    ]);

    // Crear un nuevo evento con los datos recibidos
    $evento = new Evento([
        'nombre' => $request->input('nombre'),
        'fecha' => $request->input('fecha'),
        'hora_inicio' => $request->input('hora_inicio'),
        'hora_fin' => $request->input('hora_fin'),
        'numero_invitados' => $request->input('numero_invitados'),
        'descripcion' => $request->input('descripcion'),
        'paquete_id' => $request->input('paquete_id'),
    ]);

    // Guardar el evento en la base de datos
    if ($evento->save()) {
        // Mostrar un mensaje de éxito
        return redirect()->route('eventos.index')->with('success', 'El evento se ha creado correctamente');
    } else {
        // Mostrar un mensaje de error
        return back()->withInput()->withErrors(['Ocurrió un error al guardar el evento']);
    }

}

    // Mostrar los detalles de un evento en particular
public function show(Evento $evento)
{
    // Obtener los servicios asociados al evento
    $servicios = $evento->servicios;

    return view('Eventos.show', compact('evento', 'servicios'));
}
}

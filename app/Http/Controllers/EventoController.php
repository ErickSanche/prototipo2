<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Paquete;
use Illuminate\Http\Request;

class EventoController extends Controller
{

    public function index()
    {
        // Obtiene todos los eventos
        $eventos = Evento::all();

        // Retorna la vista con los eventos
        return view('eventos.index', compact('eventos'));
    }

    public function create()
    {
        // Obtiene todos los paquetes
        $grupopaquetes = Paquete::all();

        // Retorna la vista con los paquetes
        return view('eventos.create', compact('grupopaquetes'));
    }
    public function store(Request $request)
    {
        // Obtener los datos del formulario
        $datosEvento = $request->only(['nombre', 'fecha', 'hora_inicio', 'hora_fin', 'numero_invitados']);

        // Crear un nuevo evento
        $evento = new Evento($datosEvento);

        // Obtener el paquete seleccionado desde el formulario
        $paqueteSeleccionado = Paquete::find($request->input('grupopaquete_id'));

        // Asignar el paquete al evento
        $evento->grupopaquete()->associate($paqueteSeleccionado);

        // Guardar el evento
        $evento->save();

        // Redirigir al usuario a la página de detalles del evento recién creado
        return redirect()->route('eventos.index', ['id' => $evento->id]);
    }
    public function edit($id)
    {
        $evento = Evento::find($id);
        $grupopaquetes = Paquete::all();
        return view('eventos.edit', compact('evento', 'grupopaquetes'));
    }

    public function update(Request $request, $id)
    {
        $evento = Evento::find($id);
        $evento->nombre = $request->input('nombre');
        $evento->fecha = $request->input('fecha');
        $evento->hora_inicio = $request->input('hora_inicio');
        $evento->hora_fin = $request->input('hora_fin');
        $evento->numero_invitados = $request->input('numero_invitados');
        $evento->grupopaquete_id = $request->input('grupopaquete_id');
        $evento->save();

        return redirect()->route('eventos.mostrar');
    }

    public function destroy($id)
    {
        $evento = Evento::find($id);
        $evento->delete();

        return redirect()->route('eventos.mostrar');
    }

    public function clear()
    {
        Evento::truncate();

        return redirect()->route('eventos.mostrar');
    }
    public function show($id)
    {
        $evento = Evento::find($id);
        return view('show', ['evento' => $evento]);
    }
}

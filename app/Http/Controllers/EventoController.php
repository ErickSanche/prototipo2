<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Grupopaquete;
use App\Models\Paquete;

class EventoController extends Controller
{
    public function create()
    {
        $grupopaquetes = Paquete::all();
        return view('Eventos.create', compact('grupopaquetes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'fecha' => 'required|date',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'numero_invitados' => 'required|integer',
            'grupopaquete_id' => 'required|exists:grupopaquetes,id',
        ]);

        $evento = new Evento;
        $evento->nombre = $request->nombre;
        $evento->fecha = $request->fecha;
        $evento->hora_inicio = $request->hora_inicio;
        $evento->hora_fin = $request->hora_fin;
        $evento->numero_invitados = $request->numero_invitados;
        $evento->grupopaquete_id = $request->grupopaquete_id;
        $evento->save();

        return redirect()->route('eventos.index')->with('success', 'Evento creado exitosamente.');
    }

    public function index()
    {
        $eventos = Evento::all();
        return view('eventos.index', compact('eventos'));
    }

    public function edit(Evento $evento)
    {
        $grupopaquetes = Paquete::all();
        return view('eventos.edit', compact('evento', 'grupopaquetes'));
    }

    public function update(Request $request, Evento $evento)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'fecha' => 'required|date',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'numero_invitados' => 'required|integer',
            'grupopaquete_id' => 'required|exists:grupopaquetes,id',
        ]);

        $evento->nombre = $request->nombre;
        $evento->fecha = $request->fecha;
        $evento->hora_inicio = $request->hora_inicio;
        $evento->hora_fin = $request->hora_fin;
        $evento->numero_invitados = $request->numero_invitados;
        $evento->grupopaquete_id = $request->grupopaquete_id;
        $evento->save();

        return redirect()->route('eventos.index')->with('success', 'Evento actualizado exitosamente.');
    }

    public function destroy(Evento $evento)
    {
        $evento->delete();
        return redirect()->route('eventos.index')->with('success', 'Evento eliminado exitosamente.');
    }
}

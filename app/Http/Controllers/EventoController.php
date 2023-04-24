<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = Evento::all();
        return view('eventos.index', compact('eventos'));
    }

    public function create()
    {
        $grupopaquetes = \App\Models\Paquete::all(); // Reemplaza \App\Models\Grupopaquete con la ruta de tu modelo Grupopaquete

        return view('eventos.create', compact('grupopaquetes'));
    }

    public function store(Request $request)
    {
        $evento = new Evento();
        $evento->nombre = $request->input('nombre');
        $evento->fecha = $request->input('fecha');
        $evento->hora_inicio = $request->input('hora_inicio');
        $evento->hora_fin = $request->input('hora_fin');
        $evento->numero_invitados = $request->input('numero_invitados');
        $evento->grupopaquete_id = $request->input('grupopaquete_id');
        $evento->save();

        return redirect()->route('eventos.index');
    }

    public function edit($id)
    {
        $evento = Evento::find($id);
        return view('eventos.edit', compact('evento'));
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

        return redirect()->route('eventos.index');
    }

    public function destroy($id)
    {
        $evento = Evento::find($id);
        $evento->delete();

        return redirect()->route('eventos.index');
    }

    public function clear()
    {
        Evento::truncate();

        return redirect()->route('eventos.index');
    }
}

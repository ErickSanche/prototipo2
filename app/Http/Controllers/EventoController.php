<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Paquete;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos = Evento::all();

        return view('eventos.index', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grupopaquetes = Paquete::all();
        return view('eventos.create', compact('grupopaquetes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'fecha' => 'required|date',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'numero_invitados' => 'required',
            'grupopaquete_id' => 'required'
        ]);

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


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evento = Evento::find($id);

        return view('eventos.show', compact('evento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evento = Evento::find($id);

        return view('eventos.edit', compact('evento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'fecha' => 'required|date',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            'numero_invitados' => 'required|integer',
            'grupopaquete_id' => 'required|exists:grupopaquetes,id',
        ]);

        $evento = Evento::find($id);
        $evento->nombre = $request->input('nombre');
        $evento->fecha = $request->input('fecha');
        $evento->hora_inicio = $request->input('hora_inicio');
        $evento->hora_fin = $request->input('hora_fin');
        $evento->numero_invitados = $request->input('numero_invitados');
        $evento->grupopaquete_id = $request->input('grupopaquete_id');
        $evento->save();

        return redirect(route('eventos.index'))->with('success', 'Evento actualizado exitosamente.');
    }

    /**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
    $evento = Evento::find($id);
    $evento->delete();

    return redirect(route('eventos.index'))->with('success', 'Evento eliminado exitosamente.');
}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Paquete;
use App\Models\Servicio;

class EventoController extends Controller
{
    // Listado de eventos
public function index()
{
    $eventos = Evento::with('paquete')->get();
    return view('eventos.index', compact('eventos'));
}

// Formulario de creación de eventos
public function create()
{
    $paquetes = Paquete::all();
    $servicios = Servicio::all();
    return view('eventos.create', compact('paquetes', 'servicios'));
}

// Almacenamiento de un nuevo evento
public function store(Request $request)
{
    $evento = new Evento($request->all());
    $evento->save();
    $evento->servicios()->attach($request->input('servicios', []));
    return redirect()->route('eventos.index');
}

public function edit($id)
{
    $event = Evento::findOrFail($id);
    $paquetes = Paquete::all();
    $servicios = Servicio::all();
    $contrato = $event->contrato;

    return view('eventos.edit', compact('event', 'paquetes', 'servicios', 'contrato'));
}

}


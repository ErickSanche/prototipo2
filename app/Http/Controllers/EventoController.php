<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Paquete;
use App\Models\Servicio;

class EventoController extends Controller
{
    // Mostrar todos los eventos (identificando si están confirmados o no)
    public function index()
    {
        $eventos = Evento::all();

        return view('eventos.index', compact('eventos'));
    }

    // Mostrar el formulario para crear un nuevo evento
    public function create()
    {
        $paquetes = Paquete::all();
        $servicios = Servicio::all();

        return view('eventos.create', compact('paquetes', 'servicios'));
    }

    // Almacenar un nuevo evento en la base de datos
    public function store(Request $request)
    {
        $evento = new Evento;
        $evento->fill($request->all());
        $evento->save();

        // Asociar el paquete seleccionado con el evento
        $paquete = Paquete::find($request->input('paquete_id'));
        $evento->paquete()->associate($paquete);

        // Agregar los servicios seleccionados al evento
        $servicios = $request->input('servicios', []);
        $evento->servicios()->sync($servicios);

        return redirect()->route('eventos.show', $evento);
    }

    // Mostrar los detalles de un evento
    public function show(Evento $evento)
    {
        $evento->load('paquete', 'servicios', 'fotos');

        return view('eventos.show', compact('evento'));
    }

    // Mostrar el formulario para editar un evento existente
    public function edit(Evento $evento)
    {
        $paquetes = Paquete::all();
        $servicios = Servicio::all();

        return view('eventos.edit', compact('evento', 'paquetes', 'servicios'));
    }

    // Actualizar un evento existente en la base de datos
    public function update(Request $request, Evento $evento)
    {
        $evento->fill($request->all());
        $evento->save();

        // Asociar el paquete seleccionado con el evento
        $paquete = Paquete::find($request->input('paquete_id'));
        $evento->paquete()->associate($paquete);

        // Agregar los servicios seleccionados al evento
        $servicios = $request->input('servicios', []);
        $evento->servicios()->sync($servicios);

        return redirect()->route('eventos.show', $evento);
    }

    // Eliminar un evento existente de la base de datos
    public function destroy(Evento $evento)
    {
        $evento->delete();

        return redirect()->route('eventos.index');
    }
}

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
        $grupopaquetes = Paquete::with('servicios')->get();

        // Retorna la vista con los paquetes
        return view('eventos.create', compact('grupopaquetes'));
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'nombre' => 'required',
            'fecha' => 'required|date_format:Y-m-d',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i',
            'numero_invitados' => 'required|integer|min:1',
            'grupopaquete_id' => 'required|exists:paquetes,id'
        ]);

        // Obtener el paquete seleccionado desde el formulario con sus servicios cargados
        $paqueteSeleccionado = Paquete::with('servicios')->find($request->input('grupopaquete_id'));

        // Calcular el precio total del evento
        $precioTotal = $paqueteSeleccionado->precio_base;

        foreach ($paqueteSeleccionado->servicios as $servicio) {
            $precioTotal += $servicio->precio;
        }

        $precioTotal *= $request->input('numero_invitados');

        // Crear un nuevo evento con los datos del formulario y el precio calculado
        $evento = new Evento([
            'nombre' => $validatedData['nombre'],
            'fecha' => $validatedData['fecha'],
            'hora_inicio' => $validatedData['hora_inicio'],
            'hora_fin' => $validatedData['hora_fin'],
            'numero_invitados' => $validatedData['numero_invitados'],
            'precio_total' => $precioTotal
        ]);

        // Asignar el paquete al evento
        $evento->grupopaquete()->associate($paqueteSeleccionado);

        // Guardar el evento
        $evento->save();

        // Redirigir al usuario a la página de detalles del evento recién creado
        return redirect()->route('eventos.show', ['id' => $evento->id]);
    }

    public function edit($id)
    {
        // Obtener el evento a editar con su paquete relacionado cargado
        $evento = Evento::with('grupopaquete')->find($id);

        // Obtener todos los paquetes con sus servicios relacionados cargados
        $grupopaquetes = Paquete::with('servicios')->get();

        // Retorna la vista con el evento y los paquetes
        return view('eventos.edit', compact('evento', 'grupopaquetes'));
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

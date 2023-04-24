<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;

class ServicioController extends Controller
{
    // Listado de servicios
    public function index()
    {
        $servicios = Servicio::all();
        return view('Servicios.index', compact('servicios'));
    }

    // Formulario de creación de servicios
    public function create()
    {
        return view('Servicios.create');
    }

    // Almacenamiento de un nuevo servicio
    public function store(Request $request)
    {
        $servicio = new Servicio($request->all());
        $servicio->save();
        return redirect()->route('Servicios.index');
    }

    // Formulario de edición de servicios
    public function edit($id)
    {
        $servicio = Servicio::findOrFail($id);
        return view('Servicios.edit', compact('servicio'));
    }

    // Actualización de los datos de un servicio
    public function update(Request $request, $id)
    {
        $servicio = Servicio::findOrFail($id);
        $servicio->fill($request->all());
        $servicio->save();
        return redirect()->route('Servicios.index');
    }

    // Eliminación de un servicio
    public function destroy($id)
    {
        $servicio = Servicio::findOrFail($id);
        $servicio->delete();
        return redirect()->route('Servicios.index');
    }
}

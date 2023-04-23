<?php

namespace App\Http\Controllers;

use App\Models\Paquete;
use Illuminate\Http\Request;

class PaqueteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paquetes = Paquete::all();

        return view('paquetes.index', compact('paquetes'));
    }

    public function welcome()
    {
        $paquetes = Paquete::all();
        return view('welcome', compact('paquetes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paquetes.create');
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
            'precio' => 'required',
            'descripcion' => 'required'
        ]);

        $paquete = new Paquete();
        $paquete->nombre = $request->input('nombre');
        $paquete->precio = $request->input('precio');
        $paquete->descripcion = $request->input('descripcion');
        $paquete->estado = $request->has('estado') ? 1 : 0; // new boolean variable with default value 0
        $paquete->save();
        return redirect(route('paquetes.index'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $paquete_encontrado = Paquete::find($id);
        return view('paquetes.edit', compact('paquete_encontrado'));
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
            'precio' => 'required',
            'descripcion' => 'required'
        ]);

        $paquete_encontrado = Paquete::find($id);
        $paquete_encontrado->nombre = $request->input('nombre');
        $paquete_encontrado->precio = $request->input('precio');
        $paquete_encontrado->descripcion = $request->input('descripcion');
        $paquete_encontrado->save();
        return redirect(route('paquetes.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paquete_encontrado = Paquete::find($id);
        $paquete_encontrado->delete();
        return redirect(route('paquetes.index'));
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Paquete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'descripcion' => 'required',
        ]);

        $archivo = $request->file('imagen');
        $nombreArchivo = $archivo->getClientOriginalName();

        $r = Storage::disk('publico')->putFileAs('',$archivo,$nombreArchivo);

        $paquete = new Paquete();
        $paquete->fill($request->all());
        $paquete->imagen=$r;
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
        'descripcion' => 'required',
        'estado' => 'required|boolean' // agregar validación para el campo estado
    ]);

    $paquete_encontrado = Paquete::find($id);
    $paquete_encontrado->nombre = $request->input('nombre');
    $paquete_encontrado->precio = $request->input('precio');
    $paquete_encontrado->descripcion = $request->input('descripcion');
    $paquete_encontrado->estado = $request->input('estado'); // asignar valor del campo estado
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

        if($paquete_encontrado->estado == 1){
            return redirect(route('paquetes.index'))->with('error', 'No se puede borrar el paquete porque su estado es activo.');
        }

        $r = Storage::disk('publico')->delete($paquete_encontrado->imagen);
        $paquete_encontrado->delete();
        return redirect(route('paquetes.index'));
    }

}

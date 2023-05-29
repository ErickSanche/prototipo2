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

        if(request()->expectsJson()){

            return response()->json($paquetes);

        }else
            return view('paquetes.index', compact('paquetes'));
    }

    public function welcome()
    {
        $paquetes = Paquete::all();

        if(request()->expectsJson()){

            return response()->json($paquetes);

        }else
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

        if (request()->expectsJson()) {
            return response()->json($paquete);
        } else {
            return redirect(route('paquetes.index'));
        }
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

        $eventosAsociados = Paquete::find($id)->eventos()->exists();
        if ($eventosAsociados) {
            return redirect(route('paquetes.index'))->with('error', 'No se puede editar el paquete porque existen eventos registrados que lo utilizan.');
        }

        $paquete_encontrado = Paquete::find($id);
        $paquete_encontrado->nombre = $request->input('nombre');
        $paquete_encontrado->precio = $request->input('precio');
        $paquete_encontrado->descripcion = $request->input('descripcion');
        $paquete_encontrado->estado = $request->input('estado'); // asignar valor del campo estado

        // Actualizar la imagen
        if ($request->hasFile('imagen')) {
            $archivo = $request->file('imagen');
            $nombreArchivo = $archivo->getClientOriginalName();

            $rutaNuevaImagen = Storage::disk('publico')->putFileAs('', $archivo, $nombreArchivo);

            // Eliminar la imagen existente
            Storage::disk('publico')->delete($paquete_encontrado->imagen);

            // Actualizar la ruta de la imagen en el modelo Paquete
            $paquete_encontrado->imagen = $rutaNuevaImagen;
        }


        $paquete_encontrado->save();

        if (request()->expectsJson()) {
            return response()->json($paquete_encontrado);
        } else {
            return redirect(route('paquetes.index'));
        }


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

        if (request()->expectsJson()) {
            return response()->json(['message' => 'Paquete borrado correctamente.']);
        } else {
            return redirect(route('paquetes.index'));
        }
    }

}

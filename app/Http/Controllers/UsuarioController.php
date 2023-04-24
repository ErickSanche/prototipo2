<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;


class UsuarioController extends Controller
{
    public function index(){
        $usuarios = Usuarios::al();
        return view('usuarios.index', compact ('eventos'));
    }

    public function create(){
        return view('usuario.create');
    }

    public function añadir(){
        return view('usuario.añadir');
    }

    public function edit($id)
    {
        $evento = usuarios::find($id);
        return view('usuarios.edit', compact('evento'));
    }

    public function update(Request $request, $id)
    {
        $usuarios = Usuarios::find($id);
        $usuarios->nombre = $request->input('nombre');
        $usuarios->nombre_de_usario = $request->input('nombre_de_usario');
        $usuarios->clave = $request->input('clave');
        $usuarios->cargo = $request->input('cargo');
        $usuarios->save();

        return redirect()->route('usuarios.index');
    }

    public function destroy($id)
    {
        $usuarios = Usuarios::find($id);
        $usuarios->delete();

        return redirect()->route('usuarios.index');
    }

    public function clear()
    {
        Usuarios::truncate();

        return redirect()->route('usuarios.index');
    }
}

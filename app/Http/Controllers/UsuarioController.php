<?php

namespace App\Http\Controllers;

use App\Models\Paquete;
use App\Models\Usuario;
use App\Models\Usuarios;
use Illuminate\Http\Request;


class UsuarioController extends Controller
{
    public function index(){
        $paquetes = Paquete::all();

        return view('usuarios.index', compact ('paquetes'));
    }

    public function create(){
        return view('usuarios.create');
    }

    public function edit($id)
    {
        $evento = Usuario::find($id);
        return view('usuarios.edit', compact('evento'));
    }

    public function update(Request $request, $id)
    {
        $usuarios = Usuario::find($id);
        $usuarios->nombre = $request->input('nombre');
        $usuarios->nombre_de_usario = $request->input('nombre_de_usario');
        $usuarios->clave = $request->input('clave');
        $usuarios->cargo = $request->input('cargo');
        $usuarios->save();

        return redirect()->route('usuarios.index');
    }

    public function destroy($id)
    {
        $usuarios = Usuario::find($id);
        $usuarios->delete();

        return redirect()->route('usuarios.index');
    }
}

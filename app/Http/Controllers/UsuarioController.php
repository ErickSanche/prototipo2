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
        return view('usuario.registro');
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
        $evento = Evento::find($id);
        $evento->nombre = $request->input('nombre');
        $evento->fecha = $request->input('fecha');
        $evento->hora_inicio = $request->input('hora_inicio');
        $evento->hora_fin = $request->input('hora_fin');
        $evento->numero_invitados = $request->input('numero_invitados');
        $evento->grupopaquete_id = $request->input('grupopaquete_id');
        $evento->save();

        return redirect()->route('eventos.index');
    }

}

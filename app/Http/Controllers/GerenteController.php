<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class GerenteController extends Controller
{
    public function agregarusuario(){
        return view('gerente.agregarusuario');
    }
    public function agregarservicios(){
        return view('gerente.agregarservicios');
    }
    public function verusuario(){
        $usuarios = Usuario::all();
        return view('gerente.verusuario', compact('usuarios'));

    }
    public function verservicios(){
        return view('gerente.verservicios');
    }
}

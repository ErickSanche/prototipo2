<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function review(){
        return view('usuario.review');
    }

    public function registro(){
        return view('usuario.registro');
    }

    public function añadir(){
        return view('usuario.añadir');
    }





}

<?php

namespace App\Http\Controllers;

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
        return view('gerente.verusuario');
    }
    public function verservicios(){
        return view('gerente.verservicios');
    }
}

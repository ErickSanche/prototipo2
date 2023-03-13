<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function eventos(){
        return view('empleado.eventos');
    }

    public function abonar(){
        return view('empleado.abonar');
    }

}

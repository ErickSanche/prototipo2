<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SistemaController extends Controller
{
    public function entrada(){
        return view('Sistema.entrada');
    }
    public function validar(Request $solicitud){
//        dump($solicitud->all());
        $usuario = $solicitud->input('usuario');
        $password = $solicitud->input('password');

        if ($usuario == "cliente" && $password == "cliente") {
            return redirect(route("usuario.paquetes"));
        }
        else {
            return view("Sistema.error");
        }

    }
    public function validar2(Request $solicitud){

        $usuario = $solicitud->input('usuario');
        $password = $solicitud->input('password');

        if ($usuario == "gerente" && $password == "gerente") {
            return redirect(route("paquetes.index"));
        }
        if ($usuario == "empleado" && $password == "empleado") {
            return redirect(route("empleado.eventos"));
        }  else {
            return view("Sistema.error");
        }
    }

    public function index(){
        return view("usuario.paquetes");
    }

    public function saludar(){

    }
    public function salir(Request $solicitud){
        return redirect("/");
    }
}

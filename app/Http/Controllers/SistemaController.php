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
        if($usuario==$password){
            return redirect(route("usuario.paquetes"));
//            echo "si puede entrar";
        } else {
            return view("Sistema.error");
        }
    }
    public function validar2(Request $solicitud){
        //        dump($solicitud->all());
                $usuario = $solicitud->input('usuario');
                $password = $solicitud->input('password');
                if($usuario==$password){
                    return redirect(route("paquetes.index"));
        //            echo "si puede entrar";
                } else {
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

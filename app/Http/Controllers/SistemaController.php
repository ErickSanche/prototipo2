<?php

namespace App\Http\Controllers;

use App\Models\Paquete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;

class SistemaController extends Controller
{
    public function login(){
        return view('sistemas.login');
    }

    public function validar(Request $solicitud){

        $usuario = $solicitud->input('usuario');
        $password = $solicitud->input('password');

        $encontrado = Usuario::where('nombre_de_usuario', $usuario)->first();

        if (is_null($encontrado)) {
            echo '<script>alert("Contraseña incorrecta. Por favor, inténtalo de nuevo.");</script>';
            return redirect(route("login"));
        } else {
            $password_bd = $encontrado->clave;
            $conincide = Hash::check($password, $password_bd);

            if ($conincide) {
                Auth::login($encontrado);

                if ($encontrado->cargo == "gerente") {
                    return redirect(route("paquetes.index"));
                } else {
                    return redirect(route("sistemas.index"));
                }
            } else {
                return view("sistemas.error");
            }
        }
    }

    public function index(){
        $paquetes = Paquete::all();
        return view('sistemas.index', compact('paquetes'));
    }

    public function registrar(){
        return view('usuarios.create');
    }
    public function registrar2(Request $solicitud){
         $nombre = $solicitud->input('nombre');
         $usuario = $solicitud->input('usuario');
         $password = $solicitud->input('password');
         $cargo = $solicitud->input('cargo');

         $nuevo = new Usuario();
         $nuevo->nombre = $nombre;
         $nuevo->nombre_de_usuario = $usuario;
         $nuevo->clave = Hash::make($password); // password
         $nuevo->cargo = $cargo;
         $nuevo->save();
         return redirect("usuarios.create");

        }
    public function salir(Request $solicitud){
        return redirect("/");
    }
}

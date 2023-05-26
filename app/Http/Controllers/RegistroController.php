<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Registro;

class RegistroController extends Controller
{
    public function entrada()
    {
        return view('registros.entrada');
    }

    public function verUsuarios()
    {
        $usuarios = Registro::all();
        return view('registros.verusuarios', compact('usuarios'));
    }

    public function validar(Request $solicitud)
    {
        $usuario = $solicitud->input('usuario');
        $password = $solicitud->input('password');

        // Validar si el usuario existe
        $encontrado = Registro::where('nombre_de_usuario', $usuario)->first();
        if (is_null($encontrado)) {
            return redirect()->back()->withErrors(['usuario' => 'Usuario no encontrado']);
        }

        // Verificar la coincidencia de la contraseña
        $password_bd = $encontrado->clave;
        if (!Hash::check($password, $password_bd)) {
            return redirect()->back()->withErrors(['password' => 'Contraseña incorrecta']);
        }
        Auth::login($encontrado);
        // Verificar el tipo de usuario
        if ($encontrado->tipo === 'cliente') {
            // Autenticar al usuario cliente


            return redirect()->route('clientes.index');
        } elseif ($encontrado->tipo === 'administrador') {
            // Autenticar al usuario administrador


            return redirect()->route('paquetes.index');
        } else {
            return redirect()->back()->withErrors(['usuario' => 'Usuario no válido']);
        }
    }




    public function salir(Request $solicitud)
    {
        Auth::logout();
        dump("adios");
        Session::flush();
        return redirect("login");
    }

    public function registrar()
    {
        return view('registros.registrar');
    }

    public function registrar2(Request $solicitud)
    {
        try {
            $validatedData = $solicitud->validate([
                'completo' => 'required',
                'usuario' => 'required',
                'password' => 'required',
                'tipo' => 'required',
            ]);

            $nombre = $solicitud->input('completo');
            $usuario = $solicitud->input('usuario');
            $password = $solicitud->input('password');
            $tipo = $solicitud->input('tipo');

            $nuevo = new Registro();
            $nuevo->nombre = $nombre;
            $nuevo->nombre_de_usuario = $usuario;
            $nuevo->clave = Hash::make($password);
            $nuevo->tipo = $tipo;
            $nuevo->save();

            return redirect("registrar")->with('success', 'Usuario guardado exitosamente');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'El usuario ya está registrado']);
        }
    }


    public function edit($id)
    {
        $usuario = Registro::findOrFail($id);
        return view('registros.edit', compact('usuario'));
    }

    public function update(Request $solicitud, $id)
    {
        try {
            $validatedData = $solicitud->validate([
                'completo' => 'required',
                'usuario' => 'required',
                'tipo' => 'required',
            ]);

            $nombre = $solicitud->input('completo');
            $usuario = $solicitud->input('usuario');
            $tipo = $solicitud->input('tipo');

            $registro = Registro::findOrFail($id);
            $registro->nombre = $nombre;
            $registro->nombre_de_usuario = $usuario;
            $registro->tipo = $tipo;

            $password = $solicitud->input('password');
            if (!empty($password)) {
                $registro->clave = Hash::make($password);
            }

            $registro->save();

            return redirect()->route('ver-usuarios')->with('success', 'Usuario actualizado exitosamente');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error al actualizar el usuario']);
        }
    }


    public function destroy($id)
    {
        try {
            $usuario = Registro::findOrFail($id);
            $this->authorize('delete', $usuario); // Verificar la autorización para eliminar al usuario

            if ($usuario->tipo === 'cliente') {
                // Verificar si el usuario tiene eventos en estado "validándose" o "confirmado"
                $eventosValidandose = $usuario->eventos()->whereIn('estado', ['validando', 'confirmado'])->count();
                if ($eventosValidandose > 0) {
                    return redirect()->route('ver-usuarios')->withErrors(['error' => 'No se puede eliminar el usuario debido a que tiene eventos en estado "validándose" o "confirmado"']);
                }
            }

            $usuario->delete();

            return redirect()->route('ver-usuarios')->with('success', 'Usuario eliminado exitosamente');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error al eliminar el usuario']);
        }
    }

}


<?php

namespace App\Policies;

use App\Models\Registro;
use Illuminate\Auth\Access\HandlesAuthorization;

class RegistroPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny($registro)
    {
        if ($registro->tipo === 'administrador') return true;
        else  return false;
    }
    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Registro  $registro
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Registro $registro)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Registro $registro, Registro $usuario)
    {
        if ($registro->tipo === 'administrador') return true;
        else  return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Registro  $registro
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Registro $registro, Registro $usuario)
    {
        if ($registro->tipo === 'administrador') return true;
        else  return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Registro  $registro
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Registro $registro, Registro $usuario)
    {
        if ($registro->tipo === 'administrador') {
            return true; // Permitir que los administradores eliminen clientes sin restricciones.
        }

        if ($usuario->tipo === 'cliente') {
            $eventosValidandose = $usuario->eventos()->where('estado', 'validando')->exists();
            if ($eventosValidandose) {
                return false; // No se puede eliminar el cliente si tiene eventos en estado "validando".
            }
        }

        return true; // Permitir eliminar el usuario en otros casos.
    }


    public function verUsuarios($registro)
    {
        if ($registro->tipo === 'administrador') return true;
        else  return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Registro  $registro
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Registro $registro)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Registro  $registro
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Registro $registro)
    {
        //
    }
}

<?php

namespace App\Policies;

use App\Models\Evento;
use App\Models\Registro;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Registro $registro)
    {
        if ($registro->tipo === 'cliente') return true;
        else  return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Registro  $registro
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Registro $registro, Evento $evento)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Registro $registro)
    {
        if ($registro->tipo === 'cliente') return true;
        else  return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Registro  $registro
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Registro $registro, Evento $evento)
    {
         // Verificar si el usuario es un administrador
    if ($registro->tipo === 'administrador') {
        return true;
    }

    // Verificar si el usuario es un cliente y el estado no es "validando"
    if ($registro->tipo === 'cliente' && $evento->estado === 'no confirmado') {
        return true;
    }
    return false;

    }

    public function updateEstado(Registro $registro, Evento $evento)
    {
        if ($registro->tipo === 'administrador') {
            // Permitir que el administrador actualice el estado
            return true;
        }

        // Resto de la lógica para otros usuarios con permisos diferentes a los administradores
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Registro  $registro
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Registro $registro, Evento $evento)
    {
        if ($registro->tipo === 'cliente') {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Registro  $registro
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Registro $registro, Evento $evento)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Registro  $registro
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Registro $registro, Evento $evento)
    {
        //
    }
}

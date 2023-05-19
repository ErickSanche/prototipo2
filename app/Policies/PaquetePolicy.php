<?php

namespace App\Policies;

use App\Models\Paquete;
use App\Models\Registro;
use Illuminate\Auth\Access\HandlesAuthorization;

class PaquetePolicy
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
        if ($registro->tipo === 'administrador') return true;
        else  return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Registro  $registro
     * @param  \App\Models\Paquete  $paquete
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Registro $registro, Paquete $paquete)
    {
        if ($registro->tipo === 'administrador') return true;
        else  return false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Registro $registro)
    {
        if ($registro->tipo === 'administrador') return true;
        else  return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Registro  $registro
     * @param  \App\Models\Paquete  $paquete
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Registro $registro, Paquete $paquete)
    {
        if ($registro->tipo === 'administrador') return true;
        else  return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Registro  $registro
     * @param  \App\Models\Paquete  $paquete
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Registro $registro, Paquete $paquete)
    {
        if ($registro->tipo === 'administrador') return true;
        else  return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Registro  $registro
     * @param  \App\Models\Paquete  $paquete
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Registro $registro, Paquete $paquete)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Registro  $registro
     * @param  \App\Models\Paquete  $paquete
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Registro $registro, Paquete $paquete)
    {
        //
    }
}

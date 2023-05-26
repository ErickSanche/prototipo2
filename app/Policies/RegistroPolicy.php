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
    public function viewAny($user)
    {
        return $user->tipo === 'administrador';
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
    public function create(Registro $registro)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Registro  $registro
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Registro $registro, Registro $registro)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Registro  $registro
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Registro $registro, Registro $registro)
    {
        //
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

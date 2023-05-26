<?php

namespace App\Observers;

use App\Models\Registro;
use App\Models\Bitacora;
use Illuminate\Support\Facades\Auth;


class ObserverRegistro
{
    /**
     * Handle the Registro "created" event.
     *
     * @param  \App\Models\Registro  $registro
     * @return void
     */
    public function created(Registro $registro)
    {
        //
        $aviso = new Bitacora;
        $aviso->que = "se agrego un nuevo usuario";
        $aviso->quien = Auth::user()-> nombre;
        $aviso->save();
    }

    /**
     * Handle the Registro "updated" event.
     *
     * @param  \App\Models\Registro  $registro
     * @return void
     */
    public function updated(Registro $registro)
    {
        //
    }

    /**
     * Handle the Registro "deleted" event.
     *
     * @param  \App\Models\Registro  $registro
     * @return void
     */
    public function deleted(Registro $registro)
    {
        //
    }

    /**
     * Handle the Registro "restored" event.
     *
     * @param  \App\Models\Registro  $registro
     * @return void
     */
    public function restored(Registro $registro)
    {
        //
    }

    /**
     * Handle the Registro "force deleted" event.
     *
     * @param  \App\Models\Registro  $registro
     * @return void
     */
    public function forceDeleted(Registro $registro)
    {
        //
    }
}

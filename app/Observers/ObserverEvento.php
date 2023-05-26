<?php

namespace App\Observers;

use App\Models\Evento;
use App\Models\Bitacora;
use Illuminate\Support\Facades\Auth;

class ObserverEvento
{
    /**
     * Handle the Evento "created" event.
     *
     * @param  \App\Models\Evento  $evento
     * @return void
     */
        public function created(Evento $evento)
    {
        $aviso = new Bitacora;
        $aviso->que = "se agregó un nuevo Evento: " . $evento->nombre;
        $aviso->quien = Auth::user()->nombre;
        $aviso->save();
    }

    public function updated(Evento $evento)
    {
        $aviso = new Bitacora;
        $aviso->que = "se editó el Evento: " . $evento->nombre;
        $aviso->quien = Auth::user()->nombre;
        $aviso->save();
    }

    public function deleted(Evento $evento)
    {
        $aviso = new Bitacora;
        $aviso->que = "se eliminó el Evento: " . $evento->nombre;
        $aviso->quien = Auth::user()->nombre;
        $aviso->save();
    }

    /**
     * Handle the Evento "restored" event.
     *
     * @param  \App\Models\Evento  $evento
     * @return void
     */
    public function restored(Evento $evento)
    {
        //
    }

    /**
     * Handle the Evento "force deleted" event.
     *
     * @param  \App\Models\Evento  $evento
     * @return void
     */
    public function forceDeleted(Evento $evento)
    {
        //
    }
}

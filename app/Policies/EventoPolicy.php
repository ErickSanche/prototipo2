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
        if ($registro->tipo === 'cliente') {
            return true;
        }

        if ($registro->tipo === 'administrador') {
            return true;
        }


    return false;

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
        if ($registro->tipo === 'cliente') {
            // Verificar si el estado del evento permite la edición
            if ($evento->estado === 'No confirmado' || $evento->estado === 'Rechazado') {
                return true; // Permitir la edición del evento
            }
        }

         // Verificar si el usuario es un administrador
        if ($registro->tipo === 'administrador') {
            return true;
        }

        if ($registro->tipo === 'empleado') {
            return true;
        }

        // Verificar si el evento está completo
        if ($evento->estado === 'Completo') {
        // Obtener la hora actual y la hora de finalización del evento
        $horaActual = new DateTime();
        $horaFinalizacion = new DateTime($evento->hora_finalizacion);

        // Calcular la diferencia de tiempo en horas
        $diferenciaHoras = $horaActual->diff($horaFinalizacion)->h;

        // Permitir la edición si han pasado menos de 4 horas desde la finalización
        if ($diferenciaHoras <= 4) {
            return true;
        }
    }


    return false;

    }

    public function vistaAbonar(Registro $registro, Evento $evento)
    {
        // Verificar si el usuario es un administrador
        if ($registro->tipo === 'administrador'|| $registro->tipo === 'empleado') {
            return true; // Permitir ver la vista de abonar
        }

        return false; // No permitir ver la vista de abonar para otros usuarios
    }


    public function abonar(Registro $registro, Evento $evento)
    {
        // Verificar si el usuario es un administrador
        if ($registro->tipo === 'administrador') {
            return true; // Permitir realizar el abono
        }

        // Verificar si el estado del evento es "agendado"
        if ($evento->estado === 'Agendado') {
            return true; // Permitir realizar el abono
        }

        return false; // No permitir realizar el abono en otros casos
    }

    public function cargosExtras(Registro $registro, Evento $evento)
    {

        // Verificar si el usuario es un administrador o empleado
        if ($registro->tipo === 'administrador' || $registro->tipo === 'empleado') {
            return true; // Permitir realizar el abono
        }

        // Verificar si el estado del evento es "agendado"
        if ($evento->estado === 'Agendado') {
            return true; // Permitir realizar el abono
        }

        return false; // No permitir realizar el abono en otros casos

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
            // Verificar si el estado del evento es diferente de "validando" y "agendado"
            if ($evento->estado !== 'Validando' && $evento->estado !== 'Agendado') {
                return true; // Permitir que el cliente elimine el evento
            }
        }
        if ($registro->tipo === 'administrador') {
            // Verificar si el estado del evento es diferente de "validando" y "agendado"
            if ($evento->estado !== 'Validando' && $evento->estado !== 'Agendado') {
                return true; // Permitir que el cliente elimine el evento
            }
        }

        return false; // No permitir la eliminación en otros casos
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

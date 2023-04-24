<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = ['nombre', 'fecha', 'hora_inicio', 'hora_fin', 'numero_invitados', 'paquete_id'];

    public function paquete()
    {
        return $this->belongsTo(Paquete::class);
    }
}


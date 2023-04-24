<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'fecha',
        'hora_inicio',
        'hora_fin',
        'numero_invitados',
        'grupopaquete_id',
    ];

    public function grupopaquete()
    {
        return $this->belongsTo(Paquete::class);
    }
}

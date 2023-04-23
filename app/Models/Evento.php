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
        'confirmado',
        'hora_inicio',
        'hora_fin',
        'proposito',
        'invitados',
        'mobiliario',
        'manteleria',
        'paquete_id'
    ];

    // Relación con el paquete
    public function paquete()
    {
        return $this->belongsTo(Paquete::class);
    }

    // Relación con los servicios
    public function servicios()
    {
        return $this->belongsToMany(Servicio::class);
    }

    // Relación con la galería de fotos
    public function fotos()
    {
        return $this->hasMany(Foto::class);
    }
}

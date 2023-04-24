<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $table = 'eventos'; // especifica el nombre de la tabla

    protected $fillable = [
        'nombre',
        'fecha',
        'hora_inicio',
        'hora_fin',
        'numero_invitados',
        'descripcion',
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
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 'descripcion', 'precio'
    ];

    public function eventos()
    {
        return $this->belongsToMany(Evento::class)->withTimestamps();
    }

    public function paquetes()
    {
        return $this->belongsToMany(Paquete::class, 'paquete_servicio');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Registro extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['nombre', 'nombre_de_usuario', 'clave'];

    // Definir la relación con los eventos
    public function eventos()
    {
        return $this->hasMany(Evento::class);
    }
}

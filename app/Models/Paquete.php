<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    protected $table = 'grupopaquetes';
    protected $fillable = ['nombre', 'precio', 'descripcion'];
    public function servicios()
    {
        return $this->belongsToMany(Servicio::class, 'paquete_servicio');
    }
}


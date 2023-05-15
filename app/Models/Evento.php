<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'fecha', 'hora_inicio', 'hora_fin', 'numero_invitados', 'precio_total'];

    // Definir la relación con paquetes
    public function paquetes()
    {
        return $this->belongsToMany(Paquete::class, 'evento_paquete');
    }

    // Definir la relación con servicios
    public function servicios()
    {
        return $this->belongsToMany(Servicio::class, 'evento_servicio');
    }

    // Calcular el precio total del evento
    public function calcularPrecioTotal()
    {
        $precioTotal = 0;

        // Sumar el precio del paquete elegido, si lo hay
        if ($this->paquetes()->exists()) {
            $precioTotal += $this->paquetes->first()->precio;
        }

        // Sumar el precio de los servicios elegidos, si los hay
        if ($this->servicios()->exists()) {
            $precioTotal += $this->servicios()->sum('precio');
        }

        $this->precio_total = $precioTotal;
        $this->save();
    }
}

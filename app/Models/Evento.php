<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'fecha', 'hora_inicio', 'hora_fin', 'numero_invitados', 'precio_total', 'estado'];

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

    // Definir la relación con el usuario propietario del evento
    public function registro()
    {
        return $this->belongsTo(Registro::class, 'registro_id');
    }

    // Validar el evento (cambiar estado a 'validado')
    public function validar()
    {
        $this->estado = 'validado';
        $this->save();
    }

    // Rechazar el evento (cambiar estado a 'rechazado')
    public function rechazar()
    {
        $this->estado = 'rechazado';
        $this->save();
    }

}

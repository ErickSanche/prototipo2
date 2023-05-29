<?php

namespace Database\Seeders;

use App\Models\Evento;
use App\Models\Paquete;
use App\Models\Servicio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paquetes = Paquete::all();
        $servicios = Servicio::all();

        // Crear eventos sin confirmar
        for ($i = 1; $i <= 5; $i++) {
            Evento::create([
                'nombre' => 'Evento ' . $i,
                'fecha' => date('Y-m-d'),
                'hora_inicio' => '10:00:00',
                'hora_fin' => '18:00:00',
                'numero_invitados' => 100,
                'grupopaquete_id' => $paquetes->random()->id,
                'estado' => 'No confirmado',
                'registro_id' => 1 // Reemplaza el ID del registro correspondiente
            ]);
        }

        // Crear eventos con servicios contratados
        for ($i = 6; $i <= 10; $i++) {
            $evento = Evento::create([
                'nombre' => 'Evento ' . $i,
                'fecha' => date('Y-m-d'),
                'hora_inicio' => '10:00:00',
                'hora_fin' => '18:00:00',
                'numero_invitados' => 100,
                'grupopaquete_id' => $paquetes->random()->id,
                'estado' => 'No confirmado',
                'registro_id' => 1 // Reemplaza el ID del registro correspondiente
            ]);

            $evento->servicios()->attach($servicios->random(rand(1, $servicios->count()))); // Asocia servicios aleatorios al evento
        }
    }
}

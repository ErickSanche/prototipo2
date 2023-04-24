<?php

namespace Database\Seeders;

use App\Models\Evento;
use App\Models\Grupopaquete;
use App\Models\Paquete;
use Illuminate\Database\Seeder;
use Mockery\Generator\StringManipulation\Pass\Pass;

class EventosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paquetes = Paquete::whereNotIn('nombre', ['Bodas'])->get();

        $eventos = [
            [
                'nombre' => 'Fiesta de cumpleaños de Juan',
                'fecha' => '2023-05-10',
                'hora_inicio' => '14:00:00',
                'hora_fin' => '18:00:00',
                'numero_invitados' => 50,
                'grupopaquete_id' => $paquetes[0]->id,
                'confirmado' => false,
                'servicios' => [1, 2],
            ],
            [
                'nombre' => 'Fiesta de XV años de Ana',
                'fecha' => '2023-06-20',
                'hora_inicio' => '20:00:00',
                'hora_fin' => '02:00:00',
                'numero_invitados' => 100,
                'grupopaquete_id' => $paquetes[1]->id,
                'confirmado' => true,
                'servicios' => [1, 3, 4],
            ],
            [
                'nombre' => 'Bautizo de María',
                'fecha' => '2023-07-15',
                'hora_inicio' => '12:00:00',
                'hora_fin' => '16:00:00',
                'numero_invitados' => 30,
                'grupopaquete_id' => $paquetes[2]->id,
                'confirmado' => false,
                'servicios' => [2, 4],
            ],
            [
                'nombre' => 'Fiesta de cumpleaños de Sofía',
                'fecha' => '2023-08-05',
                'hora_inicio' => '15:00:00',
                'hora_fin' => '19:00:00',
                'numero_invitados' => 60,
                'grupopaquete_id' => $paquetes[3]->id,
                'confirmado' => true,
                'servicios' => [1, 2, 3, 4],
            ],
            [
                'nombre' => 'Fiesta de inauguración de la nueva oficina',
                'fecha' => '2023-09-02',
                'hora_inicio' => '18:00:00',
                'hora_fin' => '22:00:00',
                'numero_invitados' => 20,
                'grupopaquete_id' => $paquetes[0]->id,
                'confirmado' => false,
                'servicios' => [3],
            ],
            [
                'nombre' => 'Fiesta de Halloween de la empresa',
                'fecha' => '2023-10-31',
                'hora_inicio' => '19:00:00',
                'hora_fin' => '01:00:00',
                'numero_invitados' => 80,
                'grupopaquete_id' => $paquetes[1]->id,
                'confirmado' => true,
                'servicios' => [1, 2, 3,4, 5],
            ],
            ];
            foreach ($eventos as $evento) {
                Evento::create($evento);
            }
        }

        }

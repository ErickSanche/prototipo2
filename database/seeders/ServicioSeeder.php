<?php

namespace Database\Seeders;

use App\Models\Servicio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Servicio::create([
            'nombre' => 'Mantelería',
            'descripcion' => 'Servicio de mantelería',
            'precio' => 50.00
        ]);

        Servicio::create([
            'nombre' => 'Meseros',
            'descripcion' => 'Servicio de meseros',
            'precio' => 80.00
        ]);

        Servicio::create([
            'nombre' => 'Aire acondicionado',
            'descripcion' => 'Servicio de aire acondicionado',
            'precio' => 100.00
        ]);
    }
}

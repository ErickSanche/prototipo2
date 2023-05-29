<?php

namespace Database\Seeders;

use App\Models\Paquete;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaqueteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Paquete::create([
            'nombre' => 'Bodas',
            'precio' => 100.00,
            'descripcion' => 'Paquete para bodas',
            'estado' => true
        ]);

        Paquete::create([
            'nombre' => 'XV años',
            'precio' => 150.00,
            'descripcion' => 'Paquete para XV años',
            'estado' => true
        ]);

        Paquete::create([
            'nombre' => 'Fiesta infantil',
            'precio' => 80.00,
            'descripcion' => 'Paquete para fiesta infantil',
            'estado' => true
        ]);

        Paquete::create([
            'nombre' => 'Bautizos',
            'precio' => 90.00,
            'descripcion' => 'Paquete para bautizos',
            'estado' => true
        ]);
    }
}

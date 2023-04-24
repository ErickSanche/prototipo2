<?php

// Seeder for grupopaquetes table
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GrupopaquetesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('grupopaquetes')->insert([
            [
                'nombre' => 'XV años',
                'precio' => 5000.00,
                'descripcion' => 'Paquete para fiesta de XV años',
                'estado' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Fiesta infantil',
                'precio' => 3500.00,
                'descripcion' => 'Paquete para fiesta infantil',
                'estado' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Bautizos',
                'precio' => 4500.00,
                'descripcion' => 'Paquete para bautizos',
                'estado' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

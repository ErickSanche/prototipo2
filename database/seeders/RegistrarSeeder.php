<?php

namespace Database\Seeders;

use App\Models\Registro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RegistrarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Gerente
        Registro::create([
            'nombre' => 'Carlos',
            'nombre_de_usuario' => 'carlos123',
            'clave' => Hash::make("123"),
            'tipo' => 'administrador'
        ]);

        // Clientes
        Registro::create([
            'nombre' => 'Hugo',
            'nombre_de_usuario' => 'hugo456',
            'clave' => Hash::make("123"),
            'tipo' => 'cliente'
        ]);

        Registro::create([
            'nombre' => 'Paco',
            'nombre_de_usuario' => 'paco789',
            'clave' => Hash::make("123"),
            'tipo' => 'empleado'
        ]);

        Registro::create([
            'nombre' => 'Luis',
            'nombre_de_usuario' => 'luis012',
            'clave' => Hash::make("123"),
            'tipo' => 'cliente'
        ]);
    }
}

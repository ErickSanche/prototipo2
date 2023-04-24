<?php

// Seeder for users table
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('usuarios')->insert([
            [
                'nombre' => 'Carlos',
                'nombre_de_usuario' => 'carlos',
                'rol' => 'Gerente',
                'cargo' => 'Gerente General',
                'clave' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Hugo',
                'nombre_de_usuario' => 'hugo',
                'rol' => 'Cliente',
                'cargo' => 'Cliente Regular',
                'clave' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Paco',
                'nombre_de_usuario' => 'paco',
                'rol' => 'Cliente',
                'cargo' => 'Cliente Regular',
                'clave' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Luis',
                'nombre_de_usuario' => 'luis',
                'rol' => 'Cliente',
                'cargo' => 'Cliente VIP',
                'clave' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

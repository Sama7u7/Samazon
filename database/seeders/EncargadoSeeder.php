<?php

namespace Database\Seeders;
use App\Models\Usuario;
use Illuminate\Database\Seeder;

class EncargadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Usuario::create([
            'role' => 'encargado',
            'email' => 'encargado@gmail.com',
            'password' => bcrypt('encargado@gmail.com'),
        ]);
        Usuario::create([
            'role' => 'encargado',
            'email' => 'encargado2@gmail.com',
            'password' => bcrypt('encargado2@gmail.com'),
        ]);
        Usuario::create([
            'role' => 'encargado',
            'email' => 'encargado3@gmail.com',
            'password' => bcrypt('encargado3@gmail.com'),
        ]);
        
    }
}
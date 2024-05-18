<?php

namespace Database\Seeders;
use App\Models\Usuario;
use Illuminate\Database\Seeder;


class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuario::create([
            'nombre' => 'Panfilo',
            'apellido_paterno'=>'Pancracio',
            'apellido_materno' => 'Saturnino',
            'genero'=>'Masculino',
            'email' => 'cliente@gmail.com',
            'password' => bcrypt('cliente@gmail.com'),
            'role' => 'cliente',
        ]);
        Usuario::create([
            'nombre' => 'Emiliano',
            'email' => 'cliente2@gmail.com',
            'password' => bcrypt('client2e@gmail.com'),
            'role' => 'cliente',
        ]);
        Usuario::create([
            'nombre' => 'Michael',
            'email' => 'comprador1@gmail.com',
            'password' => bcrypt('comprador1@gmail.com'),
            'role' => 'vendedor',
        ]);
        Usuario::create([
            'nombre' => 'Franklin',
            'email' => 'comprador2@gmail.com',
            'password' => bcrypt('comprador2@gmail.com'),
            'role' => 'cliente',
        ]);
        Usuario::create([
            'nombre' => 'Miguel',
            'email' => 'comprador3@gmail.com',
            'password' => bcrypt('comprador3@gmail.com'),
            'role' => 'vendedor',
        ]);
        Usuario::create([
            'nombre' => 'Marie',
            'email' => 'comprador4@gmail.com',
            'password' => bcrypt('comprador4@gmail.com'),
            'role' => 'cliente',
        ]);
        Usuario::create([
            'nombre' => 'Itzury',
            'email' => 'comprador5@gmail.com',
            'password' => bcrypt('comprador5@gmail.com'),
            'role' => 'vendedor',
        ]);
        
    }
}
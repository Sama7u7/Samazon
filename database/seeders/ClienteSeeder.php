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
            'email' => 'cliente@gmail.com',
            'password' => bcrypt('cliente@gmail.com'),
            'role' => 'cliente',
        ]);
        Usuario::create([
            'email' => 'cliente2@gmail.com',
            'password' => bcrypt('client2e@gmail.com'),
            'role' => 'cliente',
        ]);
        Usuario::create([
            'email' => 'comprador1@gmail.com',
            'password' => bcrypt('comprador1@gmail.com'),
            'role' => 'comprador/vendedor',
        ]);
        Usuario::create([
            'email' => 'comprador2@gmail.com',
            'password' => bcrypt('comprador2@gmail.com'),
            'role' => 'comprador/vendedor',
        ]);
        Usuario::create([
            'email' => 'comprador3@gmail.com',
            'password' => bcrypt('comprador3@gmail.com'),
            'role' => 'comprador/vendedor',
        ]);
        Usuario::create([
            'email' => 'comprador4@gmail.com',
            'password' => bcrypt('comprador4@gmail.com'),
            'role' => 'comprador/vendedor',
        ]);
        Usuario::create([
            'email' => 'comprador5@gmail.com',
            'password' => bcrypt('comprador5@gmail.com'),
            'role' => 'comprador/vendedor',
        ]);
        
    }
}
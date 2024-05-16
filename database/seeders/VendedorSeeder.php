<?php

namespace Database\Seeders;
use App\Models\Usuario;
use Illuminate\Database\Seeder;

class VendedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            Usuario::create([
            'nombre' => 'Teodoro',
            'role' => 'vendedor',
            'email' => 'vendedor@gmail.com',
            'password' => bcrypt('vendedor@gmail.com'),
        ]);

        Usuario::create([
            'nombre' => 'Onecimo',
            'role' => 'vendedor',
            'email' => 'vendedor2@gmail.com',
            'password' => bcrypt('vendedor2@gmail.com'),
        ]);
        Usuario::create([
            'nombre' => 'Eduardo',
            'role' => 'vendedor',
            'email' => 'vendedor3@gmail.com',
            'password' => bcrypt('vendedor3@gmail.com'),
        ]);
        Usuario::create([
            'nombre' => 'Pedro',
            'role' => 'vendedor',
            'email' => 'vendedor4@gmail.com',
            'password' => bcrypt('vendedor4@gmail.com'),
        ]);
        Usuario::create([
            'nombre' => 'Pablo',
            'role' => 'vendedor',
            'email' => 'vendedor5@gmail.com',
            'password' => bcrypt('vendedor5@gmail.com'),
        ]);
        Usuario::create([
            'nombre' => 'Platon',
            'role' => 'vendedor',
            'email' => 'vendedor6@gmail.com',
            'password' => bcrypt('vendedor6@gmail.com'),
        ]);
    }
}
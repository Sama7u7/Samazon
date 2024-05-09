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
            'role' => 'vendedor',
            'email' => 'vendedor@gmail.com',
            'password' => bcrypt('vendedor@gmail.com'),
        ]);

        Usuario::create([
            'role' => 'vendedor',
            'email' => 'vendedor2@gmail.com',
            'password' => bcrypt('vendedor@gmail.com'),
        ]);
        Usuario::create([
            'role' => 'vendedor',
            'email' => 'vendedor2@gmail.com',
            'password' => bcrypt('vendedor2@gmail.com'),
        ]);
        Usuario::create([
            'role' => 'vendedor',
            'email' => 'vendedor3@gmail.com',
            'password' => bcrypt('vendedor3@gmail.com'),
        ]);
        Usuario::create([
            'role' => 'vendedor',
            'email' => 'vendedor4@gmail.com',
            'password' => bcrypt('vendedor5@gmail.com'),
        ]);
        Usuario::create([
            'role' => 'vendedor',
            'email' => 'vendedor5@gmail.com',
            'password' => bcrypt('vendedor5@gmail.com'),
        ]);
    }
}
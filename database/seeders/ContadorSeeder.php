<?php

namespace Database\Seeders;
use App\Models\Usuario;
use Illuminate\Database\Seeder;

class ContadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuario::create([
        'role' => 'contador',
        'email' => 'contador@gmail.com',
        'password' => bcrypt('contador@gmail.com'),
    ]);
    }
}
<?php

namespace Database\Seeders;
use App\Models\Usuario;
use Illuminate\Database\Seeder;


class SupervisorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuario::create([
            'nombre' => 'Alberto',
            'apellido_paterno'=>'Samayoa',
            'apellido_materno' => 'Ramos',
            'genero'=>'Masculino',
        'role' => 'supervisor',
        'email' => 'supervisor@gmail.com',
        'password' => bcrypt('supervisor@gmail.com'),
    ]);
    Usuario::create([
        'nombre' => 'Roberto',
        'role' => 'supervisor',
        'email' => 'supervisor2@gmail.com',
        'password' => bcrypt('supervisor2@gmail.com'),
    ]);
    }
}
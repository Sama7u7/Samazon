<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
                    ClienteSeeder::class,
                    ContadorSeeder::class,
                    EncargadoSeeder::class,
                    SupervisorSeeder::class,
                    VendedorSeeder::class,
                    CategoriaSeeder::class,
                    ProductosSeeder::class
                ]
        );
    }
}
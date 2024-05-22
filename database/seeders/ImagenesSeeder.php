<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Imagen;
use App\Models\Producto;
use Illuminate\Database\Seeder;

class ImagenesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for ($i = 1; $i <= 30; $i++) {
        Imagen::create([
            'producto_id' => $i,
            'nombre' => '1716310837.png',
        ]);
        }
        
    }
}
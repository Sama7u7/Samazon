<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('role');
            $table->string('email')->unique(); // Agrega la restricción unique
            $table->string('nombre')->nullable()->default(null);
            $table->string('apellido_paterno')->nullable()->default(null);
            $table->string('apellido_materno')->nullable()->default(null);
            $table->enum('genero',['Masculino' , 'Femenino']);
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
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
        Schema::create('preguntas', function (Blueprint $table) {
            $table->id();
            $table->string('content'); // Contenido de la pregunta o respuesta
            $table->enum('type', ['pregunta', 'respuesta']); // Tipo: pregunta o respuesta
            $table->bigInteger('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('productos');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preguntas');
    }
};
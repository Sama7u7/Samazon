<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('monto');
            $table->enum('estado_transaccion', ['en-proceso', 'validada','rechazada',  'en-envio', 'entregado'])->default('en-proceso');
            $table->enum('estado_pago', ['pendiente', 'pagado'])->default('pendiente');
            $table->integer('calificacion')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->string('voucher')->nullable();
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('usuarios')->onDelete('cascade');
           
        });

        Schema::create('transaction_producto', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transaction_id');
            $table->unsignedBigInteger('producto_id');
            $table->integer('cantidad');
            $table->timestamps();

            $table->foreign('transaction_id')->references('id')->on('transactions')->onDelete('cascade');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaction_producto');
        Schema::dropIfExists('transactions');
    }
}
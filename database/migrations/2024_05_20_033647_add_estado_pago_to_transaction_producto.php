<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEstadoPagoToTransactionProducto extends Migration
{
    public function up()
    {
        Schema::table('transaction_producto', function (Blueprint $table) {
            $table->string('estado_pago')->default('pendiente');
        });
    }

    public function down()
    {
        Schema::table('transaction_producto', function (Blueprint $table) {
            $table->dropColumn('estado_pago');
        });
    }
}
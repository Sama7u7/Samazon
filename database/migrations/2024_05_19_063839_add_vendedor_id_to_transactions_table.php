<?php

// database/migrations/XXXX_XX_XX_XXXXXX_add_vendedor_id_to_transactions_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVendedorIdToTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaction_producto', function (Blueprint $table) {
            $table->unsignedBigInteger('propietario_id')->after('producto_id');
            $table->foreign('propietario_id')->references('propietario_id')->on('productos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropForeign(['propietario_id']);
            $table->dropColumn('propietario_id');
        });
    }
}
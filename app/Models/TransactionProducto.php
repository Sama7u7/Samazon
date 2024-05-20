<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class TransactionProducto extends Pivot
{
    protected $table = 'transaction_producto';

    protected $fillable = [
        'transaction_id', 'producto_id', 'propietario_id', 'cantidad', 'estado_pago'
    ];
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }
}
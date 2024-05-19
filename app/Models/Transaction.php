<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'voucher',
        'monto', // Nuevo campo
        'estado_transaccion', // Nuevo campo
        'estado_pago',
         'calificacion' // Nuevo campo
    ];

    // Relación con los productos
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'transaction_producto')
                    ->withPivot('cantidad')
                    ->withTimestamps();
    }

    // Relación con el usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'user_id');
    }
}
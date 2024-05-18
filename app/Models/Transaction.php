<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'voucher'];

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'transaction_producto')
                    ->withPivot('cantidad')
                    ->withTimestamps();
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'user_id');
    }
}
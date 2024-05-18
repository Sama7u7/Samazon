<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    use HasFactory;

    protected $fillable = ['user_id'];

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'carrito_producto')
                    ->withPivot('cantidad')
                    ->withTimestamps();
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'user_id');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Pregunta extends Model
{
    use HasFactory;

    protected $fillable = [
        'pregunta',
        'respuesta',
        'product_id',
        'user_id',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'product_id');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'user_id');
    }
}
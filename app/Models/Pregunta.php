<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Pregunta extends Model
{
    protected $fillable = ['content', 'type', 'product_id'];

    public function product()
    {
        return $this->belongsTo(Producto::class);
    }

    public function respuestas()
    {
        return $this->hasMany(Respuesta::class);
    }
}
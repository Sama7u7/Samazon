<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'fecha_publicacion', 'descripcion','precio', 'cantidad', 'categoria_id'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function propietario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function preguntas()
    {
        return $this->hasMany(Pregunta::class, 'product_id');
    }
    public function imagenes()
    {
        return $this->hasMany(Imagen::class);
    }
    public function carritos()
    {
        return $this->belongsToMany(Carrito::class, 'carrito_producto')
                    ->withPivot('cantidad')
                    ->withTimestamps();
    }

    public function transacciones()
    {
        return $this->belongsToMany(Transaction::class)->withPivot('cantidad');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','fecha_publicacion','descripcion','cantidad','categoria_id','pregunta_id' ];
 
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function propietario(){
        return $this->belongsTo(Usuario::class);
    }
}
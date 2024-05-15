<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    protected $fillable = ['content', 'type', 'pregunta_id', 'user_id'];

    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class);
    }
}
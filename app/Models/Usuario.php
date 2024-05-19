<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Usuario extends Model implements AuthenticatableContract
{
    use HasFactory, AuthenticatableTrait;
    
    protected $table = 'usuarios';
    protected $fillable = [
        'email',
        'password',
        'role',
    ];
    public function productos()
{
    return $this->hasMany(Producto::class, 'propietario_id');
}
public function productosVendidos()
    {
        return $this->hasMany(Producto::class, 'propietario_id');
    }
}
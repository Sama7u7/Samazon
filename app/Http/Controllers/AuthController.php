<?php

// app/Http/Controllers/AuthController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;

class AuthController extends Controller
{
    

    public function valida(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        // Intentar autenticar al usuario
        if (Auth::attempt($credentials)) {
            // Autenticación exitosa
            $user = Auth::user();
            
            // Redirigir al usuario según su rol
            return redirect()->route($user->role);
        } else {
            // Autenticación fallida
            return redirect()->route('login')->withErrors(['email' => 'Credenciales incorrectas']);
        }
    }
    
}
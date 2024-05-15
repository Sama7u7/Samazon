<?php

// app/Http/Controllers/AuthController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    

    public function valida(Request $request)
{
    Session::flush();
    $credentials = $request->only('email', 'password');

    // Intentar autenticar al usuario
    if (Auth::attempt($credentials)) {
        // Autenticación exitosa
        $user = Auth::user();

        // Almacenar el correo electrónico del usuario en la sesión
        session(['email' => $user->email]);
        session(['nombre' => $user->nombre]);
        session(['id' => $user->id]);

        // Redirigir al usuario según su rol
        return redirect()->route($user->role);
    } else {
        // Autenticación fallida
        return redirect()->route('login')->withErrors(['email' => 'Credenciales incorrectas']);
    }
}

    
}
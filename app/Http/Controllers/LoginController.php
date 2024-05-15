<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; // Importa la clase Hash
use App\Models\Usuario;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function valida(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        $user = Usuario::where('email', $credentials['email'])->first(); // Busca al usuario por su email
    
        if ($user && Hash::check($credentials['password'], $user->password)) {
            // Generar un token de autenticación único
            $token = Str::random(60);
            
            // Asignar el token al usuario y guardarlo en la base de datos
            $user->token = $token;
            $user->save();
    
            // Redirigir al usuario según su rol
            return redirect()->route($user->role)->with('api_token', $token);
        } else {
            return redirect()->route('login')->withErrors(['email' => 'Credenciales incorrectas']);
        }
    }

     public function logout(Request $request)
    {
        Auth::logout(); // Cierra la sesión del usuario autenticado

        $request->session()->invalidate(); // Invalida la sesión existente

        $request->session()->regenerateToken(); // Genera un nuevo token CSRF para la sesión

        return redirect('/'); // Redirige al usuario a la página de inicio de sesión
    }
    
}
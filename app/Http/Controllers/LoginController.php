<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; // Importa la clase Hash
use App\Models\Usuario;

class LoginController extends Controller
{
    public function valida(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $user = Usuario::where('email', $credentials['email'])->first(); // Busca al usuario por su email

        if ($user && Hash::check($credentials['password'], $user->password)) {
            // Si las credenciales son válidas, redirigir al usuario según su rol
            return redirect()->route($user->role); // Redirigir según el rol del usuario
        } else {
            return redirect()->route('login')->withErrors(['email' => 'Credenciales incorrectas']);
        }
    }
}

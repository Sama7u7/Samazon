<?php

namespace App\Http\Controllers;
use App\Models\Pregunta;
use Illuminate\Http\Request;


class PreguntaController extends Controller
{
    //
    
    public function store(Request $request)
{
    // Validar los datos recibidos del formulario
    $request->validate([
        'content' => 'required|string|max:255',
        'product_id' => 'required|exists:productos,id',
    ]);

    // Crear una nueva pregunta
    $pregunta = new Pregunta();
    $pregunta->content = $request->content;
    $pregunta->type = 'pregunta';
    $pregunta->product_id = $request->product_id;
    // Aquí deberías asignar también el ID del usuario autenticado si es necesario
    $pregunta->user_id = auth()->id();
    $pregunta->save();

    return back()->with('success', 'La pregunta se ha enviado correctamente.');
}

}
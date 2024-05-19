<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use App\Models\Pregunta;
use App\Models\Transaction;
use App\Models\Respuesta;
use App\Models\Usuario;
use Illuminate\Http\Request;

class VendedorController extends Controller
{
    // Función para mostrar las preguntas de un producto y permitir responder
    public function preguntasVendedor()
    {
        $vendedorId = auth()->id();
    
        // Obtener todos los productos del vendedor
        $productos = Producto::where('propietario_id', $vendedorId)->get();
    
        // Obtener las preguntas asociadas a los productos del vendedor autenticado
        $preguntas = auth()->user()->productos()->with('preguntas.producto')->get()->pluck('preguntas')->flatten();
    
        return view('vendedor.responder-preguntas', compact('productos', 'preguntas'));
    }

    public function guardarRespuesta(Request $request, $preguntaId)
{
    // Validar los datos recibidos del formulario
    $request->validate([
        'respuesta' => 'required|string|max:255',
    ]);

    // Encontrar la pregunta existente por su ID
    $pregunta = Pregunta::findOrFail($preguntaId);

    // Asignar la respuesta recibida del formulario a la pregunta existente
    $pregunta->respuesta = $request->respuesta;

    // Guardar la pregunta con la respuesta actualizada
    $pregunta->save();

    return back()->with('success', 'La respuesta se ha enviado correctamente.');
}
public function verProductosVendidos()
{
    $user = Auth::user();

    // Obtener transacciones donde el usuario es el propietario del producto
    $transacciones = Transaction::whereHas('productos', function ($query) use ($user) {
        $query->where('productos.propietario_id', $user->id); // Calificar con el nombre de la tabla 'productos'
    })->get();

    return view('vendedor.productos-vendidos', compact('transacciones'));
}



}
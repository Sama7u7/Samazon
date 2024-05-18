<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class CarritoController extends Controller
{
    public function agregar(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
        $carrito = session()->get('carrito', []);
    
        // Verificar si la cantidad que se intenta agregar excede la cantidad disponible
        $cantidadAAgregar = isset($carrito[$id]) ? $carrito[$id]['cantidad'] + 1 : 1;
        if ($cantidadAAgregar > $producto->cantidad) {
            return redirect()->route('cliente')->with('error', 'No hay suficientes existencias del producto "'.$producto->nombre.'" para agregarlo al carrito.');
        }
    
        // Agregar el producto al carrito
        if (isset($carrito[$id])) {
            $carrito[$id]['cantidad']++;
        } else {
            $imagenNombre = $producto->imagenes->isNotEmpty() ? $producto->imagenes->first()->nombre : null;
            $carrito[$id] = [
                "nombre" => $producto->nombre,
                "cantidad" => 1,
                "precio" => $producto->precio,
                "imagen" => $imagenNombre,
            ];
        }
    
        session()->put('carrito', $carrito);
        return redirect()->route('cliente')->with('success', 'Producto "'.$producto->nombre.'" añadido al carrito.');
    }
    

    
    
    

    public function eliminar(Request $request, $id)
    {
        $carrito = session()->get('carrito');

        if(isset($carrito[$id])) {
            unset($carrito[$id]);
            session()->put('carrito', $carrito);
        }

        return redirect()->route('carrito.mostrar')->with('success', 'Producto eliminado del carrito');
    }

    public function mostrar()
    {
        $carrito = session()->get('carrito');
        return view('cliente.carrito', compact('carrito'));
    }
}



   

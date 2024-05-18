<?php
// CarritoController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class CarritoController extends Controller
{
    public function agregar(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
        $carrito = session()->get('carrito', []);

        $imagenNombre = null;
        if ($producto->imagenes->isNotEmpty()) {
            $imagenNombre = $producto->imagenes->first()->nombre;
        }

        if (isset($carrito[$id])) {
            if ($carrito[$id]['cantidad'] < $producto->cantidad) {
                $carrito[$id]['cantidad']++;
            } else {
                return redirect()->route('cliente')->with('error', 'No puedes añadir más de la cantidad disponible.');
            }
        } else {
            $carrito[$id] = [
                "nombre" => $producto->nombre,
                "cantidad" => 1,
                "precio" => $producto->precio,
                "imagen" => $imagenNombre,
                "existencias" => $producto->cantidad,
            ];
        }

        session()->put('carrito', $carrito);
        return redirect()->route('cliente')->with('success', 'Producto añadido al carrito');
    }

    public function eliminar($id)
    {
        $carrito = session()->get('carrito', []);
        if (isset($carrito[$id])) {
            unset($carrito[$id]);
            session()->put('carrito', $carrito);
        }
        return redirect()->route('carrito.mostrar')->with('success', 'Producto eliminado del carrito');
    }


    public function verCarrito()
{
    $carrito = session()->get('carrito', []);
    $total = 0;

    foreach ($carrito as $id => $detalles) {
        $total += $detalles['precio'] * $detalles['cantidad'];
    }

    return view('cliente.carrito', compact('carrito', 'total'));
}

   
}
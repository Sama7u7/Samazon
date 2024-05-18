<?php
// CarritoController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Carrito;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{   public function __construct()
    {
        $this->middleware('auth');
    }

    public function agregar(Request $request, $productoId)
{
    $user = Auth::user();
    $producto = Producto::findOrFail($productoId);

    // Busca o crea un carrito para el usuario
    $carrito = Carrito::firstOrCreate(['user_id' => $user->id]);

    // Busca el item en el carrito o crea uno nuevo
    $cartItem = $carrito->productos()->where('producto_id', $productoId)->first();

    if ($cartItem) {
        if ($cartItem->pivot->cantidad < $producto->cantidad) {
            $cartItem->pivot->increment('cantidad');
        } else {
            return redirect()->route('cliente')->with('error', 'No puedes añadir más de la cantidad disponible.');
        }
    } else {
        $carrito->productos()->attach($productoId, ['cantidad' => 1]);
    }

    return redirect()->route('cliente')->with('success', 'Producto añadido al carrito');
}

    public function eliminar($id)
    {
        $user = Auth::user();
        $carrito = Carrito::where('user_id', $user->id)->firstOrFail();
        $carrito->productos()->detach($id);

        return redirect()->route('carrito.mostrar')->with('success', 'Producto eliminado del carrito');
    }

    public function actualizar(Request $request, $id)
    {
        $user = Auth::user();
        $carrito = Carrito::where('user_id', $user->id)->firstOrFail();
        $cartItem = $carrito->productos()->where('producto_id', $id)->firstOrFail();

        $cantidadNueva = $request->input('cantidad');
        $producto = Producto::findOrFail($cartItem->id);

        if ($cantidadNueva > $producto->cantidad) {
            return redirect()->route('carrito.mostrar')->with('error', 'No puedes añadir más de la cantidad disponible.');
        }

        $cartItem->pivot->cantidad = $cantidadNueva;
        $cartItem->pivot->save();

        return redirect()->route('carrito.mostrar')->with('success', 'Cantidad actualizada');
    }

    public function mostrar()
    {
        $user = Auth::user();
        $carrito = Carrito::where('user_id', $user->id)->with('productos')->first();
        $total = 0;

        if ($carrito) {
            $total = $carrito->productos->sum(function ($item) {
                return $item->precio * $item->pivot->cantidad;
            });
        }

        return view('cliente.carrito', ['carrito' => $carrito, 'total' => $total]);
    }

    public function checkout()
    {
        $user = Auth::user();
        $carrito = Carrito::where('user_id', $user->id)->first();

        if ($carrito) {
            $carrito->productos()->detach();
            $carrito->delete();
        }

        return redirect()->route('cliente')->with('success', 'Compra realizada con éxito');
    }
}
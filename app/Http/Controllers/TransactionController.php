<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Producto;
use App\Models\Carrito;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function crearTransaccion(Request $request)
    {
        $user = Auth::user();

        // Validar el voucher
        $request->validate([
            'voucher' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // Subir el voucher
        if ($request->hasFile('voucher')) {
            $voucherPath = $request->file('voucher')->store('vouchers', 'public');
        }

        // Crear la transacción
        $transaction = Transaction::create([
            'user_id' => $user->id,
            'voucher' => $voucherPath,
        ]);

        // Obtener el carrito
        $carrito = Carrito::where('user_id', $user->id)->first();

        // Agregar productos del carrito a la transacción y actualizar existencias
        foreach ($carrito->productos as $producto) {
            $transaction->productos()->attach($producto->id, ['cantidad' => $producto->pivot->cantidad]);

            // Actualizar existencias del producto
            $producto->cantidad -= $producto->pivot->cantidad;
            $producto->save();
        }

        // Vaciar el carrito
        $carrito->productos()->detach();

        return redirect()->route('cliente')->with('success', 'Transacción realizada exitosamente');
    }

    public function verFormulario()
    {
        $user = Auth::user();
        $carrito = Carrito::where('user_id', $user->id)->first();
        $productos = $carrito->productos;
        $total = 0;

        foreach ($productos as $producto) {
            $total += $producto->precio * $producto->pivot->cantidad;
        }

        return view('cliente.transaccion', compact('productos', 'total'));
    }

    public function verTransacciones()
    {
        $user = Auth::user();

        if ($user->role == 'vendedor') {
            $transacciones = Transaction::whereHas('productos', function ($query) use ($user) {
                $query->where('vendedor_id', $user->id);
            })->get();
        } else {
            $transacciones = Transaction::where('user_id', $user->id)->get();
        }

        return view('cliente.transacciones', compact('transacciones'));
    }
}
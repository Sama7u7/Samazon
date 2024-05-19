<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Carrito;
use App\Models\Producto;
use Illuminate\Http\Request;
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

    // Obtener el carrito
    $carrito = Carrito::where('user_id', $user->id)->first();

    // Calcular el monto total del carrito
    $montoTotal = 0;
    foreach ($carrito->productos as $producto) {
        $montoTotal += $producto->precio * $producto->pivot->cantidad;
    }

    // Crear la transacción
    $transaction = Transaction::create([
        'user_id' => $user->id,
        'voucher' => $voucherPath,
        'monto' => $montoTotal, // Agregar el monto total
        'estado_transaccion' => 'en-proceso', // Estado inicial de la transacción
        'estado_pago' => 'pendiente', // Estado inicial del pago
    ]);

    // Agregar productos del carrito a la transacción y actualizar existencias
    foreach ($carrito->productos as $producto) {
        $transaction->productos()->attach($producto->id, [
            'cantidad' => $producto->pivot->cantidad,
            'propietario_id' => $producto->propietario_id // Agregar propietario_id
        ]);

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


    public function verCompras()
    {
        $user = Auth::user();
        $transacciones = Transaction::where('user_id', $user->id)->get();

        return view('cliente.compras', compact('transacciones'));
    }

    public function detallesTransaccion($id)
    {
        $transaccion = Transaction::with('productos')->findOrFail($id);
        if ($transaccion->user_id !== Auth::id()) {
            abort(403, 'This action is unauthorized.');
        }
        return view('cliente.detalles', compact('transaccion'));
    }


    public function calificar(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $transaction = Transaction::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $transaction->calificacion = $request->rating;
        $transaction->save();

        return redirect()->back()->with('success', 'Calificación guardada correctamente');
    }


}
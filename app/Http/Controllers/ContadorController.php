<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionProducto;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContadorController extends Controller
{
    public function verProductosVendidos()
    {
        // Obtener los productos vendidos de transacciones no pagadas
        $productosVendidos = TransactionProducto::with(['producto', 'transaction', 'producto.propietario'])
            ->where('estado_pago', 'pendiente')
            ->get();

        // Agrupar productos por vendedor
        $productosAgrupadosPorVendedor = [];
        foreach ($productosVendidos as $productoVendido) {
            $vendedorId = $productoVendido->producto->propietario_id;
            $vendedorNombre = $productoVendido->producto->propietario->name;

            if (!isset($productosAgrupadosPorVendedor[$vendedorId])) {
                $productosAgrupadosPorVendedor[$vendedorId] = [
                    'vendedor_id' => $vendedorId,
                    'vendedor_nombre' => $vendedorNombre,
                    'productos' => [],
                    'total' => 0,
                ];
            }

            $productosAgrupadosPorVendedor[$vendedorId]['productos'][] = [
                'transaccion_id' => $productoVendido->transaction_id,
                'nombre' => $productoVendido->producto->nombre,
                'cantidad' => $productoVendido->cantidad,
                'precio' => $productoVendido->producto->precio,
                'subtotal' => $productoVendido->cantidad * $productoVendido->producto->precio,
            ];

            $productosAgrupadosPorVendedor[$vendedorId]['total'] += $productoVendido->cantidad * $productoVendido->producto->precio;
        }

        return view('contador.productos-vendidos', compact('productosAgrupadosPorVendedor'));
    }

    public function realizarPago(Request $request)
    {
        $vendedoresSeleccionados = $request->input('vendedores', []);
        
        if (empty($vendedoresSeleccionados)) {
            return redirect()->back()->with('error', 'No se seleccionaron vendedores para el pago.');
        }
        
        DB::beginTransaction();
        try {
            foreach ($vendedoresSeleccionados as $vendedorId) {
                $transacciones = Transaction::whereHas('productos', function ($query) use ($vendedorId) {
                    $query->where('productos.propietario_id', $vendedorId);
                })->get();
        
                $totalPagar = 0;
                foreach ($transacciones as $transaccion) {
                    foreach ($transaccion->productos as $producto) {
                        if ($producto->pivot->propietario_id == $vendedorId && $producto->pivot->estado_pago == 'pendiente') {
                            $totalPagar += $producto->pivot->cantidad * $producto->precio;
                        }
                    }
                }
        
                if ($totalPagar > 0) {
                    DB::table('pagos')->insert([
                        'vendedor_id' => $vendedorId,
                        'monto' => $totalPagar,
                        'fecha' => now(),
                    ]);
        
                    foreach ($transacciones as $transaccion) {
                        foreach ($transaccion->productos as $producto) {
                            if ($producto->pivot->propietario_id == $vendedorId && $producto->pivot->estado_pago == 'pendiente') {
                                $transaccion->productos()->updateExistingPivot($producto->id, ['estado_pago' => 'pagado']);
                            }
                        }
                    }
                }
            }
        
            DB::commit();
            return redirect()->route('contador.productos-vendidos')->with('success', 'Pago realizado exitosamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Ocurrió un error al realizar el pago: ' . $e->getMessage());
        }
    }

    public function historialPagos()
{
    // Obtener los productos con sus transacciones y propietarios, ordenados por estado_pago
    $productosVendidos = TransactionProducto::with(['producto', 'transaction', 'producto.propietario'])
        ->orderBy('estado_pago', 'asc')
        ->orderBy('transaction_id', 'desc')
        ->get();

    return view('contador.historial-pagos', compact('productosVendidos'));
}

public function verTransacciones()
{
    // Obtener las transacciones con sus productos y usuarios
    $transacciones = Transaction::with(['productos', 'usuario'])
        ->orderBy('created_at', 'desc')
        ->get();

    return view('contador.ver-transacciones', compact('transacciones'));
}

public function validarTransaccion($id)
{
    try {
        $transaccion = Transaction::findOrFail($id);
        $transaccion->estado_transaccion = 'validada';
        $transaccion->save();

        return redirect()->route('contador.ver-transacciones')->with('success', 'Transacción validada exitosamente.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Ocurrió un error al validar la transacción: ' . $e->getMessage());
    }
}
public function rechazarTransaccion($id)
{
    $transaccion = Transaction::findOrFail($id);
    $transaccion->estado_transaccion = 'rechazada';
    $transaccion->save();

    return redirect()->back()->with('success', 'Transacción rechazada.');
}
public function enenvioTransaccion($id)
{
    $transaccion = Transaction::findOrFail($id);
    $transaccion->estado_transaccion = 'en-envio';
    $transaccion->save();

    return redirect()->back()->with('success', 'Pedido en envio.');
}
public function enviadoTransaccion($id)
{
    $transaccion = Transaction::findOrFail($id);
    $transaccion->estado_transaccion = 'entregado';
    $transaccion->save();

    return redirect()->back()->with('success', 'Pedido entregado.');
}


}
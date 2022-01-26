<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\PedidoDetalle;
use App\CarroCompra;
use Carbon\Carbon;
use DB;
use Auth;

class PedidoController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(
            Pedido::where('user_cliente_id',$request->user()->id)->get()
        );
    }

    public function show($pedido_id)
    {
        return response()->json(
            PedidoDetalle::
            join('productos','productos.id','pedido_detalles.producto_id')
            ->select('*','productos.id as producto_id', 'pedido_detalles.id as pedido_detalle_id')
            ->where('pedido_detalles.id',$pedido_id)->get()
        );
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $total = 0;

            $pedido = Pedido::create([
                'user_cliente_id' => Auth::id(),
                'fecha_hora' => Carbon::now(),
                'total_bruto' => $total
            ]);

            $carrito = CarroCompra::
                join('productos','productos.id','carro_compras.producto_id')
                ->select('*','productos.id as producto_id', 'carro_compras.id as carro_compra_id')
                ->whereUserId($request->user()->id)->get();


            foreach ($carrito as $value) {
                $subtotal = $value->cantidad * $value->precio_venta;
                $total = $total + $subtotal;
                PedidoDetalle::create([
                    'pedido_id' => $pedido->id,
                    'producto_id' => $value->producto_id,
                    'cantidad' => $value->cantidad,
                    'precio_venta' => $value->precio_venta,
                    'subtotal' => $subtotal
                ]);
            }
            $pedido->total_bruto = $total;
            $pedido->save();

            CarroCompra::whereUserId(Auth::id())->delete();

            DB::commit();

            return response()->json([
                'status' => 'success',
                'mensaje' => "Pedido enviado con exito."
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'status' => 'error',
                'mensaje' => $e->getMessage()
            ]);
        }
        
    }
}

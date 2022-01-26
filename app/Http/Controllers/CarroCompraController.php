<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CarroCompra;
use Auth;

class CarroCompraController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(
            CarroCompra::
            join('productos','productos.id','carro_compras.producto_id')
            ->select('*','productos.id as producto_id', 'carro_compras.id as carro_compra_id')
            ->whereUserId($request->user()->id)->get()
        );
    }

    public function store(Request $request)
    {
        $data['user_id'] = $request->user()->id;
        $data['producto_id'] = $request->producto_id;
        $data['cantidad'] = 1;

        $todo = CarroCompra::create($data);

        return response()->json($todo);
    }
    public function destroy($carro_campra_id)
    {
        $carrito = CarroCompra::whereUserId(Auth::id())
        ->where('id',$carro_campra_id)->first();
        $carrito->delete();
        return response()->json('success');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidoDetalle extends Model
{
    protected $fillable = ['pedido_id', 'producto_id','cantidad','precio_venta','subtotal'];
}

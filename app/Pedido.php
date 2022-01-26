<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = ['user_cliente_id', 'fecha_hora','total_bruto'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarroCompra extends Model
{
    protected $fillable = ['user_id', 'producto_id','cantidad'];
}

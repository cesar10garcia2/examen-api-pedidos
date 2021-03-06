<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
Route::post('register','AuthController@register');
Route::post('login','AuthController@login');

Route::group(['middleware'=>'jwt.verify'],function(){
    Route::get('user','AuthController@getUser');
    Route::resource('todos','TodoController');

    Route::resource('productos','ProductoController');
    Route::resource('pedido','PedidoController');
    Route::resource('carro-compra','CarroCompraController');
});
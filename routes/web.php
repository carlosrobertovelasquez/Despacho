<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return redirect ('/login');
});



Auth::routes();

Route::get('/home', 'HomeController@index');




Route::bind('pedidoc',function($pedido){
   return App\Modelos\TCargaPedido::where('pedidos',$pedido)->first();
});

/*
Route::bind('pedido',function($pedido){
   return App\Modelos\Pedido::where('PEDIDO',$pedido)->first();


});
*/




Route::get('/cart','CartController@index');
Route::get('cart/show',['uses'=>'CartController@show','as'=>'Canasta.show']);
Route::get('cart/delete/{pedidoc}',['uses'=>'CartController@delete','as'=>'Canasta.delete']);
Route::get('cart/trash',['uses'=>'CartController@trash','as'=>'Canasta.trash']);
Route::get('cart/add/{pedidoc}',['uses'=>'CartController@add','as'=>'Canasta.add']);
Route::get('TicketDetalle',['uses'=>'CartController@TicketDetalle','as'=>'Canasta.detalle']);
Route::post('GuardarTicket',['uses'=>'CartController@GuardarTicket','as'=>'Canasta.GuardarTicket']);
Route::get('ImpresionTicket',['uses'=>'CartController@ImpresionTicket','as'=>'Canasta.ImpresionTicket']);



Route:: group(['prefix'=> 'maestros'], function() {
    Route::resource('vehiculos', 'VehiculoController');
    Route::get('vehiculos/{id}/destroy',[
            'uses'=> 'VehiculoController@destroy',
            'as'=> 'vehiculos.destroy'
       ]);
    Route::resource('ayudantes', 'AyudanteController');
    Route::resource('motoristas', 'MotoristaController');   
});

Route:: group(['prefix'=> 'transacciones'], function() {
    Route::resource('pedidos', 'PedidoController');
   
    Route::resource('preparos', 'PreparoController');
    Route::resource('fletes', 'FleteController');
    Route::resource('liquidaciones', 'LiquidacionController');   
});





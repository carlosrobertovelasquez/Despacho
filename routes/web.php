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


Route::bind('factura',function($factura){
   return App\Modelos\Softland\Factura::where('FACTURA',$factura)->first();

});





Route::get('/cart','CartController@index');
Route::get('cart/show',['uses'=>'CartController@show','as'=>'Canasta.show']);
Route::get('cart/delete/{pedidoc}',['uses'=>'CartController@delete','as'=>'Canasta.delete']);
Route::get('cart/trash',['uses'=>'CartController@trash','as'=>'Canasta.trash']);
Route::get('cart/add/{pedidoc}',['uses'=>'CartController@add','as'=>'Canasta.add']);
Route::get('cart/pdf/{ticket}',['uses'=>'CartController@pdf','as'=>'Canasta.pdf']);
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
    Route::get('preparos/pdf/{ticket}',['uses'=>'PreparoController@pdf','as'=>'preparos.pdf']);
    Route::get('preparos/revisar/{ticket}',['uses'=>'PreparoController@revisar','as'=>'preparos.revisar']);
    Route::get('preparos/impresionvineta/{ticket}',['uses'=>'PreparoController@impresionvineta','as'=>'preparos.impresionvineta']);

    Route::get('consultaticket',['uses'=>'PreparoController@consultaTicket','as'=>'preparos.consultaticket']);

Route::resource('fletes', 'FleteController');
Route::get('fletes/add/{factura}',['uses'=>'FleteController@add','as'=>'flete.add']);
Route::get('fletes/show',['uses'=>'FleteController@show','as'=>'flete.show']);
Route::get('fletes/delete/{factura}',['uses'=>'FleteController@delete','as'=>'flete.delete']);
Route::get('fletes/trash',['uses'=>'FleteController@trash','as'=>'flete.trash']);
Route::get('fletedetalle',['uses'=>'FleteController@fletedetalle','as'=>'flete.fletedetalle']);
Route::post('GuardarFlete',['uses'=>'FleteController@GuardarFlete','as'=>'flete.GuardarFlete']);    
    
    Route::resource('liquidaciones', 'LiquidacionController');   
});





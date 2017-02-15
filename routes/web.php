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
    Route::resource('preparos', 'PreparoController');
    Route::resource('fletes', 'FleteController');
    Route::resource('liquidaciones', 'LiquidacionController');   
});

  

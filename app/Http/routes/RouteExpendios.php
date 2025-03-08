<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::group(['middleware' => 'auth'], function () {
Route::group(['middleware' => ['auth','permiso']], function () {
Route::PUT('expendios/cerrar/{id}',['as'=>'expendios.procesar','uses'=>'ExpendioController@procesar']);
Route::GET('expendios/restaurar',['as'=>'expendios.restaurar','uses'=>'ExpendioController@restaurar']);
Route::GET('expendios/completar/{id}',['as'=>'expendios.completar','uses'=>'ExpendioController@completar']);
resource('expendios','ExpendioController');

});//####FIN DE MIDDLEWARE AGRUPADO#####
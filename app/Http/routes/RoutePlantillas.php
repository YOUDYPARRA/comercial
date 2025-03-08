<?php
Route::group(['middleware' => ['auth','permiso']], function () {
//Route::PUT('plantillas/cerrar/{id}',['as'=>'plantillas.procesar','uses'=>'ExpendioController@procesar']);
resource('plantillas','PlantillaController');
});
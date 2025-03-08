<?php
Route::group(['middleware' => ['auth','permiso']], function () {
	Route::POST('proyectoventa/observar/{observacion}',['as'=>'proyectoventa.observar','uses'=>'ProyectoVentaController@observar']);
	Route::PUT('proyectoventa/estatus/{estatus}',['as'=>'proyectoventa.estatus','uses'=>'ProyectoVentaController@estatus']);
	Route::PUT('proyectoventa/probabilidad/{estatus}',['as'=>'proyectoventa.probabilidad','uses'=>'ProyectoVentaController@probabilidad']);
	Route::GET('proyectoventa/descarga',['as'=>'proyectoventa.descarga','uses'=>'ProyectoVentaController@descarga']);
	resource('proyectoventa','ProyectoVentaController');
});
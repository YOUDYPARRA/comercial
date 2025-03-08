<?php
Route::group(['middleware' => ['auth','permiso']], function () {
//Route::PUT('plantillas/cerrar/{id}',['as'=>'plantillas.procesar','uses'=>'ExpendioController@procesar']);

Route::PUT('cotizaciones_contratos/cerrar/{id}',['as'=>'cotizaciones_contratos.cerrar','uses'=>'CotizacionContratoController@estatus']);
Route::PUT('cotizaciones_contratos/cancelar/{id}',['as'=>'cotizaciones_contratos.cancelar','uses'=>'CotizacionContratoController@estatus']);

resource('cotizaciones_contratos','CotizacionContratoController');
});
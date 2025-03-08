<?php
Route::group(['middleware' => ['auth','permiso']], function () {
Route::GET('servicios_reporte/create/{id}',['as'=>'cotizaciones_contratos.create','uses'=>'ServicioReporteController@create']);
resource('servicios_reporte','ServicioReporteController');
});
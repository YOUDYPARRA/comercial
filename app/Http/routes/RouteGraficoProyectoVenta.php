<?php
Route::group(['middleware' => ['auth','permiso']], function () {
	resource('grafico_proyecto_venta','GrfProVtaController');
});

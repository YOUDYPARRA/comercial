<?php
Route::group(['middleware' => ['auth','permiso']], function () {
	resource('clasificacion_operacion','ClasificacionOperacionController');
});
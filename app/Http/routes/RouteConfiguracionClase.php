<?php
Route::group(['middleware' => ['auth','permiso']], function () {
	resource('configuracion_clase','ConfiguracionClaseController');
});

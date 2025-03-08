<?php
Route::group(['middleware' => ['auth','permiso']], function () {
	resource('mensualidad','MensualidadController');
});
<?php
Route::group(['middleware' => ['auth','permiso']], function () {
	resource('calificaciones','CalificacionController');
});

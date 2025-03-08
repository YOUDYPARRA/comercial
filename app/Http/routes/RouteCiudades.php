<?php
Route::group(['middleware' => ['auth','permiso']], function () {
	resource('ciudad','CiudadController');
});
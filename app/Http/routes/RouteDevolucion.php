<?php
Route::group(['middleware' => ['auth','permiso']], function () {
	resource('devoluciones','DevolucionController');
});

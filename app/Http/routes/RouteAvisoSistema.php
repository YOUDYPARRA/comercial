<?php
Route::group(['middleware' => ['auth','permiso']], function () {
	resource('avisos_sistema','AvisoSistemaController');
});

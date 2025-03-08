<?php
Route::group(['middleware' => ['auth','permiso']], function () {
resource('estado','EstadoController');
});
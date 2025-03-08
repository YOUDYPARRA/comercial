<?php
Route::group(['middleware' => ['auth','permiso']], function () {
resource('almacenstock','AlmacenStockController');
resource('pendiente_stock','PendienteStockController');
});
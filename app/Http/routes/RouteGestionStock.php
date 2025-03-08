<?php
Route::group(['middleware' => ['auth','permiso']], function () {
resource('gestionstock','GestionStockController');
});
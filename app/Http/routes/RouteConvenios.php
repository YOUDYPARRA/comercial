<?php
Route::group(['middleware' => ['auth','permiso']], function () {
resource('convenios','ConvenioController');
});
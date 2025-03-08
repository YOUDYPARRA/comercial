<?php
Route::group(['middleware' => ['auth','permiso']], function () {
	resource('uom_convertion','UomConvertionController');
});
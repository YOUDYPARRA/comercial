<?php
Route::group(['middleware' => ['auth','permiso']], function () {
	Route::PUT('tikcet/enviar/{id}',['as'=>'tikcet.enviar','uses'=>'TicketController@enviar']);
	resource('tikcet','TicketController');
});
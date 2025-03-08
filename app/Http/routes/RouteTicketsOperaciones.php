<?php
Route::group(['middleware' => ['auth','permiso']], function () {
	Route::PUT('ticket_operacion/enviar/{id}',['as'=>'ticket_operacion.enviar','uses'=>'TicketOperacionController@enviar']);
	resource('ticket_operacion','TicketOperacionController');
});
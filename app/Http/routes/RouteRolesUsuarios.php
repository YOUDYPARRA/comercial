<?php
Route::group(['middleware' => ['auth','permiso']], function () {
	resource('roles_usuarios','RolUsuarioController');
});

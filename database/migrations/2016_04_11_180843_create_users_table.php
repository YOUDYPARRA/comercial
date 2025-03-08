<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
//            $table->integer('id')->unique();
            $table->increments('id')->unique();
            $table->string('name');
            $table->string('iniciales');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('puesto');
            $table->string('area');
            $table->string('lugar_centro_costo');
            $table->string('departamento');
            $table->integer('centro_costo');
            $table->string('tipo_usuario');
            $table->string('org_name');
            $table->string('numero_empleado');
            $table->string('c_bpartner_id');
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}

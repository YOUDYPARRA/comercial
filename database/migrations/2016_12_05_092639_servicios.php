<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Servicios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('servicios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_foraneo',90);
            $table->string('monto_gasto',90);
            $table->string('monto_gasto_diverso',90);
            $table->string('describe_gasto_diverso',90);
            $table->string('validada',90);
            $table->string('digitalizacion',90);
            $table->string('mostrar_entrega',90);//defalt S
            $table->string('conclusion_trabajo',90);
            $table->string('descripcion_archivado',90);
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
        //
        Schema::drop('servicios');
    }
}

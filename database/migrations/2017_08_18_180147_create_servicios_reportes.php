<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiciosReportes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('servicios_reportes')) {
        //
        Schema::create('servicios_reportes', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('id_reporte',9,0);
            $table->decimal('id_horario',9,0);
            $table->decimal('id_ingeniero_atencion',9,0);
            $table->decimal('id_servicio',9,0);
            $table->string('clase',90);
            $table->string('subclase',90);
            $table->string('organizacion',90);
            $table->string('sucursal',90);
            $table->string('dato',90);
            $table->timestamps();
        });
    }
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('servicios_reportes');
    }
}

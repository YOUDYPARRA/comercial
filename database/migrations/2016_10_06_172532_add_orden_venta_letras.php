<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrdenVentaLetras extends Migration
{
    /**
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ordenes_ventas', function (Blueprint $table) {
         $table->string('letras',90);//
         $table->string('tipo_cambio',90);//
         $table->string('iniciales_asignado',90);// 

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
        Schema::table('ordenes_ventas', function (Blueprint $table) {
            Schema::dropColumn('letras',90);//
            Schema::dropColumn('tipo_cambio',90);//
            Schema::dropColumn('iniciales_asignado',90);//
        });
    }
}

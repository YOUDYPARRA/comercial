<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVersionCompraVenta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('compras_ventas', function (Blueprint $table) {
            $table->string('version',10);//SIN OBSERVACION
            $table->string('group_name',100);//SIN OBSERVACION
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('compras_ventas', function (Blueprint $table) {
            Schema::dropColumn('version',10);//
            Schema::dropColumn('group_name',100);//SIN OBSERVACION
        });
    }
}

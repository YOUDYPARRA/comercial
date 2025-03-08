<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddClaseInsumosComprasVentas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('insumos_compras_ventas', function (Blueprint $table) {
            //
            $table->string('clase',90);//
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('insumos_compras_ventas', function (Blueprint $table) {
            //
            $table->dropColumn('clase');
        });
    }
}

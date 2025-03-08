<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInsumos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('insumos', function (Blueprint $table) {
            $table->string('unidades_minimo_compra',90);//
            $table->string('unidades_venta',90);//
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
        Schema::table('insumos', function (Blueprint $table) {
            $table->dropColumn('unidades_minimo_compra');//ok
            $table->dropColumn('unidades_venta');//ok
        });
    }
}

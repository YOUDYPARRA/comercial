<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrdenVentaPedido extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('ordenes_ventas', function (Blueprint $table) {
         $table->string('no_pedido',90);//

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
         Schema::dropColumn('no_pedido',90);//

        });
    }
}

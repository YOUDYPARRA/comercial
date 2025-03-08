<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SolicitudCompra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('compras', function (Blueprint $table) {
            //

             $table->string('nota',150);//observacion interno
             $table->string('nombre_autor',90);//
             $table->string('orden_compra_cliente',90);//
        });
    }

public function down()
    {
        //
        Schema::table('compras', function (Blueprint $table) {
            Schema::dropColumn('nota');
            Schema::dropColumn('nombre_autor');
            Schema::dropColumn('orden_compra_cliente');
        });
        
    }



}

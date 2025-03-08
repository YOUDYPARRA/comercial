<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPrestamosApi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prestamos', function (Blueprint $table) {
        $table->string('id_camp_publ',90);//
        $table->string('org_id',90);//ok
         $table->string('org_name',90);//ok
         $table->string('id_warehouse',90);//ok
         $table->string('id_doctype_target',90);//ok
         $table->string('condicion_facturacion',90);//ok         
         $table->string('c_bpartner_id',90);//ok
         $table->string('c_bpartner_location',90);//ok
         $table->string('c_order_id',90);//ok
         $table->string('tipo_moneda',90);//ok
         $table->string('tipo_envio',90);//ok
         $table->string('metodo_pago',90);//ok
         $table->string('centro_costo',90);//ok
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prestamos', function (Blueprint $table) {
         $table->dropColumn('id_camp_publ');//
         $table->dropColumn('org_id');//ok
         $table->dropColumn('org_name');//ok
         $table->dropColumn('id_warehouse');//ok
         $table->dropColumn('id_doctype_target');//ok
         $table->dropColumn('condicion_facturacion');//  ok       
         $table->dropColumn('c_bpartner_id');//ok
         $table->dropColumn('c_bpartner_location');//ok
         $table->dropColumn('c_order_id');//ok
         $table->dropColumn('tipo_moneda');//ok
         $table->dropColumn('tipo_envio');//ok
         $table->dropColumn('metodo_pago');//ok
         $table->dropColumn('centro_costo');//ok
        });
    }
}

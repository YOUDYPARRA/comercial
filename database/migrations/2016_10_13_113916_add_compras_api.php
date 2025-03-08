<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddComprasApi extends Migration
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
        $table->string('id_camp_publ',90);//
        $table->string('org_id',90);//
         $table->string('org_name',90);//
         $table->string('c_location_id',90);//
         $table->string('id_warehouse',90);//
         $table->string('tipo_moneda',90);//
         $table->string('condicion_facturacion',90);//         
         $table->string('c_bpartner_id',90);//
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('compras', function (Blueprint $table) {
            //
         $table->dropColumn('id_camp_publ');//
         $table->dropColumn('org_id');//
         $table->dropColumn('org_name');//
         $table->dropColumn('c_location_id');//
         $table->dropColumn('id_warehouse');//
         $table->dropColumn('tipo_moneda');//
         $table->dropColumn('condicion_facturacion');//         
         $table->dropColumn('c_bpartner_id');//
        });
    }
}

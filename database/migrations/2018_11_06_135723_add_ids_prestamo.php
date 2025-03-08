<?php


use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdsPrestamo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if (!Schema::hasColumn('insumos_compras_ventas', 'id_prestamo')) {
          Schema::table('insumos_compras_ventas', function (Blueprint $table) {
              $table->string('id_prestamo',90);
              $table->string('id_insumo_prestamo',90);
              $table->integer('calculo')->default(0);
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
        Schema::table('insumos_compras_ventas', function (Blueprint $table) {
            $table->dropColumn('id_prestamo');//    
            $table->dropColumn('id_insumo_prestamo');//   
            $table->dropColumn('calculo');//           
        });
    }
}

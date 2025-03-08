<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableCotizaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('ALTER TABLE `cotizaciones` MODIFY `nombre_fiscal` varchar(600) NOT NULL;');
        DB::statement('ALTER TABLE `cotizaciones` MODIFY `calle_entrega` varchar(300) NOT NULL;');
        DB::statement('ALTER TABLE `cotizaciones` MODIFY `calle_fiscal` varchar(300) NOT NULL;');
        Schema::table('cotizaciones', function (Blueprint $table) {
            //
            $table->string('documento',90);//
            $table->string('almacen',90);//
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('ALTER TABLE `cotizaciones` MODIFY `nombre_fiscal` varchar(60) NOT NULL;');
        DB::statement('ALTER TABLE `cotizaciones` MODIFY `calle_entrega` varchar(30) NOT NULL;');
        DB::statement('ALTER TABLE `cotizaciones` MODIFY `calle_fiscal` varchar(90) NOT NULL;');
        Schema::table('cotizaciones', function (Blueprint $table) {
            //
            $table->dropColumn('documento');//
            $table->dropColumn('almacen');//
        });
    }
}

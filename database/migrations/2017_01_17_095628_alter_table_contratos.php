<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableContratos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('ALTER TABLE `contratos` MODIFY `conclusion` TEXT(9000) NOT NULL;');
        DB::statement('ALTER TABLE `contratos` MODIFY `refacciones` varchar(900) NOT NULL;');
        DB::statement('ALTER TABLE `contratos` MODIFY `refacciones_excepciones` varchar(900) NOT NULL;');
        DB::statement('ALTER TABLE `contratos` MODIFY `representante_cliente` varchar(900) NOT NULL;');
        //Schema::table('contratos', function (Blueprint $table) {
        // change() tells the Schema builder that we are altering a table
            //$table->string('conclusion',9000)->change();
        //});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
            DB::statement('ALTER TABLE `contratos` MODIFY `conclusion` TEXT(900) NOT NULL;');
            DB::statement('ALTER TABLE `contratos` MODIFY `refacciones` varchar(90) NOT NULL;');
            DB::statement('ALTER TABLE `contratos` MODIFY `refacciones_excepciones` varchar(90) NOT NULL;');
            DB::statement('ALTER TABLE `contratos` MODIFY `representante_cliente` varchar(90) NOT NULL;');  //ADD2017 03 30
        //Schema::table('contratos', function (Blueprint $table) {
        // change() tells the Schema builder that we are altering a table
            //$table->string('conclusion',900)->change();
        //});
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CompraDigital extends Migration
{
    /**
     *
     * @return void
     */
    public function up()
    {
        Schema::table('compras', function (Blueprint $table) {
         $table->string('archivo_digital',90);//

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
        Schema::table('compras', function (Blueprint $table) {
            Schema::dropColumn('archivo_digital');
        });
    }
}

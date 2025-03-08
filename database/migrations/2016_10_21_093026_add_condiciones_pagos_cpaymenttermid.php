<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCondicionesPagosCpaymenttermid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('condiciones_pagos', function (Blueprint $table) {
            //
            $table->string('c_paymentterm_id',90);//
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('condiciones_pagos', function (Blueprint $table) {
            //
            $table->dropColumn('c_paymentterm_id');//
        });
    }
}

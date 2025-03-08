<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UnidadesMedidas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('unidades_medidas', function (Blueprint $table) {
            $table->increments('id');
             $table->string('p_uom_id',90);//
             $table->string('p_user_id',90);//
             $table->string('p_codigo_edi',90);//
             $table->string('p_symbol',90);//
             $table->string('p_name',90);//
             $table->string('p_description',150);//
             $table->string('p_std_precision',90);//
             $table->string('p_costing_precision',90);//
             $table->string('p_uom_type',90)->unique();//W: WEIGHT, v: VOLUME, L: LENGTH, A:AREA, TIME:TIME
             $table->softDeletes();
             $table->timestamps();
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
            Schema::drop('unidades_medidas');
        
    }
}

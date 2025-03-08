<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdrecurso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if (!Schema::hasColumn('permisos', 'id_recurso')) {
          Schema::table('permisos', function (Blueprint $table) {
              $table->string('id_recurso',90);
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
      Schema::table('permisos', function (Blueprint $table) {
          //Schema::dropColumn('id_recurso');//
          $table->dropColumn('id_recurso');//
      });
    }
}

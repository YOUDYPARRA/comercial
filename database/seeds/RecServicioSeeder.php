<?php

use Illuminate\Database\Seeder;

class RecServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
  $data=[
	     [
                'id_menu'=>43,
               'recurso'=>'servicios.show',
                'etiqueta'=>'',
                'observacion'=>''
            ],

            [
                'id_menu'=>43,
                'recurso'=>'servicios.create',
                'etiqueta'=>'CREA',
                'observacion'=>''
            ],[
                'id_menu'=>43,
                'recurso'=>'servicios.restaurar',
                'etiqueta'=>'ELIMINADOS',
                'observacion'=>''
            ],[
                'id_menu'=>43,
                'recurso'=>'servicios.edit',
                'etiqueta'=>'',
                'observacion'=>''
            ],[
                'id_menu'=>43,
                'recurso'=>'servicios.index',
                'etiqueta'=>'VER',
                'observacion'=>''
            ],[
                'id_menu'=>43,
                'recurso'=>'servicios.destroy',
                'etiqueta'=>'',
                'observacion'=>''
            ],[
                'id_menu'=>43,
                'recurso'=>'servicios.store',
                'etiqueta'=>'',
                'observacion'=>''
            ],[
                'id_menu'=>43,
                'recurso'=>'servicios.update',
                'etiqueta'=>'',
                'observacion'=>''
            ]
            
        ];
            \DB::table('recursos')->insert(
                    $data
                    ); 
    }
}

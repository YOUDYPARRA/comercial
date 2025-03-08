<?php

use Illuminate\Database\Seeder;

class RecReporteSeeder extends Seeder
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
                'id_menu'=>'41',
               'recurso'=>'reportes.enviar',
                'etiqueta'=>'',
                'observacion'=>''
            ],     [
                'id_menu'=>'41',
               'recurso'=>'reportes.crea',
                'etiqueta'=>'',
                'observacion'=>''
            ],
	        [
                'id_menu'=>'41',
               'recurso'=>'reportes.show',
                'etiqueta'=>'',
                'observacion'=>''
            ],
            [
                'id_menu'=>'41',
                'recurso'=>'reportes.correo',
                'etiqueta'=>'',
                'observacion'=>''
            ], [
                'id_menu'=>'41',
                'recurso'=>'reportes.observar',
                'etiqueta'=>'',
                'observacion'=>''
            ],
            [
                'id_menu'=>'41',
                'recurso'=>'reportes.create',
                'etiqueta'=>'CREA',
                'observacion'=>''
            ],[
                'id_menu'=>'41',
                'recurso'=>'reportes.restaurar',
                'etiqueta'=>'',
                'observacion'=>''
            ],[
                'id_menu'=>'41',
                'recurso'=>'reportes.edit',
                'etiqueta'=>'',
                'observacion'=>''
            ],[
                'id_menu'=>'41',
                'recurso'=>'reportes.index',
                'etiqueta'=>'VER',
                'observacion'=>''
            ],[
                'id_menu'=>'41',
                'recurso'=>'reportes.destroy',
                'etiqueta'=>'',
                'observacion'=>''
            ],[
                'id_menu'=>'41',
                'recurso'=>'reportes.store',
                'etiqueta'=>'',
                'observacion'=>''
            ],[
                'id_menu'=>'41',
                'recurso'=>'reportes.update',
                'etiqueta'=>'',
                'observacion'=>''
            ]
            
        ];
            \DB::table('recursos')->insert(
                    $data
                    );  
    }
}

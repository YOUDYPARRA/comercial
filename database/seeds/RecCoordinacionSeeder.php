<?php

use Illuminate\Database\Seeder;

class RecCoordinacionSeeder extends Seeder
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
                'id_menu'=>'40',
                'recurso'=>'coordinaciones.create',
                'etiqueta'=>'',
                'observacion'=>''
            ],[
                'id_menu'=>'40',
                'recurso'=>'coordinaciones.restaurar',
                'etiqueta'=>'',
                'observacion'=>''
            ],[
                'id_menu'=>'40',
                'recurso'=>'coordinaciones.editar',
                'etiqueta'=>'',
                'observacion'=>''
            ],[
                'id_menu'=>'40',
                'recurso'=>'coordinaciones.index',
                'etiqueta'=>'',
                'observacion'=>''
            ],[
                'id_menu'=>'40',
                'recurso'=>'coordinaciones.destroy',
                'etiqueta'=>'',
                'observacion'=>''
            ],[
                'id_menu'=>'40',
                'recurso'=>'coordinaciones.store',
                'etiqueta'=>'',
                'observacion'=>''
            ],[
                'id_menu'=>'40',
                'recurso'=>'productos.update',
                'etiqueta'=>'',
                'observacion'=>''
            ]
            
        ];
            \DB::table('recursos')->insert(
                    $data
                    );  
    }
}

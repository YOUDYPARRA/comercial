<?php

use Illuminate\Database\Seeder;

class RecProgramacionSeeder extends Seeder
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
                'id_menu'=>'42',
                'recurso'=>'programaciones.corrreo',
                'etiqueta'=>'',
                'observacion'=>''
            ],[
                'id_menu'=>'42',
                'recurso'=>'programaciones.create',
                'etiqueta'=>'',
                'observacion'=>''
            ],[
                'id_menu'=>'42',
                'recurso'=>'programaciones.restaurar',
                'etiqueta'=>'',
                'observacion'=>''
            ],[
                'id_menu'=>'42',
                'recurso'=>'programaciones.edit',
                'etiqueta'=>'',
                'observacion'=>''
            ],[
                'id_menu'=>'42',
                'recurso'=>'programaciones.index',
                'etiqueta'=>'VER',
                'observacion'=>''
            ],[
                'id_menu'=>'42',
                'recurso'=>'programaciones.destroy',
                'etiqueta'=>'',
                'observacion'=>''
            ],[
                'id_menu'=>'42',
                'recurso'=>'programaciones.store',
                'etiqueta'=>'',
                'observacion'=>''
            ],[
                'id_menu'=>'42',
                'recurso'=>'programaciones.update',
                'etiqueta'=>'',
                'observacion'=>''
            ]
            
        ];
            \DB::table('recursos')->insert(
                    $data
                    );
    }
}

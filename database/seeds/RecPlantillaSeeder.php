<?php

use Illuminate\Database\Seeder;

class RecPlantillaSeeder extends Seeder
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
                'id_menu'=>'47',
                'recurso'=>'plantillas.create',
                'etiqueta'=>'CREAR',
                'observacion'=>''
            ],[
                'id_menu'=>'47',
                'recurso'=>'plantillas.edit',
                'etiqueta'=>'',
                'observacion'=>''
            ],[
                'id_menu'=>'47',
                'recurso'=>'plantillas.index',
                'etiqueta'=>'VER',
                'observacion'=>''
            ],[
                'id_menu'=>'47',
                'recurso'=>'plantillas.destroy',
                'etiqueta'=>'',
                'observacion'=>''
            ],[
                'id_menu'=>'47',
                'recurso'=>'plantillas.store',
                'etiqueta'=>'',
                'observacion'=>''
            ],[
                'id_menu'=>'47',
                'recurso'=>'plantillas.update',
                'etiqueta'=>'',
                'observacion'=>''
            ]
            
        ];
            \DB::table('recursos')->insert(
                    $data
                    );
    }
}

<?php

use Illuminate\Database\Seeder;

class RecExpendidosSeeder extends Seeder
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
                'id_menu'=>'46',
                'recurso'=>'expendios.procesar',
                'etiqueta'=>'',
                'observacion'=>''
            ],[
                'id_menu'=>'46',
                'recurso'=>'expendios.create',
                'etiqueta'=>'CREAR',
                'observacion'=>''
            ],[
                'id_menu'=>'46',
                'recurso'=>'expendios.restaurar',
                'etiqueta'=>'',
                'observacion'=>''
            ],[
                'id_menu'=>'46',
                'recurso'=>'expendios.edit',
                'etiqueta'=>'',
                'observacion'=>''
            ],[
                'id_menu'=>'46',
                'recurso'=>'expendios.index',
                'etiqueta'=>'VER',
                'observacion'=>''
            ],[
                'id_menu'=>'46',
                'recurso'=>'expendios.destroy',
                'etiqueta'=>'',
                'observacion'=>''
            ],[
                'id_menu'=>'46',
                'recurso'=>'expendios.store',
                'etiqueta'=>'',
                'observacion'=>''
            ],[
                'id_menu'=>'46',
                'recurso'=>'expendios.update',
                'etiqueta'=>'',
                'observacion'=>''
            ]
            
        ];
            \DB::table('recursos')->insert(
                    $data
                    );
    }
}

<?php

use Illuminate\Database\Seeder;

class RecConvenioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        //

        $data=[
            [
                'id_menu'=>'48',
                'recurso'=>'convenios.show',
                'etiqueta'=>'',
                'observacion'=>''
            ],
            [
                'id_menu'=>'48',
                'recurso'=>'convenios.create',
                'etiqueta'=>'CREAR.',
                'observacion'=>''
            ],[
                'id_menu'=>'48',
                'recurso'=>'convenios.index',
                'etiqueta'=>'VER',
                'observacion'=>''
            ],[
                'id_menu'=>'48',
                'recurso'=>'convenios.destroy',
                'etiqueta'=>'',
                'observacion'=>''
            ],[
                'id_menu'=>'48',
                'recurso'=>'convenios.store',
                'etiqueta'=>'',
                'observacion'=>''
            ],[
                'id_menu'=>'48',
                'recurso'=>'convenios.update',
                'etiqueta'=>'',
                'observacion'=>''
            ]
            
        ];
            \DB::table('recursos')->insert(
                    $data
                    );  
    
    }
}
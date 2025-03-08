<?php

use Illuminate\Database\Seeder;

class RecInicioSeeder extends Seeder
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
                'id_menu'=>'45',
                'recurso'=>'digitalizaciones.show',
                'etiqueta'=>'',
                'observacion'=>''
            ],[
                'id_menu'=>'45',
                'recurso'=>'digitalizaciones.create',
                'etiqueta'=>'',
                'observacion'=>''
            ],[
                'id_menu'=>'45',
                'recurso'=>'digitalizaciones.store',
                'etiqueta'=>'',
                'observacion'=>''
            ],
            
        ];
            \DB::table('recursos')->insert(
                    $data
                    );
    
    }
}

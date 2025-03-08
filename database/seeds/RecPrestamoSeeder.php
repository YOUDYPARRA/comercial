<?php

use Illuminate\Database\Seeder;

class RecPrestamoSeeder extends Seeder
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
                'id_menu'=>'44',
                'recurso'=>'prestamos.observar',
                'etiqueta'=>'',
                'observacion'=>''
            ],[
                'id_menu'=>'44',
                'recurso'=>'prestamos.estatus',
                'etiqueta'=>'',
                'observacion'=>''
            ],[
                'id_menu'=>'44',
                'recurso'=>'prestamos.digital',
                'etiqueta'=>'',
                'observacion'=>''
            ],[
                'id_menu'=>'44',
                'recurso'=>'prestamos.archivar',
                'etiqueta'=>'',
                'observacion'=>''
            ],[
                'id_menu'=>'44',
                'recurso'=>'prestamos.show',
                'etiqueta'=>'',
                'observacion'=>''
            ],[
                'id_menu'=>'44',
                'recurso'=>'prestamos.digitalizar',
                'etiqueta'=>'',
                'observacion'=>''
            ],
            [
                'id_menu'=>'44',
                'recurso'=>'prestamos.archiva',
                'etiqueta'=>'',
                'observacion'=>''
            ],
            [
                'id_menu'=>'44',
                'recurso'=>'prestamos.digital',
                'etiqueta'=>'',
                'observacion'=>''
            ],[
                'id_menu'=>'44',
                'recurso'=>'prestamos.create',
                'etiqueta'=>'',
                'observacion'=>''
            ],[
                'id_menu'=>'44',
                'recurso'=>'prestamos.eliminados',
                'etiqueta'=>'ELIMINADOS',
                'observacion'=>''
            ],[
                'id_menu'=>'44',
                'recurso'=>'prestamos.edit',
                'etiqueta'=>'',
                'observacion'=>''
            ],[
                'id_menu'=>'44',
                'recurso'=>'prestamos.index',
                'etiqueta'=>'VER',
                'observacion'=>''
            ],[
                'id_menu'=>'44',
                'recurso'=>'prestamos.destroy',
                'etiqueta'=>'',
                'observacion'=>''
            ],[
                'id_menu'=>'44',
                'recurso'=>'prestamos.store',
                'etiqueta'=>'',
                'observacion'=>''
            ],[
                'id_menu'=>'44',
                'recurso'=>'prestamos.update',
                'etiqueta'=>'',
                'observacion'=>''
            ]
            
        ];
            \DB::table('recursos')->insert(
                    $data
                    );
    
    }
}

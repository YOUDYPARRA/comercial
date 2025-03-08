<?php

use Illuminate\Database\Seeder;

class RecCustodiaSeeder extends Seeder
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
                'recurso'=>'custodias.create',
                'etiqueta'=>'',
                'observacion'=>''
            ],[
                'id_menu'=>'41',
                'recurso'=>'custodias.edit',
                'etiqueta'=>'',
                'observacion'=>''
            ]
            
        ];
            \DB::table('recursos')->insert(
                    $data
                    );   
    }
}

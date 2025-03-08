<?php

use Illuminate\Database\Seeder;

class MenExpendidosSeeder extends Seeder
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
                'id'=>'46',
                'menu'=>'EQUIPOS EXPENDIDOS'
            ]
            
        ];
            \DB::table('menus')->insert(
                    $data
                    );   
    
    
    }
}

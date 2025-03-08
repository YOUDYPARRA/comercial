<?php

use Illuminate\Database\Seeder;

class MenCustodiaSeeder extends Seeder
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
                'id'=>'39',
                'menu'=>'REPORTE'
            ]
            
        ];
            \DB::table('menus')->insert(
                    $data
                    );   
    
    }
}

<?php

use Illuminate\Database\Seeder;

class MenPlantillaSeeder extends Seeder
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
                'id'=>'47',
                'menu'=>'PLANTILLAS'
            ]            
        ];
            \DB::table('menus')->insert(
                    $data
                    );   
    
    
    }
}

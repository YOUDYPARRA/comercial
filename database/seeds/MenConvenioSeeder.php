<?php

use Illuminate\Database\Seeder;

class MenConvenioSeeder extends Seeder
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
                'id'=>'48',
                'menu'=>'CONVENIOS'
            ]
            
        ];
            \DB::table('menus')->insert(
                    $data
                    ); 
    }
}

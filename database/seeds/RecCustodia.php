<?php

use Illuminate\Database\Seeder;

class RecCustodia extends Seeder
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

        //DB::table('recuros')->delete();
        //Model::unguard();
//        $faker= Faker::create();
        // $this->call('UserTableSeeder');

        //Model::reguard();
        $data=[
            
            [
                'id_menu'=>'39',
                'recurso'=>'custodias.create',
                'etiqueta'=>'',
                'observacion'=>''
            ],[
                'id_menu'=>'39',
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

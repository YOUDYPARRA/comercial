<?php

use Illuminate\Database\Seeder;

class CoordinacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('coordinaciones')->delete();
        $data=[
            [
            'nombre'=>'OPERACIONES MTY',
            'atributo'=>'coordinacion',
            'coordinacion'=>'ULTRASONIDO',
            'modelo'=>'reportes'
            ],[
            'nombre'=>'OPERACIONES serv',
            'atributo'=>'coordinacion',
            'coordinacion'=>'ultrasonido',
            'modelo'=>'reporte'
            ]   
        ];
            \DB::table('coordinaciones')->insert(
                    $data
                    );  
    }
}

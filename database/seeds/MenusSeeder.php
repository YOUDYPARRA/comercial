<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class MenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->delete();
        //Model::unguard();
//        $faker= Faker::create();
        // $this->call('UserTableSeeder');

        //Model::reguard();
        $menus=[
            [
                'id'=>'1',
                'menu'=>'PERMISOS'
            ],
            [
                'id'=>'2',
                'menu'=>'RECURSOS'
            ],
            [
                'id'=>'3',
                'menu'=>'MARCAS'
            ],
            [
                'id'=>'4',
                'menu'=>'COTIZACIÓN'
            ],
            [
                'id'=>'5',
                'menu'=>'MENÚ'
            ],
            [
                'id'=>'6',
                'menu'=>'USUARIO'
            ],
            [
                'id'=>'7',
                'menu'=>'PRODUCTOS'
            ],
            [
                'id'=>'8',
                'menu'=>'PAQUETE'
            ],
            [
                'id'=>'9',
                'menu'=>'PRECÁLCULO'
            ],
            [
                'id'=>'10',
                'menu'=>'DATOS CÁLCULO'
            ],
            [
                'id'=>'11',
                'menu'=>'CONTRATO'
            ],
            [
                'id'=>'12',
                'menu'=>'GRUPOS USUARIOS'
            ],
            [
                'id'=>'13',
                'menu'=>'COMPRAS'
            ],
            [
                'id'=>'14',
                'menu'=>'CONDICIONES PAGOS'
            ],
            [
                'id'=>'15',
                'menu'=>'AGENTES ADUANALES'
            ]
            
        ];
            \DB::table('menus')->insert(
                    $menus
                    );   
    }
}

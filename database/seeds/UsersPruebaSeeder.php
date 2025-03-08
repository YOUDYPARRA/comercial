<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        //Model::unguard();
//        $faker= Faker::create();
        // $this->call('UserTableSeeder');

        //Model::reguard();
        $users=[
            [
                'name'=>'EDITH ARIADNA MARQUEZ LOPEZ',
                'iniciales'=>'EAML',
                'email'=>'emarquez@smh.com.mx',
                'password'=>'$2y$10$OBXH8zKIjQThAunXQQ3cqO1EyNfnUHYyFBEp0K2Jj98HLv5h0W1bO',
                'tipo_usuario'=>'USUARIO',
                'puesto'=>'EJECUTIVO DE VENTAS',
                'area'=>'comercial',
                'departamento'=>'VENTAS COMSUMIBLES',
                'lugar_centro_costo'=>'MX'
            ],[
                'name'=>'JOSE ROBERTO SOLORZANO AGUILERA',
                'iniciales'=>'JRSA',
                'email'=>'rsolorzano@smh.com.mx',
                'password'=>'$2y$10$OBXH8zKIjQThAunXQQ3cqO1EyNfnUHYyFBEp0K2Jj98HLv5h0W1bO',
                'tipo_usuario'=>'USUARIO',
                'puesto'=>'EJECUTIVO DE VENTAS',
                'area'=>'comercial',
                'departamento'=>'VENTAS COMSUMIBLES',
                'lugar_centro_costo'=>'GDL'
            ],
            [
                'name'=>'JUAN DE DIOS ARRATIA HERNANDEZ',
                'iniciales'=>'JDDAH',
                'email'=>'juan.arratia@smh.com.mx',
                'password'=>'$2y$10$OBXH8zKIjQThAunXQQ3cqO1EyNfnUHYyFBEp0K2Jj98HLv5h0W1bO',
                'tipo_usuario'=>'USUARIO',
                'puesto'=>'AUXILIAR CRED Y COBRANZA',
                'area'=>'ADMINISTRACION Y FINANZAS',
                'departamento'=>'CREDITO Y COBRANZA',
                'lugar_centro_costo'=>'MX'
            ],[
                'name'=>'JUAN DE DIOS ARRATIA HERNANDEZ',
                'iniciales'=>'JDDAH',
                'email'=>'juan.arratia@smh.com.mx',
                'password'=>'$2y$10$OBXH8zKIjQThAunXQQ3cqO1EyNfnUHYyFBEp0K2Jj98HLv5h0W1bO',
                'tipo_usuario'=>'USUARIO',
                'puesto'=>'AUXILIAR CRED Y COBRANZA',
                'area'=>'ADMINISTRACION Y FINANZAS',
                'departamento'=>'CREDITO Y COBRANZA',
                'lugar_centro_costo'=>'MX'
            ],[
                'name'=>'JUAN PABLO GUAJARDO GONZALEZ',
                'iniciales'=>'JPGG',
                'email'=>'lhernandez@smh.com.mx',
                'password'=>'$2y$10$OBXH8zKIjQThAunXQQ3cqO1EyNfnUHYyFBEp0K2Jj98HLv5h0W1bO',
                'tipo_usuario'=>'USUARIO',
                'puesto'=>'DIRECTOR COMERCIAL',
                'area'=>'MERCADOTECNIA',
                'departamento'=>'MERCADOTECNIA',
                'lugar_centro_costo'=>'MX'
            ],[
                'name'=>'EDGAR MORA SOTO',
                'iniciales'=>'EMS',
                'email'=>'emora@smh.com.mx',
                'password'=>'$2y$10$OBXH8zKIjQThAunXQQ3cqO1EyNfnUHYyFBEp0K2Jj98HLv5h0W1bO',
                'tipo_usuario'=>'ADMINISTRADOR',
                'puesto'=>'DIRECTOR COMERCIAL',
                'area'=>'MERCADOTECNIA',
                'departamento'=>'MERCADOTECNIA',
                'lugar_centro_costo'=>'MX'
            ],[
                'name'=>'JONATHAN Y. PARRA AGUILER',
                'iniciales'=>'JYPA',
                'email'=>'jparra@smh.com.mx',
                'password'=>'$2y$10$OBXH8zKIjQThAunXQQ3cqO1EyNfnUHYyFBEp0K2Jj98HLv5h0W1bO',
                'tipo_usuario'=>'ADMINISTRADOR',
                'puesto'=>'DIRECTOR COMERCIAL',
                'area'=>'MERCADOTECNIA',
                'departamento'=>'MERCADOTECNIA',
                'lugar_centro_costo'=>'MX'
            ]            
            
        ];
            \DB::table('users')->insert(
                    $users
                    );
    }
}

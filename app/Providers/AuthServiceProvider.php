<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Permiso;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        //COMPARA SI LA PAGINA ES IGUAL A LA AUTORIZADA
        $gate->define('acceso', function ($user,$ur) {
                //Buscar en persmisos donde permisos.id_usuario=$user->id y permisos.url=$ur; ->get
                //retornar si hay resultados de la busqueda.
            //return $user->id === $ur
                //return $user->id ==='244';
//            echo $ur;
                $rtn=false;
                if (isset($ur))
                {
                    $permiso=Permiso::idusuario($user->id)
                    ->recurso($ur)
                    ->get();
                    //return count($permiso)>0;
                    //dd($permiso);
                    if(count($permiso)>0)
                    {
                        $rtn= true;
                    }
                    else
                    {
                     $rtn= false;   
                    }

                }
                return $rtn;
                
                //echo "<h1>".$permiso."</h1>";
                /*return count($permiso);*/

        });
    }
}
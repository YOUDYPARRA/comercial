<?php

namespace App\Providers;
use Blade;
use App\Http\Requests;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('lnkOrd', function($campo) {
            //print_r($campo);
            //asc=campo_buscar
            //echo 'dr';
            $url='';
            //$cmp_ord=explode('=',$request->asc);
            if(isset($arr->asc)){
                if($campo==$arr->asc){
                    $url='<a href="{{ $arr}}" type="button" class="btn btn-warning" title="ORDENAR DESCENDENTE">Desc</a>';
                }

            }else if($arr->desc){
                if($campo==$arr->desc){
                    $url='<a href="{{ $arr}}" type="button" class="btn btn-warning" title="ORDENAR ASCENDENTE">Asc</a>';

                }

            }else{
                $url='<a href="{{ $arr}}" type="button" class="btn btn-warning" title="ORDENAR POR ESTE CAMPO ASCENDENTE">Asc</a>';

            }
            return $url;
        });
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

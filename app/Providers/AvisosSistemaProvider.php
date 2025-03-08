<?php

namespace App\Providers;
use App\Helpers\AvisosSistema;
use Illuminate\Support\ServiceProvider;

class AvisosSistemaProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind('App\Helpers\Contracts\AvisosSistemaContract', function(){
                    return new \App\Helpers\AvisosSistema();
        });
    }
    public function provides()
    {
        return ['App\Helpers\Contracts\RocketShipContract'];
    }
}

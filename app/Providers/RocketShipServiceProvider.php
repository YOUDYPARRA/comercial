<?php

namespace App\Providers;
//use App\Helpers\RocketLauncher;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
//use App\Helpers\RocketShip;
use App\Helpers\AvisosSistema;
//use App\Helpers\Contracts\RocketShipContract;//no sirve aqi
class RocketShipServiceProvider extends ServiceProvider
{
    protected $defer = true;
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
        $this->app->bind('App\Helpers\Contracts\RocketShipContract', function(){
                    //return new RocketShip();
                    return new \App\Helpers\AvisosSistema();
        });
    }
    public function provides()
    {
        return ['App\Helpers\Contracts\RocketShipContract'];
    }
}

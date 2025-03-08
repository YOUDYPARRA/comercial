<?php

namespace App\Providers;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class ConfiguraClaseServiceProvider extends ServiceProvider
{
    //protected $defer = true;
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
        $this->app->bind('App\Helpers\Contracts\ConfiguracionClaseContract', function(){
                    return new \App\Helpers\ConfiguraClase();
        });
    }
    public function provides()
    {
        return ['App\Helpers\Contracts\ConfiguracionClaseContract'];
    }
}

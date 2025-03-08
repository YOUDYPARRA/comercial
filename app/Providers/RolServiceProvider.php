<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;

class RolServiceProvider extends ServiceProvider
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
        $this->app->bind('App\Helpers\Contracts\RolContract', function(){
                    return new \App\Helpers\HelperRol();
        });
    }
    public function provides()
    {
        return ['App\Helpers\Contracts\RolContract'];
    }
}

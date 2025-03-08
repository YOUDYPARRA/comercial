<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        //

        parent::boot($router);
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes.php');
        });
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes/RouteExpendios.php');
        });
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes/RoutePlantillas.php');
        });
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes/RouteCotizacionContrato.php');
        });
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes/RouteProcesos.php');
        });
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes/RouteConvenios.php');
        });
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes/RouteAlmacenStock.php');
        });
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes/RouteGestionStock.php');
        });
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes/RouteEstados.php');
        });
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes/RouteServiciosReporte.php');
        });
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes/RouteProyectosVentas.php');
        });
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes/RouteCiudades.php');
        });
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes/RouteMensualidades.php');
        });
        $router->group(['namespace' => $this->namespace], function ($router) {
            if(file_exists(app_path('Http/routes/RouteTickets.php') ) ){
                require app_path('Http/routes/RouteTickets.php');
            }
        });
        $router->group(['namespace' => $this->namespace], function ($router) {
            if(file_exists(app_path('Http/routes/RouteClasificaciones.php') ) ){
                require app_path('Http/routes/RouteClasificaciones.php');
            }
        });
        $router->group(['namespace' => $this->namespace], function ($router) {
            if(file_exists(app_path('Http/routes/RouteUomConvertion.php') ) ){
               require app_path('Http/routes/RouteUomConvertion.php');
            }
        });
        $router->group(['namespace' => $this->namespace], function ($router) {
            if(file_exists(app_path('Http/routes/RouteClasificacionesOperacion.php') ) ){
                require app_path('Http/routes/RouteClasificacionesOperacion.php');
            }
        });
        $router->group(['namespace' => $this->namespace], function ($router) {
            if(file_exists(app_path('Http/routes/RouteTicketsOperaciones.php') ) ){
                require app_path('Http/routes/RouteTicketsOperaciones.php');
            }
        });
        $router->group(['namespace' => $this->namespace], function ($router) {
            if(file_exists(app_path('Http/routes/RouteGraficoProyectoVenta.php') ) ){
                require app_path('Http/routes/RouteGraficoProyectoVenta.php');
            }
        });
        $router->group(['namespace' => $this->namespace], function ($router) {
            if(file_exists(app_path('Http/routes/RouteAvisoSistema.php') ) ){
                require app_path('Http/routes/RouteAvisoSistema.php');
            }
        });
        $router->group(['namespace' => $this->namespace], function ($router) {
            if(file_exists(app_path('Http/routes/RouteRolUsuario.php') ) ){
                require app_path('Http/routes/RouteRolUsuario.php');
            }
        });
        $router->group(['namespace' => $this->namespace], function ($router) {
            if(file_exists(app_path('Http/routes/RouteRolesUsuarios.php') ) ){
                require app_path('Http/routes/RouteRolesUsuarios.php');
            }
        });
        $router->group(['namespace' => $this->namespace], function ($router) {
            if(file_exists(app_path('Http/routes/RouteCalificaciones.php') ) ){
                require app_path('Http/routes/RouteCalificaciones.php');
            }
        });
        $router->group(['namespace' => $this->namespace], function ($router) {
            if(file_exists(app_path('Http/routes/RouteFacturas.php') ) ){
                require app_path('Http/routes/RouteFacturas.php');
            }
        });
        $router->group(['namespace' => $this->namespace], function ($router) {
            if(file_exists(app_path('Http/routes/RouteConfiguracionClase.php') ) ){
                require app_path('Http/routes/RouteConfiguracionClase.php');
            }
        });
        $router->group(['namespace' => $this->namespace], function ($router) {
            if(file_exists(app_path('Http/routes/RouteDevolucion.php') ) ){
                require app_path('Http/routes/RouteDevolucion.php');
            }
        });

    }

}

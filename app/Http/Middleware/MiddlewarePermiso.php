<?php

namespace App\Http\Middleware;
use app\Permiso;
use Closure;

class MiddlewarePermiso
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//                echo \Route::current()->getName();
        //echo ':'.$request->wantsJson().' <';
        //echo '::'.$request->ajax().' <<';
//        if(!$request->ajax()){
//            return response('No autoricionS.', 500);
//        }
        
        if(!$request->ajax() && !$request->wantsJson()){//verifica que la peticion no sea por ajax
            $recurso_actual=\Route::current()->getName();//DEVUELVE OBJETOS.CREATE
            if(\Route::current()->getName()=='cotizaciones.index'){
                if(isset($request->aprobacion)){
                    
                        switch ($request->aprobacion) {
                            case 0:
                                $recurso_actual=$recurso_actual.'?aprobacion=0';
                                break;
                            case 1:
                                $recurso_actual=$recurso_actual.'?aprobacion=1';
                                break;
                            case 2:
                                $recurso_actual=$recurso_actual.'?aprobacion=2';
                                break;
                            case 3:
                                $recurso_actual=$recurso_actual.'?aprobacion=3';
                                break;
                        }
                    }
                }
//        $recurso_actual=$request->path(); no sirve para borrar pq regregresa cotizacion/5 
//            echo '->'.$recurso_actual.', ';
            //Consulta los datos de la base de datos.
            $permisos= $request->user()->permisos()->get()->toArray();//Consulta los datos de la base de datos.
            $recurso = array_search($recurso_actual, array_column($permisos, 'recurso','id')); 
//            echo $recurso.'<';//    
           if(is_null($recurso) || empty($recurso))//el recurso es NULO o NO se encontro en los permisos; No autorizar peticion.
            {
                return abort(401);
            }
        }else
        {
            //echo 'no checar url pq es ajax';
        }
//        $permisos= $request->user()->permisos()->get()->toArray();
//        $recurso = array_search($recurso_actual, array_column($permisos, 'recurso'));        
        return $next($request);
    }
}

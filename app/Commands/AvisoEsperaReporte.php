<?php

namespace App\Commands;

//use App\Commands\Command;
use Illuminate\Console\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Support\Facades\Log;
use App\Clase as Reporte;
use Carbon\Carbon;
use App\User as Usuario;
use App\Services\ManagerCorreo;
class AvisoEsperaReporte extends Command implements SelfHandling
{
    /**
     * Create a new command instance.
     *Ejecutar regla/condicion
     Ejecutar condicion envio
     * @return void
     */
     protected $signature = 'reportes';
     protected $description = 'Alertas administrador de reportes de servicio';
    public function __construct()
    {
        //
        parent::__construct();
    }

    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle()
    {
        //
        $hoy = Carbon::today();
        $aviso= new ManagerCorreo;
        $correo=[
                'remitente'=>'sistema@smh.com.mx',
                'alias'=>'Sistema',
                'asunto'=>'Aviso de sistema. Reportes en espera'
                ];            

        if( !env('APP_DEBUG', '')){
            $cant=null;
            $str=null;
            
            $reporte=Reporte::where('estatus','ESPERA')->where('created_at','<=',$hoy)->where('clase','R')->orderBy('created_at')->get();
            Log::info('Alerta de sistema REPORTES ESPERA SINCRONIZACION: '.$reporte);
            if(!empty($reporte)){
                $cant=count($reporte);
                foreach ($reporte as $key => $v) {
                    $str=$str.$v->folio.' '.$v->created_at.' '.$v->nombre_fiscal.' '.$v->modelo.'<br> ';
                }
/*
                $arr_url=explode('/',$request->url());
                $url= $arr_url[2].'/reportes';*/

                $usuario=Usuario::puesto('GERENTE DE OPERACIONES')->get();
                $correo['contenido']=array('msj'=>'LISTADO DE REPORTES EN ESPERA...<br>'.$str);

                foreach ($usuario as $key => $v) {
                    if(!empty($usuario)){
                        $correo['destino']=$v->email;
                        $aviso->enviarCorreo($correo);
                    }
                }        
            }            
            Log::info('Alerta de sistema REPORTES ESPERA SINCRONIZACION: '.$reporte);
        }else{
            //notificar a administrador de sistema
            $correo['contenido']=array('msj'=>'REPORTE SINCRONIZADO AUTOMATIZADO ESTA SUSPENDIDO...');

            $usuario=Usuario::where('tipo_usuario','ADMINISTRADOR')->get();
            foreach ($usuario as $v) {
                $correo['destino']=$v->email;
                $aviso->enviarCorreo($correo);
            }

        }

    }
}

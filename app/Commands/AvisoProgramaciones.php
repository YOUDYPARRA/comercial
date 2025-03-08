<?php

namespace App\Commands;

//use App\Commands\Command;
use Illuminate\Console\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Support\Facades\Log;
use App\Clase as Programa;
use App\PersonaServicio;
use Carbon\Carbon;
use App\User as Usuario;
use App\Services\ManagerCorreo;
class AvisoProgramaciones extends Command implements SelfHandling
{
    /**
     * Create a new command instance.
     *Ejecutar regla/condicion
     Ejecutar condicion envio
     * @return void
     */
     protected $signature = 'programaciones';
     protected $description = 'Alertas ingenieros de servicio programados';
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
                'asunto'=>'Aviso de sistema.'
                ];
            

        if( !env('APP_DEBUG', '')){
            $cant=null;
            $str=null;
            //Log::info('HOY: '.$hoy);

            $ingeniero_servicios=Usuario::puesto('INGENIERO DE SERVICIOS')->get();
            $programa=Programa::whereDate('fecha_inicio','=',$hoy)->where('clase','P')->get();

                    Log::info('PROGRAMA HOY: '.json_encode($programa));
            $arr_desprogramadas=[];
            $arr_programadas=[];
            $str=null;
            Log::info('TOTAL INGENIERO DE SERVICIO: '.count($ingeniero_servicios));
            foreach ($ingeniero_servicios as $ing_servcios) {
                # code...buscar sus programaciones para el dia de hoy
                    Log::info('QRY INGENIERO DE SERVICIO: '.$ing_servcios->iniciales);
                $cant_persona_programas=0;
                foreach ($programa as $programa_hoy) {
                    # code...
                    $persona_programa=null;
                    $persona_programa=PersonaServicio::buscar(['id_user'=>$ing_servcios->id,'id_clase'=>$programa_hoy->id]);
                    if(!isset($persona_programa)){
                        $cant_persona_programas++;
                        $arr = array('iniciales' => $ing_servcios->iniciales,'nombre_fiscal'=>$programa_hoy->nombre_fiscal );
                        $persona_programa=(object)$arr;
                        $arr_programadas[]=$persona_programa;
                        Log::info('INGENIERO PROGRAMADO: '.$ing_servcios->iniciales);
                    }
                }
                Log::info('total de seerv: '.count($cant_persona_programas));
                if(isset($cant_persona_programas)){//no está programado algun servicio
                    $arr_desprogramadas[]=$ing_servcios;
                    Log::info('SOLO INGENIERO DE SERVICIO SIN SERVICIO: '.$ing_servcios->iniciales);
                }
            }
            foreach ($arr_programadas as $ing_serv) {
                $str=$str.' '.$ing_serv->iniciales.' '.$ing_serv->nombre_fiscal.'<br>';
            }
            foreach ($arr_desprogramadas as $ing_serv) {
                $str=$str.' '.$ing_serv->iniciales.'<br>';
            }
            $correo['contenido']=array('msj'=>'PROGRAMACION DE SERVICIO..<br>'.$str);
            
            $usuario=Usuario::puesto('GERENTE DE OPERACIONES')->get();
            foreach ($usuario as $key => $value) {
                if(!empty($usuario)){
                    $correo['destino']=$v->email;
                    $aviso->enviarCorreo($correo);
                }
            }           
        Log::info('Alerta de sistema PROGRAMACIONES SINCRONIZACION: '.$str);
        }else{
            //notificar a administrador de sistema
            $correo['contenido']=array('msj'=>'REPORTE PROGRAMACIONES SINCRONIZADO AUTOMATIZADO ESTA SUSPENDIDO...');

            $usuario=Usuario::where('tipo_usuario','ADMINISTRADOR')->get();
            foreach ($usuario as $v) {
                $correo['destino']=$v->email;
                $aviso->enviarCorreo($correo);
            }

        }

    }
}
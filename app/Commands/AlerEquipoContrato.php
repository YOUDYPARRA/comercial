<?php
namespace App\Commands;

//use App\Commands\Command;
use Illuminate\Console\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use Carbon\Carbon;
use App\Contrato;
use App\Coordinacion;
use App\Clase as CEqContrato;
//use App\VContrato;
use App\User as Usuario;
use App\Services\ManagerCorreo;
class AlerEquipoContrato extends Command implements SelfHandling
{
    /**
     * Create a new command instance.
     * @return void
     */
     protected $signature = 'equipocontratoproximo';
     protected $description = 'Alertas de equipos contratos cerrados servicio proximo';
     protected $ec_contrato=null;
     protected $aviso=null;
     protected $dias_anterior=7;//10 o' 11
     protected $f_anterior=null;
     protected $f_posterior=null;
     protected $coordinaciones=null;

    public function __construct()
    {
        //
        $this->f_anterior=Carbon::today()->addDays($this->dias_anterior);
        $this->f_posterior=Carbon::today()->addDays($this->dias_anterior+1);
        /*$this->f_anterior=Carbon::today()->subDays($this->dias_anterior);
        $this->f_posterior=Carbon::today()->subDays($this->dias_anterior-1);*/
        //$this->f_proxima=Carbon::today();
        parent::__construct();
        $this->aviso= new ManagerCorreo;
        $this->ec_contrato= new Contrato;
        $this->coordinaciones= new Coordinacion;
    }
    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle()
    {
        $correo=[
            'remitente'=>'sistema@smh.com.mx',
            'alias'=>'Sistema',
            'asunto'=>'Aviso de sistema contrato concretado'
            ];
            echo $this->f_anterior;
            echo $this->f_posterior.'\n';
            $ec_equipos=CEqContrato::on('mypro')
            ->where('clase','EC')
            ->where('estatus','')//campo destinado en esta clase para eliminar
            ->whereBetween('fecha_inicio',[$this->f_anterior,$this->f_posterior])
            //->where('fecha_inicio','<=',$this->f_proxima)
            ->get();
            //dd($ec_equipos);
        foreach ($ec_equipos as $key => $value) {
            //echo $value->fecha_inicio.'\n';
            //echo $value->id_foraneo;
            
            $contrato=CEqContrato::on('mypro')
            ->find($value->id_foraneo);
            $contrato_condiciones=$this->ec_contrato->on('mypro')->foraneo(['id_foraneo'=>$value->id_foraneo])->get();
            //echo $contrato_condiciones[0]->fecha_inicio_contrato.'<>';
            //->get();
            //echo $contrato->folio_contrato.'<>';

            if($contrato->estatus=='CERRADO'){
                $equipo=null;
                        $equipo=$value->equipo. ' '.
                        $value->marca. ' '.
                        $value->modelo. ' '.
                        $value->numero_serie. ' '.
                        $value->fecha_inicio. ' '.
                        $value->fecha_fin. ' '.
                        $value->nombre_cliente. ' '.
                        $value->calle. ' '.
                        $value->colonia. ' '.
                        $value->c_p. ' '.
                        $value->ciudad. ' '.
                        $value->estado. ' '.
                        $value->pais. '<br>';
                
                $correo['contenido']=
                array(
                    'msj'=>'<h4>MANTENIMIENTO EN CONTRATO DE SERVICIO:</h4> '.$contrato->folio_contrato.', '.$contrato->instituto
                    .'<br> <h4>NOMBRE FISCAL:</h4> '.$value->nombre_fiscal
                    .'<br> <h4>TIPO CONTRATO:</h4> '.$contrato_condiciones[0]->tipo_contrato
                    .'<br> <h4>EXCEPCIONES:</h4> '.$contrato_condiciones[0]->refacciones_excepciones
                    .'<br> <h4>MESES CONTRATO:</h4> '.$contrato_condiciones[0]->tiempo_contrato
                    .'<br> <h4>INICIO:</h4> '.$contrato_condiciones[0]->fecha_inicio_contrato
                    .'<br> <h4>GARANTIA:</h4> '.$contrato_condiciones[0]->fecha_inicio_garantia.' '.$contrato_condiciones[0]->fecha_fin_garantia
                    .'<br> <h4>CONTACTO:</h4> '.$contrato_condiciones[0]->representante_cliente
                    .'<br> <h4>SERVICIO:</h4> <br>'.$equipo
                );
                //LOCALIZAR LA COORDINACION SEGUN EL NOMBRE DADO EN EL EQUIPO->COORDINACION
                $coordinacion = $this->coordinaciones->on('mypro')->buscar(['nombre'=>$value->coordinacion])->get();
                if($coordinacion[0]->coordinacion=='ULTRASONIDO'){
                    $coordinacion[0]->coordinacion='US';
                }
                //FIN LOCALIZAR LA COORDINACION SEGUN EL NOMBRE DADO EN EL EQUIPO->COORDINACION

                $usuario=Usuario::on('mypro')->where('puesto','COORDINADOR DE SERVICIOS')
                ->where('departamento','like','%'.$coordinacion[0]->coordinacion.'%')
                ->get();
//                dd($usuario);
                foreach ($usuario as $v) {
                    echo $v->email.'  ';
                     $correo['destino']=$v->email;
                    //$this->aviso->enviarCorreo($correo);
                    $this->aviso->enviarCorreo($correo,'aviso');
                }
                $value->enviar_aviso=0;
                $value->save();
            }//fin condicion contrato cerrado
        }
    }
}

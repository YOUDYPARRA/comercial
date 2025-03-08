<?php
namespace App\Commands;

//use App\Commands\Command;
use Illuminate\Console\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use Carbon\Carbon;
use App\Contrato;
use App\Clase as CEqContrato;
//use App\VContrato;
use App\User as Usuario;
use App\Services\ManagerCorreo;
class AlerContratoConcreto extends Command implements SelfHandling
{
    /**
     * Create a new command instance.
     * @return void
     */
     protected $signature = 'contratoconcreto';
     protected $description = 'Alertas de contratos cerrados';
     protected $c_contrato=null;
     protected $aviso=null;
    public function __construct()
    {
        //
        parent::__construct();
        $this->aviso= new ManagerCorreo;
        $this->c_contrato= new Contrato;
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
            ];

        //$arr_clases=null;
            //dd(count($this->c_contrato->getAlerta()));
        $clases=$this->c_contrato->getAlerta();//contrato cerrado y q no hay aviso
        foreach ($clases as $key => $value) {
            $contrato=Contrato::on('mypro')
            ->where('id_foraneo',$value->id)->get();
            //$clases['contrato']=$contrato;
            //$clases['eqp']=$value->r_conts_eqps;
            $equipo=null;
            $c_equipos=CEqContrato::on('mypro')
            ->where('clase','EC')
            ->where('id_foraneo','=',$value->id)
            ->get();
            foreach ($c_equipos as $eq) {
                    $equipo=$equipo.' * '.
                    $eq->equipo. ' '.
                    $eq->marca. ' '.
                    $eq->modelo. ' '.
                    $eq->numero_serie. ' '.
                    $eq->fecha_inicio. ' '.
                    $eq->fecha_fin. ' '.
                    $eq->nombre_cliente. ' '.
                    $eq->calle. ' '.
                    $eq->colonia. ' '.
                    $eq->c_p. ' '.
                    $eq->ciudad. ' '.
                    $eq->estado. ' '.
                    $eq->pais. '<br>';
            }
            
            $correo['asunto']='NUEVO CONTRATO DE SERVICIO '.$value->folio_contrato.', '.$value->instituto;
            $correo['contenido']=
            array(
                'msj'=>'<a href="http://74.208.71.121/contratos">DETALLES DE CONTRATO </a>' 
                .'<h4>CONTRATO DE SERVICIO:</h4> '.$value->folio_contrato.', '.$value->instituto
                .'<br> <h4>NOMBRE FISCAL:</h4> '.$value->nombre_fiscal
                .'<br> <h4>TIPO CONTRATO:</h4> '.$contrato[0]->tipo_contrato
                .'<br> <h4>EXCEPCIONES:</h4> '.$contrato[0]->refacciones_excepciones
                .'<br> <h4>MESES CONTRATO:</h4> '.$contrato[0]->tiempo_contrato
                .'<br> <h4>INICIO:</h4> '.$contrato[0]->fecha_inicio_contrato
                .'<br> <h4>GARANTIA:</h4> '.$contrato[0]->fecha_inicio_garantia.' '.$contrato[0]->fecha_fin_garantia
                .'<br> <h4>CONTACTO:</h4> '.$contrato[0]->representante_cliente
                .'<br> <h4>SERVICIO:</h4> <br>'.$equipo
            );
            $usuario=Usuario::on('mypro')->where('puesto','GERENTE DE OPERACIONES')->get();
            foreach ($usuario as $v) {
                $correo['destino']=$v->email;
                $this->aviso->enviarCorreo($correo,'aviso');
            }
            $administrativo=Usuario::on('mypro')->where('puesto','AUXILIAR ADMINISTRATIVO')->where('departamento','OPERACIONES')->where('area','SERVICIO TECNICO')->get();
            foreach ($administrativo as $v) {
                $correo['destino']=$v->email;
                $this->aviso->enviarCorreo($correo,'aviso');
            }
            
            $admon=Usuario::on('mypro')->where('tipo_usuario','ADMINISTRADOR')->get();
            foreach ($admon as $v) {
                $correo['destino']=$v->email;
                $this->aviso->enviarCorreo($correo,'aviso');
            }

            $value->enviar_aviso=0;
            $value->save();
        }
    }
}

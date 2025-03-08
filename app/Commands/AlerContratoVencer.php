<?php
namespace App\Commands;

//use App\Commands\Command;
use Illuminate\Console\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use Carbon\Carbon;
use App\Contrato;
use App\Clase;
use App\User as Usuario;
use App\Services\ManagerCorreo;
class AlerContratoVencer extends Command implements SelfHandling
{
    /**
     * Comando para verificar contratos de servicio por vencer
     * @return void
     */
     protected $signature = 'contratovencer';
     protected $description = 'Alertas de contratos por vencer';
     protected $contrato=null;
     protected $aviso=null;
     protected $dias_anterior=15;//15//dias de que el contrato se debe de consultar
     protected $f_anterior=null;
     protected $f_posterior=null;
    public function __construct()
    {
        //
        parent::__construct();
        $this->aviso= new ManagerCorreo;
        $this->contrato= new Contrato;
        $this->f_anterior=Carbon::today()->addDays($this->dias_anterior);
        $this->f_posterior=Carbon::today()->addDays($this->dias_anterior+1);
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
            'asunto'=>'Aviso de sistema contrato por vencer'
            ];

        $contrato=$this->contrato->on('mypro')
        ->where('clase','')
        ->whereBetween('fecha_fin_garantia',[$this->f_anterior,$this->f_posterior])
        ->get();
        //array merge
        //echo $this->f_anterior;
        //dd($this->f_posterior);
        foreach ($contrato as $key => $value) {
            $c_contrato=Clase::on('mypro')
            ->where('id',$value->id_foraneo)
            ->where('estatus','CERRADO')
            ->where('clase','C')
            ->get();
            //$clases['contrato']=$contrato;
            //$clases['eqp']=$value->r_conts_eqps;
            

            
            $correo['contenido']=
            array(
                'msj'=>'<h4>CONTRATO DE SERVICIO:</h4> '.$c_contrato[0]->folio_contrato.', '.$c_contrato[0]->instituto
                .'<br> <h4>NOMBRE FISCAL:</h4> '.$c_contrato[0]->nombre_fiscal
                .'<br> <h4>TIPO CONTRATO:</h4> '.$contrato[0]->tipo_contrato
                .'<br> <h4>GARANTIA:</h4> '.$value->fecha_inicio_garantia.' '.$value->fecha_fin_garantia
                .'<br> <h4>CONTACTO:</h4> '.$value->representante_cliente
            );
            //dd($correo);
            $usuario=Usuario::on('mypro')->where('puesto','GERENTE DE OPERACIONES')->get();
            foreach ($usuario as $v) {
                $correo['destino']=$v->email;
                $this->aviso->enviarCorreo($correo,'aviso');
            }
            $usuario=Usuario::on('mypro')->where('area','COORDINADOR DE CONTRATOS')->get();
            foreach ($usuario as $v) {
                $correo['destino']=$v->email;
                $this->aviso->enviarCorreo($correo,'aviso');
            }
            //$value->enviar_aviso=0;
            //$value->save();
        }
    }
}

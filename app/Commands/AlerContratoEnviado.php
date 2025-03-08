<?php
namespace App\Commands;

//use App\Commands\Command;
use Illuminate\Console\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use Carbon\Carbon;
//use App\Contrato;
use App\Clase;
use App\User as Usuario;
use App\Services\ManagerCorreo;
class AlerContratoEnviado extends Command implements SelfHandling
{
    /**
     * Create a new command instance.
     * @return void
     */
     protected $signature = 'contratoenviado';
     protected $description = 'Alertas de contratos pendiente';
     protected $contrato=null;
     protected $aviso=null;
     protected $horas_anterior=24;//horas de que el contrato se debe de consultar
     protected $h_anterior=null;
    public function __construct()
    {
        //
        parent::__construct();
        $this->aviso= new ManagerCorreo;
        $this->contrato= new Clase;
        $this->h_anterior=Carbon::today();
        //$this->f_posterior=Carbon::today()->addDays($this->dias_anterior+1);
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
            'asunto'=>'Aviso de sistema contrato pediente'
            ];

        $contrato=$this->contrato->on('mypro')
        ->where('clase','C')
        ->where('estatus','ENVIADO')
        ->where('updated_at','<',$this->h_anterior)
        ->get();
        foreach ($contrato as $key => $value) {

            $correo['contenido']=
            array(
                'msj'=>'<h4>CONTRATO DE SERVICIO REVISION PENDIENTE:</h4> '.$value->folio_contrato.', '.$value->instituto
            );
            //dd($correo);
            $usuario=Usuario::on('mypro')
            ->where('area','JURIDICO')
            ->where('puesto','AUXILIAR CRED Y COBRANZA')
            ->get();
            foreach ($usuario as $v) {
                $correo['destino']=$v->email;
                $this->aviso->enviarCorreo($correo,'aviso');
            }
            //$value->enviar_aviso=0;
            //$value->save();
        }
    }
}

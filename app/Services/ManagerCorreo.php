<?php
namespace App\Services;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
class ManagerCorreo
{
 /**
  *
  * @param type Array
  * [
  * -contenido tipo arreglo [msj =>contenido del correo electronico]
  * -remitente->, correo de remitente, si no hay remitente, se coloca el del sistema
  * -alias->alias q aparece junto al remitente del correo.
  * -asunto->el titulo del correo
  * -destino->correo electronico
  * -asunto->correo electronico
  * ]
  * @templ='aviso'
  * @return string
  */
    public function enviarCorreo($param,$templ='notificacion') {
//        dd('ENVIAR CORREO ELECTRONICO AHORA!"!!');
//        $data = array(
//            'name' => "Learning Laravel",
//        );
        $blade='emails.'.$templ;
        Log::info('Notificacion blade>: '.json_encode($param).PHP_EOL);

        /*
        Mail::send($blade, $param['contenido'], function ($message) use ($param){

          if(count($param['destino'])>1){
            $message->from($param['remitente'], $param['alias'])
            ->cc($param['destino'])
            ->subject($param['asunto']);
          }else{
            $message->from($param['remitente'], $param['alias'])
            ->to($param['destino'])
            ->subject($param['asunto']);
          }
//            ->attach($param['archivo'],array $option=[]);
        });
        */
        return "Success";
    }
}

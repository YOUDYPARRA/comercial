<?php

namespace App\Http\Requests;
use App\Clase as Reporte;
use App\Http\Requests\Request;

class CotizacionStoreRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
      $v=false;
      $v=true;
      /*
      $r=0;
      $o=$this->request->all();
        $r=$o['reporte'];
        if(!empty($r)){//buscar el reporte y verificar si tiene prestamo estatus !=  cerrar
          $reporte=0;
          $reporte=Reporte::buscar(['clase'=>'R','folio'=>$r]);
          if(!empty($rp)){
            if(is_object($reporte->prestamo)){
              if($reporte->prestamo->estatus=='CERRAR'){
                $v=true;

              }
            }else{//el reporte no tiene prestamo
              $v=true;
            }
          }else{//no hay reporte para verificar en la cotizacion
            $v=true;
          }
        }
        */
        return $v;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        'tipo_cliente'=>'required',
        'tipo_moneda'=>'required',
        'version'=>'required',
        'numero_cotizacion'=>'required',
        'nombre_fiscal'=>'required',
        'rfc'=>'required',
        'telefono'=>'required',
        'correo'=>'sometimes|required',
        //'representante_legal'=>'sometimes|required',
        'calle_fiscal'=>'required',
        'colonia_fiscal'=>'required',
        'codigo_postal_fiscal'=>'required',
        'ciudad_fiscal'=>'required',
        'estado_fiscal'=>'required',
        'pais_fiscal'=>'required',
        'nombre_cliente'=>'required',
        'calle_entrega'=>'required',
        'colonia_entrega'=>'required',
        'codigo_postal_entrega'=>'required',
        'ciudad_entrega'=>'required',
        'estado_entrega'=>'required',
        'pais_entrega'=>'required',
        'correo'=>'required',
      //  'name_metodo_envio'=>'required',
       // 'name_condicion_factura'=>'required',
       // 'id_condicion_factura'=>'required',
       // 'metodo_pago'=>'required',
       // 'codigo_proovedor'=>'required',
        'total'=>'required',
        'objeto'=>'required',
        ];

    }

}

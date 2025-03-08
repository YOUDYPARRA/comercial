<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Services\PgManager;
use App\ZascustProyUser1V;//vista número de contrato.
use App\Clase;
use App\ContratoCompraVenta;
use App\Vendedor;
use App\User;
use DB;
use App\Helpers\HelperUtil;
use App\Services\ManagerCorreo;

class Orden extends Model
{
	protected $pgconn;
  protected $connection = 'pgsql';
  protected $table = 'zasapi_order';
     public function __construct(){
         //$this->pgqry= new PgManager;
     }
    //
    //protected $connection = 'pgsql';
    //protected $primaryKey = 'l_order_id';
    //public $timestamps = false;

     protected $fillable=[
     	'zasapi_order',
  		'issotrx',//OBLIGATORIO
  		'AD_Org_ID',//OBLIGATORIO
  		'C_DocTypeTarget_ID',//OBLIGATORIO
  		'DocumentNo',//OBLIGATORIO
  		'DateOrdered',//OBLIGATORIO
  		'C_BPartner_ID',//OBLIGATORIO
  		'C_BPartner_Location_ID',//OBLIGATORIO
  		'm_pricelist_id',//OBLIGATORIO
  		'C_PaymentTerm_ID',//OBLIGATORIO
  		'M_Warehouse_ID',//OBLIGATORIO
  		'InvoiceRule',//OBLIGATORIO
  		'datepromised',
  		'FIN_Paymentmethod_ID',
  		'POReference',//NUMERO DE COTIZACION
  		'SalesRep_ID',
  		'Description',
  		'Delivery_Location_ID',
  		'C_Costcenter_ID',
  		'User1_ID',//ID DE CONTRATO DE ALENDUM
  		'Deliverynotes',
  		'IsTaxIncluded',
  		'C_Campaign_ID',
  		'EM_Zascust_Po_Partnerid',
  		'EM_Zascust_Po_Legalrepid',
  		'EM_Zascust_Po_Logicmanagerid',
  		'EM_Zascust_Po_Shippingby'
    ];
    public function completar(){
    	//dd($this->zasapi_order);
      //$rsl=$this->pgqry->eject("select zascust_ifz_complete_order('$this->zasapi_order')");
      $rsl=DB::connection($this->connection)->select(DB::raw("select zascust_ifz_complete_order('$this->zasapi_order')"));
      //HelperUtil::log(['$rsl :'.count($rsl)=>$rsl]);
    	//echo $rsl;
    }
    public function guardar(){
    	//dd($this->C_DocTypeTarget_ID)
      $rsl=DB::connection($this->connection)->select(DB::raw(
        "select $this->table (
        '$this->issotrx',
      '$this->AD_Org_ID',
      '$this->C_DocTypeTarget_ID',
      '',
      '$this->DateOrdered',
      '$this->C_BPartner_ID',
      '$this->C_BPartner_Location_ID',
      '$this->m_pricelist_id',
      '$this->C_PaymentTerm_ID',
      '$this->M_Warehouse_ID',
      '$this->InvoiceRule',
      '$this->datepromised',
      '$this->FIN_Paymentmethod_ID',
      '$this->POReference',
      '$this->SalesRep_ID',
      '$this->Description',
      '$this->Delivery_Location_ID',
      '$this->C_Costcenter_ID',
      '$this->User1_ID',
      '$this->Deliverynotes',
      '$this->IsTaxIncluded',
      '$this->C_Campaign_ID',
      '$this->EM_Zascust_Po_Partnerid',
      '$this->EM_Zascust_Po_Legalrepid',
      '$this->EM_Zascust_Po_Logicmanagerid',
      '$this->EM_Zascust_Po_Shippingby'
      )"
      ) );
      /*
    	$rsl=$this->pgqry->eject("select $this->table (
    		'$this->issotrx',
			'$this->AD_Org_ID',
			'$this->C_DocTypeTarget_ID',
			'',
			'$this->DateOrdered',
			'$this->C_BPartner_ID',
			'$this->C_BPartner_Location_ID',
			'$this->m_pricelist_id',
			'$this->C_PaymentTerm_ID',
			'$this->M_Warehouse_ID',
			'$this->InvoiceRule',
			'$this->datepromised',
			'$this->FIN_Paymentmethod_ID',
			'$this->POReference',
			'$this->SalesRep_ID',
			'$this->Description',
			'$this->Delivery_Location_ID',
			'$this->C_Costcenter_ID',
			'$this->User1_ID',
			'$this->Deliverynotes',
			'$this->IsTaxIncluded',
			'$this->C_Campaign_ID',
			'$this->EM_Zascust_Po_Partnerid',
			'$this->EM_Zascust_Po_Legalrepid',
			'$this->EM_Zascust_Po_Logicmanagerid',
			'$this->EM_Zascust_Po_Shippingby'
			)");
      */
            return $rsl;

    }
        public function aviso($arr,$tmp=null){
            $aviso= new ManagerCorreo;
        foreach ($arr as  $v) {
            $correo=[
                'remitente'=>auth()->user()->email,
                'alias'=>auth()->user()->name,
                'asunto'=>'Notificación de sistema.'
                ];
            $correo['destino']=$v['destino'];
            $correo['contenido']=array('msj'=>$v['msj']);
            if(is_null($tmp)){
                 $aviso->enviarCorreo($correo);
            }else{
                $aviso->enviarCorreo($correo,'atencion');
            }
        }
    }

    public function setVendedorAttribute($iniciales){//obtener el vendedor
      if(!empty($iniciales)){
        $vendedor=[];
        $vendedorpg=[];
        $vendedor= User::iniciales($iniciales)->first();
          if(count($vendedor)){
              $vendedorpg=Vendedor::buscar(['name'=>$vendedor->name])->first();
            if(count($vendedorpg)){
              $this->attributes['SalesRep_ID']=$vendedorpg->ad_user_id;
            }
          }
      }
    }
    public function setUser1idAttribute($numero_contrato_interno){//obtener el numero de contrato
    //public function setFoliarAttribute(){//obtener el numero de contrato
      $contrato_interno=[];
      $numero_contrato=[];
      $numero_contrato_compra_venta=[];
      if(!empty($numero_contrato_interno)){
        $contrato_interno=ZascustProyUser1V::buscar(['value'=>$numero_contrato_interno])->first();
        if(count($contrato_interno)){
          $this->attributes['User1_ID']= $contrato_interno->user1_id;
        }else{
          //obtener el numero de contrato interno, buscando el numero de contrato de cliente(contratos.instituto)
          $numero_contrato_cliente=$numero_contrato_interno;
          $numero_contrato=Clase::buscar(['clase'=>'C','instituto'=>$numero_contrato_cliente])->first();
          if(count($numero_contrato)){
            $contrato=ZascustProyUser1V::buscar(['value'=>$numero_contrato->folio_contrato])->first();
            $this->attributes['User1_ID']= $contrato->user1_id;
          }else{//ver sino contrato interno no existe
            $numero_contrato_compra_venta=$numero_contrato_interno;
            //$numero_contrato_venta=Clase::numeroContratoCompraVenta($numero_contrato_compra_venta)->first();
            $numero_contrato_venta=Clase::buscar(['clase'=>'C','folio_contrato_venta'=>$numero_contrato_compra_venta])->first();
            if(count($numero_contrato_venta)){
                $contrato_compra_venta=ZascustProyUser1V::buscar(['value'=>$numero_contrato_venta->folio_contrato])->first();
                $this->attributes['User1_ID']= $contrato_compra_venta->user1_id;
            }//fin val contrato venta
          }//fin ver si contrato interno no existe
        }//fin si contrato interno
      }//fin si numero de contrato interno
      //$this->attributes['User1_ID']="";
    }//fin funcion atributo id contrato

}

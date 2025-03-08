<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orden;
use App\Direccion;
use App\Estado;
use App\AlmacenStock;
use App\Equipo;
use Carbon\Carbon;
use App\User;
use App\Insumo;
use App\Calificacion;
use App\OrderV;
use App\Vendedor;
use App\Tercero;
use App\OrdenLinea;
use App\Compra as CompraVenta;
use App\ProductV;
use App\InsumoCompraVenta;
use App\Helpers\HelperUtil;
use App\Helpers\HelperUsuario;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrdenController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for store a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //y=venta, N=compra.
        $orden=new Orden;
        //dd($request->all());
        //dd($request->issotrx);
        if($request->issotrx=='Y'){//echo 'GENERAR ORDEN DE VENTA'
            //GENERAR VENTA
            $objeto=CompraVenta::findOrFail($request->id);
            //INICIO VENDEDOR
                $orden->vendedor=$objeto->atribuir;
            //FIN VENDEDOR
            if(empty($objeto->c_order_id)){
                $arr_fecha_pedido=explode('-', $objeto->fecha);
                if($objeto->fecha_entrega){
                    $arr_fecha_entrega=explode('-', $objeto->fecha_entrega);
                }else{
                    $arr_fecha_entrega=$arr_fecha_pedido;
                }
                //dd($objeto->id_doctype_target);
                $orden->issotrx='Y';
                $orden->AD_Org_ID=$objeto->org_id;
                $orden->C_DocTypeTarget_ID=$objeto->id_doctype_target;
                $orden->DocumentNo=$objeto->numero_orden;
                $orden->DateOrdered=$arr_fecha_pedido[2]."-".$arr_fecha_pedido[1]."-".$arr_fecha_pedido[0];
                $orden->C_BPartner_ID=$objeto->c_bpartner_id;
                $orden->C_BPartner_Location_ID=$objeto->c_bpartner_location;
                $orden->m_pricelist_id=$objeto->tipo_moneda;
                $orden->C_PaymentTerm_ID=$objeto->condicion_pago_tiempo;
                $orden->M_Warehouse_ID=$objeto->id_warehouse;
                $orden->InvoiceRule=$objeto->condicion_facturacion;
                //FIN OBLIGATORIOS
                $orden->datepromised=$arr_fecha_entrega[2]."-".$arr_fecha_entrega[1]."-".$arr_fecha_entrega[0];
                $orden->FIN_Paymentmethod_ID=$objeto->metodo_pago;
                $orden->POReference=$objeto->numero_cotizacion;//NUMERO DE COTIZACION
                $orden->Description=$objeto->nota;
                //inicio direccion entrega
                $json=json_decode($objeto->dato);
                $orden->Delivery_Location_ID=$json->p_delivery_location_id;
                //fin direccion de entrega
                //$orden->C_Costcenter_ID=$objeto->centro_costo;
                //INICIO ID DE NUMERO DE CONTRATO
                //echo strlen($orden->User1_ID);
                if(strlen($objeto->numero_contrato)){//si hay numero de contrato
                    $orden->user1id=$objeto->numero_contrato;
                    if(empty($orden->User1_ID)){
                        return redirect('ventas')->withErrors('VÉRIFIQUE NÚMERO DE CONTRATO');
                    }
                }
                //FIN ID DE NUMERO DE CONTRATO
                $orden->Deliverynotes='FAVOR AVISAR A COTIZADOR CON COTIZACIÓN: '.$objeto->numero_cotizacion.' CUANDO PUEDA SURTIRSE. '.$objeto->observacion;
                if(empty($objeto->impuesto)){
                    $orden->IsTaxIncluded='Y';
                }else{
                    $orden->IsTaxIncluded='N';
                }
                //$orden->C_Campaign_ID=$objeto->id_camp_publ;
                //$orden->EM_Zascust_Po_Partnerid=$objeto->
                //$orden->EM_Zascust_Po_Legalrepid=""
                //$orden->EM_Zascust_Po_Logicmanagerid=$objeto->gerente;
                $orden->EM_Zascust_Po_Shippingby=$objeto->tipo_envio;
                //dd($orden);
                $numero_orden_uid=$orden->guardar();
                $objeto->c_order_id=$numero_orden_uid[0]->zasapi_order;
                $objeto->update();
            }

            //INSERTAR LINEAS OBTENIDAS DE LA VENTA.
            $insumos=InsumoCompraVenta::clase('')
            ->IdCompraVenta($objeto->id)->get();
            //dd($insumos);
            foreach ($insumos as $item) {

                //INICIO CALCULO DE PIEZAS POR CANTIDAD DE COMPRA EN VENTA
                $cantidad=0;
                    $insumo = Insumo::on('mysql')
                    ->codigo($item->codigo_proovedor)
                    ->get();
                    $insumo=$insumo[0];
                    $cantidad=$item->cantidad/$insumo->cantidad_unidad_compra;
                //
                $linea= new OrdenLinea;
                //IR A BUSCAR EL M_ID
                $arr_produc_v=ProductV::buscar(['value'=>$item->codigo_proovedor])->get();
                HelperUtil::log(['PRODUCT ID'=>'AQUI',$item->codigo_proovedor,'ARRAY DEL PRODUCT_V'=>$arr_produc_v]);
                if(count($arr_produc_v)>0){
                    $produc_v=$arr_produc_v[0];
                }else{
                    $arr_error[]='FALTA AGREGAR EN SISTEMA ALENDUM...';
                    $produc_v=null;
                }
                //FIN BUSCAR M_ID

                //HelperUtil::log(['ITEM'=>'DOCUMENTO']+$item->toArray());

                if(!empty($produc_v)){
                    if($item->check==''){//viene sin nada en check y hay q dar de alta
                        $linea->c_order_id=$objeto->c_order_id;
                        $linea->M_Product_ID=$produc_v->m_product_id;
                        $linea->QuantityOrder=NULL;
                        //$linea->QuantityOrder=$cantidad;
                        $linea->qtyordered=$item->cantidad;
                        $linea->C_Tax_ID=$item->tax_id;
                        $linea->PriceActual=$item->precio;
                        $linea->PriceList=$insumo->precio;
                        $linea->discount=$item->descuento;
                        $linea->Description=$item->descripcion;
                        $linea->C_cost_center_id=$item->centro_costo;
                        $linea->M_Warehouse_Rule_ID=NULL;
                        $linea->m_product_category_id=$item->m_product_category_id;
                        HelperUtil::log(['LINEA'=>'API']+$linea->toArray());
                        $linea->guardar();
                        $insumo_compra_venta=InsumoCompraVenta::findOrFail($item->id);
                        $insumo_compra_venta->update(['check'=>'0']);
                    }

                }else{
                    $arr_error[]=$item->codigo_proovedor.' Con Cantidad de . '.$item->cantidad.'';
                    return redirect('ventas')->withErrors($arr_error);
                }//FIN IF COMPROBAR M_ID

            }//FIN FOREACH ITEMS VENTA
            $objeto->estatus='CERRADO';
            $objeto->save();
            $this->calificacion($objeto->estatus,$objeto->id,$request->issotrx);
            //return redirect('ventas')->withErrors(['SE HA PROCESADO LA VENTA.']);
            return redirect('ventas')->withSuccess('SE HA PROCESADO LA VENTA');
        }else if($request->issotrx=='N'){   ///////////////////////////////////////////////////////////////////////        GENERAR COMPRA        //////////
            $objeto=CompraVenta::findOrFail($request->id);
            //INICIO VENDEDOR
            $vendedor=0;
            $orden->vendedor=$objeto->atribuir;
            //FIN VENDEDOR
            if(empty($objeto->c_order_id)){
                //INICIO BUSCAR PROVEEDOR
                //FIN BUSCAR PROVEEDOR
                $arr_fecha_pedido=explode('-', $objeto->fecha);
                if($objeto->fecha_entrega){
                    $arr_fecha_entrega=explode('-', $objeto->fecha_entrega);
                }else{
                    $arr_fecha_entrega=$arr_fecha_pedido;
                }
                $orden->issotrx='N';
                $orden->AD_Org_ID=$objeto->org_id;
                $orden->C_DocTypeTarget_ID=$objeto->id_doctype_target;
                $orden->DocumentNo=$objeto->numero_orden;
                $orden->DateOrdered=$arr_fecha_pedido[2]."-".$arr_fecha_pedido[1]."-".$arr_fecha_pedido[0];
                //DATOS DE PROVEEDOR
                //$orden->C_BPartner_ID=$tercero->c_bpartner_id;
                $orden->C_BPartner_ID=$objeto->c_bpartner_id_prov;
                //$orden->C_BPartner_Location_ID=$tercero_direccion_id;
                $orden->C_BPartner_Location_ID=$objeto->c_bpartner_location_prov;
                //FIN DATOS PROVEEDOR
                $orden->m_pricelist_id=$objeto->tipo_moneda;
                $orden->C_PaymentTerm_ID=$objeto->condicion_pago_tiempo;
                $orden->M_Warehouse_ID=$objeto->id_warehouse;
                $orden->InvoiceRule=$objeto->condicion_facturacion;
                //FIN OBLIGATORIOS
                $orden->datepromised=$arr_fecha_entrega[2]."-".$arr_fecha_entrega[1]."-".$arr_fecha_entrega[0];
                $orden->FIN_Paymentmethod_ID=$objeto->metodo_pago;
                $orden->POReference=$objeto->folio." / ".$objeto->numero_cotizacion;//NUMERO DE COTIZACION
                $orden->Description='';
                //$orden->Delivery_Location_ID=""
                $orden->C_Costcenter_ID=$objeto->centro_costo;

                if(strlen($objeto->numero_contrato)){//si hay numero de contrato
                    $orden->user1id=$objeto->numero_contrato;
                    if(empty($orden->User1_ID)){
                        return redirect('compras')->withErrors('VÉRIFIQUE NÚMERO DE CONTRATO');
                    }
                }

                //FIN ID DE NUMERO DE CONTRATO
                $orden->Deliverynotes=$objeto->observacion;
                if(empty($objeto->impuesto)){
                    $orden->IsTaxIncluded='Y';
                }else{
                    $orden->IsTaxIncluded='N';
                }
                //$orden->C_Campaign_ID=$objeto->id_camp_publ;
                //DATOS DE CLIENTE
                $orden->EM_Zascust_Po_Partnerid=$objeto->c_bpartner_id;
                //$orden->EM_Zascust_Po_Legalrepid=""
                $orden->EM_Zascust_Po_Logicmanagerid=$objeto->gerente;
                //dd($objeto->tipo_envio);
                $orden->EM_Zascust_Po_Shippingby=$objeto->tipo_envio;
                    //HelperUtil::log(['ORDEN: '=>$orden]);
                //dd($orden);
                $numero_orden_uid=$orden->guardar();
                //dd($numero_orden_uid[0]->zasapi_order);

                $objeto->c_order_id=$numero_orden_uid[0]->zasapi_order;
                $objeto->update();
                HelperUtil::log(['COMPRA'=>'COMPRA']+$orden->toArray());
            }
            //INSERTAR LINEAS OBTENIDAS DE LA COMPRA.
            $insumos=InsumoCompraVenta::clase('')
            ->IdCompraVenta($objeto->id)->get();
            //dd($insumos);
            foreach ($insumos as $item) {
                //dd($item->codigo_proovedor);
                $arr_error[]='FALTA AGREGAR EN SISTEMA ALENDUM...';
                $linea= new OrdenLinea;
                //IR A BUSCAR EL M_ID
                $arr_produc_v=ProductV::buscar(['value'=>$item->codigo_proovedor])->get();
                $produc_v=$arr_produc_v[0];
                //FIN BUSCAR M_ID
                if(!empty($produc_v->m_product_id)){
                    //INICIO CALCULAR COSTO DE COMPRA POR PIEZA
                    /**
                    ir por el cantidad_unidad_compra
                    dividir el item.>costo / cantidad_unidad_compra
                    el rsl =-> priceActual
                    */
                    $monto=0;
                    $insumo = Insumo::on('mysql')
                    ->codigo($item->codigo_proovedor)
                    ->first();
                    //$insumo=$insumo[0];
                    if(!empty($insumo->cantidad_unidad_compra)){
                    $monto=$item->costos/$insumo->cantidad_unidad_compra;
                    $cantidad=$item->cantidad*$insumo->cantidad_unidad_compra;
                    HelperUtil::log(['item COSTO:'=>$item->costos,'CANTIDAD UNIDAD COMPRA: '=>$insumo->cantidad_unidad_compra,'CANTIDAD'=>$item->cantidad,'MONTO'=>$monto,'ID:'=>$insumo->id]);

                    //FIN CALCULAR COSTO DE COMPRA POR PIEZA
                        if($item->check==''){//viene sin nada en check y hay q dar de alta
                            $linea->c_order_id=$objeto->c_order_id;
                            $linea->M_Product_ID=$produc_v->m_product_id;
                            //$linea->QuantityOrder=$item->cantidad;//cantidad de compra, caja, paquete, bolsa, unidad de compra
                            //$linea->QuantityOrder=NULL;//cantidad de compra, caja, paquete, bolsa, unidad de compra
                            //$linea->QtyOrdered=NULL;//cantidad de venta. charola, unidad de venta
                            $linea->qtyordered=$cantidad;//cantidad de venta. charola, unidad de venta
                            $linea->C_Tax_ID=$item->tax_id;
                            $linea->PriceActual=$monto;//
                            $linea->PriceList=$insumo->costos;//
                            $linea->discount=$item->descuento;
                            $linea->Description='';//$item->descripcion;
                            $linea->C_cost_center_id=$item->centro_costo;
                            $linea->m_product_category_id=$item->m_product_category_id;
                            HelperUtil::log(['COMPRA'=>'LINEA COMPRA']+$linea->toArray());
                            $linea->guardar();
                            $insumo_compra_venta=InsumoCompraVenta::findOrFail($item->id);
                            $insumo_compra_venta->update(['check'=>'0']);
                        }
                    }

                }else{
                    $arr_error[]=$item->codigo_proovedor.' Cant. '.$item->cantidad.'';
                    return redirect('compras')->withErrors($arr_error);
                }//FIN IF COMPROBAR M_ID

            }//FIN FOREACH ITEMS COMPRA
            $objeto->estatus='CERRADO';
            $objeto->save();
            $this->calificacion($objeto->estatus,$objeto->id,$request->issotrx);
            //return redirect('compras')->withErrors(['SE HA PROCESADO LA COMPRA.']);
            return redirect('compras')->withSuccess('SE HA PROCESADO EL PEDIDO DE COMPRA');
        }//FIN GENERAR COMPRA
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $objeto=CompraVenta::findOrFail($id);
        
        //dd($objeto);
        $orden = new Orden();
        $orden->zasapi_order=$objeto->c_order_id;
        $orden->completar();
        $objeto->estatus='COMPLETADO';
        $objeto->save();
        $or=OrderV::where('c_order_id',$objeto->c_order_id)->first();
        
        //dd($or->docum);
        //INCIO AVISO A ALMACEN
        //$this->getMensaje;
        //$arr_des=$this->getMensaje($objeto,$or,$request);
        //HelperUtil::log(['PROCESAR EL OBJETO EN API'=>$objeto]);
        //dd($objeto->clase);

        if($objeto->tipo_archivo=='v'){
            $this->comprar($objeto->insumos_compras_ventas);
            //cotizaciones.autorizadas    cotizaciones.update.
            //$destino=HelperUsuario::getUsuario(['recurso'=>'cotizaciones.update']);//Notificacion para almacen y autores de cotizacion
            $destino=HelperUsuario::getUsuario(['departamento'=>'ALMACEN']);//Notificacion para almacen y autores de cotizacion
            $autor=HelperUsuario::getUsuario(['name'=>$objeto->autor]);//autores de cotizacion
            foreach ($destino as $v) {
                $destinatario=array('destino' => $v->email,
                    'msj'=>'PEDIMENTO DE VENTA GENERADA EN SISTEMA FINANCIERO: '.$objeto->nombre_fiscal.', CON Num. DE DOCUMENTO '.$or->documentno.', COTIZACION: '.$objeto->numero_cotizacion
                 );
                $arr_des[]=$destinatario;
            }
            foreach ($autor as $v) {
                $destinatario=array('destino' => $v->email,
                    'msj'=>'PEDIMENTO DE VENTA GENERADA EN SISTEMA FINANCIERO: '.$objeto->nombre_fiscal.',  CON Num. DE DOCUMENTO '.$or->documentno.', COTIZACION: '.$objeto->numero_cotizacion
                 );
                $arr_des[]=$destinatario;
            }
            if(!empty($arr_des)){
             //$orden->aviso($arr_des);
            }

        }else if($objeto->tipo_archivo=='c'){
            $destino=HelperUsuario::getUsuario(['departamento'=>'ALMACEN']);//Notificacion para almacen y autores de cotizacion
            $autor=HelperUsuario::getUsuario(['name'=>$objeto->autor]);//autores de documento
            foreach (HelperUsuario::getUsuario(['puesto'=>'AUXILIAR ADMINISTRATIVO','area'=>'ADMINISTRACION Y FINANZAS']) as $v) {
                $destinatario=array('destino' => $v->email,
                    'msj'=>'COMPRA ENVIADA A SISTEMA FINANCIERO: '.$objeto->nombre_tercero.' ,# Doc.'.$or->documentno.' COTIZACION: '.$objeto->numero_cotizacion.' FOLIO COMERCIAL: '.$objeto->folio.' TOTAL: '.$objeto->total.' FECHA: '.$objeto->fecha
                 );
                $arr_des[]=$destinatario;
            }

            foreach ($destino as $v) {
                $destinatario=array('destino' => $v->email,
                    'msj'=>'COMPRA ENVIADA A SISTEMA FINANCIERO: '.$objeto->nombre_tercero.' ,# Doc.'.$or->documentno.' COTIZACION: '.$objeto->numero_cotizacion.' FOLIO COMERCIAL: '.$objeto->folio
                 );
                $arr_des[]=$destinatario;
            }
            foreach ($autor as $v) {
                $destinatario=array('destino' => $v->email,
                    'msj'=>'COMPRA ENVIADA A SISTEMA FINANCIERO: '.$objeto->nombre_tercero.' ,# Doc.'.$or->documentno.' COTIZACION: '.$objeto->numero_cotizacion.' FOLIO COMERCIAL: '.$objeto->folio.' TOTAL: '.$objeto->total.' FECHA: '.$objeto->fecha
                 );
                $arr_des[]=$destinatario;
            }

            if(!empty($arr_des)){
             //$orden->aviso($arr_des);
            }

        }
        $this->calificacion($objeto->estatus,$objeto->id,$objeto->tipo_archivo);
        //FIN AVISO A ALMACEN
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /*
    *Regresa el mensaje compuesto para enviar mensaje de correo electronico(aviso)
    *Consultar los estados
    *Consultar los avisos para el estado requerido
    *Consultar los usuarios con el permiso de venta.index o compra.index
    */
    //public getMensaje(){
    private function getMensaje($objeto,$or,$request){
        $arr_des=[];
        $avisar_a='';
        $avisar='';
        $estados='';
        $estados=$this->getEstados($objeto);
        //dd($estados);
        $avisos=$this->getAviso($estados);
        //dd(count($avisos));
        if(count($avisos)>=1){
            foreach ($avisos as $aviso) {
                //HelperUtil::log([' CLASE AVI atributos',$aviso->condicionante,'CONDICION'=>$aviso->condicion]);
                if($objeto->tipo_archivo=='c'){
                    $avisar=$this->getUsuariosPermiso($aviso->condicionante,$aviso->condicion,'compras.index');
                    if(count($avisar)>=1){
                        //HelperUtil::log(['-NOTIFICAR compra  ',$avisar]);
                        $arr_des[]=$this->getArrAvCompr($avisar[0],$objeto,$or);
                    }
                }else{
                    $avisar=$this->getUsuariosPermiso($aviso->condicionante,$aviso->condicion,'ventas.index');
                    if(count($avisar)>=1){
                        //HelperUtil::log(['-NOTIFICAR venta  ',$avisar]);
                        $arr_des[]=$this->getArrAvVta($avisar[0],$objeto,$or,$request);
                    }
                }
            }
        }
        if(!empty($objeto->numero_cotizacion) ){
            $arr_des[]=$this->getAutor($objeto,$or);
        }

        return $arr_des;
    }
    private function getAutor($objeto,$or){
        $arr_des='';
        $destinatario='';
        $autor=HelperUsuario::getUsuario(['name'=>$objeto->autor]);//autores de cotizacion
        foreach ($autor as $v) {
            $destinatario=array('destino' => $v->email,
                'msj'=>'COTIZACION HA SIDO ENVIADA A SISTEMA FINANCIERO: '.$objeto->nombre_fiscal.',  Num. DE DOCUMENTO '.$or->documentno.', COTIZACION: '.$objeto->numero_cotizacion
                    );
            $arr_des=$destinatario;
        }
        //HelperUtil::log(['AUTOR'=>$destinatario]);
        return $arr_des;
    }
    private function getAviso($estados){
        $registro_aviso=null;
        //dd($estados);
        if(count($estados)>1){
            foreach ($estados as $estado ) {
                $registro_aviso=$estado->avisos;
            }
        }elseif(count($estados)==1){

            $registro_aviso=$estados[0]->avisos;
        }
        return $registro_aviso;
    }
    private function getEstados($objeto){
        $estado_aviso='';
         $estado_aviso=Estado::buscar([
            'clase'=>'COT',
            'subclase'=>$objeto->tipo_archivo,
            'organizacion'=>$objeto->organizacion,
            'estado'=>$objeto->estatus,
            ])->get();
         //HelperUtil::log(['ESTADOS'=>$estado_aviso]);
        return $estado_aviso;
    }
    private function getUsuariosPermiso($condicion,$condicionante,$ruta){/*REGRESA LOS USUARIO QUE TIENE PERMISO:RUTA,ESTADO*/
        $usuario_permitido='';
        $usuarios='';
        $usuarios=$this->getUsuarios($condicion,$condicionante);
        //HelperUtil::log(['USUARIOS CONDICIONADOS: '.count($usuarios)=>$usuarios,'condiciones'=>$condicion.' '.$condicionante]);
        //usuario ver permiso de ruta
        if(count($usuarios)>=1){
            foreach ($usuarios as $usuario) {
                //HelperUtil::log(['EL usuario:'=>$usuario]);
                if($this->getPermiso($usuario,$ruta)){
                    $usuario_permitido[]=$usuario;
                }
                //HelperUtil::log(['PERMISOS DE USUARIO:'=>$usuario_permiso]);
            }
        }
        return $usuario_permitido;
    }
    private function getPermiso($usuario,$ruta){
        $permisos='';
        $permiso=0;
        $permisos=$usuario->permisos()->where('recurso',$ruta)->first();
        if(count($permisos)>=1){
            //HelperUtil::log(['USUARIO PERMITIDO: '=>$permisos,$ruta]);
            $permisos=1;
            /*foreach ($permisos as $usuario_permiso) {
            }*/

        }else{
            //HelperUtil::log(['sin PERMISOS: '=>$usuario,$ruta]);
        }
        return $permisos;
    }
    private function getUsuarios($condicion,$condicionante){
        return HelperUsuario::getUsuario([
            $condicion=>$condicionante
        ]);
    }
    private function getArrAvCompr($usuario,$objeto,$or){
        return array(
            'destino' => $usuario->email,
                    'msj'=>'COMPRA ENVIADA A SISTEMA FINANCIERO: '.$objeto->nombre_tercero.' ,# Doc.'.$or->documentno.' COTIZACION: '.$objeto->numero_cotizacion.' FOLIO COMERCIAL: '.$objeto->folio.' TOTAL: '.$objeto->total.' FECHA: '.$objeto->fecha
                        );
    }
    private function getArrAvVta($usuario,$objeto,$or,$request){
        $arr_url=explode('/',$request->url());
        $url= $arr_url[2].'/cotizaciones/autorizadas';
        return array('destino' => $usuario->email,
                    'msj'=>'PEDIMENTO DE VENTA ENVIADO A SISTEMA FINANCIERO: '.$objeto->nombre_fiscal.', CON Num. DE DOCUMENTO '.$or->documentno.', COTIZACION: '.$objeto->numero_cotizacion.'COLOCAR FECHA DE ENTREGA Y HACER CLICK EN BOTON AVISAR A COTIZADOR. GRACIAS. '.'<a href="'.$url.'?buscar=1&numero_cotizacion='.$objeto->numero_cotizacion.'">Clic aquí para confirmar entrega</a>'
                 );
    }
    private function calificacion($estatus,$id,$tipo_doc){
        $iniciales=auth()->user()->iniciales;
        $califico=\Route::current()->getName();
        if($tipo_doc=='Y' || $tipo_doc=='v'){//bandera para venta
          Calificacion::create([
              'id_producto'=>$id,
              'nombre_tipo'=>'venta',
              'ruta_siguiente'=>'',
              'ruta_califico'=>$califico,
              'calificacion'=>$estatus,
              'iniciales'=>$iniciales
              ]);
        }else{//bandera para compra
          Calificacion::create([
            'id_producto'=>$id,
            'nombre_tipo'=>'compra',
            'ruta_siguiente'=>'',
            'ruta_califico'=>$califico,
            'calificacion'=>$estatus,
            'iniciales'=>$iniciales
          ]);

        }
    }
    private function comprar($lineas_productos_venta){
        $ventas_insumos=[];
        $almacen_stock=[];
        //HelperUtil::log(['$lineas_productos_venta :'.count($lineas_productos_venta)=>$lineas_productos_venta]);
        foreach ($lineas_productos_venta as  $insumo_prestamo) {
            # code...
            $insumo=Insumo::findOrFail($insumo_prestamo->id_insumo);
            HelperUtil::log(['$insumo->bandera_insunmo :'.count($insumo->bandera_insumo)=>$insumo->bandera_insumo]);
            if($insumo->bandera_insumo=='C'){//si es consumible, comenzar ver ventas de hace 91 dias
                $dias=Carbon::today()->subDays(91);
                $consumible=$insumo;
                foreach ($this->getVenta($dias,$consumible->codigo_proovedor) as $venta_insumo) {
                    //HelperUtil::log(['$venta_insumo :'.count($venta_insumo)=>$venta_insumo]);
                        # code...Ventas obtenidas para la linea actual
                        if($venta_insumo->lasum>0){
                            //calcular su maximo y minimo de producto
                            //$ventas_insumos[]=$venta_insumo;
                            //$insumo_existencia=$this->existencia($venta_insumo->codigo_proovedor,$venta_insumo->id_warehouse,$venta_insumo->org_name);
                            //HelperUtil::log(['$existencia :'.count($insumo_existencia)=>$insumo_existencia]);
                            //$porcentaja_almacen=round(($insumo_existencia->primer_qty*100)/$venta_insumo->lasum,0);
                            //$almacen_stock=AlmacenStock::buscar(['id_warehouse'=>$venta_insumo->id_warehouse,'codigo_proovedor'=>$venta_insumo->codigo_proovedor,'clase'=>'CONF'])->first();
                            //HelperUtil::log(['$porcentaja_almacen :'.count($porcentaja_almacen)=>$porcentaja_almacen]);
                            //$this->maximoMinimo($venta_insumo,$insumo_existencia,$porcentaja_almacen,0);
                            $this->maximoMinimo($venta_insumo);
                        }
                    }
            }//FIN VENTAS ANTERIORES
        }//FIN PRODUCTOS VTA
        //return $ventas_insumos;
    }//FIN FN COMPRAS
    private function getVenta($dias_anterior,$codigo_proovedor){
        //return DB::table('compras_ventas')
        return CompraVenta::
        join('insumos_compras_ventas', 'compras_ventas.id', '=', 'insumos_compras_ventas.id_compra_venta')
        ->select('compras_ventas.id', 'insumos_compras_ventas.id_compra_venta',
                'compras_ventas.id_warehouse',
                'compras_ventas.org_name',
                'compras_ventas.dato',
                'compras_ventas.folio',
                 'compras_ventas.fecha',
                 'insumos_compras_ventas.codigo_proovedor',
                 'insumos_compras_ventas.cantidad',
                 'insumos_compras_ventas.created_at',
                 'insumos_compras_ventas.id_insumo',
                 'compras_ventas.created_at',
                'compras_ventas.tipo_archivo')
            ->selectRaw('SUM(insumos_compras_ventas.cantidad) as lasum')
            ->where('compras_ventas.dato','like','%stock":"SI"%')
            ->where('compras_ventas.tipo_archivo','v')
            ->where('compras_ventas.c_order_id','<>','')
            ->where('compras_ventas.estatus','COMPLETADO')
            //->where('compras_ventas.org_name',$org_name)
            ->where('insumos_compras_ventas.codigo_proovedor',$codigo_proovedor)
            //->where('compras_ventas.id_warehouse',$id_warehouse)
            ->whereDate('compras_ventas.created_at','>=',$dias_anterior)
            //->orderBy('insumos_compras_ventas.created_at')
            ->groupBy('compras_ventas.id_warehouse')
            ->groupBy('compras_ventas.org_name')
            ->get();
    }
    private function existencia($codigo_proovedor,$id_warehouse,$org_name){        
        $equips = Equipo::codigo($codigo_proovedor)->get();
        $equipo_stock=null;
        $sp=0;
        $ss=0;
        $equipo['m_producto_id']='';
        $equipo['codigo_proovedor']='';
        $equipo['descripcion']='';
        $equipo['primer_qty']=$sp;
        $equipo['segundo_qty']=$ss;
        $equipo['primer_nombre_uom']=0;
        $equipo['segundo_nombre_uom']=0;
        $equipo['almacen']='';
        $equipo['nombre_org']='';
        foreach ($equips as $equip) {
            $equipo['m_producto_id']=$equip->m_product_id;
            $equipo['codigo_proovedor']=$equip->value;
            $equipo['descripcion']=$equip->description;
                foreach ($equip->re_stock->where('m_warehouse_id',$id_warehouse) as $st) {
                //foreach ($equip->re_stock->where('warehouse_name',$this->almacen) as $st) {
                    $sp=$sp+$st->primary_qty;// cantidad en venta
                    $ss=$ss+$st->secondary_qty;//cantidad en compra
                    $equipo['primer_qty']=$sp;
                    $equipo['segundo_qty']=$ss;
                    $equipo['primer_nombre_uom']=$st->primary_uom_name;
                    $equipo['segundo_nombre_uom']=$st->secondary_uom_name;
                    $equipo['almacen']=$st->warehouse_name;
                    $equipo['nombre_org']=$org_name;
                }
            }
        return $equipo_stock=(object)$equipo;
    }
    private function maximoMinimo($venta,$existencia='',$porcentaja_almacen='',$porcentaje_seguridad=''){//Guardar en tabla productos
                        $arr['codigo_proovedor']=$venta->codigo_proovedor;
                        $arr['id_insumo']=$venta->id_insumo;
                        $arr['m_product_id']='';//$existencia->m_producto_id;
                        $arr['almacen']= '';//$existencia->almacen;
                        $arr['org_name']=$venta->org_name;
                        $arr['porcentaje_seguridad']=65;
                        $arr['id_warehouse']=$venta->id_warehouse;
                        $arr['clase']='PEDIR';
                        $arr['calcular']=$porcentaja_almacen;
                        $arr['punto_pedido']=round(($venta->lasum /3),0);//minimo
                        $arr['maximo']=$venta->lasum;
                        $arr['aviso']='';
                        $arr['tiempo_respuesta']='';
                        $this->elimPedir($venta->codigo_proovedor,$venta->org_name);
                        $pedir=new AlmacenStock($arr);
                        //HelperUtil::log(['$arr :'.count($arr)=>$arr]);
                        $pedir->save();
        /*if(empty($porcentaje_seguridad) ){
                if($porcentaja_almacen<=65){
                        $arr['codigo_proovedor']=$venta->codigo_proovedor;
                        $arr['id_insumo']=$venta->id_insumo;
                        $arr['m_product_id']=$existencia->m_producto_id;
                        $arr['almacen']= $existencia->almacen;
                        $arr['org_name']=$venta->org_name;
                        $arr['porcentaje_seguridad']=65;
                        $arr['id_warehouse']=$venta->id_warehouse;
                        $arr['clase']='PEDIR';
                        $arr['calcular']=$porcentaja_almacen;
                        $arr['punto_pedido']=round(($venta->lasum /3),0);//minimo
                        $arr['maximo']=$venta->lasum;
                        $arr['aviso']='';
                        $arr['tiempo_respuesta']='';
                        $this->elimPedir($venta->codigo_proovedor);
                        $pedir=new AlmacenStock($arr);
                        HelperUtil::log(['$arr :'.count($arr)=>$arr]);
                        $pedir->save();
                        $this->pedir($arr);
                    }
        }else{
                    if($porcentaja_almacen<=$porcentaje_seguridad){
                        $almacen_stock = new AlmacenStock;
                        $almacen_stock->codigo_proovedor=$venta->codigo_proovedor;
                        $almacen_stock->id_insumo=$venta->id_insumo;
                        $almacen_stock->m_product_id=$producto_existe->m_producto_id;
                        $almacen_stock->almacen= $producto_existe->almacen;
                        $almacen_stock->org_name=$venta->org_name;
                        $almacen_stock->porcentaje_seguridad=$porcentaje_seguridad;
                        $almacen_stock->id_warehouse=$venta->id_warehouse;
                        $almacen_stock->clase='PEDIR';
                        $almacen_stock->calcular=$porcentaja_almacen;//% de pedido
                        $almacen_stock->punto_pedido=round(($venta->lasum / 3),0);//minimo
                        $almacen_stock->maximo=$venta->lasum;
                        $almacen_stock->aviso='';
                        $almacen_stock->tiempo_respuesta='';
                        $this->elimPedir($venta->codigo_proovedor,$venta->org_name);
                        $almacen_stock->save();
                    }

        }*/

    }
    private function elimPedir($codigo_proovedor,$org_name){
        $almacen_stock=[];
        $almacen_stock = AlmacenStock::buscar(['codigo_proovedor'=>$codigo_proovedor,'clase'=>'PEDIR','org_name'=>$org_name])->first();
        if(!empty($almacen_stock)){
            $almacen_stock->delete();
        }
    }

}

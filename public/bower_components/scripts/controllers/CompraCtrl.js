'use strict';
angular.module('cotizacionApp')
.controller('CompraCtrl',function ($window,$location,$filter,$scope,$controller,$timeout,insumosSrc,cotizacionPaqueteInsumoSrc,tercerosSrc,direccionesSrc,agenteAduanalSrc,condicionPagoSrc,compraSrc,conversionSrc,userSrc,marcaProveedorSrc,productVSrc,taxVsrc,ventaSrc,orgVsrc,categoriaProductoSrc){
  angular.extend(this,$controller('NumeroAletraCtrl',{$scope:$scope}));
  $scope.compra_venta = {
    "insumos":[],
    "id":"",                    //ok
    "version":"",                    //ok
    "stock":"",                    //ok
    "group_name":"",                    //ok
	  "digitalizacion":"",                    //ok
    "numero_orden":"",          //ok
    "numero_cotizacion":"",     //ok
    "folio":"",                 //ok
    "autor":"",                 //ok
    "area":"",                  //ok
	 "centro_costo":"",          //ok
	 "departamento":"",          //ok
    "fecha_entrega":"",         //ok
    "numero_contrato":"",       //okGET
  	"numero_contrato_cliente":"",
    "fecha":"",                 //ok
  	"atribuir":"",              //ok
    "nombre_fiscal":"",         //ok
    "rfc":"",                   //ok
    "direccion_fiscal":"",      //ok
    "colonia_fiscal":"",        //ok
    "codigo_postal_fiscal":"",  //ok
    "estado_fiscal":"",     //ok
  	"ciudad_fiscal":"",         //ok
    "metodo_pago":"",           //ok
    "condicion_pago_tipo":"",   //ok
    "condicion_pago_marca":"",  //ok
    "condicion_pago_tiempo":"", //ok
    "tipo_envio":"",            //ok
    "gerente":"",               //ok
    "representante_tercero":"", //ok
    "correo_representante_tercero":"", //ok
    "fecha_embarque":"",        //ok
    "tipo_cambio":"",           //ok
    "nota":"",                  //ok
    "tipo_archivo":"",          //ok
    "id_camp_publ":"",        //ok
    "org_id":"",              //ok
    "org_name":"",            //ok
    "id_doctype_target":"",   //ok
    "c_bpartner_location":"", //ok
    "c_bpartner_location_prov":"", //ok
    "p_delivery_location_id":"", //ok
    "id_warehouse":"",        //ok
    "tipo_moneda":"",         //ok
    "condicion_facturacion":"",//ok
    "c_bpartner_id":"",       //ok
    "c_bpartner_id_prov":"",       //ok
  	"fecha_facturacion":"",  //ok
    "nombre_agente_aduanal":'', //ok
    "direccion_agente":'',      //ok
    "telefono_agente":'',     //ok
    "fax_agente":'',          //ok
    "correo_agente":'',       //ok
    "nombre_tercero":"",  //ok
    "direccion_tercero":"", //ok
    "ciudad_tercero":"",    //ok
    "colonia_tercero":"", //ok
    "cp_tercero":"",      //ok
    "estado_tercero":"",  //ok
    "pais_tercero":"",    //ok
    "dato":"",    //ok  //"subTotal":0.00,
    "send_to":"A",    //ok  //"subTotal":0.00,
    "equipo":"",    //ok  //"subTotal":0.00,
    "numero_serie":"",    //ok  //"subTotal":0.00,
    "incoterm":"",    //ok  //"subTotal":0.00,
    "sr":"",    //ok  //"subTotal":0.00,
    "reporte":"",    //ok  //"subTotal":0.00,
    "iva":0.00,         //ok
    "total":0.00,        //ok
    "id_cotizacion":"",        //ok
    "moneda":"",        //ok
    "name_metodo_envio":"",
    "name_metodo_pago":"",
    "name_condicion_pago":"",
    "name_gerente":"",
    "name_facturacion":""
  };
  
  $scope.subTotal=0.00;
  $scope.iva=0.00;
  $scope.total=0.00;
  $scope.seleccionado=[];
  $scope.busquedaC={
    'vista':1,
    'tipo_equipo':"",
    'codigo_proovedor':"",
    'modelo':"",
    'descripcion':"",
    'marca':"",
    'categoria1':''
  }

  $scope.inicio=function(){                                                                         
    $scope.metodoPago();                                                                            //NO LLEVA
    $scope.categoria_producto("*");
  }

  $scope.getCotizacion=function(id,tipo_archivo){                                                   //console.log(tipo_archivo);  //console.log($scope.compra_venta.fecha_embarque);//Ok
    $scope.verNombreCliente=true;    
    cotizacionPaqueteInsumoSrc.get({id:id},function(data){
      $scope.seleccionado=data.cotizacion.insumos;
      var ns=data.cotizacion.equipo.split("SERIE:");
      $scope.compra_venta=data.cotizacion;                                                          //console.log(data);
      $scope.compra_venta.equipo=ns[0];
      $scope.compra_venta.numero_serie=ns[1];
      $scope.org_id=data.cotizacion.org_id;
      $scope.organizacion=data.cotizacion.org_name;
      $scope.compra_venta.fecha_embarque="";
      $scope.compra_venta.centro_costo="";
      $scope.compra_venta.send_to="A";
      $scope.compra_venta.insumos=[];
      $scope.validarTipoArchivo(tipo_archivo);
      var dat= new Date();                                                                          
      $scope.compra_venta.fecha = moment(dat).format('DD-MM-YYYY');
      $scope.compra_venta.version=0;
      $scope.compra_venta.tipo_archivo=tipo_archivo;
      $scope.compra_venta.numero_contrato=data.cotizacion.no_contrato;
      $scope.compra_venta.representante_tercero=data.cotizacion.contacto;
      $scope.compra_venta.rfc=data.cotizacion.rfc;
      $scope.compra_venta.correo_representante_tercero=data.cotizacion.correo;
      $scope.compra_venta.direccion_fiscal=data.cotizacion.calle_fiscal;
      $scope.compra_venta.autor=$scope.autor;                                                         //$scope.compra_venta.autor=data.cotizacion.nombre_empleado;
      $scope.compra_venta.atribuir=data.cotizacion.iniciales_asignado;
      $scope.compra_venta.c_bpartner_location=data.cotizacion.c_location_id;
      $scope.compra_venta.fecha_facturacion=data.cotizacion.fecha_factura;
      $scope.compra_venta.id_cotizacion=id;
      $scope.compra_venta.fecha_embarque = '';
      $scope.compra_venta.moneda = data.cotizacion.tipo_moneda;                                       console.log(data.cotizacion.tipo_moneda);
      $scope.compra_venta.tipo_moneda=$scope.validarMoneda(data.cotizacion.tipo_moneda,tipo_archivo);
      if(data.cotizacion.compra=="EXTRANJERO"){
        $scope.compra_venta.group_name=data.cotizacion.compra+"S";                                  //alert($scope.compra_venta.group_name);
      }else{
        $scope.compra_venta.group_name=data.cotizacion.compra;                                      //alert($scope.compra_venta.group_name);
      }
      if(tipo_archivo=="v"){                                                                          //$scope.compra_venta.autor=data.cotizacion.nombre_empleado;
        if($scope.organizacion=="SMH"){
            $scope.compra_venta.id_doctype_target='511A9371A0F74195AA3F6D66C722729D';
          }else if($scope.organizacion=="IMS"){
            $scope.compra_venta.id_doctype_target='B838D07DE71B4D11A7D72EBA9E2CFA03';
          }
        $scope.c_bpartner_id=data.cotizacion.c_bpartner_id;                                         //$scope.compra_venta.tipo_envio=data.cotizacion.id_metodo_envio;
        $scope.compra_venta.metodo_pago=data.cotizacion.metodo_pago;                                //console.log(data.cotizacion.id_condicion_factura);
        $scope.compra_venta.condicion_pago_tiempo=data.cotizacion.id_condicion_pago_tiempo;
        $scope.compra_venta.condicion_facturacion=data.cotizacion.id_condicion_factura;             //console.log(data.cotizacion.id_condicion_factura);
        $scope.compra_venta.nombre_tercero=data.cotizacion.nombre_cliente;
        $scope.compra_venta.direccion_tercero=data.cotizacion.calle_entrega;
        $scope.compra_venta.colonia_tercero=data.cotizacion.colonia_entrega;
        $scope.compra_venta.cp_tercero=data.cotizacion.codigo_postal_entrega;
        $scope.compra_venta.ciudad_tercero=data.cotizacion.ciudad_entrega;
        $scope.compra_venta.estado_tercero=data.cotizacion.estado_entrega;
        $scope.compra_venta.pais_tercero=data.cotizacion.pais_entrega;
        $scope.compra_venta.id_cotizacion=id;
        $scope.compra_venta.p_delivery_location_id=data.cotizacion.id_metodo_envio;                 //console.info($scope.compra_venta.p_delivery_location_id);
        $scope.validarIva($scope.compra_venta.group_name,tipo_archivo);
        $scope.setLineasCotizacion();
      }else if(tipo_archivo=="c"){
        $scope.compra_venta.fecha_entrega ="";
        $scope.compra_venta.metodo_pago="";
        $scope.lineasCotizacionCompra=1;
      }
    }); //FIN SCR COTIZACION
  }//FIN GET COTIZACION

  $scope.getSolicitud=function(){                                                                   console.log($scope.compra_venta.tipo_archivo);
    var dat= new Date();                                                                            console.log($scope.compra_venta.autor);console.log($scope.compra_venta.area);console.log($scope.compra_venta.departamento);
    $scope.verNombreClienteBusqueda=true;
    $scope.compra_venta.nombre_fiscal="SUMINISTRO PARA USO MEDICO Y HOSPITALARIO";
    $scope.compra_venta.fecha = moment(dat).format('DD-MM-YYYY');
    $scope.compra_venta.version=0;                                            
    $scope.compra_venta.nota="";
    $scope.compra_venta.fecha_entrega="";
    $scope.compra_venta.fecha_embarque="";
    $scope.validarTipoArchivo("c");
    $scope.funcionesIniciales("N","*");
    $scope.buscarTipoCambioActual();                                                                //$scope.buscarTipoCambioActual('2016-09-13');
    $scope.tercerosLst("SUMINISTRO PARA USO MEDICO Y HOSPITALARIO","*","Y","*");
  }

  $scope.getCompraVenta= function(id){                                                              console.info(id);//console.info(objeto);
    $scope.verNombreCliente=true;    
    $scope.verTipoActualizacion=true;
    compraSrc.get({id:id},function(data){                                                           console.log(data);
      $scope.compra_venta=data.compra;
      $scope.validarTipoArchivo(data.compra.tipo_archivo);
      //$scope.funcionesIniciales("N",data.compra.org_id);
      $scope.org_id=data.compra.org_id;
      $scope.validarIva(data.compra.group_name,data.compra.tipo_archivo);
      var i=0;
      var f_e=$scope.compra_venta.fecha_entrega.split("-");
      $scope.fecha_entrega=f_e[2]+"-"+f_e[1]+"-"+f_e[0]+" 00:00:00";
      if($scope.compra_venta.fecha_embarque!=""){
        var f_em=$scope.compra_venta.fecha_embarque.split("-");
        $scope.fecha_embarque=f_em[2]+"-"+f_em[1]+"-"+f_em[0]+" 00:00:00";
      }
      if(data.compra.dato!=""){
        $scope.compra_venta.dato=JSON.parse(data.compra.dato);                                      //console.log($scope.compra_venta.dato.p_delivery_location_id);
        $scope.compra_venta.p_delivery_location_id=$scope.compra_venta.dato.p_delivery_location_id;
        $scope.compra_venta.equipo=$scope.compra_venta.dato.equipo;
        $scope.compra_venta.numero_serie=$scope.compra_venta.dato.numero_serie;
        $scope.compra_venta.sr=$scope.compra_venta.dato.sr;
        $scope.compra_venta.incoterm=$scope.compra_venta.dato.incoterm;
        $scope.compra_venta.reporte=$scope.compra_venta.dato.reporte;
        $scope.compra_venta.stock=$scope.compra_venta.dato.stock;
        $scope.compra_venta.moneda=$scope.compra_venta.dato.moneda;
        $scope.compra_venta.name_metodo_envio=$scope.compra_venta.dato.name_metodo_envio;
        $scope.compra_venta.name_metodo_pago=$scope.compra_venta.dato.name_metodo_pago;
        $scope.compra_venta.name_condicion_pago=$scope.compra_venta.dato.name_condicion_pago;
        $scope.compra_venta.name_gerente=$scope.compra_venta.dato.name_gerente;
        $scope.compra_venta.name_facturacion=$scope.compra_venta.dato.name_facturacion;
      }
      $scope.tipo_archivo=$scope.compra_venta.tipo_archivo;                                         //$scope.group_name=data.compra.group_name;                               //console.log(data.compra.group_name);console.log($scope.group_name);console.log(data.compra.dato);
      $scope.seleccionado=data.compra.insumos_compras_ventas;
      $scope.compra_venta.insumos=[];                                                               //console.log($scope.compra_venta.tipo_archivo);
      while(i < $scope.seleccionado.length){                                                        //console.log(i+"<"+$scope.seleccionado.length);      //alert($scope.tipo_archivo); console.log($scope.tipo_archivo);//ok
        $scope.compra_venta.insumos.push({
          id_insumo:$scope.seleccionado[i].id_insumo,
          id_pack:$scope.seleccionado[i].id_pack,
          cantidad:$scope.seleccionado[i].cantidad,
          codigo_proovedor:$scope.seleccionado[i].codigo_proovedor,
          modelo:$scope.seleccionado[i].modelo,
          marca:$scope.seleccionado[i].marca,
          descripcion:$scope.seleccionado[i].descripcion,
          caracteristicas:$scope.seleccionado[i].caracteristicas,
          especificaciones:$scope.seleccionado[i].especificaciones,
          costos:$scope.seleccionado[i].costos,
          precio:$scope.seleccionado[i].precio,
          unidad_venta:$scope.seleccionado[i].unidad_venta,
          unidad_compra:$scope.seleccionado[i].unidad_compra,
          tipo_cambio:$scope.seleccionado[i].tipo_cambio,
          tipo_equipo:$scope.seleccionado[i].tipo_equipo,
          bandera_insumo:$scope.seleccionado[i].bandera_insumo,
          costo_moneda:$scope.seleccionado[i].costo_moneda,
          total:$scope.seleccionado[i].total,
          tipo_archivo:$scope.compra_venta.tipo_archivo,
          m_product_category_id:$scope.seleccionado[i].m_product_category_id,
          tax_id:$scope.seleccionado[i].tax_id,
          group_name:$scope.compra_venta.group_name,
        });
        i++;
      }                                                                                             //$scope.selectProovedor($scope.compra_venta.nombre_tercero);
    },function(err){alert('ERROR EN SERVIDOR.');});                                                 //FIN SERVICE COMPRA
  }

  $scope.validarTipoArchivo=function(tipo){
    if(tipo=="c"){                                                                                  console.info("COMPRA")//alert("COMPRA");
      $scope.get_tax_id("P");
      $scope.getTipoMoneda("0","COMPRAS*","*","*");
      $scope.funcionesIniciales("N",$scope.org_id);
      $scope.tercero="PROOVEDOR";
      $scope.ver_insumo_costo=true;
      $scope.ver_form_compra=true;
      $scope.ver_buscarInsumos=true;
    }
    if(tipo=="v"){                                                                                  console.info("VENTA");//alert("VENTA");
      $scope.getTipoMoneda("0","VENTAS*");
      $scope.funcionesIniciales("Y",$scope.org_id);
      $scope.tercero="ENTREGA";
      $scope.ver_form_venta=true;
      $scope.ver_insumo_precio=true;
      $scope.verNombreCliente=true;
      $scope.verTipoActualizacion=false;
    }
  }

  $scope.setLineasCotizacion=function(){
    $timeout(function() {
    var i=0,x="",y="";
    while(i < $scope.seleccionado.length){                            
        if($scope.compra_venta.tipo_archivo=="c"){                    
          x=$scope.convertir($scope.seleccionado[i].insumo_unidad_compra, $scope.seleccionado[i].insumo_unidad_medida, $scope.seleccionado[i].cantidad, 1,$scope.seleccionado[i].insumo_cantidad_unidad_compra);
          y=$scope.convertirCosto($scope.seleccionado[i].insumo_unidad_compra, $scope.seleccionado[i].insumo_unidad_medida, $scope.seleccionado[i].cantidad, 1,$scope.seleccionado[i].insumo_cantidad_unidad_compra,$scope.seleccionado[i].insumo_costos);
        }else if($scope.compra_venta.tipo_archivo=="v"){                                                 //console.log("VENTA");
          x=$scope.seleccionado[i].cantidad;
        }
        //if($scope.seleccionado[i].bandera_insumo!="S"){                 
          $scope.compra_venta.insumos.push({
            id_insumo:$scope.seleccionado[i].id_insumo,
            id_pack:$scope.seleccionado[i].id_pack,
            cantidad:x,
            codigo_proovedor:$scope.seleccionado[i].codigo_proovedor,
            modelo:$scope.seleccionado[i].modelo,
            marca:$scope.seleccionado[i].marca,
            descripcion:$scope.seleccionado[i].descripcion,
            caracteristicas:$scope.seleccionado[i].caracteristicas,
            especificaciones:$scope.seleccionado[i].especificaciones,
            costos:$scope.seleccionado[i].costos,
            precio:$scope.seleccionado[i].precio,
            unidad_venta:$scope.seleccionado[i].unidad_medida,
            unidad_compra:$scope.seleccionado[i].unidad_compra,
            costo_moneda:$scope.seleccionado[i].costo_moneda,
            tipo_cambio:$scope.seleccionado[i].tipo_cambio,
            tipo_equipo:$scope.seleccionado[i].tipo_equipo,
            bandera_insumo:$scope.seleccionado[i].bandera_insumo,
            total:$scope.seleccionado[i].total,                         
            m_product_category_id:$scope.seleccionado[i].m_product_category_id,   
            tipo_archivo:$scope.compra_venta.tipo_archivo,
            tax_id:$scope.tax_id,
            group_name:$scope.compra_venta.group_name
          });                   
        //}                       
        i++;
      }//FIN WHILE                                                                                        
      console.log($scope.compra_venta.insumos);
    },5000);
  }

  $scope.selectEntrega=function(date){
    $scope.compra_venta.fecha_entrega=moment(date).format('DD-MM-YYYY');
  }

  $scope.selectEmbarque=function(date){
    $scope.compra_venta.fecha_embarque=moment(date).format('DD-MM-YYYY');
  }

  $scope.funcionesIniciales=function(b,org_id){
    $scope.getCentroCosto(org_id);
    $scope.tiposTransaccion(b,org_id)
    $scope.getMetodoEnvio("*","*");      //NO LLEVA
    $scope.condicionTiempoPago(); //NO LLEVA
    $scope.getCondicionFactura();//NO LLEVA
    $scope.getTipoAlmacen(org_id);
    $scope.getUser(org_id);
  }

  $scope.bloquear=function(oo){           //alert("ENTRO");
    if(oo=='actualizar'){
      $scope.esc_p1=false;                //DATOS CLIENTE
      $scope.esc_p2=false;                //DATOS API
      $scope.esc_p3=false;                //DATOS PRODUCTO
      $scope.esc_p4=false;                //DATOS PROVEEDOR
      $scope.esc_p5=true;                 //DATOS AGENTE
      $scope.btnDelete=false;
      $scope.btnEdit=false;
      $scope.up=true;
      $scope.sa=false;
      $scope.verNombreClienteBusqueda=true;
      $scope.verNombreCliente=false;
    }else{                          //VERSION
      $scope.esc_p1=false;
      $scope.esc_p2=false;
      $scope.esc_p3=false;
      $scope.esc_p4=true;
      $scope.esc_p5=false;
      $scope.btnDelete=false;
      $scope.btnEdit=false;
      $scope.up=false;
      $scope.sa=true;                                     
    }
  }

  $scope.selectTercero=function(seleccion){                                                               console.info(seleccion);
    if(seleccion.org_name=="SMH"){                                                                        console.log("SMH");
      $scope.compra_venta.gerente="5A85F73E55F348859A61CC2A33533AFD";
      if($scope.compra_venta.tipo_archivo=="c"){                                                          console.log("COMPRA");
        //$scope.getFolio(seleccion.organizacion);
        $scope.funcionesIniciales("N",seleccion.org_id);
        if(seleccion.taxid=="SUM890327137"){                                                              console.log("SUMINISTRO");
          $scope.compra_venta.centro_costo="219BA5C8DA57459C9A74EE3861BF0F52";          
          $scope.compra_venta.id_warehouse="848690D227EA41B4A906939843611EB1";
          $scope.compra_venta.id_doctype_target="808F8818F724497D94282AC83493F394";         
        }
      }//FIN COMPRA
    }else{                                                                                                console.log("IMS");
      $scope.funcionesIniciales("N",seleccion.org_id);
      $scope.compra_venta.centro_costo="F8F056E6C5C44EA1BFF45D3246933389";
      $scope.compra_venta.gerente="EB17DD93452A467B9631A0072E8276CD";
      $scope.compra_venta.id_warehouse="7A1FAF1BBDBB4004BFF9BB66BFECAA4E";
      $scope.compra_venta.id_doctype_target="0320031B861446648360A0C680191E94";
    }
    $scope.compra_venta.nombre_fiscal=seleccion.bpartner_name;
    $scope.compra_venta.c_bpartner_id=seleccion.c_bpartner_id;
    $scope.compra_venta.org_id=seleccion.org_id;
    $scope.org_id=seleccion.org_id;
    $scope.organizacion=seleccion.org_name;
    $scope.compra_venta.org_name=seleccion.org_name;
    $scope.compra_venta.rfc=seleccion.taxid;
    $scope.busquedaC.categoria1=seleccion.org_name;                  
    $scope.getGerenteName($scope.org_id,$scope.compra_venta.gerente);                                     //$scope.funcionesIniciales();
    $scope.direccionesLst(seleccion.c_bpartner_id,'t');
  }

  $scope.selectProovedor=function(seleccion){                                                               console.info(seleccion);
    var seleccion=JSON.parse(seleccion);                                                                    //console.log(seleccion);
    if(seleccion != undefined || seleccion.length>0){
      if(seleccion.group_name=="ACREEDORES DIVERSOS"){
        alert("!!EL TERCERO ESTA CONFIGURADO COMO ACREEDOR, FAVOR DE VERIFICAR¡¡");                       console.error("EL TERCERO ES ACREEDOR");
      }else{
        $scope.compra_venta.nombre_tercero=seleccion.bpartner_name;
        $scope.setMoneda(seleccion.vendor_pricelist_id);
        $scope.compra_venta.tipo_moneda=seleccion.vendor_pricelist_id;
        $scope.compra_venta.group_name=seleccion.group_name;                                              //console.log("PROOVEDOR PARA COMPRA");console.log(seleccion.group_name)
        $scope.group_name=seleccion.group_name;                                                           //console.log("PROOVEDOR PARA COMPRA");console.log(seleccion.group_name)
        $scope.compra_venta.c_bpartner_id_prov =seleccion.c_bpartner_id;
        $scope.compra_venta.metodo_pago =seleccion.vendor_paymentmethod_id;
        $scope.compra_venta.condicion_pago_tiempo =seleccion.vendor_paymentterm_id;
        $scope.validarIva($scope.compra_venta.group_name,"c");
        if($scope.lineasCotizacionCompra==1){
          $scope.setLineasCotizacion();
        }
        $scope.direccionesLst(seleccion.c_bpartner_id,'p');
      }
    }else{
      alert("NO HA SELECCIONADO NINGUNA OPCION");
    }
  }

  $scope.validarMoneda=function(moneda,tipo){
    if(tipo=='c'){
      if(moneda=='MXN'){
        var tmoneda='C41130E41757417FBF2E069AB5F800A2';
      }
      if(moneda=='USD'){
        var tmoneda='2017143AC5064EDEB1B19794AF36590B';
      }
      if(moneda=='EUR'){
        var tmoneda='1D2CBBFB0407443B9200D65893C5FD8C';
      }
      if(moneda=='JPY'){
        var tmoneda='F980D1566FC742DF82BBA1E4F73D8C91';
      }
      if(moneda=='GBP'){
        var tmoneda='8120C087E88845989D6DFF071C6BCB51';
      }
    }else{
       if(moneda=='MXN'){
        var tmoneda='EA1310CB1C4340A89CB65361552A0339';
      }
      if(moneda=='USD'){
        var tmoneda='36B40DA2AA6849EDA021B07888D7E627';
      }
      if(moneda=='EUR'){
        var tmoneda='';
      }
      if(moneda=='JPY'){
        var tmoneda='15443D97A298449E943F8749F1F89FB0';
      }
      if(moneda=='GBP'){
        var tmoneda='';
      }
    }
    return tmoneda;
  }

  $scope.setMoneda=function(moneda){                                                        //alert(moneda);
    if(moneda=="1D2CBBFB0407443B9200D65893C5FD8C"){
      $scope.compra_venta.moneda="EUR";
    }
    if(moneda=="8120C087E88845989D6DFF071C6BCB51"){
      $scope.compra_venta.moneda="GBP";
    }
    if(moneda=="F980D1566FC742DF82BBA1E4F73D8C91"){
      $scope.compra_venta.moneda="JPY";
    }
    if(moneda=="C41130E41757417FBF2E069AB5F800A2"){
      $scope.compra_venta.moneda="MXN";
    }
    if(moneda=="2017143AC5064EDEB1B19794AF36590B"){
      $scope.compra_venta.moneda="USD";
    }
  }

  $scope.validarIva=function(group_name,tipo_archivo){                                        console.info(group_name);
    if(tipo_archivo=="c"){                                                                    console.info("IMPUESTOS COMPRA");
      if(group_name=="EXTRANJEROS"){                                                          console.info("IMPUESTOS EXTRANJEROS");
        $scope.verAgenteAduanal=true;
        $scope.getTaxId("0 IVA","P");
      }else{                                                                                  //console.log("PROOVEDOR LOCAL");
        $scope.getTaxId("16 IVA BIENES","P");
      }
    }else{                                                                                    console.info("IMPUESTOS VENTA");
      if(group_name=="EXTRANJEROS"){                                                          console.info("IMPUESTOS EXTRANJEROS");
        $scope.getTaxId("0 IVA","S");
      }else{                                                                                  //console.log("PROOVEDOR LOCAL");
        $scope.getTaxId("16 IVA","S");
      }
    }
  }

  $scope.editarPrecio=function(indice,seleccionado){                                        console.log(seleccionado);
    if(confirm("¿Desea editar el precio del producto seleccionado?")){                      console.log(seleccionado.group_name);
      $scope.seleccionado=seleccionado;                                                     //console.info($scope.tipo_archivo);
      $scope.cantidad=seleccionado.cantidad;
      if($scope.tipo_archivo=='v'){
        $scope.ver_buscarInsumos=true;
        $scope.precioCompra=seleccionado.precio;
        $scope.costo_moneda=seleccionado.tipo_cambio;
        $scope.remover(indice,seleccionado);
      }else{
        $scope.precioCompra=seleccionado.costos;
        $scope.costo_moneda=seleccionado.costo_moneda;
        $scope.tax_id=seleccionado.tax_id;
        $scope.remover(indice,seleccionado);
      }
      $scope.btnCarrito=false;
      $scope.unidad_medida=seleccionado.unidad_venta;
      $scope.seleccionado.unidad_medida=seleccionado.unidad_venta;
      $scope.codigo_proovedor=seleccionado.codigo_proovedor;
      $scope.descripcion=seleccionado.descripcion;
      $scope.categoria=seleccionado.m_product_category_id;
      $scope.seleccionado.id=seleccionado.id_insumo;
    }else{alert("! ACCION CANCELADA ¡")}
  }

  $scope.remover=function(j,objeto){                                                           console.log(objeto.group_name);     
    if(confirm("¿ DESEA ELIMINAR EL PRODUCTO DE LA LISTA?")){                                  console.log($scope.precioCompra);console.log($scope.cantidad);
      var precio=$scope.precioCompra*$scope.cantidad;
      if(objeto.group_name=="EXTRANJEROS"){
        var iva  = 0;
        $scope.compra_venta.iva=0;
      }else{
        var iva  = precio*0.16;
        $scope.compra_venta.iva=$scope.compra_venta.iva-iva;
      }
      $scope.subTotal=$scope.subTotal-precio;
      $scope.compra_venta.total=$scope.compra_venta.total-(precio+$scope.compra_venta.iva);
      $scope.letras=$scope.NumeroALetras($scope.compra_venta.total,$scope.cambio);
      $scope.compra_venta.insumos.splice(j,1);
    }else{
      alert("¡ Accion Cancelada !");
    }
  }

  $scope.equipos =function(seleccionado){                                                                 //console.log($scope.group_name);console.log(seleccionado);      //OK
    if(seleccionado.cantidad_unidad_compra=="" || seleccionado.cantidad_unidad_compra==undefined){
      alert("¡¡ FAVOR DE VERIFICAR EL PRODUCTO EN SU ATRIBUTO: unidades por cantidad de compra !!");
    }else{                                                                                                console.log($scope.compra_venta.tipo_moneda);
      if($scope.compra_venta.tipo_moneda=="" || $scope.compra_venta.tipo_moneda==undefined){
        alert("FAVOR DE SELECCIONAR LA MONEDA DE COMPRA");
      }else{
        if(confirm("¿Desea agregar el producto seleccionado?")){
          $scope.btnCarrito=false;
          $scope.cantidad=1;
          $scope.codigo_proovedor=seleccionado.codigo_proovedor;
          $scope.precioCompra=seleccionado.costos;
          $scope.costo_moneda=$scope.compra_venta.moneda;
          $scope.descripcion=seleccionado.descripcion;
          $scope.setCategoria_producto(seleccionado.tipo_equipo);
          if($scope.compra_venta.tipo_archivo=="c"){
            $scope.fechaEntrega(seleccionado);
            $scope.unidad_medida=seleccionado.unidad_compra;                                                console.log("UNIDAD COMPRA EQUIPO");
          }else{
            $scope.unidad_medida=seleccionado.unidad_medida;
          }
          $scope.seleccionado=seleccionado;
        }else{
          alert("! ACCION CANCELADA ¡");
        }
      }
    }
  }

  $scope.agregarCarrito=function(){ $scope.esc_p4=false;                                                  //console.log($scope.seleccionado.id);console.warn($scope.group_name);
    if($scope.categoria==""||$scope.categoria==undefined){
      alert("NO HAY NINGUNA CATEGORIA SELECCIONADA, FAVOR DE VERIFICAR");
      $scope.btnCarrito=true;
    }else{ 
      if($scope.tax_id==""||$scope.tax_id==undefined){
        alert("NO HAY NINGUN IMpUESTO (IVA) SELECCIONADO, FAVOR DE VERIFICAR");
        $scope.btnCarrito=true;
      }else{
        $scope.compra_venta.insumos.push({
                id_insumo:$scope.seleccionado.id,
                id_pack:$scope.seleccionado.id_pack,
                cantidad:$scope.cantidad,
                codigo_proovedor:$scope.seleccionado.codigo_proovedor,
                modelo:$scope.seleccionado.modelo,
                marca:$scope.seleccionado.marca,
                descripcion:$scope.descripcion,
                caracteristicas:$scope.seleccionado.caracteristicas,
                especificaciones:$scope.seleccionado.especificaciones,
                costos:$scope.precioCompra,
                precio:$scope.seleccionado.precio,
                unidad_venta:$scope.seleccionado.unidad_medida,
                unidad_compra:$scope.seleccionado.unidad_compra,
                costo_moneda:$scope.costo_moneda,
                tipo_cambio:$scope.seleccionado.tipo_cambio,
                tipo_equipo:$scope.seleccionado.tipo_equipo,
                bandera_insumo:$scope.seleccionado.bandera_insumo,
                total:$scope.seleccionado.total,                              
                m_product_id:$scope.m_product_id,
                tipo_archivo:$scope.compra_venta.tipo_archivo,
                m_product_category_id:$scope.categoria,
                tax_id:$scope.tax_id,
                group_name:$scope.compra_venta.group_name
        });
      }
    }
  }

  $scope.setTotals = function(item){                                                                      console.log(item);//console.log(item.tipo_archivo);     //OK //console.log(item.insumo_costos);//   //console.log(item.cantidad);
    var precio=0;
    var iva = 0.16;
    if(item){
      if(item.tipo_archivo=="v"){                                                                         //console.log("SET TOTALS VENTA"+item.tipo_cambio);
        precio=item.precio;
        $scope.cambio=item.tipo_cambio;                                                                   /*            if(item.descuento>0){              item.total = parseFloat(item.cantidad) * parseFloat(precio);              //item.total = (item.cantidad * item.precio);     console.log(item.total);//UPDATE 20160719              item.total = item.total - item.descuento;       console.log(item.total);//UPDATE 20160719            }else{            item.total = parseFloat(item.cantidad) * parseFloat(precio); //console.log(item.total);//UPDATE 20160719              //item.total = (item.cantidad * item.precio);     console.log(item.total);//UPDATE 20160719            }*/
      }else{                                                                                              //console.log("SET TOTALS COMPRA");//console.log(item.group_name);
        precio=item.costos;
        $scope.cambio=item.costo_moneda;                                                                  //console.info(item.group_name);
      }
      item.total = parseFloat(item.cantidad) * parseFloat(precio);                                        //console.log(item.total);//UPDATE 20160719
      $scope.subTotal += item.total;                                                                      //console.log($scope.subTotal);
      if(item.group_name=="EXTRANJEROS"){                                                                 console.info("es EXTRANJEROS");
        $scope.compra_venta.iva = 0;                                                                      console.log($scope.compra_venta.iva);
      }else{                                                                            
        $scope.compra_venta.iva = $scope.subTotal*0.16;                                                   //console.log($scope.compra_venta.iva);
      }                                                                                                   console.log($scope.subTotal);
      $scope.compra_venta.total = $scope.subTotal+$scope.compra_venta.iva;                                console.log($scope.compra_venta.total);
      $scope.letras=$scope.NumeroALetras($scope.compra_venta.total,$scope.cambio);
    }
  }

  $scope.convertir=function(unidad_compra, unidad_venta, cantidad_venta, cantidad_compra, cantidad_unidad_compra){
    var unidad="";
    var arr=[];                                                                                               //console.log(unidad_compra);
    if(unidad_compra==""){
      alert("VERIFICAR EN SISTEMA UNIDAD DE COMPRA DEL PRODUCTO");
      return 0;
    }else if(cantidad_unidad_compra==""){
      alert("VERIFICAR EN SISTEMA CANTIDAD MINIMA DE COMPRA DEL PRODUCTO");
      return 0;
    }else{                                                                                                    //console.log(unidad_venta);
      if(unidad_compra!=unidad_venta){
        unidad=((cantidad_venta*cantidad_compra)/cantidad_unidad_compra);                                     //console.log(unidad);
        if(unidad % 1 ==0){                                                                                   // console.log("es entro");      //unidad=Math.ceil(unidad);
          return unidad;                                                                                      //console.log(unidad);
        }else{                                                                                                //console.log("es decimal");
          unidad=Math.ceil(unidad);                                                                           //unidad=Math.ceil(unidad);
          return unidad;                                                                                      //console.log(unidad);
        }
      }else{                                                                                                  //console.log("LAS UNIDADES SON IGUALES");
        unidad=cantidad_venta;
        return unidad;
      }
    }
  }

  $scope.convertirCosto=function(unidad_compra, unidad_venta, cantidad_venta, cantidad_compra, cantidad_unidad_compra,costo){
    var unidad="";
    var precio_compra_unidad="";
    var arr=[];                                                                                           //console.log(costo);
    if(unidad_compra==""){
      alert("VERIFICAR EN SISTEMA UNIDAD DE COMPRA DEL PRODUCTO");
      return 0;
    }else if(cantidad_unidad_compra==""){
      alert("VERIFICAR EN SISTEMA CANTIDAD MINIMA DE COMPRA DEL PRODUCTO");
      return 0;
    }else{                                                                                                //console.log(unidad_venta);
      if(unidad_compra!=unidad_venta){
        precio_compra_unidad=(costo/cantidad_unidad_compra);                                              //console.log(precio_compra_unidad);
        return precio_compra_unidad;
      }else{                                                                                              //console.log("LAS UNIDADES SON IGUALES");
        return precio_compra_unidad=costo;
      }
    }
  }

  $scope.buscarTipoCambioActual = function(){
    var dat= new Date();                                                                                  //console.log(dat);
    var c_fecha = moment(dat).format('YYYY-MM-DD');
    conversionSrc.get({vi:0,validto:c_fecha},function(data){                                              //console.log(data);
      if(data.conversiones.length==0){                                                                    //console.log("¡¡ NO HAY TIPO DE CAMBIO DE LA FECHA: "+c_fecha+" \n FAVOR DE VERIFICAR EN SISTEMA !!");        //alert("¡¡ NO HAY TIPO DE CAMBIO DE LA FECHA: "+c_fecha+" \n FAVOR DE VERIFICAR EN SISTEMA !!");
        $scope.compra_venta.tipo_cambio=0.00;
      }else{
        $scope.compra_venta.tipo_cambio=data.conversiones[0].dividerate;
      }
    },function(err){alert('ERROR EN SERVIDOR.');});
  }

  $scope.validaProductos=function(){
    if($scope.compra_venta.insumos.length>0){
      $scope.esc_p4=false;
    }else{
      $scope.esc_p4=true;
      alert("NO HA SELECCIONADO NINGUN PRODUCTO, FAVOR DE VERIFICAR");
    }
  }

  $scope.tercerosLst=function(nombre,org_name,cliente,provedor){                                          //console.log(nombre);    //console.log(v);                              
    if(nombre.length>0){
      tercerosSrc.get({nombre_fiscal:"*"+nombre+"*",org_name:org_name,iscustomer:cliente,is_vendor:provedor},function(data){
        $scope.proovedores=data.terceros;
      },function(err){
        alert('ERROR EN SERVIDOR.');
      });
    }
  }

  $scope.direccionesLst=function(id,t){
    if(confirm("¿Desea confirmar datos?")){
      $scope.nombre_proovedores=true;                                                                     //OK
      direccionesSrc.get({id_tercero:id,isbillto:"Y"},function(data){                                   console.log(data);//       console.log(data.msg);//       console.log(t);
        if(t=="p"){                                                                                     //console.log("P")
          $scope.compra_venta.direccion_tercero=data.direcciones[0].address1;
          $scope.compra_venta.ciudad_tercero=data.direcciones[0].city;
          $scope.compra_venta.estado_tercero=data.direcciones[0].region_name;
          $scope.compra_venta.pais_tercero=data.direcciones[0].country_name;
          $scope.compra_venta.cp_tercero=data.direcciones[0].cp;
          $scope.compra_venta.colonia_tercero=data.direcciones[0].address2;
          $scope.compra_venta.c_bpartner_location_prov=data.direcciones[0].c_bpartner_location_id;
        }else{                                                                                          //console.log("ELSE")
          $scope.compra_venta.direccion_fiscal=data.direcciones[0].address1;
          $scope.compra_venta.colonia_fiscal=data.direcciones[0].address2;
          $scope.compra_venta.codigo_postal_fiscal=data.direcciones[0].cp;
          $scope.compra_venta.ciudad_fiscal=data.direcciones[0].city;
          $scope.compra_venta.estado_fiscal=data.direcciones[0].region_name;
          $scope.compra_venta.pais_fiscal=data.direcciones[0].country_name;
          $scope.compra_venta.ad_org_id=data.direcciones[0].ad_org_id;
          $scope.compra_venta.c_bpartner_location=data.direcciones[0].c_bpartner_location_id;
          $scope.compra_venta.c_location_id=data.direcciones[0].c_location_id;                          //$scope.compra_venta.address1=data.direcciones[0].address1;
        }
      },function(err){alert('ERROR EN SERVIDOR.');});
    }else{
      alert("¡ Accion Cancelada !");
    }
  }

  $scope.fechaEntrega = function(producto){                                                             //console.warn(producto.bandera_insumo);
    if(producto.bandera_insumo.trim() != "C" ){
      marcaProveedorSrc.get({marca_representada:"*"+producto.marca+"*"},function(data){
        $scope.dia = data.marcas_proveedores.data[0];
        if($scope.dia != undefined || $scope.dia != null || $scope.dia != ""){
          $scope.diaMaximo = data.marcas_proveedores.data[0].dias_entrega_maximo;                       //console.log($scope.diaMaximo);
          if($scope.diaMaximo>$scope.mayor){
            $scope.mayor=$scope.diaMaximo;
            $scope.compra_venta.fecha_entrega = $scope.sumaFecha($scope.mayor,5);                       //console.log($scope.compra_venta.fecha_entrega);//alert("Fecha de entrega sugerida: "+$scope.fecha_entrega+"");
            $scope.fecha_entrega=$scope.compra_venta.fecha_entrega;
            $scope.ola=$scope.fecha_entrega;
          }else{                                                                                        //console.log("es menor");
          }
        }else{                                                                                          //console.log("VERIFICAR RESULTADO DE CONSULTA");
        }
      });
    }else{                                                                                              // $scope.compra_venta.fecha_entrega = $scope.sumaFecha(0,5); console.log($scope.compra_venta.fecha_entrega);
                                                                                                      console.log("CONSUMIBLES NO TIENE VALIDACION DE FECHA DE ENTREGA");
    }
  }

  $scope.sumaFecha = function(d,n){
    var Fecha = new Date();
    var sFecha = fecha || (Fecha.getDate() + "-" + (Fecha.getMonth() +1) + "-" + Fecha.getFullYear());
    var sep = sFecha.indexOf('/') != -1 ? '/' : '-';
    var aFecha = sFecha.split(sep);
    var fecha = aFecha[2]+'-'+aFecha[1]+'-'+aFecha[0];
    fecha= new Date();
    fecha.setDate(fecha.getDate()+(parseInt(d)+n));
    var anno=fecha.getFullYear();
    var mes= fecha.getMonth()+1;
    var dia= fecha.getDate();                                                                           //var meses = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
    mes = (mes < 10) ? ("0" + mes) : mes;
    dia = (dia < 10) ? ("0" + dia) : dia;
    var fechaFinal = dia+sep+[mes]+sep+anno;
    return (fechaFinal);
  }

  $scope.agenteSeleccionado=function(nombre){                                                           //  console.log(nombre);
    agenteAduanalSrc.get({agente_aduanal:nombre},function(data){                                        //console.log(data);  //$scope.agentes=data.agentes;
      $scope.compra_venta.nombre_agente_aduanal=data.agentes[0].agente_aduanal;
      $scope.compra_venta.direccion_agente=data.agentes[0].ubicacion;
      $scope.compra_venta.direccion_agente=data.agentes[0].ubicacion;
      $scope.compra_venta.telefono_agente=data.agentes[0].telefono;
      $scope.compra_venta.fax_agente=data.agentes[0].fax;
      $scope.compra_venta.correo_agente=data.agentes[0].email;
    },function(err){alert('ERROR EN SERVIDOR.');});
  } 

  $scope.guardar=function(version){                                                                     //console.log($scope.compra_venta); //console.log($scope.m_product_id);
    if(confirm("¿Desea guardar los datos?")){
      $scope.msjGuardar=true;
      if(version=='Y'){
        $scope.compra_venta.version=parseInt($scope.compra_venta.version)+1;
      }
      compraSrc.save($scope.compra_venta,function(data){                                                //console.log(data);
        if(data.msg=="Success"){
          $scope.msjGuardar=false;
          $scope.save=true;
          $scope.msj="SE HA GUARDADO EXITOSAMENTE";                                                     //$scope.redirectCompras();
        }
      },function(e){                                                                                    //console.log(e.data);       // $scope.validacion(e.data);
        if(e.status=='422'){
          var msg='';
          angular.forEach(e.data,function(value, key){
            msg=msg+','+value;
          });
          alert(msg);
        }else{
          alert('Error: '+e.status+' '+e.data);
        }
      });
    }
  }

  $scope.actualizar=function(){                                                                       //console.log($scope.compra_venta);
    if(confirm("¿Desea actualizar los datos?")){
      $scope.msjActualizar=true;
      compraSrc.update($scope.compra_venta,function(data){                                            //console.log(data);
        if(data.msg=="Success"){
          $scope.save=true;
          $scope.msjActualizar=false;
          $scope.msge="SE HA ACTUALIZADO EXITOSAMENTE";                                               //$scope.redirectCompras();
        }
      },function(e){alert('Error: '+e.status+' : '+ e.data);});
    }
  }

  $scope.guardarVenta=function(){                                                                     //console.log($scope.compra_venta); //console.log($scope.m_product_id);
    if(confirm("¿Desea guardar los datos?")){
      $scope.msjGuardar=true;
      ventaSrc.save($scope.compra_venta,function(data){                                               //console.log(data);
        if(data.msg=="Success"){
          $scope.msjGuardar=false;
          $scope.save=true;
          $scope.msg="SE HA GUARDADO EXITOSAMENTE";                                                   //  $scope.redirectVentas();
        }
      },function(e){                                                                                  //console.log(e.data.condicion_facturacion.length);//if(e.data.length)        //$scope.validacion(e.data);
        alert('Error: '+e.status);
      });
    }
  }

  $scope.actualizarVenta=function(){                                                                  //console.log($scope.compra_venta);
    if(confirm("¿Desea actualizar los datos?")){
      $scope.msjActualizar=true;
      ventaSrc.update($scope.compra_venta,function(data){                                             //console.log(data);
        if(data.msg=="Success"){
          $scope.save=true;
          $scope.msjActualizar=false;
          $scope.msge="SE HA ACTUALIZADO EXITOSAMENTE";                                               //$scope.redirectVentas();
        }
      },function(e){alert('Error: '+e.status+' : '+ e.data);});
    }
  }

//////////////////////////////////////////////////////////////////////////////
  $scope.validaFecha =function (fecha){                                                                 //console.log(fecha);
    if(fecha == undefined || fecha ==''){                                                               //  alert("NO HA INGRESADO UNA FECHA, !! FAVOR DE VERIFICAR¡¡")
    }else{                                                                                              //$scope.compra_venta.fecha_entrega = $('#fecha_entrega').val();      //$scope.compra_venta.fecha_embarque = $('#fecha_embarque').val();
      var dtCh= "-";
      var minYear=1900;
      var maxYear=2100;
      function isInteger(s){
        var i;
        for (i = 0; i < s.length; i++){
          var c = s.charAt(i);
          if (((c < "0") || (c > "9"))) return false;
        }
        return true;
      }

      $scope.stripCharsInBag =function (s, bag){
        var i;
        var returnString = "";
        for (i = 0; i < s.length; i++){
          var c = s.charAt(i);
          if (bag.indexOf(c) == -1) returnString += c;
        }
        return returnString;
      }

      $scope.daysInFebruary=function  (year){
        return (((year % 4 == 0) && ( (!(year % 100 == 0)) || (year % 400 == 0))) ? 29 : 28 );
      }

      $scope.DaysArray=function (n) {
        for (var i = 1; i <= n; i++) {
            this[i] = 31
            if (i==4 || i==6 || i==9 || i==11) {this[i] = 30}
            if (i==2) {this[i] = 29}
        }
        return this
      }

      $scope.isDate=function (dtStr){
        var daysInMonth = $scope.DaysArray(12)
        var pos1=dtStr.indexOf(dtCh)
        var pos2=dtStr.indexOf(dtCh,pos1+1)
        var strDay=dtStr.substring(0,pos1)
        var strMonth=dtStr.substring(pos1+1,pos2)
        var strYear=dtStr.substring(pos2+1)
        var strYr=strYear
        if (strDay.charAt(0)=="0" && strDay.length>1) strDay=strDay.substring(1)
        if (strMonth.charAt(0)=="0" && strMonth.length>1) strMonth=strMonth.substring(1)
        for (var i = 1; i <= 3; i++) {
            if (strYr.charAt(0)=="0" && strYr.length>1) strYr=strYr.substring(1)
        }
        var month=parseInt(strMonth)
        var day=parseInt(strDay)
        var year=parseInt(strYr)
        if (pos1==-1 || pos2==-1){
            return false
        }
        if (strMonth.length<1 || month<1 || month>12){
            return false
        }
        if (strDay.length<1 || day<1 || day>31 || (month==2 && day>$scope.daysInFebruary(year)) || day > daysInMonth[month]){
            return false
        }
        if (strYear.length != 4 || year==0 || year<minYear || year>maxYear){
            return false
        }
        if (dtStr.indexOf(dtCh,pos2+1)!=-1 || isInteger($scope.stripCharsInBag(dtStr, dtCh))==false){
            return false
        }
        return true
      }                                                                                   //FIN ISDATE
      if($scope.isDate(fecha)){
        return true;
      }else{                                                                              //return false;
        alert("EL DATO INGRESADO NO ES UNA FECHA VALIDA, ¡¡FAVOR DE VERIFICAR!!");
      }
    }                                                                                     //FIN ELSE
  }//FIN VALIDA FECHA

  $scope.set_send_to=function(send){
    if(send=="C"){
      $scope.compra_venta.nombre_agente_aduanal=$scope.compra_venta.nombre_fiscal;
      $scope.compra_venta.direccion_agente=$scope.compra_venta.direccion_fiscal+" "+$scope.compra_venta.colonia_fiscal+" "+$scope.compra_venta.codigo_postal_fiscal+" "+$scope.compra_venta.ciudad_fiscal+" "+$scope.compra_venta.estado_fiscal+" "+$scope.compra_venta.pais_fiscal;
    }
  }
//////////////////////////////////////////////////////////////////////////////
})
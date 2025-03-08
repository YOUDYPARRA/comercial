'use strict';
angular.module('cotizacionApp')
.controller('CotizacionCtrl',function ($scope,$controller,$filter,$timeout,insumosSrc,cotizacionPaqueteInsumoSrc,cotizacionSrc,componenteSrc,insumoOpcionalSrc,$log,insumoOpcionalConsultarSrc,marcaProveedorSrc,paqueteSrc,conversionSrc,tercerosSrc,ultimoSrc,direccionesSrc,contactosSrc,condicionCotizacionSrc,condicionFacturaSrc,metodoEnvioSrc,condicionPagoTiempoSrc,metodoPagoSrc,orgVsrc,userSrc){

angular.extend(this,$controller('NumeroAletraCtrl',{$scope:$scope}));
//angular.extend(this,$controller('EnsableCtrl',{$scope:$scope}));
$scope.coti="CotizacionCtrl.js COTIZACION";
  //$scope.goCats = true;
  $scope.id_envio = true;
  $scope.id_factura = true;
  $scope.id_pago = true;
  $scope.id_tiempo = true;
  $scope.nacionales="NACIONALES";
  $scope.empleados="EMPLEADOS";
  $scope.mayor=0;
  $scope.cotizacion={
  'id':'',
  'fecha':'',
  'representante_legal':'',
  'centro_costo':'',
  'lugar_centro_costo':'',
  'no_contrato':'',
  'no_pedido':'',
  'no_orden_servicio':'',
  'estatus':'',
  'auto':'',
  'nombre_empleado':'',
  'usuario':'',
  'numero_cotizacion':'',
  'departamento':'',
  'area':'',
  'org_name':'',
  'org_id':'',
  'version':'',
  'tipo_cliente':'',
  'fecha_entrega':'',
  'fecha_factura':'',
  'nombre_fiscal':'',
  'iniciales_asignado':'',
  'calle_fiscal':'',
  'tipo_cliente':'',
  'rfc':'',
  'tipo_moneda':'',
  'colonia_fiscal':'',
  'codigo_postal_fiscal':'',
  'ciudad_fiscal':'',
  'estado_fiscal':'',
  'pais_fiscal':'',
  'nombre_cliente':'',
  'telefono':'',
  'celular':'',
  'c_location_id':'',
  'c_bpartner_id':'',
  'ad_user_id':'',
  'contacto':'',
  'correo':'',
  'mensaje_atencion':'',
  'nota':'',
  'precio':'',
  'tiempo_entrega':'',
  'garantia':'',
  'validez':'',
  'condicion_pago':'',
  'reporte':'',
  'anticipo':'',
  'guia_mecanica_salvaguarda_instalacion':'',
  'capacitacion':'',
  'id_condicion_factura':'',
  'id_metodo_envio':'',
  'id_condicion_pago_tiempo':'',
}

$scope.busquedaC=
    { 
    'vista':1,
    'tipo_equipo':'',
    'codigo_proovedor':'',
    'modelo':'',
    'descripcion':'',
    'marca':'',
    'categoria1':''
    }

$scope.preciosMultiples=[];
$scope.insumos=[];
var i=0;
$scope.subTotal=0;
$scope.ivaT=0;
$scope.totales=0;
$scope.progress=false;

$scope.condicion_cotizacion=  
  {
    'precio':"",
    'tiempo_entrega':"",
    'condicion_pago':"",
    'guia_mecanica_salvaguarda_instalacion':"",
    'garantia':"",
    'capacitacion':"",
    'validez':"",   
    'anticipo':"",
    'mensaje_atencion':""
  };

  $scope.s_condicion_cotizacion={'capacitacion':'','validez':'','anticipo':''}

  $scope.busquedaP=
    { 
    'vista':'1',
    'tipo_equipo':'',
    'codigo_proovedor':'',
    'modelo':'',
    'descripcion':'',
    'marca':'',
    'bandera_insumo':'*'
    }

    $scope.direccion={
      'name':'',
      'address1':'',
      //'isbillto':'Y',
      //'isshipto':'Y',
    }
    $scope.precioPaquete=[];

$timeout(function(){ 
    $scope.ver_post=false;
  $scope.ver_org=true;
  $scope.ver_monedaphp=true;
  $scope.ver_monedajs=false;
console.log($scope.index);
if($scope.index==0){
  console.log($scope.index);
}else{
    $scope.tipo_fact=false;
if($scope.id==undefined){           console.log("CREATE");
  //$scope.ver_gerente=false;
  $scope.cargarFuncionesIniciales();
  var dat= new Date();            
  //$scope.cotizacion.fecha = moment(dat).format('DD-MM-YYYY');   
  $scope.cotizacion.fecha = moment(dat).format('YYYY-MM-DD');   
  $scope.cotizacion.fecha_factura = '00-00-0000';             //$scope.cotizacion.fecha_entrega = moment(dat).format('DD-MM-YYYY');   
  $scope.cotizacion.fecha_entrega = '00-00-0000';   
  $scope.cotizacion.estatus="GUARDADO";
  $scope.cotizacion.id=$scope.id;                                                                       //console.log($scope.nombre_empledo);//OK
  $scope.cotizacion.nombre_empleado=$scope.nombre_empledo;                                       
  $scope.cotizacion.centro_costo=$scope.tipo_centro_costo;                                              //console.log($scope.tipo_centro_costo);
  $scope.cotizacion.usuario=$scope.nombre_empledo;              //$scope.cotizacion.numero_cotizacion=$scope.iniciales_autor+"-"+$scope.centro_costo+"-"+$scope.cotizacion_fecha;
  $scope.cotizacion.departamento=$scope.departamento;                                                   //console.log($scope.area);
  $scope.cotizacion.area=$scope.area;                                                                  // console.log($scope.org);

  $scope.habilitarBotonCarrito=true;
    if($scope.reporte!=undefined){
      $scope.reporte = JSON.parse($scope.reporte);      console.warn($scope.reporte);
      $scope.getReporte();
      //console.log($scope.reporte);
    }
  }else{                              console.log("UPDATE");//console.log($scope.id);
  $scope.tipo_fact=true;
  $scope.cargarFuncionesIniciales();
  $scope.condiciones_api();
  $scope.getCotizacion($scope.id);
  $scope.ver_precios_servicio=true;
  if($scope.iniciales_autor=="ECM" || $scope.email=='asistente_direccion@smh.com.mx' || $scope.email=='mary.castro@smh.com.mx' || $scope.iniciales_autor=="LOM" ){
    $scope.ver_gerente=true;
  }
  $scope.goCats=false;
}
  }           //ELSE
}, 1000);

  $scope.bloquear=function(oo){ //alert("ENTRO");
  if(oo=='actualizar'){
    $scope.ver_put=true;
    $scope.ver_post=false;
  }else{                  //VERSION
   $scope.ver_put=false;
    $scope.ver_post=true;
  }
}

$scope.tipo_organizacion=function(org){               console.log(org);
  //$scope.equipo.categoria1=org;                       console.log($scope.equipo.categoria1);
  orgVsrc.get({name:org},function(data){              //console.log(data.objetos.ad_org_id);
    $scope.cotizacion.org_id=data.objetos[0].ad_org_id;
    $scope.cotizacion.org_name=data.objetos[0].name;
    $scope.busquedaC.categoria1=data.objetos[0].name;
 
if(($scope.area==="COMERCIAL" && $scope.cotizacion.org_name==="SMH")){                            console.warn("SMH Y COMERCIAL");
              $scope.ver_busqueda=true;                                                           console.log($scope.email);
              $scope.ver_paquete=false;
              $scope.ver_equipos=false;
              $scope.condiciones_consumibles($scope.email);
              $scope.ver_condiciones_consumibles();
              $scope.ver_precios_servicio=true;
              $scope.editar_precios_servicio=false;
            }//console.log($scope.area);
            else if(($scope.tipo_usuario != "ADMINISTRADOR" && $scope.cotizacion.org_name==="SMH") ){ console.log("SERVICIO"); 
              /*$scope.ver_paquete=true;
              $scope.ver_busqueda=true;
              $scope.ver_equipos=true;*/
              $scope.ver_condiciones_servicio();
              /*$scope.editar_precios_servicio=true;
              $scope.ver_precios_servicio=true;*/
              if($scope.iniciales_autor=="ECM" || $scope.iniciales_autor=="LOM"){                 console.warn("ECM || LOM");
                  $scope.ver_busqueda=true;
                  $scope.ver_precios_servicio=true;
                  $scope.editar_precios_servicio=false;
                }else if($scope.iniciales_autor!="ECM" && $scope.cotizacion.org_name==="SMH" || $scope.iniciales_autor!="LOM" && $scope.cotizacion.org_name==="SMH"){
                  $scope.ver_busqueda=true;
                  $scope.editar_precios_servicio=true;          console.warn("ST Y SMH y != ECM || LOM");
                  $scope.ver_precios_servicio=false;
                  $scope.ver_condiciones_servicio();
                }
                if($scope.email=='asistente_direccion@smh.com.mx' || $scope.email=='mary.castro@smh.com.mx'){
                  $scope.ver_busqueda=true;
                  $scope.editar_precios_servicio=false;          console.warn("asistente_direccion");
                  $scope.ver_precios_servicio=true;
                  $scope.ver_condiciones_servicio();
                  console.log($scope.email);
                }
             }else if($scope.cotizacion.org_name=="IMS" && $scope.area=="COMERCIAL"){             console.warn("IMS Y COMERCIAL");
              $scope.ver_paquete=true;
              $scope.ver_busqueda=true;
              $scope.condiciones_ims();
              $scope.ver_condiciones_ims();
              $scope.editar_precios_servicio=false;
              $scope.ver_precios_servicio=true;
             }else if($scope.cotizacion.org_name=="IMS" && $scope.tipo_usuario=="ADMINISTRADOR"){ console.warn("IMS Y ADMOR");
              $scope.ver_paquete=true;
              $scope.ver_busqueda=true;
              $scope.ver_equipos=true;
              $scope.condiciones_ims();
              $scope.ver_condiciones_ims();
              $scope.ver_precios_servicio=true;
              $scope.editar_precios_servicio=false;
             }else if($scope.cotizacion.org_name=="SMH" && $scope.tipo_usuario=="ADMINISTRADOR"){ console.warn("SMH Y ADMOR");
              $scope.ver_busqueda=true;
              $scope.ver_paquete=true;
              $scope.ver_equipos=true;
              $scope.condiciones_consumibles($scope.email);
              $scope.ver_condiciones_consumibles();
              $scope.ver_precios_servicio=true;
              $scope.editar_precios_servicio=false;
             }
             });
}

$scope.cargarFuncionesIniciales=function(){
  $scope.getOrganizaciones();
  //$scope.condicion_tiempo_pago();
  $scope.metodoEnvio();
  //$scope.condicion_factura();
  //$scope.metodo_pago();
  //if($scope.area=="SERVICIO TECNICO"){
  $scope.cotizacion.version=1;
  $scope.getUsuarios();
}

$scope.getUsuarios=function(){
  userSrc.get({vista:1,name:"*",puesto:'*VENTAS*'},function(data){ 
    $scope.usuarios=data.users;
    console.log(data);
          },function(err){alert('ERROR EN SERVIDOR.');});
}

$scope.selectIniciales=function(iniciales){
$scope.cotizacion.iniciales_asignado=iniciales;
}

$scope.ver_condiciones_consumibles=function(){
              $scope.condicion_reporte=false;
              $scope.condicion_anticipo=false;
              $scope.condicion_precio=false;
              $scope.condicion_tiempo_entrega=true;
              $scope.condicion_pago=true;
              $scope.condicion_guia_mecanica=false;
              $scope.condicion_garantia=false;
              $scope.condicion_capacitacion=false;
              $scope.condicion_vigencia=true;
}

$scope.ver_condiciones_ims=function(){
              $scope.ver_precios_servicio=false;
              $scope.condicion_reporte=false;
              $scope.condicion_anticipo=false;
              $scope.condicion_precio=true;
              $scope.condicion_tiempo_entrega=true;
              $scope.condicion_pago=true;
              $scope.condicion_guia_mecanica=false;
              $scope.condicion_garantia=true;
              $scope.condicion_capacitacion=false;
              $scope.condicion_vigencia=true;
}

$scope.ver_condiciones_servicio=function(){
              $scope.condicion_reporte=false;
              $scope.condicion_anticipo=false;
              $scope.condicion_precio=false;
              $scope.condicion_tiempo_entrega=true;
              $scope.condicion_pago=true;
              $scope.condicion_guia_mecanica=false;
              $scope.condicion_garantia=false;
              $scope.condicion_capacitacion=false;
              $scope.condicion_vigencia=true;
}

$scope.moneda=function(moneda){
          $scope.cotizacion.tipo_moneda=moneda;console.log($scope.cotizacion.tipo_moneda);
          $scope.habilitarBoton=false;
          $scope.moneda_destino=moneda;
          //$rootScope.habilitarPrecio=false;
        }

$scope.getGerente=function(usuario){console.info(usuario);
  $scope.cotizacion.usuario=usuario;
}

$scope.buscarVersion=function(idc){ console.log(idc); 
          cotizacionSrc.get({vi:0,id:idc},function(data){
            $scope.cotizacion.version=data.version;console.log(data.version);
            console.log(data.version);
            //$scope.cotizacion.estatus="GUARDADO";
          },function(err){alert('ERROR EN SERVIDOR.');});
  }

  $scope.selectFecha=function(){
    $scope.cotizacion.fecha = $('#fecha').val();
    $scope.cotizacion.fecha_entrega = $('#fecha_entrega').val();
    $scope.cotizacion.fecha_factura = $('#fecha_factura').val();
    console.log($scope.cotizacion.fecha);
  }

$scope.ultimoLst =function(){ $scope.progress=true;
  ultimoSrc.get(function(data){var dat= new Date();            
  $scope.cotizacion_fecha = moment(dat).format('YYYYMMDD');   
  $scope.cotizacion.lugar_centro_costo=$scope.centro_costo;                                         console.log($scope.centro_costo);
    if(data.ultimo.length == 0){    
      $scope.cotizacion.auto=1;  
      $scope.numero_cotizacion=$scope.iniciales_autor+"-"+$scope.cotizacion.lugar_centro_costo+"-"+$scope.cotizacion_fecha+"-"+$scope.cotizacion.auto;
      $scope.cotizacion.numero_cotizacion=$scope.iniciales_autor+"-"+$scope.cotizacion.lugar_centro_costo+"-"+$scope.cotizacion_fecha;
    }else{            
          $scope.cotizacion.auto=parseInt(data.ultimo[0].auto)+1;              
          $scope.numero_cotizacion=$scope.iniciales_autor+"-"+$scope.cotizacion.lugar_centro_costo+"-"+$scope.cotizacion_fecha+"-"+$scope.cotizacion.auto;    //console.log($scope.ultimo);
          $scope.cotizacion.numero_cotizacion=$scope.iniciales_autor+"-"+$scope.cotizacion.lugar_centro_costo+"-"+$scope.cotizacion_fecha;    //console.log($scope.ultimo);
          }
          if(data.msg=="Success"){
            $scope.progress=false;
          }
        },function(err){alert('ERROR EN SERVIDOR.');});
      }

$scope.limpiar= function(){
        $scope.cotizacion.nombre_fiscal="";
        $scope.rfc_fiscal="";
        $scope.dFiscal=""; 
        $scope.nFiscal=""; 
        $scope.calle="";
        $scope.phone="";   
        $scope.phone2="";  
        $scope.contacto="";
        $scope.email="";   
        $scope.representante_legal=""; 
        $scope.fiscales=[];
        $scope.dFiscales=[];
        $scope.nFiscales=[];
        $scope.calles=[];
        $scope.contactos=[];
      }

      $scope.delFecha_entrega= function(){$scope.cotizacion.fecha_entrega="";          }
      $scope.delFecha_factura= function(){$scope.cotizacion.fecha_factura="";          }
      $scope.delFiscal= function(){$scope.nombre_fiscal="";          }
      $scope.delRFCFiscal= function(){$scope.rfc_fiscal="";      }
      $scope.deldFiscal= function(){$scope.dFiscal="";      }
      $scope.delNFiscal= function(){$scope.nFiscal="";      }
      $scope.delCalle= function(){$scope.calle="";      }
      $scope.delPhone= function(){$scope.phone="";      }
      $scope.delPhone2= function(){$scope.phone2="";      }
      $scope.delContacto= function(){$scope.contacto="";      }
      $scope.delEmail= function(){$scope.email="";      }
      $scope.delRepresentante= function(){$scope.representante_legal="";      }

$scope.tercerosLst =function(nacionales)      {//console.log(nacionales); //  console.log($scope.cotizacion.org_name);
        if($scope.cotizacion.org_name==undefined||$scope.cotizacion.org_name==''){alert("¡¡ FAVOR DE SELECCIONAR LA ORGANIZACION !!");}else{
          tercerosSrc.get({nombre_fiscal:"*"+$scope.cotizacion.nombre_fiscal+"*",group_name:nacionales,org_name:$scope.cotizacion.org_name},function(data){
            $scope.fiscales=data['terceros'];                // console.log(data['terceros']);
          },function(err){alert('ERROR EN SERVIDOR.');});
        }
      }

$scope.busquedaDireccion=function(direccion){
  direccionesSrc.get(direccion,function(data){console.log(data);
       $scope.dFiscales=data.direcciones;
       //$scope.cambiaNombreFiscal();
         // $scope.dEnvio=data.direcciones;
        },function(err){alert('ERROR EN SERVIDOR.');});
}

$scope.cambiaNombreFiscal =function(id){console.log(id);
        tercerosSrc.get({c_bpartner_id:id},function(data){
          $scope.fiscal_elegido=data.terceros[0];                // console.log(data['terceros']);
        $scope.cotizacion.nombre_fiscal = $scope.fiscal_elegido.bpartner_name;
        $scope.cotizacion.org_id = $scope.fiscal_elegido.org_id;
        $scope.cotizacion.c_bpartner_id_fiscal= $scope.fiscal_elegido.c_bpartner_id; console.info($scope.fiscal_elegido.c_bpartner_id);
        $scope.cotizacion.rfc=$scope.fiscal_elegido.taxid;               //console.log(fiscal.taxid);       // 
        $scope.direccionesFactura($scope.fiscal_elegido.c_bpartner_id);
        $scope.direccionesEnvio($scope.fiscal_elegido.c_bpartner_id);
        $scope.getContactos($scope.fiscal_elegido.c_bpartner_id);
        },function(err){alert('ERROR EN SERVIDOR.');});
      }

$scope.direccionesFactura =function(id){ console.log("DIRECCION FACTURA");
        direccionesSrc.get({id_tercero:"*"+id+"*",isbillto:"Y"},function(data){
          $scope.dFiscales=data['direcciones']; //console.log($scope.dFiscales);
        },function(err){alert('ERROR EN SERVIDOR.');});
      }

$scope.cambiaDireccionFiscal=function(dFiscal){ console.log(dFiscal);
  direccionesSrc.get({c_location_id:"*"+dFiscal+"*",isbillto:"Y"},function(data){                             console.info(data);
          $scope.direccionesFiscales=data.direcciones[0];         //console.log($scope.dFiscales);
          $scope.cambiaNombreFiscal(data.direcciones[0].c_bpartner_id);
        $scope.dFiscal = $scope.direccionesFiscales.address1;                                                 console.log($scope.direccionesFiscales.c_bpartner_location_id);
        $scope.cotizacion.c_location_id_fiscal = $scope.direccionesFiscales.c_bpartner_location_id;           console.log($scope.direccionesFiscales.c_location_id);
        //$scope.cotizacion.c_location_id_fiscal = $scope.direccionesFiscales.c_location_id;
        $scope.cotizacion.calle_fiscal = $scope.direccionesFiscales.address1;
        $scope.cotizacion.colonia_fiscal = $scope.direccionesFiscales.address2;
        $scope.cotizacion.codigo_postal_fiscal = $scope.direccionesFiscales.cp;
        $scope.cotizacion.ciudad_fiscal = $scope.direccionesFiscales.city;
        $scope.cotizacion.pais_fiscal = $scope.direccionesFiscales.country_name;
        $scope.cotizacion.estado_fiscal = $scope.direccionesFiscales.region_name;

        },function(err){alert('ERROR EN SERVIDOR.');});
      }

 $scope.direccionesEnvio =function(id){ 
        direccionesSrc.get({id_tercero:"*"+id+"*",isshipto:"Y"},function(data){
        $scope.dEnvio=data['direcciones'];                     //console.log($scope.nFiscales);
        },function(err){alert('ERROR EN SERVIDOR.');});
      }

  $scope.cambiaSucursalEnvio=function(id){  
   direccionesSrc.get({c_location_id:"*"+id+"*",isshipto:"Y"},function(data){                                   console.log(data);   
        $scope.direcciones_envio=data.direcciones[0];  
        $scope.cotizacion.c_bpartner_id= $scope.direcciones_envio.c_bpartner_id;
        $scope.cotizacion.nombre_cliente = $scope.direcciones_envio.name;
        $scope.cotizacion.telefono = $scope.direcciones_envio.phone;
        $scope.cotizacion.celular = $scope.direcciones_envio.phone2;                    // console.log(address1);   
        console.info($scope.direcciones_envio.c_bpartner_location_id);
        $scope.cotizacion.id_metodo_envio = $scope.direcciones_envio.c_bpartner_location_id; 
        console.info($scope.direcciones_envio.c_location_id);
        //$scope.cotizacion.c_location_id = $scope.direcciones_envio.c_location_id; 
        $scope.cotizacion.calle_entrega = $scope.direcciones_envio.address1;
        $scope.cotizacion.colonia_entrega = $scope.direcciones_envio.address2;
        $scope.cotizacion.codigo_postal_entrega = $scope.direcciones_envio.cp;
        $scope.cotizacion.ciudad_entrega = $scope.direcciones_envio.city;
        $scope.cotizacion.pais_entrega = $scope.direcciones_envio.country_name;
        $scope.cotizacion.estado_entrega = $scope.direcciones_envio.region_name; //console.log($scope.estado_entrega);
        //$scope.cambiaDireccionesEnvio($scope.direcciones_envio.c_location_id);   //console.log($scope.c_location_id);
        },function(err){alert('ERROR EN SERVIDOR.');});
  }         

  $scope.getContactos=function(id){
    contactosSrc.get({id_tercero:"*"+id+"*"},function(data){                                     console.log(data);
           $scope.contactos=data['contactos'];     //   console.log($scope.contactos);
        });
  }

  $scope.cambiaContacto=function(id){
    contactosSrc.get({ad_user_id:"*"+id+"*"},function(data){                                     console.log(data);
           $scope.contacto_datos=data.contactos[0];                                              console.log($scope.contactos);
        $scope.cotizacion.ad_user_id = $scope.contacto_datos.ad_user_id;
        if($scope.contacto_datos.lastname==null||$scope.contacto_datos.lastname==undefined){var a='';}else{var a=$scope.contacto_datos.lastname;}
        $scope.cotizacion.contacto = $scope.contacto_datos.firstname+" "+a;
        $scope.cotizacion.correo= $scope.contacto_datos.email;
        });// console.log(contacto);
      }

/* -------------------------------------------- PRODUCTOS ------------------------------- */
$scope.buscarB =function(busquedaC){     $scope.progress=true;       
  insumosSrc.get(busquedaC,function(data){
    $scope.insumosB=data.insumos;       
    if(data.msg=="Success"){
      $scope.progress=false;
    }
  },function(err){alert('ERROR EN SERVIDOR.');});
}

$scope.equipos =function(seleccionado){                                                          console.log(seleccionado);console.log($scope.moneda_destino);
  if($scope.moneda_destino=="" || $scope.moneda_destino==undefined){alert("Se requiere seleccionar un tipo de moneda de venta")}else{//console.log($scope.moneda_destino);
    if(seleccionado.cantidad_unidad_compra=="" || seleccionado.cantidad_unidad_compra==undefined){alert("¡¡ FAVOR DE VERIFICAR EL PRODUCTO EN SU ATRIBUTO: unidades por cantidad de compra !!")}else{
      if(confirm("¿Desea agregar el producto seleccionado?")){
      $scope.habilitarBotonCarrito=false;
      $scope.cantidad=1;
      $scope.unidad_medida=seleccionado.unidad_medida;
      $scope.codigo_proovedor=seleccionado.codigo_proovedor;
      $scope.descripcion=seleccionado.descripcion;
      $scope.precioVenta=seleccionado.precio;
      $scope.costo_moneda=$scope.moneda_destino;                                                console.log(seleccionado.precios.length);
      $scope.fechaEntrega(seleccionado.bandera_insumo,seleccionado.marca);                      console.warn($scope.precioVenta);
      if(seleccionado.precios.length>0){
        var j=0;
        while(j<3){
          if(seleccionado.tipo_cambio == $scope.moneda_destino){                                console.log(seleccionado.tipo_cambio +"=="+ $scope.moneda_destino);
              $scope.preciosMultiples.push({etiqueta:seleccionado.precios[j].etiqueta,monto:seleccionado.precios[j].monto});
                                                                                                console.log($scope.preciosMultiples[j]);
              }else{                                                                            console.log("entro a conversion ");
                $scope.getPreciosConversion(seleccionado.precios[j].monto, seleccionado.tipo_cambio, $scope.moneda_destino, seleccionado.precios[j].etiqueta);
              }
          j++;
          }//    console.log(copia);
          $scope.seleccionado=seleccionado;
        }else{
              $scope.getPreciosConversion(seleccionado.precio, seleccionado.tipo_cambio, $scope.moneda_destino,"");
              $scope.seleccionado=seleccionado;
        }
      }else{alert("! ACCION CANCELADA ¡")}
    }
  }
}

$scope.editarPrecio=function(indice,seleccionado){console.log(seleccionado)
  if(confirm("¿Desea editar el precio del producto seleccionado?")){
    $scope.remover(indice,seleccionado.precio,seleccionado.cantidad);
    $scope.seleccionado=seleccionado;
    var str=seleccionado.descripcion;
    var n=str.search("NO. SERIE:");                                                             console.log(n); //N -1 CUANDO  NO LA ENCUENTRA
    if(n!='-1'){
      var l = str.length;                                                                       console.log(l);
      $scope.seleccionado.descripcion=str.substr(0,n-1);                                        console.log($scope.seleccionado.descripcion);
      $scope.serie=str.substr(n+10,l);                                                          console.log($scope.serie);
    }else{                                                                                      
      $scope.serie="";                                                                          console.log($scope.serie);
    }
    $scope.habilitarBotonCarrito=false;
    $scope.cantidad=seleccionado.cantidad;
    $scope.unidad_medida=seleccionado.unidad_venta;
    $scope.seleccionado.unidad_medida=seleccionado.unidad_venta;
    $scope.codigo_proovedor=seleccionado.codigo_proovedor;
    $scope.descripcion=seleccionado.descripcion;
    $scope.precioVenta=seleccionado.precio;
    $scope.costo_moneda=$scope.moneda_destino;
  }else{alert("! ACCION CANCELADA ¡")}
}

$scope.montoSeleccionado=function(monto){ console.log(monto);
  $scope.precioVenta=parseFloat(monto).toFixed(2);
}

$scope.agregarCarrito=function(){                                                                       console.log($scope.seleccionado);
    if($scope.serie!=undefined){
    if($scope.serie!=''){
      $scope.descripcion=$scope.descripcion+" NO. SERIE: "+$scope.serie;
    }else{                                                                                              console.log("NO SERIE ESTA VACIO");}
  }else{                            
        console.log("NO SERIE ESTA INDEFINIDO");
  }                                                                                                   
  var cadena=$scope.precioVenta.toString();     console.log(cadena);
  if(cadena.indexOf(',') != -1){
    cadena=cadena.replace(",","");                console.warn("index of");
    $scope.precioVenta=parseFloat(cadena);            console.warn(cadena);
    console.warn($scope.precioVenta);
  }
  console.warn($scope.precioVenta);
  $scope.insumos.push({
                id:$scope.seleccionado.id,             
                cantidad:$scope.cantidad,
                cantidad_unidad_compra:$scope.seleccionado.cantidad_unidad_compra,
                codigo_proovedor:$scope.seleccionado.codigo_proovedor,
                modelo:$scope.seleccionado.modelo,
                marca:$scope.seleccionado.marca,
                descripcion:$scope.descripcion,
                caracteristicas:$scope.seleccionado.caracteristicas,
                especificaciones:$scope.seleccionado.especificaciones,
                costos:$scope.seleccionado.costos,
                precio:$scope.precioVenta,
                unidad_compra:$scope.seleccionado.unidad_compra,
                unidad_venta:$scope.seleccionado.unidad_medida,
                costo_moneda:$scope.seleccionado.costo_moneda,
                tipo_cambio:$scope.seleccionado.tipo_cambio,
                tipo_equipo:$scope.seleccionado.tipo_equipo,
                bandera_insumo:$scope.seleccionado.bandera_insumo,
               // total:$scope.seleccionado.total,                        //cotizacion:$scope.coti// done:false,
            });
  $scope.vaciarBusqueda();
}

$scope.vaciarLista=function(){
if(confirm("¿Desea borrar la lista de productos?")){
  $scope.letras="";
  $scope.ivaT=0;
  $scope.totales=0;
  $scope.subTotal=0;
 $scope.cantidad=1;
$scope.unidad_medida="";
$scope.codigo_proovedor="";
$scope.precioVenta=0;
$scope.costo_moneda=""; 
$scope.preciosMultiples=[];
$scope.insumosB=[];
$scope.insumos=[];
}else{alert("ACCION CANCELADA");}
}

$scope.vaciarBusqueda=function(){
 $scope.cantidad=1;
$scope.unidad_medida="";
$scope.unidad_medida=undefined;
$scope.serie="";
$scope.codigo_proovedor="";
$scope.descripcion="";
$scope.precioVenta=0;
$scope.costo_moneda=""; 
$scope.preciosMultiples=[];
$scope.insumosB=[];
$scope.habilitarBotonCarrito=true;
$scope.serie=undefined;
}

$scope.setTotals = function(item){         console.log(item); 
console.log(item.precio);
console.log(parseFloat(item.precio));//   
console.log(item.cantidad); 
  //console.log($scope.j1);
  //console.log($scope.j);
           if (item){            //item.total = (item.cantidad * item.precio)-(item.cantidad * item.costo);
            item.total = (item.cantidad * item.precio); console.log(item.total);//UPDATE 20160719
            $scope.subTotal += item.total;                    console.log($scope.subTotal);
            $scope.ivaT  = $scope.subTotal*0.16;              console.log($scope.iva);
            $scope.totales = ($scope.subTotal+$scope.ivaT);             console.log($scope.totales);
            $scope.letras=$scope.NumeroALetras($scope.totales,$scope.moneda_destino);
       } 
  }

$scope.remover=function(j,precio,cantidad){    console.log(cantidad);
    if(confirm("¿ DESEA ELIMINAR EL INSUMO DE LA LISTA?"))      {
      var precio=precio*cantidad;
      $scope.subTotal=$scope.subTotal-precio;
      var ivad  = precio*0.16;  
      $scope.ivaT  =$scope.ivaT - ivad;                           console.log(ivad);      console.log(precio);
      var menosTotal=parseFloat(precio) + parseFloat(ivad);       console.log(menosTotal);
      $scope.totales=$scope.totales-menosTotal;
      $scope.letras=$scope.NumeroALetras($scope.totales,$scope.moneda_destino);
      $scope.insumos.splice(j,1);       }else{alert("¡ Accion Cancelada !");}
    }

 $scope.getPreciosConversion=function(precio,moneda_origen,moneda_destino,etiqueta){
//$scope.convertirP = function(i,precio,etiqueta,costo,tipo_cambio){      console.log(moneda_origen(precio);
 // console.log(precio);
 // console.log(moneda_origen);
 // console.log(moneda_destino);
 // console.log(etiqueta);
  $scope.preciosMultiples=[];
  //var precio=[];
if(moneda_destino=="USD"){
  if(moneda_origen=="JPY"){
             conversionSrc.get({currency_id_from:113,currency_id_to:130},function(data){  //JPY TO MXN
                  var fecha_cambio=data.conversiones[0].validto;                                                      console.log(data.conversiones[0].validto);
                //  alert("!! Se cotizara el tipo de cambio JPY a USD con fecha de actualización: "+fecha_cambio+ " ¡¡");
                  var multiplyrate=data.conversiones[0].multiplyrate;                                                 console.log(multiplyrate);
                  var precio1=precio*$scope.multiplyrate;                                                             console.log(precio1);
                      conversionSrc.get({currency_id_from:130,currency_id_to:100},function(data){ // MXN TO USD
                      var multiplyrate1=data.conversiones[1].multiplyrate;                                            console.log(multiplyrate1);
                      var pre=precio1*multiplyrate1; 
                    if(etiqueta!=""){                                                               
                      $scope.preciosMultiples.push({
                        etiqueta:etiqueta,
                        monto:pre
                      });}else{                                                                                       console.log("1 precio");
                      $scope.precioVenta=pre; console.log(pre);
                      }
                    });
                  });                                                                                     console.log("CONVERTIR JPY A USD");
  }
  if(moneda_origen=="EUR"){
                 conversionSrc.get({currency_id_from:102,currency_id_to:130},function(data){
                  var fecha_cambio=data.conversiones[0].validto;                                                      console.log(data.conversiones[0].validto);
                 // alert("!! Se cotizara el tipo de cambio EUR a USD con fecha de actualización: "+fecha_cambio+ " ¡¡");
                  var multiplyrate=data.conversiones[0].multiplyrate;                                                 console.log(multiplyrate);
                  var precio1=precio*$scope.multiplyrate;                                                             console.log(precio1);
                      conversionSrc.get({currency_id_from:130,currency_id_to:100},function(data){
                      var multiplyrate1=data.conversiones[1].multiplyrate;                                            console.log(multiplyrate1);
                      var pre=precio1*multiplyrate1;  
                      if(etiqueta!=""){                                                               
                      $scope.preciosMultiples.push({
                        etiqueta:etiqueta,
                        monto:pre
                      });}else{                                                                                       console.log("1 precio");
                      $scope.precioVenta=pre;                                                                         console.log(pre);
                      }
                    });
                  });                                                                                     console.log("CONVERTIR EUR A USD");
  }
  if(moneda_origen=="MXN"){$scope.progress=true;
                      conversionSrc.get({currency_id_from:130,currency_id_to:100},function(data){
                        var fecha_cambio=data.conversiones[0].validto;                                             console.log(data.conversiones[0].validto);
                       // alert("!! Se cotizara el tipo de cambio MXN a USD con fecha de actualización: "+fecha_cambio+ " ¡¡");
                      var multiplyrate1=data.conversiones[0].multiplyrate;                                         console.log(multiplyrate1);
                      var pre=precio*multiplyrate1;  
                      if(etiqueta!=""){                                                               
                        $scope.preciosMultiples.push({etiqueta:etiqueta,monto:pre});
                      }else{console.log("1 precio");
                      $scope.precioVenta=pre;                                                                     console.log(pre);
                      }   
                      if(data.msg=="Success"){
            $scope.progress=false;
          }                                                                                                       console.log(preciosMultiples);
                    });                                                                                  console.log("CONVERSION MXN A USD");
      }
  if(moneda_origen=="USD"){                                                                              console.log("NO ES NECESARIA LA CONVERSION A DOLARES");                                // console.log(precio); console.log(etiqueta); console.log(i); 
       if(etiqueta!=""){                                       
                                                                                                                  console.log("Multiples precios");                                                                                 
                      }else{                                                                                      console.log("1 precio");
                        $scope.precioVenta=precio;                                                                console.log(precio);
                      }
  }
}else
if(moneda_destino=="MXN"){
      if(moneda_origen=="JPY"){
        conversionSrc.get({currency_id_from:113,currency_id_to:130},function(data){
                        $scope.fecha_cambio=data.conversiones[0].validto;                                         console.log(data.conversiones[0].validto);
                  //alert("!! Se cotizara el tipo de cambio JPY a MXN con fecha de actualización: "+$scope.fecha_cambio+ " ¡¡");
                      var multiplyrate1=data.conversiones[0].multiplyrate;                                        console.log(multiplyrate1);
                       var pre=precio*$scope.multiplyrate1;                                                       console.log(precio);
                       if(etiqueta!=""){                                                               
                      $scope.preciosMultiples.push({
                        etiqueta:etiqueta,
                        monto:pre
                      });}else{                                                                                   console.log("1 precio");
                      $scope.precioVenta=pre;                                                                     console.log(pre);
                      }
                    });                                                                                           console.log("CONVERSION JPY A PESOS");
      }
      if(moneda_origen=="EUR"){
        conversionSrc.get({currency_id_from:102,currency_id_to:130},function(data){
                        var fecha_cambio=data.conversiones[0].validto;                                          console.log(data.conversiones[0].validto);
                //  alert("!! Se cotizara el tipo de cambio EUR a MXN con fecha de actualización: "+fecha_cambio+ " ¡¡");
                      var multiplyrate1=data.conversiones[0].multiplyrate;                                        console.log(multiplyrate1);
                      var pre=precio*multiplyrate1;                                                               console.log(pre);
                      if(etiqueta!=""){                                                               
                      $scope.preciosMultiples.push({
                        etiqueta:etiqueta,
                        monto:pre
                      });}else{console.log("1 precio");
                      $scope.precioVenta=pre; console.log(pre);
                      }
                    });        console.log("CONVERSION EUR A PESOS");
      }
      if(moneda_origen=="USD"){$scope.progress=true;                                                console.log("CONVERSION USD A PESOS");
        conversionSrc.get({currency_id_from:100,currency_id_to:130},function(data){                               console.log(data);console.log(precio);
                        var fecha_cambio=data.conversiones[0].validto;                                            console.log(data.conversiones[0].validto);//  
                     //   alert("!! Se cotizara el tipo de cambio USD a MXN con fecha de actualización: "+fecha_cambio+ " ¡¡");
                      var multiplyrate1=data.conversiones[0].multiplyrate;                                        console.log(multiplyrate1);
                      var pre=precio*multiplyrate1;                                                               console.log(pre);                                                
                      if(etiqueta!=""){                                                               
                      $scope.preciosMultiples.push({
                        etiqueta:etiqueta,
                        monto:pre
                      });}else{                                                                                   console.log("1 precio");
                      $scope.precioVenta=pre; console.log(pre);
                      }                                                                                           console.log($scope.preciosMultiples);
                      if(data.msg=="Success"){
            $scope.progress=false;
          }            
                    });                                                                                              //console.log("CONVERSION USD A PESOS");
      }
      if(moneda_origen=="MXN"){
                      if(etiqueta!=""){      console.log("Multiples precios");                                                         
                      }else{             console.log("1 precio");
                        $scope.precioVenta=precio; console.log(precio);
                      }                                                                                             console.log("CONVERSION A PESOS");
      }
  }  //fin de ELSE
    //return 
  }//fin function getPreciosMultiples
  /* --------------------------------------------------- CONDICIONES PAGO --------------------------------- */
$scope.condiciones_api=function(){
condicionPagoTiempoSrc.get({name:"*"},function(data){
  $scope.tiempos_pago=data.condiciones_pago_tiempo;                                                       //  console.log(data);
  });
condicionFacturaSrc.get({valor:"*"},function(data){
    $scope.condiciones_facturacion=data.condiciones_facturacion;                                          //console.log(data); ok
  });
metodoPagoSrc.get({fin_paymentmethod_id:"*"},function(data){
$scope.metodos_pagos=data.metodos_pago;
});
}

$scope.getOrganizaciones=function(){$scope.progress=true;
  orgVsrc.get({name:"*"},function(data){
    $scope.organizaciones=data.objetos;                                                                       //    console.log(data);
    if(data.msg=="Success"){
            $scope.progress=false;
          }
  });
}

$scope.metodoEnvio=function(){$scope.progress=true;
  metodoEnvioSrc.get({name:"*"},function(data){
    $scope.metodos_de_envio=data.metodos_envio;                                                             //    console.log(data);
    if(data.msg=="Success"){
            $scope.progress=false;
          }
  });
}


$scope.condicion_tiempo_pago=function(tipo){
  var i=0;
  $scope.time=[];
  condicionPagoTiempoSrc.get({name:"*"},function(data){
    $scope.tiempos_pago=data.condiciones_pago_tiempo;    
    console.info($scope.tiempos_pago.length);
    if($scope.tiempos_pago.length>0){
    console.info($scope.tiempos_pago.length+"2");
      while(i<$scope.tiempos_pago.length){
        if(tipo=="PUE"){
          if($scope.tiempos_pago[i].name=="000 INMEDIATO"){
            $scope.time.push({
                name:$scope.tiempos_pago[i].name,             
                c_paymentterm_id:$scope.tiempos_pago[i].c_paymentterm_id,
              });
          }
        }
        if(tipo=="PPD"){
          if($scope.tiempos_pago[i].name=="007 DIAS" || $scope.tiempos_pago[i].name=="014 DIAS" || $scope.tiempos_pago[i].name=="015 DIAS" || $scope.tiempos_pago[i].name=="021 DIAS" || $scope.tiempos_pago[i].name=="030 DIAS" || $scope.tiempos_pago[i].name=="045 DIAS" || $scope.tiempos_pago[i].name=="060 DIAS" || $scope.tiempos_pago[i].name=="090 DIAS" || $scope.tiempos_pago[i].name=="120 DIAS" || $scope.tiempos_pago[i].name=="150 DIAS" || $scope.tiempos_pago[i].name=="180 DIAS" || $scope.tiempos_pago[i].name=="CONTADO CONTRA ENTREGA" || $scope.tiempos_pago[i].name=="CREDIT LINE" || $scope.tiempos_pago[i].name=="WARRANTY" ){
            $scope.time.push({
                name:$scope.tiempos_pago[i].name,             
                c_paymentterm_id:$scope.tiempos_pago[i].c_paymentterm_id,
              });
          }
        }
        i++;
      }
    }                                                   //  console.log(data);
  
  });
}

$scope.condicion_tiempo_pago_seleccionado=function(id){
condicionPagoTiempoSrc.get({c_paymentterm_id:id},function(data){$scope.progress=true;
  $scope.id_condicion_pago_tiempo=data.condiciones_pago_tiempo[0].name;
  $scope.cotizacion.id_condicion_pago_tiempo=data.condiciones_pago_tiempo[0].c_paymentterm_id;            //  console.log(data);
  if(data.msg=="Success"){
            $scope.progress=false;
          }
  });
}

$scope.condicion_factura=function(tipo){
  $scope.tipo_fact=true;
  var i=0;
  $scope.facturacion=[];
  condicionFacturaSrc.get({valor:"*"},function(data){
    $scope.condiciones_facturacion=data.condiciones_facturacion;                                          //console.log(data); ok
    console.info($scope.condiciones_facturacion.length);
    if($scope.condiciones_facturacion.length>0){
    console.info($scope.condiciones_facturacion.length+"2");
      while(i<$scope.condiciones_facturacion.length){
        if(tipo=="PUE"){
          if($scope.condiciones_facturacion[i].valor=="I" || $scope.condiciones_facturacion[i].valor=="N" || $scope.condiciones_facturacion[i].valor=="O"){
            $scope.facturacion.push({
                valor:$scope.condiciones_facturacion[i].valor,             
                descripcion:$scope.condiciones_facturacion[i].descripcion,
              });
          }
        }
        if(tipo=="PPD"){
          if($scope.condiciones_facturacion[i].valor=="D" || $scope.condiciones_facturacion[i].valor=="S" || $scope.condiciones_facturacion[i].valor=="OBCNTR_C"){
            $scope.facturacion.push({
                valor:$scope.condiciones_facturacion[i].valor,             
                descripcion:$scope.condiciones_facturacion[i].descripcion,
              });
          }
        }

        console.info($scope.condiciones_facturacion[i].valor); 
        i++;
      }
        console.info($scope.facturacion);
    }
  });
}

$scope.condicionFacturaSeleccionado=function(valor){                                    $scope.progress=true;
  condicionFacturaSrc.get({valor:valor},function(data){                                 //console.log(data); ok
    $scope.cotizacion.id_condicion_factura=data.condiciones_facturacion[0].valor;
    $scope.id_condicion_factura=data.condiciones_facturacion[0].descripcion;
    if(data.msg=="Success"){
            $scope.progress=false;
          }
  });
}

$scope.metodo_pago=function(tipo){
  var i=0;
  $scope.pay=[];
metodoPagoSrc.get({fin_paymentmethod_id:"*"},function(data){
$scope.metodos_pagos=data.metodos_pago;
if($scope.metodos_pagos.length>0){
    console.info($scope.metodos_pagos.length+"2");
      while(i<$scope.metodos_pagos.length){
        if(tipo=="PUE"){
          if($scope.metodos_pagos[i].name=="CHEQUE NOMINATIVO" || $scope.metodos_pagos[i].name=="DINERO ELECTRONICO" || $scope.metodos_pagos[i].name=="EFECTIVO" || $scope.metodos_pagos[i].name=="MONEDERO ELECTRONICO" || $scope.metodos_pagos[i].name=="TARJETAS DE CREDITO" || $scope.metodos_pagos[i].name=="TRANSFERENCIA ELECTRONICA DE FONDO" || $scope.metodos_pagos[i].name=="VALES DE DESPENSA"){
            $scope.pay.push({
                name:$scope.metodos_pagos[i].name,             
                fin_paymentmethod_id:$scope.metodos_pagos[i].fin_paymentmethod_id,
              });
          }
        }
        if(tipo=="PPD"){
          //if($scope.metodos_pagos[i].name=="NA" || $scope.metodos_pagos[i].name=="POR DEFINIR"){
          if($scope.metodos_pagos[i].name=="POR DEFINIR"){
            $scope.pay.push({
                name:$scope.metodos_pagos[i].name,             
                fin_paymentmethod_id:$scope.metodos_pagos[i].fin_paymentmethod_id,
              });
          }
        }

        i++;
      }
        console.info($scope.facturacion);
    }
});
}

$scope.metodo_pago_seleccionado=function(id){$scope.progress=true;
  metodoPagoSrc.get({fin_paymentmethod_id:id},function(data){
    if(data.metodos_pago[0]!=undefined){
$scope.cotizacion.id_metodo_pago=data.metodos_pago[0].fin_paymentmethod_id;
    $scope.id_metodo_pago=data.metodos_pago[0].name;
  }else{
    $scope.cotizacion.id_metodo_pago="";
    $scope.id_metodo_pago="";
  }
  if(data.msg=="Success"){
            $scope.progress=false;
          }
});
}

$scope.condiciones_consumibles=function(){ //console.log($scope.agente);
$scope.mensaje_atencion="CON RELACION A SU SOLICITUD NOS PERMITIMOS PRESENTAR LA SIGUIENTE INFORMACIÓN.";
$scope.nota="FAVOR DE ENVIAR SU PEDIDO, COMPROBANTE DE PAGO Y DATOS FISCALES PARA SU FACTURACION CORRESPONDIENTE AL CORREO "+$scope.email;
$scope.tiempo_entrega="1-2 DIAS HABILES A PARTIR DE LA FECHA EN QUE SE REALICE SU PEDIDO Y SE CONFIRME SU PAGO. \nENTREGA INMEDIATA";
$scope.pago="DEPOSITO O TRANSFERENCIA DEL 100% A FAVOR DE SUMINISTRO PARA USO MEDICO Y HOSPITALARIO S.A. DE C.V.\n30 DIAS DE CREDITO. ";
$scope.validez="ESTA COTIZACION TIENE VIGENCIA DE 15 (QUINCE) DIAS A PARTIR DE LA FECHA EN QUE LA RECIBA.\nESTA COTIZACION TIENE VIGENCIA HASTA NUEVO AVISO POR ESCRITO.";
}

$scope.condiciones_ventas=function(){

}

$scope.condiciones_servicio=function(){

}

$scope.condiciones_ims=function(){
  $scope.mensaje_atencion="Con relacion a su amable solicitud, nos permitimos presentar a su consideracion, la siguiente información.";
  $scope.nota="";
  $scope.precio="Los precios cotizados estan en dólares americanos y se convertiran a moneda nacional segun el tipo de cambio Banamex venta, del dia de pago.";
  $scope.tiempo_entrega="30 a 90 dias bajo existencias";
  $scope.pago="* Contado.";
  $scope.garantia="Tres (3) años en partes y mano de obra contra cualquier problema de instalación y/o manufactura a partir de la fecha de instalación. Esta garantía, para equipos de pequeñas dimensiones, se entiende en nuestros talleres de la Ciudad de México";
  $scope.validez="La vigencia de esta cotización sera de quince dias a partir de la fecha de la presente, vencido dicho plazo deberá solicitarse confirmación.";
}

  $scope.bPrecio=function(){$scope.cotizacion.precio=$scope.precio;}
  $scope.bTiempos=function(){$scope.cotizacion.tiempo_entrega=$scope.tiempo_entrega;}
  $scope.bPago=function(){$scope.cotizacion.condicion_pago=$scope.pago;}
  $scope.bGuias=function(){$scope.cotizacion.guia_mecanica_salvaguarda_instalacion=""}
  $scope.bGarantia=function(){$scope.cotizacion.garantia=$scope.garantia;}
  $scope.bCapacitacion=function(){$scope.cotizacion.capacitacion=""}
  $scope.bValidez=function(){$scope.cotizacion.validez=$scope.validez;}
  $scope.sbCapacitacion=function(){$scope.cotizacion.capacitacion=""}
  $scope.sbValidez=function(){$scope.cotizacion.validez=""}
  $scope.sbAnticipo=function(){$scope.cotizacion.anticipo=""}
  $scope.sbObservacion=function(){$scope.cotizacion.nota=$scope.nota}
  $scope.sbSaludo=function(){$scope.cotizacion.mensaje_atencion=$scope.mensaje_atencion;}
/* ------------------------------------------------------PAQUETES ---------------------------------------- */
/*
$scope.paqueteLst =function(busquedaP){  console.log("paqueteLst");
          console.log(busquedaP);
            paquetesSrc.get(busquedaP,function(data){
            $scope.paquetes=data['paquetes']; console.log($scope.paquetes);
          });
      }*/

      $scope.paqueteLst =function(busquedaP){  console.log("paqueteLst");
          console.log(busquedaP);
            paqueteSrc.get(busquedaP,function(data){
            $scope.paquetes=data.paquete; console.log($scope.paquetes);
          });
      }

$scope.paqueteSeleccionado=function(id_pack){
  if($scope.moneda_destino=="" || $scope.moneda_destino==undefined){alert("Se requiere seleccionar un tipo de moneda de venta")}else{//console.log($scope.moneda_destino);
  if(confirm("¿Desea agregar el paquete seleccionado?")){
  console.log(id_pack);
  paqueteSrc.get({vista:1,id_pack:id_pack},function(data){
    $scope.seleccionado=data.paquete;        console.log($scope.seleccionado);//console.log($scope.seleccionado.length);
    $scope.cantidad=$scope.seleccionado[0].cantidad;
    $scope.unidad_medida=$scope.seleccionado[0].insumo_unidad_medida;
    $scope.codigo_proovedor=$scope.seleccionado[0].codigo_proovedor;
      var k=0;
            while(k<$scope.seleccionado.length){
              var precio=$scope.seleccionado[k].precio;
              precio=precio.replace(",","");
              $scope.getConvesionMoneda(k,precio,$scope.seleccionado[k].tipo_cambio,$scope.moneda_destino);
            //$scope.agregarPaquete(k);
            k++;
          }
          console.log($scope.precioPaquete);
          });
     }else{alert("! ACCION CANCELADA ¡")}
  }

}
$scope.agregarPaquete=function(){console.log($scope.seleccionado.length);
  var k=0;
  while(k<$scope.seleccionado.length){
    if($scope.seleccionado[k].bandera_insumo!="N"){
      var cantidad_final=$scope.seleccionado[k].cantidad*$scope.cantidad;
      $scope.insumos.push({
                id:$scope.seleccionado[k].id_equipo,                      //  stk:$rootScope.primary_qty, 
                id_pack:$scope.seleccionado[k].id_pack,                      //  stk:$rootScope.primary_qty, 
                cantidad:cantidad_final,
                cantidad_unidad_compra:$scope.seleccionado[k].insumo_cantidad_unidad_compra,
                codigo_proovedor:$scope.seleccionado[k].codigo_proovedor,
                modelo:$scope.seleccionado[k].modelo,
                marca:$scope.seleccionado[k].marca,
                descripcion:$scope.seleccionado[k].descripcion,
                caracteristicas:$scope.seleccionado[k].caracteristicas,
                especificaciones:$scope.seleccionado[k].especificaciones,
                costos:$scope.seleccionado[k].costos,
                precio:$scope.precioPaquete[k],
                unidad_compra:$scope.seleccionado[k].insumo_unidad_compra,
                unidad_venta:$scope.seleccionado[k].insumo_unidad_medida,
                costo_moneda:$scope.seleccionado[k].insumo_costo_moneda,
                tipo_cambio:$scope.seleccionado[k].tipo_cambio,
                tipo_equipo:$scope.seleccionado[k].tipo_equipo,
                bandera_insumo:$scope.seleccionado[k].bandera_insumo,
               // total:$scope.seleccionado.total,                        //cotizacion:$scope.coti// done:false,
      });
    }
  k++;
}
  $scope.vaciarBusqueda();
}
/* --------------------------------------------------- CONVERSION --------------------------------- */
  $scope.getConvesionMoneda=function(i,precio,moneda_origen,moneda_destino){
  console.log(precio);
  console.log(moneda_origen);
  console.log(moneda_destino);
if(moneda_destino=="USD"){
  if(moneda_origen=="JPY"){ console.log(precio);
             conversionSrc.get({currency_id_from:113,currency_id_to:130},function(data){  //JPY TO MXN
                  var fecha_cambio=data.conversiones[0].validto;                                                      //console.log(data.conversiones[0].validto);
                  console.log("!! Se cotizara el tipo de cambio JPY a USD con fecha de actualización: "+fecha_cambio+ " ¡¡");
                  var multiplyrate=data.conversiones[0].multiplyrate;                                                 //console.log(multiplyrate);
                  var precio1=precio*$scope.multiplyrate;                                                             //console.log(precio1);
                      conversionSrc.get({currency_id_from:130,currency_id_to:100},function(data){ // MXN TO USD
                      var multiplyrate1=data.conversiones[1].multiplyrate;                                            //console.log(multiplyrate1);
                      $scope.precioPaquete[i]=precio1*multiplyrate1;                                                  //console.log(precio);                                     console.log(data.conversiones[0].validto);
                      //console.log($scope.precioPaquete[i]);                      
                    });
                  });    console.log("CONVERTIR JPY A USD");
  }
  if(moneda_origen=="EUR"){
                 conversionSrc.get({currency_id_from:102,currency_id_to:130},function(data){
                  var fecha_cambio=data.conversiones[0].validto;                                                      console.log(data.conversiones[0].validto);
                 // alert("!! Se cotizara el tipo de cambio EUR a USD con fecha de actualización: "+fecha_cambio+ " ¡¡");
                  var multiplyrate=data.conversiones[0].multiplyrate;                                                 console.log(multiplyrate);
                  var precio1=precio*$scope.multiplyrate;                                                             console.log(precio1);
                      conversionSrc.get({currency_id_from:130,currency_id_to:100},function(data){
                      var multiplyrate1=data.conversiones[1].multiplyrate;                                            console.log(multiplyrate1);
                      $scope.precioPaquete[i]=precio1*multiplyrate1;  
                    });
                  });   console.log("CONVERTIR EUR A USD");
  }
  if(moneda_origen=="MXN"){
                      conversionSrc.get({currency_id_from:130,currency_id_to:100},function(data){
                        var fecha_cambio=data.conversiones[0].validto;                                             console.log(data.conversiones[0].validto);
                      var multiplyrate1=data.conversiones[0].multiplyrate;                                         console.log(multiplyrate1);
                                                                                                                   console.log(i);
                      $scope.precioPaquete[i]=precio*multiplyrate1;                                                console.log($scope.precioPaquete[i]);
                      $scope.precioVenta=$filter('number')($scope.precioPaquete[0], 2);
                    });                                                                                            console.log("CONVERSION MXN A USD");
                      
      }
  if(moneda_origen=="USD"){console.log("NO ES NECESARIA LA CONVERSION A DOLARES");                                 console.log(precio); 
       $scope.precioPaquete[i]=precio; 
       $scope.precioVenta=$filter('number')($scope.precioPaquete[0], 2);
  }
}else
if(moneda_destino=="MXN"){
      if(moneda_origen=="JPY"){
        conversionSrc.get({currency_id_from:113,currency_id_to:130},function(data){
                        $scope.fecha_cambio=data.conversiones[0].validto;                                         console.log(data.conversiones[0].validto);
                  //alert("!! Se cotizara el tipo de cambio JPY a MXN con fecha de actualización: "+$scope.fecha_cambio+ " ¡¡");
                      var multiplyrate1=data.conversiones[0].multiplyrate;                                     console.log(multiplyrate1);
                       $scope.precioPaquete[i]=precio*$scope.multiplyrate1;                                               console.log(precio);
                    });                                                                                           console.log("CONVERSION JPY A PESOS");
      }
      if(moneda_origen=="EUR"){
        conversionSrc.get({currency_id_from:102,currency_id_to:130},function(data){
                        var fecha_cambio=data.conversiones[0].validto;                                          console.log(data.conversiones[0].validto);
                //  alert("!! Se cotizara el tipo de cambio EUR a MXN con fecha de actualización: "+fecha_cambio+ " ¡¡");
                      var multiplyrate1=data.conversiones[0].multiplyrate;                                         console.log(multiplyrate1);
                      $scope.precioPaquete[i]=precio*multiplyrate1;                                         console.log(precio);
                    });        console.log("CONVERSION EUR A PESOS");
      }
      if(moneda_origen=="USD"){//O        
        conversionSrc.get({currency_id_from:100,currency_id_to:130},function(data){ console.log(precio);
                        var fecha_cambio=data.conversiones[0].validto;                                                console.log(data.conversiones[0].validto);//  
                     //   alert("!! Se cotizara el tipo de cambio USD a MXN con fecha de actualización: "+fecha_cambio+ " ¡¡");
                      var multiplyrate1=data.conversiones[0].multiplyrate;                                         console.log(multiplyrate1);
                      $scope.precioPaquete[i]=precio*multiplyrate1;             console.log(pre);                                                

                    });                                                                                              console.log("CONVERSION USD A PESOS");
      }
      if(moneda_origen=="MXN"){console.log(precio);
                    $scope.precioPaquete[i]=precio;        console.log("CONVERSION MXN A MXN");
                    $scope.precioVenta=$filter('number')($scope.precioPaquete[0], 2);
      }
  }  //fin de ELSE
    //return 
  }//fin function getPreciosMultiples
/* ------------------------------------------- ACTUALIZACION COTIZACION--------------------------------*/
$scope.confirmar = function(con){
    if(con=="RECHAZADO")
      alert("¡ SE CREARA UNA NUEVA VERSION DE LA COTIZACION !");
    else
        alert("¡ SE ACTUALIZARA LA COTIZACIÓN !");
  }

/* ------------------------------------------- FIN DE ACTUALIZACION COTIZACION--------------------------------*/
$scope.getCotizacion=function(id){ $scope.habilitarBotonCarrito=true;
$scope.vaciarBusqueda();
cotizacionPaqueteInsumoSrc.get({id:id},function(data){
  $scope.getOrganizaciones();
          $scope.cotizacion=data.cotizacion;                                              console.warn($scope.cotizacion.org_name);
          $scope.tipo_organizacion($scope.cotizacion.org_name);
          $scope.organizacion=$scope.cotizacion.org_name;                                 console.info($scope.organizacion);
          $scope.m_pago=$scope.cotizacion.metodo_pago;
          if($scope.cotizacion.id_condicion_factura=="I"){
            $scope.tipo_facturacion="PUE";
          }else{
            $scope.tipo_facturacion="PPD";
          }
          $scope.condicion_factura($scope.tipo_facturacion);$scope.metodo_pago($scope.tipo_facturacion);$scope.condicion_tiempo_pago($scope.tipo_facturacion);
          $scope.condicion_factura=$scope.cotizacion.id_condicion_factura;
          $scope.pago_tiempo=$scope.cotizacion.id_condicion_pago_tiempo;
          $scope.numero_cotizacion=$scope.cotizacion.numero_cotizacion;
          $scope.moneda_destino=$scope.cotizacion.tipo_moneda;
          $scope.cotInsumo=data.cotizacion.insumos;                                       console.log($scope.insumos);
          $scope.cotizacion.c_location_id_fiscal=data.cotizacion.c_location_id;           //console.log(data.cotizacion.c_location_id);
          $scope.usuario=$scope.cotizacion.usuario;

          if($scope.cotizacion.estatus=="GUARDADO" && $scope.area!="SERVICIO TECNICO"){
                $scope.cotizacion.version=$scope.cotizacion.version;                      //console.log($scope.cotizacion.version);
              }else if($scope.cotizacion.estatus=="RECHAZADO" && $scope.area!="SERVICIO TECNICO"){
                $scope.cotizacion.estatus="GUARDADO";                                     //console.log($scope.cotizacion.version);
                $scope.buscarVersion($scope.cotizacion.id);
              }else if(($scope.cotizacion.estatus=="GUARDADO" || $scope.cotizacion.estatus=="SOLICITUD" || $scope.cotizacion.estatus=="DESAPROBADO") && $scope.area=="SERVICIO TECNICO" && $scope.puesto=="COORDINADOR DE SERVICIOS" ){
                $scope.cotizacion.estatus="GUARDADO";                                     //console.log($scope.cotizacion.version);
              } else if(($scope.cotizacion.estatus=="GUARDADO" || $scope.cotizacion.estatus=="SOLICITUD" || $scope.cotizacion.estatus=="DESAPROBADO") && $scope.area=="SERVICIO TECNICO"){
                $scope.cotizacion.estatus="SOLICITUD";                                     //console.log($scope.cotizacion.version);
                if($scope.tipo_actualizacion=="actualizar"){  console.warn($scope.tipo_actualizacion);
                  $scope.cotizacion.version=$scope.cotizacion.version;                      //console.log($scope.cotizacion.version);
                }else{
                  $scope.buscarVersion($scope.cotizacion.id);
                }
               // $scope.buscarVersion($scope.cotizacion.id);
              } 
var i=0;
while(i< $scope.cotInsumo.length){
var x="";
              $scope.insumos.push({
                id:$scope.cotInsumo[i].id_insumo,                      //  stk:$rootScope.primary_qty, 
                cantidad:$scope.cotInsumo[i].cantidad,
                cantidad_unidad_compra:$scope.cotInsumo[i].cantidad_unidad_compra,
                codigo_proovedor:$scope.cotInsumo[i].codigo_proovedor,
                modelo:$scope.cotInsumo[i].modelo,
                marca:$scope.cotInsumo[i].marca,
                descripcion:$scope.cotInsumo[i].descripcion,
                caracteristicas:$scope.cotInsumo[i].caracteristicas,
                especificaciones:$scope.cotInsumo[i].especificaciones,
                costos:$scope.cotInsumo[i].costos,
                precio:$scope.cotInsumo[i].precio,
                unidad_compra:$scope.cotInsumo[i].unidad_compra,
                unidad_venta:$scope.cotInsumo[i].unidad_medida,
                costo_moneda:$scope.cotInsumo[i].costo_moneda,
                tipo_cambio:$scope.cotInsumo[i].tipo_cambio,
                tipo_equipo:$scope.cotInsumo[i].tipo_equipo,
                bandera_insumo:$scope.cotInsumo[i].bandera_insumo,
                total:$scope.cotInsumo[i].total,                        //cotizacion:$scope.coti// done:false,
            });
              i++; console.log(i);
          }//while
      });
}//fin getcotizacion

$scope.fechaEntrega = function(bandera,marca){
//if((bandera.trim() === "E" || bandera.trim()==="EQUIPO") || (bandera.trim() === "C" || bandera.trim()==="CONSUMIBLES")){                          //console.log($rootScope.bandera_insumo);
if((bandera.trim() === "E" || bandera.trim()==="EQUIPO")){                          //console.log($rootScope.bandera_insumo);
  marcaProveedorSrc.get({marca_representada:"*"+marca+"*"},function(data){      //console.log(data.marcas_proveedores.data[0].dias_entrega_maximo);
  $scope.dia = data.marcas_proveedores.data[0];//.dias_entrega_maximo;      //console.log($scope.dia); 
    if($scope.dia != undefined || $scope.dia != null || $scope.dia != ""){    
      $scope.diaMaximo = data.marcas_proveedores.data[0].dias_entrega_maximo;   //console.log($scope.diaMaximo);
        if($scope.diaMaximo>$scope.mayor){
          $scope.mayor=$scope.diaMaximo;
          $scope.cotizacion.fecha_entrega = $scope.sumaFecha($scope.mayor,5);//alert($rootScope.fecha_entrega);
        }else{            console.log("es menor");          }
    }
    else{      console.log("VERIFICAR RESULTADO DE CONSULTA");      }
  });
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
 var dia= fecha.getDate();
// var meses = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
 mes = (mes < 10) ? ("0" + mes) : mes;
 dia = (dia < 10) ? ("0" + dia) : dia;
 var fechaFinal = dia+sep+mes+sep+anno;
 return (fechaFinal);
 }

//---------------------------------------------------------------------------------------------------------------------//
$scope.getReporte=function(){//console.log($scope.reporte.c_location_id);
  if($scope.reporte.c_location_id==""|| $scope.reporte.c_location_id==undefined){
    alert("FAVOR DE BUSCAR NOMBRE FISCAL");
    $scope.cotizacion.org_name=$scope.reporte.organizacion;
    $scope.cotizacion.nombre_fiscal=$scope.reporte.nombre_fiscal;
    $scope.cotizacion.no_contrato=$scope.reporte.folio_contrato;
    $scope.cotizacion.reporte=$scope.reporte.folio;
    $scope.organizacion=$scope.reporte.organizacion;
    /*if($scope.cotizacion.no_contrato!=''){
      $scope.condicion_factura='N';
      $scope.cotizacion.id_condicion_factura='N';
    }*/
    $scope.tipo_organizacion($scope.organizacion);
  }else{
  //console.log($scope.reporte.rfc);
    if($scope.cotizacion.no_contrato!=''){
      $scope.condicion_factura='N';
      $scope.cotizacion.id_condicion_factura='N';
    }
    $scope.tipo_organizacion($scope.organizacion);
    $scope.cotizacion.org_name=$scope.reporte.organizacion;
  $scope.cotizacion.rfc=$scope.reporte.rfc;
  $scope.cotizacion.nombre_fiscal=$scope.reporte.nombre_fiscal;
  $scope.cotizacion.nombre_cliente=$scope.reporte.nombre_cliente;
  $scope.cotizacion.no_contrato=$scope.reporte.folio_contrato;
  $scope.cotizacion.reporte=$scope.reporte.folio;
  $scope.cotizacion.c_bpartner_id=$scope.reporte.c_bpartner_id;
  $scope.cotizacion.codigo_postal_entrega=$scope.reporte.c_p;
  $scope.cotizacion.c_location_id=$scope.reporte.c_location_id;
  $scope.cotizacion.calle_entrega=$scope.reporte.calle;
  $scope.cotizacion.colonia_entrega=$scope.reporte.colonia;
  $scope.cotizacion.ciudad_entrega=$scope.reporte.ciudad;
  $scope.cotizacion.estado_entrega=$scope.reporte.estado;
  $scope.cotizacion.pais_entrega=$scope.reporte.pais;
  $scope.cotizacion.calle_fiscal=$scope.reporte.calle_fiscal;
  $scope.cotizacion.colonia_fiscal=$scope.reporte.colonia_fiscal;
  $scope.cotizacion.codigo_postal_fiscal=$scope.reporte.c_p_fiscal;
  $scope.cotizacion.ciudad_fiscal=$scope.reporte.ciudad_fiscal;
  $scope.cotizacion.estado_fiscal=$scope.reporte.estado_fiscal;
  $scope.cotizacion.pais_fiscal=$scope.reporte.pais_fiscal;
  $scope.cotizacion.telefono=$scope.reporte.telefonos;
  $scope.cotizacion.celular=$scope.reporte.celular;
  $scope.cotizacion.correo=$scope.reporte.correos;
  $scope.cotizacion.representante_legal=$scope.reporte.nombre_responsable;
  $scope.cotizacion.contacto=$scope.reporte.nombre_responsable;
  }
}
//---------------------------------------------------------------------------------------------------------------------//

})
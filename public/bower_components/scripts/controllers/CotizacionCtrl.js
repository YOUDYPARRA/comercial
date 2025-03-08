'use strict';
angular.module('cotizacionApp')
.controller('CotizacionCtrl',function (reportesSrc,$scope,$controller,$filter,$timeout,insumosSrc,cotizacionPaqueteInsumoSrc,cotizacionSrc,componenteSrc,insumoOpcionalSrc,$log,insumoOpcionalConsultarSrc,marcaProveedorSrc,paqueteSrc,conversionSrc,tercerosSrc,ultimoSrc,direccionesSrc,contactosSrc,condicionCotizacionSrc,condicionFacturaSrc,metodoEnvioSrc,condicionPagoTiempoSrc,metodoPagoSrc,orgVsrc,userSrc,contrato,categoriaProductoSrc,prestamoSrc){
  angular.extend(this,$controller('NumeroAletraCtrl',{$scope:$scope}));//angular.extend(this,$controller('EnsableCtrl',{$scope:$scope}));
  $scope.coti="CotizacionCtrl.js COTIZACION";
  $scope.tipo_facturacion = "";
  $scope.id_envio = true;
  $scope.id_factura = true;
  $scope.id_pago = true;
  $scope.id_tiempo = true;
  $scope.empleados="EMPLEADOS";
  $scope.c_cccv=[];
  $scope.mayor=0;
  $scope.cotizacion={
  'id':'',
  'equipo':'',
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
  'fecha_vigencia':'',
  'condicion_pago':'',
  'reporte':'',
  'anticipo':'',
  'guia_mecanica_salvaguarda_instalacion':'',
  'capacitacion':'',
  'id_condicion_factura':'',
  'id_metodo_envio':'',
  'id_condicion_pago_tiempo':'',
}

  $scope.busquedaC={ 
    'vista':1,
    'tipo_equipo':'',
    'codigo_proovedor':'',
    'modelo':'',
    'descripcion':'',
    'marca':'',
    'categoria1':''
  }

  var i=0;
  $scope.preciosMultiples=[];
  $scope.insumos=[];
  $scope.subTotal=0;
  $scope.ivaT=0;
  $scope.totales=0;
  $scope.progress=false;
  $scope.precioPaquete=[];
  $scope.s_condicion_cotizacion={'capacitacion':'','validez':'','anticipo':''}

  $scope.condicion_cotizacion={
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

  $scope.busquedaP={ 
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
      'address1':'',                                                                              //'isbillto':'Y',      //'isshipto':'Y',
  }

  $scope.reporte={
      'equipo':'',
      'marca':'',                                                                              //'isbillto':'Y',      //'isshipto':'Y',
      'modelo':'',                                                                              //'isbillto':'Y',      //'isshipto':'Y',
  }

$timeout(function(){ 
  $scope.ver_org=true;
  if($scope.index==0){                                                                            //console.log($scope.index);
  }else{
    $scope.tipo_fact=false;
    if($scope.id==undefined){                                                                     //console.log("CREATE");
    $scope.habilitarOrganizacion=true;
      $scope.tipo_facturacion="PUE";
      $scope.cotizacion.equipo="";
      $scope.cargarFuncionesIniciales();
      $scope.condicion_factura($scope.tipo_facturacion);
      $scope.metodo_pago($scope.tipo_facturacion);
      $scope.condicion_tiempo_pago($scope.tipo_facturacion);
      var dat= new Date();                                                                      //$scope.cotizacion.fecha = moment(dat).format('DD-MM-YYYY');   
      $scope.cotizacion.fecha = moment(dat).format('YYYY-MM-DD H:m:s');   
      $scope.cotizacion.fecha_factura = '00-00-0000';                                           //$scope.cotizacion.fecha_entrega = moment(dat).format('DD-MM-YYYY');   
      $scope.cotizacion.fecha_entrega = '00-00-0000';   
      //$scope.cotizacion.validez = '00-00-0000';   
      $scope.cotizacion.estatus="GUARDADO";
      $scope.cotizacion.id=$scope.id;                                                                       //console.log($scope.nombre_empledo);//OK
      $scope.cotizacion.nombre_empleado=$scope.nombre_empledo;                                       
      $scope.cotizacion.centro_costo=$scope.tipo_centro_costo;                                              //console.log($scope.tipo_centro_costo);
      $scope.cotizacion.usuario=$scope.nombre_empledo;                                          //$scope.cotizacion.numero_cotizacion=$scope.iniciales_autor+"-"+$scope.centro_costo+"-"+$scope.cotizacion_fecha;
      $scope.cotizacion.departamento=$scope.departamento;                                                   //console.log($scope.area);
      $scope.cotizacion.area=$scope.area;                                                                  // console.log($scope.org);
      $scope.habilitarBotonCarrito=true;
      if($scope.reporte!=undefined){                                                            //console.warn($scope.reporte);
        $scope.reporte = JSON.parse($scope.reporte);                                            console.warn($scope.reporte);
        $scope.getReporte();                                                                    //console.log($scope.reporte);
      }
    }else{                                                                                      console.log("UPDATE");//console.log($scope.id);
      $scope.tipo_fact=true;
      if($scope.area=="SERVICIO TECNICO"){
        $scope.categoria_producto("* ST");
      }else{
        $scope.categoria_producto("*");
      }
      $scope.getUsuarios();                                                                     //$scope.condiciones_api();
      $scope.getCotizacion($scope.id);
      $scope.ver_precios_servicio=true;
      $scope.ver_costos_servicio=true;
      if($scope.area=="SERVICIO TECNICO"){
        $scope.ver_procesar=true;
        if($scope.puesto=="GERENTE DE OPERACIONES" || $scope.puesto=='SECRETARIA'){
          $scope.ver_gerente=true;
        }else{

        }
      }
      $scope.goCats=false;
    }
  }           //ELSE
},1000);

  $scope.bloquear=function(oo){                                                                   //alert("ENTRO");
    if(oo=='actualizar'){
    $scope.numero_cotizacion=$scope.nc;
    $scope.cotizacion.numero_cotizacion=$scope.nc;
    $scope.ver_put=true;
    $scope.ver_post=false;
    $scope.cotizacion.auto=$scope.aut;
    }else{                                                                                        //VERSION
    $scope.numero_cotizacion=$scope.nc;
    $scope.cotizacion.numero_cotizacion=$scope.nc;                                                //$scope.cotizacion.estatus="GUARDADO";
    $scope.ver_put=false;
    $scope.ver_post=true;
    }
  }

  $scope.contar=function(cadena){                                                                 //console.info(cadena);
    var t='500';
    $scope.max=t-cadena.length;
    $scope.lleva=cadena.length;
  }

$scope.tipo_organizacion=function(org){                                                           console.log(org);//console.log($scope.id);
  if($scope.id==undefined||$scope.id==null||$scope.id==""){                                       //console.log($scope.id);
    $scope.ultimoLst(org);                                                                        //console.log($scope.organizacion);
  }
  $scope.ver_act=false;                                                                           //$scope.equipo.categoria1=org;                       console.log($scope.equipo.categoria1);
  orgVsrc.get({name:org},function(data){                                                          //console.log(data.objetos.ad_org_id);
    $scope.cotizacion.org_id=data.objetos[0].ad_org_id;
    $scope.cotizacion.org_name=data.objetos[0].name;                                              //$scope.ultimoLst($scope.cotizacion.org_name);
    $scope.busquedaC.categoria1=data.objetos[0].name;

    if($scope.cotizacion.org_name==="SMH"){                                                       console.info("ORGANIZACION SMH");
      if($scope.tipo_usuario == "ADMINISTRADOR"){                                                     console.warn("USUARIO ADMINISTRADOR");
        $scope.ver_procesar=true;
        $scope.ver_busqueda=true;
        $scope.ver_paquete=true;
        $scope.ver_equipos=true;
        $scope.condiciones_consumibles($scope.email);
        $scope.ver_condiciones_consumibles();
        $scope.ver_precios_servicio=true;
        $scope.ver_costos_servicio=true;
        $scope.editar_precios_servicio=false;
      }else{                                                                                          console.warn("USUARIO USER");
          if($scope.area=="SERVICIO TECNICO"){ 
            $scope.ver_procesar=true;
            $scope.ver_act=true;
            $scope.ver_busqueda=true;
            $scope.ver_paquete=false;
            $scope.ver_equipos=false;
            $scope.condiciones_servicio();
            $scope.ver_condiciones_servicio();                                                            console.error("SERVICIO TECNICO");
            if($scope.centro_costo=="MX"){
              if($scope.puesto=="GERENTE DE OPERACIONES" || $scope.puesto=='SECRETARIA'){                       console.log("GERENTE y SECRETARIA");
              }else if($scope.puesto=="COORDINADOR DE SERVICIOS" || $scope.puesto=='INGENIERO DE SERVICIOS'){   console.log("COORDINADOR y INGENIERO");
              }
            }else if($scope.centro_costo=="GDL"){
            }
          }else if($scope.area==="COMERCIAL"){                                                            console.error("COMERCIAL");
            $scope.ver_busqueda=true;                                                                   
            $scope.ver_paquete=false;
            $scope.ver_equipos=false;
            $scope.condiciones_consumibles($scope.email);
            $scope.ver_condiciones_consumibles();
            $scope.ver_precios_servicio=true;
            $scope.ver_costos_servicio=true;
            $scope.editar_precios_servicio=false;
            if($scope.centro_costo=="GDL"){
              $scope.ver_procesar=true;
            }                                                                                     
          }
      }   // FIN ELSE USER
    }else if($scope.cotizacion.org_name==="IMS"){                                                 console.info("ORGANIZACION IMS");
      if($scope.tipo_usuario == "ADMINISTRADOR"){                                                     console.warn("USUARIO ADMINISTRADOR");
        $scope.ver_procesar=true;
        $scope.ver_busqueda=true;
        $scope.ver_paquete=true;
        $scope.ver_equipos=true;
        $scope.condiciones_ims();
        $scope.ver_condiciones_ims();
        $scope.ver_precios_servicio=true;
        $scope.ver_costos_servicio=true;
        $scope.editar_precios_servicio=false;
      }else{                                                                                          console.warn("USUARIO USER");
          if($scope.area=="SERVICIO TECNICO"){                                                            console.error("SERVICIO TECNICO");
            $scope.ver_act=true;    
            $scope.ver_procesar=true;
            $scope.ver_busqueda=true;
            $scope.ver_paquete=true;
            $scope.condiciones_ims();
            $scope.ver_condiciones_ims();
            $scope.editar_precios_servicio=false;
            if($scope.centro_costo=="MX"){
              if($scope.puesto=="GERENTE DE OPERACIONES" || $scope.puesto=='SECRETARIA'){                       console.log("GERENTE y SECRETARIA");
              }else if($scope.puesto=="COORDINADOR DE SERVICIOS" || $scope.puesto=='INGENIERO DE SERVICIOS'){   console.log("COORDINADOR y INGENIERO");
              }
            }else if($scope.centro_costo=="GDL"){
            }
          }else if($scope.area==="COMERCIAL"){                                                            console.error("COMERCIAL");
            $scope.ver_busqueda=true;
            $scope.ver_paquete=true;
            $scope.condiciones_ims();
            $scope.ver_condiciones_ims();
            $scope.editar_precios_servicio=false;
            $scope.ver_precios_servicio=true;
            $scope.ver_costos_servicio=true;
            if($scope.centro_costo=="GDL"){
              $scope.ver_procesar=true;
            }
          }
      }
    }//FIN ORGANIZACION IMS

  });
}

  $scope.cargarFuncionesIniciales=function(){
    $scope.getOrganizaciones();                                                                   // $scope.metodoEnvio();
    $scope.cotizacion.version=1;
    $scope.getUsuarios();
    if($scope.area=="SERVICIO TECNICO"){
      $scope.categoria_producto("* ST");
    }else{
      $scope.categoria_producto("*");
    }
  }

  $scope.getUsuarios=function(){
    userSrc.get({vista:1,name:"*",puesto:'*VENTAS*'},function(data){ 
      $scope.usuarios=data.users;                                                                 //console.log(data);
    },function(err){alert('ERROR EN SERVIDOR.');});
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
    $scope.ver_costos_servicio=false;
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
    $scope.condicion_vigencia=false;
  }

  $scope.moneda=function(moneda){
    $scope.cotizacion.tipo_moneda=moneda;                                                         //console.log($scope.cotizacion.tipo_moneda);
    $scope.habilitarBoton=false;
    $scope.moneda_destino=moneda;                                                                 //$rootScope.habilitarPrecio=false;
  }

  $scope.getGerente=function(usuario){                                                            //console.info(usuario);
    $scope.cotizacion.usuario=usuario;
  }

  $scope.buscarVersion=function(idc){                                                             //console.log(idc); 
    cotizacionSrc.get({vi:0,id:idc},function(data){
      $scope.cotizacion.version=data.version;                                                     //console.log(data.version);            console.log(data.version);
      //$scope.cotizacion.estatus="GUARDADO";
    },function(err){alert('ERROR EN SERVIDOR.');});
  }

  $scope.ultimoLst =function(org_name){ $scope.progress=true;
    ultimoSrc.get({org_name:org_name},function(data){
      var dat= new Date();            
      $scope.cotizacion_fecha = moment(dat).format('YYYYMMDD');   
      $scope.cotizacion.lugar_centro_costo=$scope.centro_costo;                                   //console.log($scope.centro_costo);
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

  $scope.contratosBsc=function(fiscal){
    var i=0,j=0;
    var rsl=contrato.qry({v:4,nombre_fiscal:fiscal});
    rsl.$promise.then(function(r){                                                                      //console.log(r.objetos);console.log(r.objetos.length);
      while(i<r.objetos.length){                                                                        //console.log(r.objetos[i]);
        $scope.c_cccv[i]=r.objetos[i];                                                                  //console.info($scope.c_cccv);
        i++;
      }
      var rsl2=contrato.qry({v:5,nombre_fiscal:fiscal});                                                //console.log(i);
      rsl2.$promise.then(function(r1){                                                                  //console.log(r.objetos);console.log(r1.objetos.length);
        while(j<r1.objetos.length){
        $scope.c_cccv[i]=r1.objetos[j];                                                                 //console.info($scope.c_cccv);
          j++;
          i++;
        }
      });
    });
  }

  $scope.buscarDireccion = function(name){                                                              console.log($scope.fiscal_elegido.c_bpartner_id);
    if($scope.fiscal_elegido.c_bpartner_id==undefined||$scope.fiscal_elegido.c_bpartner_id==''){
      alert("¡NO HA SELECCIONADO UN CLIENTE, FAVOR DE VERIFICAR!");
    }else{
      $scope.direccionesEnvio($scope.fiscal_elegido.c_bpartner_id,name);
    }
  }

  $scope.tercerosLst =function(){                                                             //console.log(nacionales); //  console.log($scope.cotizacion.org_name);
    tercerosSrc.get({nombre_fiscal:"*"+$scope.cotizacion.nombre_fiscal+"*",iscustomer:"Y",is_vendor:"*" },function(data){
      $scope.fiscales=data['terceros'];                                                                 // console.log(data['terceros']);
    },function(err){alert('ERROR EN SERVIDOR.');});
  }

  $scope.direccionesFactura =function(id){                                                              //console.log("DIRECCION FACTURA");
    direccionesSrc.get({id_tercero:"*"+id+"*",isbillto:"Y"},function(data){
      $scope.dFiscales=data['direcciones'];                                                             //console.log($scope.dFiscales);
    },function(err){alert('ERROR EN SERVIDOR.');});
  }

  $scope.direccionesEnvio =function(id,name){ 
    direccionesSrc.get({id_tercero:"*"+id+"*",isshipto:"Y",name:'*'+name+'*'},function(data){
      $scope.dEnvio=data['direcciones'];                                                                //console.log($scope.nFiscales);
    },function(err){alert('ERROR EN SERVIDOR.');});
  }

  $scope.cambiaNombreFiscal = function(nfiscal){                                                          //console.log(nfiscal);
    $scope.fiscal_elegido=JSON.parse(nfiscal);                                                            console.log($scope.fiscal_elegido);
    $scope.cotizacion.nombre_fiscal = $scope.fiscal_elegido.bpartner_name;
    $scope.cotizacion.org_id = $scope.fiscal_elegido.org_id;
    $scope.cotizacion.c_bpartner_id_fiscal= $scope.fiscal_elegido.c_bpartner_id;                        //console.info($scope.fiscal_elegido.c_bpartner_id);
    $scope.cotizacion.rfc=$scope.fiscal_elegido.taxid;                                                  //console.log(fiscal.taxid);       // 
    $scope.cotizacion.compra=$scope.fiscal_elegido.group_name;                                           //alert($scope.cotizacion.compra);console.log($scope.cotizacion.compra);       // ADD NACIONAL-EXTRANJERO
    $scope.tipo_organizacion($scope.fiscal_elegido.org_name);
    $scope.contratosBsc($scope.cotizacion.nombre_fiscal);
    $scope.direccionesFactura($scope.fiscal_elegido.c_bpartner_id);
    $scope.direccionesEnvio($scope.fiscal_elegido.c_bpartner_id,"*");
    $scope.getContactos($scope.fiscal_elegido.c_bpartner_id);
  }

  $scope.cambiaDireccionFiscal=function(dFiscal){                                                         //console.log(dFiscal);
    $scope.direccionesFiscales=JSON.parse(dFiscal);                                                       console.log($scope.direccionesFiscales);
    $scope.dFiscal = $scope.direccionesFiscales.address1;                                                 //console.log($scope.direccionesFiscales.c_bpartner_location_id);
    $scope.cotizacion.c_location_id_fiscal = $scope.direccionesFiscales.c_bpartner_location_id;           //console.log($scope.direccionesFiscales.c_location_id);        //$scope.cotizacion.c_location_id_fiscal = $scope.direccionesFiscales.c_location_id;
    $scope.cotizacion.calle_fiscal = $scope.direccionesFiscales.address1;
    $scope.cotizacion.colonia_fiscal = $scope.direccionesFiscales.address2;
    $scope.cotizacion.codigo_postal_fiscal = $scope.direccionesFiscales.cp;
    $scope.cotizacion.ciudad_fiscal = $scope.direccionesFiscales.city;
    $scope.cotizacion.pais_fiscal = $scope.direccionesFiscales.country_name;
    $scope.cotizacion.estado_fiscal = $scope.direccionesFiscales.region_name;
  }

  $scope.cambiaSucursalEnvio=function(dEnvio){                                                            //console.log(dEnvio);
    $scope.direcciones_envio=JSON.parse(dEnvio);                                                          console.log($scope.direcciones_envio);
    $scope.cotizacion.c_bpartner_id= $scope.direcciones_envio.c_bpartner_id;
    $scope.cotizacion.nombre_cliente = $scope.direcciones_envio.name;
    $scope.cotizacion.telefono = $scope.direcciones_envio.phone;
    $scope.cotizacion.celular = $scope.direcciones_envio.phone2;                                          // console.log(address1);   console.info($scope.direcciones_envio.c_bpartner_location_id);
    $scope.cotizacion.id_metodo_envio = $scope.direcciones_envio.c_bpartner_location_id;                  //console.info($scope.direcciones_envio.c_location_id);        //$scope.cotizacion.c_location_id = $scope.direcciones_envio.c_location_id; 
    $scope.cotizacion.calle_entrega = $scope.direcciones_envio.address1;
    $scope.cotizacion.colonia_entrega = $scope.direcciones_envio.address2;
    $scope.cotizacion.codigo_postal_entrega = $scope.direcciones_envio.cp;
    $scope.cotizacion.ciudad_entrega = $scope.direcciones_envio.city;
    $scope.cotizacion.pais_entrega = $scope.direcciones_envio.country_name;
    $scope.cotizacion.estado_entrega = $scope.direcciones_envio.region_name;                              //console.log($scope.estado_entrega);        //$scope.cambiaDireccionesEnvio($scope.direcciones_envio.c_location_id);   //console.log($scope.c_location_id);
  }         

  $scope.getContactos=function(id){
    contactosSrc.get({id_tercero:"*"+id+"*"},function(data){                                              //console.log(data);
      $scope.contactos=data['contactos'];                                                                 //   console.log($scope.contactos);
    });
  }

  $scope.cambiaContacto=function(dcontacto){                                                              console.log(dcontacto);
    $scope.contacto_datos=JSON.parse(dcontacto);                                                          console.log($scope.contacto_datos);
    $scope.cotizacion.ad_user_id = $scope.contacto_datos.ad_user_id;
    if($scope.contacto_datos.lastname==null||$scope.contacto_datos.lastname==undefined){
      var a='';
    }else{
    var a=$scope.contacto_datos.lastname;
    }
    $scope.cotizacion.contacto = $scope.contacto_datos.firstname+" "+a;
    $scope.cotizacion.correo= $scope.contacto_datos.email;
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
    if($scope.moneda_destino=="" || $scope.moneda_destino==undefined){
    alert("Se requiere seleccionar un tipo de moneda");
    }else{//console.log($scope.moneda_destino);
     /* if(seleccionado.cantidad_unidad_compra=="" || seleccionado.cantidad_unidad_compra==undefined){
        alert("¡¡ FAVOR DE VERIFICAR EL PRODUCTO EN SU ATRIBUTO: unidades por cantidad de compra !!");
      }else{*/
      if(confirm("¿Desea agregar el producto seleccionado?")){
        $scope.seleccionado=seleccionado;
        if(seleccionado.clase=="F"){                                                              console.warn(seleccionado.clase);
          $scope.c=seleccionado.cantidad;
          $scope.cantidad=seleccionado.cantidad;
          $scope.unidad_medida=seleccionado.unidad_venta;
          $scope.id_insumo_prestamo=seleccionado.id;                                              
          $scope.id_prestamo=seleccionado.id_compra_venta;                                              
          $scope.id_insumo=seleccionado.id_insumo;
        }else{
          $scope.id_insumo_prestamo="";
          $scope.id_insumo=seleccionado.id;
          $scope.id_cotizacion="";
          $scope.cantidad=1;
          $scope.unidad_medida=seleccionado.unidad_medida;
        }
        $scope.habilitarBotonCarrito=false;
        $scope.setCategoria_producto(seleccionado.tipo_equipo);
        $scope.especificaciones="";
        $scope.descuento=0;
        $scope.codigo_proovedor=seleccionado.codigo_proovedor;
        $scope.descripcion=seleccionado.descripcion;
        $scope.contar($scope.descripcion);
        $scope.precioVenta=seleccionado.precio;                                                   console.warn(seleccionado.costos);
        $scope.costo=seleccionado.costos;                                                         console.warn($scope.costo);
        $scope.costo_moneda=$scope.moneda_destino;                                                
        $scope.fechaEntrega(seleccionado.bandera_insumo,seleccionado.marca);                      console.warn($scope.precioVenta);
        if(seleccionado.precios!=undefined){
          if(seleccionado.precios.length>0){
            var j=0;
            while(j<3){
              if(seleccionado.tipo_cambio == $scope.moneda_destino){                                console.log(seleccionado.tipo_cambio +"=="+ $scope.moneda_destino);
                $scope.preciosMultiples.push({etiqueta:seleccionado.precios[j].etiqueta,monto:seleccionado.precios[j].monto});                                                                                    console.log($scope.preciosMultiples[j]);
              }else{                                                                              console.log("entro a conversion ");
                $scope.getPreciosConversion(seleccionado.precios[j].monto, seleccionado.tipo_cambio, $scope.moneda_destino, seleccionado.precios[j].etiqueta);
              }
              j++;
            }                                                                                       //    console.log(copia);
          }else{
            $scope.getPreciosConversion(seleccionado.precio, seleccionado.tipo_cambio, $scope.moneda_destino,"");
          }
        }
      }else{alert("! ACCION CANCELADA ¡");}                                                      //}//FIN ELSE CANTIDAD_UNIDAD_COMPRA
    }
  }

  $scope.validarCantidadPrestamo=function(cantidad){console.log(cantidad+">"+$scope.c)
    if($scope.reporte.clase=="F"){                                                          console.warn("LINEAS PRESTAMO");
      if(cantidad>$scope.c||cantidad<=0){ 
        alert("EL VALOR DE LA CANTIDAD SELECCIONADA NO ESTA EN EL RANGO DE SELECCION DE LA CANTIDAD DEL CODIGO DEL PRESTAMO ");
      }
    }
  }

$scope.editarPrecio=function(indice,seleccionado){                                              console.log(seleccionado)
  if(confirm("¿Desea editar el precio del producto seleccionado?")){
    $scope.habilitarBotonCarrito=false;
    $scope.remover(indice,seleccionado);
    $scope.seleccionado=seleccionado;
    $scope.id_cotizacion=seleccionado.id_cotizacion;
    $scope.id_insumo=seleccionado.id;
    $scope.id_insumo_prestamo=seleccionado.id_insumo_prestamo;                                  //alert(seleccionado.id_insumo_prestamo);
    $scope.id_prestamo=seleccionado.id_prestamo;                                  //alert(seleccionado.id_insumo_prestamo);
    $scope.cantidad=seleccionado.cantidad;
    $scope.unidad_medida=seleccionado.unidad_venta;
    $scope.seleccionado.unidad_medida=seleccionado.unidad_venta;
    $scope.codigo_proovedor=seleccionado.codigo_proovedor;
    $scope.descripcion=seleccionado.descripcion;
    $scope.precioVenta=seleccionado.precio;
    $scope.costo=seleccionado.costos;
    $scope.costo_moneda=$scope.moneda_destino;
    $scope.categoria=seleccionado.m_product_category_id;
    $scope.especificaciones=seleccionado.especificaciones;
  }else{alert("! ACCION CANCELADA ¡")}
}

$scope.montoSeleccionado=function(monto){                                                       console.log(monto);
  $scope.precioVenta=parseFloat(monto).toFixed(2);
}

$scope.agregarCarrito=function(){                                                               /*console.log($scope.precioVenta);*/console.log($scope.costo);
  if(isNaN($scope.precioVenta) || $scope.precioVenta==null){
    alert("EL PRECIO NO ES UN VALOR NUMERICO, ¡¡ FAVOR DE VERIFICAR !!");
  }else if($scope.categoria==""|| $scope.categoria==undefined){
    alert("NO HAY NINGUNA CATEGORIA RELACIONADA AL CODIGO DE PRODUCTO, ¡¡ FAVOR DE VERIFICAR !!");
  }else{                                                                            
    $scope.costo=parseFloat($scope.costo);                                                      //console.warn(cadena);console.warn($scope.precioVenta);
    $scope.precioVenta=parseFloat($scope.precioVenta);                                          //console.warn(cadena);console.warn($scope.precioVenta);
    $scope.insumos.push({
                id:$scope.id_insumo,             
                cantidad:$scope.cantidad,
                cantidad_unidad_compra:$scope.seleccionado.cantidad_unidad_compra,
                codigo_proovedor:$scope.seleccionado.codigo_proovedor,
                modelo:$scope.seleccionado.modelo,
                marca:$scope.seleccionado.marca,
                descripcion:$scope.descripcion,
                caracteristicas:$scope.seleccionado.caracteristicas,
                especificaciones:$scope.especificaciones,
                costos:$scope.costo,
                precio:$scope.precioVenta,
                descuento:$scope.descuento,
                unidad_compra:$scope.seleccionado.unidad_compra,
                unidad_venta:$scope.unidad_medida,
                costo_moneda:$scope.seleccionado.costo_moneda,
                tipo_cambio:$scope.seleccionado.tipo_cambio,
                tipo_equipo:$scope.seleccionado.tipo_equipo,
                bandera_insumo:$scope.seleccionado.bandera_insumo,
                id_insumo_prestamo:$scope.id_insumo_prestamo,
                id_prestamo:$scope.id_prestamo,
                m_product_category_id:$scope.categoria,
                id_cotizacion:$scope.id_cotizacion,
               // total:$scope.seleccionado.total,                        //cotizacion:$scope.coti// done:false,
            });
  $scope.vaciarBusqueda();                                                console.info($scope.insumos);
  }
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
$scope.especificaciones=""; 
$scope.preciosMultiples=[];
//$scope.insumosB=[];
$scope.habilitarBotonCarrito=true;
$scope.serie=undefined;
}

  $scope.setTotals = function(item){                                                      console.log($scope.cotizacion.compra); //console.log(item.precio);console.log(parseFloat(item.costos));
    if($scope.procesar=="COMPRA"){
      var p=item.costos;
    }else{
      var p=item.precio;
    }
    if(item){                                                                             //item.total = (item.cantidad * item.precio)-(item.cantidad * item.costo);
      if(item.descuento>0){
        item.total = (item.cantidad * p);                                                 console.log(item.total);//UPDATE 20160719
        item.total = item.total - item.descuento;                                         console.log(item.total);//UPDATE 20160719
      }else{
        item.total = (item.cantidad * p);                                                 console.log(item.total);//UPDATE 20160719
      }
      if(item.codigo_proovedor=="DESCUENTO"){
        $scope.subTotal -= item.total;                                                    console.log($scope.subTotal);
      }else{
        $scope.subTotal += item.total;                                                    console.log($scope.subTotal);
      }
      if($scope.cotizacion.compra=="EXTRANJEROS"||$scope.cotizacion.compra=="EXTRANJERO"){
          $scope.ivaT  = 0;                                                               console.log("EXTRANJEROS");
      }else{
        $scope.ivaT  = $scope.subTotal*0.16;                                              console.log("NACIONAL");
      }
      $scope.totales = ($scope.subTotal+$scope.ivaT);                                     console.log($scope.totales);
      $scope.letras=$scope.NumeroALetras($scope.totales,$scope.moneda_destino);
    } 
  }

  $scope.delet=function(j,objeto){
    if($scope.procesar=="COMPRA"){
          var precio=parseFloat(objeto.costos)*objeto.cantidad;                           console.log(precio);
        }else{
          var precio=parseFloat(objeto.precio)*objeto.cantidad;                           console.log(precio);
        }                                                                 
        $scope.subTotal=$scope.subTotal-precio;       
        var ivad  = precio*0.16;                                                          console.log(ivad);
        $scope.ivaT  =$scope.ivaT - ivad;                                                 console.log(precio);
        var menosTotal=parseFloat(precio) + parseFloat(ivad);                             console.log(menosTotal);
        $scope.totales=$scope.totales-menosTotal;
        $scope.letras=$scope.NumeroALetras($scope.totales,$scope.moneda_destino);
        $scope.insumos.splice(j,1);
  }

  $scope.remover=function(j,objeto){                                                      console.log(objeto.id_prestamo);console.log($scope.procesar);
    if(confirm("¿ DESEA ELIMINAR EL INSUMO DE LA LISTA?")){
      if($scope.id==undefined){                                                           console.warn("CREATE LINEAS DELETE");
        $scope.delet(j,objeto);
      }else{                                                                              console.warn("UPDATE LINEAS DELETE");
        if(objeto.id_insumo_prestamo){
         prestamoSrc.get({id:objeto.id_prestamo,codigo_proovedor:objeto.codigo_proovedor,v:2},function(d){                 console.log(d);console.log("VALIDA SI ES DIFERENTE DE PRESTAMO");
            if(d.msg.length>0){
              alert(d.msg[0]);
            }else{
            prestamoSrc.get({id:objeto.id_insumo_prestamo,v:3,objeto:objeto},function(d){                 console.log(d);
                $scope.delet(j,objeto);
                alert(d.msg);
              },function(e){                                                                  console.log(e);
                if(e.status=='200'){
                  var msg='';
                  angular.forEach(e.data,function(value, key){
                    msg=msg+','+value;
                  });
                  alert(msg);
                }else if(e.status=='204'){
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
          });
        }else{
          $scope.delet(j,objeto);
        }
      }
    }else{
      alert("¡ Accion Cancelada !");
    }
  }

  $scope.getPreciosConversion=function(precio,moneda_origen,moneda_destino,etiqueta){//$scope.convertirP = function(i,precio,etiqueta,costo,tipo_cambio){      console.log(moneda_origen(precio); // console.log(precio); // console.log(moneda_origen); // console.log(moneda_destino); // console.log(etiqueta);
    $scope.preciosMultiples=[];//var precio=[];
    if(moneda_destino=="USD"){
      if(moneda_origen=="JPY"){
        conversionSrc.get({currency_id_from:113,currency_id_to:130},function(data){  //JPY TO MXN
          var fecha_cambio=data.conversiones[0].validto;                                                    console.log(data.conversiones[0].validto);//  alert("!! Se cotizara el tipo de cambio JPY a USD con fecha de actualización: "+fecha_cambio+ " ¡¡");
          var multiplyrate=data.conversiones[0].multiplyrate;                                               console.log(multiplyrate);
          var precio1=precio*$scope.multiplyrate;                                                           console.log(precio1);
          conversionSrc.get({currency_id_from:130,currency_id_to:100},function(data){ // MXN TO USD
            var multiplyrate1=data.conversiones[1].multiplyrate;                                            console.log(multiplyrate1);
            var pre=precio1*multiplyrate1; 
            if(etiqueta!=""){                                                               
              $scope.preciosMultiples.push({
                etiqueta:etiqueta,
                monto:pre
              });
            }else{                                                                                          console.log("1 precio");
              $scope.precioVenta=pre;                                                                       console.log(pre);
            }
          });
        });                                                                                                 console.log("CONVERTIR JPY A USD");
      }
      if(moneda_origen=="EUR"){
        conversionSrc.get({currency_id_from:102,currency_id_to:130},function(data){
          var fecha_cambio=data.conversiones[0].validto;                                                    console.log(data.conversiones[0].validto);// alert("!! Se cotizara el tipo de cambio EUR a USD con fecha de actualización: "+fecha_cambio+ " ¡¡");
          var multiplyrate=data.conversiones[0].multiplyrate;                                               console.log(multiplyrate);
          var precio1=precio*$scope.multiplyrate;                                                           console.log(precio1);
          conversionSrc.get({currency_id_from:130,currency_id_to:100},function(data){
            var multiplyrate1=data.conversiones[1].multiplyrate;                                            console.log(multiplyrate1);
            var pre=precio1*multiplyrate1;  
            if(etiqueta!=""){                                                               
              $scope.preciosMultiples.push({
                etiqueta:etiqueta,
                monto:pre
              });
            }else{                                                                                          console.log("1 precio");
              $scope.precioVenta=pre;                                                                       console.log(pre);
            }
          });
        });                                                                                                 console.log("CONVERTIR EUR A USD");
      }
      if(moneda_origen=="MXN"){$scope.progress=true;
        conversionSrc.get({currency_id_from:130,currency_id_to:100},function(data){
          var fecha_cambio=data.conversiones[0].validto;                                             console.log(data.conversiones[0].validto);// alert("!! Se cotizara el tipo de cambio MXN a USD con fecha de actualización: "+fecha_cambio+ " ¡¡");
          var multiplyrate1=data.conversiones[0].multiplyrate;                                         console.log(multiplyrate1);
          var pre=precio*multiplyrate1;  
          if(etiqueta!=""){                                                               
            $scope.preciosMultiples.push({etiqueta:etiqueta,monto:pre});
          }else{                                                                                      console.log("1 precio");
            $scope.precioVenta=pre;                                                                     console.log(pre);
          }   
          if(data.msg=="Success"){
            $scope.progress=false;
          }                                                                                                       console.log(preciosMultiples);
        });                                                                                  console.log("CONVERSION MXN A USD");
      }
      if(moneda_origen=="USD"){                                                                              console.log("NO ES NECESARIA LA CONVERSION A DOLARES");                                // console.log(precio); console.log(etiqueta); console.log(i); 
        if(etiqueta!=""){                                                                                           console.log("Multiples precios");                                                                                 
        }else{                                                                                      console.log("1 precio");
          $scope.precioVenta=precio;                                                                console.log(precio);
        }
      }
    }else if(moneda_destino=="MXN"){
      if(moneda_origen=="JPY"){
        conversionSrc.get({currency_id_from:113,currency_id_to:130},function(data){
          $scope.fecha_cambio=data.conversiones[0].validto;                                         console.log(data.conversiones[0].validto);//alert("!! Se cotizara el tipo de cambio JPY a MXN con fecha de actualización: "+$scope.fecha_cambio+ " ¡¡");
          var multiplyrate1=data.conversiones[0].multiplyrate;                                        console.log(multiplyrate1);
          var pre=precio*$scope.multiplyrate1;                                                       console.log(precio);
          if(etiqueta!=""){                                                               
            $scope.preciosMultiples.push({
              etiqueta:etiqueta,
              monto:pre
            });
          }else{                                                                                   console.log("1 precio");
            $scope.precioVenta=pre;                                                                     console.log(pre);
          }
        });                                                                                           console.log("CONVERSION JPY A PESOS");
      }
      if(moneda_origen=="EUR"){
        conversionSrc.get({currency_id_from:102,currency_id_to:130},function(data){
          var fecha_cambio=data.conversiones[0].validto;                                          console.log(data.conversiones[0].validto);//  alert("!! Se cotizara el tipo de cambio EUR a MXN con fecha de actualización: "+fecha_cambio+ " ¡¡");
          var multiplyrate1=data.conversiones[0].multiplyrate;                                        console.log(multiplyrate1);
          var pre=precio*multiplyrate1;                                                               console.log(pre);
          if(etiqueta!=""){                                                               
            $scope.preciosMultiples.push({
              etiqueta:etiqueta,
              monto:pre
            });
          }else{                                                                                   console.log("1 precio");
            $scope.precioVenta=pre; console.log(pre);
          }
        });                                                                                           console.log("CONVERSION EUR A PESOS");
      }
      if(moneda_origen=="USD"){
        $scope.progress=true;                                                                       console.log("CONVERSION USD A PESOS");
        conversionSrc.get({currency_id_from:100,currency_id_to:130},function(data){                               console.log(data);console.log(precio);
          var fecha_cambio=data.conversiones[0].validto;                                            console.log(data.conversiones[0].validto);//  //   alert("!! Se cotizara el tipo de cambio USD a MXN con fecha de actualización: "+fecha_cambio+ " ¡¡");
          var multiplyrate1=data.conversiones[0].multiplyrate;                                        console.log(multiplyrate1);
          var pre=precio*multiplyrate1;                                                               console.log(pre);                                                
          if(etiqueta!=""){                                                               
            $scope.preciosMultiples.push({
              etiqueta:etiqueta,
              monto:pre
            });
          }else{                                                                                   console.log("1 precio");
            $scope.precioVenta=pre;                                                                     console.log(pre);
          }                                                                                           console.log($scope.preciosMultiples);
          if(data.msg=="Success"){
            $scope.progress=false;
          }            
        });                                                                                              //console.log("CONVERSION USD A PESOS");
      }
      if(moneda_origen=="MXN"){
        if(etiqueta!=""){                                                                             console.log("Multiples precios");                                                         
        }else{                                                                                        console.log("1 precio");
          $scope.precioVenta=precio;                                                                  console.log(precio);
        }                                                                                             console.log("CONVERSION A PESOS");
      }
    }  //fin de ELSE//return 
  }//fin function getPreciosMultiples
  /* --------------------------------------------------- CONDICIONES PAGO --------------------------------- */

$scope.getOrganizaciones=function(){$scope.progress=true;
  orgVsrc.get({name:"*"},function(data){
    $scope.organizaciones=data.objetos;                                                                       //    console.log(data);
    if(data.msg=="Success"){
            $scope.progress=false;
          }
  });
}

$scope.condicion_tiempo_pago=function(tipo){
  var i=0;
  $scope.time=[];
  condicionPagoTiempoSrc.get({name:"*"},function(data){
    $scope.tiempos_pago=data.condiciones_pago_tiempo;                   console.info($scope.tiempos_pago.length);
    if($scope.tiempos_pago.length>0){                                   console.info($scope.tiempos_pago.length+"2");
      while(i<$scope.tiempos_pago.length){
        if(tipo=="PUE"){
          if($scope.tiempos_pago[i].name=="000 INMEDIATO" || $scope.tiempos_pago[i].name=="CONTADO CONTRA ENTREGA"){
            $scope.time.push({
                name:$scope.tiempos_pago[i].name,             
                c_paymentterm_id:$scope.tiempos_pago[i].c_paymentterm_id,
              });
          }
        }
        if(tipo=="PPD"){
          if($scope.tiempos_pago[i].name=="007 DIAS" || $scope.tiempos_pago[i].name=="014 DIAS" || $scope.tiempos_pago[i].name=="015 DIAS" || $scope.tiempos_pago[i].name=="021 DIAS" || $scope.tiempos_pago[i].name=="030 DIAS" || $scope.tiempos_pago[i].name=="045 DIAS" || $scope.tiempos_pago[i].name=="060 DIAS" || $scope.tiempos_pago[i].name=="090 DIAS" || $scope.tiempos_pago[i].name=="120 DIAS" || $scope.tiempos_pago[i].name=="150 DIAS" || $scope.tiempos_pago[i].name=="180 DIAS" || $scope.tiempos_pago[i].name=="CREDIT LINE" || $scope.tiempos_pago[i].name=="WARRANTY" ){
            $scope.time.push({
                name:$scope.tiempos_pago[i].name,             
                c_paymentterm_id:$scope.tiempos_pago[i].c_paymentterm_id,
              });
          }
        }
        i++;
      }
    }                                                                                         //  console.log(data);
  });
}

$scope.categoria_producto=function(name){                                                      //alert("FACTURACION CONDICIONES");
  categoriaProductoSrc.get({name:name,isactive:"Y"},function(data){
    $scope.categorias=data.categoriaProductos;                                              console.log(data);   //ok    //console.info($scope.condiciones_facturacion.length);
  });
}

$scope.setCategoria_producto=function(name){                                                      //alert("FACTURACION CONDICIONES");
  categoriaProductoSrc.get({name:name,isactive:"Y"},function(data){
    $scope.categoria=data.categoriaProductos[0].m_product_category_id;                      console.log(data);   //ok    //console.info($scope.condiciones_facturacion.length);
  });
}

$scope.condicion_factura=function(tipo){                                                      //alert("FACTURACION CONDICIONES");
  $scope.tipo_fact=true;
  var i=0;
  $scope.facturacion=[];
  condicionFacturaSrc.get({valor:"*"},function(data){
    $scope.condiciones_facturacion=data.condiciones_facturacion[0].valor;                      console.log(data);   //ok    //console.info($scope.condiciones_facturacion.length);
    if($scope.condiciones_facturacion.length>0){
      $scope.facturacion=data.condiciones_facturacion;                                          //console.log(data); ok console.info($scope.facturacion);
    }
  });
}

$scope.nofacturar=function(valor){
  if(valor=="N"){
    $scope.cotizacion.metodo_pago="B977AEB114BD41A19512A396DDD4D1BA";
    if($scope.tipo_facturacion=="PUE"){
      $scope.cotizacion.id_condicion_pago_tiempo="E5C96060FA224800A689025EEA6FF049";
    }else if($scope.tipo_facturacion=="PPD"){
      $scope.cotizacion.id_condicion_pago_tiempo="E9AB723DE2744F3791F10C71F9F5FDD1";
    }
  }
}

$scope.metodo_pago=function(tipo){                                                             //alert("METODO DE PAGO");
  var i=0;
  $scope.pay=[];
  metodoPagoSrc.get({fin_paymentmethod_id:"*"},function(data){
    $scope.metodos_pagos=data.metodos_pago;
    if($scope.metodos_pagos.length>0){                                                            console.info($scope.metodos_pagos.length+"2");
      while(i<$scope.metodos_pagos.length){
        if(tipo=="PUE"){
          if($scope.metodos_pagos[i].name=="CHEQUE NOMINATIVO" || $scope.metodos_pagos[i].name=="EFECTIVO" || $scope.metodos_pagos[i].name=="TARJETAS DE CREDITO" || $scope.metodos_pagos[i].name=="TRANSFERENCIA ELECTRONICA DE FONDO"){
            $scope.pay.push({
                name:$scope.metodos_pagos[i].name,             
                fin_paymentmethod_id:$scope.metodos_pagos[i].fin_paymentmethod_id,
              });
          }
        }
        if(tipo=="PPD"){
          if($scope.metodos_pagos[i].name=="POR DEFINIR" || $scope.metodos_pagos[i].name=="CHEQUE NOMINATIVO" || $scope.metodos_pagos[i].name=="EFECTIVO" || $scope.metodos_pagos[i].name=="TARJETAS DE CREDITO" || $scope.metodos_pagos[i].name=="TRANSFERENCIA ELECTRONICA DE FONDO"){
            $scope.pay.push({
                name:$scope.metodos_pagos[i].name,             
                fin_paymentmethod_id:$scope.metodos_pagos[i].fin_paymentmethod_id,
              });
          }
          if($scope.n=="NUEVO"){
            $scope.cotizacion.metodo_pago='5EA3C77CB5B847F2AC81B8AF676A69A5';
          }/*else{
            $scope.cotizacion.metodo_pago='';
          }*/
        }
        i++;
      }                                                                                       console.info($scope.facturacion);
    }
});
}

$scope.condiciones_consumibles=function(){                                                    //console.log($scope.agente);
$scope.mensaje_atencion="CON RELACION A SU SOLICITUD NOS PERMITIMOS PRESENTAR LA SIGUIENTE INFORMACIÓN.";
$scope.nota="FAVOR DE ENVIAR SU PEDIDO, COMPROBANTE DE PAGO Y DATOS FISCALES PARA SU FACTURACION CORRESPONDIENTE AL CORREO "+$scope.email;
$scope.tiempo_entrega="1-2 DIAS HABILES A PARTIR DE LA FECHA EN QUE SE REALICE SU PEDIDO Y SE CONFIRME SU PAGO. \nENTREGA INMEDIATA";
$scope.pago="DEPOSITO O TRANSFERENCIA DEL 100% A FAVOR DE SUMINISTRO PARA USO MEDICO Y HOSPITALARIO S.A. DE C.V.\n30 DIAS DE CREDITO. ";
$scope.validez="ESTA COTIZACION TIENE VIGENCIA DE 15 (QUINCE) DIAS A PARTIR DE LA FECHA EN QUE LA RECIBA.\nESTA COTIZACION TIENE VIGENCIA HASTA NUEVO AVISO POR ESCRITO.";
}

$scope.condiciones_ventas=function(){
}

$scope.condiciones_servicio=function(){ 
$scope.mensaje_atencion="CON RELACION A SU SOLICITUD NOS PERMITIMOS PRESENTAR LA SIGUIENTE INFORMACIÓN.";
$scope.nota="FAVOR DE ENVIAR AL CORREO ELECTRONICO "+$scope.email+" SUS DATOS FISCALES PARA GENERARLE UN NUMERO DE REFERENCIA Y PROPORCIONARLE EL NÚMERO DE CUENTA PARA EL DEPOSITO.\nPARA CUALQUIER DUDA O ACLARACIÓN COMUNICARSE CON LA SRTA. LLUVIA RENDON AL TELEFONO 0155-5687-6166, 64, 75.";
$scope.tiempo_entrega="";
$scope.pago="ANTICIPO 100%. \nPRECIOS SUJETOS A CAMBIO SIN PREVIO AVISO.";
$scope.validez="15 DIAS";                                                                     //alert("PAGO"+$scope.pago);
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
  $scope.bPago=function(){$scope.cotizacion.condicion_pago=$scope.pago; }
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
  $scope.paqueteLst =function(busquedaP){                                 //console.log("paqueteLst");console.log(busquedaP);
    paqueteSrc.get(busquedaP,function(data){
      $scope.paquetes=data.paquete;                                       //console.log($scope.paquetes);
    });
  }

$scope.paqueteSeleccionado=function(id_pack){
  if($scope.moneda_destino=="" || $scope.moneda_destino==undefined){
    alert("Se requiere seleccionar un tipo de moneda de venta");
  }else{                                                                  //console.log($scope.moneda_destino);
  if(confirm("¿Desea agregar el paquete seleccionado?")){                 //console.log(id_pack);
  paqueteSrc.get({vista:1,id_pack:id_pack},function(data){
    $scope.seleccionado=data.paquete;                                     //console.log($scope.seleccionado);//console.log($scope.seleccionado.length);
    $scope.cantidad=$scope.seleccionado[0].cantidad;
    $scope.unidad_medida=$scope.seleccionado[0].insumo_unidad_medida;
    $scope.codigo_proovedor=$scope.seleccionado[0].codigo_proovedor;
      var k=0;
            while(k<$scope.seleccionado.length){
              var precio=$scope.seleccionado[k].precio;
              precio=precio.replace(",","");
              $scope.getConvesionMoneda(k,precio,$scope.seleccionado[k].tipo_cambio,$scope.moneda_destino);            //$scope.agregarPaquete(k);
            k++;
          }                                                               //console.log($scope.precioPaquete);
      });
     }else{alert("! ACCION CANCELADA ¡")}
  }
}

  $scope.agregarPaquete=function(){                                         //console.log($scope.seleccionado.length);
  var k=0;
  while(k<$scope.seleccionado.length){
    if($scope.seleccionado[k].bandera_insumo!="N"){
      var cantidad_final=$scope.seleccionado[k].cantidad*$scope.cantidad;
      $scope.insumos.push({
        id:$scope.seleccionado[k].id_equipo,                                          //  stk:$rootScope.primary_qty, 
        id_pack:$scope.seleccionado[k].id_pack,                                       //  stk:$rootScope.primary_qty, 
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
        bandera_insumo:$scope.seleccionado[k].bandera_insumo,                        // total:$scope.seleccionado.total,                        //cotizacion:$scope.coti// done:false,
        });
      }
    k++;
  }
  $scope.vaciarBusqueda();
}
/* --------------------------------------------------- CONVERSION --------------------------------- */
  $scope.getConvesionMoneda=function(i,precio,moneda_origen,moneda_destino){                                //console.log(precio);  console.log(moneda_origen);  console.log(moneda_destino);
    if(moneda_destino=="USD"){
      if(moneda_origen=="JPY"){                                                                             //console.log(precio);
        conversionSrc.get({currency_id_from:113,currency_id_to:130},function(data){                         //JPY TO MXN
          var fecha_cambio=data.conversiones[0].validto;                                                    console.log("!! Se cotizara el tipo de cambio JPY a USD con fecha de actualización: "+fecha_cambio+ " ¡¡");
          var multiplyrate=data.conversiones[0].multiplyrate;                                               //console.log(multiplyrate);
          var precio1=precio*$scope.multiplyrate;                                                           //console.log(precio1);
          conversionSrc.get({currency_id_from:130,currency_id_to:100},function(data){                       // MXN TO USD
            var multiplyrate1=data.conversiones[1].multiplyrate;                                            //console.log(multiplyrate1);
            $scope.precioPaquete[i]=precio1*multiplyrate1;                                                  //console.log(precio);                                     console.log(data.conversiones[0].validto);//console.log($scope.precioPaquete[i]);                      
          });
        });                                                                                                 console.log("CONVERTIR JPY A USD");
      }
      if(moneda_origen=="EUR"){
        conversionSrc.get({currency_id_from:102,currency_id_to:130},function(data){
          var fecha_cambio=data.conversiones[0].validto;                                            console.log(data.conversiones[0].validto);// alert("!! Se cotizara el tipo de cambio EUR a USD con fecha de actualización: "+fecha_cambio+ " ¡¡");
          var multiplyrate=data.conversiones[0].multiplyrate;                                       console.log(multiplyrate);
          var precio1=precio*$scope.multiplyrate;                                                   console.log(precio1);
          conversionSrc.get({currency_id_from:130,currency_id_to:100},function(data){
            var multiplyrate1=data.conversiones[1].multiplyrate;                                    console.log(multiplyrate1);
            $scope.precioPaquete[i]=precio1*multiplyrate1;  
          });
        });                                                                                         console.log("CONVERTIR EUR A USD");
      }
      if(moneda_origen=="MXN"){
        conversionSrc.get({currency_id_from:130,currency_id_to:100},function(data){
          var fecha_cambio=data.conversiones[0].validto;                                            console.log(data.conversiones[0].validto);
          var multiplyrate1=data.conversiones[0].multiplyrate;                                      console.log(multiplyrate1);                                                                                                 console.log(i);
          $scope.precioPaquete[i]=precio*multiplyrate1;                                             console.log($scope.precioPaquete[i]);
          $scope.precioVenta=$filter('number')($scope.precioPaquete[0], 2);
        });                                                                                         console.log("CONVERSION MXN A USD");
      }
      if(moneda_origen=="USD"){                                                                     console.log("NO ES NECESARIA LA CONVERSION A DOLARES");                                 console.log(precio); 
        $scope.precioPaquete[i]=precio; 
        $scope.precioVenta=$filter('number')($scope.precioPaquete[0], 2);
      }
    }else if(moneda_destino=="MXN"){
      if(moneda_origen=="JPY"){
        conversionSrc.get({currency_id_from:113,currency_id_to:130},function(data){
          $scope.fecha_cambio=data.conversiones[0].validto;                                        console.log(data.conversiones[0].validto);//alert("!! Se cotizara el tipo de cambio JPY a MXN con fecha de actualización: "+$scope.fecha_cambio+ " ¡¡");
          var multiplyrate1=data.conversiones[0].multiplyrate;                                     console.log(multiplyrate1);
          $scope.precioPaquete[i]=precio*$scope.multiplyrate1;                                     console.log(precio);
        });                                                                                        console.log("CONVERSION JPY A PESOS");
      }
      if(moneda_origen=="EUR"){
        conversionSrc.get({currency_id_from:102,currency_id_to:130},function(data){
          var fecha_cambio=data.conversiones[0].validto;                                           console.log(data.conversiones[0].validto);//  alert("!! Se cotizara el tipo de cambio EUR a MXN con fecha de actualización: "+fecha_cambio+ " ¡¡");
          var multiplyrate1=data.conversiones[0].multiplyrate;                                     console.log(multiplyrate1);
          $scope.precioPaquete[i]=precio*multiplyrate1;                                            console.log(precio);
        });                                                                                        console.log("CONVERSION EUR A PESOS");
      }
      if(moneda_origen=="USD"){
        conversionSrc.get({currency_id_from:100,currency_id_to:130},function(data){                 console.log(precio);
          var fecha_cambio=data.conversiones[0].validto;                                            console.log(data.conversiones[0].validto);//  //   alert("!! Se cotizara el tipo de cambio USD a MXN con fecha de actualización: "+fecha_cambio+ " ¡¡");
          var multiplyrate1=data.conversiones[0].multiplyrate;                                      console.log(multiplyrate1);
          $scope.precioPaquete[i]=precio*multiplyrate1;                                             console.log(pre);                                                
        });                                                                                         console.log("CONVERSION USD A PESOS");
      }
      if(moneda_origen=="MXN"){console.log(precio);
        $scope.precioPaquete[i]=precio;                                                             console.log("CONVERSION MXN A MXN");
        $scope.precioVenta=$filter('number')($scope.precioPaquete[0], 2);
      }
    }  //fin de ELSE    //return 
  }//fin function getPreciosMultiples
/* ------------------------------------------- ACTUALIZACION COTIZACION--------------------------------*/
/*$scope.confirmar = function(con){
    if(con=="RECHAZADO")//alert("¡ SE CREARA UNA NUEVA VERSION DE LA COTIZACION !");
        alert("¡ SE ACTUALIZARA LA COTIZACIÓN !");
    else
        alert("¡ SE ACTUALIZARA LA COTIZACIÓN !");
  }*/
/* ------------------------------------------- FIN DE ACTUALIZACION COTIZACION--------------------------------*/
  $scope.getCotizacion=function(id){ $scope.habilitarBotonCarrito=true;
    $scope.vaciarBusqueda();
    cotizacionPaqueteInsumoSrc.get({id:id},function(data){                                    console.info(data.cotizacion);
      $scope.getOrganizaciones();
      $scope.cotizacion=data.cotizacion;      
      $scope.procesar=data.cotizacion.cotizacion;                                                //console.warn($scope.cotizacion.org_name);
      if(data.cotizacion.c_bpartner_id==""){
        $scope.habilitarOrganizacion=false;
      }
      if(data.cotizacion.insumos.length>0){                                                     //alert("TIENE PRESTAMO RELACIONADO")
        prestamoSrc.get({id:data.cotizacion.insumos[0].id_prestamo,v:1},function(d){                                   console.log(d);
          $scope.insumosB=d.objeto;                                  console.log($scope.insumosB);
        },function(e){alert('Error: '+e.status+' '+e.data);})
      }
      $scope.contratosBsc(data.cotizacion.nombre_fiscal);
      $scope.setProcesar(data.cotizacion.cotizacion);
      $scope.nc=data.cotizacion.numero_cotizacion;
      $scope.aut=data.cotizacion.auto;
      if($scope.cotizacion.reporte.length>0){
        var s=$scope.cotizacion.equipo.split("SERIE:");
        $scope.serie=s[1];                                                                    console.log(s[1]);
        reportesSrc.get({folio:$scope.cotizacion.reporte,clase:'R'},function(scc){
          $scope.reporte.modelo=scc.objetos[0].modelo;
          $scope.reporte.marca=scc.objetos[0].marca;
          $scope.reporte.equipo=scc.objetos[0].equipo;
          //$scope.numero_serie=scc.objetos[0].numero_serie;
        },function(err){alert('NO SE CONSULTO REPORTE');});
      }
      $scope.tipo_organizacion($scope.cotizacion.org_name);
      $scope.organizacion=$scope.cotizacion.org_name;                                             //console.info($scope.organizacion);
      if($scope.cotizacion.id_condicion_pago_tiempo=="E5C96060FA224800A689025EEA6FF049"||$scope.cotizacion.id_condicion_pago_tiempo=="2667956E7769457EA894895C5BD8068F"){
        $scope.tipo_facturacion="PUE";
      }else{
        $scope.tipo_facturacion="PPD";
      }
      $scope.condicion_factura($scope.tipo_facturacion);
      $scope.metodo_pago($scope.tipo_facturacion);
      $scope.condicion_tiempo_pago($scope.tipo_facturacion);
      $scope.numero_cotizacion=$scope.cotizacion.numero_cotizacion;
      $scope.moneda_destino=$scope.cotizacion.tipo_moneda;
      $scope.cotInsumo=data.cotizacion.insumos;                                                   //console.log($scope.insumos);
      $scope.cotizacion.c_location_id_fiscal=data.cotizacion.c_location_id;                       //console.log(data.cotizacion.usuario);//console.log(data.cotizacion.c_location_id);
      if($scope.area=="SERVICIO TECNICO"){
        if($scope.cotizacion.usuario=='ENRIQUE CERVANTES MALFAVON'||$scope.cotizacion.usuario=='LIZBETH ORTIZ MAULEON'){
          $scope.usuario=$scope.cotizacion.usuario;
        }  
        if($scope.cotizacion.estatus=="GUARDADO" && $scope.puesto=="COORDINADOR DE SERVICIOS" ){
          $scope.cotizacion.estatus="GUARDADO";                                                     console.log("COORDINADOR");
        }else if($scope.cotizacion.estatus=="SOLICITUD"){
          $scope.cotizacion.estatus="SOLICITUD";                                                    //console.log("AISSTENTE DIRECCION");//console.log($scope.cotizacion.version);
        }
      }else{
        if($scope.cotizacion.estatus=="GUARDADO"){
          $scope.cotizacion.version=$scope.cotizacion.version;                                      //console.log($scope.cotizacion.version);
        }
        if($scope.cotizacion.estatus=="RECHAZADO"){
          $scope.cotizacion.estatus="GUARDADO";                                                     //console.log($scope.cotizacion.version);
          $scope.buscarVersion($scope.cotizacion.id);
        }
      }
      var i=0;
      while(i< $scope.cotInsumo.length){
      var x="";
        $scope.insumos.push({
          id:$scope.cotInsumo[i].id_insumo,                                                       //  stk:$rootScope.primary_qty, 
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
          descuento:$scope.cotInsumo[i].descuento,                       
          m_product_category_id:$scope.cotInsumo[i].m_product_category_id,                        //cotizacion:$scope.coti// done:false,
          id_insumo_prestamo:$scope.cotInsumo[i].id_insumo_prestamo,                        //cotizacion:$scope.coti// done:false,
          id_prestamo:$scope.cotInsumo[i].id_prestamo,                                      //cotizacion:$scope.coti// done:false,
          id_cotizacion:$scope.cotInsumo[i].id,                                      //id_cotizacion_paquete_insumo,
        });
        i++;                                                        //console.log(i);
      }//while
    });
  }//fin getcotizacion

$scope.fechaEntrega = function(bandera,marca){                                  //if((bandera.trim() === "E" || bandera.trim()==="EQUIPO") || (bandera.trim() === "C" || bandera.trim()==="CONSUMIBLES")){                          //console.log($rootScope.bandera_insumo);
if((bandera.trim() === "E" || bandera.trim()==="EQUIPO")){                      //console.log($rootScope.bandera_insumo);
  marcaProveedorSrc.get({marca_representada:"*"+marca+"*"},function(data){      //console.log(data.marcas_proveedores.data[0].dias_entrega_maximo);
  $scope.dia = data.marcas_proveedores.data[0];                                 //.dias_entrega_maximo;      //console.log($scope.dia); 
    if($scope.dia != undefined || $scope.dia != null || $scope.dia != ""){    
      $scope.diaMaximo = data.marcas_proveedores.data[0].dias_entrega_maximo;   //console.log($scope.diaMaximo);
        if($scope.diaMaximo>$scope.mayor){
          $scope.mayor=$scope.diaMaximo;
          $scope.cotizacion.fecha_entrega = $scope.sumaFecha($scope.mayor,5);   //alert($rootScope.fecha_entrega);
        }else{                                                                  console.log("es menor");          }
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
 var dia= fecha.getDate();// var meses = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
 mes = (mes < 10) ? ("0" + mes) : mes;
 dia = (dia < 10) ? ("0" + dia) : dia;
 var fechaFinal = dia+sep+mes+sep+anno;
 return (fechaFinal);
 }

 $scope.setSerie=function(ns){
  $scope.cotizacion.equipo="EQUIPO: "+$scope.reporte.equipo+" MARCA: "+$scope.reporte.marca+" MODELO: "+$scope.reporte.modelo+" SERIE: "+ns;
 }

 $scope.setProcesar=function(p){                        //alert(p);
  $scope.procesar=p;      //alert($scope.procesar);
  if($scope.area=="SERVICIO TECNICO"){                console.info("ST");
    if($scope.puesto!="COORDINADOR DE SERVICIOS"){    console.info("ASISTENTE Y GERENTE");
      if(p=="COMPRA"){                                console.info("COMPRA");
        $scope.editar_precios_servicio=true;         //disabled
        $scope.ver_precios_servicio=true;             //ver precios       //$scope.ver_costos_servicio=true;
        $scope.ver_costo=true;
        $scope.ver_precio=true;                       //hide
      }else if(p=="VENTA Y COMPRA"){                  console.info("VENTA Y COMPRA");
        $scope.editar_precios_servicio=false;         //disabled
        $scope.ver_precios_servicio=true;             //ver precios
        $scope.ver_costo=true;
        $scope.ver_precio=false;                      //hide
      }else{                                        console.info("VENTA Y COTIZACION");
        $scope.editar_precios_servicio=true;        
        $scope.ver_precios_servicio=true;           //$scope.ver_costos_servicio=false;
        $scope.ver_costo=false;
        $scope.ver_precio=false;                    //hide
      }
    }else{                                          console.info("COORDINADOR Y INGENIERO");
      if(p=="COMPRA" || p=="VENTA Y COMPRA"){       console.info("COMPRA");
        $scope.editar_precios_servicio=false;
        $scope.ver_precios_servicio=false;          //$scope.ver_costos_servicio=true;
        $scope.ver_costo=false;
        $scope.ver_precio=true;
      }else{                                        console.info("VENTA Y COTIZACION");
        $scope.editar_precios_servicio=false;
        $scope.ver_precios_servicio=false;
        $scope.ver_costo=false;
        $scope.ver_precio=true;
      }
    }
  }else{                                            console.info("COMERCIAL");
    $scope.ver_costo=false;
    $scope.ver_precios_servicio=true;
  }
}

//---------------------------------------------------------------------------------------------------------------------//
$scope.getReporte=function(){                                                                 console.info("CREAR COTIZACION DESDE REPORTE");//console.log($scope.reporte.c_location_id);
    //$scope.ver_procesar=true;
  if($scope.reporte.c_bpartner_location==""|| $scope.reporte.c_bpartner_location==undefined){
    alert("FAVOR DE BUSCAR NOMBRE FISCAL");
    $scope.cotizacion.org_name=$scope.reporte.organizacion;
    $scope.cotizacion.nombre_fiscal=$scope.reporte.nombre_fiscal;
    $scope.cotizacion.no_contrato=$scope.reporte.folio_contrato;                              //console.warn($scope.reporte);
    $scope.organizacion=$scope.reporte.organizacion;                                        /*if($scope.cotizacion.no_contrato!=''){      $scope.condicion_factura='N';      $scope.cotizacion.id_condicion_factura='N';    }*/
    $scope.tipo_organizacion($scope.organizacion);
  }else{                                                                                    //console.log($scope.reporte.rfc);
    if($scope.cotizacion.no_contrato!=''){
      $scope.condicion_factura='N';
      $scope.cotizacion.id_condicion_factura='N';
    }                                                                                       /*$scope.equipo=$scope.reporte.equipo;    $scope.marca=$scope.reporte.marca;    $scope.modelo=$scope.reporte.modelo;*/
    if($scope.reporte.clase=="F"){                                                          console.warn($scope.reporte);
      $scope.cotizacion.venta=$scope.reporte.folio;
      $scope.cotizacion.venta_compra=$scope.reporte.id;
      $scope.cotizacion.compra=$scope.reporte.numero_exterior;
      $scope.prestamo="PRESTAMO NO: ";                                                      console.warn($scope.reporte.id);
      reportesSrc.get({id:$scope.reporte.id_foraneo},function(d){                                   console.log(d);
          $scope.cotizacion.reporte=d.objeto.folio;                                         //alert("reporte: "+$scope.cotizacion.reporte);console.log($scope.insumosB);
          $scope.cotizacion.compra=d.objeto.nota;                                         //alert("reporte: "+$scope.cotizacion.reporte);console.log($scope.insumosB);
        });
      prestamoSrc.get({id:$scope.reporte.id,v:1},function(d){                                   console.log(d);
          $scope.insumosB=d.objeto;                                  console.log($scope.insumosB);
        },function(e){alert('Error: '+e.status+' '+e.data);})                                             // CAMPO venta=folio de prestamo
    }else{
      $scope.cotizacion.reporte=$scope.reporte.folio;
    }
    $scope.serie=$scope.reporte.numero_serie;
    $scope.cotizacion.equipo="EQUIPO: "+$scope.reporte.equipo+" MARCA: "+$scope.reporte.marca+" MODELO: "+$scope.reporte.modelo+" SERIE: "+$scope.serie;
  $scope.organizacion=$scope.reporte.organizacion;
  $scope.tipo_organizacion($scope.organizacion);
  $scope.contratosBsc($scope.reporte.nombre_fiscal);
  $scope.cotizacion.org_name=$scope.reporte.organizacion;
  $scope.cotizacion.id_metodo_envio = $scope.reporte.id_cliente; 
  $scope.cotizacion.c_location_id_fiscal = $scope.reporte.c_bpartner_location; 
  $scope.cotizacion.rfc=$scope.reporte.rfc;
  $scope.cotizacion.nombre_fiscal=$scope.reporte.nombre_fiscal;
  $scope.cotizacion.nombre_cliente=$scope.reporte.nombre_cliente;
  $scope.cotizacion.no_contrato=$scope.reporte.folio_contrato;
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
  $scope.cotizacion.compra=$scope.reporte.nota;         //ADD GROUP NAME
  }
}
//---------------------------------------------------------------------------------------------------------------------//
})
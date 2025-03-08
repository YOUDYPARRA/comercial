function InsumoFnCtrl($scope,$rootScope,$controller,$filter,$timeout,insumosSrc,cotizacionPaqueteInsumoSrc,cotizacionSrc,componenteSrc,insumoOpcionalSrc,$log,insumoOpcionalConsultarSrc,marcaProveedorSrc,paquetesSrc,paqueteSrc,conversionSrc){
$scope.todos1=[];
$scope.todos2=[];
$scope.todos=[];
$scope.precio=[];
$scope.costo=[];
$scope.preciosMultiples=[];
$scope.mayor=0;
$scope.iva=0.16;
$scope.subTotal = 0;
$scope.ivaT=0;
$scope.totales1= 0;
$scope.totales= 0.00;
$scope.us=""; 
$scope.area=""; 
//$scope.habilitarPrecio=true;
$scope.precioModificable=0;
//$rootScope.habilitarServicio=true;
$rootScope.habilitarBoton=true;
//$rootScope.habilitarFecha=true;
//$rootScope.habilitarCondicion=true;
$scope.preciosM=[];
var i=0;
var j=0;
var y=0;
$scope.j=0;
$scope.j1=0;
$scope.j2=[];
//$scope.ola="olajusto";
$scope.insumosOpcionales={
	'id_pertenece':"",
	'id_componente':""
}
$scope.busquedaC=
    { 
    'vista':1,
    'tipo_equipo':"",
    'codigo_proovedor':"",
    'modelo':"",
    'descripcion':"",
    'marca':""
    }

$scope.insumoElegido={
	'id':'',
	'bandera_insumo':'',
	'codigo_proovedor':'',
	'descripcion':'',
     'precio':'',
     'costo':'',
     'tipo_cambio':'',
     'modelo':'',
     'caracteristicas':'',
     'especificaciones':'',
     'unidad_medida':'',
     'estado':'',
     'tipo_equipo':'', 
      'coti':'',
      'marca':'',
      'categoria1':'',
      'categoria2':'',
      'categoria3':''
}

$scope.condicion_cotizacion=  
  {
    'precio':"",
    'tiempo_entrega':"",
    'condicion_pago':"",
    'guia_mecanica_salvaguarda_instalacion':"",
    'garantia':"",
    'capacitacion':"",
    'validez':"",   
    'anticipo':""
  };

  $scope.s_condicion_cotizacion={'capacitacion':'','validez':'','anticipo':'','reporte':''}

 angular.extend(this,$controller('NumeroAletraCtrl',{$scope:$scope}));
 angular.extend(this,$controller('terceroCtrl',{$scope:$scope}));
 angular.extend(this,$controller('direccionesLst',{$scope:$scope}));
 angular.extend(this,$controller('direccionesFis',{$scope:$scope}));
 angular.extend(this,$controller('contactosLst',{$scope:$scope}));

$timeout(function() {
 			componenteSrc.get({agrupar:"linea"},function(data){			console.log(data);
            	$scope.componentes=data['componentes'];		console.log($scope.componentes);
             // if(data.componentes === "Unauthorized.") {alert("FAVOR DE VERIFICAR SU INICIO DE SESSION");}
             if($scope.area==="COMERCIAL" || $scope.us==="NORMA ANGELICA SILVEYRA ALCANTARA"){ console.log($scope.habilitarFecha);console.log($scope.area);
              $rootScope.habilitarFecha=false;
              $scope.habilitarCondicion=true;
              //$rootScope.habilitarServicio=false;
              $scope.habilitarPrecio=false;
              $rootScope.verServicio=false;
              $rootScope.verComercial=true;
              $rootScope.verComercialyServicio=false;
             }//console.log($scope.area);
            else if($scope.area==="SERVICIO TECNICO"){ console.log($rootScope.habilitarFecha);
              console.log($rootScope.habilitarCondicion);
              $scope.habilitarPrecio=true;
              $rootScope.habilitarFecha=false;
              $rootScope.habilitarCondicion=true;
              $rootScope.habilitarServicio=true;

              $rootScope.verServicio=true;
              $rootScope.verComercial=false;
              $rootScope.verComercialyServicio=false;
               console.log($rootScope.habilitarFecha);
             }
             else{
              console.log("ELSE");
             }

            });
        }, 1000);

 $scope.goCats = true;

 $scope.alerta = function(text) {
  alert(text);
}

 $scope.buscarVersion=function(idc){ console.log(idc); 
          cotizacionSrc.get({vi:0,id:idc},function(data){
            $scope.version=data.version;console.log(data.version);
            $scope.estatus="GUARDADO";
            $rootScope.habilitarBoton=false;
          },function(err){alert('ERROR EN SERVIDOR.');});
  }

  $scope.confirmar = function(con){
    if(con=="RECHAZADO")
      alert("¡ SE CREARA UNA NUEVA VERSION DE LA COTIZACION !");
    else
        alert("¡ SE ACTUALIZARA LA COTIZACIÓN !");
  }

 $scope.getCotizacion=function(iid){                     console.log(iid);
        $rootScope.cotExx=iid;
        cotizacionPaqueteInsumoSrc.get({id:iid},function(data){
          $scope.cot=data['cotizacion'];                        console.log($scope.cot);
          $scope.cotInsumo=$scope.cot['insumos'];               console.log($scope.cotInsumo);console.log($scope.cotInsumo.length);
            while(i< $scope.cotInsumo.length){                                                        console.log($scope.cotInsumo[0].bandera_insumo);
              //$scope.j=0;
              $scope.todos1.push({
                ide:$scope.cotInsumo[i].id_insumo,                      //  stk:$rootScope.primary_qty, 
                cantidad:$scope.cotInsumo[i].cantidad,
                codigo:$scope.cotInsumo[i].codigo_proovedor,
                modelo:$scope.cotInsumo[i].modelo,
                marca:$scope.cotInsumo[i].marca,
                descripcion:$scope.cotInsumo[i].descripcion,
                caracteristicas:$scope.cotInsumo[i].caracteristicas,
                especificaciones:$scope.cotInsumo[i].especificaciones,
                costo:$scope.cotInsumo[i].costos,
                unidad_compra:$scope.cotInsumo[i].unidad_compra,
                costo_moneda:$scope.cotInsumo[i].costo_moneda,
                precio:$scope.cotInsumo[i].precio,
                tipo_equipo:$scope.cotInsumo[i].tipo_equipo,
                tipo_cambio:$scope.cotInsumo[i].tipo_cambio,            //tipo_cambio:$rootScope.tipo_cambio,
                bandera_insumo:$scope.cotInsumo[i].bandera_insumo,
                total:$scope.cotInsumo[i].total,                        //cotizacion:$scope.coti// done:false,
            });
              i++; console.log(i);
          }
          console.log($scope.todos1);
           var cotizacion=$scope.cot.numero_cotizacion;
           cotizacion=cotizacion.split('-');
              $scope.iniciales=cotizacion[0];         console.log(cotizacion[0]);
              /*if($scope.iniciales=="EAML"){console.log($scope.iniciales)
                $scope.habilitarPrecio=false;
                $rootScope.habilitarCondicion=true;
                $scope.habilitarFecha=false;
              }*/
              $scope.estatus=$scope.cot.estatus; console.log($scope.cot.estatus);
              if($scope.estatus=="GUARDADO"){
                $scope.version=$scope.cot.version; console.log($scope.version);
              }else if($scope.estatus=="RECHAZADO"){
                $scope.estatus="GUARDADO";
                $scope.buscarVersion($scope.cot.id);
              }
              $scope.centro=cotizacion[1];            console.log(cotizacion[1]);
              $scope.fec=cotizacion[2];               console.log(cotizacion[2]);
              $scope.ultimo=cotizacion[3];            console.log(cotizacion[3]);
              $scope.id=$scope.cot['id'];
              $scope.c_bpartner_id=$scope.cot['c_bpartner_id'];   console.log($scope.cot['c_bpartner_id']);
              $scope.fecha=$scope.cot['fecha'];
              $scope.tipo_cliente=$scope.cot['tipo_cliente'];
              $scope.fiscal=$scope.cot['nombre_fiscal'];
              $scope.dfiscal=$scope.cot['calle_entrega'];
              $scope.rfc_fiscal=$scope.cot['rfc'];
              $scope.fecha_entrega=$scope.cot['fecha_entrega'];
              $scope.nFiscal=$scope.cot['nombre_cliente'];
              $scope.dFiscal=$scope.cot['calle_fiscal'];
              $scope.calle_fiscal=$scope.cot['calle_fiscal'];
              $scope.colonia_fiscal=$scope.cot['colonia_fiscal'];
              $scope.codigo_postal_fiscal=$scope.cot['codigo_postal_fiscal'];
              $scope.ciudad_fiscal=$scope.cot['ciudad_fiscal'];
              $scope.estado_fiscal=$scope.cot['estado_fiscal'];
              $scope.pais_fiscal=$scope.cot['pais_fiscal'];
              $scope.calle=$scope.cot['calle_entrega'];
              $scope.colonia_entrega=$scope.cot['colonia_entrega'];
              $scope.codigo_postal_entrega=$scope.cot['codigo_postal_entrega'];
              $scope.ciudad_entrega=$scope.cot['ciudad_entrega'];
              $scope.pais_entrega=$scope.cot['pais_entrega'];
              $scope.estado_entrega=$scope.cot['estado_entrega'];
              $scope.phone=$scope.cot['telefono'];
              $scope.phone2=$scope.cot['celular'];
              $scope.c_location_id=$scope.cot['c_location_id'];//console.log($scope.cotInsumo['cantidad']);
              $scope.contacto=$scope.cot['contacto'];
              $scope.email=$scope.cot['correo'];
              $scope.representante_legal=$scope.cot['representante_legal'];              //$scope.cantidad=$scope.cot['cantidad'];         //console.log($scope.cot['cantidad']);
              $scope.precio=$scope.cot['precio'];
              $scope.ivaTE=$scope.cot.iva;
              $scope.no_contrato=$scope.cot.no_contrato;
              $scope.iniciales_asignado =$scope.cot.iniciales_asignado;
              $scope.fecha_factura=$scope.cot.fecha_factura;
              $scope.no_pedido=$scope.cot.no_pedido;
              
              //$scope.subTotalE=$scope.cot.subtotal;
              
              $scope.area=$scope.cot.area;
              $scope.totalesE=$scope.cot.total;
              
              $scope.tipo_cliente=$scope.cot.tipo_moneda;
              $scope.nota=$scope.cot.nota;
              $rootScope.cambio=$scope.cot.tipo_moneda;
              $scope.letras=$scope.NumeroALetras($scope.totales,$rootScope.cambio);
              $scope.c_moneda=$scope.cot.tipo_moneda;
                  $scope.totalee=Math.round($scope.cot.total);
                  $scope.letrasE=$scope.NumeroALetras($scope.totalee,$scope.tipo_moneda); console.log($scope.tipo_moneda);console.log($scope.cot.fecha);              //$scope.c_fecha=$scope.cot.fecha;                                    
              $scope.c_fecha=$scope.cot.fecha.substring(0,10);                          console.log($scope.letrasE);
              $scope.buscarTipoCambioActual($scope.cot.fecha.substring(0,10));
              $scope.condicion_cotizacion.mensaje_atencion=$scope.cot.mensaje_atencion; //console.log($scope.condicion_cotizacion.precio);
              $scope.condicion_cotizacion.precio=$scope.cot.precio; //console.log($scope.condicion_cotizacion.precio);
              $scope.b_concondicion_cotizacion_precio=$scope.cot.precio; 
              $scope.condicion_cotizacion.tiempo_entrega=$scope.cot.tiempo_entrega; // console.log($scope.condicion_cotizacion.precio);
              $scope.b_condicion_cotizacion_tiempo_entrega=$scope.cot.tiempo_entrega;
              $scope.condicion_cotizacion.condicion_pago=$scope.cot.condicion_pago; // console.log($scope.condicion_cotizacion.precio);
              $scope.b_condicion_cotizacion_condicion_pago=$scope.cot.condicion_pago; // console.log($scope.condicion_cotizacion.precio);
              $scope.condicion_cotizacion.guia_mecanica_salvaguarda_instalacion=$scope.cot.guia_mecanica_salvaguarda_instalacion; // console.log($scope.condicion_cotizacion.precio);
              $scope.b_condicion_cotizacion_guia_mecanica_salvaguarda_instalacion=$scope.cot.guia_mecanica_salvaguarda_instalacion; // console.log($scope.condicion_cotizacion.precio);
              $scope.condicion_cotizacion.garantia=$scope.cot.garantia; // console.log($scope.condicion_cotizacion.precio);
              $scope.b_condicion_cotizacion_garantia=$scope.cot.garantia; // console.log($scope.condicion_cotizacion.precio);
              $scope.condicion_cotizacion.capacitacion=$scope.cot.capacitacion; // console.log($scope.condicion_cotizacion.precio);
              $scope.b_condicion_cotizacion_capacitacion=$scope.cot.capacitacion; // console.log($scope.condicion_cotizacion.precio);
              $scope.s_condicion_cotizacion.reporte=$scope.cot.reporte; // console.log($scope.s_condicion_cotizacion.reporte);
              $scope.b_s_condicion_cotizacion_reporte=$scope.cot.reporte; // console.log($scope.s_condicion_cotizacion.reporte);
              $scope.s_condicion_cotizacion.anticipo=$scope.cot.anticipo; // console.log($scope.s_condicion_cotizacion.reporte);
              $scope.b_s_condicion_cotizacion_anticipo=$scope.cot.anticipo; // console.log($scope.s_condicion_cotizacion.reporte);
              if($scope.s_condicion_cotizacion.reporte=="" || $scope.s_condicion_cotizacion.reporte==null){
              $scope.condicion_cotizacion.validez=$scope.cot.validez; // console.log($scope.condicion_cotizacion.precio);
              $scope.b_condicion_cotizacion_validez=$scope.cot.validez; // console.log($scope.condicion_cotizacion.precio);
              }else{
                $scope.s_condicion_cotizacion.validez=$scope.cot.validez;
                $scope.b_s_condicion_cotizacion_validez=$scope.cot.validez;
              }

            },function(err){alert('ERROR EN SERVIDOR.');});
}

$scope.buscarTipoCambioActual = function(c_fecha){
    conversionSrc.get({vi:0,validto:c_fecha},function(data){        //console.log(data);
      if(data.conversiones.length==0){
        alert("¡¡ NO HAY TIPO DE CAMBIO DE LA FECHA: "+c_fecha+" \n FAVOR DE VERIFICAR EN SISTEMA !!");}
      else{
                      var c_cambio=data.conversiones[0].dividerate;                    // console.log(c_cambio);
                        $scope.c_cambio_c=$filter('number')(c_cambio, 2);
                        return $scope.c_cambio_c;
          }
    },function(err){alert('ERROR EN SERVIDOR.');});        
}

$scope.buscarB =function(busquedaC){            
             insumosSrc.get(busquedaC,function(data){
            $scope.insumosB=data['insumos'].data;                console.log($scope.insumos);
          },function(err){alert('ERROR EN SERVIDOR.');});
        }

$scope.TipoSeleccionado= function(tipo){ console.log(tipo);
        	insumosSrc.get({tipo_equipo:"*"+tipo+"*",agrupar:"modelo",bandera_equipo:"E"},function(data){
            $scope.modelos=data['insumos'].data; 
            //console.log(data.insumos.data); 
            },function(){alert("SE HA CERRADO LA SESSION");});
        }

$scope.ModeloSeleccionado= function(modelo){ console.log(modelo); //OK

          //insumoOpcionalConsultarSrc.get({id_pertenece:modelo,agrupar:"id_componente"},function(data){ console.log(data);
        	insumoOpcionalConsultarSrc.get({id_pertenece:modelo},function(data){ console.log(data);
        		$scope.componentesModelo=data.insumos_opcionales; 		console.log($scope.componentesModelo); //OK
        		//$scope.insumosOpcionales.id_pertenece=modelo;
				});
        }

$scope.SubcategoriaSeleccionada= function(subcategoria){ console.log(subcategoria);//recibe el id_pertenece
          insumoOpcionalConsultarSrc.get({id_pertenece:subcategoria,agrupar:"id_componente"},function(data){ console.log(data);
          //insumoOpcionalConsultarSrc.get({id_pertenece:modelo},function(data){ console.log(data);
            $scope.componentesSub=data.insumos_opcionales;     console.log($scope.componentesSub);
            $scope.insumosOpcionales.id_pertenece=subcategoria;
        });
        }


$scope.ComponenteSeleccionado= function(componente){ console.log(componente);
			$scope.insumosOpcionales.id_componente=componente;
        	insumoOpcionalConsultarSrc.get($scope.insumosOpcionales,function(data){ console.log(data);
            if(data)
        		$scope.insumosSeleccionados=data.insumos_opcionales; 		console.log($scope.insumosSeleccionados);

				});
        }
$scope.moneda=function(moneda){
          $rootScope.cambio=moneda;console.log($scope.cambio);
          $rootScope.habilitarBoton=false;
          //$rootScope.habilitarPrecio=false;
        }

$scope.equipos =function(selec){   console.log(selec);//OKs
   $scope.j=0;
   
if(confirm("¿Desea agregar el insumo seleccionado?")){
       /*  console.log("ENTRO A FUNCION EQUIPO= OK");//OK */                   console.log(selec);//OKs
        if($rootScope.cambio === undefined){alert("¡¡ FAVOR DE SELECCIONAR EL TIPO DE CLIENTE !!"); $rootScope.habilitarBoton=true;}else{$scope.habilitarBoton =false;}
          $scope.id_pack=selec.id_pack;  //console.log($scope.id_pack);
          if($scope.id_pack!=undefined){
           console.log("ENTRO A PAQUETES");
          }
          else{//            console.log($scope.todos);//OK
              $scope.cantidad=1;
              insumosSrc.get({ide:"*"+selec+"*"},function(data){
                $scope.insumoElegido=data['insumos'].data[0];             console.log(data.insumos.data[0].precio);             console.log($scope.insumoElegido);     // console.log($scope.insumoElegido.especificaciones); 
                if($scope.insumoElegido.especificaciones != ""){alert("! NOTA: se requiere: "+$scope.insumoElegido.especificaciones+"¡")}                
                $scope.preciosM=$scope.insumoElegido.precios; //console.log($scope.preciosM[0].monto);
              console.log($scope.preciosM.length);
                if($scope.preciosM.length<=0){
                  console.log("$scope.preciosM = 0");
                  if($scope.area==="SERVICIO TECNICO"){ console.log($rootScope.habilitarFecha);
                    $scope.habilitarPrecio=false;
                  }
                    $scope.convertir($scope.insumoElegido.precio,$scope.insumoElegido.costos,$scope.insumoElegido.tipo_cambio); 
              }else{
                  $scope.habilitarPrecio=false;
                  $scope.habilitarFecha=false;
                  console.log("$scope.preciosM > 0");
                  var j=0;
                  while(j<3){
                    console.log($scope.preciosM[j].monto);//console.log($scope.preciosM);
                     $scope.convertirP(j,$scope.preciosM[j].monto,$scope.preciosM[j].etiqueta,$scope.insumoElegido.costos,$scope.insumoElegido.tipo_cambio); 
                    console.log($scope.preciosMultiples);
                    j++;
                  }
                }  
                //$scope.convertir($scope.insumoElegido.precio,$scope.insumoElegido.costos,$scope.insumoElegido.tipo_cambio); 
                console.log($rootScope.precio); 
                console.log($scope.cantidad); 
                console.log($scope.us);
                $scope.preciosM=$scope.insumoElegido.precios; //console.log($scope.preciosM[0].monto);
               
                if($scope.area==="COMERCIAL"){ console.log(area);
                //if($scope.us=="EAML"){
                  $scope.habilitarPrecio=false;
                  $scope.habilitarFecha=false;
                }
                // $scope.fechaEntrega();
            });
                //$scope.convertir(selec.precio,selec.costos,selec.tipo_cambio);
                  //$scope.fechaEntrega(selec.bandera_insumo,selec.marca);
          } //FIN DE ELSE
      }
      $scope.todoText="";
} //FIN FUNCION SCOPE.EQUIPO

$scope.montoSeleccionado = function(monto){
$scope.precioModificable=monto; console.log(monto);
}

$scope.modificaPrecio= function(){
  console.log($scope.preciosMultiples);
  $scope.insumoElegido.precio=$scope.precioModificable;
  console.log($scope.insumoElegido.precio);
}

$scope.addTodo =function(){        /* console.log("ENTRO A LA FUNCION ADDTODO");          //console.log($rootScope.primary_qty);*/
          var k=0;                                console.log($rootScope.id_pack);  
         //console.log($scope.iniciales);
         console.log($scope.insumoElegido.id);
          if($scope.insumoElegido.id === undefined || $scope.insumoElegido.id==""){ alert("¡¡ NO HA REALIZADO NINGUNA BUSQUEDA DE INSUMOS !!"); $scope.habilitarBoton =true;} else{
          if($scope.id_pack==undefined){  //            alert("INSUMO");console.log($scope.insumoElegido);
          if($scope.area==="COMERCIAL"){
          //if($scope.us==="EAML" || $scope.iniciales === "EAML"){
                  console.log($scope.precioModificable);
                  $scope.insumoElegido.precio=$scope.precioModificable;   console.log($scope.insumoElegido.precio);            
                }/*else{ 
                  $scope.insumoElegido.precio=0; console.log($scope.insumoElegido.precio);
                }*/
            $scope.habilitarBoton =false;
            //$scope.insumoElegido.costos=$rootScope.costo;
            $scope.todos2.push({
            ide:$scope.insumoElegido.id,          //  stk:$rootScope.primary_qty, 
            cantidad:$scope.cantidad,
            codigo:$scope.insumoElegido.codigo_proovedor,
            modelo:$scope.insumoElegido.modelo,
            marca:$scope.insumoElegido.marca,
            descripcion:$scope.insumoElegido.descripcion,
            caracteristicas:$scope.insumoElegido.caracteristicas,
            especificaciones:$scope.insumoElegido.especificaciones,
            costo:$scope.insumoElegido.costos,
            unidad_compra:$scope.insumoElegido.unidad_compra,
            unidad_medida:$scope.insumoElegido.unidad_medida,
            cantidad_unidad_compra:$scope.insumoElegido.cantidad_unidad_compra,
            costo_moneda:$scope.insumoElegido.costo_moneda,
            precio:$scope.insumoElegido.precio,
            tipo_equipo:$scope.insumoElegido.tipo_equipo,
            tipo_cambio:$scope.insumoElegido.tipo_cambio,            //tipo_cambio:$rootScope.tipo_cambio,
            icono:$scope.icono,
            bandera_insumo:$scope.insumoElegido.bandera_insumo,
            total:"",//$scope.total,
            cotizacion:$scope.coti// done:false,
          }); console.log($scope.todos.length); $rootScope.precio=0; j=0; console.log($scope.todos2)

            $scope.todos.push({
            ide:$scope.insumoElegido.id,          //  stk:$rootScope.primary_qty, 
            cantidad:$scope.cantidad,
            codigo:$scope.insumoElegido.codigo_proovedor,
            modelo:$scope.insumoElegido.modelo,
            marca:$scope.insumoElegido.marca,
            descripcion:$scope.insumoElegido.descripcion,
            caracteristicas:$scope.insumoElegido.caracteristicas,
            especificaciones:$scope.insumoElegido.especificaciones,
            costo:$scope.insumoElegido.costos,
            unidad_compra:$scope.insumoElegido.unidad_compra,
            unidad_medida:$scope.insumoElegido.unidad_medida,
            cantidad_unidad_compra:$scope.insumoElegido.cantidad_unidad_compra,
            costo_moneda:$scope.insumoElegido.costo_moneda,
            precio:$scope.insumoElegido.precio,
            tipo_equipo:$scope.insumoElegido.tipo_equipo,
            tipo_cambio:$scope.insumoElegido.tipo_cambio,            //tipo_cambio:$rootScope.tipo_cambio,
            icono:$scope.icono,
            bandera_insumo:$scope.insumoElegido.bandera_insumo,
            total:"",//$scope.total,
            cotizacion:$scope.coti// done:false,
          }); console.log($scope.todos.length); $rootScope.precio=0; j=0;console.log($scope.todos)
          }else{          alert('PAQUETE'); console.log(j);
            /* ------------------------------------------------------------------------------------------------------------*/
            paqueteSrc.get({vista:1,id_pack:"*"+$rootScope.id_pack+"*"},function(data){
            $scope.paquete=data['paquete'];                   console.log($scope.paquete);  

            for(var i in $scope.paquete) {
              console.log($scope.paquete[i]['insumo_precio']);
              //$scope.fechaEntregaP($scope.paquete[i]['insumo_bandera_insumo'],$scope.paquete[i]['insumo_marca']);
              $scope.convertirP(i,$scope.paquete[i]['insumo_precio'],$scope.paquete[i]['insumo_costos'],$scope.paquete[i]['insumo_tipo_cambio']);
              //console.log($scope.precio[i]);
              //console.log($scope.costo[i]);
              $scope.todos.push({
                ide: $scope.paquete[i]['insumo_id'],
                bandera_insumo:$scope.paquete[i]['insumo_bandera_insumo'],
                codigo:$scope.paquete[i]['insumo_proovedor'],
                marca:$scope.paquete[i]['insumo_marca'],
                modelo:$scope.paquete[i]['insumo_modelo'],
                caracteristicas: $scope.paquete[i]['insumo_caracteristicas'],
                descripcion:$scope.paquete[i]['insumo_descripcion'],
                especificaciones: $scope.paquete[i]['insumo_especificaciones'],
                cantidad: $scope.paquete[i]['cantidad'],
                costo: $scope.costo[i],
                precio:$scope.precio[i],
                tipo_equipo:$scope.paquete[i]['insumo_tipo_equipo'],
                tipo_cambio:$scope.paquete[i]['insumo_tipo_cambio'],
                unidad_medida: $scope.paquete[i]['insumo_unidad_medida'],
                cotizacion:$rootScope.cotExx,
                estado:$scope.paquete[i]['insumo_estado'],
                id_pack: $scope.paquete[i]['id_pack']
                });
                
            }            console.log($scope.todos.length);
            }); //FIN PAQUETESRC
            /* ------------------------------------------------------------------------------------------------------------*/        
      } 
          $scope.todoText = "";          //$rootScope.primary_qty="";
          //$scope.insumoElegido.codigo_proovedor = "";          //$rootScope.primary_qty="";
          $scope.precioModificable =0;
          $scope.insumoElegido={};
          $scope.preciosMultiples={};
          $scope.preciosMultiples=[];
}

        }

        $scope.resetEquipos = function(){ //alert("entro"); console.log($scope.todos);
           $scope.todos=[];
           $scope.subTotal=0;
           $scope.ivaT=0;
           $scope.totales=0;
           $scope.letras=""; 
        }

        

$scope.fechaEntrega = function(){ /*alert("fechaEntrega");*/ console.log($scope.insumoElegido); console.log($scope.insumoElegido.bandera_insumo)
if($scope.insumoElegido.bandera_insumo.trim() === "E" || $scope.insumoElegido.bandera_insumo.trim()==="EQUIPO"){                          //console.log($rootScope.bandera_insumo);
  marcaProveedorSrc.get({marca_representada:"*"+$scope.insumoElegido.marca+"*"},function(data){      //console.log(data.marcas_proveedores.data[0].dias_entrega_maximo);
  $scope.dia = data.marcas_proveedores.data[0];//.dias_entrega_maximo;      console.log($scope.dia); ok
    if($scope.dia != undefined || $scope.dia != null || $scope.dia != ""){    
      $scope.diaMaximo = data.marcas_proveedores.data[0].dias_entrega_maximo;   console.log($scope.diaMaximo);
        if($scope.diaMaximo>$scope.mayor){
          $scope.mayor=$scope.diaMaximo;
          $scope.fecha_entrega = $scope.sumaFecha($scope.mayor,5);alert("Fecha de entrega sugerida: "+$scope.fecha_entrega+"");
          $scope.ola=$scope.fecha_entrega;
        }else{            console.log("es menor");          }
    }
    else{      console.log("VERIFICAR RESULTADO DE CONSULTA");      }
  });
 }  else{console.log("NO APLICA PARA CONSUMIBLES");
          $rootScope.fecha_entrega="0000-00-00";
        }
}

$scope.fechaEntregaP = function(bandera,marca){
if(bandera.trim() === "E" || bandera.trim()==="EQUIPO"){                          //console.log($rootScope.bandera_insumo);
  marcaProveedorSrc.get({marca_representada:"*"+marca+"*"},function(data){      //console.log(data.marcas_proveedores.data[0].dias_entrega_maximo);
  $scope.dia = data.marcas_proveedores.data[0];//.dias_entrega_maximo;      //console.log($scope.dia); 
    if($scope.dia != undefined || $scope.dia != null || $scope.dia != ""){    
      $scope.diaMaximo = data.marcas_proveedores.data[0].dias_entrega_maximo;   //console.log($scope.diaMaximo);
        if($scope.diaMaximo>$scope.mayor){
          $scope.mayor=$scope.diaMaximo;
          $scope.fecha_entrega = $scope.sumaFecha($scope.mayor,5); alert("Fecha de entrega sugerida: "+$scope.fecha_entrega+"");
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
 //var meses = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
 mes = (mes < 10) ? ("0" + mes) : mes;
 dia = (dia < 10) ? ("0" + dia) : dia;
 var fechaFinal = dia+sep+meses[mes]+sep+anno;
 return (fechaFinal);
 }

 $scope.banderaPaquete = function(){
    $rootScope.equipoOpcionP ="P"; console.log($rootScope.equipoOpcion);
    $scope.todoText =""; console.log($rootScope.equipoOpcion);
  //$scope.
 }

 $scope.paqueteLst =function(){  console.log("paqueteLst");
          console.log($scope.equipoOpcion);
          
            paquetesSrc.get({todoText:"*"+$scope.todoText+"*"},function(data){
            $scope.insumosTodos=data['paquetes']; console.log($scope.insumosTodos);
          });
      }

$scope.paquete = function(selec){          //  console.log("ENTRO A FUNCION EQUIPO= OK");//OK            
        console.log(selec);//OK
          $rootScope.id_pack=selec.id_pack;  console.log($rootScope.id_pack);
        } //FIN FUNCION SCOPE.PAQUETE

$scope.remover=function(j,precio,cantidad){    console.log(cantidad);
    if(confirm("¿ DESEA ELIMINAR EL INSUMO DE LA LISTA?"))      {
      var precio=precio*cantidad;
      $scope.subTotal=$scope.subTotal-precio;
      var ivad  = precio*$scope.iva;  
      $scope.ivaT  =$scope.ivaT - ivad;
      console.log(ivad);
      console.log(precio);
      var menosTotal=parseFloat(precio) + parseFloat(ivad);
      console.log(menosTotal);
      $scope.totales=$scope.totales-menosTotal;
       $scope.letras=$scope.NumeroALetras($scope.totales,$rootScope.cambio);/*        console.log($scope.letras); */console.log($rootScope.cambio);
      $scope.insumosB=[];
      $scope.preciosMultiples=[];
            $scope.todos.splice(j,1);       }else{alert("¡ Accion Cancelada !");}
    }

$scope.removerU1=function(j,precio,cantidad){    console.log(cantidad);
    if(confirm("¿ DESEA ELIMINAR EL INSUMO DE LA LISTA?"))      {
      var precio=precio*cantidad;
      $scope.subTotal=$scope.subTotal-precio;
      var ivad  = precio*$scope.iva;  
      $scope.ivaT  =$scope.ivaT - ivad;
      console.log(ivad);
      console.log(precio);
      var menosTotal=parseFloat(precio) + parseFloat(ivad);
      console.log(menosTotal);
      $scope.totales=$scope.totales-menosTotal;
       $scope.letras=$scope.NumeroALetras($scope.totales,$rootScope.cambio);/*        console.log($scope.letras); */console.log($rootScope.cambio);
      $scope.insumosB=[];
      $scope.preciosMultiples=[];
            $scope.todos1.splice(j,1);       }else{alert("¡ Accion Cancelada !");}
    }

$scope.removerU2=function(j,precio,cantidad){    console.log(cantidad);
    if(confirm("¿ DESEA ELIMINAR EL INSUMO DE LA LISTA?"))      {
      var precio=precio*cantidad;
      $scope.subTotal=$scope.subTotal-precio;
      var ivad  = precio*$scope.iva;  
      $scope.ivaT  =$scope.ivaT - ivad;
      console.log(ivad);
      console.log(precio);
      var menosTotal=parseFloat(precio) + parseFloat(ivad);
      console.log(menosTotal);
      $scope.totales=$scope.totales-menosTotal;
       $scope.letras=$scope.NumeroALetras($scope.totales,$rootScope.cambio);/*        console.log($scope.letras); */console.log($rootScope.cambio);
      $scope.insumosB=[];
      $scope.preciosMultiples=[];
            $scope.todos2.splice(j,1);       }else{alert("¡ Accion Cancelada !");}
    }

$scope.setTotals = function(item){         console.log(item); 
console.log(item.precio);//   
console.log(item.cantidad); 
  console.log($scope.j1);
  console.log($scope.j);
 if($scope.j==0){
         // if (item){            //item.total = (item.cantidad * item.precio)-(item.cantidad * item.costo);
            //item.total = (item.cantidad * item.costo);
            item.total = (item.cantidad * item.precio); console.log(item.total);//UPDATE 20160719
            //item.total = (cantidad * precio); 
            $scope.subTotal += item.total;                    console.log($scope.subTotal);
           // $scope.total=(cantidad * precio);               console.log($scope.total);
           // $scope.subTotal += $scope.total;                console.log($scope.subTotal);
            $scope.ivaT  = $scope.subTotal*$scope.iva;        // console.log($scope.iva);
            $scope.totales = ($scope.subTotal+$scope.ivaT);            // console.log($scope.totales);
            $scope.letras=$scope.NumeroALetras($scope.totales,$rootScope.cambio);/*        console.log($scope.letras); */console.log($rootScope.cambio);
          //}console.log(j);
          $scope.j++;
       } 
  }

  $scope.setTotalsEdit1 = function(item){         console.log(item); 
console.log(item.precio);//   
console.log(item.cantidad); 
  console.log($scope.j1);
  console.log($scope.j);
 if($scope.j==0){
         // if (item){            //item.total = (item.cantidad * item.precio)-(item.cantidad * item.costo);
            //item.total = (item.cantidad * item.costo);
            item.total = (item.cantidad * item.precio); console.log(item.total);//UPDATE 20160719
            //item.total = (cantidad * precio); 
            $scope.subTotal += item.total;                    console.log($scope.subTotal);
           // $scope.total=(cantidad * precio);               console.log($scope.total);
           // $scope.subTotal += $scope.total;                console.log($scope.subTotal);
            $scope.ivaT  = $scope.subTotal*$scope.iva;        // console.log($scope.iva);
            $scope.totales = ($scope.subTotal+$scope.ivaT);            // console.log($scope.totales);
            $scope.letras=$scope.NumeroALetras($scope.totales,$rootScope.cambio);/*        console.log($scope.letras); */console.log($rootScope.cambio);
          //}console.log(j);
          $scope.j++;
         // $scope.j1++;console.log($scope.j1);
       } 
     //  y=$scope.j1;
      // $scope.j2[y]=$scope.j1; console.log($scope.j2);
  }

  $scope.setTotalsEdit = function(item,index){         console.log(item); 
console.log(item.precio);//   
item.precio=item.precio.replace(',','');
console.log(item.precio);//   
console.log(item.cantidad); 
  console.log(index);
  console.log($scope.j);
  $scope.j1=index+1; console.log($scope.j1);
  var ind=index+1;
 //while($scope.j<index+1){
 if($scope.j<ind){
            item.total = (item.cantidad * item.precio); console.log(item.total);//UPDATE 20160719
            $scope.subTotal += item.total;                    console.log($scope.subTotal);
            $scope.ivaT  = $scope.subTotal*$scope.iva;        // console.log($scope.iva);
            $scope.totales = ($scope.subTotal+$scope.ivaT);            console.log($scope.totales);
            $scope.letras=$scope.NumeroALetras($scope.totales,$rootScope.cambio);/*        console.log($scope.letras); */console.log($rootScope.cambio);
          console.log(j);
          $scope.j++;
       } 
  }

$scope.convertir = function(precio,costo,tipo_cambio){        console.log(precio);console.log($rootScope.cambio);console.log(tipo_cambio);
if($rootScope.cambio=="USD"){
  if(tipo_cambio=="JPY"){
             conversionSrc.get({currency_id_from:113,currency_id_to:130},function(data){  //JPY TO MXN
                  $scope.fecha_cambio=data.conversiones[0].validto;                       console.log(data.conversiones[0].validto);
                  alert("!! Se cotizara el tipo de cambio JPY a USD con fecha de actualización: "+$scope.fecha_cambio+ " ¡¡");
                  $scope.multiplyrate=data.conversiones[0].multiplyrate;                  console.log($scope.multiplyrate);
                  $rootScope.precio1=precio*$scope.multiplyrate;                          console.log($rootScope.precio1);
                  $rootScope.costo1=costo*$scope.multiplyrate;                          console.log($rootScope.precio1);
                      conversionSrc.get({currency_id_from:130,currency_id_to:100},function(data){ // MXN TO USD
                      $scope.multiplyrate1=data.conversiones[1].multiplyrate;             console.log($scope.multiplyrate1);
                      $rootScope.precio=$rootScope.precio1*$scope.multiplyrate1;          console.log($scope.precio);console.log($rootScope.precio);                                     console.log(data.conversiones[0].validto);
                      $rootScope.costo=$rootScope.costo1*$scope.multiplyrate1;          console.log($scope.precio);console.log($rootScope.precio);  
                      $scope.precioModificable=$rootScope.precio;                                   console.log(data.conversiones[0].validto);
                    });
                  });    console.log("CONVERTIR JPY A USD");
  }
  if(tipo_cambio=="EUR"){
                 conversionSrc.get({currency_id_from:102,currency_id_to:130},function(data){
                  $scope.fecha_cambio=data.conversiones[0].validto;                               console.log(data.conversiones[0].validto);
                  alert("!! Se cotizara el tipo de cambio EUR a USD con fecha de actualización: "+$scope.fecha_cambio+ " ¡¡");
                  $scope.multiplyrate=data.conversiones[0].multiplyrate;                          console.log($scope.multiplyrate);
                  $rootScope.precio1=precio*$scope.multiplyrate;                                  console.log($scope.precio1);
                  $rootScope.costo1=costo*$scope.multiplyrate;                          console.log($rootScope.precio1);
                      conversionSrc.get({currency_id_from:130,currency_id_to:100},function(data){
                      $scope.multiplyrate1=data.conversiones[1].multiplyrate;                     console.log($scope.multiplyrate1);
                      $rootScope.precio=$rootScope.precio1*$scope.multiplyrate1;                  console.log($scope.precio);
                      $rootScope.costo=$rootScope.costo1*$scope.multiplyrate1;          console.log($scope.precio);console.log($rootScope.precio); 
                      $scope.precioModificable=$rootScope.precio;
                    });
                  });   console.log("CONVERTIR EUR A USD");
  }
  if(tipo_cambio=="MXN"){
                      conversionSrc.get({currency_id_from:130,currency_id_to:100},function(data){
                        $scope.fecha_cambio=data.conversiones[0].validto;                         console.log(data.conversiones[0].validto);
                  alert("!! Se cotizara el tipo de cambio MXN a USD con fecha de actualización: "+$scope.fecha_cambio+ " ¡¡");
                      $scope.multiplyrate1=data.conversiones[0].multiplyrate;                     console.log($scope.multiplyrate1);
                      $rootScope.precio=precio*$scope.multiplyrate1;                              console.log($rootScope.precio);
                      $rootScope.costo=costo*$scope.multiplyrate1;                              console.log($scope.costo);
                      $scope.precioModificable=$rootScope.precio;
                    });        console.log("CONVERSION MXN A USD");
      }
  if(tipo_cambio=="USD"){
    //$rootScope.precio[i]=precio;                     //console.log("NO ES NECESARIA LA CONVERSION A DOLARES");
    $scope.precioModificable=precio;
    $rootScope.costo=costo;                     console.log("NO ES NECESARIA LA CONVERSION A DOLARES");
  }
}else
if($rootScope.cambio=="MXN"){
      if(tipo_cambio=="JPY"){
        conversionSrc.get({currency_id_from:113,currency_id_to:130},function(data){
                        $scope.fecha_cambio=data.conversiones[0].validto; console.log(data.conversiones[0].validto);
                  alert("!! Se cotizara el tipo de cambio JPY a MXN con fecha de actualización: "+$scope.fecha_cambio+ " ¡¡");
                      $scope.multiplyrate1=data.conversiones[0].multiplyrate;console.log($scope.multiplyrate1);
                      $rootScope.precio=precio*$scope.multiplyrate1;console.log($scope.precio);
                      $rootScope.costo=costo*$scope.multiplyrate1;console.log($scope.precio);
                      $scope.precioModificable=$rootScope.precio;
                    });        console.log("CONVERSION JPY A PESOS");
      }
      if(tipo_cambio=="EUR"){
        conversionSrc.get({currency_id_from:102,currency_id_to:130},function(data){
                        $scope.fecha_cambio=data.conversiones[0].validto; console.log(data.conversiones[0].validto);
                  alert("!! Se cotizara el tipo de cambio EUR a MXN con fecha de actualización: "+$scope.fecha_cambio+ " ¡¡");
                      $scope.multiplyrate1=data.conversiones[0].multiplyrate;console.log($scope.multiplyrate1);
                      $rootScope.precio=precio*$scope.multiplyrate1;console.log($scope.precio);
                      $rootScope.costo=costo*$scope.multiplyrate1;console.log($scope.precio);
                      $scope.precioModificable=$rootScope.precio;
                    });        console.log("CONVERSION EUR A PESOS");
      }
      if(tipo_cambio=="USD"){
        conversionSrc.get({currency_id_from:100,currency_id_to:130},function(data){
                        $scope.fecha_cambio=data.conversiones[0].validto; console.log(data.conversiones[0].validto);
                  alert("!! Se cotizara el tipo de cambio USD a MXN con fecha de actualización: "+$scope.fecha_cambio+ " ¡¡");
                      $scope.multiplyrate1=data.conversiones[0].multiplyrate;console.log($scope.multiplyrate1);
                      $rootScope.precio=precio*$scope.multiplyrate1;console.log($rootScope.precio);
                      $rootScope.costo=costo*$scope.multiplyrate1;console.log($scope.precio);
                      $scope.precioModificable=$rootScope.precio;
                    });        console.log("CONVERSION USD A PESOS");
      }
      if(tipo_cambio=="MXN"){
        $rootScope.precio=precio;          console.log("CONVERSION A PESOS");
        $rootScope.costo=costo;          console.log("CONVERSION A PESOS");
        $scope.precioModificable=$rootScope.precio;
      }
  } 
  console.log($rootScope.precio); 
}



$scope.convertirP = function(i,precio,etiqueta,costo,tipo_cambio){      console.log(i);
  console.log(precio);
  console.log($rootScope.cambio);
  console.log(tipo_cambio);
if($rootScope.cambio=="USD"){
  if(tipo_cambio=="JPY"){
             conversionSrc.get({currency_id_from:113,currency_id_to:130},function(data){  //JPY TO MXN
                  $scope.fecha_cambio=data.conversiones[0].validto;                       console.log(data.conversiones[0].validto);
                  alert("!! Se cotizara el tipo de cambio JPY a USD con fecha de actualización: "+$scope.fecha_cambio+ " ¡¡");
                  $scope.multiplyrate=data.conversiones[0].multiplyrate;                  console.log($scope.multiplyrate);
                  $rootScope.precio1=precio*$scope.multiplyrate;                          console.log($rootScope.precio1);
                  $rootScope.costo1=costo*$scope.multiplyrate;                          console.log($rootScope.costo1);
                      conversionSrc.get({currency_id_from:130,currency_id_to:100},function(data){ // MXN TO USD
                      $scope.multiplyrate1=data.conversiones[1].multiplyrate;             console.log($scope.multiplyrate1);
                      $scope.precio[i]=$rootScope.precio1*$scope.multiplyrate1;          console.log($scope.precio);console.log($rootScope.precio);                                     console.log(data.conversiones[0].validto);
                      $scope.costo[i]=$rootScope.costo1*$scope.multiplyrate1;          console.log($scope.costo);console.log($rootScope.precio);   
                    });
                  });    console.log("CONVERTIR JPY A USD");
  }
  if(tipo_cambio=="EUR"){
                 conversionSrc.get({currency_id_from:102,currency_id_to:130},function(data){
                  $scope.fecha_cambio=data.conversiones[0].validto;                               console.log(data.conversiones[0].validto);
                  alert("!! Se cotizara el tipo de cambio EUR a USD con fecha de actualización: "+$scope.fecha_cambio+ " ¡¡");
                  $scope.multiplyrate=data.conversiones[0].multiplyrate;                          console.log($scope.multiplyrate);
                  $rootScope.precio1=precio*$scope.multiplyrate;                                  console.log($scope.precio1);
                  $rootScope.costo1=costo*$scope.multiplyrate;                          console.log($rootScope.precio1);
                      conversionSrc.get({currency_id_from:130,currency_id_to:100},function(data){
                      $scope.multiplyrate1=data.conversiones[1].multiplyrate;                     console.log($scope.multiplyrate1);
                      $scope.precio[i]=$rootScope.precio1*$scope.multiplyrate1;                  console.log($scope.precio);
                      $scope.costo[i]=$rootScope.costo1*$scope.multiplyrate1;          console.log($scope.precio);console.log($rootScope.precio);
                    });
                  });   console.log("CONVERTIR EUR A USD");
  }
  if(tipo_cambio=="MXN"){
                      conversionSrc.get({currency_id_from:130,currency_id_to:100},function(data){
                        $scope.fecha_cambio=data.conversiones[0].validto;                         console.log(data.conversiones[0].validto);
                  alert("!! Se cotizara el tipo de cambio MXN a USD con fecha de actualización: "+$scope.fecha_cambio+ " ¡¡");
                      $scope.multiplyrate1=data.conversiones[1].multiplyrate;                     console.log($scope.multiplyrate1);
                      $scope.precio[i]=precio*$scope.multiplyrate1;                              console.log($scope.precio);
                      $scope.costo[i]=costo*$scope.multiplyrate1;                              console.log($scope.precio);
                    });        console.log("CONVERSION MXN A USD");
      }
  if(tipo_cambio=="USD"){console.log("NO ES NECESARIA LA CONVERSION A DOLARES");console.log(precio); 
   // $scope.precio[i]=precio; console.log(precio);                   // console.log("NO ES NECESARIA LA CONVERSION A DOLARES");
    $scope.preciosMultiples.push({
                        etiqueta:etiqueta,
                        monto:precio
                      });console.log($scope.preciosMultiples[i]);
    $scope.costo[i]=costo;  console.log($scope.costo[i]);                   //console.log("NO ES NECESARIA LA CONVERSION A DOLARES");
  }
}else
if($rootScope.cambio=="MXN"){
      if(tipo_cambio=="JPY"){
        conversionSrc.get({currency_id_from:113,currency_id_to:130},function(data){
                        $scope.fecha_cambio=data.conversiones[0].validto; console.log(data.conversiones[0].validto);
                  alert("!! Se cotizara el tipo de cambio JPY a MXN con fecha de actualización: "+$scope.fecha_cambio+ " ¡¡");
                      $scope.multiplyrate1=data.conversiones[0].multiplyrate;console.log($scope.multiplyrate1);
                      $scope.precio[i]=precio*$scope.multiplyrate1;       console.log($scope.precio);
                      $scope.costo[i]=costo*$scope.multiplyrate1;         console.log($scope.precio);
                //      $rootScope.precio=precio*$scope.multiplyrate1;console.log($scope.precio);
                    });        console.log("CONVERSION JPY A PESOS");
      }
      if(tipo_cambio=="EUR"){
        conversionSrc.get({currency_id_from:102,currency_id_to:130},function(data){
                        $scope.fecha_cambio=data.conversiones[0].validto; console.log(data.conversiones[0].validto);
                  alert("!! Se cotizara el tipo de cambio EUR a MXN con fecha de actualización: "+$scope.fecha_cambio+ " ¡¡");
                      $scope.multiplyrate1=data.conversiones[0].multiplyrate;console.log($scope.multiplyrate1);
                      $scope.precio[i]=precio*$scope.multiplyrate1;console.log($scope.precio);
                      $scope.costo[i]=costo*$scope.multiplyrate1;console.log($scope.precio);
                    });        console.log("CONVERSION EUR A PESOS");
      }
      if(tipo_cambio=="USD"){
        conversionSrc.get({currency_id_from:100,currency_id_to:130},function(data){ console.log(precio);
                        $scope.fecha_cambio=data.conversiones[0].validto; console.log(data.conversiones[0].validto);//  alert("!! Se cotizara el tipo de cambio USD a MXN con fecha de actualización: "+$scope.fecha_cambio+ " ¡¡");
                      $scope.multiplyrate1=data.conversiones[0].multiplyrate;console.log($scope.multiplyrate1);
                      $scope.precio=precio*$scope.multiplyrate1;console.log($scope.preciosMultiples[i]);
                      $scope.preciosMultiples.push({
                        etiqueta:etiqueta,
                        monto:$scope.precio
                      });console.log($scope.preciosMultiples[i]);
                      $scope.costo[i]=costo*$scope.multiplyrate1; //console.log($scope.precio);
                    });        console.log("CONVERSION USD A PESOS");
      }
      if(tipo_cambio=="MXN"){
        $scope.precio[i]=precio;          console.log("CONVERSION A PESOS");
        $scope.costo[i]=costo;          console.log("CONVERSION A PESOS");
      }
  }  //fin de ELSE
}
//INICIA SCRIPT PARA ENSAMBLAR O CONFIGURAR EQUIPO.
var self = this;
    $scope.equipo={
        id:'',
        tipo_equipo:'',
        modelo:'',
        bandera_equipo:'E'        
    };   
//    $scope.color='';
//    $scope.numero_color=0;
//    $scope.numero_nvo_color=0;
    $scope.items=[];
    
    self.getEquipos=function(){
//        console.log(x);
           $scope.rutas=[];
           $scope.items=[];
           $scope.seleccion={};
        insumosSrc.get($scope.equipo,function(d){
                $scope.modelos = d.insumos.data;
                //COLOCAR LOS RESULTADOS EN EL SELECT GENERICO con el scope array items
               for( o in d.insumos.data ){
//                   console.log(d.insumos.data[o].codigo_proovedor);
                   var id=d.insumos.data[o].id;
                   var bandera_insumo=d.insumos.data[o].bandera_insumo;
                   var etiqueta=d.insumos.data[o].codigo_proovedor;
                   var id_pertenece=d.insumos.data[o].id;
                   var id_insumo=d.insumos.data[o].id;
                   var id_componente='';
                   var codigo_proovedor=d.insumos.data[o].codigo_proovedor;
                   var descripcion=d.insumos.data[o].descripcion;
                   var precio=d.insumos.data[o].precio;
                   var costo=d.insumos.data[o].costos;
                   var tipo_cambio=d.insumos.data[o].tipo_cambio;
                   var modelo=d.insumos.data[o].modelo;
                   var caracteristicas=d.insumos.data[o].caracteristicas;
                   var especificaciones=d.insumos.data[o].especificaciones;
                   var unidad_medida=d.insumos.data[o].unidad_medida;
                   var estado=d.insumos.data[o].estado;
                   var tipo_equipo=d.insumos.data[o].tipo_equipo;
                   var marca=d.insumos.data[o].marca;
                   var categoria1=d.insumos.data[o].categoria1;
                   var categoria2=d.insumos.data[o].categoria2;
                   var categoria3=d.insumos.data[o].categoria3;
                    //      'coti':'',
                    
//                   var id_catalogo=d.insumos.data[o].id;
                   $scope.items.push({id:id,
                       bandera_insumo:bandera_insumo,
                       etiqueta:etiqueta,
                       id_pertenece:id_pertenece,
                       id_insumo:id_insumo,
                       id_componente:'',
                    codigo_proovedor:codigo_proovedor,
                    descripcion:descripcion,
                    precio:precio,
                    costo:costo,
                    tipo_cambio:tipo_cambio,
                    modelo:modelo,
                    caracteristicas:caracteristicas,
                    especificaciones:especificaciones,
                    unidad_medida:unidad_medida,
                    estado:estado,
                    tipo_equipo:tipo_equipo,
                    marca:marca,
                    categoria1:categoria1,
                    categoria2:categoria2,
                    categoria3:categoria3
                   });
               }
        },function(){alert('error en peticion')});
        
    }
    $scope.setSeleccion=function(x){//el item seleccionado se pasa a un nuevo scope para pasarlo a nueva configuracion
//        console.log(x);
        if(x.estado==='SI'){
            $scope.insumoElegido=x;
        }
            
    }
    $scope.getSigNivel=function(it){//obtiene el item seleccionado del select, obtiene su bandera insumo, para ir a buscar el siquiente nivel
//        console.log(param);
        var x=self.navegaColoca(it.etiqueta,it.id_insumo,it.id_componente);
        //console.log(x+'<<<<-');
        if(!x){
          self.navegaRetira(it);
        }
        $scope.items=[];
        if(it.bandera_insumo==='E'){
            //ir por submodelos en la tabla 
//            console.log('ir por submodelos');
            insumoOpcionalConsultarSrc.get({id_pertenece:it.id_pertenece},function(d){
                 for( o in d.insumos_opcionales ){
//                   console.log(d.insumos.data[o].codigo_proovedor);
                   var id=d.insumos_opcionales[o].id;
                   var bandera_insumo=d.insumos_opcionales[o].insumo_bandera_insumo;
                   var etiqueta=d.insumos_opcionales[o].insumo_descripcion;
                   var id_pertenece=d.insumos_opcionales[o].id_insumo;
                   var id_pertenece=d.insumos_opcionales[o].id_insumo;
//                   var id_insumo=d.insumos_opcionales[o].id;
                   var id_insumo=d.insumos_opcionales[o].id_insumo;
//                   var id_catalogo=d.insumos.data[o].id;
                var codigo_proovedor=d.insumos_opcionales[o].pertenece_codigo_proovedor;
                   var descripcion=d.insumos_opcionales[o].descripcion;
                   var precio=d.insumos_opcionales[o].precio;
                   var costo=d.insumos_opcionales[o].costos;
                   var tipo_cambio=d.insumos_opcionales[o].tipo_cambio;
                   var modelo=d.insumos_opcionales[o].modelo;
                   var caracteristicas=d.insumos_opcionales[o].caracteristicas;
                   var especificaciones=d.insumos_opcionales[o].especificaciones;
                   var unidad_medida=d.insumos_opcionales[o].unidad_medida;
                   var estado=d.insumos_opcionales[o].estado;
                   var tipo_equipo=d.insumos_opcionales[o].tipo_equipo;
                   var marca=d.insumos_opcionales[o].marca;
                   var categoria1=d.insumos_opcionales[o].categoria1;
                   var categoria2=d.insumos_opcionales[o].categoria2;
                   var categoria3=d.insumos_opcionales[o].categoria3;
                   $scope.items.push({id:id,
                       bandera_insumo:bandera_insumo,
                       etiqueta:etiqueta,
                       id_pertenece:id_pertenece,
                       id_insumo:id_insumo,
                       id_componente:'',
                   codigo_proovedor:codigo_proovedor,
                    descripcion:descripcion,
                    precio:precio,
                    costo:costo,
                    tipo_cambio:tipo_cambio,
                    modelo:modelo,
                    caracteristicas:caracteristicas,
                    especificaciones:especificaciones,
                    unidad_medida:unidad_medida,
                    estado:estado,
                    tipo_equipo:tipo_equipo,
                    marca:marca,
                    categoria1:categoria1,
                    categoria2:categoria2,
                    categoria3:categoria3
                   });
               }
            },function(){alert('ERROR EN SERVIDOR')});
        }else if(it.bandera_insumo=='SUB'){
            //TRAER  LOS COMPONENTES RELACIONADOS
//            console.log('ir por componentes relacionados');
            self.getComponentes(it.id_pertenece);
        }else if(it.bandera_insumo==='C'){
            //TRAER LOS INSUMOS RELACIONADOS
            self.getInsumos(it.id_componente,it.id_pertenece);            
        }else if(it.bandera_insumo==='I'){
            //CONSULTAR OTROS INSUMOS
//            console.log('CONSULTAR LOS OTROS SUB INSUMOS');
            self.getInsumos('',it.id_pertenece);
        }
    }
    
    self.getComponentes= function(id_pertenece){ //console.log(subcategoria);//recibe el id_pertenece
          insumoOpcionalConsultarSrc.get({id_pertenece:id_pertenece,agrupar:"id_componente"},function(d){ //console.log(da);
              for(o in d.insumos_opcionales){
                  var id=d.insumos_opcionales[o].id;
                   var bandera_insumo='C';
                   var etiqueta=d.insumos_opcionales[o].componente;
                   var id_pertenece=d.insumos_opcionales[o].id_pertenece;
                   var id_componente=d.insumos_opcionales[o].id_componente;
                   var id_insumo=d.insumos_opcionales[o].id_pertenece;
                   
                   var codigo_proovedor=d.insumos_opcionales[o].codigo_proovedor;
                   var descripcion=d.insumos_opcionales[o].descripcion;
                   var precio=d.insumos_opcionales[o].precio;
                   var costo=d.insumos_opcionales[o].costos;
                   var tipo_cambio=d.insumos_opcionales[o].tipo_cambio;
                   var modelo=d.insumos_opcionales[o].modelo;
                   var caracteristicas=d.insumos_opcionales[o].caracteristicas;
                   var especificaciones=d.insumos_opcionales[o].especificaciones;
                   var unidad_medida=d.insumos_opcionales[o].unidad_medida;
                   var estado='NO';
                   var tipo_equipo=d.insumos_opcionales[o].tipo_equipo;
                   var marca=d.insumos_opcionales[o].marca;
                   var categoria1=d.insumos_opcionales[o].categoria1;
                   var categoria2=d.insumos_opcionales[o].categoria2;
                   var categoria3=d.insumos_opcionales[o].categoria3;
                   $scope.items.push({id:id,
                       bandera_insumo:bandera_insumo,
                       etiqueta:etiqueta,
                       id_pertenece:id_pertenece,
                       id_insumo:id_insumo,
                       id_componente:id_componente,
                   codigo_proovedor:codigo_proovedor,
                    descripcion:descripcion,
                    precio:precio,
                    costo:costo,
                    tipo_cambio:tipo_cambio,
                    modelo:modelo,
                    caracteristicas:caracteristicas,
                    especificaciones:especificaciones,
                    unidad_medida:unidad_medida,
                    estado:estado,
                    tipo_equipo:tipo_equipo,
                    marca:marca,
                    categoria1:categoria1,
                    categoria2:categoria2,
                    categoria3:categoria3
                   });
              }
            });
        }
    self.getInsumos =function(id_componente,id_pertenece){//OBTIENE LAS RELACIONES DE LA TABLA INSUMOS RELACIONES
        insumoOpcionalConsultarSrc.get({id_componente:id_componente,id_pertenece:id_pertenece},function(d){
//            $scope.insumos=d.insumos_opcionales;
                for(o in d.insumos_opcionales){
                    
                  var id=d.insumos_opcionales[o].id;
                   var bandera_insumo='I';
                   var etiqueta=d.insumos_opcionales[o].insumo_codigo_proovedor+" Descripción: "+d.insumos_opcionales[o].insumo_descripcion;;
                   var id_pertenece=d.insumos_opcionales[o].id_pertenece;
                   var id_componente=d.insumos_opcionales[o].id_componente;
                   var id_insumo=d.insumos_opcionales[o].id_insumo;
                   
                   var codigo_proovedor=d.insumos_opcionales[o].codigo_proovedor;
                   var descripcion=d.insumos_opcionales[o].descripcion;
                   var precio=d.insumos_opcionales[o].precio;
                   var costo=d.insumos_opcionales[o].costos;
                   var tipo_cambio=d.insumos_opcionales[o].tipo_cambio;
                   var modelo=d.insumos_opcionales[o].modelo;
                   var caracteristicas=d.insumos_opcionales[o].caracteristicas;
                   var especificaciones=d.insumos_opcionales[o].especificaciones;
                   var unidad_medida=d.insumos_opcionales[o].unidad_medida;
                   var estado=d.insumos_opcionales[o].estado;
                   var tipo_equipo=d.insumos_opcionales[o].tipo_equipo;
                   var marca=d.insumos_opcionales[o].marca;
                   var categoria1=d.insumos_opcionales[o].categoria1;
                   var categoria2=d.insumos_opcionales[o].categoria2;
                   var categoria3=d.insumos_opcionales[o].categoria3;
                   $scope.items.push({id:id,
                       bandera_insumo:bandera_insumo,
                       etiqueta:etiqueta,
                       id_pertenece:id_insumo,
                       id_insumo:id_insumo,
                       id_componente:id_componente,
                   codigo_proovedor:codigo_proovedor,
                    descripcion:descripcion,
                    precio:precio,
                    costo:costo,
                    tipo_cambio:tipo_cambio,
                    modelo:modelo,
                    caracteristicas:caracteristicas,
                    especificaciones:especificaciones,
                    unidad_medida:unidad_medida,
                    estado:estado,
                    tipo_equipo:tipo_equipo,
                    marca:marca,
                    categoria1:categoria1,
                    categoria2:categoria2,
                    categoria3:categoria3
                   });
                }
        },function(){alert('ERROR EN SERVIDOR')});
    }

    $scope.getEquipos=function(){
        self.getEquipos();
    }
    $scope.rutas=[];
//    $scope.prueba="";
    self.navegaColoca=function(etiqueta,pertenece,id_componente){
        var g='';
        var verificar=true;
        var agregar=false;
        var tam_arr=$scope.rutas.length;
        for (var i=0;i<=tam_arr;i++){
            g=g+'fiber_manual_record';
            if(verificar){
              if($scope.rutas[i]!== undefined ){
               if($scope.rutas[i].etiqueta!== etiqueta){
                //console.log('En: '+i+$scope.rutas[i].etiqueta+'<>'+etiqueta);
                
                   agregar=true;
               }else{
                   agregar=false;
                   verificar=agregar;

                   //al entrar aqi, ya no deberia recorrer a buscar etiqueta
               }
              }else if(tam_arr==0){

//                console.log('el tamano del arreglo es cero');
                  agregar=true;                
              }

            }
        }
        if(agregar){
            
            g=g+'label_outline';
            if(i===1){
                var bandera_insumo='E';
                var color='primary';
            }else if(i===2){
                var bandera_insumo='SUB';
                var color='info';
            }else if(i===3){
                var bandera_insumo='C';
                var color='success'
            }else if(i>=4){
                var bandera_insumo='I';
            }
            $scope.rutas.push({
                guion:g,
                id:i,//este id es de índice, no id de referencia en la tabla
                id_pertenece:pertenece,
                bandera_insumo:bandera_insumo,
                id_componente:id_componente,
                color:color,
                etiqueta:etiqueta
            });
        }
        return agregar;
    }
    self.navegaRetira=function(ruta){
        var i=ruta.id;
        while (i<$scope.rutas.length){
            $scope.rutas.pop($scope.rutas.length);
        }
    }
//FIN SCRIPT PARA ENSAMBLAR O CONFIGURAR EQUIPO.

}

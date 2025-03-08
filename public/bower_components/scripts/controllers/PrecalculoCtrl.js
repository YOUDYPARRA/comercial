function PrecalculosFnCtrl($timeout,$location,$scope,$filter,$controller,precalculosSrc,catalogosCalculoSrc,formula,conversionSrc,cotizacionPaqueteInsumoSrc,cotizacionSrc,ultimoPreSrc){
        var self=this;//        angular.extend(this,$controller('cotizacionCtrl',{$scope:$scope}));
    $scope.precalculos= 
    {
        'id':"",
        'id_catalogo':"",
        'id_cotizacion':"",
        'id_cotizaciones_paquetes_insumos':"",
        'fecha_catalogo':"",
        'moneda':"",
        'fecha_tipo_cambio':"",
        'tipo_cambio':"",
        'precio_dolares':0,
        'descuento':0,
        'precio_dolares_descuento':0,
        'impuesto_importacion':0,
        'porcentaje_impuesto_importacion':0,
        'agente_aduanal':0,
        'h_agente_aduanal':0,
        'flete':0,
        'porcentaje_flete':0,
        'costo_instalacion':0,
        'porcentaje_costo_instalacion':0,
        'preparacion_sitio':0,
        'porcentaje_preparacion_sitio':0,
        'modelo_insumos':"",
        'precio_compra_insumos':0,
        'porcentaje_insumos':0,
        'subtotal_1':0,
        'porcentaje_subtotal_1':0,
        'margen_bruto':0,
        'porcentaje_margen_bruto':0,
        'total_costo_instalacion_garantia':0,
        'porcentaje_garantia':0,
        'reserva_refaccion':0,
        'porcentaje_reserva_refaccion':2,
        'garantia_adicional':0,
        'porcentaje_garantia_adicional':0,
        'patrocinio_congreso_publicacion':0,
        'porcentaje_patrocinio_congreso_publicacion':0,
        'cargo_bancario':0,
        'porcentaje_cargo_bancario':0,
        'subtotal_2':0,
        'porcentaje_subtotal_2':0,
        'financiera':0,
        'porcentaje_financiera':0,
        'distribuidor':0,
        'porcentaje_distribuidor':0,
        'otros':0,
        'porcentaje_otros':0,
        'subtotal_3':0,
        'porcentaje_subtotal_3':0,
        'capacitacion':0,
        'porcentaje_capacitacion':0,
        'comision':0,
        'porcentaje_comision':0,
        'margen_negocio':0,
        'porcentaje_margen_negocio':0,
        'precio_venta':0,//      109780.91,
        'observaciones':"", /////////////////////////////////////////////////////////////////////////// PRECALCULO
        'numero_proyecto':"",
        'venta_total_t_i':0,
        'valor_venta_e_i':0,
        'valor_venta_servicio_e_p':0,
        'valor_venta_servicio_e_i':0,
        'valor_venta_servicio_s_p':0,
        'valor_venta_servicio_s_i':0,
        'valor_venta_servicio_t_p':0,
        'valor_venta_servicio_t_i':0,
        'costo_venta_producto_e_p':0,
        'costo_venta_producto_e_i':0,
        'costo_venta_producto_s_p':0,
        'costo_venta_producto_s_i':0,
        'costo_venta_producto_t_p':0,
        'costo_venta_producto_t_i':0,
        'costo_venta_terceros_e_p':0,
        'costo_venta_terceros_e_i':0,
        'costo_venta_terceros_s_p':0,
        'costo_venta_terceros_s_i':0,
        'costo_venta_terceros_t_p':0,
        'costo_venta_terceros_t_i':0,
        'remplazo_parte_servicio_e_p':0,
        'remplazo_parte_servicio_e_i':0,
        'remplazo_parte_servicio_s_p':0,
        'remplazo_parte_servicio_s_i':0,
        'remplazo_parte_servicio_t_p':0,
        'remplazo_parte_servicio_t_i':0,
        'costo_material_e_p':0,
        'costo_material_e_i':0,
        'costo_material_s_p':0,
        'costo_material_s_i':0,
        'costo_material_t_p':0,
        'costo_material_t_i':0,
        'preparacion_sitio_e_p':0,
        'preparacion_sitio_e_i':0,
        'preparacion_sitio_s_p':0,
        'preparacion_sitio_s_i':0,
        'preparacion_sitio_t_p':0,
        'preparacion_sitio_t_i':0,
        'preparacion_sitio_agente_e_p':0,
        'preparacion_sitio_agente_e_i':0,
        'preparacion_sitio_agente_s_p':0,
        'preparacion_sitio_agente_s_i':0,
        'preparacion_sitio_agente_t_p':0,
        'preparacion_sitio_agente_t_i':0,
        'preparacion_sitio_tercero_e_p':0,
        'preparacion_sitio_tercero_e_i':0,
        'preparacion_sitio_tercero_s_p':0,
        'preparacion_sitio_tercero_s_i':0,
        'preparacion_sitio_tercero_t_p':0,
        'preparacion_sitio_tercero_t_i':0,
        'costo_instalacion_e_p':0,
        'costo_instalacion_e_i':0,
        'costo_instalacion_s_p':0,
        'costo_instalacion_s_i':0,
        'costo_instalacion_s_i':0,
        'costo_instalacion_t_p':0,
        'costo_instalacion_t_i':0,
        'costo_instalacion_agente_e_p':0,
        'costo_instalacion_agente_e_i':0,
        'costo_instalacion_agente_s_p':0,
        'costo_instalacion_agente_s_i':0,
        'costo_instalacion_agente_t_p':0,
        'costo_instalacion_agente_t_i':0,
        'costo_instalacion_terceros_e_p':0,
        'costo_instalacion_terceros_e_i':0,
        'costo_instalacion_terceros_s_p':0,
        'costo_instalacion_terceros_s_i':0,
        'costo_instalacion_terceros_t_p':0,
        'costo_instalacion_terceros_t_i':0,
        'mano_obra_subcontr_interna_e_p':0,
        'mano_obra_subcontr_interna_e_i':0,
        'mano_obra_subcontr_interna_s_p':0,
        'mano_obra_subcontr_interna_s_i':0,
        'mano_obra_subcontr_interna_t_p':0,
        'mano_obra_subcontr_interna_t_i':0,
        'mano_obra_subcontr_terceros_e_p':0,
        'mano_obra_subcontr_terceros_e_i':0,
        'mano_obra_subcontr_terceros_s_p':0,
        'mano_obra_subcontr_terceros_s_i':0,
        'mano_obra_subcontr_terceros_t_p':0,
        'mano_obra_subcontr_terceros_t_i':0,
        'capacitacion_cliente_e_p':0,
        'capacitacion_cliente_e_i':0,
        'capacitacion_cliente_s_p':0,
        'capacitacion_cliente_s_i':0,
        'capacitacion_cliente_t_p':0,
        'capacitacion_cliente_t_i':0,
        'costo_venta_e_p':0,
        'costo_venta_e_i':0,
        'costo_venta_s_p':0,
        'costo_venta_s_i':0,
        'costo_venta_t_p':0,
        'costo_venta_t_i':0,
        'margen_bruto_e_p':"",
        'margen_bruto_e_i':"",
        'margen_bruto_s_p':"",
        'margen_bruto_s_i':"",
        'margen_bruto_t_p':"",
        'margen_bruto_t_i':"",
        'garantia_parte_e_p':0,
        'garantia_parte_e_i':0,
        'garantia_parte_s_p':0,
        'garantia_parte_s_i':0,
        'garantia_parte_t_p':0,
        'garantia_parte_t_i':0,
        'garantia_mano_obra_e_p':0,
        'garantia_mano_obra_e_i':0,
        'garantia_mano_obra_s_p':0,
        'garantia_mano_obra_s_i':0,
        'garantia_mano_obra_t_p':0,
        'garantia_mano_obra_t_i':0,
        'comision_pagar_tercero_e_p':0,
        'comision_pagar_tercero_e_i':0,
        'comision_pagar_tercero_s_p':0,
        'comision_pagar_tercero_s_i':0,
        'comision_pagar_tercero_t_p':0,
        'comision_pagar_tercero_t_i':0,
        'comision_agente_venta_e_p':0,
        'comision_agente_venta_e_i':0,
        'comision_agente_venta_s_p':0,
        'comision_agente_venta_s_i':0,
        'comision_agente_venta_t_p':0,
        'comision_agente_venta_t_i':0,
        'servicio_externo_e_p':0,
        'servicio_externo_e_i':0,
        'servicio_externo_s_p':0,
        'servicio_externo_s_i':0,
        'servicio_externo_t_p':0,
        'servicio_externo_t_i':0,
        'capacitacion_personal_e_p':0,
        'capacitacion_personal_e_i':0,
        'capacitacion_personal_s_p':0,
        'capacitacion_personal_s_i':0,
        'capacitacion_personal_t_p':0,
        'capacitacion_personal_t_i':0,
        'publicidad_patrocinio_congreso_e_p':0,
        'publicidad_patrocinio_congreso_e_i':0,
        'publicidad_patrocinio_congreso_s_p':0,
        'publicidad_patrocinio_congreso_s_i':0,
        'publicidad_patrocinio_congreso_t_p':0,
        'publicidad_patrocinio_congreso_t_i':0,
        'cargo_bancario_e_p':0,
        'cargo_bancario_e_i':0,
        'cargo_bancario_s_p':0,
        'cargo_bancario_s_i':0,
        'cargo_bancario_t_p':0,
        'cargo_bancario_t_i':0,
        'costo_financiero_e_p':0,
        'costo_financiero_e_i':0,
        'costo_financiero_s_p':0,
        'costo_financiero_s_i':0,
        'costo_financiero_t_p':0,
        'costo_financiero_t_i':0,
        'gasto_viaje_cliente_e_p':0,
        'gasto_viaje_cliente_e_i':0,
        'gasto_viaje_cliente_s_p':0,
        'gasto_viaje_cliente_s_i':0,
        'gasto_viaje_cliente_t_p':0,
        'gasto_viaje_cliente_t_i':0,
        'gasto_viaje_personal_smh_e_p':0,
        'gasto_viaje_personal_smh_e_i':0,
        'gasto_viaje_personal_smh_s_p':0,
        'gasto_viaje_personal_smh_s_i':0,
        'gasto_viaje_personal_smh_t_p':0,
        'gasto_viaje_personal_smh_t_i':0,
        'impuesto_aduanal_e_p':0,
        'impuesto_aduanal_e_i':0,
        'impuesto_aduanal_s_p':0,
        'impuesto_aduanal_s_i':0,
        'impuesto_aduanal_t_p':0,
        'impuesto_aduanal_t_i':0,
        'flete_e_p':0,
        'flete_e_i':0,
        'flete_s_p':0,
        'flete_s_i':0,
        'flete_t_p':0,
        'flete_t_i':0,
        'seguro_e_p':0,
        'seguro_e_i':0,
        'seguro_s_p':0,
        'seguro_s_i':0,
        'seguro_t_p':0,
        'seguro_t_i':0,
        'costo_proyecto_e_p':"",
        'costo_proyecto_e_i':"",
        'costo_proyecto_s_p':"",
        'costo_proyecto_s_i':"",
        'costo_proyecto_t_p':"",
        'costo_proyecto_t_i':"",
        'gasto_venta_dedicado_e_p':"",
        'gasto_venta_dedicado_e_i':"",
        'gasto_venta_dedicado_s_p':"",
        'gasto_venta_dedicado_s_i':"",
        'gasto_venta_dedicado_t_p':"",
        'gasto_venta_dedicado_t_i':"",

    };

    $scope.conf=
    {
        headerCrear:"GENERAR NUEVO ",
        headerEditar:"ACTUALIZACION ",
        successEdit:"ACTUALIZAR",
        successCrea:"GUARDAR"
    };

    $scope.rsc= {
                id:"",
                subtotal:"",
                iva:"",
                total:""
                }

    $scope.rscI= {
                id:"",
                precio:""
                }

angular.extend(this,$controller('CotizacionPdfCtrl',{$scope:$scope}));
    /* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
    $scope.openCotizacion = function(o) {        console.log(o);       // alert(o);
        if(confirm('¿DESEA GENERAR EL PRECALCULO?')){
                    window.location = '/precalculos/create?id_cotizacion='+o;                    //$scope.consultarCotizacion(o);
                }
                else{
                    alert("¡ SOLICITUD CANCELADA !");
                }
    }    //$scope.bandera={t:'T',e:'E'};

$scope.ultimoPrecalculo =function(tipo_equipo){
          ultimoPreSrc.get(function(data){
            if(tipo_equipo=="ULTRASONIDO"){tipo_equipo="US"}
            else if(tipo_equipo=="RAYOS X"){
                tipo_equipo="RX";
            }
          $scope.ultimos=data.ultimo[0];  console.log(data.ultimo[0]);
          if($scope.ultimos == undefined){            //alert("vacio"); 
          var h=("000"+1).slice(-4);
          $scope.precalculos.numero_proyecto=tipo_equipo+"-"+h;                              console.log($scope.precalculos.numero_proyecto);
          }else{            //alert("LLENO");
          var h=parseInt($scope.ultimos.id)+1; 
          h=("000"+h).slice(-4);
          $scope.precalculos.numero_proyecto=tipo_equipo+"-"+h;              console.log($scope.precalculos.numero_proyecto);
          }
        });
      }

    $scope.actualizar=function (){
        precalculosSrc.update($scope.precalculos,function(data){ //P estaba en mayuscula
            window.location = $location.absUrl();
        },function(err){alert("ERROR EN CONEXION.");});
    }

    $scope.actualizarPrecioVenta = function (data){
        console.log($scope.rsc); 
        if(confirm("¿DESEA ACTUALIZAR EL PRECIO DE LA COTIZACION?")){
        cotizacionSrc.update($scope.rsc,function(data){ //P estaba en mayuscula
            //window.location = $location.absUrl(); 
           console.log(data);
       if(confirm('¿DESEA VER EL PRECALCULO EN FORMATO PDF ?')){
                        $scope.openPrecalculoPdf($scope.precalculos,$scope.sucursal,$scope.cotizacion.numero_cotizacion,$scope.cotizacion.fecha_entrega,$scope.cotizacion.nombre_fiscal,$scope.cotizacion.nombre_empleado,$scope.insumos[0].descripcion);
                       // $scope.pagarePdf();
                    }else{alert("¡ Cancelar accion !");}
           /*cotizacionPaqueteInsumoSrc.update($scope.rscI,function(data){ //P estaba en mayuscula*/
            //window.location = $location.absUrl(); 
           //console.log(data);
            //},function(err){alert("ERROR EN CONEXION.");});
        },function(err){alert("ERROR EN CONEXION.");});
        }else{alert("¡ Acción cancelada !");}
    }    

    
    $scope.eliminar=function (i){
        recursoSrc.delete({id:i.id},function(data){
               window.location = $location.absUrl();
        },function(err){alert("ERROR EN CONEXION.");});
    }
    $scope.restaurar=function (i){
        recursoSrc.delete({id:i.id},function(data){
               window.location = $location.absUrl();
        },function(err){alert("ERROR EN CONEXION.");});
    }

    $scope.guardar=function (){        //console.log("GUARDAR EL ARCHIVO: " );
    if(confirm("¿DESEA GUARDAR EL PRECALCULO?")){
        precalculosSrc.save($scope.precalculos,function(){      //P estaba en mayuscula              // window.location = $location.absUrl();             // window.location = '/cotizacionPaqueteInsumo/';
        
            alert("¡¡ Precálculo guardado exitosamente !!");
                    if(confirm('¿DESEA VER EL PRECALCULO EN FORMATO PDF ?')){
                        $scope.openPrecalculoPdf($scope.precalculos,$scope.sucursal,$scope.cotizacion.numero_cotizacion,$scope.cotizacion.fecha_entrega,$scope.cotizacion.nombre_fiscal,$scope.cotizacion.nombre_empleado,$scope.insumos[0].descripcion);
                       // $scope.pagarePdf();
                    }else{alert("¡ Cancelar accion !")}

        },function(err){alert("ERROR EN CONEXION.");});
    }else{
            alert("¡¡ SOLICITUD CANCELADA !!");
        }
    }

    $scope.consultar=function (){
        precalculosSrc.get({id:$scope.precalculos.id},function(data){ console.log(data.precalculo.cotizacion[0]); //Se corrigio (p)recalculos estaba en mayuscula la inicial (P)
            $scope.precalculos=data.precalculo;
            $scope.cotizacion=$scope.precalculos.cotizacion[0];
            $scope.insumo=$scope.precalculos.insumos;               console.log($scope.precalculos.insumos);
            var sucursal=$scope.cotizacion.numero_cotizacion.split("-")
            $scope.sucursal=sucursal[1];
        },function(err){alert("ERROR EN CONEXION.");});
    }

    $scope.consultarCotizacion=function (c){
        var h=0;var i=0;
        cotizacionPaqueteInsumoSrc.get({id:c},function(data){
            $scope.cotizacion=data.cotizacion;                        console.log($scope.cotizacion);
            $scope.insumos=$scope.cotizacion.insumos;                  console.log($scope.insumos);//
            $scope.ultimoPrecalculo($scope.insumos[0].tipo_equipo);
            //if($scope.insumos.tipo_equipo=="ULTRASONIDO"){ALERT("US");}

            var sucursal=$scope.cotizacion.numero_cotizacion.split("-");
            $scope.sucursal=sucursal[1];//              console.log($scope.cotizacion.numero_cotizacion);              //              console.log($scope.insumos[1].insumo_modelo);      
              $scope.precalculos.moneda=$scope.insumos[1].insumo_tipo_cambio;        
              $scope.precalculos.id_cotizaciones_paquetes_insumos=$scope.cotizacion.id;   
              $scope.rsc.id=$scope.cotizacion.id;     
              h=$scope.insumos.length;
              while(i<h){
                console.log($scope.insumos[i].bandera_insumo);
                if($scope.insumos[i].bandera_insumo === "E" || $scope.insumos[i].bandera_insumo === "EQUIPO"){
                    $scope.rscI.id=$scope.insumos[i].id; console.log($scope.rscI);
                }
                i++;
              }

        }); 
    }

    $timeout(function() {   //alert("okkk"); console.log($scope.precalculos.vista);
        if ($scope.precalculos.vista===0){      //alert($scope.precalculos.id_cotizacion);
           $scope.consultarCotizacion($scope.precalculos.id_cotizacion);
        }
        else if ($scope.precalculos.vista===1){
                $scope.consultar();
        }
    }, 1000);

    var dat= new Date();
        var d = dat.getDate();
        var m = dat.getMonth();
        var y = dat.getFullYear();
        $scope.precalculos.fecha_tipo_cambio='2016-03-10';
        $scope.fecha=(y+'-'+ ('0'+(m+1)).slice(-2) +'-'+('0'+d).slice(-2));
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// MONEDA
$scope.buscarTipoCambioActual = function(){
            conversionSrc.get({vi:0,validto:$scope.precalculos.fecha_tipo_cambio},function(data){        //console.log(data);
              if(data.conversiones.length==0){
                alert("¡¡ NO HAY TIPO DE CAMBIO DE LA FECHA: "+$scope.fecha_tipo_cambio+" \n FAVOR DE VERIFICAR EN SISTEMA !!");}
              else{
                              var c_cambio=data.conversiones[0].dividerate;                     //console.log(c_cambio);
                                $scope.precalculos.tipo_cambio=$filter('number')(c_cambio, 2);  //return $scope.c_cambio_c;
                  }
            });        
}     
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// DATOS CLIENTE
$scope.setTotals = function(item,insumos){          //    console.log(item);    console.log($scope.precalculos.precio_compra_insumos);
          if (item){            
            $scope.precalculos.modelo_insumos += insumos+",";                    //console.log(item);
            $scope.precalculos.precio_compra_insumos = $scope.precalculos.precio_compra_insumos + parseFloat(item);                  console.log($scope.precalculos.precio_compra_insumos);   //console.log($scope.precalculos.precio_compra_insumos);
          }
        }
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// CALCULO IMAGENOLOGIA
$scope.calImagenologia = function(monto,tipoEquipo,modelo,tipoCambio){
        alert(tipoEquipo+" "+modelo);
        $scope.precalculos.precio_dolares=monto.replace(',','');                                            //console.log(monto);
        $scope.consultarCatalogo(modelo);
        $scope.model="Calculando . . . "+modelo;
        $scope.monto=monto;
        $scope.monedas=tipoCambio;
    }

$scope.consultarCatalogo=function (modelo){
        catalogosCalculoSrc.get({modelo:modelo},function(data){ console.log(data.pagares.data.length);  // CATALOGO
            if(data.pagares.data.length === 0){
               // alert("FAVOR DE AGREGAR DATOS DEL EQUIPO EN CATALOGO PARA PRECALCULO");
                if(confirm("¿DECEA DAR DE ALTA EL MODELO "+modelo+" EN EL CATALOGO PARA EL PRECALCULO?")){
                 window.location = '/catalogos_calculo/create?modelo='+modelo;                    //$scope.consultarCotizacion(o);   
                }else{
                    alert("¡ SOLICITUD CANCELADA !");
                }
            }
            else{
            $scope.catalogo_calculo=data.pagares.data[0];  
            $scope.precalculos.id_catalogo=$scope.catalogo_calculo.id;                                      //console.log($scope.catalogo_calculo.id);                                      console.log($scope.catalogo_calculo.porcentaje_impuesto_importacion);
            $scope.precalculos.fecha_catalogo=$scope.catalogo_calculo.updated_at;                           //console.log($scope.catalogo_calculo.id);                                      console.log($scope.catalogo_calculo.porcentaje_impuesto_importacion);
            $scope.precalculos.precio_dolares_descuento= formula.getResta2($scope.precalculos.precio_dolares,$scope.precalculos.descuento);
            $scope.precalculos.precio_dolares_descuento=$scope.precalculos.precio_dolares_descuento.toFixed(2);
            $scope.precalculos.costo_venta_producto_e_i=$scope.precalculos.precio_dolares_descuento;
        
        $scope.precalculos.porcentaje_impuesto_importacion=parseFloat($scope.catalogo_calculo.porcentaje_impuesto_importacion);             //console.log($scope.precalculos.porcentaje_impuesto_importacion);
        $scope.precalculos.porcentaje_impuesto_importacion=$scope.precalculos.porcentaje_impuesto_importacion.toFixed(2);
            $scope.precalculos.impuesto_importacion= formula.getPorcentaje2($scope.precalculos.precio_dolares_descuento,$scope.precalculos.porcentaje_impuesto_importacion);
            $scope.precalculos.impuesto_importacion=$scope.precalculos.impuesto_importacion.toFixed(2);
        $scope.precalculos.h_agente_aduanal=parseFloat($scope.catalogo_calculo.h_agente_aduanal);
        $scope.precalculos.h_agente_aduanal=$scope.precalculos.h_agente_aduanal.toFixed(2);
            $scope.precalculos.agente_aduanal= formula.getPorcentaje2($scope.precalculos.precio_dolares_descuento,$scope.precalculos.h_agente_aduanal);
            $scope.precalculos.agente_aduanal=$scope.precalculos.agente_aduanal.toFixed(2);
        $scope.precalculos.impuesto_aduanal_e_i=parseFloat($scope.precalculos.agente_aduanal) + parseFloat($scope.precalculos.impuesto_importacion);
        $scope.precalculos.impuesto_aduanal_e_i=$scope.precalculos.impuesto_aduanal_e_i.toFixed(2);
        //if($scope.catalogo_calculo.flete === undefined)
        console.log($scope.catalogo_calculo.flete);
        $scope.precalculos.flete=parseFloat($scope.catalogo_calculo.flete);
        $scope.precalculos.flete=$scope.precalculos.flete.toFixed(2);
        $scope.precalculos.flete_e_i = $scope.precalculos.flete;
        
        $scope.precalculos.costo_instalacion=parseFloat($scope.catalogo_calculo.costo_instalacion);//.toFixed(2);
        $scope.precalculos.costo_instalacion=$scope.precalculos.costo_instalacion.toFixed(2);
    $scope.precalculos.costo_instalacion_e_i=parseFloat($scope.catalogo_calculo.costo_instalacion);
    $scope.precalculos.costo_instalacion_e_i=$scope.precalculos.costo_instalacion_e_i.toFixed(2);
            
        $scope.precalculos.preparacion_sitio=parseFloat($scope.catalogo_calculo.costo_visita_proyectos);//.toFixed(2);
        $scope.precalculos.preparacion_sitio=$scope.precalculos.preparacion_sitio.toFixed(2);
    $scope.precalculos.preparacion_sitio_e_i=parseFloat($scope.catalogo_calculo.costo_visita_proyectos);
    $scope.precalculos.preparacion_sitio_e_i=$scope.precalculos.preparacion_sitio_e_i.toFixed(2);
$scope.calPreparacionSitioTI();

            $scope.precalculos.subtotal_1= formula.getSuma12($scope.precalculos.precio_dolares_descuento, $scope.precalculos.impuesto_importacion, $scope.precalculos.agente_aduanal, $scope.precalculos.flete, $scope.precalculos.costo_instalacion, $scope.precalculos.preparacion_sitio, $scope.precalculos.precio_compra_insumos,0,0,0,0,0,0,0);//7
            $scope.precalculos.subtotal_1=$scope.precalculos.subtotal_1.toFixed(2);
            console.log($scope.precalculos.subtotal_1);

        $scope.precalculos.total_costo_instalacion_garantia=$scope.catalogo_calculo.total_costo_instalacion_garantia;

            $scope.precalculos.subtotal_2=formula.getSuma5($scope.precalculos.total_costo_instalacion_garantia,$scope.precalculos.reserva_refaccion,$scope.precalculos.garantia_adicional,$scope.precalculos.patrocinio_congreso_publicacion,$scope.precalculos.cargo_bancario);
            $scope.precalculos.subtotal_2=$scope.precalculos.subtotal_2.toFixed(2);
            console.log($scope.precalculos.subtotal_2);
            
            $scope.precalculos.subtotal_3=formula.getSuma5($scope.precalculos.financiera,$scope.precalculos.distribuidor,$scope.precalculos.otros,0,0);
            $scope.precalculos.subtotal_3=$scope.precalculos.subtotal_3.toFixed(2);
            console.log($scope.precalculos.subtotal_2);

        $scope.calPrecioVenta();
            $scope.precalculos.margen_bruto= formula.getResta2($scope.precalculos.precio_venta,$scope.precalculos.subtotal_1);
            $scope.precalculos.margen_bruto=$scope.precalculos.margen_bruto.toFixed(2);
            $scope.precalculos.margen_negocio= formula.getMN($scope.precalculos.margen_bruto,$scope.precalculos.subtotal_2,$scope.precalculos.subtotal_3);
            $scope.precalculos.margen_negocio=$scope.precalculos.margen_negocio.toFixed(2);

            //$scope.precalculos.precio_venta=$scope.catalogo_calculo.flete;
            $scope.precalculos.porcentaje_flete= formula.getPorcentaje($scope.precalculos.flete,$scope.precalculos.precio_venta);  ////////////////////CHECANDO OK
            $scope.precalculos.porcentaje_flete=$scope.precalculos.porcentaje_flete.toFixed(2);
            $scope.precalculos.porcentaje_costo_instalacion= formula.getPorcentaje($scope.precalculos.costo_instalacion,$scope.precalculos.precio_venta);
            $scope.precalculos.porcentaje_costo_instalacion=$scope.precalculos.porcentaje_costo_instalacion.toFixed(2);
            $scope.precalculos.porcentaje_preparacion_sitio= formula.getPorcentaje($scope.precalculos.preparacion_sitio,$scope.precalculos.precio_venta);
            $scope.precalculos.porcentaje_preparacion_sitio=$scope.precalculos.porcentaje_preparacion_sitio.toFixed(2);
            $scope.precalculos.porcentaje_insumos= formula.getPorcentaje($scope.precalculos.precio_compra_insumos,$scope.precalculos.precio_venta);
            $scope.precalculos.porcentaje_subtotal_1= formula.getPorcentaje($scope.precalculos.subtotal_1,$scope.precalculos.precio_venta);
            $scope.precalculos.porcentaje_subtotal_1=$scope.precalculos.porcentaje_subtotal_1.toFixed(2);
            $scope.precalculos.porcentaje_margen_bruto= formula.getPorcentaje($scope.precalculos.margen_bruto,$scope.precalculos.precio_venta);
            $scope.precalculos.porcentaje_margen_bruto=$scope.precalculos.porcentaje_margen_bruto.toFixed(2);
        $scope.precalculos.garantia_mano_obra_e_i=parseFloat($scope.precalculos.total_costo_instalacion_garantia);
        console.log($scope.precalculos.garantia_mano_obra_e_i);
    $scope.calGarantiaManoObraEP();
    $scope.calGarantiaManoObraTI();
            $scope.precalculos.porcentaje_garantia= formula.getPorcentaje($scope.precalculos.total_costo_instalacion_garantia,$scope.precalculos.precio_venta);
            $scope.precalculos.porcentaje_garantia=$scope.precalculos.porcentaje_garantia.toFixed(2);
            $scope.precalculos.porcentaje_reserva_refaccion= $scope.precalculos.porcentaje_reserva_refaccion.toFixed(2);
            $scope.precalculos.porcentaje_garantia_adicional= formula.getPorcentaje($scope.precalculos.garantia_adicional,$scope.precalculos.precio_venta);
            $scope.precalculos.porcentaje_garantia_adicional=$scope.precalculos.porcentaje_garantia_adicional.toFixed(2);
        $scope.calVentaTotalTI();  
        $scope.calValorVentaServicioSP();
        $scope.calValorVentaServicioTI();
            $scope.precalculos.porcentaje_subtotal_2= formula.getPorcentaje($scope.precalculos.subtotal_2,$scope.precalculos.precio_venta);
            $scope.precalculos.porcentaje_subtotal_2=$scope.precalculos.porcentaje_subtotal_2.toFixed(2);
            $scope.precalculos.porcentaje_subtotal_3= formula.getPorcentaje($scope.precalculos.subtotal_3,$scope.precalculos.precio_venta);
            $scope.precalculos.porcentaje_subtotal_3=$scope.precalculos.porcentaje_subtotal_3.toFixed(2);
            $scope.precalculos.porcentaje_margen_negocio= formula.getPorcentaje($scope.precalculos.margen_negocio,$scope.precalculos.precio_venta);
            $scope.precalculos.porcentaje_margen_negocio=$scope.precalculos.porcentaje_margen_negocio.toFixed(2);
          //  $scope.calPrecioVenta();
          $scope.calCostosProyecto();
          
}
        },function(err){alert("ERROR EN CONEXION.");});
    }
        $scope.subTotales = function(){
            $scope.precalculos.subtotal_1= formula.getSuma12($scope.precalculos.precio_dolares_descuento, $scope.precalculos.impuesto_importacion, $scope.precalculos.agente_aduanal, $scope.precalculos.flete, $scope.precalculos.costo_instalacion, $scope.precalculos.preparacion_sitio, $scope.precalculos.precio_compra_insumos,0,0,0,0,0,0,0);//7            
            $scope.precalculos.subtotal_1=$scope.precalculos.subtotal_1.toFixed(2);
        $scope.precalculos.garantia_parte_e_i=$scope.precalculos.reserva_refaccion;
            $scope.precalculos.subtotal_2=formula.getSuma5($scope.precalculos.total_costo_instalacion_garantia,$scope.precalculos.reserva_refaccion,$scope.precalculos.garantia_adicional,$scope.precalculos.patrocinio_congreso_publicacion,$scope.precalculos.cargo_bancario);
            $scope.precalculos.subtotal_2=$scope.precalculos.subtotal_2.toFixed(2);
            $scope.precalculos.subtotal_3=formula.getSuma5($scope.precalculos.financiera,$scope.precalculos.distribuidor,$scope.precalculos.otros,0,0);
            $scope.precalculos.subtotal_3=$scope.precalculos.subtotal_3.toFixed(2);
        }

        $scope.calPrecioVenta = function(){
            $scope.precalculos.precio_venta=formula.getPV($scope.precalculos.subtotal_1,$scope.precalculos.subtotal_2,$scope.precalculos.capacitacion,$scope.precalculos.porcentaje_financiera,$scope.precalculos.porcentaje_distribuidor,$scope.precalculos.porcentaje_otros,$scope.precalculos.porcentaje_comision);
            $scope.precalculos.precio_venta=$scope.precalculos.precio_venta.toFixed(2);
            $scope.precalculos.valor_venta_e_i=$scope.precalculos.precio_venta;
            console.log($scope.precalculos.precio_venta);
            $scope.calCostoVentaProductoEP();
            $scope.calCostoVentaProductoTI();
            $scope.calSumasCostoMateriales();
            $scope.calPreparacionSitioEP();
            $scope.calPreparacionSitioTI();
            $scope.calCostoInstalacionEP();
            $scope.calCostoInstalacionTI();
            $scope.calCapacitacionClienteEP();
            $scope.calCapacitacionClienteTI();
            $scope.calCostoVentas();
            $scope.calMargenBruto();
            $scope.calGarantiaPartesEP();
            $scope.calGarantiaPartesTI();
            $scope.calGarantiaManoObraEP();
            $scope.calGarantiaManoObraTI();
            $scope.calComisionTerceroEP();
            $scope.calComisionTerceroTI();
            $scope.calComisionAgenteEP();
            $scope.calComisionAgenteTI();
            $scope.calPublicidadEP();
            $scope.calPublicidadTI();
            $scope.calBancariosEP();
            $scope.calBancariosTI();
            $scope.calFinancieroEP();
            $scope.calFinancieroTI();
            $scope.calImpuestosAduanalesEP();
            $scope.calImpuestosAduanalesTI();
            $scope.calFleteEP();
            $scope.calFleteSP();
            $scope.calFleteTI();
            $scope.calCostosProyecto();
            $scope.calGastoVentaDedicado();
            //$scope.rsc.subtotal=$scope.precalculos.precio_venta; console.log($scope.rsc); 
            var sub=parseFloat($scope.precalculos.precio_venta); console.log($scope.rsc); 
            $scope.rsc.subtotal=sub.toFixed(2);
            var iva=(parseFloat($scope.precalculos.precio_venta)*.16); console.log(iva);
            $scope.rsc.iva=iva.toFixed(2);;
            var total=parseFloat($scope.precalculos.precio_venta)+iva; console.log(total);
            $scope.rsc.total=total.toFixed(2);;
            $scope.rscI.precio=$scope.precalculos.precio_venta; console.log($scope.rscI);
        }

        $scope.porcentajes = function(){
            $scope.precalculos.porcentaje_flete= formula.getPorcentaje($scope.precalculos.flete,$scope.precalculos.precio_venta);  
            $scope.precalculos.porcentaje_flete=$scope.precalculos.porcentaje_flete.toFixed(2);
        $scope.precalculos.costo_instalacion_e_i=$scope.precalculos.costo_instalacion;
            $scope.precalculos.porcentaje_costo_instalacion= formula.getPorcentaje($scope.precalculos.costo_instalacion,$scope.precalculos.precio_venta);
            $scope.precalculos.porcentaje_costo_instalacion=$scope.precalculos.porcentaje_costo_instalacion.toFixed(2);
        $scope.precalculos.preparacion_sitio_e_i=$scope.precalculos.preparacion_sitio;
    $scope.calPreparacionSitioTI();
            $scope.precalculos.porcentaje_preparacion_sitio= formula.getPorcentaje($scope.precalculos.preparacion_sitio,$scope.precalculos.precio_venta);
            $scope.precalculos.porcentaje_preparacion_sitio=$scope.precalculos.porcentaje_preparacion_sitio.toFixed(2);
            $scope.precalculos.porcentaje_insumos= formula.getPorcentaje($scope.precalculos.precio_compra_insumos,$scope.precalculos.precio_venta);
            $scope.precalculos.porcentaje_subtotal_1= formula.getPorcentaje($scope.precalculos.subtotal_1,$scope.precalculos.precio_venta);
            $scope.precalculos.porcentaje_subtotal_1=$scope.precalculos.porcentaje_subtotal_1.toFixed(2);
            $scope.precalculos.porcentaje_margen_bruto= formula.getPorcentaje($scope.precalculos.margen_bruto,$scope.precalculos.precio_venta);
            $scope.precalculos.porcentaje_margen_bruto=$scope.precalculos.porcentaje_margen_bruto.toFixed(2);
        $scope.precalculos.garantia_mano_obra_e_i=$scope.precalculos.total_costo_instalacion_garantia;
        console.log($scope.total_costo_instalacion_garantia);
    $scope.calGarantiaManoObraEP();
    $scope.calGarantiaManoObraTI();
    //$scope.calCostosProyecto();
    //$scope.calGastoVentaDedicado();
            $scope.precalculos.porcentaje_garantia= formula.getPorcentaje($scope.precalculos.total_costo_instalacion_garantia,$scope.precalculos.precio_venta);
            $scope.precalculos.porcentaje_garantia=$scope.precalculos.porcentaje_garantia.toFixed(2);
            //$scope.precalculos.porcentaje_reserva_refaccion= formula.getPorcentaje($scope.precalculos.reserva_refaccion,$scope.precalculos.precio_venta);
        $scope.precalculos.valor_venta_servicio_s_i=$scope.precalculos.garantia_adicional;
            $scope.precalculos.porcentaje_garantia_adicional= formula.getPorcentaje($scope.precalculos.garantia_adicional,$scope.precalculos.precio_venta);
            $scope.precalculos.porcentaje_garantia_adicional=$scope.precalculos.porcentaje_garantia_adicional.toFixed(2);
        $scope.calVentaTotalTI();  
        $scope.calValorVentaServicioSP();
        $scope.calValorVentaServicioTI();
        $scope.precalculos.publicidad_patrocinio_congreso_e_i=$scope.precalculos.patrocinio_congreso_publicacion;
            $scope.precalculos.porcentaje_patrocinio_congreso_publicacion= formula.getPorcentaje($scope.precalculos.patrocinio_congreso_publicacion,$scope.precalculos.precio_venta);
            $scope.precalculos.porcentaje_patrocinio_congreso_publicacion=$scope.precalculos.porcentaje_patrocinio_congreso_publicacion.toFixed(2);
        $scope.precalculos.cargo_bancario_e_i=$scope.precalculos.cargo_bancario;
    $scope.calBancariosEP();
    $scope.calBancariosTI();
            $scope.precalculos.porcentaje_cargo_bancario= formula.getPorcentaje($scope.precalculos.cargo_bancario,$scope.precalculos.precio_venta);
            $scope.precalculos.porcentaje_cargo_bancario=$scope.precalculos.porcentaje_cargo_bancario.toFixed(2);
            $scope.precalculos.porcentaje_subtotal_2= formula.getPorcentaje($scope.precalculos.subtotal_2,$scope.precalculos.precio_venta);
            $scope.precalculos.porcentaje_subtotal_2=$scope.precalculos.porcentaje_subtotal_2.toFixed(2);
            $scope.precalculos.porcentaje_subtotal_3= formula.getPorcentaje($scope.precalculos.subtotal_3,$scope.precalculos.precio_venta);
            $scope.precalculos.porcentaje_subtotal_3=$scope.precalculos.porcentaje_subtotal_3.toFixed(2);
        $scope.precalculos.capacitacion_cliente_e_i=$scope.precalculos.capacitacion;
            $scope.precalculos.porcentaje_capacitacion= formula.getPorcentaje($scope.precalculos.capacitacion,$scope.precalculos.precio_venta);
            $scope.precalculos.porcentaje_capacitacion=$scope.precalculos.porcentaje_capacitacion.toFixed(2);
            $scope.precalculos.porcentaje_margen_negocio= formula.getPorcentaje($scope.precalculos.margen_negocio,$scope.precalculos.precio_venta);
            $scope.precalculos.porcentaje_margen_negocio=$scope.precalculos.porcentaje_margen_negocio.toFixed(2);
        }

        $scope.calImpMargenBruto = function(){
            $scope.precalculos.margen_bruto= formula.getResta2($scope.precalculos.precio_venta,$scope.precalculos.subtotal_1);
            $scope.precalculos.margen_bruto=$scope.precalculos.margen_bruto.toFixed(2);
            //$scope.precalculos.porcentaje_margen_bruto= formula.getPorcentaje($scope.precalculos.margen_bruto,$scope.precalculos.precio_venta);
        }

        $scope.calMargenNegocio = function(){
            $scope.calFinanciera();
            $scope.calDistribuidor();
            $scope.calOtros();
            $scope.subTotales();
            $scope.calPrecioVenta();
            $scope.precalculos.margen_negocio= formula.getMN($scope.precalculos.margen_bruto,$scope.precalculos.subtotal_2,$scope.precalculos.subtotal_3);
            $scope.precalculos.margen_negocio=$scope.precalculos.margen_negocio.toFixed(2);
            //$scope.precalculos.porcentaje_margen_negocio= formula.getPorcentaje($scope.precalculos.margen_negocio,$scope.precalculos.precio_venta);
        }
/* ------------------------------------------------------------------------------------------------------------------------------------------*/
        $scope.calPrecioDescuento = function(){
            $scope.precalculos.precio_dolares_descuento= formula.getResta2($scope.precalculos.precio_dolares,$scope.precalculos.descuento);
        }

        $scope.calImpImp = function(){
            $scope.precalculos.impuesto_importacion= formula.getPorcentaje2($scope.precalculos.precio_dolares_descuento,$scope.precalculos.porcentaje_impuesto_importacion);
        }

        $scope.calImpAgente = function(){
            $scope.precalculos.agente_aduanal= formula.getPorcentaje2($scope.precalculos.precio_dolares_descuento,$scope.precalculos.h_agente_aduanal);
        }

        $scope.calSubtotal1 = function(){
            $scope.precalculos.subtotal_1= formula.getSuma12($scope.precalculos.precio_dolares_descuento, $scope.precalculos.impuesto_importacion, $scope.precalculos.agente_aduanal, $scope.precalculos.flete, $scope.precalculos.costo_instalacion, $scope.precalculos.preparacion_sitio, $scope.precalculos.precio_compra_insumos,0,0,0,0,0,0,0);//7
            $scope.precalculos.subtotal_1=$scope.precalculos.subtotal_1.toFixed(2);
        }

        $scope.calSubtotal2 = function(){
            $scope.precalculos.subtotal_2=formula.getSuma5($scope.precalculos.total_costo_instalacion_garantia,$scope.precalculos.reserva_refaccion,$scope.precalculos.garantia_adicional,$scope.precalculos.patrocinio_congreso_publicacion,$scope.precalculos.cargo_bancario);
            $scope.precalculos.subtotal_2=$scope.precalculos.subtotal_2.toFixed(2);
           // $scope.precalculos.porcentaje_subtotal_2= formula.getPorcentaje($scope.precalculos.subtotal_2,$scope.precalculos.precio_venta);
        }
        
        $scope.calSubtotal3 = function(){
            $scope.precalculos.subtotal_3=formula.getSuma5($scope.precalculos.financiera,$scope.precalculos.distribuidor,$scope.precalculos.otros,0,0);
            $scope.precalculos.subtotal_3=$scope.precalculos.subtotal_3.toFixed(2);
           // $scope.precalculos.porcentaje_subtotal_3= formula.getPorcentaje($scope.precalculos.subtotal_3,$scope.precalculos.precio_venta);
        }
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        $scope.calPorFlete = function(){
            $scope.precalculos.porcentaje_flete= formula.getPorcentaje($scope.precalculos.flete,$scope.precalculos.precio_venta);  ////////////////////
        }
        $scope.calPorInstalacion = function(){
        $scope.precalculos.costo_instalacion_e_i=$scope.precalculos.costo_instalacion;
            $scope.precalculos.porcentaje_costo_instalacion= formula.getPorcentaje($scope.precalculos.costo_instalacion,$scope.precalculos.precio_venta);
            $scope.precalculos.porcentaje_costo_instalacion=$scope.precalculos.porcentaje_costo_instalacion.toFixed(2);
        }
        $scope.calPorSitio = function(){
            $scope.precalculos.preparacion_sitio_e_i=$scope.precalculos.preparacion_sitio;
            $scope.precalculos.porcentaje_preparacion_sitio= formula.getPorcentaje($scope.precalculos.preparacion_sitio,$scope.precalculos.precio_venta);
            $scope.precalculos.porcentaje_preparacion_sitio=$scope.precalculos.porcentaje_preparacion_sitio.toFixed(2);
        }
        $scope.calPorInsumo = function(){
            $scope.precalculos.porcentaje_insumos= formula.getPorcentaje($scope.precalculos.precio_compra_insumos,$scope.precalculos.precio_venta);
        }

        $scope.calPorGarantia1 = function(){
            $scope.precalculos.porcentaje_garantia= formula.getPorcentaje($scope.precalculos.total_costo_instalacion_garantia,$scope.precalculos.precio_venta);
        }

       /* $scope.calReserva = function(){
            $scope.precalculos.porcentaje_reserva_refaccion= formula.getPorcentaje($scope.precalculos.reserva_refaccion,$scope.precalculos.precio_venta);
        }*/
        $scope.calPorGarantiaAdicional = function(){
            $scope.precalculos.valor_venta_servicio_s_i=$scope.precalculos.garantia_adicional;
            $scope.precalculos.porcentaje_garantia_adicional= formula.getPorcentaje($scope.precalculos.garantia_adicional,$scope.precalculos.precio_venta);
        }
        $scope.calPorPatrocinios = function(){
        $scope.precalculos.publicidad_patrocinio_congreso_e_i=$scope.precalculos.patrocinio_congreso_publicacion;
            $scope.precalculos.porcentaje_patrocinio_congreso_publicacion= formula.getPorcentaje($scope.precalculos.patrocinio_congreso_publicacion,$scope.precalculos.precio_venta);
            $scope.precalculos.porcentaje_patrocinio_congreso_publicacion=$scope.precalculos.porcentaje_patrocinio_congreso_publicacion.toFixed(2);
        }
        $scope.calPorCargos = function(){
            $scope.precalculos.cargo_bancario_e_i=$scope.precalculos.cargo_bancario;
            $scope.precalculos.porcentaje_cargo_bancario= formula.getPorcentaje($scope.precalculos.cargo_bancario,$scope.precalculos.precio_venta);
        }
        /*-- ---------------------------------------------------------------------------------------------------- MANUAL --*/
        $scope.calFinanciera = function(){ 
            $scope.calPrecioVenta();
            console.log($scope.precalculos.precio_venta);
            $scope.precalculos.financiera= formula.getPorcentaje2($scope.precalculos.porcentaje_financiera,$scope.precalculos.precio_venta);
            $scope.precalculos.financiera=$scope.precalculos.financiera.toFixed(2);
        $scope.precalculos.costo_financiero_e_i=$scope.precalculos.financiera;
            console.log($scope.precalculos.financiera);
        }
        $scope.calDistribuidor = function(){
            $scope.calPrecioVenta();
            $scope.precalculos.distribuidor= formula.getPorcentaje2($scope.precalculos.porcentaje_distribuidor,$scope.precalculos.precio_venta);
            $scope.precalculos.distribuidor=$scope.precalculos.distribuidor.toFixed(2);
            $scope.calFinanciera();
        }
        $scope.calOtros = function(){
            $scope.calPrecioVenta();
            $scope.precalculos.otros= formula.getPorcentaje2($scope.precalculos.porcentaje_otros,$scope.precalculos.precio_venta);
            $scope.precalculos.otros=$scope.precalculos.otros.toFixed(2);
        $scope.precalculos.comision_pagar_tercero_e_i=$scope.precalculos.otros;
            $scope.calFinanciera();
            $scope.calDistribuidor();
        }
        $scope.calComision = function(){
            $scope.calPrecioVenta();
            $scope.precalculos.comision= formula.getPorcentaje2($scope.precalculos.porcentaje_comision,$scope.precalculos.precio_venta);
            $scope.precalculos.comision=$scope.precalculos.comision.toFixed(2);
        $scope.precalculos.comision_agente_venta_e_i=$scope.precalculos.comision;
            $scope.calFinanciera();
            $scope.calDistribuidor();
            $scope.calOtros();
        }
        /*-- ---------------------------------------------------------------------------------------------------- MANUAL --*/
        $scope.calPorCapacitacion = function(){
            $scope.precalculos.porcentaje_capacitacion= formula.getPorcentaje($scope.precalculos.capacitacion,$scope.precalculos.precio_venta);
            $scope.precalculos.porcentaje_capacitacion=$scope.precalculos.porcentaje_capacitacion.toFixed(2);
        }
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// CALCULO IMAGENOLOGIA FIN
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// PRECALCULO INICIO
        //$scope.precalculos.valor_venta_e_i=$scope.precalculos.precio_venta;
       // $scope.precalculos.valor_venta_e_i=$scope.precalculos.precio_venta;
        //$scope.precalculos.costo_venta_producto_e_i=$scope.precalculos.precio_dolares_descuento;

/*$scope.calcularPrecalculo = function(){
    $scope.calVentaTotalTI();    
}*/

        $scope.calVentaTotalTI = function(){ //alert("entro");
            $scope.precalculos.venta_total_t_i=formula.getSuma5($scope.precalculos.valor_venta_e_i,$scope.precalculos.valor_venta_servicio_s_i,0,0,0);
            $scope.precalculos.venta_total_t_i=$scope.precalculos.venta_total_t_i.toFixed(2);            
        }
        $scope.calValorVentaServicioSP = function(){    //console.log($scope.precalculos.valor_venta_servicio_s_i);
            $scope.precalculos.valor_venta_servicio_s_p= formula.getPorcentaje($scope.precalculos.valor_venta_servicio_s_i,$scope.precalculos.valor_venta_servicio_s_i);    //console.log($scope.precalculos.valor_venta_servicio_s_p);
        }
        $scope.calValorVentaServicioTI = function(){
            $scope.precalculos.valor_venta_servicio_t_p= formula.getTotalPorcentaje($scope.precalculos.valor_venta_servicio_e_i,$scope.precalculos.valor_venta_servicio_s_i,$scope.precalculos.valor_venta_servicio_e_i,$scope.precalculos.valor_venta_servicio_s_i,0); //console.log($scope.precalculos.valor_venta_servicio_t_p);            
            $scope.precalculos.valor_venta_servicio_t_i= formula.getSuma5($scope.precalculos.valor_venta_servicio_e_i,$scope.precalculos.valor_venta_servicio_s_i,0,0,0);
            $scope.precalculos.valor_venta_servicio_t_i=$scope.precalculos.valor_venta_servicio_t_i.toFixed(0);
        }
        $scope.calCostoVentaProductoEP = function(){ //redondear ambos numeros
            //console.log($scope.precalculos.costo_venta_producto_e_i);
            //console.log($scope.precalculos.valor_venta_e_i);
            $scope.precalculos.costo_venta_producto_e_p= formula.getPorcentaje($scope.precalculos.costo_venta_producto_e_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.costo_venta_producto_e_p=$scope.precalculos.costo_venta_producto_e_p.toFixed(1);
        }
        $scope.calCostoVentaProductoSP = function(){ //redondear ambos numeros
            $scope.precalculos.costo_venta_producto_s_p= formula.getPorcentaje($scope.precalculos.costo_venta_producto_s_i,$scope.precalculos.valor_venta_servicio_s_i);
        }
        $scope.calCostoVentaProductoTI = function(){
            $scope.precalculos.costo_venta_producto_t_p= formula.getTotalPorcentaje($scope.precalculos.costo_venta_producto_e_i,$scope.precalculos.costo_venta_producto_s_i,$scope.precalculos.valor_venta_servicio_e_i,$scope.precalculos.valor_venta_servicio_s_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.costo_venta_producto_t_p= $scope.precalculos.costo_venta_producto_t_p.toFixed(1);
            $scope.precalculos.costo_venta_producto_t_i= formula.getSuma5($scope.precalculos.costo_venta_producto_e_i,$scope.precalculos.costo_venta_producto_s_i,0,0,0);
            $scope.precalculos.costo_venta_producto_t_i=$scope.precalculos.costo_venta_producto_t_i.toFixed(0);
        }
        $scope.calCostoVentaTercerosEP = function(){ //redondear ambos numeros
            $scope.precalculos.costo_venta_terceros_e_p= formula.getPorcentaje($scope.precalculos.costo_venta_terceros_e_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.costo_venta_terceros_e_p=$scope.precalculos.costo_venta_terceros_e_p.toFixed(1);
        }
        $scope.calCostoVentaTercerosSP = function(){ //redondear ambos numeros
            $scope.precalculos.costo_venta_terceros_s_p= formula.getPorcentaje($scope.precalculos.costo_venta_terceros_s_i,$scope.precalculos.valor_venta_servicio_s_i);
        }
        $scope.calCostoVentaTercerosTI = function(){
            $scope.precalculos.costo_venta_terceros_t_p= formula.getTotalPorcentaje($scope.precalculos.costo_venta_terceros_e_i,$scope.precalculos.costo_venta_terceros_s_i,$scope.precalculos.valor_venta_servicio_e_i,$scope.precalculos.valor_venta_servicio_s_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.costo_venta_terceros_t_p=$scope.precalculos.costo_venta_terceros_t_p.toFixed(1);
            $scope.precalculos.costo_venta_terceros_t_i= formula.getSuma5($scope.precalculos.costo_venta_terceros_e_i,$scope.precalculos.costo_venta_terceros_s_i,0,0,0);
            $scope.precalculos.costo_venta_terceros_t_i=$scope.precalculos.costo_venta_terceros_t_i.toFixed(0);
        }
        $scope.calReemplazoPartesServicioEP = function(){ //redondear ambos numeros
            $scope.precalculos.remplazo_parte_servicio_e_p= formula.getPorcentaje($scope.precalculos.remplazo_parte_servicio_e_i,$scope.precalculos.valor_venta_e_i);
        }
        $scope.calReemplazoPartesServicioSP = function(){ //redondear ambos numeros
            $scope.precalculos.remplazo_parte_servicio_s_p= formula.getPorcentaje($scope.precalculos.remplazo_parte_servicio_s_i,$scope.precalculos.valor_venta_servicio_s_i);
            $scope.precalculos.remplazo_parte_servicio_s_p=$scope.precalculos.remplazo_parte_servicio_s_p.toFixed(1);
        }
        $scope.calReemplazoPartesServicioTI = function(){
            $scope.precalculos.remplazo_parte_servicio_t_p= formula.getTotalPorcentaje($scope.precalculos.remplazo_parte_servicio_e_i,$scope.precalculos.remplazo_parte_servicio_s_i,$scope.precalculos.valor_venta_servicio_e_i,$scope.precalculos.valor_venta_servicio_s_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.remplazo_parte_servicio_t_p=$scope.precalculos.remplazo_parte_servicio_t_p.toFixed(1);
            $scope.precalculos.remplazo_parte_servicio_t_i= formula.getSuma5($scope.precalculos.remplazo_parte_servicio_e_i,$scope.precalculos.remplazo_parte_servicio_s_i,0,0,0);
            $scope.precalculos.remplazo_parte_servicio_t_i=$scope.precalculos.remplazo_parte_servicio_t_i.toFixed(0);
        }
        $scope.calSumasCostoMateriales = function(){
            $scope.precalculos.costo_material_e_i = formula.getSuma5($scope.precalculos.costo_venta_producto_e_i, $scope.precalculos.costo_venta_terceros_e_i, $scope.precalculos.remplazo_parte_servicio_e_i,0,0);
            $scope.precalculos.costo_material_e_i=$scope.precalculos.costo_material_e_i.toFixed(0);
            $scope.precalculos.costo_material_e_p= formula.getPorcentaje($scope.precalculos.costo_material_e_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.costo_material_e_p=$scope.precalculos.costo_material_e_p.toFixed(1);
            $scope.precalculos.costo_material_s_i = formula.getSuma5($scope.precalculos.costo_venta_producto_s_i, $scope.precalculos.costo_venta_terceros_s_i, $scope.precalculos.remplazo_parte_servicio_s_i,0,0);
            $scope.precalculos.costo_material_s_i =$scope.precalculos.costo_material_s_i.toFixed(0);
            $scope.precalculos.costo_material_s_p= formula.getPorcentaje($scope.precalculos.costo_material_s_i,$scope.precalculos.valor_venta_servicio_s_i);
            $scope.precalculos.costo_material_s_p=$scope.precalculos.costo_material_s_p.toFixed(1);
            $scope.precalculos.costo_material_t_p= formula.getTotalPorcentaje($scope.precalculos.costo_material_e_i,$scope.precalculos.costo_material_s_i,$scope.precalculos.valor_venta_servicio_e_i,$scope.precalculos.valor_venta_servicio_s_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.costo_material_t_p=$scope.precalculos.costo_material_t_p.toFixed(1);
            $scope.precalculos.costo_material_t_i= formula.getSuma5($scope.precalculos.costo_venta_producto_t_i,$scope.precalculos.costo_venta_terceros_t_i,$scope.precalculos.remplazo_parte_servicio_t_i,0,0);
            $scope.precalculos.costo_material_t_i=$scope.precalculos.costo_material_t_i.toFixed(0);
        }
        $scope.calPreparacionSitioEP = function(){ //redondear ambos numeros
            $scope.precalculos.preparacion_sitio_e_p= formula.getPorcentaje($scope.precalculos.preparacion_sitio_e_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.preparacion_sitio_e_p=$scope.precalculos.preparacion_sitio_e_p.toFixed(1);
        }
        $scope.calPreparacionSitioSP = function(){ //redondear ambos numeros
            $scope.precalculos.preparacion_sitio_s_p= formula.getPorcentaje($scope.precalculos.preparacion_sitio_s_i,$scope.precalculos.valor_venta_servicio_s_i);
            $scope.precalculos.preparacion_sitio_s_p=$scope.precalculos.preparacion_sitio_s_p.toFixed(1);
        }
        $scope.calPreparacionSitioTI = function(){
            $scope.precalculos.preparacion_sitio_t_p= formula.getTotalPorcentaje($scope.precalculos.preparacion_sitio_e_i,$scope.precalculos.preparacion_sitio_s_i,$scope.precalculos.valor_venta_servicio_e_i,$scope.precalculos.valor_venta_servicio_s_i,$scope.precalculos.valor_venta_e_i);
            console.log($scope.precalculos.preparacion_sitio_t_p);
            $scope.precalculos.preparacion_sitio_t_p=$scope.precalculos.preparacion_sitio_t_p.toFixed(1);
            $scope.precalculos.preparacion_sitio_t_i= formula.getSuma5($scope.precalculos.preparacion_sitio_e_i,$scope.precalculos.preparacion_sitio_s_i,0,0,0);
            $scope.precalculos.preparacion_sitio_t_i=$scope.precalculos.preparacion_sitio_t_i.toFixed(0);
        }
        $scope.calPreparacionSitioAgenteEP = function(){ //redondear ambos numeros
            $scope.precalculos.preparacion_sitio_agente_e_p= formula.getPorcentaje($scope.precalculos.preparacion_sitio_agente_e_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.preparacion_sitio_agente_e_p=$scope.precalculos.preparacion_sitio_agente_e_p.toFixed(1);
        }
        $scope.calPreparacionSitioAgenteSP = function(){ //redondear ambos numeros
            $scope.precalculos.preparacion_sitio_agente_s_p= formula.getPorcentaje($scope.precalculos.preparacion_sitio_agente_s_i,$scope.precalculos.valor_venta_servicio_s_i);
            $scope.precalculos.preparacion_sitio_agente_s_p=$scope.precalculos.preparacion_sitio_agente_s_p.toFixed(1);
        }
        $scope.calPreparacionSitioAgenteTI = function(){
            $scope.precalculos.preparacion_sitio_agente_t_p= formula.getTotalPorcentaje($scope.precalculos.preparacion_sitio_agente_e_i,$scope.precalculos.preparacion_sitio_agente_s_i,$scope.precalculos.valor_venta_servicio_e_i,$scope.precalculos.valor_venta_servicio_s_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.preparacion_sitio_agente_t_p=$scope.precalculos.preparacion_sitio_agente_t_p.toFixed(1);
            $scope.precalculos.preparacion_sitio_agente_t_i= formula.getSuma5($scope.precalculos.preparacion_sitio_agente_e_i,$scope.precalculos.preparacion_sitio_agente_s_i,0,0,0);
            $scope.precalculos.preparacion_sitio_agente_t_i=$scope.precalculos.preparacion_sitio_agente_t_i.toFixed(0);
        }
        $scope.calPreparacionSitioTerceroEP = function(){ //redondear ambos numeros
            $scope.precalculos.preparacion_sitio_tercero_e_p= formula.getPorcentaje($scope.precalculos.preparacion_sitio_tercero_e_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.preparacion_sitio_tercero_e_p=$scope.precalculos.preparacion_sitio_tercero_e_p.toFixed(1);
        }
        $scope.calPreparacionSitioTerceroSP = function(){ //redondear ambos numeros
            $scope.precalculos.preparacion_sitio_tercero_s_p= formula.getPorcentaje($scope.precalculos.preparacion_sitio_tercero_s_i,$scope.precalculos.valor_venta_servicio_s_i);
            $scope.precalculos.preparacion_sitio_tercero_s_p=$scope.precalculos.preparacion_sitio_tercero_s_p.toFixed(1);
        }
        $scope.calPreparacionSitioTerceroTI = function(){
            $scope.precalculos.preparacion_sitio_tercero_t_p= formula.getTotalPorcentaje($scope.precalculos.preparacion_sitio_tercero_e_i,$scope.precalculos.preparacion_sitio_tercero_s_i,$scope.precalculos.valor_venta_servicio_e_i,$scope.precalculos.valor_venta_servicio_s_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.preparacion_sitio_tercero_t_p=$scope.precalculos.preparacion_sitio_tercero_t_p.toFixed(1);
            $scope.precalculos.preparacion_sitio_tercero_t_i= formula.getSuma5($scope.precalculos.preparacion_sitio_tercero_e_i,$scope.precalculos.preparacion_sitio_tercero_s_i,0,0,0);
            $scope.precalculos.preparacion_sitio_tercero_t_i=$scope.precalculos.preparacion_sitio_tercero_t_i.toFixed(0);
        }
        $scope.calCostoInstalacionEP = function(){ //redondear ambos numeros
            $scope.precalculos.costo_instalacion_e_p= formula.getPorcentaje($scope.precalculos.costo_instalacion_e_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.costo_instalacion_e_p=$scope.precalculos.costo_instalacion_e_p.toFixed(1);
        }
        $scope.calCostoInstalacionSP = function(){ //redondear ambos numeros
            $scope.precalculos.costo_instalacion_s_p= formula.getPorcentaje($scope.precalculos.costo_instalacion_s_i,$scope.precalculos.valor_venta_servicio_s_i);
            $scope.precalculos.costo_instalacion_s_p=$scope.precalculos.costo_instalacion_s_p.toFixed(1);
        }
        $scope.calCostoInstalacionTI = function(){
            $scope.precalculos.costo_instalacion_t_p= formula.getTotalPorcentaje($scope.precalculos.costo_instalacion_e_i,$scope.precalculos.costo_instalacion_s_i,$scope.precalculos.valor_venta_servicio_e_i,$scope.precalculos.valor_venta_servicio_s_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.costo_instalacion_t_p=$scope.precalculos.costo_instalacion_t_p.toFixed(1);
            $scope.precalculos.costo_instalacion_t_i= formula.getSuma5($scope.precalculos.costo_instalacion_e_i,$scope.precalculos.costo_instalacion_s_i,0,0,0);
            $scope.precalculos.costo_instalacion_t_i=$scope.precalculos.costo_instalacion_t_i.toFixed(0)
        }
        $scope.calCostoInstalacionAgenteEP = function(){ //redondear ambos numeros
            $scope.precalculos.costo_instalacion_agente_e_p= formula.getPorcentaje($scope.precalculos.costo_instalacion_agente_e_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.costo_instalacion_agente_e_p=$scope.precalculos.costo_instalacion_agente_e_p.toFixed(1);
        }
        $scope.calCostoInstalacionAgenteSP = function(){ //redondear ambos numeros
            $scope.precalculos.costo_instalacion_agente_s_p= formula.getPorcentaje($scope.precalculos.costo_instalacion_agente_s_i,$scope.precalculos.valor_venta_servicio_s_i);
            $scope.precalculos.costo_instalacion_agente_s_p=$scope.precalculos.costo_instalacion_agente_s_p.toFixed(1);
        }
        $scope.calCostoInstalacionAgenteTI = function(){
            $scope.precalculos.costo_instalacion_agente_t_p= formula.getTotalPorcentaje($scope.precalculos.costo_instalacion_agente_e_i,$scope.precalculos.costo_instalacion_agente_s_i,$scope.precalculos.valor_venta_servicio_e_i,$scope.precalculos.valor_venta_servicio_s_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.costo_instalacion_agente_t_p=$scope.precalculos.costo_instalacion_agente_t_p.toFixed(1);
            $scope.precalculos.costo_instalacion_agente_t_i= formula.getSuma5($scope.precalculos.costo_instalacion_agente_e_i,$scope.precalculos.costo_instalacion_agente_s_i,0,0,0);
            $scope.precalculos.costo_instalacion_agente_t_i=$scope.precalculos.costo_instalacion_agente_t_i.toFixed(0);
        }
        $scope.calCostoInstalacionTerceroEP = function(){ //redondear ambos numeros
            $scope.precalculos.costo_instalacion_terceros_e_p= formula.getPorcentaje($scope.precalculos.costo_instalacion_terceros_e_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.costo_instalacion_terceros_e_p=$scope.precalculos.costo_instalacion_terceros_e_p.toFixed(1);
        }
        $scope.calCostoInstalacionTerceroSP = function(){ //redondear ambos numeros
            $scope.precalculos.costo_instalacion_terceros_s_p= formula.getPorcentaje($scope.precalculos.costo_instalacion_terceros_s_i,$scope.precalculos.valor_venta_servicio_s_i);
            $scope.precalculos.costo_instalacion_terceros_s_p=$scope.precalculos.costo_instalacion_terceros_s_p.toFixed(1);
        }
        $scope.calCostoInstalacionTerceroTI = function(){
            $scope.precalculos.costo_instalacion_terceros_t_p= formula.getTotalPorcentaje($scope.precalculos.costo_instalacion_terceros_e_i,$scope.precalculos.costo_instalacion_terceros_s_i,$scope.precalculos.valor_venta_servicio_e_i,$scope.precalculos.valor_venta_servicio_s_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.costo_instalacion_terceros_t_p=$scope.precalculos.costo_instalacion_terceros_t_p.toFixed(1);
            $scope.precalculos.costo_instalacion_terceros_t_i= formula.getSuma5($scope.precalculos.costo_instalacion_terceros_e_i,$scope.precalculos.costo_instalacion_terceros_s_i,0,0,0);
            $scope.precalculos.costo_instalacion_terceros_t_i=$scope.precalculos.costo_instalacion_terceros_t_i.toFixed(0);
        }
        $scope.calManoObraIternaEP = function(){ //redondear ambos numeros
            $scope.precalculos.mano_obra_subcontr_interna_e_p= formula.getPorcentaje($scope.precalculos.mano_obra_subcontr_interna_e_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.mano_obra_subcontr_interna_e_p=$scope.precalculos.mano_obra_subcontr_interna_e_p.toFixed(1);
        }
        $scope.calManoObraIternaSP = function(){ //redondear ambos numeros
            $scope.precalculos.mano_obra_subcontr_interna_s_p= formula.getPorcentaje($scope.precalculos.mano_obra_subcontr_interna_s_i,$scope.precalculos.valor_venta_servicio_s_i);
            $scope.precalculos.mano_obra_subcontr_interna_s_p=$scope.precalculos.mano_obra_subcontr_interna_s_p.toFixed(1);
        }
        $scope.calManoObraIternaTI = function(){
            $scope.precalculos.mano_obra_subcontr_interna_t_p= formula.getTotalPorcentaje($scope.precalculos.mano_obra_subcontr_interna_e_i,$scope.precalculos.mano_obra_subcontr_interna_s_i,$scope.precalculos.valor_venta_servicio_e_i,$scope.precalculos.valor_venta_servicio_s_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.mano_obra_subcontr_interna_t_p=$scope.precalculos.mano_obra_subcontr_interna_t_p.toFixed(1);
            $scope.precalculos.mano_obra_subcontr_interna_t_i= formula.getSuma5($scope.precalculos.mano_obra_subcontr_interna_e_i,$scope.precalculos.mano_obra_subcontr_interna_s_i,0,0,0);
            $scope.precalculos.mano_obra_subcontr_interna_t_i=$scope.precalculos.mano_obra_subcontr_interna_t_i.toFixed(0);
        }
        $scope.calManoObraTercerosEP = function(){ //redondear ambos numeros
            $scope.precalculos.mano_obra_subcontr_terceros_e_p= formula.getPorcentaje($scope.precalculos.mano_obra_subcontr_terceros_e_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.mano_obra_subcontr_terceros_e_p=$scope.precalculos.mano_obra_subcontr_terceros_e_p.toFixed(1);
        }
        $scope.calManoObraTercerosSP = function(){ //redondear ambos numeros
            $scope.precalculos.mano_obra_subcontr_terceros_s_p= formula.getPorcentaje($scope.precalculos.mano_obra_subcontr_terceros_s_i,$scope.precalculos.valor_venta_servicio_s_i);
            $scope.precalculos.mano_obra_subcontr_terceros_s_p=$scope.precalculos.mano_obra_subcontr_terceros_s_p.toFixed(1);
        }
        $scope.calManoObraTercerosTI = function(){
            $scope.precalculos.mano_obra_subcontr_terceros_t_p= formula.getTotalPorcentaje($scope.precalculos.mano_obra_subcontr_terceros_e_i,$scope.precalculos.mano_obra_subcontr_terceros_s_i,$scope.precalculos.valor_venta_servicio_e_i,$scope.precalculos.valor_venta_servicio_s_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.mano_obra_subcontr_terceros_t_p=$scope.precalculos.mano_obra_subcontr_terceros_t_p.toFixed(1);
            $scope.precalculos.mano_obra_subcontr_terceros_t_i= formula.getSuma5($scope.precalculos.mano_obra_subcontr_terceros_e_i,$scope.precalculos.mano_obra_subcontr_terceros_s_i,0,0,0);
            $scope.precalculos.mano_obra_subcontr_terceros_t_i=$scope.precalculos.mano_obra_subcontr_terceros_t_i.toFixed(0);
        }
        $scope.calCapacitacionClienteEP = function(){ //redondear ambos numeros
            $scope.precalculos.capacitacion_cliente_e_p= formula.getPorcentaje($scope.precalculos.capacitacion_cliente_e_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.capacitacion_cliente_e_p=$scope.precalculos.capacitacion_cliente_e_p.toFixed(1);
        }
        $scope.calCapacitacionClienteSP = function(){ //redondear ambos numeros
            $scope.precalculos.capacitacion_cliente_s_p= formula.getPorcentaje($scope.precalculos.capacitacion_cliente_s_i,$scope.precalculos.valor_venta_servicio_s_i);
            $scope.precalculos.capacitacion_cliente_s_p=$scope.precalculos.capacitacion_cliente_s_p.toFixed(1);
        }
        $scope.calCapacitacionClienteTI = function(){
            $scope.precalculos.capacitacion_cliente_t_p= formula.getTotalPorcentaje($scope.precalculos.capacitacion_cliente_e_i,$scope.precalculos.capacitacion_cliente_s_i,$scope.precalculos.valor_venta_servicio_e_i,$scope.precalculos.valor_venta_servicio_s_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.capacitacion_cliente_t_p=$scope.precalculos.capacitacion_cliente_t_p.toFixed(1);
            $scope.precalculos.capacitacion_cliente_t_i= formula.getSuma5($scope.precalculos.capacitacion_cliente_e_i,$scope.precalculos.capacitacion_cliente_s_i,0,0,0);
            $scope.precalculos.capacitacion_cliente_t_i=$scope.precalculos.capacitacion_cliente_t_i.toFixed(0);
        }
        $scope.calCostoVentas = function(){ //redondear ambos numeros                                 1                                         2                                                   3                                                    4                                           5                                           6                                                  7                                                    8                                                   9                                                     10                                          11       
            $scope.precalculos.costo_venta_e_i= formula.getSuma12($scope.precalculos.costo_material_e_i,    $scope.precalculos.preparacion_sitio_e_i,    $scope.precalculos.preparacion_sitio_agente_e_i,    $scope.precalculos.preparacion_sitio_tercero_e_i,   $scope.precalculos.costo_instalacion_e_i,   $scope.precalculos.costo_instalacion_agente_e_i,    $scope.precalculos.costo_instalacion_terceros_e_i,  $scope.precalculos.mano_obra_subcontr_interna_e_i,  $scope.precalculos.mano_obra_subcontr_terceros_e_i, $scope.precalculos.capacitacion_cliente_e_i,0,0,0,0);
            $scope.precalculos.costo_venta_e_i=$scope.precalculos.costo_venta_e_i.toFixed(0);
            $scope.precalculos.costo_venta_e_p= formula.getPorcentaje($scope.precalculos.costo_venta_e_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.costo_venta_e_p=$scope.precalculos.costo_venta_e_p.toFixed(1);
            $scope.precalculos.costo_venta_s_i= formula.getSuma12($scope.precalculos.costo_material_s_i,    $scope.precalculos.preparacion_sitio_s_i,    $scope.precalculos.preparacion_sitio_agente_s_i,    $scope.precalculos.preparacion_sitio_tercero_s_i,   $scope.precalculos.costo_instalacion_s_i,   $scope.precalculos.costo_instalacion_agente_s_i,    $scope.precalculos.costo_instalacion_terceros_s_i,  $scope.precalculos.mano_obra_subcontr_interna_s_i,  $scope.precalculos.mano_obra_subcontr_terceros_s_i, $scope.precalculos.capacitacion_cliente_s_i,0,0,0,0);
            $scope.precalculos.costo_venta_s_i=$scope.precalculos.costo_venta_s_i.toFixed(0);
            $scope.precalculos.costo_venta_s_p= formula.getPorcentaje($scope.precalculos.costo_venta_s_i,$scope.precalculos.valor_venta_servicio_s_i);
            $scope.precalculos.costo_venta_s_p=$scope.precalculos.costo_venta_s_p.toFixed(1);            
            $scope.precalculos.costo_venta_t_p= formula.getTotalPorcentaje($scope.precalculos.costo_material_e_i,$scope.precalculos.costo_material_s_i,$scope.precalculos.valor_venta_servicio_e_i,$scope.precalculos.valor_venta_servicio_s_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.costo_venta_t_p=$scope.precalculos.costo_venta_t_p.toFixed(1);
            $scope.precalculos.costo_venta_t_i= formula.getSuma12($scope.precalculos.costo_material_t_i,    $scope.precalculos.preparacion_sitio_t_i,    $scope.precalculos.preparacion_sitio_agente_t_i,    $scope.precalculos.preparacion_sitio_tercero_t_i,   $scope.precalculos.costo_instalacion_t_i,   $scope.precalculos.costo_instalacion_agente_t_i,    $scope.precalculos.costo_instalacion_terceros_t_i,  $scope.precalculos.mano_obra_subcontr_interna_t_i,  $scope.precalculos.mano_obra_subcontr_terceros_t_i, $scope.precalculos.capacitacion_cliente_t_i,0,0,0,0);
            $scope.precalculos.costo_venta_t_i=$scope.precalculos.costo_venta_t_i.toFixed(0);
        }
        $scope.calMargenBruto = function(){ //redondear ambos numeros
            $scope.precalculos.margen_bruto_e_i=formula.getResta2($scope.precalculos.valor_venta_e_i,$scope.precalculos.costo_venta_e_i);
            $scope.precalculos.margen_bruto_e_i=$scope.precalculos.margen_bruto_e_i.toFixed(0);
            $scope.precalculos.margen_bruto_e_p= formula.getPorcentaje($scope.precalculos.margen_bruto_e_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.margen_bruto_e_p=$scope.precalculos.margen_bruto_e_p.toFixed(1);
            $scope.precalculos.margen_bruto_s_i=formula.getResta2($scope.precalculos.valor_venta_servicio_s_i,$scope.precalculos.costo_venta_s_i);
            $scope.precalculos.margen_bruto_s_i=$scope.precalculos.margen_bruto_s_i.toFixed(0);
            $scope.precalculos.margen_bruto_s_p= formula.getPorcentaje($scope.precalculos.margen_bruto_s_i,$scope.precalculos.valor_venta_servicio_s_i);
            $scope.precalculos.margen_bruto_s_p=$scope.precalculos.margen_bruto_s_p.toFixed(1);
            $scope.precalculos.margen_bruto_t_p= formula.getTotalPorcentaje($scope.precalculos.margen_bruto_e_i,$scope.precalculos.margen_bruto_s_i,$scope.precalculos.valor_venta_servicio_e_i,$scope.precalculos.valor_venta_servicio_s_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.margen_bruto_t_p=$scope.precalculos.margen_bruto_t_p.toFixed(1);
            $scope.precalculos.margen_bruto_t_i= formula.getMB($scope.precalculos.valor_venta_e_i, $scope.precalculos.valor_venta_servicio_s_i, $scope.precalculos.costo_venta_t_i);
            $scope.precalculos.margen_bruto_t_i=$scope.precalculos.margen_bruto_t_i.toFixed(0);
        }
        $scope.calGarantiaPartesEP = function(){ //redondear ambos numeros
            $scope.precalculos.garantia_parte_e_p= formula.getPorcentaje($scope.precalculos.garantia_parte_e_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.garantia_parte_e_p=$scope.precalculos.garantia_parte_e_p.toFixed(1);
        }
        $scope.calGarantiaPartesSP = function(){ //redondear ambos numeros
            $scope.precalculos.garantia_parte_s_p= formula.getPorcentaje($scope.precalculos.garantia_parte_s_i,$scope.precalculos.valor_venta_servicio_s_i);
            $scope.precalculos.garantia_parte_s_p=$scope.precalculos.garantia_parte_s_p.toFixed(1);
        }
        $scope.calGarantiaPartesTI = function(){
            $scope.precalculos.garantia_parte_t_p= formula.getTotalPorcentaje($scope.precalculos.garantia_parte_e_i,$scope.precalculos.garantia_parte_s_i,$scope.precalculos.valor_venta_servicio_e_i,$scope.precalculos.valor_venta_servicio_s_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.garantia_parte_t_p=$scope.precalculos.garantia_parte_t_p.toFixed(1);
            $scope.precalculos.garantia_parte_t_i= formula.getSuma5($scope.precalculos.garantia_parte_e_i,$scope.precalculos.garantia_parte_s_i,0,0,0);
            $scope.precalculos.garantia_parte_t_i=$scope.precalculos.garantia_parte_t_i.toFixed(0);
        }
        $scope.calGarantiaManoObraEP = function(){ //redondear ambos numeros
            $scope.precalculos.garantia_mano_obra_e_p= formula.getPorcentaje($scope.precalculos.garantia_mano_obra_e_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.garantia_mano_obra_e_p=$scope.precalculos.garantia_mano_obra_e_p.toFixed(1);
        }
        $scope.calGarantiaManoObraSP = function(){ //redondear ambos numeros
            $scope.precalculos.garantia_mano_obra_s_p= formula.getPorcentaje($scope.precalculos.garantia_mano_obra_s_i,$scope.precalculos.valor_venta_servicio_s_i);
            $scope.precalculos.garantia_mano_obra_s_p=$scope.precalculos.garantia_mano_obra_s_p.toFixed(1);
        }
        $scope.calGarantiaManoObraTI = function(){
            $scope.precalculos.garantia_mano_obra_t_p= formula.getTotalPorcentaje($scope.precalculos.garantia_mano_obra_e_i,$scope.precalculos.garantia_mano_obra_s_i,$scope.precalculos.valor_venta_servicio_e_i,$scope.precalculos.valor_venta_servicio_s_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.garantia_mano_obra_t_p=$scope.precalculos.garantia_mano_obra_t_p.toFixed(1);
            $scope.precalculos.garantia_mano_obra_t_i= formula.getSuma5($scope.precalculos.garantia_mano_obra_e_i,$scope.precalculos.garantia_mano_obra_s_i,0,0,0);
            $scope.precalculos.garantia_mano_obra_t_i=$scope.precalculos.garantia_mano_obra_t_i.toFixed(0);
        }
        $scope.calComisionTerceroEP = function(){ //redondear ambos numeros
            $scope.precalculos.comision_pagar_tercero_e_p= formula.getPorcentaje($scope.precalculos.comision_pagar_tercero_e_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.comision_pagar_tercero_e_p=$scope.precalculos.comision_pagar_tercero_e_p.toFixed(1);
        }
        $scope.calComisionTerceroSP = function(){ //redondear ambos numeros
            $scope.precalculos.comision_pagar_tercero_s_p= formula.getPorcentaje($scope.precalculos.comision_pagar_tercero_s_i,$scope.precalculos.valor_venta_servicio_s_i);
            $scope.precalculos.comision_pagar_tercero_s_p=$scope.precalculos.comision_pagar_tercero_s_p.toFixed(1);
        }
        $scope.calComisionTerceroTI = function(){
            $scope.precalculos.comision_pagar_tercero_t_p= formula.getTotalPorcentaje($scope.precalculos.comision_pagar_tercero_e_i,$scope.precalculos.comision_pagar_tercero_s_i,$scope.precalculos.valor_venta_servicio_e_i,$scope.precalculos.valor_venta_servicio_s_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.comision_pagar_tercero_t_p=$scope.precalculos.comision_pagar_tercero_t_p.toFixed(1);
            $scope.precalculos.comision_pagar_tercero_t_i= formula.getSuma5($scope.precalculos.comision_pagar_tercero_e_i,$scope.precalculos.comision_pagar_tercero_s_i,0,0,0);
            $scope.precalculos.comision_pagar_tercero_t_i=$scope.precalculos.comision_pagar_tercero_t_i.toFixed(0);
        }
        $scope.calComisionAgenteEP = function(){ //redondear ambos numeros
            $scope.precalculos.comision_agente_venta_e_p= formula.getPorcentaje($scope.precalculos.comision_agente_venta_e_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.comision_agente_venta_e_p=$scope.precalculos.comision_agente_venta_e_p.toFixed(1);
        }
        $scope.calComisionAgenteSP = function(){ //redondear ambos numeros
            $scope.precalculos.comision_agente_venta_s_p= formula.getPorcentaje($scope.precalculos.comision_agente_venta_s_i,$scope.precalculos.valor_venta_servicio_s_i);
            $scope.precalculos.comision_agente_venta_s_p=$scope.precalculos.comision_agente_venta_s_p.toFixed(1);
        }
        $scope.calComisionAgenteTI = function(){
            $scope.precalculos.comision_agente_venta_t_p= formula.getTotalPorcentaje($scope.precalculos.comision_agente_venta_e_i,$scope.precalculos.comision_agente_venta_s_i,$scope.precalculos.valor_venta_servicio_e_i,$scope.precalculos.valor_venta_servicio_s_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.comision_agente_venta_t_p=$scope.precalculos.comision_agente_venta_t_p.toFixed(1);
            $scope.precalculos.comision_agente_venta_t_i= formula.getSuma5($scope.precalculos.comision_agente_venta_e_i,$scope.precalculos.comision_agente_venta_s_i,0,0,0);
            $scope.precalculos.comision_agente_venta_t_i=$scope.precalculos.comision_agente_venta_t_i.toFixed(0);
        }
        $scope.calServicioExternoEP = function(){ //redondear ambos numeros
            $scope.precalculos.servicio_externo_e_p= formula.getPorcentaje($scope.precalculos.servicio_externo_e_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.servicio_externo_e_p=$scope.precalculos.servicio_externo_e_p.toFixed(1);
        }
        $scope.calServicioExternoSP = function(){ //redondear ambos numeros
            $scope.precalculos.servicio_externo_s_p= formula.getPorcentaje($scope.precalculos.servicio_externo_s_i,$scope.precalculos.valor_venta_servicio_s_i);
            $scope.precalculos.servicio_externo_s_p=$scope.precalculos.servicio_externo_s_p.toFixed(1);
        }
        $scope.calServicioExternoTI = function(){
            $scope.precalculos.servicio_externo_t_p= formula.getTotalPorcentaje($scope.precalculos.servicio_externo_e_i,$scope.precalculos.servicio_externo_s_i,$scope.precalculos.valor_venta_servicio_e_i,$scope.precalculos.valor_venta_servicio_s_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.servicio_externo_t_p=$scope.precalculos.servicio_externo_t_p.toFixed(1);
            $scope.precalculos.servicio_externo_t_i= formula.getSuma5($scope.precalculos.servicio_externo_e_i,$scope.precalculos.servicio_externo_s_i,0,0,0);
            $scope.precalculos.servicio_externo_t_i=$scope.precalculos.servicio_externo_t_i.toFixed(0);
        }
        $scope.calCapacitacionPersonalEP = function(){ //redondear ambos numeros
            $scope.precalculos.capacitacion_personal_e_p= formula.getPorcentaje($scope.precalculos.capacitacion_personal_e_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.capacitacion_personal_e_p=$scope.precalculos.capacitacion_personal_e_p.toFixed(1);
        }
        $scope.calCapacitacionPersonalSP = function(){ //redondear ambos numeros
            $scope.precalculos.capacitacion_personal_s_p= formula.getPorcentaje($scope.precalculos.capacitacion_personal_s_i,$scope.precalculos.valor_venta_servicio_s_i);
            $scope.precalculos.capacitacion_personal_s_p=$scope.precalculos.capacitacion_personal_s_p.toFixed(1);
        }
        $scope.calCapacitacionPersonalTI = function(){
            $scope.precalculos.capacitacion_personal_t_p= formula.getTotalPorcentaje($scope.precalculos.capacitacion_personal_e_i,$scope.precalculos.capacitacion_personal_s_i,$scope.precalculos.valor_venta_servicio_e_i,$scope.precalculos.valor_venta_servicio_s_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.capacitacion_personal_t_p=$scope.precalculos.capacitacion_personal_t_p.toFixed(1);
            $scope.precalculos.capacitacion_personal_t_i= formula.getSuma5($scope.precalculos.capacitacion_personal_e_i,$scope.precalculos.capacitacion_personal_s_i,0,0,0);
            $scope.precalculos.capacitacion_personal_t_i=$scope.precalculos.capacitacion_personal_t_i.toFixed(0);
        }

        $scope.calPublicidadEP = function(){ //redondear ambos numeros
            $scope.precalculos.publicidad_patrocinio_congreso_e_p= formula.getPorcentaje($scope.precalculos.publicidad_patrocinio_congreso_e_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.publicidad_patrocinio_congreso_e_p=$scope.precalculos.publicidad_patrocinio_congreso_e_p.toFixed(1);
        }
        $scope.calPublicidadSP = function(){ //redondear ambos numeros
            $scope.precalculos.publicidad_patrocinio_congreso_s_p= formula.getPorcentaje($scope.precalculos.publicidad_patrocinio_congreso_s_i,$scope.precalculos.valor_venta_servicio_s_i);
            $scope.precalculos.publicidad_patrocinio_congreso_s_p=$scope.precalculos.publicidad_patrocinio_congreso_s_p.toFixed(1);
        }
        $scope.calPublicidadTI = function(){
            $scope.precalculos.publicidad_patrocinio_congreso_t_p= formula.getTotalPorcentaje($scope.precalculos.publicidad_patrocinio_congreso_e_i,$scope.precalculos.publicidad_patrocinio_congreso_s_i,$scope.precalculos.valor_venta_servicio_e_i,$scope.precalculos.valor_venta_servicio_s_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.publicidad_patrocinio_congreso_t_p=$scope.precalculos.publicidad_patrocinio_congreso_t_p.toFixed(1);
            $scope.precalculos.publicidad_patrocinio_congreso_t_i= formula.getSuma5($scope.precalculos.publicidad_patrocinio_congreso_e_i,$scope.precalculos.publicidad_patrocinio_congreso_s_i,0,0,0);
            $scope.precalculos.publicidad_patrocinio_congreso_t_i=$scope.precalculos.publicidad_patrocinio_congreso_t_i.toFixed(0);
        }
        $scope.calBancariosEP = function(){ //redondear ambos numeros
            $scope.precalculos.cargo_bancario_e_p= formula.getPorcentaje($scope.precalculos.cargo_bancario_e_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.cargo_bancario_e_p=$scope.precalculos.cargo_bancario_e_p.toFixed(1);
            $scope.precalculos.cargo_bancario_s_i=formula.getMulti2(0.004,$scope.precalculos.valor_venta_servicio_s_i);
            $scope.precalculos.cargo_bancario_s_i=$scope.precalculos.cargo_bancario_s_i.toFixed(0);
            $scope.precalculos.cargo_bancario_s_p= formula.getPorcentaje($scope.precalculos.cargo_bancario_s_i,$scope.precalculos.valor_venta_servicio_s_i);
            $scope.precalculos.cargo_bancario_s_p=$scope.precalculos.cargo_bancario_s_p.toFixed(1);
        }
        $scope.calBancariosSP = function(){ //redondear ambos numeros
  //         $scope.precalculos.cargo_bancario_s_i=formula.multi2(0.004,$scope.precalculos.valor_venta_servicio_s_i);
//            $scope.precalculos.cargo_bancario_s_p= formula.getPorcentaje($scope.precalculos.cargo_bancario_s_i,$scope.precalculos.valor_venta_servicio_s_i);
        }
        $scope.calBancariosTI = function(){
            $scope.precalculos.cargo_bancario_t_p= formula.getTotalPorcentaje($scope.precalculos.cargo_bancario_e_i,$scope.precalculos.cargo_bancario_s_i,$scope.precalculos.valor_venta_servicio_e_i,$scope.precalculos.valor_venta_servicio_s_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.cargo_bancario_t_p=$scope.precalculos.cargo_bancario_t_p.toFixed(1);
            $scope.precalculos.cargo_bancario_t_i= formula.getSuma5($scope.precalculos.cargo_bancario_e_i,$scope.precalculos.cargo_bancario_s_i,0,0,0);
            $scope.precalculos.cargo_bancario_t_i=$scope.precalculos.cargo_bancario_t_i.toFixed(0);
        }

        $scope.calFinancieroEP = function(){ //redondear ambos numeros
            $scope.precalculos.costo_financiero_e_p= formula.getPorcentaje($scope.precalculos.costo_financiero_e_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.costo_financiero_e_p=$scope.precalculos.costo_financiero_e_p.toFixed(1);
        }
        $scope.calFinancieroSP = function(){ //redondear ambos numeros
            $scope.precalculos.costo_financiero_s_p= formula.getPorcentaje($scope.precalculos.costo_financiero_s_i,$scope.precalculos.valor_venta_servicio_s_i);
            $scope.precalculos.costo_financiero_s_p=$scope.precalculos.costo_financiero_s_p.toFixed(1);
        }
        $scope.calFinancieroTI = function(){
            $scope.precalculos.costo_financiero_t_p= formula.getTotalPorcentaje($scope.precalculos.costo_financiero_e_i,$scope.precalculos.costo_financiero_s_i,$scope.precalculos.valor_venta_servicio_e_i,$scope.precalculos.valor_venta_servicio_s_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.costo_financiero_t_p=$scope.precalculos.costo_financiero_t_p.toFixed(1);
            $scope.precalculos.costo_financiero_t_i= formula.getSuma5($scope.precalculos.costo_financiero_e_i,$scope.precalculos.costo_financiero_s_i,0,0,0);
            $scope.precalculos.costo_financiero_t_i=$scope.precalculos.costo_financiero_t_i.toFixed(0);
        }
        $scope.calGastoViajeClienteEP = function(){ //redondear ambos numeros
            $scope.precalculos.gasto_viaje_cliente_e_p= formula.getPorcentaje($scope.precalculos.gasto_viaje_cliente_e_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.gasto_viaje_cliente_e_p=$scope.precalculos.gasto_viaje_cliente_e_p.toFixed(1);
        }
        $scope.calGastoViajeClienteSP = function(){ //redondear ambos numeros
            $scope.precalculos.gasto_viaje_cliente_s_p= formula.getPorcentaje($scope.precalculos.gasto_viaje_cliente_s_i,$scope.precalculos.valor_venta_servicio_s_i);
            $scope.precalculos.gasto_viaje_cliente_s_p=$scope.precalculos.gasto_viaje_cliente_s_p.toFixed(1);
        }
        $scope.calGastoViajeClienteTI = function(){
            $scope.precalculos.gasto_viaje_cliente_t_p= formula.getTotalPorcentaje($scope.precalculos.gasto_viaje_cliente_e_i,$scope.precalculos.gasto_viaje_cliente_s_i,$scope.precalculos.valor_venta_servicio_e_i,$scope.precalculos.valor_venta_servicio_s_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.gasto_viaje_cliente_t_p=$scope.precalculos.gasto_viaje_cliente_t_p.toFixed(1);
            $scope.precalculos.gasto_viaje_cliente_t_i= formula.getSuma5($scope.precalculos.gasto_viaje_cliente_e_i,$scope.precalculos.gasto_viaje_cliente_s_i,0,0,0);
            $scope.precalculos.gasto_viaje_cliente_t_i=$scope.precalculos.gasto_viaje_cliente_t_i.toFixed(0);
        }

        $scope.calGastoViajeSmhEP = function(){ //redondear ambos numeros
            $scope.precalculos.gasto_viaje_personal_smh_e_p= formula.getPorcentaje($scope.precalculos.gasto_viaje_personal_smh_e_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.gasto_viaje_personal_smh_e_p=$scope.precalculos.gasto_viaje_personal_smh_e_p.toFixed(1);
        }
        $scope.calGastoViajeSmhSP = function(){ //redondear ambos numeros
            $scope.precalculos.gasto_viaje_personal_smh_s_p= formula.getPorcentaje($scope.precalculos.gasto_viaje_personal_smh_s_i,$scope.precalculos.valor_venta_servicio_s_i);
            $scope.precalculos.gasto_viaje_personal_smh_s_p=$scope.precalculos.gasto_viaje_personal_smh_s_p.toFixed(1);
        }
        $scope.calGastoViajeSmhTI = function(){
            $scope.precalculos.gasto_viaje_personal_smh_t_p= formula.getTotalPorcentaje($scope.precalculos.gasto_viaje_personal_smh_e_i,$scope.precalculos.gasto_viaje_personal_smh_s_i,$scope.precalculos.valor_venta_servicio_e_i,$scope.precalculos.valor_venta_servicio_s_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.gasto_viaje_personal_smh_t_p=$scope.precalculos.gasto_viaje_personal_smh_t_p.toFixed(1);
            $scope.precalculos.gasto_viaje_personal_smh_t_i= formula.getSuma5($scope.precalculos.gasto_viaje_personal_smh_e_i,$scope.precalculos.gasto_viaje_personal_smh_s_i,0,0,0);
            $scope.precalculos.gasto_viaje_personal_smh_t_i=$scope.precalculos.gasto_viaje_personal_smh_t_i.toFixed(0);
        }
        $scope.calImpuestosAduanalesEP = function(){ //redondear ambos numeros
            $scope.precalculos.impuesto_aduanal_e_p= formula.getPorcentaje($scope.precalculos.impuesto_aduanal_e_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.impuesto_aduanal_e_p=$scope.precalculos.impuesto_aduanal_e_p.toFixed(1);
        }
        $scope.calImpuestosAduanalesSP = function(){ //redondear ambos numeros
            $scope.precalculos.impuesto_aduanal_s_p= formula.getPorcentaje($scope.precalculos.impuesto_aduanal_s_i,$scope.precalculos.valor_venta_servicio_s_i);
            $scope.precalculos.impuesto_aduanal_s_p=$scope.precalculos.impuesto_aduanal_s_p.toFixed(1);
        }
        $scope.calImpuestosAduanalesTI = function(){
            $scope.precalculos.impuesto_aduanal_t_p= formula.getTotalPorcentaje($scope.precalculos.impuesto_aduanal_e_i,$scope.precalculos.impuesto_aduanal_s_i,$scope.precalculos.valor_venta_servicio_e_i,$scope.precalculos.valor_venta_servicio_s_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.impuesto_aduanal_t_p=$scope.precalculos.impuesto_aduanal_t_p.toFixed(1);
            $scope.precalculos.impuesto_aduanal_t_i= formula.getSuma5($scope.precalculos.impuesto_aduanal_e_i,$scope.precalculos.impuesto_aduanal_s_i,0,0,0);
            $scope.precalculos.impuesto_aduanal_t_i=$scope.precalculos.impuesto_aduanal_t_i.toFixed(0);
        }

        $scope.calFleteEP = function(){ //redondear ambos numeros
            $scope.precalculos.flete_e_p= formula.getPorcentaje($scope.precalculos.flete_e_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.flete_e_p=$scope.precalculos.flete_e_p.toFixed(1);
        }
        $scope.calFleteSP = function(){ //redondear ambos numeros
            $scope.precalculos.flete_s_i=formula.getMulti2(0.012,$scope.precalculos.valor_venta_servicio_s_i);
            $scope.precalculos.flete_s_i=$scope.precalculos.flete_s_i.toFixed(2);
            $scope.precalculos.flete_s_p= formula.getPorcentaje($scope.precalculos.flete_s_i,$scope.precalculos.valor_venta_servicio_s_i);
            $scope.precalculos.flete_s_p=$scope.precalculos.flete_s_p.toFixed(1);
        }
        $scope.calFleteTI = function(){
            $scope.precalculos.flete_t_p= formula.getTotalPorcentaje($scope.precalculos.flete_e_i,$scope.precalculos.flete_s_i,$scope.precalculos.valor_venta_servicio_e_i,$scope.precalculos.valor_venta_servicio_s_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.flete_t_p=$scope.precalculos.flete_t_p.toFixed(1);
            $scope.precalculos.flete_t_i= formula.getSuma5($scope.precalculos.flete_e_i,$scope.precalculos.flete_s_i,0,0,0);
            $scope.precalculos.flete_t_i=$scope.precalculos.flete_t_i.toFixed(0);
        }
        $scope.calSeguroEP = function(){ //redondear ambos numeros
            $scope.precalculos.seguro_e_p= formula.getPorcentaje($scope.precalculos.seguro_e_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.seguro_e_p=$scope.precalculos.seguro_e_p.toFixed(1);
        }
        $scope.calSeguroSP = function(){ //redondear ambos numeros
            $scope.precalculos.seguro_s_p= formula.getPorcentaje($scope.precalculos.seguro_s_i,$scope.precalculos.valor_venta_servicio_s_i);
            $scope.precalculos.seguro_s_p=$scope.precalculos.seguro_s_p.toFixed(1);
        }
        $scope.calSeguroTI = function(){
            $scope.precalculos.seguro_t_p= formula.getTotalPorcentaje($scope.precalculos.seguro_e_i,$scope.precalculos.seguro_s_i,$scope.precalculos.valor_venta_servicio_e_i,$scope.precalculos.valor_venta_servicio_s_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.seguro_t_p=$scope.precalculos.seguro_t_p.toFixed(1);
            $scope.precalculos.seguro_t_i= formula.getSuma5($scope.precalculos.seguro_e_i,$scope.precalculos.seguro_s_i,0,0,0);
            $scope.precalculos.seguro_t_i=$scope.precalculos.seguro_t_i.toFixed(0);
        }

        $scope.calCostosProyecto = function(){ //redondear ambos numeros    1                                           2                                           3                                                   4                                           5                                                   6                                               7                                               8                                                   9                                           10                                          11                                              12                              13                          14
            console.log($scope.precalculos.garantia_mano_obra_e_i);
            $scope.precalculos.costo_proyecto_e_i=formula.getSuma12($scope.precalculos.garantia_parte_e_i,    $scope.precalculos.garantia_mano_obra_e_i,  $scope.precalculos.comision_pagar_tercero_e_i,  $scope.precalculos.comision_agente_venta_e_i, $scope.precalculos.servicio_externo_e_i,    $scope.precalculos.capacitacion_personal_e_i,  $scope.precalculos.publicidad_patrocinio_congreso_e_i,  $scope.precalculos.cargo_bancario_e_i,    $scope.precalculos.costo_financiero_e_i,  $scope.precalculos.gasto_viaje_cliente_e_i,  $scope.precalculos.gasto_viaje_personal_smh_e_i,    $scope.precalculos.impuesto_aduanal_e_i,  $scope.precalculos.flete_e_i,  $scope.precalculos.seguro_e_i);
            $scope.precalculos.costo_proyecto_e_i=$scope.precalculos.costo_proyecto_e_i.toFixed(2);
            $scope.precalculos.costo_proyecto_e_p= formula.getPorcentaje($scope.precalculos.costo_proyecto_e_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.costo_proyecto_e_p=$scope.precalculos.costo_proyecto_e_p.toFixed(1);

            $scope.precalculos.costo_proyecto_s_i=formula.getSuma12($scope.precalculos.garantia_parte_s_i,    $scope.precalculos.garantia_mano_obra_s_i,  $scope.precalculos.comision_pagar_tercero_s_i,  $scope.precalculos.comision_agente_venta_s_i, $scope.precalculos.servicio_externo_s_i,    $scope.precalculos.capacitacion_personal_s_i,  $scope.precalculos.publicidad_patrocinio_congreso_s_i,  $scope.precalculos.cargo_bancario_s_i,    $scope.precalculos.costo_financiero_s_i,  $scope.precalculos.gasto_viaje_cliente_s_i,  $scope.precalculos.gasto_viaje_personal_smh_s_i,    $scope.precalculos.impuesto_aduanal_s_i,  $scope.precalculos.flete_s_i,  $scope.precalculos.seguro_s_i);
            $scope.precalculos.costo_proyecto_s_i=$scope.precalculos.costo_proyecto_s_i.toFixed(2);
            $scope.precalculos.costo_proyecto_s_p= formula.getPorcentaje($scope.precalculos.costo_proyecto_s_i,$scope.precalculos.valor_venta_servicio_s_i);
            $scope.precalculos.costo_proyecto_s_p=$scope.precalculos.costo_proyecto_s_p.toFixed(1);

            $scope.precalculos.costo_proyecto_t_p= formula.getTotalPorcentaje($scope.precalculos.costo_proyecto_e_i,$scope.precalculos.costo_proyecto_s_i,$scope.precalculos.valor_venta_servicio_e_i,$scope.precalculos.valor_venta_servicio_s_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.costo_proyecto_t_p=$scope.precalculos.costo_proyecto_t_p.toFixed(1);
            $scope.precalculos.costo_proyecto_t_i= formula.getSuma12($scope.precalculos.garantia_parte_t_i,    $scope.precalculos.garantia_mano_obra_t_i,  $scope.precalculos.comision_pagar_tercero_t_i,  $scope.precalculos.comision_agente_venta_t_i, $scope.precalculos.servicio_externo_t_i,    $scope.precalculos.capacitacion_personal_t_i,  $scope.precalculos.publicidad_patrocinio_congreso_t_i,  $scope.precalculos.cargo_bancario_t_i,    $scope.precalculos.costo_financiero_t_i,  $scope.precalculos.gasto_viaje_cliente_t_i,  $scope.precalculos.gasto_viaje_personal_smh_t_i,    $scope.precalculos.impuesto_aduanal_t_i,  $scope.precalculos.flete_t_i,  $scope.precalculos.seguro_t_i);
            $scope.precalculos.costo_proyecto_t_i=$scope.precalculos.costo_proyecto_t_i.toFixed(0);
        }
        $scope.calGastoVentaDedicado = function(){ //redondear ambos numeros    1                                           2                                           3                                                   4                                           5                                                   6                                               7                                               8                                                   9                                           10                                          11                                              12                              13                          14
            $scope.precalculos.gasto_venta_dedicado_e_i= formula.getResta2($scope.precalculos.margen_bruto_e_i,$scope.precalculos.costo_proyecto_e_i);
            $scope.precalculos.gasto_venta_dedicado_e_i=$scope.precalculos.gasto_venta_dedicado_e_i.toFixed(2);
            $scope.precalculos.gasto_venta_dedicado_e_p= formula.getPorcentaje($scope.precalculos.gasto_venta_dedicado_e_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.gasto_venta_dedicado_e_p=$scope.precalculos.gasto_venta_dedicado_e_p.toFixed(2);

            $scope.precalculos.gasto_venta_dedicado_s_i=formula.getResta2($scope.precalculos.margen_bruto_s_i,$scope.precalculos.costo_proyecto_s_i);
            $scope.precalculos.gasto_venta_dedicado_s_i=$scope.precalculos.gasto_venta_dedicado_s_i.toFixed(2);
            $scope.precalculos.gasto_venta_dedicado_s_p= formula.getPorcentaje($scope.precalculos.gasto_venta_dedicado_s_i,$scope.precalculos.valor_venta_servicio_s_i);
            $scope.precalculos.gasto_venta_dedicado_s_p=$scope.precalculos.gasto_venta_dedicado_s_p.toFixed(2);

            $scope.precalculos.gasto_venta_dedicado_t_p= formula.getTotalPorcentaje($scope.precalculos.gasto_venta_dedicado_e_i,$scope.precalculos.gasto_venta_dedicado_s_i,$scope.precalculos.valor_venta_servicio_e_i,$scope.precalculos.valor_venta_servicio_s_i,$scope.precalculos.valor_venta_e_i);
            $scope.precalculos.gasto_venta_dedicado_t_p=$scope.precalculos.gasto_venta_dedicado_t_p.toFixed(2);
            $scope.precalculos.gasto_venta_dedicado_t_i= formula.getResta2($scope.precalculos.margen_bruto_t_i,$scope.precalculos.costo_proyecto_t_i);
            $scope.precalculos.gasto_venta_dedicado_t_i=$scope.precalculos.gasto_venta_dedicado_t_i.toFixed(2);
        }

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// PRECALCULO FIN
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

    
}
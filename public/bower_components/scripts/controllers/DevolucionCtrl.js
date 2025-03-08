'use strict';
angular.module('cotizacionApp')
.controller('devolucionCtrl',function ($controller,$scope,$timeout,prestamo,prestamoSrc,userSrc,devolucion,devolucionSrc){
        $scope.preciosMultiples=[];
        $scope.insumos=[];
        $scope.objeto={
        "p_delivery_location_id":"", //ok
        "tipo_archivo":"",
        "id":"",
        "dato":"",
        "id_cliente":"",
        "id_prestamo_refaccion":"",
        "id_foraneo":"",//folio de reporte
        "folio":"",//folio de prestamo
        "tipo_moneda":"",// 20171130
        "nombre_cliente":"",
        "calle":"",
        "colonia":"",
        "c_p":"",
        "ciudad":"",
        "estado":"",
        "pais":"",
        "numero":"",
        "numero_exterior":"",
        "c_bpartner_id":"",
        "c_bpartner_location":"",
        "nombre_fiscal":"",
        "calle_fiscal":"",
        "colonia_fiscal":"",
        "c_p_fiscal":"",
        "ciudad_fiscal":"",
        "estado_fiscal":"",
        "pais_fiscal":"",
        "numero_fiscal":"",
        "rfc":"",
        "c_bpartner_id":"",
        "c_bpartner_location":"",
        "telefonos":"",
        "correos":"",
        "fax":"",
        "equipo":"",
        "marca":"",
        "modelo":"",
        "organizacion":"",
        "estatus":"",
        "sucursal":"",
        "autor":"",        
        "coordinacion":"",        
        "instituto":"",
        "id_user":"",
        "iniciales":"",
        "email":"",
        "nota":"",        
        "pedido":"",
        "id_foraneo":"",
        "iniciales_cerro":"",
        "numero_remision":"",
        "fecha_disponible":"",
        "id_foraneo":"",
        "org_name":"",
        "org_id":"",
        "insumos":[],
        "condicion_factura":"",
        "metodo_pago":"",
        "pago_tiempo":"",
    };

    $scope.precioVenta=0;
    $scope.insumosB=[];
    $scope.persona=[];
    $scope.resul={
        grd:''
    };
    $scope.fiscal={};
    $scope.tercero_filtro={
            nombre_fiscal:'',
            group_name:''
    };
    $scope.direccion_filtro={
        id_tercero:'',
        name:'',
        isshipto:''
    };
    $scope.busquedaC= { 
    'vista':1,
    'tipo_equipo':"",
    'codigo_proovedor':"",
    'modelo':"",
    'descripcion':"",
    'marca':""
    }

    $scope.subtotal=0;
    $scope.iva=0;
    $scope.total=0;

    $scope.reset=function(){
        $scope.objeto={
        "id":"",
        "id_prestamo_refaccion":"",
        "id_cotizacion":"",
        "folio_contrato":"",
        "folio":"",//folio de reporte
        "nombre_cliente":"",
        "calle":"",
        "colonia":"",
        "c_p":"",
        "ciudad":"",
        "estado":"",
        "pais":"",
        "numero":"",
        "numero_exterior":"",
        "c_bpartner_id":"",
        "c_bpartner_location":"",
        "nombre_fiscal":"",
        "calle_fiscal":"",
        "colonia_fiscal":"",
        "c_p_fiscal":"",
        "ciudad_fiscal":"",
        "estado_fiscal":"",
        "pais_fiscal":"",
        "numero_fiscal":"",
        "rfc":"",
        "c_bpartner_id":"",
        "c_bpartner_location":"",
        "telefonos":"",
        "correos":"",
        "fax":"",
        "equipo":"",
        "marca":"",
        "modelo":"",
        "organizacion":"",
        "estatus":"",
        "sucursal":"",
        "autor":"",        
        "coordinacion":"",        
        "instituto":"",
        "id_user":"",
        "iniciales":"",
        "email":""
        };
    }

    $timeout(function() {   
        $scope.ver_almacen=true;
        $scope.id_precios=true;                                                                //console.log($scope.tipo_archivo);
        userSrc.get({vista:3,area:'SERVICIO TECNICO'},function(d){                          //console.log(d.usuarios) //userSrc.get({vista:2,area:'SERVICIO TECNICO'},
            $scope.usuarios=d.usuarios;
            $scope.crear=true;
        },function(e){alert('Error: '+e.status+' '+e.data);});
    },3000);

    $scope.getPrestamo=function(id){                                                            console.warn('IR POR PRESTAMO: '+id);
        var i=0;
       prestamoSrc.get({id:id},function(d){                                                     console.log(d);
                    $scope.objeto=d.objeto;                                                     console.info($scope.objeto);
                    var f_v=d.objeto.vigencia.split("-");
                    $scope.vig=f_v[2]+"-"+f_v[1]+"-"+f_v[0]+" 00:00:00";
                    var f_e=d.objeto.fecha_atencion.split("-");
                    $scope.fec_ent=f_e[2]+"-"+f_e[1]+"-"+f_e[0]+" 00:00:00";
                    $scope.objeto.id_foraneo=d.objeto.id;                                       console.info($scope.insumosB);console.info(d.objeto.prestamo.condicion_factura);
                    $scope.objeto.pedido=d.objeto.prestamo.pedido;                              console.info(d.objeto.id);
       prestamoSrc.get({id:id,v:4},function(d1){                                                //console.log(d1);console.log("SEGUNDO SRC");//$scope.insumosB=d1.objeto;  
                    while(i < d1.objeto.length){
                        $scope.insumosB.push({ 
                            id_insumo:d1.objeto[i].id_insumo,                      
                            id_compra_venta:d1.objeto[i].id_compra_venta,
                            id_pack:d1.objeto[i].id_pack,
                            tipo_equipo:d1.objeto[i].tipo_equipo,
                            marca:d1.objeto[i].marca,
                            modelo:d1.objeto[i].modelo,
                            caracteristicas:d1.objeto[i].caracteristicas,
                            especificaciones:d1.objeto[i].especificaciones,
                            cantidad:d1.objeto[i].calculo,
                            codigo_proovedor:d1.objeto[i].codigo_proovedor,
                            descripcion:d1.objeto[i].descripcion,
                            costos:d1.objeto[i].costos,
                            precio:d1.objeto[i].precio,                                  //precio:$scope.seleccionado.precio,
                            costo_moneda:d1.objeto[i].costo_moneda,
                            unidad_compra:d1.objeto[i].unidad_compra,
                            total:d1.objeto[i].total,                                    //cotizacion:$scope.coti// done:false,
                            tipo_cambio:d1.objeto[i].tipo_cambio,
                            bandera_insumo:d1.objeto[i].bandera_insumo,
                            tax_id:d1.objeto[i].tax_id,
                            check:d1.objeto[i].check,
                            unidad_venta:d1.objeto[i].unidad_venta,
                            clase:d1.objeto[i].clase,
                            id_prestamo:d1.objeto[i].id_prestamo,
                            //id_insumo_prestamo:d1.objeto[i].id_insumo_prestamo,
                            id_insumo_prestamo:d1.objeto[i].id,
                            //id_devolucion:d1.objeto[i].id,
                            id:d1.objeto[i].id,
                         });
                        i++;                                                        //console.log(i);
                    }//while 
        },function(e){alert('Error: '+e.status+' '+e.data);});
        },function(e){alert('Error: '+e.status+' '+e.data);});
    }

    $scope.getDevolucion=function(id){                                                          console.log(id);
        devolucionSrc.get({id:id},function(d){                                                  console.log(d);
                    $scope.objeto=d.objeto;                                                     console.info($scope.objeto);
                    var f_v=d.objeto.vigencia.split("-");
                    $scope.vig=f_v[2]+"-"+f_v[1]+"-"+f_v[0]+" 00:00:00";
                    var f_e=d.objeto.fecha_atencion.split("-");
                    $scope.fec_ent=f_e[2]+"-"+f_e[1]+"-"+f_e[0]+" 00:00:00";
                    //$scope.insumos=d.objeto.insumos_compras_ventas;                             console.log($scope.insumos.length);
                    $scope.objeto.pedido=d.objeto.prestamo.pedido;                              console.info($scope.insumos);console.info(d.objeto.prestamo.condicion_factura);
                    var i=0;
                    while(i < d.objeto.insumos_compras_ventas.length){
                        $scope.insumos.push({
                            id_insumo:d.objeto.insumos_compras_ventas[i].id_insumo,                      
                            id_compra_venta:d.objeto.insumos_compras_ventas[i].id_compra_venta,
                            id_pack:d.objeto.insumos_compras_ventas[i].id_pack,
                            tipo_equipo:d.objeto.insumos_compras_ventas[i].tipo_equipo,
                            marca:d.objeto.insumos_compras_ventas[i].marca,
                            modelo:d.objeto.insumos_compras_ventas[i].modelo,
                            caracteristicas:d.objeto.insumos_compras_ventas[i].caracteristicas,
                            especificaciones:d.objeto.insumos_compras_ventas[i].especificaciones,
                            cantidad:d.objeto.insumos_compras_ventas[i].cantidad,
                            codigo_proovedor:d.objeto.insumos_compras_ventas[i].codigo_proovedor,
                            descripcion:d.objeto.insumos_compras_ventas[i].descripcion,
                            costos:d.objeto.insumos_compras_ventas[i].costos,
                            precio:d.objeto.insumos_compras_ventas[i].precio,                                  //precio:$scope.seleccionado.precio,
                            costo_moneda:d.objeto.insumos_compras_ventas[i].costo_moneda,
                            unidad_compra:d.objeto.insumos_compras_ventas[i].unidad_compra,
                            total:d.objeto.insumos_compras_ventas[i].total,                                    //cotizacion:$scope.coti// done:false,
                            tipo_cambio:d.objeto.insumos_compras_ventas[i].tipo_cambio,
                            bandera_insumo:d.objeto.insumos_compras_ventas[i].bandera_insumo,
                            tax_id:d.objeto.insumos_compras_ventas[i].tax_id,
                            check:d.objeto.insumos_compras_ventas[i].check,
                            unidad_venta:d.objeto.insumos_compras_ventas[i].unidad_venta,
                            clase:d.objeto.insumos_compras_ventas[i].clase,
                            id_prestamo:d.objeto.insumos_compras_ventas[i].id_prestamo,
                            id_insumo_prestamo:d.objeto.insumos_compras_ventas[i].id_insumo_prestamo,
                            id_devolucion:d.objeto.insumos_compras_ventas[i].id,
                            id:d.objeto.insumos_compras_ventas[i].id,
                        });
                        i++;                                                        //console.log(i);
                    }//while 
            },function(e){alert('Error: '+e.status+' '+e.data);});                             
    }
        
    $scope.equipos =function(seleccionado){                                                     //console.log(seleccionado);      //OK
        $scope.ver_insumo_precio=true;
        $scope.btnCarrito=false;
        if(confirm("¿Desea agregar el insumo seleccionado?")){
            $scope.btnCarrito=false;
            $scope.seleccionado=seleccionado;
            $scope.cantidad=seleccionado.cantidad;
            $scope.codigo_proovedor=seleccionado.codigo_proovedor;
            $scope.unidad_medida=seleccionado.unidad_venta;
            $scope.descripcion=seleccionado.descripcion;
            $scope.lugar=seleccionado.especificaciones;
            $scope.precioVenta=0;
        }else{alert("! ACCION CANCELADA ¡")}
    }

    $scope.agregarCarrito=function(){                                           //console.log($scope.especificaciones); //OK     //console.log($scope.seleccionado);
        if($scope.lugar=="stock"||$scope.lugar=="EQUIPO"){
        $scope.insumos.push({
            //id_insumo:$scope.seleccionado.id,                      
            id:"",               
            id_pack:$scope.seleccionado.id_pack,
            cantidad:$scope.cantidad,
            codigo_proovedor:$scope.seleccionado.codigo_proovedor,
            modelo:$scope.seleccionado.modelo,
            marca:$scope.seleccionado.marca,
            descripcion:$scope.descripcion,
            caracteristicas:$scope.seleccionado.caracteristicas,
            especificaciones:$scope.lugar,
            costos:$scope.seleccionado.costos,
            precio:$scope.seleccionado.precio,                                  //precio:$scope.seleccionado.precio,
            unidad_venta:$scope.unidad_medida,
            unidad_compra:$scope.seleccionado.unidad_compra,
            costo_moneda:$scope.seleccionado.costo_moneda,
            tipo_cambio:$scope.seleccionado.tipo_cambio,
            tipo_equipo:$scope.seleccionado.tipo_equipo,
            bandera_insumo:$scope.seleccionado.bandera_insumo,
            costo_moneda:$scope.seleccionado.costo_moneda,
            total:$scope.seleccionado.total,                                    //cotizacion:$scope.coti// done:false,
            id_insumo_prestamo:$scope.seleccionado.id,                                            
            id_prestamo:$scope.seleccionado.id_compra_venta,
            id_devolucion:$scope.seleccionado.id_compra_venta,
            id_insumo:$scope.seleccionado.id_insumo,
        });
        $scope.btnCarrito=true;                                                   console.info($scope.insumos);
        }else{
            alert("FAVOR DE INDICAR LA UBICACION DEL PRODUCTO");
        }
    }

    $scope.remover=function(j,objeto){                                                                              console.log(objeto);
        if(confirm("¿ DESEA ELIMINAR EL OBJETO DE LA LISTA?")){
            prestamoSrc.get({id:objeto.id_prestamo,codigo_proovedor:objeto.codigo_proovedor,v:2},function(d){       console.log(d);console.log("VALIDA SI ES DIFERENTE DE PRESTAMO");
            if(d.msg.length>0){
              alert(d.msg[0]);
            }else{
            prestamoSrc.get({id:objeto.id_insumo_prestamo,v:3,objeto:objeto},function(d){                                console.log(d);
                $scope.insumos.splice(j,1); 
                alert(d.msg);
              },function(e){                                                                                        console.log(e);
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
            }//FIN ELSE
          });      
        }else{
            alert("¡ Accion Cancelada !");
        }
    }


    $scope.guardar=function(){                                                              console.log($scope.objeto);
        if($scope.insumos.length==0){alert("FAVOR DE AGREGAR PRODUCTOS");}else{
            if($scope.id_edit){
                $scope.objeto.insumos=$scope.insumos;
                $scope.rsl=devolucion.modf($scope.objeto);                                    console.info("ULDATE:"+$scope.objeto)
                if($scope.rsl){                                                             console.warn($scope.rsl);
                } 
            }else{                                                                          console.warn("GUARDAR DEVOLUCION");
                $scope.objeto.insumos=$scope.insumos;
                $scope.rsl=devolucion.crea($scope.objeto);                
                if($scope.rsl){                                                             console.warn($scope.rsl);
                    $scope.save=true;
                } 
            }  
        }
    };

    $scope.filtroContrato=function(){
        if($scope.objeto.instituto.length>0){
            contratosSrc.get({v:'2',instituto:$scope.objeto.instituto},function(d){                                            //console.log('->'+d.objetos.length);
                if(d.objetos.length==0){                            //$scope.objeto.folio_contrato=d.objeto.instituto;
                    $scope.objeto.instituto='';                     //alert('VERIFICAR CONTRATO');
                    $scope.objeto.folio_contrato='';
                }else{
                    console.log(d.objetos[0]);
                    $scope.objeto.folio_contrato=d.objetos[0].folio_contrato;
                }
            },function(e){alert(e.status+e.data);});
        }
    }

    $scope.select_vig=function(date){
        $scope.objeto.vigencia=moment(date).format('DD-MM-YYYY');  
    }

    $scope.select_fec_ent=function(date){
        $scope.objeto.fecha_atencion=moment(date).format('DD-MM-YYYY');  
    }

})
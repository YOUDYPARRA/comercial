'use strict';
angular.module('cotizacionApp')
.controller('prestamoCtrl',function ($controller,contratosSrc,$window,tercerosSrc,userSrc,reportesSrc,reporte,insumosSrc,direccionesSrc,terceroComercial,tercero,$scope,$timeout,prestamo,prestamoSrc){
        angular.extend(this,$controller('NumeroAletraCtrl',{$scope:$scope}));
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

    $scope.getReporte=function(objeto){                                                     console.warn('IR POR REPORTE'+objeto);
        $scope.reporte = JSON.parse(objeto);                                                console.log($scope.reporte);
        $scope.objeto=$scope.reporte;
        $scope.objeto.vigencia="";
        $scope.objeto.numero_exterior=$scope.reporte.nota;
        $scope.objeto.nota="";
        $scope.objeto.nota_cliente=$scope.reporte.calle + ' '+ $scope.reporte.colonia+' '+ $scope.reporte.c_p +' '+$scope.reporte.ciudad+' '+' '+$scope.reporte.estado;
        $scope.objeto.id_foraneo=$scope.reporte.id;
        $scope.objeto.org_name=$scope.reporte.organizacion;
        $scope.objeto.nombre_responsable="";
        $scope.objeto.tipo_archivo="";                                                      console.info($scope.objeto.id_cliente);
        $scope.objeto.autor="";                                                              //  $scope.dato=JSON.parse(d.objeto.dato);               // console.info($scope.dato.p_delivery_location_id);                  //  $scope.objeto.p_delivery_location_id=$scope.dato.p_delivery_location_id;
        //$scope.objeto.dato="";                                                              //  $scope.dato=JSON.parse(d.objeto.dato);               // console.info($scope.dato.p_delivery_location_id);                  //  $scope.objeto.p_delivery_location_id=$scope.dato.p_delivery_location_id;
        $scope.objeto.hora_atencion="";                                                              //  $scope.dato=JSON.parse(d.objeto.dato);               // console.info($scope.dato.p_delivery_location_id);                  //  $scope.objeto.p_delivery_location_id=$scope.dato.p_delivery_location_id;
    }

    $scope.buscarB =function(busquedaC){            
        insumosSrc.get(busquedaC,function(data){
            $scope.insumosB=data.insumos;                                   //console.log($scope.insumos);
        },function(err){alert('ERROR EN SERVIDOR.');});
    }
        
    $scope.equipos =function(seleccionado){   //console.log(seleccionado);      //OK
        $scope.ver_insumo_precio=true;
        $scope.btnCarrito=false;
        if(confirm("¿Desea agregar el insumo seleccionado?")){
            $scope.btnCarrito=false;
            $scope.cantidad=1;
            $scope.codigo_proovedor=seleccionado.codigo_proovedor;
            $scope.unidad_medida=seleccionado.unidad_medida;
            $scope.descripcion=seleccionado.descripcion;
            $scope.seleccionado=seleccionado;
            $scope.precioVenta=0;
            //$scope.calculo=$scope.cantidad;
        }else{alert("! ACCION CANCELADA ¡")}
    }

    $scope.agregarCarrito=function(){                                           //console.log($scope.especificaciones); //OK     //console.log($scope.seleccionado);
        if($scope.lugar=="stock"||$scope.lugar=="EQUIPO"){
        $scope.insumos.push({
            id_insumo:$scope.seleccionado.id,                      
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
            unidad_venta:$scope.seleccionado.unidad_medida,
            unidad_compra:$scope.seleccionado.unidad_compra,
            costo_moneda:$scope.seleccionado.costo_moneda,
            tipo_cambio:$scope.seleccionado.tipo_cambio,
            tipo_equipo:$scope.seleccionado.tipo_equipo,
            bandera_insumo:$scope.seleccionado.bandera_insumo,
            costo_moneda:$scope.seleccionado.costo_moneda,
            total:$scope.seleccionado.total,                                    //cotizacion:$scope.coti// done:false,
            m_product_id:$scope.m_product_id,
            tax_id:$scope.c_tax_id,
            group_name:$scope.group_name,
            calculo:$scope.cantidad
        });
        $scope.btnCarrito=true;
        console.info($scope.insumos);
        }else{
            alert("FAVOR DE INDICAR LA UBICACION DEL PRODUCTO");
        }
    }

    $scope.remover=function(j,seleccionado){                                                  console.log(seleccionado);
        if(confirm("¿ DESEA ELIMINAR EL OBJETO DE LA LISTA?")){
                $scope.insumos.splice(j,1);       
        }else{
            alert("¡ Accion Cancelada !");
        }
    }

    $timeout(function() {   
        $scope.btnCarrito=true;
        $scope.ver_almacen=true;
        $scope.id_precios=true;                                                                //console.log($scope.tipo_archivo);
        userSrc.get({vista:3,area:'SERVICIO TECNICO'},function(d){                          //console.log(d.usuarios) //userSrc.get({vista:2,area:'SERVICIO TECNICO'},
            $scope.usuarios=d.usuarios;
            $scope.crear=true;
        },function(e){alert('Error: '+e.status+' '+e.data);});
        if($scope.id_edit){                                                                 console.log('IR POR PRESTAMO');
            prestamoSrc.get({id:$scope.id_edit},function(d){                                console.log(d);
                    $scope.objeto=d.objeto;                                                     console.info($scope.objeto);
                    var f_v=d.objeto.vigencia.split("-");
                    $scope.vig=f_v[2]+"-"+f_v[1]+"-"+f_v[0]+" 00:00:00";
                    var f_e=d.objeto.fecha_atencion.split("-");
                    $scope.fec_ent=f_e[2]+"-"+f_e[1]+"-"+f_e[0]+" 00:00:00";
                    $scope.insumos=d.objeto.insumos_compras_ventas;   
                    $scope.objeto.pedido=d.objeto.prestamo.pedido;                              console.info($scope.insumos);console.info(d.objeto.prestamo.condicion_factura);
            },function(e){alert('Error: '+e.status+' '+e.data);});                             
        }//}
    },3000);


    $scope.guardar=function(){                                                              console.log($scope.objeto);
        if($scope.insumos.length==0){alert("FAVOR DE AGREGAR PRODUCTOS");}else{
            if($scope.id_edit){
                $scope.objeto.insumos=$scope.insumos;
                $scope.rsl=prestamo.modf($scope.objeto);                                    console.info("ULDATE:"+$scope.objeto)
                if($scope.rsl){                                                             console.warn($scope.rsl);
                } 
            }else{                                                                          console.warn("GUARDA PRESTAMO")
                $scope.objeto.insumos=$scope.insumos;
                $scope.rsl=prestamo.crea($scope.objeto);                
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
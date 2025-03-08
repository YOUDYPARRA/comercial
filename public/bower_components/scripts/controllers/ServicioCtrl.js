'use strict';
angular.module('cotizacionApp')
.controller('servicioCtrl',function ($controller,$window,servicio,servicioSrc,cotizacionSrc,programacion,tercerosSrc,userSrc,reportesSrc,reporte,insumosSrc,direccionesSrc,terceroComercial,coordinacion,producto,tercero,$scope,$timeout,$location,programacionSrc,cotizacionPaqueteInsumoSrc){
       // angular.extend(this,$controller('contratoCtrl',{$scope:$scope}));
    $scope.insumos=[];
    $scope.trabajo_horas=0;
    $scope.viaje_horas=undefined;
    $scope.trabajo_tarde=0;
    $scope.trabajo_manana=0;
    $scope.ok=0;
    $scope.horarios=[];
    $scope.persona=[];
    $scope.rsl={};
    $scope.fiscal={};                                   //$scope.condiciones_servicio=programacion.condiciones_servicio;
    $scope.cotizaciones=[];
    $scope.objeto={
        "id":"",
        "nombre_dpto_manto":"",
        "id_prestamo_refaccion":"",
        "id_cotizacion":"",
        "id_foraneo":"",
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
        "numero_serie":"",
        "nombre_responsable":"",
        "organizacion":"",
        "estatus":"",
        "fecha_inicio":"",
        "fecha_fin":"",
        "hora_atencion":"",
        "sucursal":"",
        "autor":"",
        "coordinacion":"",
        "instituto":"",
        "id_user":"",
        "iniciales":"",
        "email":"",
        "asistencia":"",
        "persona":[],
        "insumos":[]
    };

    $scope.resul={
        grd:''
    };

    $scope.resoluciones=[
        {nombre:'LLAMADA'},
        {nombre:'LABORATORIO'},
        {nombre:'VISITA'}
    ];

    $scope.condiciones_servicio=[
        {nombre:'ORDEN DE TRABAJO'},
        {nombre:'ORDEN DE TRABAJO COMERCIAL'},
        {nombre:'ORDEN DE TRABAJO CORTESIA'},
        {nombre:'CONTRATO'},
        {nombre:'FACTURAR'},
        {nombre:'FACTURAR VIP'},
        {nombre:'GARANTIA'},
        {nombre:'GARANTIA SERVICIO'},
        {nombre:'GARANTIA COMERCIAL'},
        {nombre:'MONTAJE'}
    ];

    $scope.asistencias=[
        {nombre:'OFICINA'},
        {nombre:'SITIO CLIENTE'}
    ];

    $scope.tipos_servicio=[
        {nombre:'MONTAJE DE EQUIPO'},
        {nombre:'DESMONTAJE DE EQUIPO'},
        {nombre:'CAPACITACION'},
        {nombre:'CALIBRACION'},
        {nombre:'CONFIGURACION'},
        {nombre:'REVISION Y DIAGNOSTICO'},
        {nombre:'MANTENIMIENTO PREVENTIVO'},
        {nombre:'MANTENIMIENTO CORRECTIVO'},
        {nombre:'PRUEBAS RADIOLOGICAS'},
        {nombre:'LEVANTAMIENTO DE AREA'},
        {nombre:'SUPERVISION DE AREA'},
        {nombre:'ENTREGA DE ADECUACION'},
        {nombre:'ELABORACION DE GUIA MECANICA'},
        {nombre:'ENTREGA DE GUIA MECANICA'},
        {nombre:'ELABORACION DE PRESUPUESTO'},
        {nombre:'TRABAJO ADMINISTRATIVO'},
        {nombre:'ENTREGA DE REFACCION'}
    ];

    $scope.sucursales=[
        {nombre:'CH'},
        {nombre:'MER'},
        {nombre:'GDL'},
        {nombre:'MTY'},
        {nombre:'MX'}
    ];

    $scope.tercero_filtro={
        nombre_fiscal:'',
        group_name:''
    };

    $scope.direccion_filtro={
        id_tercero:'',
        name:'',
        isshipto:''
    };

    $scope.busquedaC={
        'vista':1,
        'tipo_equipo':"",
        'codigo_proovedor':"",
        'modelo':"",
        'descripcion':"",
        'marca':""
    }

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
        "numero_exterior":"",//
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
        "c_bpartner_location":"",//
        "telefonos":"",
        "correos":"",
        "fax":"",
        "equipo":"",
        "marca":"",
        "modelo":"",
        "numero_serie":"",
        "nombre_responsable":"",
        "organizacion":"",
        "estatus":"",
        "fecha_inicio":"",
        "fecha_fin":"",
        "hora_atencion":"",
        "sucursal":"",
        "autor":"",
        "coordinacion":"",
        "instituto":"",
        "id_user":"",
        "iniciales":"",
        "email":"",
        "asistencia":""
        };
    }

    $scope.errFn=function(e){
        alert('Error: '+e.status+' '+e.data);
    }

    $scope.validar=function(val){
        if(val!=""){
           if(confirm("¿Desea cerrar la orden de servicio?")){        console.info("SI");
           }else{
                $scope.objeto.resuelto_por="";
           }
        }
    }

    $scope.buscarB =function(busquedaC){
        insumosSrc.get(busquedaC,function(data){
            $scope.insumosB=data.insumos;                //console.log($scope.insumos);
        },function(err){
            alert('ERROR EN SERVIDOR.');
        });
    }

    $scope.clienteClk=function(e){
        if(e.taxid!= undefined && e.taxid!= null){
            $scope.objeto.nombre_fiscal=e.bpartner_name;
            $scope.objeto.rfc=e.taxid;
            direccionesSrc.get({id_tercero:e.c_bpartner_id},function(d){
                $scope.cliente.terceros=d.direcciones;                                      console.log(d.direcciones.length);
                if(d.direcciones!= undefined && d.direcciones.length==1){
                    $scope.objeto.calle_fiscal=d.direcciones[0].address1;
                    $scope.objeto.colonia_fiscal=d.direcciones[0].address2;
                    $scope.objeto.c_p_fiscal=d.direcciones[0].cp;
                    $scope.objeto.ciudad_fiscal=d.direcciones[0].city;
                    $scope.objeto.estado_fiscal=d.direcciones[0].region_name;
                    $scope.objeto.pais_fiscal=d.direcciones[0].country_name;                //$scopobjeto.e.numero_fiscal=d.direcciones.
                    $scope.objeto.c_bpartner_location=d.direcciones[0].c_bpartner_location_id;
                    $scope.objeto.c_bpartner_id=d.direcciones[0].c_bpartner_id;
                }
            },function(e){
                alert(e.status+e.data)
            });
        }else if(e.name!= undefined && e.name!= null){
            $scope.objeto.nombre_cliente=e.name;
            $scope.objeto.calle=e.address1;
            $scope.objeto.colonia=e.address2;
            $scope.objeto.c_p=e.cp;
            $scope.objeto.ciudad=e.city;
            $scope.objeto.estado=e.region_name;
            $scope.objeto.pais=e.country_name;
            $scope.objeto.telefonos=e.phone;
            $scope.objeto.c_bpartner_location=e.c_bpartner_location_id;
            $scope.objeto.c_bpartner_id=e.c_bpartner_id;
            $scope.cliente=tercero.qry({id:$scope.objeto.c_bpartner_id});
        }else{
            $scope.objeto.nombre_cliente=e.nombre_cliente;
            $scope.objeto.calle=e.calle;
            $scope.objeto.colonia=e.colonia;
            $scope.objeto.c_p=e.c_p;
            $scope.objeto.ciudad=e.ciudad;
            $scope.objeto.estado=e.estado;
            $scope.objeto.pais=e.pais;
            $scope.objeto.pais=e.pais;
            $scope.objeto.numero=e.numero;
            $scope.objeto.telefonos=e.telefono;
            $scope.objeto.correos=e.correos;
        }//fin if taxid
    }//fin clienteFn

    $scope.filtroTercero=function(){
        if($scope.tercero_filtro.nombre_fiscal.length>2){
            $scope.cliente=terceroComercial.qry({nombre_fiscal:'*'+$scope.tercero_filtro.nombre_fiscal+'*'});       //$scope.cliente=tercero.qry({nombre_fiscal:'*'+$scope.tercero_filtro.nombre_fiscal+'*'});
        }else{
            $scope.clientes=tercero.qry($scope.tercero_filtro);
        }
    }

    $scope.filtroMarca=function(){
        insumosSrc.get({vista:'3',tipo_equipo:$scope.objeto.equipo,bandera:'E'},function(d){
                    $scope.filtro.marcas=d.objetos;
        },function(e){
            alert(e.status+e.data)
        });
    }

    $scope.filtroCotizacion=function(){
        if(objeto.numero_cotizacion != undefined && objeto.numero_cotizacion.length>0){
            cotizacionSrc.get({buscar:'1',numero_cotizacion:$scope.objeto.numero_cotizacion,aprobacion:'4'},function(d){
                if(d.objetos.length>0){
                    $scope.objeto.id_cotizacion=d.objeto.id;
                }else{
                    alert('NÚMERO DE COTIZACION NO VALIDO');
                }
            },function(e){
                alert(e.status+e.data)
            });
        }
    }

    $scope.filtroModelo=function(){
        insumosSrc.get({vista:'4',marca:$scope.objeto.marca,bandera:'E'},function(d){
            $scope.filtro.modelos=d.objetos;
        },function(e){
            alert(e.status+e.data)
        });
    }

    $timeout(function(){                                                //console.log($location.absUrl());
        $scope.filtro={
            producto:producto.qry({vi:"1"}),
            coordinacion:coordinacion.qry({vi:"1"})
        };
        userSrc.get({vista:2},function(d){                              //userSrc.get({vista:2,area:'SERVICIO TECNICO'},
            $scope.usuarios=d.usuarios;
        },function(e){
            alert('Error: '+e.status+' '+e.data);
        });
    });

    $timeout(function(){
        var y=$scope.id;
        var programacion=$scope.programacion;
        var servicio=$scope.servicio;
        var z=$scope.objeto.id;
        $scope.filtroMarca();
        $scope.filtroModelo();                                                        console.log(programacion);
        if(y>0){                                                                      console.log("UPDATE");
            $scope.update=true;
            $scope.crear=false;
            programacionSrc.get({id:y},function(d){                                   console.log(d);console.log(d.objeto);
                $scope.objeto.persona=[];
                $scope.objeto=d.objeto;
                $scope.objeto.asistencia=d.objeto.personas_servicio[0].asistencia;
                angular.forEach(d.objeto.personas_servicio, function(value, key) {      console.log(value);
                    $scope.persona.push(value.id_user);
                });                                                                     console.log($scope.persona.a);
            },function(e){
                alert('Error: '+e.status+' '+e.data);
            })
        }

        if(programacion>0){                                                             console.log("HAY PROGRAMACION = CREATE OS");//console.log('IR POR LA PROGRAMACION'+programacion);
            $scope.btnCarrito=true;                     //$scope.save=true;
            $scope.ver_unidad_venta=true;
            $scope.esc_datosTercero=true;                //$scope.esc_datosEquipo=true;
            $scope.ver_resueltoPor=true;
            programacionSrc.get({id:programacion},function(d){
                $scope.objeto=d.objeto;
                var id_cotizacion=d.objeto.id_cotizacion.split(",");                        console.info(id_cotizacion);
                var i=0;
                    $scope.objeto.id_cotizacion=id_cotizacion;                           console.log($scope.objeto.id_cotizacion);
                while(i<id_cotizacion.length){
                    cotizacionPaqueteInsumoSrc.get({id:id_cotizacion[i]},function(data){    console.info(data.cotizacion);
                        $scope.cotizaciones.push({
                            id:data.cotizacion.id,
                            numero_cotizacion:data.cotizacion.numero_cotizacion,
                            version:data.cotizacion.version,
                        });
                    });
                    i++;
                }
                if(servicio!=''){
                    $scope.objeto.id=$scope.servicio;
                }else{
                    $scope.objeto.id='0';
                }
                if(d.objeto.rel_cotizacion!= null){
                    $scope.objeto.numero_cotizacion=d.objeto.numero_cotizacion;
                    //$scope.objeto.id_cotizacion=d.objeto.id_cotizacion;
                }
                $scope.objeto.nombre_responsable ="";
                $scope.objeto.nota_cliente ="";
                $scope.objeto.resuelto_por="";
                $scope.objeto.programacion=programacion;
                $scope.objeto.clase='S';
                $scope.reporte=d.objeto.folio;
                $scope.insumosB=d.objeto.insumos;
                angular.forEach(d.objeto.personas_servicio, function(value, key) {          //console.log(value);
                    $scope.persona.push(value.id_user);                                         //buscar el numero de la orden de servicio
                });                                                                         //console.log(servicio);
                if(servicio!=''){//console.log('ENTRAR A BUSCAR O.S.');
                    servicioSrc.get({id:servicio},function(d){                          //IR POR EL NUMERO DE ORDEN DE SERVICIO ASIGNADO A ESTE SERVICIO console.log('NUMERO DE ORDEN');
                        $scope.objeto.folio=d.objeto.folio;
                    });                                                                     //$scope.objeto.persona[0]=$scope.objeto.personas_servicio[0];
                }else{
                        $scope.objeto.folio=0;
                }

            },function(er){
                alert('ERROR: '+er.status+' '+er.data);
            });
            $('#exampleModal').modal('show');//MOSTRAR MODAL PARA VERIFICAR FOLIO
        }

        if(z>0){                                                                        //ir por orden de servicio para realizar la actualizacion
            $scope.ver_resueltoPor=true;
            servicioSrc.get({id:z},function(d){                                                         console.log('NUMERO DE ORDEN ´PARA ACTUALIZACION...');
                $scope.objeto=d.objeto;                                                                 console.info(d.objeto);console.info(d.objeto.fecha_atencion);
                var id_cotizacion=d.objeto.id_cotizacion.split(",");                     console.info(id_cotizacion);
                var i=0;
                    $scope.objeto.id_cotizacion=id_cotizacion;                           console.log($scope.objeto.id_cotizacion);
                while(i<id_cotizacion.length){
                    cotizacionPaqueteInsumoSrc.get({id:id_cotizacion[i]},function(data){    console.info(data.cotizacion);
                        $scope.cotizaciones.push({
                            id:data.cotizacion.id,
                            numero_cotizacion:data.cotizacion.numero_cotizacion,
                            version:data.cotizacion.version,
                        });
                    });
                    i++;
                }
                $scope.objeto.monto_gasto=d.objeto.rel_servicio.monto_gasto;
                $scope.objeto.monto_gasto_diverso=d.objeto.rel_servicio.monto_gasto_diverso;
                $scope.objeto.describe_gasto_diverso=d.objeto.rel_servicio.describe_gasto_diverso;
                $scope.objeto.conclusion_trabajo=d.objeto.rel_servicio.conclusion_trabajo;
                $scope.fec_at=$scope.objeto.fecha_atencion;
                var fecha_os=$scope.objeto.fecha_atencion.split("-");                                   console.log(fecha_os);
                $scope.objeto.fecha_atencion=fecha_os[2].substring(0,2)+"-"+fecha_os[1]+"-"+fecha_os[0];console.log($scope.objeto.fecha_atencion);
                var j=0;
                while(j<d.objeto.rel_horario.length){
                    var fec=d.objeto.rel_horario[j].fecha.split("-");
                    var fecha=fec[2].substring(0,2)+"-"+fec[1]+"-"+fec[0];                              console.log(fec);
                    $scope.horarios[j]={manana_entrada:d.objeto.rel_horario[j].manana_entrada,
                        manana_salida:d.objeto.rel_horario[j].manana_salida,
                        tarde_entrada:d.objeto.rel_horario[j].tarde_entrada,
                        tarde_salida :d.objeto.rel_horario[j].tarde_salida,
                        trabajo_horas :d.objeto.rel_horario[j].trabajo_horas,
                        viaje_horas :d.objeto.rel_horario[j].viaje_horas,
                        total_horas :d.objeto.rel_horario[j].total_horas,
                        espera:d.objeto.rel_horario[j].espera,
                        fecha :fecha}
                    j++;
                }                                                                                       //$scope.horarios=d.objeto.rel_horario;
                $scope.insumos=d.objeto.insumos_compras_ventas;
                angular.forEach(d.objeto.personas_servicio, function(value, key) {
                    $scope.persona.push(value.id_user);
                });
            });
        }         //}
    },3000);

    $scope.guardar=function(){                              //console.log($scope.horarios.length);
        var cadena=$scope.objeto.id_cotizacion;
        $scope.objeto.id_cotizacion=cadena.toString();
        if($scope.horarios.length==0){
            alert("No ha ingresado el horario de trabajo");
        }
        if($scope.horarios.length>=0){
            if($scope.persona.length==0){                           console.log("SIN ING");
                alert("NO HAY NINGUN INGENIERO SELECCIONADO");
            }else{                                                      console.log("CON ING");
            $scope.objeto.persona=$scope.persona;
            $scope.objeto.horarios=$scope.horarios;
            $scope.objeto.insumos=$scope.insumos;
            $scope.objeto.estatus="CAPTURADO";
            $scope.objeto.calificacion="CAPTURADO";
            $scope.objeto.fecha_captura="1";                //console.log("SAVE NEW");console.log($scope.objeto);
            $scope.rsl=servicio.modf($scope.objeto);                  //  $scope.redirect();
            if($scope.rsl){                                 //console.log("ok");
               $scope.save=true;
            }
        }
        }
    };

    $scope.redirect = function () {
        window.location.href="http://" + $window.location.host + "/servicios";
    };

    $scope.resetEntrega=function(){
        $scope.objeto.nombre_cliente="";
        $scope.objeto.calle="";
        $scope.objeto.colonia="";
        $scope.objeto.c_p="";
        $scope.objeto.ciudad="";
        $scope.objeto.estado="";
        $scope.objeto.pais="";
        $scope.objeto.numero="";
        $scope.objeto.numero_exterior="";
        $scope.objeto.c_bpartner_id="";
        $scope.objeto.c_bpartner_location="";
    }

    $scope.resetFiscal=function(){
        $scope.objeto.nombre_fiscal="";
        $scope.objeto.calle_fiscal="";
        $scope.objeto.colonia_fiscal="";
        $scope.objeto.c_p_fiscal="";
        $scope.objeto.ciudad_fiscal="";
        $scope.objeto.estado_fiscal="";
        $scope.objeto.pais_fiscal="";
        $scope.objeto.numero_fiscal="";
        $scope.objeto.rfc="";
        $scope.objeto.c_bpartner_id="";
        $scope.objeto.c_bpartner_location="";
    }

    $scope.agrHora=function(){            //console.log($scope.espera);            //console.log('AGREGAR HORA');
        var i=0;
        if($scope.manana_entrada!=undefined){i++;}
        if($scope.manana_salida!=undefined){i++;}
        if($scope.tarde_entrada!=undefined){i++;}
        if($scope.tarde_salida!=undefined){i++;}            //console.log(i);
        if(i<2){
            alert("FAVOR DE VERIFICAR LA HORA DE ENTRADA Y SALIDA");
        }else{
            if(($scope.trabajo_horas==undefined || $scope.trabajo_horas=="") || ($scope.viaje_horas==undefined||$scope.viaje_horas=="") || ($scope.fecha==undefined||$scope.fecha=="")){
                alert("FAVOR DE VERIFICAR DATOS EN HORARIOS");
            }else{
                $scope.dia24=parseFloat($scope.trabajo_horas)+parseFloat($scope.viaje_horas);console.log($scope.dia24);
                if($scope.dia24>24){
                    alert("FAVOR DE VERIFICAR TOTAL DE HORAS");
                }else{
                    if($scope.horarios.length<14){
                        $scope.horarios.push({
                        manana_entrada:$scope.manana_entrada,
                        manana_salida:$scope.manana_salida,
                        tarde_entrada:$scope.tarde_entrada,
                        tarde_salida:$scope.tarde_salida,
                        trabajo_horas:$scope.trabajo_horas,
                        viaje_horas:$scope.viaje_horas,
                        espera:$scope.espera,
                        total_horas:0,
                        fecha:$scope.fecha
                        });
                    }else{
                        alert("¡¡ NUMERO DE DIAS SUPERADO !!");
                    }
                }                                                               //console.log($scope.horarios.length);
            }
        }
    };

    $scope.evaltSalida=function(){                                              //alert("validando:"+$scope.tarde_entrada+">"+$scope.tarde_salida);
        if($scope.tarde_entrada>$scope.tarde_salida){
            alert("LA HORA DE TARDE SALIDA NO DEBE SER MENOR A LA HORA DE ENTRADA ");
            $scope.tarde_salida=0;
        }else        console.info("OK");
    }

    $scope.evaltEntrada=function() {//alert("validando:"+$scope.manana_salida+">"+$scope.tarde_entrada);
        if($scope.manana_salida>$scope.tarde_entrada){
            alert("LA HORA DE TARDE ENTRADA NO DEBE SER MENOR A LA HORA DE MANANA SALIDA ");
            $scope.tarde_entrada=0;
        }else
                console.info("OK");
    }

    $scope.evalmSalida=function() {//alert("validando:"+$scope.manana_entrada+">"+$scope.manana_salida);
        $scope.manana_entrada=parseFloat($scope.manana_entrada);
        $scope.manana_salida=parseFloat($scope.manana_salida);
        if($scope.manana_entrada>$scope.manana_salida){
            alert("LA HORA DE SALIDA NO DEBE SER MENOR A LA DE HORA DE ENTRADA");
            $scope.manana_salida=0;
        }else
            console.info("OK");
    }

    $scope.validarManana=function(){                                                                                                        console.log("VALIDAR MAÑANA");
        if(($scope.manana_entrada!=undefined || $scope.manana_entrada!="") && ($scope.manana_salida!=undefined || $scope.manana_salida!="")){ console.log("a");
            $scope.trabajo_manana=parseFloat($scope.manana_salida) - parseFloat($scope.manana_entrada); console.info($scope.trabajo_manana);
        }
            $scope.trabajo_horas=$scope.trabajo_manana;
    }

    $scope.validarTarde=function(){          console.error($scope.tarde_entrada);                                           console.log("VALIDAR TARDE");
        if( (($scope.tarde_entrada != undefined) && ($scope.tarde_salida != undefined)) || (!isNaN($scope.tarde_entrada) && !isNaN($scope.tarde_salida)) ){console.log("ENTRADA Y SALIDA TARDE CON NUMEROS");
            $scope.trabajo_tarde=parseFloat($scope.tarde_salida) - parseFloat($scope.tarde_entrada);
            $scope.trabajo_horas=$scope.trabajo_manana+$scope.trabajo_tarde;
        }else if(isNaN($scope.tarde_entrada) && isNaN($scope.tarde_salida)){                                                console.log("TEXTO VACIO EN ENTRADA Y SALIDA TARDE");
            alert("SOLO INGRESAR NUMEROS");
        }else if(  (isNaN($scope.manana_salida) || ($scope.tarde_entrada == undefined)) && (isNaN($scope.tarde_entrada)||($scope.tarde_entrada == undefined))  && ($scope.manana_entrada != undefined) && ($scope.tarde_salida != undefined)){
            $scope.trabajo_horas=$scope.tarde_salida-$scope.manana_entrada;                                                  console.log("MAÑANA ENTRADA Y TARDE SALIDA ESTAN LLENOS");
        }                                                                   console.info($scope.trabajo_tarde);
    }

    $scope.limpiar=function(){
        $scope.manana_entrada=undefined;
        $scope.manana_salida=undefined;
        $scope.tarde_entrada=undefined;
        $scope.tarde_salida=undefined;
        $scope.trabajo_horas=0;
        $scope.viaje_horas=undefined;
        $scope.espera="";
        var hoy=new Date();
        $scope.fec_ser=new Date();
        $scope.fecha= moment(hoy).format('DD-MM-YYYY');
        $scope.trabajo_manana=0;
        $scope.trabajo_tarde=0;
    }

    $scope.validarHorarios=function(){                              //console.log($scope.manana_entrada); //console.log($scope.manana_salida);
        if(($scope.tarde_entrada!=undefined || $scope.tarde_entrada!="") && ($scope.tarde_salida!=undefined || $scope.tarde_salida!="")){   console.log("b");
            $scope.trabajo_horas=$scope.tarde_salida - $scope.tarde_entrada;
        }//else
            /*            if($scope.manana_entrada!=undefined && $scope.tarde_salida!=undefined){console.log("c");
                $scope.trabajo_horas=parseInt($scope.tarde_salida)-parseInt($scope.mañana_entrada);
            }//else             if(($scope.manana_entrada!=undefined || $scope.manana_entrada!="") && ($scope.manana_salida!=undefined || $scope.manana_salida!="") && ($scope.tarde_entrada!=undefined || $scope.tarde_entrada!="") && ($scope.tarde_salida!=undefined || $scope.tarde_salida!="")){console.log("d");
                $scope.trabajo_horas=($scope.manana_salida - $scope.manana_entrada) + ($scope.tarde_salida - $scope.tarde_entrada);
            }//else*/
    }

    $scope.remover=function(j,tipo){
        if(confirm("¿ DESEA ELIMINAR EL OBJETO SELECCIONADO?")){
            if(tipo=="h"){
                $scope.horarios.splice(j,1);
            }else{
                $scope.insumos.splice(j,1);
            }
        }else{
            alert("¡ Accion Cancelada !");
        }
    }

    $scope.setTotals = function(item){                                                  //console.log(item);
        item.total_horas = (parseInt(item.trabajo_horas)+parseInt(item.viaje_horas));            //$scope.total_horas += item.total;           console.log(item.total_horas);
    }

    $scope.equipos =function(seleccionado){                                 console.log(seleccionado);      //OK
        if(confirm("¿Desea agregar el insumo seleccionado?")){
            $scope.btnCarrito=false;
            $scope.cantidad=seleccionado.cantidad;
            $scope.codigo_proovedor=seleccionado.codigo_proovedor;
            if(seleccionado.id_cotizacion==undefined || seleccionado.id_cotizacion==""){
                $scope.unidad_medida=seleccionado.unidad_venta;             console.log("DESDE PRESTAMOS");
            }else{
                $scope.unidad_medida=seleccionado.unidad_medida;            console.log("DESDE COTIZACION");
            }
            $scope.descripcion=seleccionado.descripcion;
            $scope.seleccionado=seleccionado;
        }else{
            alert("! ACCION CANCELADA ¡")
        }
    }

    $scope.agregarCarrito=function(){                                      //OK
        $scope.insumos.push({
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
            unidad_venta:$scope.unidad_medida,
            unidad_compra:$scope.seleccionado.unidad_compra,
            costo_moneda:$scope.seleccionado.costo_moneda,
            tipo_cambio:$scope.seleccionado.tipo_cambio,
            tipo_equipo:$scope.seleccionado.tipo_equipo,
            bandera_insumo:$scope.seleccionado.bandera_insumo,
            costo_moneda:$scope.seleccionado.costo_moneda,
            total:$scope.seleccionado.total,                        //cotizacion:$scope.coti// done:false,
            m_product_id:$scope.m_product_id,
            tax_id:$scope.c_tax_id,
            group_name:$scope.group_name,
            folio:$scope.seleccionado.folio,
            clase:$scope.seleccionado.clase,
            dato:$scope.seleccionado.dato,
            id_compra_venta:$scope.seleccionado.id_compra_venta,
            id:$scope.seleccionado.id
            });
        $scope.btnCarrito=true;
    }

    $scope.validaFecha =function (fecha){                               //console.log(fecha);
        if(fecha == undefined || fecha ==''){
            alert("NO HA INGRESADO UNA FECHA, !! FAVOR DE VERIFICAR¡¡")
        }else{
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
            }

            if($scope.isDate(fecha)){
                return true;
            }else{        //return false;
                alert("EL DATO INGRESADO NO ES UNA FECHA VALIDA, ¡¡FAVOR DE VERIFICAR!!");
            }
        }
    }// FIN VALIDAR FECHA

    $scope.contar=function(cadena){                                 console.info(cadena);
        var t='1500';
        $scope.max=t-cadena.length;
        $scope.lleva=cadena.length;
    }

    $scope.contarSalto=function(cadena){  alert(cadena);                               console.info(cadena);
        var t1=cadena.search("/\r/g");
        var t2=cadena.search("/\n/g");
        if(t1>0 || t2>0){
            alert("ENNCONTRADO");
        }
    }

    $scope.select_fec_at=function(date){
        $scope.objeto.fecha_atencion=moment(date).format('DD-MM-YYYY');
    }

    $scope.select_fec_ser=function(date){
        $scope.fecha=moment(date).format('DD-MM-YYYY');
    }
    $scope.verFolio=function(){
      console.log($scope.objeto.organizacion);
      /*,organizacion:objeto.organizacion*/
      servicioSrc.get({id:$scope.objeto.folio,v:0,organizacion:$scope.objeto.organizacion},function(d){
        if(d.objeto){
          alert('EL FOLIO PUEDE SER USADO');
        }else{
          $scope.objeto.folio=0;
          alert('EL FOLIO NO PUEDE SER USADO');
        }
      });
    }
    $scope.folioCero=function(){
      $scope.objeto.folio=0;
    }


})

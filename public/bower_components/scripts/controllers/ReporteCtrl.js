'use strict';
angular.module('cotizacionApp')
.controller('reporteCtrl',function ($filter,contrato,expendio,$controller,reportesSrc,reporte,insumosSrc,direccionesSrc,terceroComercial,coordinacion,producto,tercero,$scope,$timeout,$location,terceroComercialSrc){
    angular.extend(this,$controller('NumeroAletraCtrl',{$scope:$scope}));
    	$scope.objeto={
        "id":"",
        "id_prestamo_refaccion":"",
        "id_cotizacion":"",
        "folio_contrato":"",
        "folio":"",
        "clase":"",
        "id_cliente":"",
        "id_fiscal":"",
        "solicitar_reporte_tecnico":"",
        "dato":"",

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

        "telefonos":"",
        "correos":"",
        "fax":"",
        "equipo":"",
        "marca":"",
        "modelo":"",
        "numero_serie":"",
        "imagen_serie":"",
        "nombre_responsable":"",
        "nota_cliente":"",
        "organizacion":"",
        "modificable":"",
        "c_bpartner_id":"",
        "c_bpartner_location":"",
        "estatus":"",
        "fecha_recepcion":"",
        "fecha_asginacion":"",
        "trabajo_realizado":"",
        "fecha_inicio":"",
        //"fecha_fin":"",
        "complejidad_servicio":"",
        "sucursal":"",
        "autor":"",
        "fecha_atencion":"",
        "hora_atencion":"",
        "resuelto_por":"",
        "coordinacion":"",
        "enviar_aviso":"",
        "instituto":"",
        "vigencia":"",
        "solicitar_reporte_tecnico":"",
    };
    $scope.resul={
        grd:''
    };
    $scope.filtro_equipo={
                    "equipos":""
                }
    
    $scope.resoluciones=
        [
        {nombre:'LLAMADA'},
        {nombre:'LABORATORIO'},
        {nombre:'VISITA'}
        ];
    $scope.estatus=
        [
        {nombre:'ASIGNADO'},
        {nombre:'ESPERA'},
        {nombre:'PROGRAMADO'},
        {nombre:'CERRADO'}
        ];
        $scope.sucursales=[
        {nombre:'CH'},
        {nombre:'GDL'},
        {nombre:'MER'},
        {nombre:'MTY'},
        {nombre:'MX'},

    ];
    
    $scope.rsl={};
    $scope.fiscal={};
    $scope.tercero_filtro={
            nombre_fiscal:'',
            group_name:''
        
        };
        $scope.clienteContrato=0;

        $scope.cerrarReporte=function(valor){ 
            console.log(valor);
            console.log($scope.est);
            $scope.est=$scope.objeto.estatus;
            if(valor != ""){
                $scope.objeto.estatus="CERRADO";
            }
            if(valor == undefined){
                $scope.objeto.estatus=$scope.est;
            }
        }
    
        $scope.clienteClk=function(e){
            if($scope.clienteContrato==1){//SELECCION DE FILTRO POR CONTRATO
                    $scope.objeto.nombre_fiscal=e.bpartner_name;
                    $scope.objeto.rfc=e.taxid;
                    $scope.objeto.calle_fiscal=e.address1;
                    $scope.objeto.colonia_fiscal=e.address2;
                    $scope.objeto.c_p_fiscal=e.cp;
                    $scope.objeto.ciudad_fiscal=e.city;
                    $scope.objeto.estado_fiscal=e.region_name;
                    $scope.objeto.pais_fiscal=e.pais;                    //$scopobjeto.e.numero_fiscal=e.
                    $scope.objeto.c_bpartner_location=e.c_bpartner_location_id;
                    $scope.objeto.c_bpartner_id=e.c_bpartner_id;
                    $scope.objeto.nombre_cliente=e.name;
                    $scope.objeto.calle=e.calle;
                    $scope.objeto.colonia=e.colonia;
                    $scope.objeto.c_p=e.c_p;
                    $scope.objeto.ciudad=e.ciudad;
                    $scope.objeto.estado=e.estado;
                    $scope.objeto.pais=e.pais;
                    $scope.objeto.telefonos=e.phone;
                    $scope.objeto.c_bpartner_id=e.c_bpartner_id;
                    $scope.objeto.equipo=e.equipo;
                    $scope.objeto.marca=e.marca;
                    $scope.objeto.modelo=e.modelo;
                    $scope.objeto.numero_serie=e.numero_serie;
                    $scope.objeto.folio_contrato=e.folio_contrato;
                    $scope.objeto.instituto=e.instituto;
                    $scope.objeto.organizacion=e.org_name;
            }else{//SELECCION DE FILTRO POR NOMBRE FISCAL DEL CLIENTE
                if(e.taxid!= undefined && e.taxid!= null){//COLOCAR LOS DATOS FISCALES DEL CLIENTE E IR A BUSCAR LAS DIRECCIONES DE ENTREGA
                $scope.objeto.nombre_fiscal=e.bpartner_name;
                $scope.objeto.rfc=e.taxid;
                $scope.objeto.calle_fiscal=e.address1;
                $scope.objeto.colonia_fiscal=e.address2;
                $scope.objeto.c_p_fiscal=e.cp;
                $scope.objeto.ciudad_fiscal=e.city;
                $scope.objeto.estado_fiscal=e.region_name;
                $scope.objeto.pais_fiscal=e.country_name;                //$scopobjeto.e.numero_fiscal=e.
                $scope.objeto.c_bpartner_location=e.c_bpartner_location_id;
                $scope.objeto.c_bpartner_id=e.c_bpartner_id;
                $scope.objeto.organizacion=e.org_name;
                $scope.objeto.nota=e.group_name;

                direccionesSrc.get({id_tercero:e.c_bpartner_id,isshipto:'Y'},function(d){
                        $scope.cliente.terceros=d.direcciones;                        console.log('ir por las direcciones de entrega');
                        if(d.direcciones!= undefined && d.direcciones.length==1){
                            $scope.objeto.calle=d.direcciones[0].address1;
                            $scope.objeto.colonia=d.direcciones[0].address2;
                            $scope.objeto.c_p=d.direcciones[0].cp;
                            $scope.objeto.ciudad=d.direcciones[0].city;
                            $scope.objeto.estado=d.direcciones[0].region_name;
                            $scope.objeto.pais=d.direcciones[0].country_name;
                            $scope.objeto.telefonos=d.direcciones[0].phone;                            //$scopobjeto.e.numero_fiscal=d.direcciones.
                            $scope.objeto.id_cliente=d.direcciones[0].c_bpartner_location_id;                            //$scope.objeto.c_bpartner_id=d.direcciones[0].c_bpartner_id;                            //console.log($scope.objeto);
                        }
                    }
                    ,function(e){alert(e.status+e.data)});

            }else if(e.name!= undefined && e.name!= null){//COLOCAR LOS DATOS DE ENTREGA                console.log('colocar los datos de entrega');                //console.log(e);
            //alert("SET DIRECCION");
                terceroComercialSrc.get({iscustomer:"Y",c_bpartner_id:e.c_bpartner_id},function(d){                console.log(d.terceros[0]);
                    if(d.terceros.length==0){
                        alert("EL TERCERO NO ESTA ACTIVADO COMO CLIENTE, DIRECCION: "+e.name);
                    }else{
                        $scope.objeto.c_bpartner_id=e.c_bpartner_id;    //                console.log($scope.objeto);                //$scope.cliente=tercero.qry({id:$scope.objeto.c_bpartner_id});
                        $scope.objeto.nombre_cliente=e.name;
                        $scope.objeto.calle=e.address1;
                        $scope.objeto.colonia=e.address2;
                        $scope.objeto.c_p=e.cp;
                        $scope.objeto.ciudad=e.city;
                        $scope.objeto.estado=e.region_name;
                        $scope.objeto.pais=e.country_name;
                        $scope.objeto.telefonos=e.phone;
                        $scope.objeto.id_cliente=e.c_bpartner_location_id;
                        $scope.objeto.nombre_fiscal=d.terceros[0].bpartner_name;
                        $scope.objeto.rfc=d.terceros[0].taxid;
                        $scope.objeto.calle_fiscal=d.terceros[0].address1;
                        $scope.objeto.colonia_fiscal=d.terceros[0].address2;
                        $scope.objeto.c_p_fiscal=d.terceros[0].cp;
                        $scope.objeto.ciudad_fiscal=d.terceros[0].city;
                        $scope.objeto.estado_fiscal=d.terceros[0].region_name;
                        $scope.objeto.pais_fiscal=d.terceros[0].country_name;                //$scopobjeto.e.numero_fiscal=e.
                        $scope.objeto.c_bpartner_location=d.terceros[0].c_bpartner_location_id;
                        $scope.objeto.organizacion=d.terceros[0].org_name;
                        $scope.objeto.nota=d.terceros[0].group_name;
                    }
                },function(e){alert('Error: '+e.status+' '+e.data)});
            }
            }
        }//fin clienteFn

        $scope.direccion_filtro={
        id_tercero:'',
        name:'',
        isshipto:''
        };

        $scope.filtroTercero=function(){
            $scope.clienteContrato=0;
                        if($scope.tercero_filtro.nombre_fiscal.length>2){ $scope.progress=true;               
                            $scope.progress=true;               
                            $scope.cliente=terceroComercial.qry({nombre_fiscal:'*'+$scope.tercero_filtro.nombre_fiscal+'*'});                    //alert("FISCAL");//console.log($scope.cliente);
                        }else{
                            $scope.progress=true;
                            $scope.clientes=tercero.qry($scope.tercero_filtro);                            //alert("OTRO");
                        }
            $scope.expediosBsc();
            $scope.contratosBsc();
        }

        $scope.filtroDireccion=function(){
            $scope.clienteContrato=0;
            if($scope.tercero_filtro.nombre_fiscal.length>2){ $scope.progress=true;               
                $scope.progress=true;               
                direccionesSrc.get({isshipto:'Y',name:'*'+$scope.tercero_filtro.nombre_fiscal+'*'},function(d){
                    $scope.direcciones=d.direcciones;
                    //$scope.cliente=terceroComercial.qry({c_bpartner_id:d.direcciones.c_bpartner_id});
                },function(e){alert(e.status+e.data)});
            }else{
                $scope.progress=true;
                $scope.clientes=tercero.qry($scope.tercero_filtro);
            }
            $scope.expediosBsc();
            $scope.contratosBsc();
        }

        $scope.filtroMarca=function(){                  
            insumosSrc.get({vista:'3',categoria3:$scope.objeto.equipo,bandera:'E'},function(d){                 console.log(d);
                    $scope.filtro.marcas=d.objetos;                                                             console.log($scope.filtro.marcas);
                }
                ,function(e){alert(e.status+e.data)});
        }

        $scope.filtroModelo=function(){                                                                         console.log($scope.objeto.marca);
            insumosSrc.get({vista:'4',marca:$scope.objeto.marca,bandera:'E',categoria3:$scope.objeto.equipo},function(d){
                    $scope.filtro.modelos=d.objetos;
                },function(e){alert(e.status+e.data)});
        }

        $scope.verOrg=function(o){      console.log(o.ad_org_id);
            if(o.ad_org_id=="0FBFA429EE1F41C3B2C43C832212895E"){
                $scope.o="SMH";
            }else{
                $scope.o="IMS";
            }
        }

        $timeout(function() {              //console.log($location.absUrl());
            //$scope.ver_organizacion=true;
            $scope.ver_fechaAtencion=true;
            $scope.ver_horaAtencion=true;
            $scope.ver_coordinacion=true;
            $scope.ver_etiquetaReporto=true;
              $scope.filtroMarca();
              $scope.filtroModelo();
            $scope.filtro={
                producto:producto.qry({vi:"1"}),
                coordinacion:coordinacion.qry({vi:"1"})
            }
        });
        $timeout(function() {
              var x=$scope.id;
              var c=$scope.c;
              if(x>0){ console.log("UPDATE");
                //$scope.ver_organizacion=true;
                $scope.ver_resueltoPor=true;
                $scope.ver_estatus=true;
                $scope.ver_fecha_reporte=true;
                  reportesSrc.get({id:x},function(d){
                    $scope.objeto=d.objeto;
                    $scope.est=d.objeto.estatus;
                  },function(e){alert('Error: '+e.status+' '+e.data);})                 
                    
              }else if(c>0){
                //console.log("CREAR DESDE CONTRATO");
                $scope.ver_resueltoPor=true;
                $scope.ver_estatus=true;
                $scope.ver_fecha_reporte=true;
                  reportesSrc.get({id:c},function(d){
                    $scope.objeto=d.objeto;
                    $scope.objeto.id=0;
                    //$scope.est=d.objeto.estatus;
                  },function(e){alert('Error: '+e.status+' '+e.data);})

              }
            //}
        },3000);
        $scope.guardar=function(){
            if($scope.id>0){ console.log($scope.id+"UPDATE");
                //$scope.rsl=reporte.modf($scope.objeto);
                reportesSrc.update($scope.objeto,function(){
                    $scope.save=true;
                    $scope.msg='DATOS ACTUALIZADOS CORRECTAMENTE';
                },function(e){
                if(e.status=='422'){
                    var msg='';
                    angular.forEach(e.data,function(value, key){
                        msg=msg+','+value;
                    });
                        alert(msg);
                $scope.save=false;
                }else{
                    alert('Error: '+e.status+' '+e.data);
                $scope.save=false;
                }
            }); 
                console.info($scope.rsl);
               // $scope.redirect();
            }else{
                console.log($scope.id+"CREATE");
                $scope.rsl=reporte.crea($scope.objeto); 
                if($scope.rsl){
                $scope.msg="DATOS GUARDADOS EXITOSAMENTE";
                //alert("DATOS GUARDADOS EXITOSAMENTE");
                $scope.save=true;
               // $scope.redirect();
               // window.location.href="http://" + $window.location.host + "/reportes";
                }
                //console.log($scope.rsl.d);
                //console.log($scope.rsl.d[0]);
                //console.log($scope.rsl.msg);
            }

        };

        $scope.redirect = function () {
            window.location.href="http://" + $window.location.host + "/reportes";
        };

        $scope.expediosBsc=function(){
            var rsl=expendio.qry({numero_serie:$scope.filtro_equipo.numero_serie,nombre_fiscal:'*'+$scope.tercero_filtro.nombre_fiscal+'*'});
            rsl.$promise.then(function(r){

                $scope.filtro_equipo={
                    "equipos":r.objeto,
                    "cantidad":r.objeto.length
                };
               /*$scope.filtro_equipo={
                "cantidad":$scope.filtro_equipo.equipos.length
               }*/
            });
        }
        $scope.contratosBsc=function(){
            var rsl=contrato.qry({v:4,nombre_fiscal:'*'+$scope.tercero_filtro.nombre_fiscal+'*'});
            rsl.$promise.then(function(r){
                //console.log(r.objetos.length);
                $scope.progress=false;
                $scope.filtro_contratos={
                    "contratos":r.objetos,
                    "cantidad":r.cantidad
                };
               /*$scope.filtro_equipo={
                "cantidad":$scope.filtro_equipo.equipos.length
               }*/
            });
        }
        $scope.filtroContrato=function(){
            $scope.clienteContrato=1;
                    $scope.cliente.terceros= [];
                angular.forEach($scope.filtro_contratos.contratos, function(value, key) {
                /*angular.forEach(value, function(valueeq, keyeq) {
                })*/
                    //console.log(value.equipos_contrato);
                    //console.log(value.equipos_contrato.created_at);
                angular.forEach(value.equipos_contrato,function(v,k){//recorrer cada producto
                    var x={};
                    x=v;
                    x.tipo_servicio='';
                    x.organizacion=value.organizacion;
                    x.bpartner_name=value.nombre_fiscal;
                    x.c_bpartner_location_id=value.c_bpartner_location;
                    x.country_name=v.pais_fiscal;
                    x.taxid=value.rfc;
                    x.address1=value.calle_fiscal;
                    x.address2=value.colonia_fiscal;
                    x.pais=v.pais;
                    x.cp=value.c_p_fiscal;
                    x.city=value.ciudad_fiscal;
                    x.region_name=value.estado_fiscal;
                    x.c_bpartner_id=value.c_bpartner_id;
                    x.name=v.nombre_cliente;
                    x.folio_contrato=value.folio_contrato;
                    x.instituto=value.instituto;
                    $scope.cliente.terceros.push(x);

                });
                //console.log($scope.filtro_contratos.contratos.organizacion);
                //BUSCAR EN EL FILTRO SI EL NUMERO DE SERIE YA SE ENCUENTRA EN EL ARREGLO cliente.terceros
                   //$scope.setClienteContrato(value,$scope.filtro_contratos.contratos.equipos_contrato);
                 //       this.push(value);
                });
        }
        $scope.setClienteContrato=function(value,obj){
            var exist=0;
            if($scope.cliente.terceros.length>0){
                angular.forEach($scope.cliente.terceros,function(v,k){
                    if(v.numero_serie===value.numero_serie){
                        exist=1;
                    }
                });                
            }
            if(exist===0){

            }
                
                value.organizacion=obj.organizacion;
                value.bpartner_name=value.nombre_fiscal;
                value.c_bpartner_location_id=obj.c_bpartner_location;
                value.country_name=obj.pais_fiscal;
                value.taxid=obj.rfc;
                value.address1=obj.calle_fiscal;
                value.address2=obj.colonia_fiscal;
                value.cp=obj.c_p_fiscal;
                value.city=obj.ciudad_fiscal;
                value.region_name=obj.estado_fiscal;
                value.c_bpartner_id=obj.c_bpartner_id;
                value.name=value.nombre_cliente;
                value.folio_contrato=obj.folio_contrato;
                value.instituto=obj.instituto;
                //console.log(obj.nombre_cliente);
                $scope.cliente.terceros.push(value);
            
        }

        $scope.expedios=function(x){
            
            $scope.objeto={
                "nombre_cliente":x.nombre_cliente,
                "calle":x.calle,
                "colonia":x.colonia,
                "c_p":x.c_p,
                "ciudad":x.ciudad,
                "estado":x.estado,
                "pais":x.pais,
                "numero":x.numero,
                "numero_exterior":x.numero_exterior,

                "c_bpartner_id":x.c_bpartner_id,
                "c_bpartner_location":x.c_bpartner_location,
                "nombre_fiscal":x.nombre_fiscal,
                "calle_fiscal":x.calle_fiscal,
                "colonia_fiscal":x.colonia_fiscal,
                "c_p_fiscal":x.c_p_fiscal,
                "ciudad_fiscal":x.ciudad_fiscal,
                "estado_fiscal":x.estado_fiscal,
                "pais_fiscal":x.pais_fiscal,
                "numero_fiscal":x.numero_fiscal,
                "rfc":x.rfc,
                "equipo":x.equipo,
                "marca":x.marca,
                "modelo":x.modelo,
                "numero_serie":x.numero_serie
            }

        }
        $scope.reset=function(){
            $scope.objeto={
                "id":"",
        "id_prestamo_refaccion":"",
        "id_cotizacion":"",
        "folio_contrato":"",
        "folio":"",
        "clase":"",
        "id_cliente":"",
        "id_fiscal":"",
        "solicitar_reporte_tecnico":"",
        "dato":"",

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

        "telefonos":"",
        "correos":"",
        "fax":"",
        "equipo":"",
        "marca":"",
        "modelo":"",
        "numero_serie":"",
        "imagen_serie":"",
        "nombre_responsable":"",
        "nota_cliente":"",
        "organizacion":"",
        "modificable":"",
        "c_bpartner_id":"",
        "c_bpartner_location":"",
        "estatus":"",
        "fecha_recepcion":"",
        "fecha_asginacion":"",
        "trabajo_realizado":"",
        "fecha_inicio":"",
        "fecha_fin":"",
        "complejidad_servicio":"",
        "sucursal":"",
        "autor":"",
        "fecha_atencion":"",
        "hora_atencion":"",
        "resuelto_por":"",
        "coordinacion":"",
        "enviar_aviso":"",
        "instituto":"",
        "vigencia":"",
        "solicitar_reporte_tecnico":""
        };
        }
    })
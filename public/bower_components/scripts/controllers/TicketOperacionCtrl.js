'use strict';
angular.module('cotizacionApp')
.controller('ticketOperacionCtrl',function ($filter,expendio,$window,TicketOperacionSrc,ClasificacionOperacionSrc,direccionesSrc,terceroComercial,tercero,$scope,$location)
    {
    	$scope.objeto={
        "id":"",
        "id_foraneo":"",
        "nombre":"",
        "descripcion":"",
        "modulo":"",
        "prioridad":"",
        "estatus":"",
        "autor":"",//iniciales
        "departamento":"",
        "area":"",
        "compromiso":"",
        "dato":"",
        "clase":"",
        "organizacion":"",
        "subclase":"",
        "hora_compromiso":"",
        "contacto":"",//telefono,email
        "cliente":"",//nombre de cliente
        "entrega":"",//direccion de entrega
        "atencion":"",//nombre del responsable o del contacto en el cliente
        "proyecto":""//nombre del proyecto
    };
    $scope.resul={
        grd:''
    };
    
    $scope.orgnizaciones=[
        {nombre:'SMH'},
        {nombre:'IMS'},
    ];
    $scope.prioridades=
        [
        {nombre:'3'},
        {nombre:'2'},
        {nombre:'1'}
        ];
        
    $scope.rsl={};
    $scope.fiscal={};
    $scope.tercero_filtro={
            nombre_fiscal:'',
            group_name:''
        
        };
        $scope.clienteContrato=0;

        $scope.disabled_encabezado=true;
        $scope.disabled_atencion=true;

        $scope.clienteClk=function(e){
            if(e.taxid!= undefined && e.taxid!= null){
                $scope.objeto.cliente=e.bpartner_name;
                /*$scope.objeto.rfc=e.taxid;
                $scope.objeto.calle_fiscal=e.address1;
                $scope.objeto.colonia_fiscal=e.address2;
                $scope.objeto.c_p_fiscal=e.cp;
                $scope.objeto.ciudad_fiscal=e.city;
                $scope.objeto.estado_fiscal=e.region_name;
                $scope.objeto.pais_fiscal=e.country_name;
                //$scopobjeto.e.numero_fiscal=e.
*/
                $scope.objeto.c_bpartner_location=e.c_bpartner_location_id;
                $scope.objeto.c_bpartner_id=e.c_bpartner_id;
                direccionesSrc.get({id_tercero:e.c_bpartner_id,isshipto:'Y'},
                    function(d){
                        //$scope.cliente.terceros=d.direcciones;
                        $scope.direcciones=d.direcciones;
                        /*
                        if(d.direcciones!= undefined && d.direcciones.length==1){
                            $scope.objeto.calle=d.direcciones[0].address1;
                            $scope.objeto.colonia=d.direcciones[0].address2;
                            $scope.objeto.c_p=d.direcciones[0].cp;
                            $scope.objeto.ciudad=d.direcciones[0].city;
                            $scope.objeto.estado=d.direcciones[0].region_name;
                            $scope.objeto.pais=d.direcciones[0].country_name;
                            $scope.objeto.telefonos=d.direcciones[0].phone;
                            //$scopobjeto.e.numero_fiscal=d.direcciones.
                            //$scope.objeto.c_bpartner_location=d.direcciones[0].c_bpartner_location_id;
                            //$scope.objeto.c_bpartner_id=d.direcciones[0].c_bpartner_id;
                        }
                        */

                    }
                    ,function(e){alert(e.status+e.data)});

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
                //$scope.cliente=tercero.qry({id:$scope.objeto.c_bpartner_id});


            }
        }//fin clienteFn

        $scope.direccion_filtro={
        id_tercero:'',
        name:'',
        isshipto:''
        };
        $scope.inicio=function(inicio){                                             console.log(inicio);
            this.fecha_entrega = new Date();
            this.isOpen = false;  
            var myJSON = JSON.parse(inicio);                                        console.log(myJSON.id_foraneo);
            if(myJSON.id_foraneo != undefined && myJSON.id_foraneo>0){
                $scope.obtenerTicket(myJSON.id_foraneo);
            }else if(myJSON.id != undefined && myJSON.id>0){
                $scope.disabled_atencion=false;
                $scope.obtenerObjeto(myJSON.id);
            }
            $scope.getEstados();
            $scope.getAtenciones();
            $scope.getProyecto();
            //VER SI ES AUTOR; PARA ACTIVAR BOTON GUARDAR
            //$scope.ticketHilo();
        }
        $scope.guardar=function(){
            if($scope.id>0){ console.log($scope.id+"UPDATE");
                /*$scope.rsl=reporte.modf($scope.objeto);
                $scope.save=true;
                console.info($scope.rsl);*/
               // $scope.redirect();
               $scope.guardaObjeto();
            }else{
                console.log($scope.objeto.id+"CREATE");
                /*$scope.rsl=reporte.crea($scope.objeto); 
                if($scope.rsl){
                $scope.msg="DATOS GUARDADOS EXITOSAMENTE";
                //alert("DATOS GUARDADOS EXITOSAMENTE");
                $scope.save=true;*/
                if($scope.objeto.id_foraneo=='' || $scope.objeto.id_foraneo==undefined){//es un ticket
                    $scope.guardaTicket();
                }else{
                    $scope.guardaHilo();
                }
               // $scope.redirect();
               // window.location.href="http://" + $window.location.host + "/reportes";
                }

        };

        $scope.redirect = function () {
            window.location.href="http://" + $window.location.host + "/reportes";
        };
        $scope.getEstados=function(){
            ClasificacionOperacionSrc.get({"clase":"estado"},function(r){
                $scope.estados=r.objeto;
            },function(err){$scope.err(err);})
        };$scope.getAtenciones=function(){
            ClasificacionOperacionSrc.get({"clase":"revisionproyecto"},function(r){
                $scope.revisiones=r.objeto;
            },function(err){$scope.err(err);})
        };$scope.getProyecto=function(){
            ClasificacionOperacionSrc.get({"clase":"PROYECTO"},function(r){
                $scope.proyectos=r.objeto;
            },function(err){$scope.err(err);})
        };$scope.guardaTicket=function(){
                $scope.objeto.clase='PROYECTO';
                $scope.guardaObjeto();
        };$scope.guardaHilo=function(){
                $scope.objeto.clase='PROYECTOHILO';
                $scope.guardaObjeto();
        };$scope.obtenerTicket=function(id){
                var obj=TicketOperacionSrc.get({id:id},function(r){
                },function(err){$scope.err(err)});
                obj.$promise.then(function(r){              console.info(r.objeto);
                    $scope.objeto=r.objeto;
                    $scope.objeto.descripcion='';
                    $scope.objeto.autor='';
                    $scope.objeto.created_at='';
                    $scope.objeto.compromiso='';
                    $scope.objeto.id_foraneo=id;
                    $scope.objeto.id='';
                });
        };$scope.obtenerObjeto=function(id){
                TicketOperacionSrc.get({id:id},function(r){
                    $scope.objeto=r.objeto;
                },function(err){$scope.err(err)});
        };
        $scope.guardaObjeto=function(){
            if($scope.objeto.id=='' || $scope.objeto.id==undefined){
                TicketOperacionSrc.save($scope.objeto,function(r){$scope.actvGuard()},function(err){$scope.err(err);});
            }else{
                TicketOperacionSrc.save($scope.objeto,function(r){$scope.actvGuard()},function(err){$scope.err(err);});
            }
        };$scope.actvGuard=function(){
            $scope.msg="DATOS GUARDADOS EXITOSAMENTE";
                //alert("DATOS GUARDADOS EXITOSAMENTE");
                $scope.save=true;
        };$scope.err=function(e){
                if(e.status=='422'){
                    var msg='';
                    angular.forEach(e.data,function(value, key){
                        msg=msg+','+value;
                    });
                        alert(msg);
                }else{
                    alert('Error: '+e.status+' '+e.data);
                }
        };$scope.filtroTercero=function(){
            if($scope.tercero_filtro.nombre_fiscal.length>2){ $scope.progress=true;               
            $scope.progress=true;               
            $scope.cliente=terceroComercial.qry({nombre_fiscal:'*'+$scope.tercero_filtro.nombre_fiscal+'*'});
                            //$scope.progress=false;               
                            //$scope.cliente=tercero.qry({nombre_fiscal:'*'+$scope.tercero_filtro.nombre_fiscal+'*'});
            }else{
            $scope.progress=true;               
            $scope.clientes=tercero.qry($scope.tercero_filtro);
            }
        };

        $scope.ticketHilo=function(){
                $scope.objeto={
                "id":"",
                "id_foraneo":"",
                "nombre":"N O M B R E.",
                "descripcion":"DESCRIPCION",
                "modulo":"MODULO",
                "prioridad":"1",
                "estatus":"PENDIENTE",
                "autor":"",//iniciales
                "area":"",
                "departamento":"COORDINACION",
                "compromiso":"11-12-2018",
                "dato":"",
                "clase":"",
                "organizacion":"SMH",
                "subclase":"",
                "hora_compromiso":"",
                "contacto":"",//telefono,email
                "cliente":"",//nombre de cliente
                "entrega":"",//direccion de entrega
                "atencion":"",//nombre del responsable o del contacto en el cliente
                "proyecto":""//nombre del proyecto
            };
        };

    $scope.contar=function(cadena){                                 console.info(cadena);
        var t='200';
        $scope.max=t-cadena.length;
        $scope.lleva=cadena.length;
    }

    $scope.diferenciaDias=function(f1,f2){                                 console.info(f1);console.info(f2);
        var t='200';
        $scope.max=t-cadena.length;
        $scope.lleva=cadena.length;
    }

    })
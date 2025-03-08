'use strict';
angular.module('cotizacionApp')
.controller('AExpendioCtrl',function (ordenServicio,organizacion,expendio,sucursal,insumosSrc,direccionesSrc,terceroComercial,coordinacion,producto,tercero,$scope,$timeout,$location,terceroComercialSrc)
    {
        $scope.objeto={
        "id":"",
        "folio_contrato_venta":"",
        "clase":"X",
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

        "organizacion":"",
        "modificable":"",
        "c_bpartner_id":"",
        "c_bpartner_location":"",
        "estatus":"GUARDADO",

        "fecha_inicio":"",
        "fecha_fin":"",
        "sucursal":"",
        "autor":"",
        "coordinacion":"",
        "instituto":"",
        "vigencia":""
    };
    $scope.resul={
        grd:''
    };
    $scope.rsl={};
    $scope.fiscal={};
    $scope.tercero_filtro={
            nombre_fiscal:'',
            group_name:''
        };
        $scope.clienteClk=function(e){
            if(e.taxid!= undefined && e.taxid!= null){
                $scope.objeto.nombre_fiscal=e.bpartner_name;
                $scope.objeto.rfc=e.taxid;
                $scope.objeto.calle_fiscal=e.address1;
                $scope.objeto.colonia_fiscal=e.address2;
                $scope.objeto.c_p_fiscal=e.cp;
                $scope.objeto.ciudad_fiscal=e.city;
                $scope.objeto.estado_fiscal=e.region_name;
                $scope.objeto.pais_fiscal=e.country_name;
                //$scopobjeto.e.numero_fiscal=e.
                $scope.objeto.c_bpartner_location=e.c_bpartner_location_id;
                $scope.objeto.c_bpartner_id=e.c_bpartner_id;

                direccionesSrc.get({id_tercero:e.c_bpartner_id,isshipto:'Y'},
                    function(d){
                        $scope.cliente.terceros=d.direcciones;
                        //console.log(d.direcciones.length);
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
                //nsole.log('TErcero');
                terceroComercialSrc.get({c_bpartner_id:$scope.objeto.c_bpartner_id},function(d){
                  //console.log(d.terceros[0]);
                    $scope.objeto.nombre_fiscal=d.terceros[0].bpartner_name;
                    $scope.objeto.rfc=d.terceros[0].taxid;
                    $scope.objeto.calle_fiscal=d.terceros[0].address1;
                    $scope.objeto.colonia_fiscal=d.terceros[0].address2;
                    $scope.objeto.c_p_fiscal=d.terceros[0].cp;
                    $scope.objeto.ciudad_fiscal=d.terceros[0].city;
                    $scope.objeto.estado_fiscal=d.terceros[0].region_name;
                    $scope.objeto.pais_fiscal=d.terceros[0].country_name;                //$scopobjeto.e.numero_fiscal=e.
                    $scope.objeto.c_bpartner_location=d.terceros[0].c_bpartner_location_id;
                },function(e){alert('Error: '+e.status+' '+e.data)});

            }

        }//fin clienteFn

        $scope.direccion_filtro={
        id_tercero:'',
        name:'',
        isshipto:''
        };
        $scope.filtroTercero=function(){
                //console.log('FILTRAR TERCERO');
            if($scope.tercero_filtro.nombre_fiscal.length>2){
                $scope.progress=true;
                var r=terceroComercial.qry({nombre_fiscal:'*'+$scope.tercero_filtro.nombre_fiscal+'*'});
                r.$promise.then(function(r){$scope.cliente=r;$scope.progress=false;});
            }else{
                $scope.progress=true;
                $scope.clientes=tercero.qry($scope.tercero_filtro);
            }
        }

        $scope.filtroDireccion=function(){
            $scope.clienteContrato=0;
            if($scope.tercero_filtro.nombre_fiscal.length>2){
                $scope.progress=true;
                direccionesSrc.get({isshipto:'Y',name:'*'+$scope.tercero_filtro.nombre_fiscal+'*'},function(d){
                    $scope.direcciones=d.direcciones;
                    //$scope.cliente=terceroComercial.qry({c_bpartner_id:d.direcciones.c_bpartner_id});
                },function(e){alert(e.status+e.data)});
            }else{
                $scope.progress=true;
                $scope.clientes=tercero.qry($scope.tercero_filtro);
            }
            //$scope.expediosBsc();
            //$scope.contratosBsc();
        }
        /*
        $scope.filtroMarca=function(){
            insumosSrc.get({vista:'3',tipo_equipo:$scope.objeto.equipo,bandera:'E'},
                function(d){
                    $scope.filtro.marcas=d.objetos;
                }
                ,function(e){alert(e.status+e.data)});
        }
        $scope.filtroModelo=function(){
            insumosSrc.get({vista:'4',marca:$scope.objeto.marca,bandera:'E'},
                function(d){
                    $scope.filtro.modelos=d.objetos;
                }
                ,function(e){alert(e.status+e.data)});
        }
        */
        $timeout(function() {              //console.log($location.absUrl());

              //$scope.filtroMarca();
              //$scope.filtroModelo();
            $scope.filtro={
                orden_servicio:ordenServicio.qry({id:$scope.orden_servicio.id}),
                coordinacion:coordinacion.qry({vi:"1"}),
            }
            $scope.filtro.orden_servicio.$promise.then(function(r){console.log(r);//console.log(r.objeto.cliente_nombre);
                $scope.nombre_fiscal=r.objeto.cliente_nombre;console.log($scope.nombre_fiscal);
                $scope.direccion=r.objeto.direccion+" "+r.objeto.colonia+" "+r.objeto.ciudad;console.log($scope.direccion);
                //$scope.tercero_filtro.nombre_fiscal=$scope.nombre_fiscal;
                $scope.objeto.equipo=r.objeto.equipo;$scope.objeto.marca=r.objeto.marca;$scope.objeto.modelo=r.objeto.modelo;$scope.objeto.numero_serie=r.objeto.serie});
        });
        $timeout(function() {
            $scope.sucursales=sucursal.qry();
            $scope.organizaciones=organizacion.qry();
              var x=$scope.id;
              if(x>0){
                var $rsl=expendio.qry({id:x});
                $rsl.$promise.then(function(r){$scope.objeto=r.objeto});
              }
        },3000);

        $scope.guardar=function(){
            if($scope.id>0){ console.log($scope.id+"UPDATE");
                $scope.rsl=expendio.crea($scope.objeto);
                $scope.save=true;
                console.info($scope.rsl);
               // $scope.redirect();
            }else{
                console.log($scope.id+"CREATE");
                var rsl=expendio.crea($scope.objeto);
                console.info(rsl);
                console.info(rsl.msg);
                console.info(rsl.$resolved);
                if(rsl){
                    rsl.$promise.then(function(r){
                        if(r.objeto.created_at != null)
                        console.log(r.objeto.created_at);
                        $scope.msj="GUARDADO";
                        $scope.save=true;
                   });
                }
                if(rsl.status=='200'){
                    $scope.save=true; console.log("GUARDADO");
                }

            }
        };
        $scope.actualizar=function(){
            if($scope.id>0){ console.log($scope.id+"UPDATE");
                $scope.objeto.estatus='GUARDADO';
                $scope.rsl=expendio.modf($scope.objeto);
                $scope.save=true;
            }else{
                console.log($scope.id+"CREATE");
                $scope.objeto.estatus='GUARDADO';
                $scope.rsl=expendio.crea($scope.objeto);
                if($scope.rsl){

                $scope.save=true;

                }

            }
        };
        /*
        $scope.procesar=function(){
            if($scope.id>0){ console.log($scope.id+"UPDATE");
                $scope.objeto.estatus='CERRADO';
                $scope.objeto.proceso='1';//campo q se envia a BE para validar si se actualiza o se procesa; proceso=1 para realizar validacion de campos; solo proceso indica que ya se debe cerrar o procesar o enviar
                $scope.rsl=expendio.modf($scope.objeto);
                $scope.save=true;
                console.info($scope.rsl);
               // $scope.redirect();
            }else{
                console.log($scope.id+"CREATE");
                $scope.rsl=expendio.crea($scope.objeto);
                if($scope.rsl){

                $scope.save=true;

                }

            }
        };
        */
        /*
        $scope.grdInterval=function(){
            if(($scope.objeto.c_bpartner_id.length>0) && ($scope.save!= true)){
                console.log('peticion a guardar');
                $scope.rsl=expendio.crea($scope.objeto);
                $scope.rsl.$promise.then(function(r){$scope.objeto.id=r.objeto.id});
            }
        };*/
        $scope.redirect = function () {
            window.location.href="http://" + $window.location.host + "/expendios";
        };
        //$interval( function(){ $scope.grdInterval(); }, 12000);
    })

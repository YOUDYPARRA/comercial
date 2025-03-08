'use strict';
angular.module('cotizacionApp')
.controller('expendioCtrl',function (tipoServicio,$interval,$window,organizacion,expendio,sucursal,insumosSrc,direccionesSrc,terceroComercial,coordinacion,producto,tercero,$scope,$timeout,$location)
    {
        $scope.objeto={
        "id":"",
        "id_cliente":"",
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
    $scope.equipos=[];
    $scope.resul={
        grd:''
    };
    
    $scope.resoluciones=
        [
        {nombre:'LLAMADA'},
        {nombre:'LABORATORIO'},
        {nombre:'VISITA'}
        ];
        
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
                        $scope.direcciones=d.direcciones;
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
                            $scope.objeto.id_cliente=d.direcciones[0].c_bpartner_location_id;
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
                $scope.objeto.id_cliente=e.c_bpartner_location_id;
                $scope.objeto.c_bpartner_id=e.c_bpartner_id;
                //$scope.cliente=tercero.qry({id:$scope.objeto.c_bpartner_id});


            }

        }//fin clienteFn

        $scope.direccion_filtro={
        id_tercero:'',
        name:'',
        isshipto:''
        };
        $scope.filtroTercero=function(){
            if($scope.tercero_filtro.nombre_fiscal.length>2){ $scope.progress=true;               
                $scope.progress=true;               
                $scope.cliente=terceroComercial.qry({nombre_fiscal:'*'+$scope.tercero_filtro.nombre_fiscal+'*'});
                console.log($scope.cliente);
            }else{
                $scope.progress=true;               
                $scope.clientes=tercero.qry($scope.tercero_filtro);
            }
        }
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
        $timeout(function() {              //console.log($location.absUrl());
            
              $scope.filtroMarca();
              $scope.filtroModelo();
            $scope.filtro={
                producto:producto.qry({vi:"1"}),
                coordinacion:coordinacion.qry({vi:"1"})
            }
        });
        $timeout(function() {
            $scope.sucursales=sucursal.qry();
            $scope.organizaciones=organizacion.qry();
            $scope.tipos_servicio=tipoServicio.qry();
              var x=$scope.id;
              if(x>0){                
                var $rsl=expendio.qry({id:x});
                $rsl.$promise.then(function(r){console.log(r);$scope.objeto=r.objeto});
              }
        },3000);

        $scope.guardar=function(){
            $scope.objeto.equipos=$scope.equipos;
            if($scope.id>0){ console.log($scope.id+"UPDATE");
                $scope.rsl=expendio.crea($scope.objeto);
                $scope.save=true;
                console.info($scope.rsl);
               // $scope.redirect();
            }else{
                console.log($scope.id+"CREATE");
                var rsl=expendio.crea($scope.objeto);                
                rsl.$promise.then(function(r){
                    if(r.status=='422'){
                        //nsole.log('ERROR DE VALIDACION');
                        $scope.save=false;
                    }else if(r.status=='200'){
                        $scope.save=true;
                    }

                });
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
        $scope.grdInterval=function(){
            if(($scope.objeto.c_bpartner_id.length>0) && ($scope.save!= true)){
                console.log('peticion a guardar');
                /*
                $scope.rsl=expendio.crea($scope.objeto);
                $scope.rsl.$promise.then(function(r){$scope.objeto.id=r.objeto.id});
                */
            }            
        };
        $scope.redirect = function () {
            window.location.href="http://" + $window.location.host + "/expendios";
        };
        $interval( function(){ $scope.grdInterval(); }, 12000);
        $scope.setDir=function(d){
            $scope.objeto.nombre_cliente=d.name;
            $scope.objeto.calle=d.address1;
            $scope.objeto.colonia=d.address2;
            $scope.objeto.c_p=d.cp;
            $scope.objeto.ciudad=d.city;
            $scope.objeto.estado=d.region_name;
            $scope.objeto.pais=d.country_name;
            $scope.objeto.c_bpartner_id=d.c_bpartner_id;
            $scope.objeto.id_cliente=d.c_bpartner_location_id;
            $scope.equipo=$scope.objeto.equipo;
            $scope.marca=$scope.objeto.marca;
            $scope.modelo=$scope.objeto.modelo;
            $scope.filtro.numero_serie=$scope.objeto.numero_serie;
            //$scope.objeto.telefonos=d.phone;

        }
        $scope.agrEquipo=function(){
            $scope.equipos.push({
                nombre_fiscal:$scope.objeto.nombre_fiscal,
                nombre_cliente:$scope.objeto.nombre_cliente,
                colonia:$scope.objeto.colonia,
                ciudad:$scope.objeto.ciudad,
                calle:$scope.objeto.calle,
                c_p:$scope.objeto.c_p,
                estado:$scope.objeto.estado,                
                pais:$scope.objeto.pais,
                c_bpartner_id:$scope.objeto.c_bpartner_id,
                c_bpartner_location:$scope.objeto.c_bpartner_location,
                equipo:$scope.equipo,
                marca:$scope.marca,
                modelo:$scope.modelo,
                numero_serie:$scope.filtro.numero_serie,
                coordinacion:$scope.objeto.coordinacion,
                tipo_servicio:$scope.objeto.tipo_servicio, 
                fecha_inicio:$scope.filtro.fecha_inicio,
                fecha_fin:$scope.filtro.fecha_fin,
                hora_atencion:$scope.filtro.hora_atencion
            }); console.info($scope.equipos);
        }
   $scope.editar=function(indice,seleccionado){console.log(seleccionado)
      if(confirm("¿Desea editar el producto seleccionado?, SE ELIMINARÁ")){
        $scope.remover(indice);
        //$scope.seleccionado=seleccionado;
                
          }else{alert("! ACCION CANCELADA ¡")}
    }
    $scope.remover=function(j){    //console.log(cantidad);
        if(confirm("¿ DESEA ELIMINAR EL PRODUCTO DE LA LISTA?"))      {
      $scope.equipos.splice(j,1);       }else{alert("¡ Accion Cancelada !");}
    }

    })
'use strict';
angular.module('cotizacionApp')
.controller('custodiaCtrl',function ($window,custodiaSrc,custodia,insumosSrc,producto,tercero,$scope,$timeout,$location)
    {
    	$scope.objeto={
        "id":"",
        "nombre_cliente":"",
        "calle":"",
        "colonia":"",
        "c_p":"",
        "ciudad":"",
        "estado":"",
        "pais":"",
        "numero":"",
        "numero_exterior":"",

        "telefonos":"",
        "correos":"",
        "fax":"",
        "equipo":"",
        "marca":"",
        "modelo":"",
        "numero_serie":"",
        "nombre_responsable":"",
        "nota_cliente":"",
        "fecha_recepcion":"",
        "autor":""
    };
    $scope.sucursales=[
        {nombre:'CH'},
        {nombre:'GDL'},
        {nombre:'MER'},
        {nombre:'MTY'},
        {nombre:'MX'},

    ];
    $scope.rsl={};
    $scope.condiciones_servicio=[
        {nombre:'GARANTIA'},
        {nombre:'CONTRATO'},
        {nombre:'FACTURABLE'},
        {nombre:'ORDEN SERVICIO'}
        ];

        $scope.direccion_filtro={
        id_tercero:'',
        name:'',
        isshipto:''
        };
        
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
        $timeout(function() {     
            $scope.esc_datosReporte=false;
            $scope.esc_datosTercero=true;
            $scope.esc_datosEquipo=false;
            $scope.ver_etiquetaResponsable=true;
            $scope.ver_condicion_servicio=true;
            $scope.filtroMarca();
            $scope.filtroModelo();
            $scope.filtro={
                producto:producto.qry({vi:"1"})
            }
        });
        $timeout(function() {
              var x=$scope.id_reporte;
              if(x>0){
                  custodiaSrc.get({id_reporte:x},function(d){
                    if(d.reporte){
                        $scope.objeto=d.reporte;
                        $scope.objeto.id_reporte=d.reporte.id
                        $scope.objeto.reporte=d.reporte.folio;
                        $scope.objeto.id=0;
                    }else if(d.custodia){
                        $scope.objeto=d.custodia;

                    }

                  },function(e){alert('Error: '+e.status+' '+e.data);})
              }
            //}
        },3000);
        $scope.guardar=function(){
            //alert($scope.objeto.id);
            //$scope.objeto.clase='E';
            if($scope.objeto.id){
                //alert('Mdf');
                $scope.rsl=custodia.modf($scope.objeto);
                $scope.redirect();
            }else{                
                //alert('cREAR');
                $scope.rsl=custodia.crea($scope.objeto);                
                $scope.redirect();
            }

        };
        $scope.redirect = function () {
            window.location.href="http://" + $window.location.host + "/reportes";
        };

        $scope.reset=function(){
            $scope.objeto={
        "id":"",
        "nombre_cliente":"",
        "calle":"",
        "colonia":"",
        "c_p":"",
        "ciudad":"",
        "estado":"",
        "pais":"",
        "numero":"",
        "numero_exterior":"",

        "telefonos":"",
        "correos":"",
        "fax":"",
        "equipo":"",
        "marca":"",
        "modelo":"",
        "numero_serie":"",
        "nombre_responsable":"",
        "nota_cliente":"",
        "fecha_recepcion":"",
        "autor":""
        };
        }
    })
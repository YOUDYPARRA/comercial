'use strict';
angular.module('cotizacionApp')
.controller('condicionPagoCtrl',function (condicionPago,$scope,$timeout,$http,$location,$filter)
    {
    	$scope.objeto={
    	id_marca:'',
        etiqueta:'',
        instituto:'',
        condicion:'',
        c_paymentterm_id:''
    	};
        $timeout(function() {
            //console.log($location.absUrl());
            $scope.x=condicionPago.qryMetodoPago({ad_org_id:0});
            $scope.y=condicionPago.qryMarcaProveedor({ad_org_id:0});//consulta los proveedores
        });
        $timeout(function() {            
            if($scope.objeto.id != undefined){
                $scope.objeto=condicionPago.qry({'id':$scope.objeto.id});
            }
        },3000);
        
        $scope.guardar=function(){
            //alert('guardar');
            if ($scope.objeto.c_paymentterm_id!="") {
                var r=$filter('filter')($scope.x.metodos_pago,{fin_paymentmethod_id:$scope.objeto.c_paymentterm_id});
                if(r[0]!=undefined){
                    $scope.objeto.condicion=r[0].name;
                }else{
                    $scope.objeto.condicion='';
                }
                
            }
            if($scope.objeto.id != undefined){
                $scope.resul=condicionPago.modf($scope.objeto);
            }else{
                $scope.resul=condicionPago.crea($scope.objeto);
                if($scope.resul.msg){
                    $scope.reset();
                }
            }
        };
        $scope.reset=function(){
            $scope.objeto={
            id_marca:'',
            etiqueta:'',
            instituto:'',
            condicion:'',
            c_paymentterm_id:''
        };
        }
    })
'use strict';
angular.module('cotizacionApp')
.controller('plantillaCtrl',function ($interval,$window,plantilla,$scope,$timeout,$location)
    {

        $scope.objeto={
        "id":"",
        "nombre":"",
        "clase":"",
        "plantilla":""
    };
    $scope.resul={
        grd:''
    };

    $scope.countLength = function(val){
  $scope.chrLength = val;
}
    
    
        $timeout(function() {            
              var x=$scope.id;
              if(x>0){                
                var $rsl=plantilla.qry({id:x});
                $rsl.$promise.then(function(r){console.log(r);$scope.objeto=r.objeto});                    
              }
        },3000);

        $scope.guardar=function(){
            if($scope.id>0){ console.log($scope.id+"UPDATE");
                $scope.rsl=plantilla.crea($scope.objeto);
                $scope.save=true;
                console.info($scope.rsl);
               // $scope.redirect();
            }else{
                console.log($scope.id+"CREATE");
                $scope.rsl=plantilla.crea($scope.objeto); 
                if($scope.rsl){
                
                $scope.save=true;
               
                }
               
            }
        };
        $scope.actualizar=function(){
            if($scope.id>0){ console.log($scope.id+"UPDATE");
                $scope.objeto.estatus='GUARDADO';
                $scope.rsl=plantilla.modf($scope.objeto);
                $scope.save=true;
            }else{
                console.log($scope.id+"CREATE");
                $scope.objeto.estatus='GUARDADO';
                $scope.rsl=plantilla.crea($scope.objeto); 
                if($scope.rsl){
                
                $scope.save=true;
               
                }
               
            }
        };
        $scope.grdInterval=function(){
                //console.log('A guardar. . . ');
            if(($scope.objeto.plantilla.length>0) && ($scope.objeto.clase.length>0) && ($scope.objeto.nombre.length>0) && ($scope.save!= true)){
                console.log('Peticion a guardar');
                $scope.rsl=plantilla.crea($scope.objeto);
                $scope.rsl.$promise.then(function(r){$scope.objeto.id=r.objeto.id});
            }            
        };
        $scope.redirect = function () {
            window.location.href="http://" + $window.location.host + "/plantillas";
        };
        $interval( function(){ $scope.grdInterval(); }, 9000);
    
    })
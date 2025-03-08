'use strict';
angular.module('cotizacionApp')
.controller('cotizacionContratoCtrl',function (procesosSrc,$interval,$window,cotizacionContrato,plantilla,expendio,$scope,$timeout,$location)
    {
    $scope.objeto={
        "id":"",
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
        "head":"",
        "foot":"",
        "json":"",
        "fin":"",
        "tablados":""
    };
    $scope.tabla=0;
    $scope.tablados=0;
    $scope.fil="";
    $scope.resul={
        grd:''
    };
    $scope.filtro={
        "nombre":"*p*"
    };
    $scope.qryObjeto=function(){
        console.log('qRY OBJETO');
              var x=$scope.id;
              if(x>0){                
                var $rsl=cotizacionContrato.qry({id:x});
                $rsl.$promise.then(function(r){
                    $scope.objeto=r.objeto;
                    $scope.tabla=r.objeto.tabla;
                    $scope.tablados=r.objeto.tablados;
                    $scope.mapa=$scope.mapye(r.objeto.tabla[0]);
                });
            }
    }
        $timeout(function() {
            $scope.qryObjeto();
              
        },3000);
        $scope.guardar=function(){
            $scope.objeto.json=$scope.tabla;
            $scope.objeto.tablados=$scope.tablados;
            if($scope.id>0){ console.log($scope.id+"UPDATE");
                $scope.rsl=cotizacionContrato.crea($scope.objeto);
                $scope.save=true;
                //console.info($scope.rsl);
               // $scope.redirect();
            }else{
                console.log($scope.id+"CREATE");
                $scope.rsl=cotizacionContrato.crea($scope.objeto); 
                if($scope.rsl){                
                $scope.save=true;               
                }
               
            }
        };
        $scope.actualizar=function(){
            $scope.objeto.json=$scope.tabla;
            if($scope.id>0){ console.log($scope.id+"UPDATE");
                $scope.objeto.estatus='GUARDADO';
                $scope.rsl=cotizacionContrato.modf($scope.objeto);
                $scope.rsl.$promise.then(function(r){$scope.objeto.id=r.objeto.id;$scope.objeto.version=r.objeto.version; });                    
                $scope.save=true;
            }else{
                console.log($scope.id+"CREATE");
                $scope.objeto.estatus='GUARDADO';
                $scope.rsl=cotizacionContrato.crea($scope.objeto); 
                $scope.rsl.$promise.then(function(r){$scope.objeto.id=r.objeto.id;$scope.objeto.version=r.objeto.version; });                    
                if($scope.rsl){
                $scope.save=true;               
                }
               
            }
        };
        $scope.grdInterval=function(){
                //console.log('A guardar. . . ');
            if( ($scope.activ)){
                 if(($scope.objeto.head.length>0) && ($scope.save!= true) ){
                    console.log('Peticion a guardar');
                    $scope.objeto.json=$scope.tabla;
                    $scope.objeto.tablados=$scope.tablados;
                    $scope.rsl=cotizacionContrato.crea($scope.objeto);
                    $scope.rsl.$promise.then(function(r){$scope.objeto.id=r.objeto.id;$scope.objeto.version=r.objeto.version; });                    
                 }
            }
        };
        $scope.redirect = function () {
            window.location.href="http://" + $window.location.host + "/plantillas";
        };
        $interval( function(){
            $scope.grdInterval();
            $scope.activ=false;            
        }, 9000);
        $scope.bscPlantilla=function(){
            //console.log('buscar la plantilla');
            var rsl=plantilla.qry($scope.filtro);
            rsl.$promise.then(function(r){$scope.plantillas=r.objeto;});
        }
        
         $scope.bscExpendido=function(){
            //console.log('buscar la Expendido');
            var rsl=expendio.qry($scope.filtro.expendido);
            rsl.$promise.then(function(r){$scope.filtro.expendidos=r.objeto});
        }

        $scope.slcPlantilla=function(x){
            //console.log($scope.objeto.c_bpartner_id.length>0);
            //al seleccionar plantilla, ir a server a procesar, si hay tercero seleccionado            
            if($scope.objeto.c_bpartner_id.length>0){
                //enviar a server procesar campo texto, para despues mostrarla en campo de texto
                procesosSrc.get({i:$scope.objeto.id_expendido,id:x.id},function(r){
                    if($scope.foco=='td' ){
                        if( (x.plantilla[0]=='_') && (x.plantilla[1]=='_') ){
                            if($scope.tablados!=0){
                                $scope.tablados.push(r.txt[1]);
                            } else{
                                $scope.tablados=r.txt;
                            }
                        }else{
                            alert('EL ELEMENTO DEBE SER TABLA');
                        }

                    }else if($scope.foco=='tp' ){
                        console.log('el foco esta en la tabla primaria');
                        if( (x.plantilla[0]=='_') && (x.plantilla[1]=='_') ){
                            //console.log('Tabla');
                            $scope.mapa=$scope.mapye(r.txt[0]);
                        }
                        if($scope.tabla!=0){
                        $scope.tabla.push(r.txt[1]);

                        } else{
                            $scope.tabla=r.txt;
                        }
                    }else if($scope.foco=='f'){
                        $scope.objeto.foot= $scope.objeto.foot  +'\n'+ r.txt;
                    }else if( $scope.foco=='h' ){
                        $scope.objeto.head= $scope.objeto.head  +'\n'+ r.txt;
                    }else if($scope.foco=='ff'){
                        $scope.objeto.fin= $scope.objeto.fin  +'\n'+ r.txt;
                    }
                },function(er){alert('ERROR EN SERVIDOR');});
            }else{
                alert('DEBE EXISTIR UN TERCERO EN UN EQUIPO SELECCIONADO');
            }
        }
        $scope.elmPlantilla=function(x){
            $scope.plantillas.splice(x,1);
        }
        $scope.elmTbl=function(x){
            $scope.tabla.splice(x,1);
        }
        $scope.elmTblD=function(x){
            $scope.tablados.splice(x,1);
        }

        $scope.slcExpendido=function(x){
            //console.log('entre a expdido');
            $scope.objeto={
                //"id":x.id,
                "id_expendido":x.id,
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
                "json":"",
                "foot":"",
                "head":"",
                "fin":"",
                "tablados":""
            }
        };
        
        $scope.setFoco=function(x){            
            //console.log(x);
            $scope.foco=x;
        }

        $scope.equis=function(i){
            $scope.fil=i;
        }
        $scope.ye=function(i,x){
            $scope.col=i;            
            var y=$scope.mapa[i];
            $scope.activar=true;
            if($scope.foco=='td' ){
                $scope.tablados[$scope.fil][y]=x;

            }else{
                $scope.tabla[$scope.fil][y]=x;
            }
        }
        /*
        $scope.campo=function(x){
            //console.log('entre despues de blur');
            //console.log(x);
            //var i=($scope.tabla.length)-(1);
            //console.log($scope.tabla[i]);
        }*/
        $scope.mapye=function(arr){
        var map = [];
        angular.forEach(arr, function(value, key) {
          this.push(key );
        }, map);
        return map;

        }
        $scope.cmpActiv=function(){
            $scope.activar=false;
        }


    })
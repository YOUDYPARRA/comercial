'use strict';
angular.module('cotizacionApp')
.controller('mensualidadCtrl',function ($controller,$scope,$timeout,$log,mensualidadSrc){
    $scope.guardado=false;
    $scope.objeto={
        id_foraneo:"",
        clase:"",
        vigencia:"",                                //MES
        dato:"",                                    //AÑO
        nota:""                                     //CANTIDAD,MONTO
    };

    $scope.meses=[
            {nombre:''},
            {nombre:'ENERO'},
            {nombre:'FEBRERO'},
            {nombre:'MARZO'},
            {nombre:'ABRIL'},
            {nombre:'MAYO'},
            {nombre:'JUNIO'},
            {nombre:'JULIO'},
            {nombre:'AGOSTO'},
            {nombre:'SEPTIEMBRE'},
            {nombre:'OCTUBRE'},
            {nombre:'NOVIEMBRE'},
            {nombre:'DICIEMBRE'}
        ];
        
    $scope.anios="";
    $scope.mensualidades=[];
	$scope.mens=[];

    $scope.inicio=function(id){//alert(id);
 	    $scope.objeto.id_foraneo=id;
 	    $scope.objeto.clase='MES';
 	    mensualidadSrc.get({x:0},function(r){
 		    $scope.anios=r.objeto;
 	    },function(err){alert('ERROR EN PETICION AL SERVIDOR')});
 	    $scope.obtener();
    }

    $scope.agregar=function(){                                 //console.log($scope.validar());//console.log($scope.mens);//$scope.guardado=true;
	   if(this.validar()==0){
            $scope.mensualidades.push({
                clase:$scope.objeto.clase,
                id_foraneo:$scope.objeto.id_foraneo,
                vigencia:$scope.objeto.vigencia,
                dato:$scope.objeto.dato,
                nota:$scope.objeto.nota
            });
 	  }
    }

    $scope.remover=function(j){    
        if(confirm("¿ DESEA ELIMINAR EL OBJETO SELECCIONADO?")){
            $scope.mensualidades.splice(j,1);       
        }
    }

    $scope.guardar=function(){	//$scope.guardado=false;
 	    if($scope.mensualidades.length==0){
            alert("No ha ingresado pagos");
        }else{
 		    mensualidadSrc.save($scope.mensualidades,function(r){
 			    $scope.msg=r.msg;
 			    $scope.guardado=true;
 		    },function(e){
 			    if(e.status=='422'){
                    var msg='';
                    angular.forEach(e.data,function(value, key){
                        msg=msg+','+value;
                    });
                    alert(msg);
                }else{
                    alert('Error: '+e.status+' '+e.data);
                }
 		    });
 	    }
    }

    $scope.obtener=function(){
 	    mensualidadSrc.get({id:$scope.objeto.id_foraneo},function(r){ console.log(r.objeto.length)
            if(r.objeto.length>0){
 	            $scope.mensualidades=r.objeto;
            }
 	    },function(e){alert('Error: '+e.status+' '+e.data)});    
    }

    $scope.validar=function(){
 	    var validar=0;
 	  	$scope.msg='';
 	    if($scope.objeto.dato=="" || $scope.objeto.dato==null || $scope.objeto.dato==''){//año
 	  	    validar++;
 	  	    $scope.msg='CAMPO AÑO OBLIGATORIO.';
 	    }
 	    if(isNaN($scope.objeto.nota) || $scope.objeto.nota=="" || $scope.objeto.nota==null || $scope.objeto.nota==''){//monto
 	  	    $scope.msg='CAMPO MONTO REQUERIDO CON CARATERES NÚMERICOS.';
 	  	    validar++;
 	    }
 	    if($scope.objeto.vigencia=="" || $scope.objeto.vigencia==null || $scope.objeto.vigencia==''){//mes
 	  	    validar++;
 	  	    $scope.msg='CAMPO MES OBLIGATORIO.';
 	    }
 	    return validar;
    }

})
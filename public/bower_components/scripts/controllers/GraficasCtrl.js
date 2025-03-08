'use strict';
angular.module('cotizacionApp')
.controller('graficasCtrl',function ($window,$scope,$filter,graficoVtaSrc){



/*$scope.etiquetas = [];
    $scope.datos =[];
    $scope.series =[];*/

    $scope.etiquetas1 = ['Gastos', 'Ventas', 'Compras'];
    $scope.datos1 = [1244, 1500, 2053];

    $scope.anios = [{anio:'2017'}, {anio:'2018'}, {anio:'2019'}, {anio:'2020'}, {anio:'2021'}, {anio:'2022'}, {anio:'2023'}];
    $scope.etiquetas = [];
    $scope.datos =[];


$scope.inicio=function(){
	var i=0,j=0;
	var porcentajeNo=0;
	var porcentajeSi=0;
	var totales=0;
	$scope.verBarra=true;
	$scope.usuario();	
	$scope.modalidad();	
	$scope.probabilidad();	
    $scope.anio="2018";
    $scope.autor="*";
    $scope.compromiso="*";
    var totalSi=0;
    var totalNo=0;
    graficoVtaSrc.get({i:3,anio:$scope.anio},function(data){								console.log(data);
    	while(j<data.objetos.length){
    		$scope.cmp=JSON.parse(data.objetos[j].dato);										console.log($scope.cmp);
			totales +=parseFloat(data.objetos[j].total);
			if($scope.cmp.compromiso=="NO"){
    			 totalNo+=parseFloat(data.objetos[j].total);
				//porcentajeNo=totalNo*100/totales;
    		}else if($scope.cmp.compromiso=="SI"){
    			 totalSi+=parseFloat(data.objetos[j].total);
				//porcentajeSi=totalSi*100/totales;
    		}
			j++;
		}																					console.log(totales);
			$scope.etiquetas.push("NO");             						//console.log($scope.etiquetas1);
			$scope.etiquetas.push("SI");             						//console.log($scope.etiquetas1);
            $scope.datos.push(totalNo);                   								//console.log($scope.datos1);
            $scope.datos.push(totalSi);                   								//console.log($scope.datos1);
	},function(err){alert('ERROR EN SERVIDOR.');});
}

$scope.usuario=function(){
	graficoVtaSrc.get({autor:"*"},function(d1){												console.log(d1);                                 
		$scope.autores=d1.objetos;
      },function(err){alert('ERROR EN SERVIDOR.');});
}

$scope.modalidad=function(){
	graficoVtaSrc.get({equipo:"*"},function(d1){											console.log(d1);                                 
		$scope.modalidades=d1.objetos;
      },function(err){alert('ERROR EN SERVIDOR.');});
}

$scope.probabilidad=function(){
	graficoVtaSrc.get({complejidad_servicio:"*"},function(d1){								console.log(d1);                                 
		$scope.probabilidades=d1.objetos;
      },function(err){alert('ERROR EN SERVIDOR.');});
}

$scope.tipoGrafica=function(grafica){
	if(grafica=="BARRA"){
		$scope.verBarra=true;
		$scope.verPastel=false;
	}else if(grafica=="PASTEL"){
		$scope.verBarra=false;
		$scope.verPastel=true;
	}
}

$scope.graficar=function(){
	$scope.etiquetas = [];
    $scope.datos =[];
	var l=0,j=0;
	var porcentaje=0;
	var totales=0;																	console.log($scope.compromiso.length);
	if($scope.anio!=''&&$scope.autor=='*'&&$scope.compromiso.length>1){
		var i=3;	
		var x="compromiso";																console.log(x);
	}else if($scope.anio!=''&&$scope.autor.length==1 &&$scope.compromiso.length>1){
		var i=2;
		var x="compromiso";
	}
	graficoVtaSrc.get({i:i,autor:$scope.autor,anio:$scope.anio,compromiso:$scope.compromiso},function(data){								console.log(data);
		while(j<data.objetos.length){
			totales +=parseFloat(data.objetos[j].total);
			j++;
		}																			console.log(totales);
		while(l<data.objetos.length){
			porcentaje=data.objetos[l].total*100/totales;
			porcentaje=$filter('number')(porcentaje, 2);
			$scope.etiquetas.push(data.objetos[l].autor);             				//console.log($scope.etiquetas1);
            $scope.datos.push(porcentaje);                   						//console.log($scope.datos1);
        	l++;
		}
      },function(err){alert('ERROR EN SERVIDOR.');});
}


})
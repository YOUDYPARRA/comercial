function ConversionFnCtrl($scope,conversionSrc){
	
	$scope.consultar=function (){
		permisoSrc.get({id:$scope.permiso.id},function(data){
			console.log(data);
		});
	}

	
}
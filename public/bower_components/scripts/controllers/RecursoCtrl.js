function RecursoFunCtrl($timeout,$location,$scope,recursoSrc){
	
	var self = this;
	//	self.prueba=prb();
	$scope.recurso=	
	{
	};
	$scope.confRec=
	{
		headerCrear:"GENERAR NUEVO RECURSO",
		headerEditar:"ACTUALIZA NUEVO RECURSO",
		successEdit:"ACTUALIZAR",
		successCrea:"GUARDAR"
	};
		
		//
	$scope.eliminar=function (i){
            if(confirm('¿ELIMINAR?'))
            {
                recursoSrc.delete({id:i.id},function(data){
                               window.location = '/recursos';
		});
                
            }	
	}
	$scope.restaura=function (i){
            if(confirm('¿REHABILTAR?'))
            {
                recursoSrc.delete({id:i.id},function(data){
                               window.location = '/recursos';
		});
                
            }	
	}
	$scope.guardar=function (){
		//console.log("GUARDAR EL ARCHIVO:" +$scope.recurso.recurso+" observacion "+$scope.recurso.observacion);
		recursoSrc.save({aviso:$scope.recurso.aviso,i:$scope.recurso.i,id:$scope.recurso.id,recurso:$scope.recurso.recurso,etiqueta:$scope.recurso.etiqueta,id_menu:$scope.recurso.id_menu,observacion:$scope.recurso.observacion},function(data){
		   window.location = '/recursos';
		},function(error){alert('Error en servidor, verique recurso')});
	}
	$scope.consultar=function (){
		recursoSrc.get({id:$scope.recurso.id},function(data){
			$scope.recurso=data.objeto;
		});
                
	}
	$scope.actualizar=function (){
		recursoSrc.update($scope.recurso,function(data){
			window.location = '/recursos';
		},function(error){alert('Error en servidor, verique recurso')});
	}
	$timeout(function() {
		if($scope.recurso.vista===1)
		{
			$scope.consultar();
                        
		}		
	}, 1000);
	
}
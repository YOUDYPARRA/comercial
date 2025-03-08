function MarcaProveedorFunCtrl($timeout,$location,$scope,marcaProveedorSrc){
	
	var self = this;
	//	self.prueba=prb();
	$scope.calulo_proveedor=	{
		'proceso_interno':0,
		'tiempo_fabricacion':0,
		'tiempo_embarque':0,
		'liberacion_aduana':0
	}
	$scope.marcaProveedor=	
	{
		'id':"",
		'nombreProveedor':"",
    	'marcaRepresentada':"",
    	'diasEntregaMaximo':"",
    	'diasEntregaMinimo':"",
    	'observacion':"",
    	'vista':""
	};
	$scope.confMar=
	{
		headerCrear:"GENERAR NUEVA MARCA/PROVEEDOR",
		headerRecupera:"RESTAURAR MARCA/PROVEEDOR",
		headerEditar:"ACTUALIZA MARCA/PROVEEDOR",
		successEdit:"ACTUALIZAR",
		successCrea:"GUARDAR"
	};
		
		//
	$scope.eliminar=function (i){
		marcaProveedorSrc.delete({id:i.id},function(data){
			   window.location = '/marcas_proveedores';
		});
	}
	$scope.guardar=function (){
		//console.log("GUARDAR EL ARCHIVO:" +$scope.marcaProveedor.marcaProveedor+" observacion "+$scope.marcaProveedor.observacion);
		if($scope.marcaProveedor.id.length>0){
			marcaProveedorSrc.update($scope.marcaProveedor,function(data){
				   window.location = '/marcas_proveedores';
			});
		}else{
			marcaProveedorSrc.save($scope.marcaProveedor,function(data){
				   window.location = '/marcas_proveedores';
			});
		}
	}
	$scope.consultar=function (){//PARA CONSULTAR A SHOW...
		marcaProveedorSrc.get({id:$scope.marcaProveedor.id},function(data){
			$scope.marcaProveedor=data.marca_proveedor;
		});
	}

	$scope.indexar=function (marcaProveedor){//PARA CONSULTAR A INDEXAR...
//		alert(marcaProveedor);
		marcaProveedorSrc.get({marca_representada:marcaProveedor},function(data){
			$scope.marcaProveedor=data.marcas_proveedores;
			console.log($scope.marcaProveedor);
		});
	}

	$scope.actualizar=function (){
		marcaProveedorSrc.update($scope.marcaProveedor,function(data){
			window.location = '/marcas_proveedores';
		});
	}
	$scope.entrega=function (){
		///console.log('entre a calcular');
		var x=parseInt($scope.calulo_proveedor.proceso_interno)+
		parseInt($scope.calulo_proveedor.tiempo_fabricacion)+
		parseInt($scope.calulo_proveedor.tiempo_embarque)+
		parseInt($scope.calulo_proveedor.liberacion_aduana);
		
		$scope.marcaProveedor.dias_entrega_maximo=x;
	}
//CREAR NUEVO MARCA/PROVEEDOR.
/**
CONSULTAR USUARIO
CONSULTAR RECURSOS

**/
/*$scope.id=
{
	id:1
};*/
$scope.guarda=function(){
	$scope.guardar();	
}

	$timeout(function() {
		
		if($scope.marcaProveedor.vista===1)
		{// consulta para editar el objeto. SOLO SE PUEDEN EDITAR LAS HORAS, MAS NO, 	'nombreProveedor':"",'marcaRepresentada':"",	
			$scope.consultar();
			
		}else
		{
		}
		
	}, 1000);
	
}
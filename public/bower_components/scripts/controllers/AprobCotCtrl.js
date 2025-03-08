function AprobCotFnCtrl($timeout,$location,$filter,$scope,cotizacionSrc){
	var self = this;
		$scope.confApr=
	{
		headerCre:"APROBACIONES CREDITO Y COBRANZA",
		headerVen:"APROBACIONES VENTAS",
		headerMar:"APROBACIONES MARKETING",
		
	};
	$scope.aprobacion_credito_cobranza=	
	{
		"id":"",
		"nota":"",
		"fecha_aprobacion_cobranza":"",
		"aprobacion_cobranza":"",
		"estatus":""
	};
	$scope.aprobacion_marketing=	
	{
		"id":"",
		"nota":"",
		"fecha_aprobacion_marketing":"",
		"aprobacion_marketing":"",
		"estatus":""
	};
	$scope.aprobacion_ventas=	
	{
		"id":"",
		"nota":"",
		"fecha_aprobacion_ventas":"",
		"aprobacion_ventas":"",
		"estatus":""
	};		
	self.actualizar=function (){
		cotizacionSrc.update($scope.cotizacion,function(data){
//			window.location = '/';
//			window.location = $location.absUrl();
		},function(){alert('ERROR EN SERVIDOR');});
	}
		//INICIAN APROBACIONES....
	$scope.aprobacionVentas=function(o){
		if(confirm("¿DATOS CORRECTOS?"))
		{
			$scope.aprobacion_ventas.id=o.id;
			$scope.aprobacion_ventas.nota=o.nota;
			$scope.aprobacion_ventas.aprobacion_ventas=1;
			$scope.aprobacion_ventas.estatus="APROBADO";
			$scope.aprobacion_ventas.fecha_aprobacion_ventas = $filter('date')(new Date(), 'yyyy-MM-dd HH:mm:ss');
			$scope.cotizacion=$scope.aprobacion_ventas;
			self.actualizar();
		}
	}
	$scope.aprobacionServicio=function(o){
		if(confirm("¿DATOS CORRECTOS?"))
		{
			$scope.aprobacion_servicio.id=o.id;
			$scope.aprobacion_servicio.nota=o.nota;
			$scope.aprobacion_servicio.aprobacion_servicio=1;
			$scope.aprobacion_servicio.estatus="APROBADO";
			$scope.aprobacion_servicio.fecha_aprobacion_servicio = $filter('date')(new Date(), 'yyyy-MM-dd HH:mm:ss');
			$scope.cotizacion=$scope.aprobacion_servicio;
			self.actualizar();
		}
	}
	$scope.aprobacionMarketing=function(o){
		if(confirm("¿DATOS CORRECTOS?"))
		{
			$scope.aprobacion_marketing.id=o.id;
			$scope.aprobacion_marketing.nota=o.nota;
			$scope.aprobacion_marketing.aprobacion_marketing=1;
			$scope.aprobacion_marketing.estatus="APROBADO";
			$scope.aprobacion_marketing.fecha_aprobacion_marketing = $filter('date')(new Date(), 'yyyy-MM-dd HH:mm:ss');
			$scope.cotizacion=$scope.aprobacion_marketing;
			self.actualizar();
		}
	}
	
	$scope.aprobacionCreditoCobranza=function(o){
		if(confirm("¿DATOS CORRECTOS?"))
		{
			$scope.aprobacion_credito_cobranza.id=o.id;
			$scope.aprobacion_credito_cobranza.nota=o.nota;
			$scope.aprobacion_credito_cobranza.aprobacion_cobranza='APROBADO';
			$scope.aprobacion_credito_cobranza.estatus="APROBADO";
			$scope.aprobacion_credito_cobranza.fecha_aprobacion_cobranza = $filter('date')(new Date(), 'yyyy-MM-dd HH:mm:ss');
			$scope.cotizacion=$scope.aprobacion_credito_cobranza;
			self.actualizar();
		}
	}
	$scope.desaprobar=function(o){
//		console.log(o.departamento);
               if(o.departamento=='VENTAS CONSUMIBLES'){
//                   console.log('ventas consumibles');
                   $scope.cotizacion=
		{
//			"id":o.id,
//			"nota":o.nota,
//			"aprobacion_ventas":"APROBADO",
//			"fecha_aprobacion_marketing":"APROBADO",
//			"aprobacion_marketing":"RECHAZADO",
//                        "aprobacion_cobranza":"RECHAZADO",
//                        "estatus":"RECHAZADO"
			"id":o.id,
			"nota":o.nota,
			"aprobacion_ventas":"",
			"fecha_aprobacion_marketing":"",
			"aprobacion_marketing":"",
                        "aprobacion_cobranza":"",
                        "estatus":"ENVIADO"
			
		}
               }else{
                    $scope.cotizacion=
                    {
                            "id":o.id,
                            "nota":o.nota,
                            "fecha_aprobacion_ventas":"",
                            "aprobacion_ventas":"",
                            "fecha_aprobacion_marketing":"",
                            "aprobacion_marketing":"",
                            "fecha_aprobacion_cobranza":"",
                            "aprobacion_cobranza":"",
                            "estatus":"RECHAZADO"

                    }
                   
               }
		self.actualizar();

	}
	
	
}
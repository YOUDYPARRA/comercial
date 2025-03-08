function CondicionCotizacionFnCtrl($timeout,$location,$scope,condicionCotizacionSrc){
	
	$scope.varx = "xyz";
	$scope.us=""; 
	$scope.area=""; 
	$scope.habilitarCondicion=true;
	$scope.condicion_cotizacion=	
	{
		'precio':"",
		'tiempo_entrega':"",
		'condicion_pago':"",
		'guia_mecanica_salvaguarda_instalacion':"",
		'garantia':"",
		'capacitacion':"",
		'validez':"",		
		'anticipo':"",
		'mensaje_atencion':""
	};
	$scope.s_condicion_cotizacion={'capacitacion':'','validez':'','anticipo':''}

	//$scope.condicion_cotizacion.mensaje_atencion = "CON RELACION A SU SOLICITUD NOS PERMITIMOS PRESENTAR LA SIGUIENTE INFORMACIÓN.";
		
	//$scope.show=false;
	$scope.hide=true;
		//
	$scope.consultar_ventas=function(){
		console.log($scope.us);
		console.log($scope.area);
		 
		$scope.requiredV="required =''";
		$scope.requiredS="";
		//if(confirm("¿DESEA AGREGAR CONDICIONES DE COTIZACION PARA VENTAS?")){
			condicionCotizacionSrc.get(function(data){//comprobar si realiza la consulta sin parametro de busqueda
				$scope.condicion_cotizacion=data.condiciones;
			console.log($scope.condicion_cotizacion);
		if($scope.area==="COMERCIAL" || $scope.us=="NORMA ANGELICA SILVEYRA ALCANTARA"){console.log($scope.area);
                  $scope.habilitarCondicion=true;
                 $scope.condicion_cotizacion.precio =" ";
                  $scope.condicion_cotizacion.guia_mecanica_salvaguarda_instalacion=" ";
                  $scope.condicion_cotizacion.garantia=" ";
                  $scope.condicion_cotizacion.capacitacion=" ";

                $scope.condicion_cotizacion.tiempo_entrega =  $scope.condicion_cotizacion.tiempo_entrega_consumibles;
				$scope.condicion_cotizacion.condicion_pago =	$scope.condicion_cotizacion.forma_pago_consumibles;
				$scope.condicion_cotizacion.validez = $scope.condicion_cotizacion.vigencia_consumibles;

				//$scope.condicion_cotizacion.mensaje_atencion = $scope.condicion_cotizacion.mensaje_atencion;
				//$scope.b_condicion_cotizacion_mensaje_atencion = $scope.condicion_cotizacion.mensaje_atencion;

        }else{	console.log($scope.area);    
        	$scope.habilitarCondicion=false;
				$scope.condicion_cotizacion.precio  =	$scope.condicion_cotizacion.precio; console.log($scope.condicion_cotizacion.mensaje_atencion);
				$scope.b_concondicion_cotizacion_precio =$scope.condicion_cotizacion.precio;

				$scope.condicion_cotizacion.tiempo_entrega =  $scope.condicion_cotizacion.tiempo_entrega;
				$scope.b_condicion_cotizacion_tiempo_entrega = $scope.condicion_cotizacion.tiempo_entrega;

				$scope.condicion_cotizacion.condicion_pago =	$scope.condicion_cotizacion.condicion_pago;
				$scope.b_condicion_cotizacion_condicion_pago =	$scope.condicion_cotizacion.condicion_pago;

				$scope.condicion_cotizacion.guia_mecanica_salvaguarda_instalacion = $scope.condicion_cotizacion.guia_mecanica_salvaguarda_instalacion;
				$scope.b_condicion_cotizacion_guia_mecanica_salvaguarda_instalacion = $scope.condicion_cotizacion.guia_mecanica_salvaguarda_instalacion;
				
				$scope.condicion_cotizacion.garantia = $scope.condicion_cotizacion.garantia;
				$scope.b_condicion_cotizacion_garantia = $scope.condicion_cotizacion.garantia;

				$scope.condicion_cotizacion.capacitacion =	$scope.condicion_cotizacion.capacitacion;
				$scope.b_condicion_cotizacion_capacitacion = $scope.condicion_cotizacion.capacitacion;

				$scope.condicion_cotizacion.validez = $scope.condicion_cotizacion.validez;
				$scope.b_condicion_cotizacion_validez = $scope.condicion_cotizacion.validez;
				
				//$scope.condicion_cotizacion.mensaje_atencion = $scope.condicion_cotizacion.mensaje_atencion;
				//$scope.b_condicion_cotizacion_mensaje_atencion = $scope.condicion_cotizacion.mensaje_atencion;


			$scope.s_condicion_cotizacion.capacitacion = "";
			$scope.s_condicion_cotizacion.validez = "";
			$scope.s_condicion_cotizacion.anticipo = "";
		}
			});
		
	}

	$scope.bPrecio=function(){$scope.condicion_cotizacion.precio=$scope.b_concondicion_cotizacion_precio;}
	$scope.bTiempos=function(){$scope.condicion_cotizacion.tiempo_entrega=$scope.b_condicion_cotizacion_tiempo_entrega;}
	$scope.bPago=function(){$scope.condicion_cotizacion.condicion_pago=$scope.b_condicion_cotizacion_condicion_pago;}
	$scope.bGuias=function(){$scope.condicion_cotizacion.guia_mecanica_salvaguarda_instalacion=$scope.b_condicion_cotizacion_guia_mecanica_salvaguarda_instalacion;}
	$scope.bGarantia=function(){$scope.condicion_cotizacion.garantia=$scope.b_condicion_cotizacion_garantia;}
	$scope.bCapacitacion=function(){$scope.condicion_cotizacion.capacitacion=$scope.b_condicion_cotizacion_capacitacion;}
	$scope.bValidez=function(){$scope.condicion_cotizacion.validez=$scope.b_condicion_cotizacion_validez;}
	$scope.sbCapacitacion=function(){$scope.s_condicion_cotizacion.capacitacion=$scope.b_s_condicion_cotizacion_capacitacion;}
	$scope.sbValidez=function(){$scope.s_condicion_cotizacion.validez=$scope.b_s_condicion_cotizacion_validez;}
	$scope.sbAnticipo=function(){$scope.s_condicion_cotizacion.anticipo=$scope.b_s_condicion_cotizacion_anticipo;}

$scope.consultar_servicio=function(){
	$scope.requiredV="";
		$scope.requiredS='required =""';
		condicionCotizacionSrc.get(function(data){//comprobar si realiza la consulta sin parametro de busqueda
			$scope.s_condicion_cotizacion=data.condiciones;			console.log($scope.s_condicion_cotizacion);
			$scope.condicion_cotizacion.precio = ""; 				console.log($scope.condicion_cotizacion.precio);
			$scope.condicion_cotizacion.tiempo_entrega = "";
			$scope.condicion_cotizacion.condicion_pago = "";
			$scope.condicion_cotizacion.guia_mecanica_salvaguarda_instalacion = "";
			$scope.condicion_cotizacion.garantia = "";
			$scope.condicion_cotizacion.capacitacion =	"";
			//$scope.condicion_cotizacion.validez = "";
			/*$scope.s_condicion_cotizacion.capacitacion =$scope.s_condicion_cotizacion.capacitacion;
			$scope.b_s_condicion_cotizacion_capacitacion =$scope.s_condicion_cotizacion.capacitacion;*/
			$scope.s_condicion_cotizacion.validez = $scope.s_condicion_cotizacion.validez;
			$scope.b_s_condicion_cotizacion_validez = $scope.s_condicion_cotizacion.validez;
			$scope.s_condicion_cotizacion.anticipo = $scope.s_condicion_cotizacion.anticipo;
			$scope.b_s_condicion_cotizacion_anticipo = $scope.s_condicion_cotizacion.anticipo;
		});
	}

	
}
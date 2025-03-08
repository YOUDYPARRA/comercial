function StockFunCtrl($scope,equiposSrc,$filter,cotizacionPaqueteInsumoSrc,prestamoSrc,userSrc){
	var i=0;
	var codigo="";
	var sucursal="";
	var ejecutivo="";
	var res="";
	var c_venta;
	var c_compra;
	$scope.almacen="";
	$scope.stock_cot_insumos=[];
	$scope.progress=false;

	$scope.hoverIn=function(id,origen){												console.log(id);console.log(origen);
		$scope.productos=[];
		if(origen=="cot"){
		cotizacionPaqueteInsumoSrc.get({id:id},function(data){ 					console.info(data);
          	$scope.cotInsumo=data.cotizacion.insumos;                        	//console.log($scope.cotInsumo);//console.log(data.cotizacion.numero_cotizacion);
			sucursal=data.cotizacion.numero_cotizacion;
			ejecutivo=data.cotizacion.nombre_empleado;
			var organizacion=data.cotizacion.org_name;
			userSrc.get({vista:1,nombre:ejecutivo},function(data){ 				//console.log(data.users);
    			$scope.usuarios=data.users;										//console.log(data.users[0].lugar_centro_costo);
				res=data.users[0].lugar_centro_costo; 							//console.log(res);
				if(organizacion=="SMH"){
					if(res=="MX" || res=="MER" || res=="CH"){
						$scope.almacen="VAQUEROS";
					}else if(res=="MTY" ){
						$scope.almacen="MONTERREY";
					}else if(res=="GDL" || res=="BJ"){
						$scope.almacen="GUADALAJARA";
					}	
				}if(organizacion=="IMS"){
						$scope.almacen="ANEXO VAQUEROS";
				}																//console.log(ejecutivo);	console.log($scope.almacen);console.log(i);
          		while(i< $scope.cotInsumo.length){
          			$scope.progress=true;
					var codigo=$scope.cotInsumo[i].codigo_proovedor;				console.log(codigo);
          			equiposSrc.get({codigo_proovedor:codigo,almacen:$scope.almacen},function(data){		console.log(data);//console.log(data.equipos.length);//console.log(data.equipos[0].value);
						if(data.equipos.length>0){								//$scope.result(codigo,0,"",$scope.almacen);
						console.info(codigo);
							$scope.stock_cot_insumos.push({
                				cantidad_venta:data.equipos[0].primer_qty,
                				unidad_venta:data.equipos[0].primer_nombre_uom,
                				cantidad_compra:data.equipos[0].segundo_qty, 
                				unidad_compra:data.equipos[0].segundo_nombre_uom,
                				codigo:data.equipos[0].codigo_proovedor,
                				almacen:data.equipos[0].almacen
            				});	
						}else{													//$scope.result(data.equipos[0].codigo_proovedor,data.equipos[0].primer_qty,data.equipos[0].primer_nombre_uom,$scope.almacen);
						/*	$scope.cantidad_total="";
							$scope.stock_cot_insumos.push({
                				cantidad_venta:0,
                				unidad_venta:0,
                				cantidad_compra:0,
                				unidad_compra:0,
                				codigo:codigo,
                				almacen:$scope.almacen
            				});		*/
            			}
            			$scope.cantidad_total=$scope.stock_cot_insumos.length;
            			if($scope.cotInsumo.length == $scope.stock_cot_insumos.length){
            				$scope.progress=false;
            			}
					});																	//console.log($scope.cantidad_total);
              		i++; 															//console.log(i);
          		}
    		},function(err){alert('ERROR EN SERVIDOR.');});
		});
	}//FIN ORIGEN IF cot
	if(origen=="pres"){
		prestamoSrc.get({id:id},function(d){                                console.log(d);
          	$scope.cotInsumo=d.objeto.insumos_compras_ventas;                           	//console.log($scope.cotInsumo);//console.log(data.cotizacion.numero_cotizacion);
			res=d.objeto.sucursal;										console.log(sucursal);
			var organizacion=d.objeto.organizacion;
			//ejecutivo=data.cotizacion.nombre_empleado;
			/*userSrc.get({vista:1,nombre:ejecutivo},function(data){ 				//console.log(data.users);
    			$scope.usuarios=data.users;										//console.log(data.users[0].lugar_centro_costo);
				res=data.users[0].lugar_centro_costo;*/ 							//console.log(res);
				if(organizacion=="SMH"){
					if(res=="MX" || res=="MER" || res=="CH"){
						$scope.almacen="VAQUEROS";
					}else if(res=="MTY" ){
						$scope.almacen="MONTERREY";
					}else if(res=="GDL" || res=="BJ"){
						$scope.almacen="GUADALAJARA";
					}	
				}if(organizacion=="IMS"){
						$scope.almacen="ANEXO VAQUEROS";
				}																//console.log(ejecutivo);	console.log($scope.almacen);console.log(i);
          		while(i< $scope.cotInsumo.length){
          			//$scope.progress=true;
					var codigo=$scope.cotInsumo[i].codigo_proovedor;				console.log(codigo);
          			equiposSrc.get({codigo_proovedor:codigo,almacen:$scope.almacen},function(data){		console.log(data);//console.log(data.equipos.length);//console.log(data.equipos[0].value);
						if(data.equipos.length>0){								//$scope.result(codigo,0,"",$scope.almacen);
						console.info(codigo);
							$scope.stock_cot_insumos.push({
                				cantidad_venta:data.equipos[0].primer_qty,
                				unidad_venta:data.equipos[0].primer_nombre_uom,
                				cantidad_compra:data.equipos[0].segundo_qty, 
                				unidad_compra:data.equipos[0].segundo_nombre_uom,
                				codigo:data.equipos[0].codigo_proovedor,
                				almacen:data.equipos[0].almacen
            				});	
						}else{													//$scope.result(data.equipos[0].codigo_proovedor,data.equipos[0].primer_qty,data.equipos[0].primer_nombre_uom,$scope.almacen);
							/*$scope.cantidad_total="";
							$scope.stock_cot_insumos.push({
                				cantidad_venta:0,
                				unidad_venta:0,
                				cantidad_compra:0,
                				unidad_compra:0,
                				codigo:codigo,
                				almacen:$scope.almacen
            				});	*/	
            			}
            			$scope.cantidad_total=$scope.stock_cot_insumos.length;
            			if($scope.cotInsumo.length == $scope.stock_cot_insumos.length){
            				$scope.progress=false;
            			}
					});																	//console.log($scope.cantidad_total);
              		i++; 															//console.log(i);
          		}
    		},function(err){alert('ERROR EN SERVIDOR.');});
		//});
	}  // FIN ORIGEN IF pres
	}//FIN FUNCION HOVERIN
}
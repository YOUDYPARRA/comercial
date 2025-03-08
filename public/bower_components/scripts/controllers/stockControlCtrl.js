'use strict';
angular.module('cotizacionApp')
.controller('stockControlCtrl',function ($filter,productVSrc,almacenStock,gestionStockSrc,tipoAlmacenSrc,marcaProveedorSrc,$scope,$timeout,$location,insumosSrc)
{
	$scope.almacenes_stock={};
$timeout(function() {
	//QRY INSUMOS SELECCIONADO
	//QRY ALMACENES
	//QRY INSUMO EN ALMACENES STOCK
	//QRY TIEMPO DE ENTREGA DE PROVEEDOR
	var a=almacenStock.qry({id_insumo:$scope.id});
	a.$promise.then(function(r){
		$scope.almacenes_stock=r.punto_pedido;
	});
	var r=insumosSrc.get({ide:$scope.id,'vista':1});
	r.$promise.then(function(r){
		//console.log(r.insumos[0].id);
		$scope.insumo={
			id:r.insumos[0].id,
			aviso:r.insumos[0].aviso,
			unidades_venta:r.insumos[0].unidades_venta,
			descripcion:r.insumos[0].descripcion,
			unidad_medida:r.insumos[0].unidad_medida,
			codigo_proovedor:r.insumos[0].codigo_proovedor,
			marca:r.insumos[0].marca
		};
		$scope.objeto={
			id_insumo:r.insumos[0].id,
			codigo_proovedor:r.insumos[0].codigo_proovedor,
			org_name:'SMH',
			aviso:'',
			tiempo_respuesta:'',//tiempo respuesta de proveedor
			almacen:'',//nombre de almacen
			id_warehouse:'',//id de almacen
			punto_pedido:'',
			porcentaje_seguridad:'60',
			tiempo_respuesta:'30',
			m_product_id:'',
			calcular:''
		};
		var m=marcaProveedorSrc.get({'marca_representada':r.insumos[0].marca},function(r){
			//console.log(r.marcas_proveedores.data[0].dias_entrega_maximo);
			if( r.marcas_proveedores!=undefined ){
				//alert('es número');
				$scope.objeto.tiempo_respuesta=r.marcas_proveedores.data[0].dias_entrega_maximo;
			}else{
				$scope.objeto.tiempo_respuesta=30;
			}

		},function(err){console.log('ERROR AL CONSULTAR MARCAS')});

		$scope.tipos_almacen=tipoAlmacenSrc.get({'ad_org_id':$scope.org_id},
		    function(d){
		    }
		    ,function(e){
		      alert('CODE ERROR: '+e.status+' MSG '+e.data);
		  });
		productVSrc.get({value:r.insumos[0].codigo_proovedor},function(r){
				if(r.objetos.length>0){
					$scope.objeto.m_product_id=r.objetos[0].m_product_id;
				}else{
					alert('VERIFIQUE PRODUCTO COMPLETAMENTE REGISTRADO');
				}
			}	
			);
	});
},2000);
$scope.noCalcularStock=function(){
		$scope.objeto.calcular='0';
}
$scope.calcularStoclk=function(){
	gestionStockSrc.get($scope.objeto,function(rsl){
		//console.log(rsl);
		if(rsl.status=='401'){
			alert('DEBE INICIAR SESION');
		}else{
			$scope.objeto.punto_pedido=rsl.punto_pedido;
			$scope.objeto.maximo=rsl.maximo;
			$scope.objeto.stock_actual=rsl.stock_actual;
			$scope.objeto.cantidad_compra=rsl.cantidad_compra;
			$scope.objeto.unidad_compra=rsl.unidad_compra;
			$scope.objeto.porcentaje_actual_stock=rsl.porcentaje_actual_stock;
		}
		$scope.objeto.calcular='1';

	},function(err){
		if(err.status=='401'){
			alert('DEBE INICIAR SESION');
		}else if (err.status=='422'){
            alert(err.data.msg);			
		}else{
			alert('VERIFIQUE SERVIDOR ' + err.status);			
		}
	});
};
$scope.guardar=function(){
	var r=almacenStock.crea($scope.objeto);
	r.$promise.then(function(r){
		if(r.status=='422'){
			alert('VERIFIQUE REPETICION Y VALIDACION DE DATOS');
		}else if(r.status=='200'){
			alert('GUARDADO CORRECTAMENTE');
		}
		$scope.almacenes_stock=r.punto_pedido;

	});
}
$scope.slcAlmacen=function(){
	var x=$filter('filter')($scope.tipos_almacen.objetos, {m_warehouse_id:$scope.objeto.id_warehouse});
	$scope.objeto.almacen=x[0].name;
}
$scope.salElim=function(x){
		$scope.almacenes_stock={};
	var del=almacenStock.del({id:x.id});
	del.$promise.then(function(dl){
		var a=almacenStock.qry({'id_insumo':x.id_insumo});
		a.$promise.then(function(r){
			//console.log(r);
			$scope.almacenes_stock=r.objeto;
		});


	});

}
$scope.verMinimo=function(x){
	var a=almacenStock.qry({id:x.id});
	a.$promise.then(function(r){
		alert("Pedir Máximo:"+r.objeto.maximo);
		$scope.almacen_stock=r.objeto;
	});
	//console.log('entre a calcular');

}
})

function VentaFnCtrl(conversion,$filter,$scope,$controller,$timeout,$rootScope,$http,insumosSrc,cotizacionPaqueteInsumoSrc,tercerosSrc,direccionesSrc,agenteAduanalSrc,condicionPagoSrc,modoEnvioSrc,compraSrc,conversionSrc,equiposSrc,stockSrc,ordenVentaSrc){
$scope.Hi="HOLA";
$scope.insum=[];
$scope.preciosMultiples=[];
$scope.subTotal=0;
$scope.ivaT=0;
$scope.totales=0;
var i=0;
$scope.busquedaC=
    { 
    'todoText':"",
    'modelo':"",
    'descripcion':"",
    'marca':"",
    'tipo_equipo':""
    }

$scope.cotizacion=
    { 
    'numero_cotizacion':"",
    'no_pedido':"",
    'fecha_entrega':"",
    'nombre_fiscal':"",
    'rfc':"",
    'calle_fiscal':"",
    'colonia_fiscal':"",
    'codigo_postal_fiscal':"",
    'ciudad_fiscal':"",
    'estado_fiscal':"",
    'pais_fiscal':"",
    'nombre_cliente':"",
    'calle_entrega':"",
    'colonia_entrega':"",
    'codigo_postal_entrega':"",
    'ciudad_entrega':"",
    'estado_entrega':"",
    'iniciales_asignado':"",
    'condicion_pago':"",
    'contacto':"",
    'correo':"",
    'telefono':"",
    'celular':"",
    'tipo_moneda':"",
    'tipo_cliente':"",
    'c_bpartner_id':"",
    'c_location_id':"",
    'pais_entrega':"",
    'representante_legal':"",
    'departamento':"",
    'nota':"",
    'org_name':"",
    'no_contrato':"",
    'tipo_cambio':"",
    'letras':"",
    }


$timeout(function() {
	console.log($scope.id);
	console.log($scope.id_venta);
	var copia=[];
    var dat= new Date();            //console.log(dat);
	var formattedDate = moment(dat).format('YYYY-MM-DD');
	$scope.fechas = moment(dat).format('DD-MM-YYYY');
	if($scope.id != undefined){ console.log("CREATE");console.log($scope.id);
  	//$scope.mostrarBuscarInsumos=true;
		$scope.getCotizacion($scope.id);
	$scope.buscarTipoCambioActual(formattedDate);//$scope.buscarTipoCambioActual('2016-09-13');
	}else if($scope.id_venta!="" || $scope.id_venta != undefined){ console.log("UPDATE");
		$scope.getOrdenVenta($scope.id_venta);
    $scope.buscarTipoCambioActual(formattedDate);//$scope.buscarTipoCambioActual('2016-09-13');
	}

}, 1000);

angular.extend(this,$controller('NumeroAletraCtrl',{$scope:$scope}));

$scope.getOrdenVenta=function(id){

  $scope.facturacion;
ordenVentaSrc.get({id:id},function(data){
          $scope.cotizacion=data.venta;        
                                 console.log($scope.cot);
          //$scope.cotizacion=$scope.cot;
          $scope.cotInsumo=data.venta.insumos_venta;                        console.log($scope.cotInsumo);
          $scope.auto=data.venta.auto;
          $scope.nota=data.venta.nota;
$scope.moneda_destino=$scope.cotizacion.tipo_moneda;

while(i< $scope.cotInsumo.length){
var x=1;
var precio=$scope.cotInsumo[i].precio.replace(",","");
  console.log(x);
              $scope.insum.push({
                ide:$scope.cotInsumo[i].id_insumo,                      //  stk:$rootScope.primary_qty, 
                cantidad:$scope.cotInsumo[i].cantidad,
                codigo:$scope.cotInsumo[i].codigo_proovedor,
                modelo:$scope.cotInsumo[i].modelo,
                marca:$scope.cotInsumo[i].marca,
                descripcion:$scope.cotInsumo[i].descripcion,
                caracteristicas:$scope.cotInsumo[i].caracteristicas,
                especificaciones:$scope.cotInsumo[i].especificaciones,
                costos:$scope.cotInsumo[i].costos,
                precio:precio,
                unidad_venta:$scope.cotInsumo[i].unidad_venta,
                unidad_compra:$scope.cotInsumo[i].unidad_compra,
                costo_moneda:$scope.cotInsumo[i].costo_moneda,
                tipo_cambio:$scope.cotInsumo[i].tipo_cambio,
                tipo_equipo:$scope.cotInsumo[i].tipo_equipo,
                bandera_insumo:$scope.cotInsumo[i].bandera_insumo,
                total:$scope.cotInsumo[i].total,                        //cotizacion:$scope.coti// done:false,
            });
              i++; console.log(i);
          }

      });
}

    $scope.getCotizacion=function(id){
  $scope.facturacion;
cotizacionPaqueteInsumoSrc.get({id:id},function(data){
          $scope.cot=data.cotizacion;        
          $scope.cot=data.cotizacion;                        console.log($scope.cot);
                  
          $scope.cotizacion=$scope.cot;
          $scope.cotInsumo=data.cotizacion.insumos;                        console.log($scope.insumos);
$scope.moneda_destino=$scope.cotizacion.tipo_moneda;
console.log();
while(i< $scope.cotInsumo.length){
var x=1;
var precio=$scope.cotInsumo[i].precio.replace(",","");
 // x=$scope.convertir($scope.cotInsumo[i].insumo_unidad_compra, $scope.cotInsumo[i].insumo_unidad_medida, $scope.cotInsumo[i].cantidad, 1,$scope.cotInsumo[i].insumo_cantidad_unidad_compra);
  console.log(x);
              $scope.insum.push({
                ide:$scope.cotInsumo[i].id_insumo,                      //  stk:$rootScope.primary_qty, 
                cantidad:$scope.cotInsumo[i].cantidad,
                codigo:$scope.cotInsumo[i].codigo_proovedor,
                modelo:$scope.cotInsumo[i].modelo,
                marca:$scope.cotInsumo[i].marca,
                descripcion:$scope.cotInsumo[i].descripcion,
                caracteristicas:$scope.cotInsumo[i].caracteristicas,
                especificaciones:$scope.cotInsumo[i].especificaciones,
                costos:$scope.cotInsumo[i].costos,
                precio:precio,
                unidad_venta:$scope.cotInsumo[i].insumo_unidad_medida,
                unidad_compra:$scope.cotInsumo[i].unidad_compra,
                costo_moneda:$scope.cotInsumo[i].costo_moneda,
                tipo_cambio:$scope.cotizacion.tipo_moneda,
                tipo_equipo:$scope.cotInsumo[i].tipo_equipo,
                bandera_insumo:$scope.cotInsumo[i].bandera_insumo,
                total:$scope.cotInsumo[i].total,                        //cotizacion:$scope.coti// done:false,
            });
              i++; console.log(i);
          }

      });
}


$scope.buscarTipoCambioActual = function(c_fecha){
    conversionSrc.get({vi:0,validto:c_fecha},function(data){        console.log(data);
      if(data.conversiones.length==0){
        alert("¡¡ NO HAY TIPO DE CAMBIO DE LA FECHA: "+c_fecha+" \n FAVOR DE VERIFICAR EN SISTEMA !!");}
      else{
                      $scope.cotizacion.tipo_cambio=data.conversiones[0].dividerate;                 //   console.log(c_cambio);
                      //var c_cambio=data.conversiones[0].dividerate;                    console.log(c_cambio);
                        //$scope.tipo_cambio=$filter('number')(c_cambio, 2);
                        //return $scope.tipo_cambio;
                       // return c_cambio;
          }
    },function(err){alert('ERROR EN SERVIDOR.');});        
}

$scope.setTotals = function(item){         console.log(item); 
console.log(item.precio);//   
console.log(item.cantidad); 
  
 //if($scope.j==0){
          if (item){            //item.total = (item.cantidad * item.precio)-(item.cantidad * item.costo);
            //item.total = (item.cantidad * item.costo);
            item.total = (parseFloat(item.cantidad) * parseFloat(item.precio)); console.log(item.total);//UPDATE 20160719
            //item.total = (cantidad * precio); 
            $scope.subTotal += parseFloat(item.total);                    console.log($scope.subTotal);
           // $scope.total=(cantidad * precio);               console.log($scope.total);
           // $scope.subTotal += $scope.total;                console.log($scope.subTotal);
            $scope.ivaT  = $scope.subTotal*0.16;        // console.log($scope.iva);
            $scope.totales = ($scope.subTotal+$scope.ivaT);            // console.log($scope.totales);
            $scope.cotizacion.letras=$scope.NumeroALetras($scope.totales,item.tipo_cambio);
            $scope.cambio=item.tipo_cambio;/*        console.log($scope.letras); *///console.log($rootScope.cambio);
          }//console.log(j);
          //$scope.j++;
       //} 
  }

  $scope.buscarB =function(busquedaC){            
             insumosSrc.get(busquedaC,function(data){
            $scope.insumosB=data['insumos'].data;                console.log($scope.insumos);
          },function(err){alert('ERROR EN SERVIDOR.');});
        }

    $scope.equipos =function(seleccionado){   console.log(seleccionado);//OKs
  if(confirm("¿Desea agregar el insumo seleccionado?")){
$scope.cantidad=1;
$scope.unidad_medida=seleccionado.unidad_medida;
$scope.codigo_proovedor=seleccionado.codigo_proovedor;
$scope.precioCompra=seleccionado.precio;
$scope.costo_moneda=seleccionado.tipo_cambio;
console.log(seleccionado.precios.length);
	if(seleccionado.precios.length>0){
		var j=0;
		while(j<3){
			$scope.precio=conversion.getPreciosMultiples(j, seleccionado.precios[j].monto, seleccionado.tipo_cambio, $scope.moneda_destino, seleccionado.precios[j].etiqueta);
			console.log($scope.preciosMultiples[j]);
			$scope.preciosMultiples.push({
                        etiqueta:seleccionado.precios[j].etiqueta,
                        monto:$scope.precio
                      });console.log($scope.preciosMultiples[i]);
			j++;
		}
//		console.log(copia);
		console.log($scope.preciosMultiples);
	$scope.seleccionado=seleccionado;
	}
}else{alert("! ACCION CANCELADA ¡")}
}

$scope.montoSeleccionado=function(monto){
	$scope.precioCompra=monto;
}

$scope.agregarCarrito=function(){
  $scope.insum.push({
                ide:$scope.seleccionado.id,                      //  stk:$rootScope.primary_qty, 
                cantidad:$scope.cantidad,
                codigo:$scope.seleccionado.codigo_proovedor,
                modelo:$scope.seleccionado.modelo,
                marca:$scope.seleccionado.marca,
                descripcion:$scope.seleccionado.descripcion,
                caracteristicas:$scope.seleccionado.caracteristicas,
                especificaciones:$scope.seleccionado.especificaciones,
                costos:$scope.seleccionado.costos,
                precio:$scope.precioCompra,
                unidad_compra:$scope.seleccionado.unidad_compra,
                costo_moneda:$scope.seleccionado.costo_moneda,
                tipo_cambio:$scope.seleccionado.tipo_cambio,
                tipo_equipo:$scope.seleccionado.tipo_equipo,
                bandera_insumo:$scope.seleccionado.bandera_insumo,
                total:$scope.seleccionado.total,                        //cotizacion:$scope.coti// done:false,
            });
}

$scope.remover=function(j,precio,cantidad){    console.log(cantidad);
    if(confirm("¿ DESEA ELIMINAR EL INSUMO DE LA LISTA?"))      {
      var precio=precio*cantidad;
      $scope.subTotal=$scope.subTotal-precio;
      var ivad  = precio*0.16;  
      $scope.ivaT  =$scope.ivaT - ivad;
      console.log(ivad);
      console.log(precio);
      var menosTotal=parseFloat(precio) + parseFloat(ivad);
      console.log(menosTotal);
      $scope.totales=$scope.totales-menosTotal;
       $scope.letras=$scope.NumeroALetras($scope.totales,$rootScope.cambio);/*        console.log($scope.letras); */console.log($rootScope.cambio);
      //$scope.insumosB=[];
      //$scope.preciosMultiples=[];
            $scope.insum.splice(j,1);       }else{alert("¡ Accion Cancelada !");}
    }

    $scope.alerta=function(msj){
      alert(msj);
    }

}
function PaqueteFunCtrl($timeout,$scope,$controller,$rootScope,insumosSrc,maximoSrc){

	$scope.ho="HOLA MUNDO";
	$scope.insum=[];
	$scope.seleccionado=[];
  $scope.seleccionado.id_pack=1;
  $scope.precio=0;
  $scope.subTotal=0;
  $scope.ivaT=0;
  $scope.totales=0;
  $scope.letras="";
  $scope.cambio="";

	$scope.busquedaC=
    { 
    'vista':1,
    'tipo_equipo':"",
    'codigo_proovedor':"",
    'modelo':"",
    'descripcion':"",
    'marca':""
    }


angular.extend(this,$controller('NumeroAletraCtrl',{$scope:$scope}));
    $scope.buscarB =function(busquedaC){            
             insumosSrc.get(busquedaC,function(data){
            $scope.insumosB=data.insumos;                console.log($scope.insumos);
          },function(err){alert('ERROR EN SERVIDOR.');});
        }

    $scope.equipos =function(seleccionado){   console.log(seleccionado);//OKs
  if(confirm("¿Desea agregar el insumo seleccionado?")){
$scope.cantidad=1;
$scope.unidad_medida=seleccionado.unidad_medida;
$scope.codigo_proovedor=seleccionado.codigo_proovedor;
$scope.precio=seleccionado.precio;
$scope.costo_moneda=seleccionado.tipo_cambio;

$scope.seleccionado=seleccionado;
//$scope.maximoPack();
//console.log($scope.maximo);
}else{alert("! ACCION CANCELADA ¡")}
}

$scope.agregarCarrito=function(){console.log($scope.seleccionado);
  console.log($scope.insum.length);
  if(($scope.insum.length==0 && $scope.seleccionado.bandera_insumo !="N")){
            alert("ASEGURESE AGREGAR UNA ETIQUETA O EQUIPO");
          }else  {
            maximoSrc.get(function(data){
            $scope.maximos=data['maximo'];  
            if($scope.maximos[0] == undefined || $scope.maximos.length<0){          //if($scope.maximos[0]['id_pack']==""){            //alert("vacio"); 
            $scope.seleccionado.id_pack=1;
            $scope.carrito();
          }else{
            $scope.seleccionado.id_pack=parseInt($scope.maximos[0]['id_pack'])+1;//
            $scope.carrito();
            console.log($scope.precio);
             
            }
          },function(err){alert('ERROR EN SERVIDOR.');}); 
        }
}

$scope.carrito=function(){
   $scope.insum.push({
                ide:$scope.seleccionado.id,                      //  stk:$rootScope.primary_qty, 
                id_pack:$scope.seleccionado.id_pack,                      //  stk:$rootScope.primary_qty, 
                cantidad:$scope.cantidad,
                codigo:$scope.seleccionado.codigo_proovedor,
                modelo:$scope.seleccionado.modelo,
                marca:$scope.seleccionado.marca,
                descripcion:$scope.seleccionado.descripcion,
                caracteristicas:$scope.seleccionado.caracteristicas,
                especificaciones:$scope.seleccionado.especificaciones,
                costo:$scope.seleccionado.costos,
                precio:$scope.precio,
                unidad_compra:$scope.seleccionado.unidad_compra,
                unidad_venta:$scope.seleccionado.unidad_medida,
                moneda_venta:$scope.seleccionado.tipo_cambio,
                moneda_compra:$scope.seleccionado.costo_moneda,
                tipo_equipo:$scope.seleccionado.tipo_equipo,
                bandera_insumo:$scope.seleccionado.bandera_insumo,
                total:$scope.seleccionado.total,                        //cotizacion:$scope.coti// done:false,
              });
}

$scope.alerta=function(msj){
  alert(msj);
}

$scope.maximoPack =function(){
          maximoSrc.get(function(data){
            $scope.maximos=data['maximo'];  
            if($scope.maximos[0] == undefined){          //if($scope.maximos[0]['id_pack']==""){            //alert("vacio"); 
              $scope.maximo=1;  
            }else{                        //alert("LLENO"); 
              $scope.maximo=parseInt($scope.maximos[0]['id_pack'])+1;//
              console.log($scope.maximo);
            }
          },function(err){alert('ERROR EN SERVIDOR.');}); 
      }

$scope.setTotals = function(item){         console.log(item); 
console.log(item.precio);//   
console.log(item.cantidad); 
          if (item){            //item.total = (item.cantidad * item.precio)-(item.cantidad * item.costo);
            item.total = (parseFloat(item.cantidad) * parseFloat(item.precio)); console.log(item.total);//UPDATE 20160719
            $scope.subTotal += parseFloat(item.total);                    console.log($scope.subTotal);
            $scope.ivaT  = $scope.subTotal*0.16;                    console.log($scope.iva);
            $scope.totales = ($scope.subTotal+$scope.ivaT);             //console.log(item.tipo);
            $scope.letras=$scope.NumeroALetras($scope.totales,item.moneda_venta);
            $scope.cambio=item.moneda_venta;/*        console.log($scope.letras); */console.log($scope.cambio);
          }//console.log(j);
          //$scope.j++;
       //} 
  }

  $scope.sinIva = function(){
            $scope.totales = ($scope.totales-$scope.ivaT);             console.log($scope.totales);
            $scope.ivaT  = 0;                    console.log($scope.iva);
            $scope.letras=$scope.NumeroALetras($scope.totales,$scope.cambio);
  }

  $scope.validaPack=function(){
          var val=false;          //console.log($scope.packs[0]);
          if($scope.insum[0]!=undefined)
          {            //console.log($scope.packs[0].bandera.trim());
           if($scope.insum[0].bandera_insumo.trim()=="E")
           {            //console.log("entre pq es true la p");
            val= true; 
           }else
           {            //console.log("entre pq NOes true la p");
            val=false;
           }
          }else
          {            //console.log("disabled pacsk 0");
            val=true;
          }
          return val;  
        }

}
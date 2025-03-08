'use strict';
angular.module('cotizacionApp')
.controller('InsumoOpcionalCtrl',function ($scope,$controller,$timeout,insumosSrc,componenteSrc,insumoOpcionalSrc,$log,insumoOpcionalConsultarSrc,productosSrc,productVSrc){
    angular.extend(this,$controller('NumeroAletraCtrl',{$scope:$scope}));

    $scope.prod="HOLA PRODUCTO";
    $scope.busqueda=
        { 'codigo_proovedor':"",
        'modelo':"",
        'descripcion':"",
        'vista':1,
    	}
        $scope.busquedaC=
        { 'todoText':"",
        'modelo':"",
        'descripcion':"",
        'bandera_insumo':"SUB"
        }

    $scope.busquedaI=
        {
        'vista':5,
        'categoria3':""
    	}

    $scope.busquedaE=
        {
        'vista':2,
        'bandera_insumo':'E'
    	}
    $scope.insumos_opcionales={
    	'id_insumo':"",
    	'id_componente':"",
    	'id_pertenece':""
    }
$scope.insumo=[];
        $timeout(function() {
     			/*insumosSrc.get({vista:1,bandera_insumo:"E"},function(data){
                $scope.insumos=data.insumos; //console.log($scope.insumos+"<-INSUMOS");
                $scope.total=data.insumos.total;
                });*/
                productosSrc.get({vi:"1"},function(d){ console.log(d);
                    $scope.insumo=d.productos;
                },function(e){alert('Error: '+e.status+' '+e.data)});
            }, 1000);
    //////////////////////////////////////////////////////////////////////////////////////////////////
    $scope.productoSeleccionado=function(objeto){                                           console.info(objeto);
        $scope.objeto=JSON.parse(objeto);                                                   console.info($scope.objeto.value);
        insumosSrc.get({vista:1,codigo_proovedor:$scope.objeto.value,categoria1:$scope.producto.categoria1},function(data){                         console.info(data.insumos.length);
            if(data.insumos.length==0){
                $scope.producto.tipo_equipo=$scope.objeto.category_name;                    console.info($scope.producto.tipo_equipo);
                $scope.producto.codigo_proovedor=$scope.objeto.value;                       //console.info($scope.producto.codigo_proovedor);
                $scope.producto.marca=$scope.objeto.brand_name;                             //console.info($scope.producto.codigo_proovedor);
                $scope.producto.modelo=$scope.objeto.upc;                                   //console.info($scope.producto.codigo_proovedor);
                $scope.producto.descripcion=$scope.objeto.product_name;                     //console.info($scope.producto.codigo_proovedor);
                $scope.producto.caracteristicas=$scope.objeto.description;                  //console.info($scope.producto.codigo_proovedor);
                $scope.producto.unidad_venta=$scope.objeto.uom_name;                        //console.info($scope.producto.codigo_proovedor);
            }
        },function(err){alert('ERROR EN SERVIDOR.');});
    }

//////////////////////////////////////////////////////////////////////////////////////////////////
    $scope.editProducto=function(prod){                                                     //console.info(prod);
        productVSrc.get({value:prod.codigo_proovedor},function(data){                           console.info(data.objetos);
            $scope.producto=prod;                                                           //console.info($scope.producto.tipo_equipo);//$scope.productos=data.objetos[0];                                                  //console.log($scope.insumos+"<-INSUMOS"); 
            if(data.objetos.length>0){
                $scope.producto.tipo_equipo=data.objetos[0].category_name;                      console.info($scope.producto.tipo_equipo);
                $scope.producto.codigo_proovedor=data.objetos[0].value;                       //console.info($scope.producto.codigo_proovedor);
                $scope.producto.marca=data.objetos[0].brand_name;                             //console.info($scope.producto.codigo_proovedor);
                $scope.producto.modelo=data.objetos[0].upc;                                   //console.info($scope.producto.codigo_proovedor);
                $scope.producto.descripcion=data.objetos[0].product_name;                     //console.info($scope.producto.codigo_proovedor);
                $scope.producto.caracteristicas=data.objetos[0].description;                  //console.info($scope.producto.codigo_proovedor);
                $scope.producto.unidad_venta=data.objetos[0].uom_name;                        //console.info($scope.producto.codigo_proovedor);
                if(prod.multiprecios==1){
                    $scope.multiprecios=true;
                }else{
                    $scope.multiprecios=false;
                }                                                                            //console.log(prod.precios);
            }
        });
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////
        $scope.currentPage = 0;
        $scope.pageSize = 10;
        $scope.data = [];
        $scope.mostrar = false;

        $scope.numberOfPages=function(){
            return Math.ceil($scope.total / $scope.pageSize);
        }					/*    for (var i=0; i<45; i++) {        $scope.data.push("Item "+i);    }*/
    //////////////////////////////////////////////////////////////////////////////////////////////////
        $scope.checkCode=function(code){                                                            console.log($scope.producto.categoria1);
            if($scope.producto.categoria1==""||$scope.producto.categoria1==undefined){
                    alert("¡¡FAVOR DE SELECIONAR LA ORGANIZACION!!");
                    $scope.producto.codigo_proovedor="";
            }else{
                insumosSrc.get({vista:1,codigo_proovedor:code,categoria1:$scope.producto.categoria1},function(data){
                    if(data.insumos.length>=1){                                                             console.log(data.insumos.length);
                        alert("EL CODIGO YA EXISTE EN EL SISTEMA COMERCIAL, FAVOR DE VERIFICAR");
                    }   
                });
            }
                
        }
    //////////////////////////////////////////////////////////////////////////////////////////////////
            $scope.buscar =function(busqueda){
                insumosSrc.get(busqueda,function(data){
                $scope.insumos=data.insumos; 				//console.log($scope.insumos);
              });
            }
            $scope.buscarPertenece =function(){
                insumosSrc.get({'codigo_proovedor':$scope.bsqCodigo,'vista':1},function(data){
                $scope.insumosI=data.insumos; 				//console.log($scope.insumos);
              });
            }
            $scope.buscarI =function(insumos){ 					//console.log(insumos.categoria3);
            	$scope.busquedaI.categoria3=insumos.categoria3;
            	$scope.insumo = insumos.modelo+" "+insumos.categoria1+" "+insumos.categoria2+" "+insumos.categoria3+""+insumos.descripcion;
            	$scope.insumos_opcionales.id_insumo = insumos.id;
                insumosSrc.get($scope.busquedaI,function(data){
                $scope.insumosI=data.insumos; 				//console.log($scope.insumosI);

                componenteSrc.get({linea:"*"+insumos.categoria3+"*"},function(data){			//console.log(data);
                	$scope.componentes=data['componentes'];		//console.log($scope.componentes);
                });

              });
            }

            $scope.buscarB =function(busquedaC){
               insumosSrc.get(busquedaC,function(data){
                $scope.insumosB=data.insumos;                console.log($scope.insumos);
              });
            }

            $scope.buscarE =function(insumos){ 					console.log(insumos.tipo_equipo);
            	//$scope.busquedaE.tipo_equipo=insumos.tipo_equipo;
            	$scope.insumo = insumos.modelo+" "+insumos.categoria1+" "+insumos.categoria2+" "+insumos.categoria3+""+insumos.descripcion;
            	$scope.insumos_opcionales.id_insumo = insumos.id;
                insumosSrc.get($scope.busquedaE,function(data){
                $scope.insumosI=data.insumos; 				console.log($scope.insumosI);

                componenteSrc.get({linea:"*"+insumos.tipo_equipo+"*"},function(data){			console.log(data);
                	$scope.componentes=data['componentes'];		console.log($scope.componentes);
                });

              });
            }
            $scope.InsumoSeleccionado= function(seleccionado){ console.log(seleccionado);
            	console.log($scope.insumos_opcionales.id_insumo);
            	if($scope.insumos_opcionales.id_insumo === seleccionado){
            		alert("NO SE PUEDE ELEGIR A SI MISMO EL INSUMO");
            	}else{
            		$scope.insumos_opcionales.id_pertenece=seleccionado;
            	}
            }

            $scope.ComponenteSeleccionado= function(componente){ console.log(componente);
            	$scope.insumos_opcionales.id_componente=componente;
            }

            $scope.guardar = function(){//alert("ok");
            	insumoOpcionalSrc.save($scope.insumos_opcionales,function(data){ console.log(data);
            		alert("REGISTRO GUARDADO CORRECTAMENTE");
    			   		//window.location = '/insumos-opcionales';
    				});
            }

            $scope.hoverIn = function(insumos){
              //console.log(insumos);
            this.hoverEdit = true;
            insumoOpcionalConsultarSrc.get({id_insumo:insumos.id},function(data){
              //console.log(data);
            		if(data.insumos_opcionales == null || data.insumos_opcionales.length == 0){
            			$scope.hoverOut();
            			$scope.equipos=new Array();
            		}else{
                  $scope.equipos=data.insumos_opcionales;
                  //console.log(data.insumos_opcionales);
            		}
    			   	//	window.location = '/insumos-opcionales';
    				});

        };

        $scope.hoverOut = function(){
          //console.log('hover out');
            this.hoverEdit = false;
        };
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $scope.validarUnico = function(){
                insumosSrc.get({todoText:"*"+$scope.codigo_proovedor+"*"},function(data){
                var insumos=data.insumos; //console.log($scope.insumos+"<-INSUMOS");
                if(insumos.length > 0){ alert("YA EXISTE UN REGISTRO CON CODIGO SIMILAR");}
                //console.log(data.insumos);
                });
        }

})

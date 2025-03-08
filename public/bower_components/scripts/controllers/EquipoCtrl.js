function EquipoFunCtr($scope,$controller,$timeout,$rootScope,$http,insumosSrc,paquetesSrc,paqueteSrc,marcaProveedorSrc,conversionSrc){
        $scope.elegido ="";
        $scope.cadena="hola mundo";
        $scope.cad=$rootScope.maximo;
        $scope.packs=[];
        $rootScope.todos=[];
        var selec='';
        $scope.mayor=0;
        $scope.invoiceCount = 0;
        $scope.invoiceTotal = 0;
        $scope.totales2= 0;
        $scope.subTotal = 0;
        $scope.iva=0.16;
        $scope.ivaT=0;
        $scope.glued = true;

        $scope.prueba=function(prb){
          $scope.idpaquete=prb;
          var ns= [];
            paqueteSrc.get({vista:1,id_pack:$scope.idpaquete},function(data){
              $scope.paq=data['paquete'];              //console.log($scope.paq);
            });
        }
        var j=0;

        $scope.eliminaEquipo =function(insum,i){          //console.log(insum);          //console.log("index"+i);
          if(insum.bandera_insumo=="N" && i==0)
          {
           alert("NO SE DEBE ELIMINAR EL NOMBRE DE PAQUETE DESDE AQUI.");
          }else
          {
            if (confirm("¡¡ ¿Desea eliminar el insumo: "+insum.insumo_proovedor+"? !!")) {
                $scope.borrarInsumo=insum.id;                //console.log($scope.borrarInsumo);
                paqueteSrc.delete({id:$scope.borrarInsumo,id_pack:$scope.idpaquete,vista:0},function(data){// console.log(i);
                $scope.paq.splice(i,1);/*$scope.paq=[];*/ /*this.prueba($scope.idpaquete);*//*console.log("ELIMINAR DESDE AQUI DATA: "+data);*/});  
                //console.log("ok");
                /*$scope.paq=[];*/
                /*this.prueba($scope.idpaquete);*/
                //if(confirm("¡¡ Registro eliminado exitosamente: ")){
                //if(confirm("¡¡ Registro eliminado exitosamente: "+$insum.insumo_proovedor+" !!")){
                  //$scope.paq=[];
                  //this.prueba($scope.idpaquete);
                //}
              } else {
                      alert("Solicitud cancelada!");
              }              //this.prueba($scope.idpaquete);              //paqueteSrc.delete({id:$scope.borrarInsumo});
          }
        }

        $scope.agregarEquipo =function(){//agregar en paquete.edicion
          if(confirm("¡¡ ¿Desea agregar el insumo: "+$rootScope.codigo+" ? !!")){
            paqueteSrc.save({vista:0,id_equipo:$scope.ide,id_pack:$scope.idpaquete,bandera_insumo:$scope.bandera,cantidad:$scope.cantidad})
            if(confirm("!! Registro guardado exitosamente: "+$rootScope.codigo+"¡¡")){
              $scope.paq=[];
              this.prueba($scope.idpaquete);
            }
          }else{
            alert("Solicitud cancelada!");
          }        //paqueteSrc.save({vista:0,});         
        }

        angular.extend(this,$controller('NumeroAletraCtrl',{$scope:$scope}));
        angular.extend(this,$controller('insumoCtr',{$scope:$scope}));
        //angular.extend(this,$controller('stockCtr',{$scope:$scope}));
        angular.extend(this,$controller('maximoCtr',{$scope:$scope}));
        
        $scope.equiposLst =function(){ 
        //  $scope.equipoOpcion ="P";
          if($scope.equipoOpcion == "P"){
            paquetesSrc.get({todoText:"*"+$scope.todoText+"*"},function(data){
            $scope.insumosTodos=data['paquetes']; console.log($scope.insumosTodos);
          });
          }
          else{
            if($scope.equipoOpcion == "L"){ console.log("aqui");
                /*          insumosSrc.get({clave:"*"+$scope.todoText+"*"},function(data){
            $scope.insumosTodos=data['insumos'].data; //console.log($scope.insumos+"<-INSUMOS"); 
            });*/
            }
            else{
              if($scope.equipoOpcion== undefined){console.log("FAVOR DE SELECCIONAR UN TIPO DE EQUIPO");}
            insumosSrc.get({todoText:"*"+$scope.todoText+"*",equipoOpcion:"*"+$scope.equipoOpcion+"*"},function(data){
            $scope.insumosTodos=data['insumos'].data; console.log($scope.insumos+"<-INSUMOS"); 
            });
          }
          }
        }

        $scope.eqp=function(x){
          console.log("->"+x.descripcion);
        }

        $scope.moneda=function(moneda){
          $rootScope.cambio=moneda;console.log($scope.cambio);
        }

        $scope.equipo =function(selec){          //  console.log("ENTRO A FUNCION EQUIPO= OK");//OK            
        console.log(selec);//OK
        console.log($rootScope.cambio);//OK
      //  if($rootScope.cambio === undefined){alert("¡¡ FAVOR DE SELECCIONAR EL TIPO DE CLIENTE !!");}

          $rootScope.id_pack=selec.id_pack;  console.log($scope.id_pack);
          if($rootScope.id_pack!=undefined){
            paqueteSrc.get({vista:1,id_pack:"*"+$rootScope.id_pack+"*"},function(data){
            $scope.paquete=data['paquete'];           //        console.log($scope.paquete);          //console.log(JSON.stringify($scope.paquete));          //console.table($scope.paquete,['descripcion']['codigo_proovedor']);
              $rootScope.ide=[];
              $rootScope.ideEquipo=[];
              $rootScope.bandera=[];
              $rootScope.codigo =[];
              $rootScope.marca =[];
              $rootScope.modelo =[];
              $scope.caracteristicas= [];
              $scope.descripcion= [];
              $scope.especificaciones= [];
              $scope.costo= [];
              $scope.precio = [];
              $scope.cantidad=1;
              $scope.cantidadP=[];
              $scope.tipo_cambio=[];
              $scope.tipo_equipo=[];
              $scope.id_pack=[];
              $scope.estado=[];
              $scope.unidad_medida=[];
              $rootScope.cotiz=[];              //console.log($scope.paquete[0]['cantidad']);
              for(var i in $scope.paquete) {/*if ($scope.paquete.hasOwnProperty(i)) {*/ //console.log(i);
                $rootScope.ideEquipo[i] = $scope.paquete[i]['insumo_id']; // console.log($scope.paquete[i]['insumo_id']);
                $rootScope.bandera[i] = $scope.paquete[i]['insumo_bandera_insumo'];
                $rootScope.codigo[i] = $scope.paquete[i]['insumo_proovedor'];
                $rootScope.marca[i] = $scope.paquete[i]['insumo_marca'];
                $rootScope.modelo[i] = $scope.paquete[i]['insumo_modelo'];
                $scope.caracteristicas[i] = $scope.paquete[i]['insumo_caracteristicas'];
                $scope.descripcion[i] = $scope.paquete[i]['insumo_descripcion'];
                $scope.especificaciones[i] = $scope.paquete[i]['insumo_especificaciones'];
                $scope.cantidadP[i] = $scope.paquete[i]['cantidad'];
                //$scope.costo[i] = $scope.paquete[i]['insumo_costos'];
                //$scope.precio[i] = $scope.paquete[i]['insumo_precio'];
                $scope.tipo_equipo[i] = $scope.paquete[i]['insumo_tipo_equipo'];
                $scope.tipo_cambio[i] = $scope.paquete[i]['insumo_tipo_cambio'];

                $scope.unidad_medida[i] = $scope.paquete[i]['insumo_unidad_medida'];                //$scope.icono[i] = 'view_list';*/
                $rootScope.cotiz[i] = $rootScope.cotExx;
                $scope.estado[i] = $scope.paquete[i]['insumo_estado'];
                $scope.id_pack[i] = $scope.paquete[i]['id_pack'];
                console.log($rootScope.cambio);
                  //$scope.convertirP(i,$scope.paquete[i]['insumo_costos'],$scope.paquete[i]['insumo_tipo_cambio']);
                	$scope.convertirP(i,$scope.paquete[i]['insumo_precio'],$scope.paquete[i]['insumo_costos'],$scope.paquete[i]['insumo_tipo_cambio']);
                  $scope.fechaEntrega($scope.paquete[i]['insumo_bandera_insumo'],$scope.paquete[i]['insumo_marca']);
                j++;  //}
              }//alert($scope.ide+"\t"+$scope.bandera+"\t"+$rootScope.codigo+"\t"+$scope.descripcion+"\t"+$scope.costo+"\t"+$scope.precio);
              $rootScope.contador=j;
            }); //FIN PAQUETESRC
          }
          else{
              $rootScope.ide="";
              $rootScope.bandera="";
              $rootScope.codigo="";
              $rootScope.descripcion="";
              $scope.cantidad=1;
              $rootScope.precio=0;
              $rootScope.costo=0;
              $scope.coti=""; //console.log("ENTRO AL ELSE=OK");
                $rootScope.ide=selec.id;
                $rootScope.bandera_insumo=selec.bandera_insumo;
                $rootScope.codigo_proovedor=selec.codigo_proovedor; //console.log($rootScope.bandera_insumo);
                $rootScope.descripcion=selec.descripcion;           //console.log($rootScope.codigo_proovedor);     
                $rootScope.precio=selec.precio;                     //console.log($rootScope.descripcion);     
                $rootScope.costo=selec.costos;                      //console.log($rootScope.precio);     
                $rootScope.tipo_cambio=selec.tipo_cambio;           //console.log($rootScope.costo);     
                $rootScope.iModelo=selec.modelo;
                $rootScope.iCaracteristicas=selec.caracteristicas;
                $rootScope.iEspecificaciones=selec.especificaciones;
                $rootScope.iUnidad_medida=selec.unidad_medida;
                $rootScope.iEstado=selec.estado;
                $rootScope.tipo_equipo=selec.tipo_equipo;           console.log($rootScope.tipo_cambio);
                $scope.icono="remove";                              //console.log($rootScope.tipo_equipo);     
                $scope.coti=$rootScope.cotExx;  //console.log($scope.cambio);
                $rootScope.iMarca=selec.marca;
                 // $scope.convertir(selec.costos,selec.tipo_cambio);   /////////////////////////////// CONVERTIR TIPO DE DATO
                  $scope.convertir(selec.precio,selec.costos,selec.tipo_cambio);
                  $scope.fechaEntrega(selec.bandera_insumo,selec.marca);
               } //FIN DE ELSE
} //FIN FUNCION SCOPE.EQUIPO

$scope.fechaEntrega = function(bandera,marca){
if(bandera.trim() === "E" || bandera.trim()==="EQUIPO"){                          //console.log($rootScope.bandera_insumo);
  marcaProveedorSrc.get({marca_representada:"*"+marca+"*"},function(data){      //console.log(data.marcas_proveedores.data[0].dias_entrega_maximo);
  $scope.dia = data.marcas_proveedores.data[0];//.dias_entrega_maximo;      //console.log($scope.dia); 
    if($scope.dia != undefined || $scope.dia != null || $scope.dia != ""){    
      $scope.diaMaximo = data.marcas_proveedores.data[0].dias_entrega_maximo;   //console.log($scope.diaMaximo);
        if($scope.diaMaximo>$scope.mayor){
          $scope.mayor=$scope.diaMaximo;
          $rootScope.fecha_entrega = $scope.sumaFecha($scope.mayor,5);//alert($rootScope.fecha_entrega);
        }else{            console.log("es menor");          }
    }
    else{      console.log("VERIFICAR RESULTADO DE CONSULTA");      }
  });
 }  
}

$scope.convertirP = function(i,precio,costo,tipo_cambio){      console.log(i);
	console.log(precio);
	console.log($scope.cambio);
	console.log(tipo_cambio);
if($scope.cambio=="USD"){
  if(tipo_cambio=="JPY"){
             conversionSrc.get({currency_id_from:113,currency_id_to:130},function(data){  //JPY TO MXN
                  $scope.fecha_cambio=data.conversiones[0].validto;                       console.log(data.conversiones[0].validto);
                  alert("!! Se cotizara el tipo de cambio JPY a USD con fecha de actualización: "+$scope.fecha_cambio+ " ¡¡");
                  $scope.multiplyrate=data.conversiones[0].multiplyrate;                  console.log($scope.multiplyrate);
                  $rootScope.precio1=precio*$scope.multiplyrate;                          console.log($rootScope.precio1);
                  $rootScope.costo1=costo*$scope.multiplyrate;                          console.log($rootScope.costo1);
                      conversionSrc.get({currency_id_from:130,currency_id_to:100},function(data){ // MXN TO USD
                      $scope.multiplyrate1=data.conversiones[1].multiplyrate;             console.log($scope.multiplyrate1);
                      $scope.precio[i]=$rootScope.precio1*$scope.multiplyrate1;          console.log($scope.precio);console.log($rootScope.precio);                                     console.log(data.conversiones[0].validto);
                      $scope.costo[i]=$rootScope.costo1*$scope.multiplyrate1;          console.log($scope.costo);console.log($rootScope.precio);   
                    });
                  });    console.log("CONVERTIR JPY A USD");
  }
  if(tipo_cambio=="EUR"){
                 conversionSrc.get({currency_id_from:102,currency_id_to:130},function(data){
                  $scope.fecha_cambio=data.conversiones[0].validto;                               console.log(data.conversiones[0].validto);
                  alert("!! Se cotizara el tipo de cambio EUR a USD con fecha de actualización: "+$scope.fecha_cambio+ " ¡¡");
                  $scope.multiplyrate=data.conversiones[0].multiplyrate;                          console.log($scope.multiplyrate);
                  $rootScope.precio1=precio*$scope.multiplyrate;                                  console.log($scope.precio1);
                  $rootScope.costo1=costo*$scope.multiplyrate;                          console.log($rootScope.precio1);
                      conversionSrc.get({currency_id_from:130,currency_id_to:100},function(data){
                      $scope.multiplyrate1=data.conversiones[1].multiplyrate;                     console.log($scope.multiplyrate1);
                      $scope.precio[i]=$rootScope.precio1*$scope.multiplyrate1;                  console.log($scope.precio);
                      $scope.costo[i]=$rootScope.costo1*$scope.multiplyrate1;          console.log($scope.precio);console.log($rootScope.precio);
                    });
                  });   console.log("CONVERTIR EUR A USD");
  }
  if(tipo_cambio=="MXN"){
                      conversionSrc.get({currency_id_from:130,currency_id_to:100},function(data){
                        $scope.fecha_cambio=data.conversiones[0].validto;                         console.log(data.conversiones[0].validto);
                  alert("!! Se cotizara el tipo de cambio MXN a USD con fecha de actualización: "+$scope.fecha_cambio+ " ¡¡");
                      $scope.multiplyrate1=data.conversiones[1].multiplyrate;                     console.log($scope.multiplyrate1);
                      $scope.precio[i]=precio*$scope.multiplyrate1;                              console.log($scope.precio);
                      $scope.costo[i]=costo*$scope.multiplyrate1;                              console.log($scope.precio);
                    });        console.log("CONVERSION MXN A USD");
      }
  if(tipo_cambio=="USD"){
    $scope.precio[i]=precio;                     console.log("NO ES NECESARIA LA CONVERSION A DOLARES");
    $scope.costo[i]=costo;                     console.log("NO ES NECESARIA LA CONVERSION A DOLARES");
  }
}else
if($scope.cambio=="MXN"){
      if(tipo_cambio=="JPY"){
        conversionSrc.get({currency_id_from:113,currency_id_to:130},function(data){
                        $scope.fecha_cambio=data.conversiones[0].validto; console.log(data.conversiones[0].validto);
                  alert("!! Se cotizara el tipo de cambio JPY a MXN con fecha de actualización: "+$scope.fecha_cambio+ " ¡¡");
                      $scope.multiplyrate1=data.conversiones[0].multiplyrate;console.log($scope.multiplyrate1);
                      $scope.precio[i]=precio*$scope.multiplyrate1;       console.log($scope.precio);
                      $scope.costo[i]=costo*$scope.multiplyrate1;         console.log($scope.precio);
                //      $rootScope.precio=precio*$scope.multiplyrate1;console.log($scope.precio);
                    });        console.log("CONVERSION JPY A PESOS");
      }
      if(tipo_cambio=="EUR"){
        conversionSrc.get({currency_id_from:102,currency_id_to:130},function(data){
                        $scope.fecha_cambio=data.conversiones[0].validto; console.log(data.conversiones[0].validto);
                  alert("!! Se cotizara el tipo de cambio EUR a MXN con fecha de actualización: "+$scope.fecha_cambio+ " ¡¡");
                      $scope.multiplyrate1=data.conversiones[0].multiplyrate;console.log($scope.multiplyrate1);
                      $scope.precio[i]=precio*$scope.multiplyrate1;console.log($scope.precio);
                      $scope.costo[i]=costo*$scope.multiplyrate1;console.log($scope.precio);
                    });        console.log("CONVERSION EUR A PESOS");
      }
      if(tipo_cambio=="USD"){
        conversionSrc.get({currency_id_from:100,currency_id_to:130},function(data){
                        $scope.fecha_cambio=data.conversiones[0].validto; console.log(data.conversiones[0].validto);
                  alert("!! Se cotizara el tipo de cambio USD a MXN con fecha de actualización: "+$scope.fecha_cambio+ " ¡¡");
                      $scope.multiplyrate1=data.conversiones[0].multiplyrate;console.log($scope.multiplyrate1);
                      $scope.precio[i]=precio*$scope.multiplyrate1;console.log($scope.precio);
                      $scope.costo[i]=costo*$scope.multiplyrate1;console.log($scope.precio);
                    });        console.log("CONVERSION USD A PESOS");
      }
      if(tipo_cambio=="MXN"){
        $scope.precio[i]=precio;          console.log("CONVERSION A PESOS");
        $scope.costo[i]=costo;          console.log("CONVERSION A PESOS");
      }
  }  
}

$scope.convertir = function(precio,costo,tipo_cambio){        //console.log(precio);console.log($scope.cambio);console.log(tipo_cambio);
if($scope.cambio=="USD"){
  if(tipo_cambio=="JPY"){
             conversionSrc.get({currency_id_from:113,currency_id_to:130},function(data){  //JPY TO MXN
                  $scope.fecha_cambio=data.conversiones[0].validto;                       console.log(data.conversiones[0].validto);
                  alert("!! Se cotizara el tipo de cambio JPY a USD con fecha de actualización: "+$scope.fecha_cambio+ " ¡¡");
                  $scope.multiplyrate=data.conversiones[0].multiplyrate;                  console.log($scope.multiplyrate);
                  $rootScope.precio1=precio*$scope.multiplyrate;                          console.log($rootScope.precio1);
                  $rootScope.costo1=costo*$scope.multiplyrate;                          console.log($rootScope.precio1);
                      conversionSrc.get({currency_id_from:130,currency_id_to:100},function(data){ // MXN TO USD
                      $scope.multiplyrate1=data.conversiones[1].multiplyrate;             console.log($scope.multiplyrate1);
                      $rootScope.precio=$rootScope.precio1*$scope.multiplyrate1;          console.log($scope.precio);console.log($rootScope.precio);                                     console.log(data.conversiones[0].validto);
                      $rootScope.costo=$rootScope.costo1*$scope.multiplyrate1;          console.log($scope.precio);console.log($rootScope.precio);                                     console.log(data.conversiones[0].validto);
                    });
                  });    console.log("CONVERTIR JPY A USD");
  }
  if(tipo_cambio=="EUR"){
                 conversionSrc.get({currency_id_from:102,currency_id_to:130},function(data){
                  $scope.fecha_cambio=data.conversiones[0].validto;                               console.log(data.conversiones[0].validto);
                  alert("!! Se cotizara el tipo de cambio EUR a USD con fecha de actualización: "+$scope.fecha_cambio+ " ¡¡");
                  $scope.multiplyrate=data.conversiones[0].multiplyrate;                          console.log($scope.multiplyrate);
                  $rootScope.precio1=precio*$scope.multiplyrate;                                  console.log($scope.precio1);
                  $rootScope.costo1=costo*$scope.multiplyrate;                          console.log($rootScope.precio1);
                      conversionSrc.get({currency_id_from:130,currency_id_to:100},function(data){
                      $scope.multiplyrate1=data.conversiones[1].multiplyrate;                     console.log($scope.multiplyrate1);
                      $rootScope.precio=$rootScope.precio1*$scope.multiplyrate1;                  console.log($scope.precio);
                      $rootScope.costo=$rootScope.costo1*$scope.multiplyrate1;          console.log($scope.precio);console.log($rootScope.precio); 
                    });
                  });   console.log("CONVERTIR EUR A USD");
  }
  if(tipo_cambio=="MXN"){
                      conversionSrc.get({currency_id_from:130,currency_id_to:100},function(data){
                        $scope.fecha_cambio=data.conversiones[0].validto;                         console.log(data.conversiones[0].validto);
                  alert("!! Se cotizara el tipo de cambio MXN a USD con fecha de actualización: "+$scope.fecha_cambio+ " ¡¡");
                      $scope.multiplyrate1=data.conversiones[1].multiplyrate;                     console.log($scope.multiplyrate1);
                      $rootScope.precio=precio*$scope.multiplyrate1;                              console.log($scope.precio);
                      $rootScope.costo=costo*$scope.multiplyrate1;                              console.log($scope.precio);
                    });        console.log("CONVERSION MXN A USD");
      }
  if(tipo_cambio=="USD"){
    $rootScope.precio=precio;                     console.log("NO ES NECESARIA LA CONVERSION A DOLARES");
    $rootScope.costo=costo;                     console.log("NO ES NECESARIA LA CONVERSION A DOLARES");
  }
}else
if($scope.cambio=="MXN"){
      if(tipo_cambio=="JPY"){
        conversionSrc.get({currency_id_from:113,currency_id_to:130},function(data){
                        $scope.fecha_cambio=data.conversiones[0].validto; console.log(data.conversiones[0].validto);
                  alert("!! Se cotizara el tipo de cambio JPY a MXN con fecha de actualización: "+$scope.fecha_cambio+ " ¡¡");
                      $scope.multiplyrate1=data.conversiones[0].multiplyrate;console.log($scope.multiplyrate1);
                      $rootScope.precio=precio*$scope.multiplyrate1;console.log($scope.precio);
                      $rootScope.costo=costo*$scope.multiplyrate1;console.log($scope.precio);
                    });        console.log("CONVERSION JPY A PESOS");
      }
      if(tipo_cambio=="EUR"){
        conversionSrc.get({currency_id_from:102,currency_id_to:130},function(data){
                        $scope.fecha_cambio=data.conversiones[0].validto; console.log(data.conversiones[0].validto);
                  alert("!! Se cotizara el tipo de cambio EUR a MXN con fecha de actualización: "+$scope.fecha_cambio+ " ¡¡");
                      $scope.multiplyrate1=data.conversiones[0].multiplyrate;console.log($scope.multiplyrate1);
                      $rootScope.precio=precio*$scope.multiplyrate1;console.log($scope.precio);
                      $rootScope.costo=costo*$scope.multiplyrate1;console.log($scope.precio);
                    });        console.log("CONVERSION EUR A PESOS");
      }
      if(tipo_cambio=="USD"){
        conversionSrc.get({currency_id_from:100,currency_id_to:130},function(data){
                        $scope.fecha_cambio=data.conversiones[0].validto; console.log(data.conversiones[0].validto);
                  alert("!! Se cotizara el tipo de cambio USD a MXN con fecha de actualización: "+$scope.fecha_cambio+ " ¡¡");
                      $scope.multiplyrate1=data.conversiones[0].multiplyrate;console.log($scope.multiplyrate1);
                      $rootScope.precio=precio*$scope.multiplyrate1;console.log($scope.precio);
                      $rootScope.costo=costo*$scope.multiplyrate1;console.log($scope.precio);
                    });        console.log("CONVERSION USD A PESOS");
      }
      if(tipo_cambio=="MXN"){
        $rootScope.precio=precio;          console.log("CONVERSION A PESOS");
        $rootScope.costo=costo;          console.log("CONVERSION A PESOS");
      }
  }  
}

$scope.sumaFecha = function(d,n){
 var Fecha = new Date();
 var sFecha = fecha || (Fecha.getDate() + "-" + (Fecha.getMonth() +1) + "-" + Fecha.getFullYear());
 var sep = sFecha.indexOf('/') != -1 ? '/' : '-'; 
 var aFecha = sFecha.split(sep);
 var fecha = aFecha[2]+'-'+aFecha[1]+'-'+aFecha[0];
 fecha= new Date();
 fecha.setDate(fecha.getDate()+(parseInt(d)+n));
 var anno=fecha.getFullYear();
 var mes= fecha.getMonth();//+1;
 var dia= fecha.getDate();
 var meses = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
 //mes = (mes < 10) ? ("0" + mes) : mes;
 dia = (dia < 10) ? ("0" + dia) : dia;
 var fechaFinal = dia+sep+meses[mes]+sep+anno;
 return (fechaFinal);
 }

    $scope.addTodo =function(){      //    console.log("ENTRO A LA FUNCION ADDTODO");          //console.log($rootScope.primary_qty);
          var k=0;                        //          console.log($scope.unidad_medida);
          if($rootScope.ide === undefined){ alert("¡¡ NO HA REALIZADO NINGUNA BUSQUEDA DE INSUMOS !!");} //OK
          if($scope.id_pack==undefined){  //            alert("INSUMO");
            $rootScope.todos.push({
            ide:$rootScope.ide,
            stk:$rootScope.primary_qty, 
            cantidad:$scope.cantidad,
            codigo:$rootScope.codigo_proovedor,
            modelo:$rootScope.iModelo,
            marca:$rootScope.iMarca,
            descripcion:$rootScope.descripcion,
            caracteristicas:$rootScope.iCaracteristicas,
            especificaciones:$rootScope.iEspecificaciones,
            costo:$rootScope.costo,
            precio:$rootScope.precio,
            tipo_equipo:$rootScope.tipo_equipo,
            tipo_cambio:$scope.cambio,            //tipo_cambio:$rootScope.tipo_cambio,
            icono:$scope.icono,
            bandera_insumo:$rootScope.bandera_insumo,
            total:"",
            cotizacion:$scope.coti,
            done:false,
          });
          }else{          alert('PAQUETE');
          while(k<j){             //INICIO K = 0
            if(k==0){
          $rootScope.todos.push({
            id_pack:$rootScope.id_pack,
            ide:$rootScope.ideEquipo[k],
            bandera_insumo:$rootScope.bandera[k],            //bandera:$rootScope.bandera[k],
            codigo:$rootScope.codigo[k],
            marca:$rootScope.marca[k],
            modelo:$rootScope.modelo[k],           /* stk:$rootScope.primary_qty,*/
            cantidad:$scope.cantidadP[k],
            caracteristicas:$scope.caracteristicas[k],
            descripcion:$scope.descripcion[k],
            especificaciones:$scope.especificaciones[k],
            costo:$scope.costo[k],
            precio:$scope.precio[k],
            tipo_equipo:$scope.tipo_equipo[k],
            tipo_cambio:$scope.cambio,            //tipo_cambio:$scope.tipo_cambio[k],
            unidad_medida:$scope.unidad_medida[k],
            cotizacion:$scope.cotiz[k],
            estado:$scope.estado[k],
            id_pack:$scope.id_pack[k],
            icono:"view_list",
            done:false,
          });
        }else{
          $rootScope.todos.push({
            id_pack:$rootScope.id_pack,
            ide:$rootScope.ideEquipo[k],
            bandera_insumo:$rootScope.bandera[k],
            //bandera:$rootScope.bandera[k],
            codigo:$rootScope.codigo[k],
            marca:$rootScope.marca[k],
            modelo:$rootScope.modelo[k],           /* stk:$rootScope.primary_qty,*/
            cantidad:$scope.cantidadP[k],
            caracteristicas:$scope.caracteristicas[k],
            descripcion:$scope.descripcion[k],
            especificaciones:$scope.especificaciones[k],
            costo:0,
            precio:0,
            tipo_equipo:$scope.tipo_equipo[k],
            tipo_cambio:$scope.cambio,
            unidad_medida:$scope.unidad_medida[k],
            cotizacion:$scope.cotiz[k],
            estado:$scope.estado[k],
            id_pack:$scope.id_pack[k],
            icono:"view_list",
            done:false,
          });
        }
          k++;
        }
        
      } 
          j=0;
          $scope.todoText = "";          //$rootScope.primary_qty="";
        }
        
        $scope.addPacks =function(){          //console.log(this.validaPack());
          if(this.validaPack())
          { 
            if($scope.packs[0]!=undefined)//SI TIENE VALORES
            {          
              if($scope.packs[0].bandera.trim() == $scope.bandera_insumo.trim() && $scope.packs[0].bandera.trim()=="N"){ //SI ES IGUAL AL VALOR A N
                alert("YA EXISTE UN NOMBRE DE PAQUETE, VERIFIQUE DE FAVOR");
                }else
                    { 
                      if($scope.packs[1]!=undefined)//SI TIENE VALORES
                      { 
                        if($scope.packs[1].bandera.trim() == $scope.bandera_insumo.trim() && $scope.packs[1].bandera.trim()=="E"){ //SI ES IGUAL AL VALOR A N
                            alert("YA EXISTE UN EQUIPO, VERIFIQUE DE FAVOR");
                        }else{ //console.log($scope.packs[0].bandera);  //(3)
                              $scope.packs.push({
                              ide:$scope.ide,
                              bandera:$scope.bandera_insumo,
                              stk:$rootScope.primary_qty,
                              cantidad:$scope.cantidad,
                              codigo:$rootScope.codigo_proovedor,
                              descripcion:$scope.descripcion,
                              //costo:$scope.costo,
                              costo:0,
                              precio:0,
                              //precio:$scope.precio,
                              pack:$rootScope.maximo,
                              total:"",
                              done:false,
                              });
                            }
                      } // FIN ELSE
                      else{                                   //(2)
                        $scope.packs.push({
                        ide:$scope.ide,
                        bandera:$scope.bandera_insumo,
                        stk:$rootScope.primary_qty,
                        cantidad:$scope.cantidad,
                        codigo:$rootScope.codigo_proovedor,
                        descripcion:$scope.descripcion,
                        costo:0,
                        //costo:$scope.costo,
                        precio:0,
                        //precio:$scope.precio,
                        pack:$rootScope.maximo,
                        total:"",
                        done:false,
                      });
                      }
                    } //FIN DE ELSE COMPARA NOMBRE PAQUETE
            }else{                          //SI ES =  INDEFINIDO (1)
                  $scope.packs.push({
                        ide:$scope.ide,
                        bandera:$scope.bandera_insumo,
                        stk:$rootScope.primary_qty,
                        cantidad:$scope.cantidad,
                        codigo:$rootScope.codigo_proovedor,
                        descripcion:$scope.descripcion,
                        costo:$scope.costo,
                        precio:$scope.precio,
                        pack:$rootScope.maximo,
                        total:"",
                        done:false,
                      });
            }     //FIN DE INDEFINIDO
                         
           console.log($scope.packs[1]);
           console.log($scope.packs);
            $scope.todoText = "";
            this.validarFrm();

          }                   /// FIN DE VALIDAR PACKS
          else{
            alert("ASEGURESE AGREGAR UN NOMBRE DE PAQUETE PRIMERO");
          }
        }   /////////////////////// FIN DE FUNCION ADDPACKS
        
        $scope.validaPack=function(){
          var val=false;          //console.log($scope.packs[0]);
          if($scope.packs[0]!=undefined)
          {            //console.log($scope.packs[0].bandera.trim());
           if($scope.packs[0].bandera.trim()=="N")
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

        $scope.validarFrm=function(){
          $scope.valido=false;          //console.log("el tamaño es: "+$scope.packs.length);
         if(this.validaPack && $scope.packs.length>=2)
         {
          $scope.valido=true;          //console.log("el form es valido: ");
         }
        }

        $scope.remover=function(j){          //console.log("remver: "+$scope.packs[j]);          /*if($scope.packs[0].bandera.trim()=="N")          {*/
            $scope.packs.splice(j,1);          /*}*/
        }

        $scope.setTotals = function(item){          //
          if (item){            //item.total = (item.cantidad * item.precio)-(item.cantidad * item.costo);
            //item.total = (item.cantidad * item.costo);
            item.total = (item.cantidad * item.precio);
            $scope.subTotal += item.total;                    //console.log(item.total);
            $scope.ivaT  = $scope.subTotal*$scope.iva;        // console.log($scope.iva);
            $scope.totales = ($scope.subTotal+$scope.ivaT);            // console.log($scope.totales);
            $scope.letras=$scope.NumeroALetras($scope.totales,$scope.cambio);//         console.log($scope.letras); console.log($scope.cambio);
          }
        }

        $scope.resetEquipos = function(){
           $rootScope.todos=[];
           $scope.subTotal=0;
           $scope.ivaT=0;
           $scope.totales=0;
        }

        $timeout(function() {
 insumosSrc.get({clave:"*"},function(data){
            $scope.insumos=data['insumos']; //console.log($scope.insumos+"<-INSUMOS"); 
            });
        }, 1000);
}
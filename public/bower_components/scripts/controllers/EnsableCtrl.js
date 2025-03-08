function EnsableCtrl($scope,$controller,insumosSrc,componenteSrc,insumoOpcionalSrc,insumoOpcionalConsultarSrc,ultimoSrc,conversionSrc,condicionFacturaSrc,metodoPagoSrc,condicionPagoTiempoSrc,userSrc,marcaProveedorSrc){
  var self = this;

  $scope.busquedaC={ 
    'vista':1,
    'tipo_equipo':'',
    'codigo_proovedor':'',
    'modelo':'',
    'descripcion':'',
    'marca':'',
    'categoria1':''
  }

  $scope.equipo={        //id:'',
    ide:'',
    tipo_equipo:'',
    modelo:'',        //bandera_equipo:'E',
    equipoOpcion:'E',
    vista:1,
    categoria1:''
  };   

  $scope.cotizacion={
    'numero_cotizacion':'',
    'version':1,
    'tipo_moneda':'',
  };

  $scope.items=[];
  $scope.insumos=[];
  $scope.preciosMultiples=[];
  $scope.mayor=0;
  $scope.subtotal=0;
  $scope.iva=0;
  $scope.total=0;                                                                                                                 /*$scope.subTotal=0;    $scope.ivaT=0;    $scope.totales=0;*/

  $scope.ultimoLst =function(){ $scope.progress=true;console.info("CREAR COTIZACION CCV");
    $scope.ver_guardar=true;
    $scope.ver_update=false;
    $scope.ver_legal=false;
    ultimoSrc.get(function(data){
      var dat= new Date();                                                                                                        console.log(data.ultimo.length);           console.log(data.ultimo[0].auto);           
      $scope.objeto.fecha = moment(dat).format('DD-MM-YYYY');                                                                   //$scope.cotizacion.lugar_centro_costo=$scope.centro_costo;                                         console.log($scope.centro_costo);
      $scope.cotizacion_fecha = moment(dat).format('YYYYMMDD');                                                                   //$scope.cotizacion.lugar_centro_costo=$scope.centro_costo;                                         console.log($scope.centro_costo);
      if(data.ultimo.length == 0 ){    
        $scope.objeto.auto=1;  
        $scope.numero_cotizacion=$scope.iniciales_autor+"-"+$scope.objeto.lugar_centro_costo+"-"+$scope.cotizacion_fecha+"-"+$scope.objeto.auto;
        $scope.objeto.numero_cotizacion=$scope.iniciales_autor+"-"+$scope.objeto.lugar_centro_costo+"-"+$scope.cotizacion_fecha;
      }else{            
            $scope.objeto.auto=parseInt(data.ultimo[0].auto)+1;                                                                   console.log($scope.objeto.auto);                      
            $scope.numero_cotizacion=$scope.iniciales_autor+"-"+$scope.objeto.lugar_centro_costo+"-"+$scope.cotizacion_fecha+"-"+$scope.objeto.auto;    //console.log($scope.ultimo);
            $scope.objeto.numero_cotizacion=$scope.iniciales_autor+"-"+$scope.objeto.lugar_centro_costo+"-"+$scope.cotizacion_fecha;//console.log($scope.ultimo);
      }
      if(data.msg=="Success"){
        $scope.progress=false;
      }
    },function(err){alert('ERROR EN SERVIDOR.');});
  }

$scope.buscarB =function(busquedaC){     
  $scope.progress=true;       
  insumosSrc.get(busquedaC,function(data){
    $scope.insumosB=data.insumos;       
    if(data.msg=="Success"){
      $scope.progress=false;
    }
  },function(err){alert('ERROR EN SERVIDOR.');});
}

$scope.equipos =function(seleccionado){                                                                                           console.log(seleccionado);console.log($scope.moneda_destino);
  //$scope.editar_precios_servicio=false;
  //$scope.ver_precios_servicio=true;
  $scope.moneda_destino=$scope.objeto.tipo_moneda;
  if($scope.moneda_destino=="" || $scope.moneda_destino==undefined){alert("Se requiere seleccionar un tipo de moneda de venta")}else{//console.log($scope.moneda_destino);
    if(seleccionado.cantidad_unidad_compra=="" || seleccionado.cantidad_unidad_compra==undefined){alert("¡¡ FAVOR DE VERIFICAR EL PRODUCTO EN SU ATRIBUTO: unidades por cantidad de compra !!")}else{
      if(confirm("¿Desea agregar el producto seleccionado?")){
        $scope.habilitarBotonCarrito=false;
        $scope.cantidad=1;
        $scope.unidad_medida=seleccionado.unidad_medida;
        $scope.codigo_proovedor=seleccionado.codigo_proovedor;
        $scope.descripcion=seleccionado.descripcion;
        $scope.precioVenta=seleccionado.precio;
        $scope.costo_moneda=$scope.moneda_destino;                                                                                console.log(seleccionado.precios.length);
        $scope.fechaEntrega(seleccionado.bandera_insumo,seleccionado.marca);                                                      console.warn($scope.precioVenta);
        if(seleccionado.precios.length>0){
          var j=0;
          while(j<3){
            if(seleccionado.tipo_cambio == $scope.moneda_destino){                                                                console.log(seleccionado.tipo_cambio +"=="+ $scope.moneda_destino);
              $scope.preciosMultiples.push({etiqueta:seleccionado.precios[j].etiqueta,monto:seleccionado.precios[j].monto});      console.log($scope.preciosMultiples[j]);
            }else{                                                                                                                console.log("entro a conversion ");
                  $scope.getPreciosConversion(seleccionado.precios[j].monto, seleccionado.tipo_cambio, $scope.moneda_destino, seleccionado.precios[j].etiqueta);
            }
            j++;
          }                                                                                                                       //    console.log(copia);
          $scope.seleccionado=seleccionado;
        }else{
              $scope.getPreciosConversion(seleccionado.precio, seleccionado.tipo_cambio, $scope.moneda_destino,"");
              $scope.seleccionado=seleccionado;
        }
      }else{alert("! ACCION CANCELADA ¡")}
    }
  }
}

$scope.editarPrecio=function(indice,seleccionado){console.log(seleccionado)
  if(confirm("¿Desea editar el precio del producto seleccionado?")){
    $scope.remover(indice,seleccionado.precio,seleccionado.cantidad);
    $scope.seleccionado=seleccionado;
    var str=seleccionado.descripcion;
    var n=str.search("NO. SERIE:");                                                                                               console.log(n); //N -1 CUANDO  NO LA ENCUENTRA
    if(n!='-1'){
      var l = str.length;                                                                                                         console.log(l);
      $scope.seleccionado.descripcion=str.substr(0,n-1);                                                                          console.log($scope.seleccionado.descripcion);
      $scope.serie=str.substr(n+10,l);                                                                                            console.log($scope.serie);
    }else{                                                                                      
      $scope.serie="";                                                                                                            console.log($scope.serie);
    }
    $scope.habilitarBotonCarrito=false;
    $scope.cantidad=seleccionado.cantidad;
    $scope.unidad_medida=seleccionado.unidad_venta;
    $scope.seleccionado.unidad_medida=seleccionado.unidad_venta;
    $scope.codigo_proovedor=seleccionado.codigo_proovedor;
    $scope.descripcion=seleccionado.descripcion;
    $scope.precioVenta=seleccionado.precio;
    $scope.costo_moneda=$scope.moneda_destino;
  }else{alert("! ACCION CANCELADA ¡")}
}

$scope.montoSeleccionado=function(monto){                                                                                         console.log(monto);
  $scope.precioVenta=parseFloat(monto).toFixed(2);
}

$scope.agregarCarrito=function(){                                                                                                 console.log($scope.seleccionado);
  if($scope.serie!=undefined){
    if($scope.serie!=''){
      $scope.descripcion=$scope.descripcion+" NO. SERIE: "+$scope.serie;
    }else{  console.log("NO SERIE ESTA VACIO");}
  }else{  console.log("NO SERIE ESTA INDEFINIDO");}                                                                                                   
  var cadena=$scope.precioVenta.toString();                                                                                       console.log(cadena);
  if(cadena.indexOf(',') != -1){
    cadena=cadena.replace(",","");                                                                                                console.warn("index of");
    $scope.precioVenta=parseFloat(cadena);                                                                                        console.warn(cadena);console.warn($scope.precioVenta);
  }                                                                                                                               console.warn($scope.precioVenta);
  $scope.insumos.push({
                id_insumo:$scope.seleccionado.id,             
                cantidad:$scope.cantidad,
                id_paquete:"",
                cantidad_unidad_compra:$scope.seleccionado.cantidad_unidad_compra,
                codigo_proovedor:$scope.seleccionado.codigo_proovedor,
                modelo:$scope.seleccionado.modelo,
                marca:$scope.seleccionado.marca,
                descripcion:$scope.descripcion,
                caracteristicas:$scope.seleccionado.caracteristicas,
                especificaciones:$scope.seleccionado.especificaciones,
                costos:$scope.seleccionado.costos,
                precio:$scope.precioVenta,
                unidad_compra:$scope.seleccionado.unidad_compra,
                unidad_venta:$scope.seleccionado.unidad_medida,
                costo_moneda:$scope.seleccionado.costo_moneda,
                tipo_cambio:$scope.seleccionado.tipo_cambio,
                tipo_equipo:$scope.seleccionado.tipo_equipo,
                bandera_insumo:$scope.seleccionado.bandera_insumo,                             // total:$scope.seleccionado.total,                        //cotizacion:$scope.coti// done:false,
            });
  $scope.vaciarBusqueda();
}

$scope.vaciarLista=function(){
  if(confirm("¿Desea borrar la lista de productos?")){
    $scope.letras="";
    $scope.iva=0;
    $scope.objeto.total=0;
    $scope.objeto.subtotal=0;
    $scope.subtotal=0;
    $scope.iva=0;
    $scope.total=0;
    $scope.cantidad=1;
    $scope.unidad_medida="";
    $scope.codigo_proovedor="";
    $scope.precioVenta=0;
    $scope.costo_moneda=""; 
    $scope.preciosMultiples=[];
    $scope.insumosB=[];
    $scope.insumos=[];
  }else{alert("ACCION CANCELADA");}
}

$scope.vaciarBusqueda=function(){
  $scope.cantidad=1;
  $scope.unidad_medida="";
  $scope.unidad_medida=undefined;
  $scope.serie="";
  $scope.codigo_proovedor="";
  $scope.descripcion="";
  $scope.precioVenta=0;
  $scope.costo_moneda=""; 
  $scope.preciosMultiples=[];
  $scope.insumosB=[];
  $scope.habilitarBotonCarrito=true;
  $scope.serie=undefined;
}

$scope.setTotals = function(item){                                               console.log(JSON.stringify(item));//console.log(item); 
console.log(item.precio);//console.log(parseFloat(item.precio));//   
console.log(item.cantidad);   //console.log($scope.j1);  //console.log($scope.j);
  if(item){                                                                           //item.total = (item.cantidad * item.precio)-(item.cantidad * item.costo);
    item.total = (item.cantidad * item.precio);                                                                                   console.log(item.total);//UPDATE 20160719
    $scope.subtotal += item.total;                                                                                                console.log($scope.subtotal);
    $scope.objeto.subtotal = $scope.subtotal;                                                                                     console.log($scope.objeto.subtotal);
    $scope.iva  = $scope.subtotal*0.16;                                                                                           console.log($scope.iva);
    $scope.objeto.iva  = $scope.iva;                                                                                              console.log($scope.objeto.iva);
    $scope.total = $scope.subtotal+$scope.iva;                                                          console.log($scope.total);
    $scope.objeto.total = $scope.total;
    $scope.letras=$scope.NumeroALetras($scope.total,$scope.moneda_destino);
  } 
}

$scope.remover=function(j,precio,cantidad){                                                                                       console.log(cantidad);
  if(confirm("¿ DESEA ELIMINAR EL INSUMO DE LA LISTA?")){
      var precio=precio*cantidad;
      $scope.objeto.subtotal=$scope.objeto.subtotal-precio;
      var ivad  = precio*0.16;  
      $scope.objeto.iva  =$scope.objeto.iva - ivad;                                                                               console.log(ivad);      console.log(precio);
      var menosTotal=parseFloat(precio) + parseFloat(ivad);                                                                       console.log(menosTotal);
      $scope.objeto.total=$scope.objeto.total-menosTotal;
      $scope.letras=$scope.NumeroALetras($scope.objeto.total,$scope.moneda_destino);
      $scope.insumos.splice(j,1);       
  }else{alert("¡ Accion Cancelada !");}
}

    $scope.fechaEntrega = function(bandera,marca){                                              console.log(bandera+" +"+marca);//if((bandera.trim() === "E" || bandera.trim()==="EQUIPO") || (bandera.trim() === "C" || bandera.trim()==="CONSUMIBLES")){                          //console.log($rootScope.bandera_insumo);
if((bandera.trim() === "E" || bandera.trim()==="EQUIPO")){                                      //console.log($rootScope.bandera_insumo);
  marcaProveedorSrc.get({marca_representada:"*"+marca+"*"},function(data){                      console.log(data);console.log(data.marcas_proveedores.data[0].dias_entrega_maximo);
  $scope.dia = data.marcas_proveedores.data[0];                                                 //.dias_entrega_maximo;      //console.log($scope.dia); 
    if($scope.dia != undefined || $scope.dia != null || $scope.dia != ""){    
      $scope.diaMaximo = data.marcas_proveedores.data[0].dias_entrega_maximo;                   //console.log($scope.diaMaximo);
        if($scope.diaMaximo>$scope.mayor){
          $scope.mayor=$scope.diaMaximo;
          $scope.objeto.fecha_entrega = $scope.sumaFecha($scope.mayor,5);                       //alert($rootScope.fecha_entrega);
        }else{  console.log("es menor");          }
    }
    else{  console.log("VERIFICAR RESULTADO DE CONSULTA");      }
  });
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
 var mes= fecha.getMonth()+1;
 var dia= fecha.getDate();                                                                    // var meses = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
 mes = (mes < 10) ? ("0" + mes) : mes;
 dia = (dia < 10) ? ("0" + dia) : dia;
 var fechaFinal = dia+sep+mes+sep+anno;
 return (fechaFinal);
 }

    self.getEquipos=function(){                                                               //        console.log(x);
           $scope.rutas=[];
           $scope.items=[];
           $scope.seleccion={};
        insumosSrc.get($scope.equipo,function(d){
                $scope.modelos = d.insumos;                                                   //COLOCAR LOS RESULTADOS EN EL SELECT GENERICO con el scope array items
               for( o in d.insumos ){                                                         //                   console.log(d.insumos.data[o].codigo_proovedor);
                   var id=d.insumos[o].id;
                   var bandera_insumo=d.insumos[o].bandera_insumo;
                   var etiqueta=d.insumos[o].codigo_proovedor;
                   var id_pertenece=d.insumos[o].id;
                   var id_insumo=d.insumos[o].id;
                   var id_componente='';                                                     //                   var id_catalogo=d.insumos.data[o].id;
                   $scope.items.push({id:id,
                       bandera_insumo:bandera_insumo,
                       etiqueta:etiqueta,
                       id_pertenece:id_pertenece,
                       id_insumo:id_insumo,
                       id_componente:''
                   });
               }
        },function(){alert('error en peticion')});
        
    }
    $scope.setSeleccion=function(x){                                                        //el item seleccionado se pasa a un nuevo scope para pasarlo a nueva configuracion
      if($scope.objeto.tipo_moneda=="" || $scope.objeto.tipo_moneda==undefined){
        alert("FAVOR DE SELECCIONAR LA MONEDA DE VENTA");
      }else{                                                                                /* $scope.seleccion=x; */console.log(x);
      //$scope.editar_precios_servicio=false;
      //$scope.ver_precios_servicio=true;
      $scope.moneda_destino=$scope.objeto.tipo_moneda;
      insumosSrc.get({ide:x.id_insumo,vista:1},function(d){
                $scope.insumo=d.insumos[0];                                                 console.info(d.insumos);                     //COLOCAR LOS RESULTADOS EN EL SELECT GENERICO con el scope array items
                $scope.fechaEntrega($scope.insumo.bandera_insumo,$scope.insumo.marca);                      
                $scope.cantidad=1;
                $scope.unidad_medida=$scope.insumo.unidad_medida;
                $scope.codigo_proovedor=$scope.insumo.codigo_proovedor;
                $scope.descripcion=$scope.insumo.descripcion;
                $scope.precio=$scope.insumo.precio;
                if($scope.precio==0||$scope.precio==''){
                  var costo=$scope.insumo.costos;
                  if(costo>0||costo!=''){
                    if($scope.insumo.marca=="HITACHI ALOKA"||$scope.insumo.marca=="VILLA"){
                      $scope.precio=parseFloat(costo)+(parseFloat(costo)*0.08)+(parseFloat(costo)*0.06);
                    }else if($scope.insumo.marca=="HITACHI AMERICA"||$scope.insumo.marca=="CODONICS" || $scope.insumo.marca=="HOLOGIC"){
                      var precio=parseFloat(costo)+(parseFloat(costo)*0.05)+(parseFloat(costo)*0.06); console.log($scope.precio);
                    }
                    $scope.getPreciosConversion(precio, $scope.insumo.costo_moneda, $scope.moneda_destino,"");
                    $scope.seleccion=$scope.insumo;
                  }else{
                    alert("FAVOR DE VERIFICAR COSTO DE PRODUCTO");
                  }
                }else{                                                                      //alert("FAVOR DE VERIFICAR PRECIO DE VENTA DE PRODUCTO");
                  }
        },function(){alert('error en peticion')});
      }//FIN ELSE
    }

    $scope.add=function(){
                $scope.insumos.push({
                id_insumo:        $scope.insumo.id,  
                cantidad:         $scope.cantidad,
                id_pack:"",           
                cantidad_unidad_compra:$scope.insumo.cantidad_unidad_compra,
                codigo_proovedor: $scope.insumo.codigo_proovedor,
                modelo:           $scope.insumo.modelo,
                marca:            $scope.insumo.marca,
                descripcion:      $scope.insumo.descripcion,
                caracteristicas:  $scope.insumo.caracteristicas,
                especificaciones: $scope.insumo.especificaciones,
                costos:           $scope.insumo.costos,
                precio:           $scope.precioVenta,
                unidad_compra:    $scope.insumo.unidad_compra,
                unidad_venta:     $scope.insumo.unidad_medida,
                costo_moneda:     $scope.insumo.costo_moneda,
                tipo_cambio:      $scope.insumo.tipo_cambio,
                tipo_equipo:      $scope.insumo.tipo_equipo,
                bandera_insumo:   $scope.insumo.bandera_insumo,                                 // total:$scope.seleccionado.total,                        //cotizacion:$scope.coti// done:false,
            });
    }

    $scope.getSigNivel=function(it){                                                            //obtiene el item seleccionado del select, obtiene su bandera insumo, para ir a buscar el siquiente nivel//        console.log(param);
        var x=self.navegaColoca(it.etiqueta,it.id_insumo,it.id_componente);                     //console.log(x+'<<<<-');
        if(!x){
          self.navegaRetira(it);
        }
        $scope.items=[];
        if(it.bandera_insumo==='E'){                                                            //ir por submodelos en la tabla //            console.log('ir por submodelos');
            insumoOpcionalConsultarSrc.get({id_pertenece:it.id_pertenece},function(d){
                 for( o in d.insumos_opcionales ){                                              //                   console.log(d.insumos.data[o].codigo_proovedor);
                   var id=d.insumos_opcionales[o].id;
                   var bandera_insumo=d.insumos_opcionales[o].insumo_bandera_insumo;
                   var etiqueta=d.insumos_opcionales[o].insumo_descripcion;
                   var id_pertenece=d.insumos_opcionales[o].id_insumo;
                   var id_pertenece=d.insumos_opcionales[o].id_insumo;                          //                   var id_insumo=d.insumos_opcionales[o].id;
                   var id_insumo=d.insumos_opcionales[o].id_insumo;                             //                   var id_catalogo=d.insumos.data[o].id;
                   $scope.items.push({id:id,
                       bandera_insumo:bandera_insumo,
                       etiqueta:etiqueta,
                       id_pertenece:id_pertenece,
                       id_insumo:id_insumo,
                       id_componente:''
                   });
               }
            },function(){alert('ERROR EN SERVIDOR')});
        }else if(it.bandera_insumo=='SUB'){                                                     //TRAER  LOS COMPONENTES RELACIONADOS//            console.log('ir por componentes relacionados');
            self.getComponentes(it.id_pertenece);
        }else if(it.bandera_insumo==='C'){                                                      //TRAER LOS INSUMOS RELACIONADOS
            self.getInsumos(it.id_componente,it.id_pertenece);            
        }else if(it.bandera_insumo==='I'){                                                      //CONSULTAR OTROS INSUMOS//            console.log('CONSULTAR LOS OTROS SUB INSUMOS');
            self.getInsumos('',it.id_pertenece);
        }
    }
    
    self.getComponentes= function(id_pertenece){                                                //console.log(subcategoria);//recibe el id_pertenece
          insumoOpcionalConsultarSrc.get({id_pertenece:id_pertenece,agrupar:"id_componente"},function(d){ //console.log(da);
              for(o in d.insumos_opcionales){
                  var id=d.insumos_opcionales[o].id;
                   var bandera_insumo='C';
                   var etiqueta=d.insumos_opcionales[o].componente;
                   var id_pertenece=d.insumos_opcionales[o].id_pertenece;
                   var id_componente=d.insumos_opcionales[o].id_componente;
                   var id_insumo=d.insumos_opcionales[o].id_pertenece;
                   $scope.items.push({id:id,
                       bandera_insumo:bandera_insumo,
                       etiqueta:etiqueta,
                       id_pertenece:id_pertenece,
                       id_insumo:id_insumo,
                       id_componente:id_componente
                   });
              }
            });
        }

    self.getInsumos =function(id_componente,id_pertenece){                                      //OBTIENE LAS RELACIONES DE LA TABLA INSUMOS RELACIONES
        insumoOpcionalConsultarSrc.get({id_componente:id_componente,id_pertenece:id_pertenece},function(d){ //            $scope.insumos=d.insumos_opcionales;
                for(o in d.insumos_opcionales){
                  var id=d.insumos_opcionales[o].id;
                   var bandera_insumo='I';
                   var etiqueta=d.insumos_opcionales[o].insumo_codigo_proovedor+" Descripción: "+d.insumos_opcionales[o].insumo_descripcion;;
                   var id_pertenece=d.insumos_opcionales[o].id_pertenece;
                   var id_componente=d.insumos_opcionales[o].id_componente;
                   var id_insumo=d.insumos_opcionales[o].id_insumo;
                   $scope.items.push({id:id,
                       bandera_insumo:bandera_insumo,
                       etiqueta:etiqueta,
                       id_pertenece:id_insumo,
                       id_insumo:id_insumo,
                       id_componente:id_componente
                   });
                }
        },function(){alert('ERROR EN SERVIDOR')});
    }

    $scope.getEquipos=function(){
        self.getEquipos();
    }

    $scope.rutas=[];                                                                            //    $scope.prueba="";

    self.navegaColoca=function(etiqueta,pertenece,id_componente){
        var g='';
        var verificar=true;
        var agregar=false;
        var tam_arr=$scope.rutas.length;
        for (var i=0;i<=tam_arr;i++){
            g=g+'fiber_manual_record';
            if(verificar){
              if($scope.rutas[i]!== undefined ){
               if($scope.rutas[i].etiqueta!== etiqueta){                                      //console.log('En: '+i+$scope.rutas[i].etiqueta+'<>'+etiqueta);
                   agregar=true;
               }else{
                   agregar=false;
                   verificar=agregar;                                                        //al entrar aqi, ya no deberia recorrer a buscar etiqueta
               }
              }else if(tam_arr==0){                                                          //                console.log('el tamano del arreglo es cero');
                  agregar=true;                
              }
            }
        }
        if(agregar){
            
            g=g+'label_outline';
            if(i===1){
                var bandera_insumo='E';
                var color='primary';
            }else if(i===2){
                var bandera_insumo='SUB';
                var color='info';
            }else if(i===3){
                var bandera_insumo='C';
                var color='success'
            }else if(i>=4){
                var bandera_insumo='I';
            }
            $scope.rutas.push({
                guion:g,
                id:i,                                                                       //este id es de índice, no id de referencia en la tabla
                id_pertenece:pertenece,
                bandera_insumo:bandera_insumo,
                id_componente:id_componente,
                color:color,
                etiqueta:etiqueta
            });
        }
        return agregar;
    }

    self.navegaRetira=function(ruta){
        var i=ruta.id;
        while (i<$scope.rutas.length){
            $scope.rutas.pop($scope.rutas.length);
        }
    }

    $scope.getPreciosConversion=function(precio,moneda_origen,moneda_destino,etiqueta){            //$scope.convertirP = function(i,precio,etiqueta,costo,tipo_cambio){      console.log(moneda_origen(precio); // console.log(precio); // console.log(moneda_origen); // console.log(moneda_destino); // console.log(etiqueta);
  $scope.preciosMultiples=[];                                                                      //var precio=[];
if(moneda_destino=="USD"){
  if(moneda_origen=="JPY"){
             conversionSrc.get({currency_id_from:113,currency_id_to:130},function(data){                              //JPY TO MXN
                  var fecha_cambio=data.conversiones[0].validto;                                                      console.log(data.conversiones[0].validto);//  alert("!! Se cotizara el tipo de cambio JPY a USD con fecha de actualización: "+fecha_cambio+ " ¡¡");
                  var multiplyrate=data.conversiones[0].multiplyrate;                                                 console.log(multiplyrate);
                  var precio1=precio*multiplyrate;                                                                    console.log(precio1);
                      conversionSrc.get({currency_id_from:130,currency_id_to:100},function(data){                     // MXN TO USD
                      var multiplyrate1=data.conversiones[0].multiplyrate;                                            console.log(multiplyrate1);
                      var pre=precio1*multiplyrate1;                                                                  console.log(pre);
                    if(etiqueta!=""){                                                                                 
                      $scope.preciosMultiples.push({
                        etiqueta:etiqueta,
                        monto:pre
                      });}else{                                                                                       console.log("1 precio");
                      $scope.precioVenta=pre;                                                                         console.log(pre);
                      }
                    });
                  });                                                                                                 console.log("CONVERTIR JPY A USD");
  }
  if(moneda_origen=="EUR"){
                 conversionSrc.get({currency_id_from:102,currency_id_to:130},function(data){
                  var fecha_cambio=data.conversiones[0].validto;                                                      console.log(data.conversiones[0].validto);// alert("!! Se cotizara el tipo de cambio EUR a USD con fecha de actualización: "+fecha_cambio+ " ¡¡");
                  var multiplyrate=data.conversiones[0].multiplyrate;                                                 console.log(multiplyrate);
                  var precio1=precio*$scope.multiplyrate;                                                             console.log(precio1);
                      conversionSrc.get({currency_id_from:130,currency_id_to:100},function(data){
                      var multiplyrate1=data.conversiones[1].multiplyrate;                                            console.log(multiplyrate1);
                      var pre=precio1*multiplyrate1;  
                      if(etiqueta!=""){                                                               
                      $scope.preciosMultiples.push({
                        etiqueta:etiqueta,
                        monto:pre
                      });}else{                                                                                       console.log("1 precio");
                      $scope.precioVenta=pre;                                                                         console.log(pre);
                      }
                    });
                  });                                                                                                 console.log("CONVERTIR EUR A USD");
  }
  if(moneda_origen=="MXN"){$scope.progress=true;
                      conversionSrc.get({currency_id_from:130,currency_id_to:100},function(data){
                        var fecha_cambio=data.conversiones[0].validto;                                                console.log(data.conversiones[0].validto);                       // alert("!! Se cotizara el tipo de cambio MXN a USD con fecha de actualización: "+fecha_cambio+ " ¡¡");
                      var multiplyrate1=data.conversiones[0].multiplyrate;                                            console.log(multiplyrate1);
                      var pre=precio*multiplyrate1;  
                      if(etiqueta!=""){                                                               
                        $scope.preciosMultiples.push({etiqueta:etiqueta,monto:pre});
                      }else{console.log("1 precio");
                      $scope.precioVenta=pre;                                                                         console.log(pre);
                      }   
                      if(data.msg=="Success"){
            $scope.progress=false;
          }                                                                                                           console.log(preciosMultiples);
                    });                                                                                               console.log("CONVERSION MXN A USD");
      }
  if(moneda_origen=="USD"){                                                                                           console.log("NO ES NECESARIA LA CONVERSION A DOLARES");                                // console.log(precio); console.log(etiqueta); console.log(i); 
       if(etiqueta!=""){                                                                                              console.log("Multiples precios");                                                                                 
                      }else{                                                                                          console.log("1 precio");
                        $scope.precioVenta=precio;                                                                    console.log(precio);
                      }
  }
}else
if(moneda_destino=="MXN"){
      if(moneda_origen=="JPY"){
        conversionSrc.get({currency_id_from:113,currency_id_to:130},function(data){
                        $scope.fecha_cambio=data.conversiones[0].validto;                                             console.log(data.conversiones[0].validto);//alert("!! Se cotizara el tipo de cambio JPY a MXN con fecha de actualización: "+$scope.fecha_cambio+ " ¡¡");
                      var multiplyrate1=data.conversiones[0].multiplyrate;                                            console.log(multiplyrate1);
                       var pre=precio*$scope.multiplyrate1;                                                           console.log(precio);
                       if(etiqueta!=""){                                                               
                      $scope.preciosMultiples.push({
                        etiqueta:etiqueta,
                        monto:pre
                      });}else{                                                                                       console.log("1 precio");
                      $scope.precioVenta=pre;                                                                         console.log(pre);
                      }
                    });                                                                                               console.log("CONVERSION JPY A PESOS");
      }
      if(moneda_origen=="EUR"){
        conversionSrc.get({currency_id_from:102,currency_id_to:130},function(data){
                        var fecha_cambio=data.conversiones[0].validto;                                                console.log(data.conversiones[0].validto);//  alert("!! Se cotizara el tipo de cambio EUR a MXN con fecha de actualización: "+fecha_cambio+ " ¡¡");
                      var multiplyrate1=data.conversiones[0].multiplyrate;                                            console.log(multiplyrate1);
                      var pre=precio*multiplyrate1;                                                                   console.log(pre);
                      if(etiqueta!=""){                                                               
                      $scope.preciosMultiples.push({
                        etiqueta:etiqueta,
                        monto:pre
                      });}else{                                                                                       console.log("1 precio");
                      $scope.precioVenta=pre;                                                                         console.log(pre);
                      }
                    });                                                                                               console.log("CONVERSION EUR A PESOS");
      }
      if(moneda_origen=="USD"){$scope.progress=true;                                                                  console.log("CONVERSION USD A PESOS");
        conversionSrc.get({currency_id_from:100,currency_id_to:130},function(data){                                   console.log(data);console.log(precio);
                        var fecha_cambio=data.conversiones[0].validto;                                                console.log(data.conversiones[0].validto);//  //   alert("!! Se cotizara el tipo de cambio USD a MXN con fecha de actualización: "+fecha_cambio+ " ¡¡");
                      var multiplyrate1=data.conversiones[0].multiplyrate;                                            console.log(multiplyrate1);
                      var pre=precio*multiplyrate1;                                                                   console.log(pre);                                                
                      if(etiqueta!=""){                                                               
                      $scope.preciosMultiples.push({
                        etiqueta:etiqueta,
                        monto:pre
                      });}else{                                                                                       console.log("1 precio");
                      $scope.precioVenta=pre;                                                                         console.log(pre);
                      }                                                                                               console.log($scope.preciosMultiples);
                      if(data.msg=="Success"){
            $scope.progress=false;
          }            
                    });                                                                                              //console.log("CONVERSION USD A PESOS");
      }
      if(moneda_origen=="MXN"){
                      if(etiqueta!=""){                                                                               console.log("Multiples precios");                                                         
                      }else{                                                                                          console.log("1 precio");
                        $scope.precioVenta=precio;                                                                    console.log(precio);
                      }                                                                                               console.log("CONVERSION A PESOS");
      }
  }  //fin de ELSE
    //return 
  }//fin function getPreciosMultiples
  $scope.condicion_factura=function(){$scope.progress=true;
  condicionFacturaSrc.get({valor:"*"},function(data){
    $scope.condiciones_facturacion=data.condiciones_facturacion;                                                      //console.log(data); ok
    if(data.msg=="Success"){
            $scope.progress=false;
          }
  });
}

$scope.metodo_pago=function(){$scope.progress=true;
metodoPagoSrc.get({fin_paymentmethod_id:"*"},function(data){
$scope.metodos_pagos=data.metodos_pago;
if(data.msg=="Success"){
            $scope.progress=false;
          }
});
}

$scope.condicion_tiempo_pago=function(){$scope.progress=true;
condicionPagoTiempoSrc.get({name:"*"},function(data){
  $scope.tiempos_pago=data.condiciones_pago_tiempo;                                                       //  console.log(data);
  if(data.msg=="Success"){
            $scope.progress=false;
          }
  });
}

$scope.getUsuarios=function(){
  userSrc.get({vista:1,name:"*",puesto:'*VENTAS*'},function(data){ 
    $scope.usuarios=data.users;                                                                           //  console.log(data);
          },function(err){alert('ERROR EN SERVIDOR.');});
}

$scope.ver_condiciones_ventas=function(){
              $scope.condicion_reporte=false;
              $scope.condicion_anticipo=true;
              $scope.condicion_precio=true;
              $scope.condicion_tiempo_entrega=true;
              $scope.condicion_pago=true;
              $scope.condicion_guia_mecanica=true;
              $scope.condicion_garantia=true;
              $scope.condicion_capacitacion=true;
              $scope.condicion_vigencia=true;
}

$scope.ver_condiciones_consumibles=function(){
              $scope.condicion_reporte=false;
              $scope.condicion_anticipo=false;
              $scope.condicion_precio=false;
              $scope.condicion_tiempo_entrega=true;
              $scope.condicion_pago=true;
              $scope.condicion_guia_mecanica=false;
              $scope.condicion_garantia=false;
              $scope.condicion_capacitacion=false;
              $scope.condicion_vigencia=true;
}

$scope.ver_condiciones_servicio=function(){
              $scope.condicion_reporte=false;
              $scope.condicion_anticipo=false;
              $scope.condicion_precio=false;
              $scope.condicion_tiempo_entrega=true;
              $scope.condicion_pago=true;
              $scope.condicion_guia_mecanica=false;
              $scope.condicion_garantia=false;
              $scope.condicion_capacitacion=false;
              $scope.condicion_vigencia=true;
}

$scope.condiciones_consumibles=function(){ //console.log($scope.agente);
$scope.mensaje_atencion="CON RELACION A SU SOLICITUD NOS PERMITIMOS PRESENTAR LA SIGUIENTE INFORMACIÓN.";
$scope.nota="FAVOR DE ENVIAR SU PEDIDO, COMPROBANTE DE PAGO Y DATOS FISCALES PARA SU FACTURACION CORRESPONDIENTE AL CORREO "+$scope.email;
$scope.tiempo_entrega="1-2 DIAS HABILES A PARTIR DE LA FECHA EN QUE SE REALICE SU PEDIDO Y SE CONFIRME SU PAGO. \nENTREGA INMEDIATA";
$scope.pago="DEPOSITO O TRANSFERENCIA DEL 100% A FAVOR DE SUMINISTRO PARA USO MEDICO Y HOSPITALARIO S.A. DE C.V.\n30 DIAS DE CREDITO. ";
$scope.validez="ESTA COTIZACION TIENE VIGENCIA DE 15 (QUINCE) DIAS A PARTIR DE LA FECHA EN QUE LA RECIBA.\nESTA COTIZACION TIENE VIGENCIA HASTA NUEVO AVISO POR ESCRITO.";
}

$scope.condiciones_ventas=function(){

}

$scope.condiciones_servicio=function(){

}

$scope.condiciones_ims=function(){
  $scope.mensaje_atencion="Con relacion a su amable solicitud, nos permitimos presentar a su consideracion, la siguiente información.";
  $scope.nota="";
  $scope.precio="Los precios cotizados estan en dólares americanos y se convertiran a moneda nacional segun el tipo de cambio Banamex venta, del dia de pago.";
  $scope.tiempo_entrega="30 a 90 dias bajo existencias";
  $scope.pago="* Contado.";
  $scope.garantia="Tres (3) años en partes y mano de obra contra cualquier problema de instalación y/o manufactura a partir de la fecha de instalación. Esta garantía, para equipos de pequeñas dimensiones, se entiende en nuestros talleres de la Ciudad de México";
  $scope.validez="La vigencia de esta cotización sera de quince dias a partir de la fecha de la presente, vencido dicho plazo deberá solicitarse confirmación.";
}

}
'use strict';
angular.module('cotizacionApp')
.controller('NumeroAletraCtrl',function ($scope,$filter,productVSrc,unidadMedidaSrc,categoriaProductoSrc,taxVsrc,orgVsrc,metodoPagoSrc,centroCostoSrc,tipoTransaccionSrc,metodoEnvioSrc,condicionPagoTiempoSrc,condicionFacturaSrc,tipoAlmacenSrc,proyUserSrc,tipoMonedaSrc,agenteAduanalSrc,insumosSrc){
  $scope.goCats = false;
  $scope.dia=[];
  $scope.obj=[];

  $scope.getOrganizaciones=function(){  
    orgVsrc.get({name:"*"},function(data){
      $scope.organizaciones=data.objetos;                                                                       //    console.log(data);
    });
  } 

  $scope.metodoPago=function(){                                                             //console.error($scope.metodos_pago);// ad_org_id=0
    metodoPagoSrc.get({'ad_org_id':'0'},function(d){                                        console.info(d.metodos_pago);////$scope.metodos_pago=d.metodos_pago;                       //console.info($scope.metodos_pago);
      $scope.metodos_pago=d.metodos_pago;
    });
  }

  $scope.getMetodoPagoName=function(id,name){                                              //console.error($scope.metodos_pago);// ad_org_id=0
    metodoPagoSrc.get({ad_org_id:'0',fin_paymentmethod_id:id,name:name},function(d){        console.info(d.metodos_pago[0]);////$scope.metodos_pago=d.metodos_pago;                       //console.info($scope.metodos_pago);
      $scope.compra_venta.name_metodo_pago=d.metodos_pago[0].name;                          console.log($scope.compra_venta.name_metodo_pago);
    });
  }

  $scope.getTipoMoneda=function(ad_org_id,name,m_pricelist_id,c_currency_id){
    tipoMonedaSrc.get({'ad_org_id':ad_org_id,name:name,'c_currency_id':c_currency_id,'m_pricelist_id':m_pricelist_id},function(d){
      $scope.tipos_moneda=d.tipos_moneda;
    });
  }

  $scope.getCentroCosto=function(org_id){
    centroCostoSrc.get({'ad_org_id':org_id},function(d){
      $scope.centros_costos=d.objetos;
    },function(e){alert('Error: '+e.status+' : '+ e.data);});
  }

  $scope.getUser=function(org_id){                                                      
    proyUserSrc.get({ad_org_id:org_id,name:'*Fabiola*'},function(data){
      $scope.usuarios=data.objetos;
    });
  }

  $scope.getGerenteName=function(org_id,id){                                                      
    proyUserSrc.get({ad_org_id:org_id,ad_user_id:id},function(data){                        console.info(data);
      $scope.compra_venta.name_gerente=data.objetos[0].name;                                console.info($scope.compra_venta.name_gerente);
    });
  }

  $scope.tiposTransaccion=function(b,org_id){
    tipoTransaccionSrc.get({'ad_org_id':org_id,'issotrx':b},function(d){
      $scope.tipos_transaccion=d.tipos_transaccion;
    },function(e){alert('ERROR AL CONSULTAR TIPOS TRANSACCIONES');});
  }

  $scope.get_tax_id=function(tipo){
    taxVsrc.get({name:"*",tipo_de_orden:tipo},function(data){
      $scope.impuestos=data.objetos;                                                        //console.log(data.objetos);            //$scope.cargado=true
    },function(err){alert('ERROR EN SERVIDOR.');});
  }

  $scope.getTaxId=function(iva,tipo_orden){                                                 //ad_org_id=0                 //console.log(etiqueta);
    taxVsrc.get({name:iva,tipo_de_orden:tipo_orden},function(data){
      $scope.tax_id=data.objetos[0].c_tax_id;                                               //console.log(data.objetos[0].c_tax_id);
    },function(err){alert('ERROR EN SERVIDOR.');});
  }

  $scope.categoria_producto=function(name){                                                 //alert("FACTURACION CONDICIONES");
    categoriaProductoSrc.get({name:name,isactive:"Y"},function(data){
      $scope.categorias=data.categoriaProductos;                                            console.log(data);   //ok    //console.info($scope.condiciones_facturacion.length);
    });
  }

  $scope.setCategoria_producto=function(name){                                                //alert("FACTURACION CONDICIONES");
    categoriaProductoSrc.get({name:name,isactive:"Y"},function(data){
      $scope.categoria=data.categoriaProductos[0].m_product_category_id;                      //console.log(data);   //ok    //console.info($scope.condiciones_facturacion.length);
    });
  }

  $scope.getProductos=function(value){
    productVSrc.get({value:value},function(data){
      $scope.productos=data.objetos;                                                        //console.log($scope.insumos+"<-INSUMOS"); 
      $scope.total=data.objetos.length;                                                     console.log(data.objetos.length); 
    });
  }

  $scope.getUnidades=function(tipo,value){
    unidadMedidaSrc.get({p_codigo_edi:tipo,p_name:"*"+value+"*"},function(data){
            $scope.unidad=data.objetos;                                                     console.log(data); 
            $scope.total=data.objetos.length;                                               console.log(data.objetos.length); 
    });
  }

  $scope.condicionTiempoPago=function(){                                                    // ad_org_id=0
    condicionPagoTiempoSrc.get({name:"*"},function(data){
      $scope.tiempos_pago=data.condiciones_pago_tiempo;                                     //console.info($scope.tiempos_pago);
    });
  }

  $scope.getCondicionPagoName=function(id,name){                                           // ad_org_id=0
    condicionPagoTiempoSrc.get({c_paymentterm_id:id,name:name},function(data){             console.log(data); 
      $scope.compra_venta.name_condicion_pago=data.condiciones_pago_tiempo[0].name;        console.info($scope.compra_venta.name_condicion_pago);
    });
  }

  $scope.getTipoAlmacen=function(org_id){
    $scope.tipos_almacen=tipoAlmacenSrc.get({'ad_org_id':org_id},function(d){
    },function(e){alert('CODE ERROR: '+e.status+' MSG '+e.data);});
  }

  $scope.getMetodoEnvio=function(id,name){                                                 //ad_org_id=0
    metodoEnvioSrc.get({m_shipper_id:id,name:name},function(data){
      $scope.metodos_envio=data.metodos_envio;
    },function(err){alert('ERROR EN SERVIDOR.');});
  }

  $scope.getTipoEnvioName=function(id,name){                                                //ad_org_id=0
    metodoEnvioSrc.get({m_shipper_id:id,name:name},function(data){                          console.log(data); 
     $scope.compra_venta.name_metodo_envio=data.metodos_envio[0].name;                      console.log($scope.compra_venta.name_metodo_envio);                         
     //$scope.objeto.name_metodo_envio=data.metodos_envio[0].name;                                              
    },function(err){alert('ERROR EN SERVIDOR.');});
  }

  $scope.getCondicionFactura=function(){                                                    //ad_org_id=0
    condicionFacturaSrc.get({},function(d){
      $scope.condiciones_facturacion=d.condiciones_facturacion;                             //console.info($scope.condiciones_facturacion);
    });
  }

  $scope.getCondicionFacturaName=function(valor,desc){                                                    //ad_org_id=0
    condicionFacturaSrc.get({valor:valor,descripcion:desc},function(d){                     console.info(d);
      $scope.compra_venta.name_facturacion=d.condiciones_facturacion[0].descripcion;         console.info($scope.compra_venta.name_facturacion);
    });
  }

  $scope.getMarcas=function(){
    marcaProveedorSrc.get({},function(d){
      $scope.marcas_proveedores=d.marcas_proveedores.data;
    },function(e){alert('Error: '+e.status+' '+e.data);});
  }

  $scope.getFolio=function(organizacion){
    compraSrc.get({folio:'1',org_name:organizacion},function(r){
      $scope.compra_venta.folio=r.folio;
    },function(err){alert('ERROR AL OBTENER NUMERO DE FOLIO')});
  }

  $scope.agenteLst=function(nombre){                                                    //console.log(nombre);
    agenteAduanalSrc.get({agente_aduanal:"*"+nombre+"*"},function(data){                //console.log(data);
      $scope.agentes=data.agentes;
    },function(err){alert('ERROR EN SERVIDOR.');});
  }

  $scope.buscarB =function(busquedaC){
    insumosSrc.get(busquedaC,function(data){
      $scope.insumosB=data.insumos;                                                         //console.log($scope.insumos);
    },function(err){alert('ERROR EN SERVIDOR.');});
  }

  $scope.checkVigencia=function(fec_v){ console.info(fec_v);//alert(fec_v);
    var fecha=fec_v.split("-");
    fecha = fecha[2]+"-"+fecha[1]+"-"+fecha[0];
    var hoy= new Date(); 
    hoy =moment(hoy).format('YYYY-MM-DD');                                                  console.log(hoy);
    var fec_h = new Date(hoy);                                                              console.log(fec_h);
    var fec_v = new Date(fecha);                                                            console.log(fec_v);
    if(fec_h>fec_v){                                                                        console.log("VENCIDA");
      $scope.m="VENCIDA";
    }else{                                                                                  console.log("VIGENTE");
      //$scope.m="VIGENTE";
    }
  }
  
  $scope.diferenciaDias=function(f1,f2){                                                    console.info(f1);console.info(f2);
    var fechaInicio = new Date(f1).getTime();
    var fechaFin    = new Date(f2).getTime();
    $scope.di = fechaFin - fechaInicio;                                                     //console.log($scope.diff/(1000*60*60*24) );
    //$scope.di=$scope.diff/(1000*60*60*24);                                                //console.log($scope.diff);
    //$scope.di=$filter('number')($scope.dif, 0);                                           console.log($scope.di);
    var i=0;
    $scope.td='';
    while(i<$scope.di){
      $scope.td='<td bgcolor="#00cc00" align="center">.</td>';                              console.log($scope.td);
      i++;
    }
  }

  $scope.validaEntero=function(numero){                                                     console.log("ENTRO A VALIDAR NUMERO");
    if (isNaN(numero)){
      alert ("¡¡ FAVOR DE VERIFICAR: " + numero + " NO ES UN NÚMERO !!");
    }else{
      if (numero % 1 == 0) {                                                                //alert ("Es un numero entero");
      }else{
        alert ("¡¡ NO ES UN NUMERO VALIDO, FAVOR DE VERIFICAR !!");
        $scope.cantidad=0;
      }
    }
  }

  $scope.validaNumero=function(numero){                                                     console.log("ENTRO A VALIDAR NUMERO");
    if (isNaN(numero)){
      alert ("¡¡ FAVOR DE VERIFICAR: " + numero + " NO ES UN NÚMERO !!");
    }
  }

////////////////////////////////////////////////////////////////////////////////////           
var dias = ["Domingo","Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"];

$scope.diaSemana=function(fecha){                                                           //console.log(fecha);
  var x = new Date(fecha);
  var dia=dias[x.getDay()];                                                                 //console.log(dia);
  $scope.dia.push(dia);                                                                     //console.log($scope.dia);
}

////////////////////////////////////////////////////////////////////////////////////           VALIDAR MONEDA
$scope.validarMonedaExa=function(moneda,tipo){
if(tipo=='c'){
if(moneda=='C41130E41757417FBF2E069AB5F800A2'){
  var tmoneda='MXN';
}
if(moneda=='2017143AC5064EDEB1B19794AF36590B'){
  var tmoneda='USD';
}
if(moneda=='1D2CBBFB0407443B9200D65893C5FD8C'){
  var tmoneda='EUR';
}
if(moneda=='F980D1566FC742DF82BBA1E4F73D8C91'){
  var tmoneda='JPY';
}
if(moneda=='8120C087E88845989D6DFF071C6BCB51'){
  var tmoneda='GBP';
}
}else{
 if(moneda=='EA1310CB1C4340A89CB65361552A0339'){
  var tmoneda='MXN';
}
if(moneda=='36B40DA2AA6849EDA021B07888D7E627'){
  var tmoneda='USD';
}
if(moneda==''){
  var tmoneda='EUR';
}
if(moneda=='15443D97A298449E943F8749F1F89FB0'){
  var tmoneda='JPY';
}
if(moneda==''){
  var tmoneda='GBP';
}
}
return tmoneda;
}
////////////////////////////////////////////////////////////////////////////////////           CONVERTIR NUMERO A LETRA
  $scope.Unidades=function(num){
    switch(num){
      case 1: return "UN";
      case 2: return "DOS";
      case 3: return "TRES";
      case 4: return "CUATRO";
      case 5: return "CINCO";
      case 6: return "SEIS";
      case 7: return "SIETE";
      case 8: return "OCHO";
      case 9: return "NUEVE";
    }
    return "";
  }

$scope.Decenas=function(num){
  var decena = Math.floor(num/10);
  var unidad = num - (decena * 10);
  switch(decena)
  {
    case 1:   
      switch(unidad)
      {
        case 0: return "DIEZ";
        case 1: return "ONCE";
        case 2: return "DOCE";
        case 3: return "TRECE";
        case 4: return "CATORCE";
        case 5: return "QUINCE";
        default: return "DIECI" + $scope.Unidades(unidad);
      }
    case 2:
      switch(unidad)
      {
        case 0: return "VEINTE";
        default: return "VEINTI" + $scope.Unidades(unidad);
      }
    case 3: return $scope.DecenasY("TREINTA", unidad);
    case 4: return $scope.DecenasY("CUARENTA", unidad);
    case 5: return $scope.DecenasY("CINCUENTA", unidad);
    case 6: return $scope.DecenasY("SESENTA", unidad);
    case 7: return $scope.DecenasY("SETENTA", unidad);
    case 8: return $scope.DecenasY("OCHENTA", unidad);
    case 9: return $scope.DecenasY("NOVENTA", unidad);
    case 0: return $scope.Unidades(unidad);
  }
}//Decenas()

$scope.DecenasY=function(strSin, numUnidades){
  if (numUnidades > 0)
    return strSin + " Y " + $scope.Unidades(numUnidades)
  return strSin;
}//DecenasY()

$scope.Centenas=function(num){
  var  centenas = Math.floor(num / 100);
  var decenas = num - (centenas * 100);
  switch(centenas)
  {
    case 1:
      if (decenas > 0)
        return "CIENTO " + $scope.Decenas(decenas);
      return "CIEN";
    case 2: return "DOSCIENTOS " + $scope.Decenas(decenas);
    case 3: return "TRESCIENTOS " + $scope.Decenas(decenas);
    case 4: return "CUATROCIENTOS " + $scope.Decenas(decenas);
    case 5: return "QUINIENTOS " + $scope.Decenas(decenas);
    case 6: return "SEISCIENTOS " + $scope.Decenas(decenas);
    case 7: return "SETECIENTOS " + $scope.Decenas(decenas);
    case 8: return "OCHOCIENTOS " + $scope.Decenas(decenas);
    case 9: return "NOVECIENTOS " + $scope.Decenas(decenas);
  }
  return $scope.Decenas(decenas);
}//Centenas()

$scope.Seccion=function(num, divisor, strSingular, strPlural){
  var cientos = Math.floor(num / divisor)
  var resto = num - (cientos * divisor)
  var letras = "";
  if (cientos > 0)
    if (cientos > 1)
      letras = $scope.Centenas(cientos) + " " + strPlural;
    else
      letras = strSingular;
  if (resto > 0)
    letras += "";
  return letras;
}//Seccion()

$scope.Miles=function(num){
  var divisor = 1000;
  var cientos = Math.floor(num / divisor)
  var resto = num - (cientos * divisor)
  var strMiles = $scope.Seccion(num, divisor, "UN MIL", "MIL");
  var strCentenas = $scope.Centenas(resto);
  if(strMiles == "")
    return strCentenas;
  return strMiles + " " + strCentenas;
  //return Seccion(num, divisor, "UN MIL", "MIL") + " " + Centenas(resto);
}//Miles()

$scope.Millones=function(num){
  var divisor = 1000000;
  var cientos = Math.floor(num / divisor)
  var resto = num - (cientos * divisor)
  var strMillones = $scope.Seccion(num, divisor, "UN MILLON", "MILLONES");
  var strMiles = $scope.Miles(resto);
  if(strMillones == "")
    return strMiles;
  return strMillones + " " + strMiles;
  //return Seccion(num, divisor, "UN MILLON", "MILLONES") + " " + Miles(resto);
}//Millones()

$scope.NumeroALetras=function(num,cambio){                                                                console.log(cambio);
if(cambio=="USD"){
  var data = {
    numero: num,
    enteros: Math.floor(num),
    centavos: (((Math.round(num * 100)) - (Math.floor(num) * 100))),
    letrasCentavos: "",
    letrasMonedaPlural: "DOLARES",
    letrasMonedaSingular: "DOLAR"
  };
  if (data.centavos > 0)
//    data.letrasCentavos = "" + data.centavos + "/100 M.N.";
    {data.letrasCentavos = "" + data.centavos + "/100 USD";}
else{data.letrasCentavos = "00/100 USD";}
  if(data.enteros == 0)
    return "CERO " + data.letrasMonedaPlural + " " + data.letrasCentavos;
  if (data.enteros == 1)
    return $scope.Millones(data.enteros) + " " + data.letrasMonedaSingular + " " + data.letrasCentavos;
  else
    return $scope.Millones(data.enteros) + " " + data.letrasMonedaPlural + " " + data.letrasCentavos;

}
else if(cambio=="MXN"){

  var data = {
    numero: num,
    enteros: Math.floor(num),
    centavos: (((Math.round(num * 100)) - (Math.floor(num) * 100))),
    letrasCentavos: "",
    letrasMonedaPlural: "PESOS",
    letrasMonedaSingular: "PESO"
  };
  if (data.centavos > 0)
//    data.letrasCentavos = "" + data.centavos + "/100 M.N.";
    {data.letrasCentavos = "" + data.centavos + "/100 M.N.";}
else{data.letrasCentavos = "00/100 M.N.";}
  if(data.enteros == 0)
    return "CERO " + data.letrasMonedaPlural + " " + data.letrasCentavos;
  if (data.enteros == 1)
    return $scope.Millones(data.enteros) + " " + data.letrasMonedaSingular + " " + data.letrasCentavos;
  else
    return $scope.Millones(data.enteros) + " " + data.letrasMonedaPlural + " " + data.letrasCentavos;
  }
  else if(cambio=="" || cambio===undefined){
    var data = {
    numero: num,
    enteros: Math.floor(num),
    centavos: (((Math.round(num * 100)) - (Math.floor(num) * 100))),
    letrasCentavos: "",
    letrasMonedaPlural: "PESOS",
    letrasMonedaSingular: "PESO"
  };
  if (data.centavos > 0)
//    data.letrasCentavos = "" + data.centavos + "/100 M.N.";
    {data.letrasCentavos = "";}
else{data.letrasCentavos = "";}
  if(data.enteros == 0)
    return "CERO ";
  if (data.enteros == 1)
    return $scope.Millones(data.enteros);
  else
    return $scope.Millones(data.enteros);
  }


}//NumeroALetras()

///////////////////////////////////////////////////////////////////////////////////////////////////////     FIN NUMERO A LETRAS
})
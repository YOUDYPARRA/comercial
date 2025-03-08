function ContratoCompraVentaFnCtrl($filter,$controller,$timeout,$location,$scope,contratosCompraVentaSrc,cotizacionPaqueteInsumoSrc,orgVsrc){
    $scope.objeto={
        'id':"",
        'id_cotizacion':"",
        'anexo':"",
        'iniciales_asignado':"",
        'cotizacion':"",
        'contraentrega':"",
        'tipo_cambio':"",
        'financiamiento':"",
        'organizacion':'',
        'numero_contrato_compra_venta':'',
        'identificacion':"",
        'numero':"",
        'numero_escritura_publica':"",
        'numero_poder':"",
        'notario':"",
        'notario1':"",
        'ciudad':"",
        'ciudad1':"",
        'aclaracion_dato_comprador':'',
        'leyenda_equipo':'',
        'acuerdo_equipo':'',
        'condicion_pago':'',
        'fecha':"",
        'mensualidad':'',
        'garantia':"",
        'entrega':"",
        'enganche':"",
        'pagare':"",
        'subtotal':0,
        'iva':0,
        'total':0,
        'financiamiento':'',
        'forma_pago':"",
        'aclaracion_pago':'',
        'obligacion_comprador':'',
        'condicion_entrega':'',
        'condicion_adecuacion':'',
        'condicion_clausula':'',
        'aval':"",
        'comprador_representante':'',
        'leyenda_comprador':'',
        'numero_cotizacion':'',
        'enganche':0,
        'contraentrega':0,
        'financiamiento':0,
    };

    $scope.garantias_contrato=[
        {nombre:'1'},//1|
        {nombre:'2'},//1|
        {nombre:'3'},//1|
        {nombre:'4'},//1|
        {nombre:'5'},//1|
        {nombre:'6'},//1
        {nombre:'7'},//1
        {nombre:'8'},//1
        {nombre:'9'},//1
        {nombre:'10'},//1
        {nombre:'11'},//1
        {nombre:'12'},//1
        {nombre:'13'},//1
        {nombre:'14'},//1
        {nombre:'15'},//1
        {nombre:'16'},//1
        {nombre:'17'},//1
        {nombre:'18'},//1
        {nombre:'19'},//1
        {nombre:'20'},//1
        {nombre:'21'},//1
        {nombre:'22'},//1
        {nombre:'23'},//1
        {nombre:'24'},//2
        {nombre:'25'},//2
        {nombre:'26'},//2
        {nombre:'27'},//2
        {nombre:'28'},//2
        {nombre:'29'},//2
        {nombre:'30'},//2
        {nombre:'31'},//2
        {nombre:'32'},//2
        {nombre:'33'},//2
        {nombre:'34'},//2
        {nombre:'35'},//3
        {nombre:'36'},//3
        {nombre:'37'},//3
        {nombre:'38'},//3
        {nombre:'39'},//3
        {nombre:'40'},//3
        {nombre:'41'},//3
        {nombre:'42'},//3
        {nombre:'43'},//3
        {nombre:'44'},//3
        {nombre:'45'},//3
        {nombre:'46'},//3
        {nombre:'47'},//3
        {nombre:'48'},//4
        {nombre:'60'},//5
        {nombre:'72'},//6
        {nombre:'84'},//7
        {nombre:'96'},//8
    ];

    $scope.insumos=[];
/*click en el numero de contrato    realizar consulta    SI HAY CONTRATO        Ir a Index Contratos    NO HAY CONTRATO            confirmar CREAR contrato*/
    $scope.comprobarContrato = function(o){                                 console.log(o);//RECIBE EL ID DE COTIZACION. Y VERIFICA EXISTENCIA DEL CONTRATO PARA ESTA COTIZACION DADA.
        contratosCompraVentaSrc.get({id_cotizacion:o},function(data){
            var contrato=data;
            if(contrato.contratos_compra_venta.data[0]!= undefined || contrato.contratos_compra_venta.data.length>0){
                window.location = '/contratos_compra_venta?numero_contrato_compra_venta='+contrato.contratos_compra_venta.data[0].id;               //REDIRECCIONAR A INDEX DE CONTRATO.
            }else{
                if(confirm('¿DESEA GENERAR UN CONTRATO DE COMPRA VENTA?')){
                    window.location = '/contratos_compra_venta/create?id_cotizacion='+o;
                }
            }
        });
    }
/*==========FIN  VERIFICA CONTRATO DESDE INDEX COTIZACION=========*/
/**===ALTA DEL CONTRATO DE COMPRA VENTA===**/
    $scope.guarda=function(){       //consultar el ultimo numero de contrato de compra venta numero_contrato_compra_venta
        contratosCompraVentaSrc.save($scope.objeto,function(data){console.warn(data);
            //window.location = '/contratos_compra_venta?numero_contrato_compra_venta='+$scope.objeto.numero_contrato_compra_venta;
        });//FIN  ALMACEN DEL NUEVO CONTRATO
    }
/**===FIN ALTA DEL CONTRATO DE COMPRA VENTA===**/
    $scope.getCotizacionCV=function(id){                                        console.info(id+"ok");
        cotizacionPaqueteInsumoSrc.get({id:id},function(data){                  console.warn(data.cotizacion);//CONSULTAR DATOS DE LA COTIZACION Y EQUIPOS
            $scope.objeto=data.cotizacion;                                      //console.info($scope.cotizacion);
            $scope.insumos=data.cotizacion.insumos;
            $scope.objeto.nombre_responsable=data.cotizacion.iniciales_asignado;
            $scope.objeto.c_p_fiscal=data.cotizacion.codigo_postal_fiscal;
            $scope.objeto.telefonos=data.cotizacion.telefono;
            $scope.objeto.correos=data.cotizacion.correo;
            $scope.objeto.ciudad="";
            $scope.objeto.moneda=data.cotizacion.tipo_moneda;
            $scope.objeto.enganche=0;
            $scope.objeto.contraentrega=0;
            $scope.objeto.financiamiento=0;
            $scope.objeto.mensualidad=0;
            $scope.objeto.pagare=0;
            if($scope.objeto.moneda=="MXN"){
                $scope.moneda="Moneda Nacional";
            }
            if($scope.objeto.moneda=="USD"){
                $scope.moneda="Dolares Americanos";
            }
            if($scope.objeto.moneda=="EUR"){
                $scope.moneda="Euros";
            }
            var i=0;
            $scope.equipos_formato="";                                                    console.info($scope.insumos);//console.info($scope.c_ccv.insumos.length);  //console.info($scope.c_ccv.insumos[0].cantidad);
            while(i<$scope.insumos.length){
                $scope.equipos_formato+=$scope.insumos[i].cantidad+" "+$scope.insumos[i].codigo_proovedor+" "+$scope.insumos[i].marca+" "+$scope.insumos[i].modelo+" "+$scope.insumos[i].descripcion+" ";
                i++;                            //console.log($scope.equipos_formato);
            }
            $scope.objeto.leyenda_equipo='Por el presente contrato “EL COMPRADOR” adquiere un equipo con las siguientes características: \n\n'+$scope.equipos_formato;
            $scope.objeto.acuerdo_equipo='Ambas partes están de acuerdo en que el equipo es importado y por lo tanto se identificará con los números de serie hasta que “'+$scope.objeto.organizacion+'” lo tenga en su almacén, “EL COMPRADOR” se obliga a recibirlo y firmar en la remisión de entrega, así mismo, acepta que el precio sea fijado en '+$scope.moneda+' y se obliga a pagar su precio más los impuestos en los siguientes términos:';
            $scope.setPagos($scope.objeto.enganche,$scope.objeto.total,$scope.objeto.contraentrega);
            $scope.objeto.condicion_entrega='Condiciones de entrega y contacto: '+$scope.objeto.entrega+' '+$scope.objeto.contacto;
            

var ref1_contrato=$scope.objeto.referencia;
//var ref1=ref1_contrato.substr(-2);              console.info(ref1);
var ref2_contrato=$scope.objeto.referenciados;
//var ref2=ref2_contrato.substr(-2);              console.info(ref2);

  if($scope.objeto.calle_fiscal != $scope.objeto.calle_entrega){
    var direccion=$scope.objeto.calle_entrega+' '+$scope.objeto.colonia_entrega+' '+$scope.objeto.codigo_postal_entrega+' '+$scope.objeto.ciudad_entrega+' '+$scope.objeto.estado_entrega;
  }else{
    var direccion='mismo del cliente';
  }
console.warn($scope.objeto.organizacion);
if($scope.objeto.organizacion=="SMH"){//  alert("SMH");
    var escritura='Escritura Pública Número 52,038, de fecha 10 de marzo de 1989, pasada ante la fe del Notario Público Número 60 del Distrito Federal, Lic. Francisco de P. Morales Díaz, e inscrita en el Registro Público de la Propiedad y del Comercio Bajo el Folio Mercantil Número 116,757';
    var domicilio='Que tiene su domicilio en la calle San Ramón #51, en la Colonia del Valle, Delegación Benito Juárez C.P. 03100, México, Distrito Federal;';
    var lugarPago='manifestando que conoce cada uno de los lugares de pago señalados en la carátula, entre los que se encuentra el domicilio de "SMH", las cuentas con referencia o las cuentas "CLABE" para transferencias interbancarias, ambas en el Banco Nacional de México, S.A. y la cuenta en los Estados Unidos de Norteamérica,';
    var name='Suministro para Uso Médico y Hospitalario, S.A. de C.V.';
    var rfc='SUM890327137';
                $scope.objeto.condicion_clausula='Leídas que fueron las cláusulas del dorso del presente contrato, aceptadas las características del equipo y con las condiciones de entrega, “EL COMPRADOR” se obliga a pagar incondicionalmente a la orden de Suministro para Uso Médico y Hospitalario, S.A. de C.V., en la ciudad de México, firmando en este acto y deseando obligarse a partir de la siguiente fecha: '+$scope.objeto.fecha;
                $scope.objeto.obligacion_comprador='“EL COMPRADOR” se obliga a pagar el precio total y realizar depósitos sólo a favor de Suministro para Uso Médico y Hospitalario, S.A. de C.V., en caso de que no haya pagado de contado  deberá pagar a crédito y en todo caso se entenderá que la obligación de pago es exigible precisamente treinta días a partir de la firma del contrato.  “EL COMPRADOR” se obliga a pagar en el Banco Nacional de México, S.A.  (Banamex), indicando el número de factura y contrato en la referencia alfanumérica, en la cuenta  en Dólares Norteamericanos: 9267234, sucursal 266 con la referencia: ( '+
                ref2_contrato+' ), así mismo, podrá pagar en moneda nacional a la cuenta: 525245, sucursal: 870 con el número de referencia: ( '+ref1_contrato+' ). Bajo su responsabilidad podrá pagar utilizando medios electrónicos  de pago con una operación interbancaria reconocida por el  Banco de México, haciendo uso  de la Clave Bancaria Estandarizada (CLABE) en dólares norteamericanos: (002180026692659088), en su caso podrá pagar en moneda nacional a la CLABE: (002180034918138136). Los depósitos en moneda nacional serán aceptados en moneda nacional al tipo de cambio de venta en ventanilla en el Banco Nacional de México, S.A. (Banamex), hasta completar la cantidad en Dólares Norteamericanos.'+
                '\n Cuando “EL COMPRADOR” haya pagado o se hayan acordado las condiciones de pago a crédito, “'+$scope.objeto.organizacion+'” se obliga a entregar  el equipo en el siguiente domicilio: '+direccion;
    //var escritura='Escritura Pública Número 98,596, de fecha 28 de julio de 2015, pasada ante la fe del Notario Público Número 22 del Distrito Federal, Lic. Luis Felipe Morales Viesca, e inscrita en el Registro Público de la Propiedad y del Comercio';
   }else if($scope.objeto.organizacion=="IMS"){//else x  //  alert("IMS");
    var escritura='Escritura Pública Número 71,394, de fecha 15 de junio de 2004, pasada ante la fe del Notario Público Número 60 del Distrito Federal, Lic. Francisco de P. Morales Días, e inscrita en el Registro Público de la Propiedad y del Comercio Bajo el Folio Mercantil Número 321,636';
    var domicilio='Que tiene su domicilio en la calle Colonia del Valle, No. 528, int. 304 Col. del Valle Centro C.P. 03100, Del. Benito Juarez Ciudad de México;';
    var lugarPago='manifestando que conoce cada uno de los lugares de pago señalados en la carátula, entre los que se encuentra el domicilio de "IMS", las cuentas con referencia o las cuentas "CLABE" para transferencias interbancarias, ambas en el Banco Nacional de México, S.A. y la cuenta en los Estados Unidos de Norteamérica,';
    var name='Images Medical Supplies de México, S.A. de C.V.';
    var rfc='IMS040615F75';
                $scope.objeto.condicion_clausula='Leídas que fueron las cláusulas del dorso del presente contrato, aceptadas las características del equipo y con las condiciones de entrega, “EL COMPRADOR” se obliga a pagar incondicionalmente a la orden de Images Medical Supplies de México, S.A. de C.V., en la ciudad de México, firmando en este acto y deseando obligarse a partir de la siguiente fecha: '+$scope.objeto.fecha;
                $scope.objeto.obligacion_comprador='“EL COMPRADOR” se obliga a pagar el precio total y realizar depósitos sólo a favor de Images Medical Supplies de México S.A. de C.V., en caso de que no haya pagado de contado deberá pagar a crédito y en todo caso se entenderá que la obligación de pago es exigible precisamente treinta días a partir de la firma del contrato.  “EL COMPRADOR” se obliga a pagar en el Banco Nacional de México, S.A.  (Banamex), indicando el número de factura y contrato en la referencia alfanumérica, en la cuenta  en Dólares Norteamericanos: 9702182, sucursal 870 con la referencia: ( '+
                ref2_contrato+' ), así mismo, podrá pagar en moneda nacional a la cuenta: 587658, sucursal: 870 con el número de referencia: ( '+ref1_contrato+' ). Bajo su responsabilidad podrá pagar utilizando medios electrónicos  de pago con una operación interbancaria reconocida por el Banco de México, haciendo uso  de la Clave Bancaria Estandarizada (CLABE) en Dólares norteamericanos: (002180026692678894), en su caso podrá pagar en moneda nacional a la CLABE: (002180026669586359). Los depósitos en moneda nacional serán aceptados en moneda nacional al tipo de cambio de venta en ventanilla en el Banco Nacional de México, S.A. (Banamex), hasta completar la cantidad en Dólares Norteamericanos.'+
                '\n Cuando “EL COMPRADOR” haya pagado o se hayan acordado las condiciones de pago a crédito, “'+$scope.objeto.organizacion+'” se obliga a entregar  el equipo en el siguiente domicilio: '+direccion;
    }else if($scope.objeto.organizacion=="SMD"){//else x  //  alert("IMS");
    var escritura='Escritura Pública Número 98,596, de fecha 28 de julio de 2015, pasada ante la fe del Notario Público Número 22 del Distrito Federal, Lic. Luis Felipe Morales Viesca, e inscrita en el Registro Público de la Propiedad y del Comercio';
    var domicilio='Que tiene su domicilio en la calle Colonia del Valle, No. 528, int. 501 Col. del Valle Centro C.P. 03100, Del. Benito Juarez Ciudad de México;';
    var lugarPago='manifestando que conoce cada uno de los lugares de pago señalados en la carátula, entre los que se encuentra el domicilio de "SMD", la cuenta o las cuentas "CLABE" para transferencias interbancarias, en el Banco Santander, S.A.';
    var name=    'SMD Servicios Médicos para Diagnóstico S.A. de C.V.';
    var rfc='SSM150730BB0';
                $scope.objeto.condicion_clausula='Leídas que fueron las cláusulas del dorso del presente contrato, aceptadas las características del equipo y con las condiciones de entrega, “EL COMPRADOR” se obliga a pagar incondicionalmente a la orden de SMD Servicios Médicos para Diagnóstico, S.A. de C.V., en la ciudad de México, firmando en este acto y deseando obligarse a partir de la siguiente fecha: '+$scope.objeto.fecha;
                $scope.objeto.obligacion_comprador='“EL COMPRADOR” se obliga a pagar el precio total y realizar depósitos sólo a favor de SMD Servicios Médicos para Diagnóstico S.A. de C.V., en caso de que no haya pagado de contado deberá pagar a crédito y en todo caso se entenderá que la obligación de pago es exigible precisamente treinta días a partir de la firma de este contrato.  “EL COMPRADOR” se obliga a pagar en el Banco Santander S.A. en la cuenta: 65-50551327-7.'+
                'Bajo su responsabilidad podrá pagar utilizando medios electrónicos de pago  con una operación interbancaria reconocida por el Banco de México, haciendo uso de la Clave Bancaria Estandarizada (CLABE) en Moneda Nacional a la CLABE: (0141806555055132776)'+
                '\n Cuando “EL COMPRADOR” haya pagado o se hayan acordado las condiciones de pago a crédito, “'+$scope.objeto.organizacion+'” se obliga a entregar  el equipo en el siguiente domicilio: '+direccion;
    }//else x//else x
    $scope.objeto.leyenda_comprador=$scope.dorso($scope.objeto.organizacion,name,escritura,domicilio,rfc,lugarPago);                      //console.warn($scope.contrato_compra_venta.leyenda_comprador);
                //});//FIN  ALMACEN DEL NUEVO CONTRATO
    });
}

/**===CONTROLLER DEL CONTRATO DE COMPRA VENTA===**/
    $scope.setPagos=function(){
        var anticipo_porcentaje=($scope.objeto.enganche*100)/$scope.objeto.total;  
        anticipo_porcentaje=$filter('number')(anticipo_porcentaje, 0);
        var dif_por=100-anticipo_porcentaje;                                                                                                        //console.log(dif_por);//ok
        var dif_res=parseFloat($scope.objeto.total)-parseFloat($scope.objeto.enganche);                                                             //console.log(dif_res);
        var contraentrega_porcentaje=($scope.objeto.contraentrega*dif_por)/dif_res;
        contraentrega_porcentaje=$filter('number')(contraentrega_porcentaje, 0);
        var financiamiento_porcentaje=100-parseFloat(anticipo_porcentaje)-parseFloat(contraentrega_porcentaje);                                     //console.log(financiamiento_porcentaje);
        financiamiento_porcentaje=$filter('number')(financiamiento_porcentaje, 0);
        if($scope.objeto.mensualidad>1){
            var pago=+' PAGOS';
            var mensual=$scope.objeto.mensualidad+' MENSUALIDADES';
        }else{
            var pago=$scope.objeto.mensualidad+' PAGO';                    
            var mensual=$scope.objeto.mensualidad+' MENSUALIDAD';
        }                                                                                                                                           //console.log(data.cotizacion.anticipo);                console.log(data.cotizacion.contraentrega);                console.log(data.cotizacion.financiamiento);
        if($scope.objeto.enganche>0 && $scope.objeto.contraentrega==0 && $scope.objeto.financiamiento==0){                                         
            if($scope.objeto.enganche==$scope.objeto.total){                                                                                        console.warn("SOLO ANTICIPO");
                $scope.objeto.condicion_pago='“EL COMPRADOR” se obliga a pagar el precio total de este contrato de contado, pagando precisamente antes de la siguiente fecha: '+$scope.objeto.fecha+'\n En caso de que "EL COMPRADOR" no pague de contado, podrá pagar a crédito de la siguiente forma: ';
                $scope.objeto.aclaracion_pago='Aclaraciones al pago: PAGO DE CONTADO: '+anticipo_porcentaje+'%';
                $scope.objeto.pagare=$scope.objeto.enganche;                //alert($scope.objeto.pagare);
            }else{
                console.log("EL VALOR DEL ANTICIPO NO CONCUERDA CON EL TOTAL, FAVOR DE VERIFICAR");
            }
        }
        if($scope.objeto.enganche==0 && $scope.objeto.contraentrega>0 && $scope.objeto.financiamiento==0){
            if($scope.objeto.contraentrega==$scope.objeto.total){                                                                                   console.warn("SOLO CONTRAENTREGA");
                $scope.objeto.condicion_pago='“EL COMPRADOR” se obliga a pagar el precio total de este contrato de contado, pagando precisamente antes de la siguiente fecha: '+$scope.objeto.fecha+'\n En caso de que "EL COMPRADOR" no pague de contado, podrá pagar a crédito de la siguiente forma: ';
                $scope.objeto.aclaracion_pago='Aclaraciones al pago: PAGO CONTRAENTREGA: '+contraentrega_porcentaje+'%';
                $scope.objeto.pagare=$scope.objeto.contraentrega;                //alert($scope.objeto.pagare);
            }else{
                console.log("EL VALOR DE CONTRAENTREGA NO CONCUERDA CON EL TOTAL, FAVOR DE VERIFICAR");
            }
        }
        if($scope.objeto.enganche==0 && $scope.objeto.contraentrega==0 && $scope.objeto.financiamiento>0){                              
            if($scope.objeto.mensualidad>0){                                                                                                       //console.info($scope.objeto.mensualidad);
                $scope.monto_mensual=$scope.objeto.financiamiento/$scope.objeto.mensualidad;
                if($scope.objeto.financiamiento==$scope.objeto.total){                                                                              console.warn("FINANCIAMIENTO");
                    $scope.objeto.condicion_pago='En caso de que “EL COMPRADOR” no pague de contado, podrá pagar a crédito  de la siguiente forma: el financiamiento de: $'+$filter('number')(($scope.objeto.financiamiento), 2)+' '+$scope.moneda+' a pagar de la siguiente forma: '+mensual+' de: $'+$filter('number')(($scope.monto_mensual), 2)+' '+$scope.moneda+'.';
                    $scope.objeto.aclaracion_pago='Aclaraciones al pago: FINANCIAMIENTO DEL '+financiamiento_porcentaje+'%.';
                    $scope.objeto.pagare=$scope.objeto.financiamiento;                //alert($scope.objeto.pagare);
                }
            }else{
                console.log("FAVOR DE AGREGAR EL NUMERO DE MENSUALIDADES");
            }
        }
        if($scope.objeto.enganche>0 && $scope.objeto.contraentrega>0 && $scope.objeto.financiamiento==0){                                          console.warn("ANTICIPO + CONTRAENTREGA");
            var tt=parseFloat($scope.objeto.enganche)+parseFloat($scope.objeto.contraentrega);                                                     //console.info(tt);
            if(tt==$scope.objeto.total){                                                                                                            //console.warn("ANTICIPO Y CONTRAENTREGA");
                $scope.objeto.condicion_pago='En caso de que “EL COMPRADOR” no pague de contado, podrá pagar a crédito  de la siguiente forma: Un enganche de: $'+$filter('number')(($scope.objeto.enganche),2)+' '+$scope.moneda+', más un pago contra entrega de: $'+$filter('number')(($scope.objeto.contraentrega), 2)+' '+$scope.moneda+'.';
                $scope.objeto.aclaracion_pago='Aclaraciones al pago: ENGANCHE DEL '+anticipo_porcentaje+'% Y CONTRA ENTREGA DEL '+contraentrega_porcentaje+'%.';//' EN '+pago;
                    $scope.objeto.pagare=$scope.objeto.total-$scope.objeto.enganche;                //alert($scope.objeto.pagare);
            }else{
                console.log("LA SUMA DEL ENGANCHE MAS LA CONTRAENTREGA NO ES IGUAL AL MONTO TOTAL, FAVOR DE VERIFICAR");
            }
        }
        if($scope.objeto.enganche>0 && $scope.objeto.contraentrega==0 &&  $scope.objeto.financiamiento>0){                                          console.warn("ANTICIPO Y FINANCIAMIENTO");
            if($scope.objeto.mensualidad>0){                                                                                        //console.info($scope.contrato_compra_venta.mensualidad);
                $scope.monto_mensual=$scope.objeto.financiamiento/$scope.objeto.mensualidad;
                var t=parseFloat($scope.objeto.enganche)+parseFloat($scope.objeto.financiamiento);                                                     //console.info(tt);
                if(t==$scope.objeto.total){
                    $scope.objeto.condicion_pago='En caso de que “EL COMPRADOR” no pague de contado, podrá pagar a crédito  de la siguiente forma: Un enganche de: $'+$filter('number')(($scope.objeto.enganche), 2)+' '+$scope.moneda+', más el financiamiento de: $'+$filter('number')(($scope.objeto.financiamiento), 2)+' '+$scope.moneda+' a pagar de la siguiente forma: '+mensual+' de: $'+$filter('number')(($scope.monto_mensual), 2)+' '+$scope.moneda+'.';
                    $scope.objeto.aclaracion_pago='Aclaraciones al pago: ENGANCHE DEL '+anticipo_porcentaje+'% Y FINANCIAMIENTO DEL '+financiamiento_porcentaje+'%.';//' EN '+pago;
                    $scope.objeto.pagare=$scope.objeto.total-$scope.objeto.enganche;                //alert($scope.objeto.pagare);
                }
            }else{
                console.log("FAVOR DE AGREGAR EL NUMERO DE MENSUALIDADES");
            }
        }
        if($scope.objeto.enganche>0 && $scope.objeto.contraentrega>0 && $scope.objeto.financiamiento>0){                                            console.warn("ANTICIPO + CONTRAENTREGA + FINACIAMIENTO");
            if($scope.objeto.mensualidad>0){                                                                                        //console.info($scope.contrato_compra_venta.mensualidad);
                $scope.monto_mensual=$scope.objeto.financiamiento/$scope.objeto.mensualidad;
                var t=parseFloat($scope.objeto.enganche)+parseFloat($scope.objeto.contraentrega)+parseFloat($scope.objeto.financiamiento);                                                     //console.info(tt);
                if(t==$scope.objeto.total){
                    $scope.objeto.condicion_pago='En caso de que “EL COMPRADOR” no pague de contado, podrá pagar a crédito  de la siguiente forma: Un enganche de: $'+$filter('number')(($scope.objeto.enganche), 2)+' '+$scope.moneda+', más un pago contra entrega de: $'+$filter('number')(($scope.objeto.contraentrega), 2)+' '+$scope.moneda+', más el financiamiento de: $'+$filter('number')(($scope.objeto.financiamiento), 2)+' '+$scope.moneda+' a pagar de la siguiente forma: '+mensual+' de: $'+$filter('number')(($scope.monto_mensual), 2)+' '+$scope.moneda+'.';
                    $scope.objeto.aclaracion_pago='Aclaraciones al pago: ENGANCHE DEL '+anticipo_porcentaje+'%, CONTRA ENTREGA DEL '+contraentrega_porcentaje+'% Y FINANCIAMIENTO DEL '+financiamiento_porcentaje+'%.';//' EN '+pago;
                    $scope.objeto.pagare=parseFloat($scope.objeto.contraentrega)+parseFloat($scope.objeto.financiamiento);                //alert($scope.objeto.pagare);
                }
            }else{
                console.log("FAVOR DE AGREGAR EL NUMERO DE MENSUALIDADES");
            }
        }

        $scope.objeto.condicion_adecuacion='Para estar en posibilidades de cumplir con la entrega, además de cumplir con las condiciones de pago “EL COMPRADOR”  se obliga a proporcionar el área y todas las condiciones eléctricas y técnicas necesarias.'+
                  '\nEn los términos establecidos en el dorso de este contrato, “'+$scope.objeto.organizacion+'”, garantiza el equipo por un término de: '+$scope.objeto.garantia+' MESES.';
              //}
    }

/**===CONTROLLER DEL CONTRATO DE COMPRA VENTA===**/

    $timeout(function() {   
        if($scope.objeto!=undefined){
            if($scope.objeto.vista===0){                                                                            console.warn($scope.objeto.id_cotizacion);console.info("CREAR CONTRATO DESDE COTIZACION");//CONSULTA PARA CREAR UN NUEVO CONTRATO DE COMPRA VENTA:                //CONSULTAR COTIZACION PARA DATOS FISCALES              //CONSULTAR INSUMOS PARA MODELO Y MARCAR EQUIPOS                //cargar las condiciones de compra venta
                if($scope.objeto.id_cotizacion != "" && $scope.objeto.id_cotizacion>0){
                    $scope.getCotizacionCV($scope.objeto.id_cotizacion);
                }
            }else if ($scope.objeto.vista===1){                                                                     console.info("EDITAR CONTRATO DESDE COTIZACION");
                $scope.consultarPorCotizacion();
            }

        }

    }, 3000);

    
    $scope.calCTotal=function(){                                                                                    alert("IN");
        $scope.contrato_compra_venta.total=(parseFloat($scope.contrato_compra_venta.subtotal)) +  parseFloat($scope.contrato_compra_venta.iva);
        //$scope.contrato_compra_venta.total=4+5;
        console.info($scope.contrato_compra_venta.total);
    }

    $scope.elMoneda=function(){
        if($scope.contrato_compra_venta.moneda=="MXN"){
            $scope.moneda="Moneda Nacional";
        }
        if($scope.contrato_compra_venta.moneda=="EUR"){
            $scope.moneda="Euros";                                //$scope.t_moneda="Dolares Americanos";
        }
        if($scope.contrato_compra_venta.moneda=="USD"){
            $scope.moneda="Dolares Americanos";                                //$scope.t_moneda="Dolares Americanos";
        }
    }

    $scope.chkEditar=function()    {
        if($scope.editar)       {//editar completo manualmente el campo
            $scope.contrato_compra_venta.condicion_pago=$scope.condicion_contrato.condicion_pago;
            $scope.contrato_compra_venta.aclaracion_pago=$scope.condicion_contrato.aclaracion_pago;
            $scope.contrato_compra_venta.fecha='';
            $scope.contrato_compra_venta.enganche='';
            $scope.contrato_compra_venta.financiamiento='';
            $scope.contrato_compra_venta.mensualidad='';
            $scope.mensualidades='';
            $scope.financiamiento='';
        }else       {//asistente con campos separados para condicion_pago
            $scope.contrato_compra_venta.condicion_pago='';
            $scope.contrato_compra_venta.aclaracion_pago='';
        }
    }

    $scope.confCon= {
        headerCrear:"GENERAR NUEVO CONTRATO DE COMPRA VENTA ",
        headerEditar:"EDITAR CONTRATO DE COMPRA VENTA: ",
        successEdit:"ACTUALIZAR",
        successCrea:"GUARDAR"
    };

    $scope.eliminar=function (i){
        if(confirm('¿DESEA ELIMINAR?'))        {
            contratosCompraVentaSrc.delete({id:i.id},function(data){
               window.location = $location.absUrl();
            });
        }

    }

    $scope.restaurar=function (i){
        if(confirm('¿DESEA RESTAURAR?'))        {
            contratosCompraVentaSrc.delete({id:i.id},function(){
               window.location = $location.absUrl();
            });
        }
    }

    $scope.consultar=function (){console.info($scope.contrato_compra_venta.id);
        contratosCompraVentaSrc.get({id:$scope.contrato_compra_venta.id},function(data){                         //CONSULTA DATOS DEL CONTRATO DE COMPRA VENTA
            $scope.contrato_compra_venta=data.contrato_compra_venta;                                            // console.log(data.contrato_compra_venta);    
            $scope.mensualidades=$scope.contrato_compra_venta.mensualidad;
            cotizacionPaqueteInsumoSrc.get({id:$scope.contrato_compra_venta.id_cotizacion},function(data){       //CONSULTAR DATOS DE LA COTIZACION Y EQUIPOS
                        $scope.cotizacion=data.cotizacion;                                                       //console.log(data.cotizacion);    
                        $scope.insumos=data.cotizacion.insumos;
                        $scope.contrato_compra_venta.cotizacion=data.cotizacion.numero_cotizacion;
                    });
        });
    }

    $scope.consultarPorCotizacion=function (){                                                     console.info($scope.contrato_compra_venta.id);
        $scope.id_contrato=$scope.contrato_compra_venta.id;
        contratosCompraVentaSrc.get({id:$scope.contrato_compra_venta.id},function(data){        //console.info(data.contrato_compra_venta.id_cotizacion);// console.log(data.contrato_compra_venta);
            $scope.anexo=data.contrato_compra_venta.anexo;                                          console.info($scope.anexo);
            $scope.reverso=data.contrato_compra_venta.leyenda_comprador;                                          console.info($scope.reverso);
            cotizacionPaqueteInsumoSrc.get({id:data.contrato_compra_venta.id_cotizacion},function(data){       //CONSULTAR DATOS DE LA COTIZACION Y EQUIPOS
                $scope.cotizacion=data.cotizacion;                                                      console.log(data.cotizacion);    //console.info($scope.contrato_compra_venta.anexo);
                $scope.contrato_compra_venta=data.cotizacion;                                           // console.info($scope.contrato_compra_venta.anexo);                                            // console.log(data.cotizacion);    
                $scope.insumos=data.cotizacion.insumos;
                $scope.contrato_compra_venta.cotizacion=data.cotizacion.numero_cotizacion;
                $scope.contrato_compra_venta.numero_contrato_compra_venta=$scope.cotizacion.folio_contrato;
                $scope.contrato_compra_venta.moneda=$scope.cotizacion.tipo_moneda;
                $scope.contrato_compra_venta.enganche=$scope.cotizacion.anticipo;
                $scope.contrato_compra_venta.mensualidad=$scope.cotizacion.mensualidades;
                $scope.contrato_compra_venta.comprador_representante=$scope.cotizacion.representante_legal;
                $scope.contrato_compra_venta.numero=$scope.cotizacion.identificacionno;
                $scope.contrato_compra_venta.ciudad=data.cotizacion.ciudadnotario;
                $scope.contrato_compra_venta.ciudad1=data.cotizacion.ciudadnotario1;
                var fec=$scope.cotizacion.fecha;
                var fecha=fec.split('-');                                                               //console.info(fecha);
                $scope.contrato_compra_venta.fecha=fecha[2].substring(0,2)+'-'+fecha[1]+'-'+fecha[0];
                    var i=0;
                $scope.equipos_formato="";    console.info($scope.insumos);//console.info($scope.c_ccv.insumos.length);  //console.info($scope.c_ccv.insumos[0].cantidad);
                while(i<$scope.insumos.length){
                    $scope.equipos_formato+=$scope.insumos[i].cantidad+" "+$scope.insumos[i].codigo_proovedor+" "+$scope.insumos[i].marca+" "+$scope.insumos[i].modelo+" "+$scope.insumos[i].descripcion+" ";
                    i++;                            //console.log($scope.equipos_formato);
                }
                $scope.contrato_compra_venta.leyenda_equipo='Por el presente contrato “EL COMPRADOR” adquiere un equipo con las siguientes características: \n\n'+$scope.equipos_formato;
                if($scope.cotizacion.tipo_moneda!=""||$scope.cotizacion.tipo_moneda!=undefined){
                  if($scope.contrato_compra_venta.moneda=="MXN"){
                    $scope.moneda="Moneda Nacional";
                  }else if($scope.contrato_compra_venta.moneda=="USD"){
                    $scope.moneda="Dolares Americanos";
                  }
                  $scope.contrato_compra_venta.acuerdo_equipo='Ambas partes están de acuerdo en que el equipo es importado y por lo tanto se identificará con los números de serie hasta que “'+$scope.cotizacion.organizacion+'” lo tenga en su almacén, “EL COMPRADOR” se obliga a recibirlo y firmar en la remisión de entrega, así mismo, acepta que el precio sea fijado en '+$scope.moneda+' y se obliga a pagar su precio más los impuestos en los siguientes términos:';
                }else{ 
                    alert("FAVOR DE VERIFICAR LA MONEDA");
                }
                var anticipo_porcentaje=(data.cotizacion.anticipo*100)/data.cotizacion.total;  
                anticipo_porcentaje=$filter('number')(anticipo_porcentaje, 0);
                var dif_por=100-anticipo_porcentaje;                                                            console.log(dif_por);//ok
                var dif_res=parseFloat(data.cotizacion.total)-parseFloat(data.cotizacion.anticipo)  ;           console.log(dif_res);
                var contraentrega_porcentaje=(data.cotizacion.contraentrega*dif_por)/dif_res;
                contraentrega_porcentaje=$filter('number')(contraentrega_porcentaje, 0);
                var financiamiento_porcentaje=100-parseFloat(anticipo_porcentaje)-parseFloat(contraentrega_porcentaje);       
                financiamiento_porcentaje=$filter('number')(financiamiento_porcentaje, 0);
                if(data.cotizacion.mensualidades>1){
                    var pago=data.cotizacion.mensualidades+' PAGOS';
                    var mensual=data.cotizacion.mensualidades+' MENSUALIDADES';
                }else{
                    var pago=data.cotizacion.mensualidades+' PAGO';                    
                    var mensual=data.cotizacion.mensualidades+' MENSUALIDAD';
                }//console.log(data.cotizacion.anticipo);                console.log(data.cotizacion.contraentrega);                console.log(data.cotizacion.financiamiento);
                if((data.cotizacion.anticipo>0) && (data.cotizacion.contraentrega==0) &&  (data.cotizacion.financiamiento==0)){ console.warn("SOLO ANTICIPO");
                  $scope.contrato_compra_venta.condicion_pago='“EL COMPRADOR” se obliga a pagar el precio total de este contrato de contado, pagando precisamente antes de la siguiente fecha: '+$scope.contrato_compra_venta.fecha+'\n En caso de que "EL COMPRADOR" no pague de contado, podrá pagar a crédito de la siguiente forma: ';
                  $scope.contrato_compra_venta.aclaracion_pago='Aclaraciones al pago: PAGO DE CONTADO: '+anticipo_porcentaje+'%';
                }
                if((data.cotizacion.anticipo==0) && (data.cotizacion.contraentrega>0) &&  (data.cotizacion.financiamiento==0)){ console.warn("SOLO CONTRAENTREGA");
                  $scope.contrato_compra_venta.condicion_pago='“EL COMPRADOR” se obliga a pagar el precio total de este contrato de contado, pagando precisamente antes de la siguiente fecha: '+'\n En caso de que "EL COMPRADOR" no pague de contado, podrá pagar a crédito de la siguiente forma: ';
                  $scope.contrato_compra_venta.aclaracion_pago='Aclaraciones al pago: PAGO CONTRAENTREGA: '+contraentrega_porcentaje+'%';
                }
                if((data.cotizacion.anticipo>0) && (data.cotizacion.contraentrega!=0) &&  (data.cotizacion.financiamiento==0)){console.warn("ANTICIPO Y CONTRAENTREGA");
                  $scope.contrato_compra_venta.condicion_pago='En caso de que “EL COMPRADOR” no pague de contado, podrá pagar a crédito  de la siguiente forma: Un enganche de: $'+data.cotizacion.anticipo+' '+$scope.moneda+', más un pago contra entrega de: $'+data.cotizacion.contraentrega+' '+$scope.moneda+'.';
                  $scope.contrato_compra_venta.aclaracion_pago='Aclaraciones al pago: ENGANCHE DEL '+anticipo_porcentaje+'% Y CONTRA ENTREGA DEL '+contraentrega_porcentaje+'%.';//' EN '+pago;
                }
                if((data.cotizacion.anticipo>0) && (data.cotizacion.contraentrega==0) &&  (data.cotizacion.financiamiento>0)){console.warn("ANTICIPO Y FINANCIAMIENTO");
                   if($scope.contrato_compra_venta.mensualidad>=1){                                   //console.info($scope.contrato_compra_venta.mensualidad);
                    $scope.monto_mensual=$scope.contrato_compra_venta.financiamiento/$scope.contrato_compra_venta.mensualidad;
                  }
                  $scope.contrato_compra_venta.condicion_pago='En caso de que “EL COMPRADOR” no pague de contado, podrá pagar a crédito  de la siguiente forma: Un enganche de: $'+data.cotizacion.anticipo+' '+$scope.moneda+', más el financiamiento de: $'+data.cotizacion.financiamiento+' '+$scope.moneda+' a pagar de la siguiente forma: '+mensual+' de: $'+$scope.monto_mensual+' '+$scope.moneda+'.';
                  $scope.contrato_compra_venta.aclaracion_pago='Aclaraciones al pago: ENGANCHE DEL '+anticipo_porcentaje+'% Y FINANCIAMIENTO DEL '+financiamiento_porcentaje+'%.';//' EN '+pago;
                }
                if((data.cotizacion.anticipo==0) && (data.cotizacion.contraentrega==0) && (data.cotizacion.financiamiento>0)){console.warn("FINANCIAMIENTO");
                  if($scope.contrato_compra_venta.mensualidad>=1){                                   //console.info($scope.contrato_compra_venta.mensualidad);
                    $scope.monto_mensual=$scope.contrato_compra_venta.financiamiento/$scope.contrato_compra_venta.mensualidad;
                  }
                  $scope.contrato_compra_venta.condicion_pago='En caso de que “EL COMPRADOR” no pague de contado, podrá pagar a crédito  de la siguiente forma: el financiamiento de: $'+data.cotizacion.financiamiento+' '+$scope.moneda+' a pagar de la siguiente forma: '+mensual+' de: $'+$scope.monto_mensual+' '+$scope.moneda+'.';
                  $scope.contrato_compra_venta.aclaracion_pago='Aclaraciones al pago: FINANCIAMIENTO DEL '+financiamiento_porcentaje+'%.';//' EN '+pago;
                }
                if((data.cotizacion.anticipo>0) && (data.cotizacion.contraentrega > 0) && (data.cotizacion.financiamiento>0)){console.warn("ANTICIPO + CONTRAENTREGA + FINACIAMIENTO");
                  if($scope.contrato_compra_venta.mensualidad>=1){                                   //console.info($scope.contrato_compra_venta.mensualidad);
                    $scope.monto_mensual=$scope.contrato_compra_venta.financiamiento/$scope.contrato_compra_venta.mensualidad;
                  }
                  $scope.contrato_compra_venta.condicion_pago='En caso de que “EL COMPRADOR” no pague de contado, podrá pagar a crédito  de la siguiente forma: Un enganche de: $'+data.cotizacion.anticipo+' '+$scope.moneda+', más un pago contra entrega de: $'+data.cotizacion.contraentrega+' '+$scope.moneda+', más el financiamiento de: $'+data.cotizacion.financiamiento+' '+$scope.moneda+' a pagar de la siguiente forma: '+mensual+' de: $'+$scope.monto_mensual+' '+$scope.moneda+'.';
                  $scope.contrato_compra_venta.aclaracion_pago='Aclaraciones al pago: ENGANCHE DEL '+anticipo_porcentaje+'%, CONTRA ENTREGA DEL '+contraentrega_porcentaje+'% Y FINANCIAMIENTO DEL '+financiamiento_porcentaje+'%.';//' EN '+pago;
                }
                var ref1_contrato=$scope.cotizacion.referencia;
               // var ref1=ref1_contrato.substr(-2);              //console.info("MXN: "+ref1);
                var ref2_contrato=$scope.cotizacion.referenciados;
               // var ref2=ref2_contrato.substr(-2);              //console.info("USD: "+ref2);
                if($scope.cotizacion.calle_fiscal != $scope.cotizacion.calle_entrega){
                    var direccion=$scope.cotizacion.calle_entrega+' '+$scope.cotizacion.colonia_entrega+' '+$scope.cotizacion.codigo_postal_entrega+' '+$scope.cotizacion.ciudad_entrega+' '+$scope.cotizacion.estado_entrega+'.';
                }else{
                    var direccion='mismo del cliente';
                }                                                                        //console.warn($scope.contrato_compra_venta.organizacion);
                if($scope.contrato_compra_venta.organizacion=="SMH"){//  alert("SMH");
                    var escritura='Escritura Pública Número 52,038, de fecha 10 de marzo de 1989, pasada ante la fe del Notario Público Número 60 del Distrito Federal, Lic. Francisco de P. Morales Díaz, e inscrita en el Registro Público de la Propiedad y del Comercio Bajo el Folio Mercantil Número 116,757';
                    var domicilio='Que tiene su domicilio en la calle San Ramón #51, en la Colonia del Valle, Delegación Benito Juárez C.P. 03100, México, Distrito Federal;';
                    var lugarPago='manifestando que conoce cada uno de los lugares de pago señalados en la carátula, entre los que se encuentra el domicilio de "SMH", las cuentas con referencia o las cuentas "CLABE" para transferencias interbancarias, ambas en el Banco Nacional de México, S.A. y la cuenta en los Estados Unidos de Norteamérica,';
                    var name='Suministro para Uso Médico y Hospitalario, S.A. de C.V.';
                    var rfc='SUM890327137';
                    $scope.contrato_compra_venta.obligacion_comprador='“EL COMPRADOR” se obliga a pagar el precio total y realizar depósitos sólo a favor de Suministro para Uso Médico y Hospitalario, S.A. de C.V., en caso de que no haya pagado de contado  deberá pagar a crédito y en todo caso se entenderá que la obligación de pago es exigible precisamente treinta días a partir de la firma del contrato.  “EL COMPRADOR” se obliga a pagar en el Banco Nacional de México, S.A.  (Banamex), indicando el número de factura y contrato en la referencia alfanumérica, en la cuenta en Dólares Norteamericanos: 9267234, sucursal 266 con la referencia: ( '+
                    ref2_contrato+' ), así mismo, podrá pagar en moneda nacional a la cuenta: 525245, sucursal: 870 con el número de referencia: ( '+ref1_contrato+' ). Bajo su responsabilidad podrá pagar utilizando medios electrónicos  de pago con una operación interbancaria reconocida por el  Banco de México, haciendo uso  de la Clave Bancaria Estandarizada (CLABE) en dólares norteamericanos: (002180026692659088), en su caso podrá pagar en moneda nacional a la clave: (002180034918138136). Los depósitos en moneda nacional serán aceptados en moneda nacional al tipo de cambio de venta en ventanilla en el Banco Nacional de México, S.A. (Banamex), hasta completar la cantidad en Dólares Norteamericanos.'+
                    '\n Cuando “EL COMPRADOR” haya pagado o se hayan acordado las condiciones de pago a crédito, “'+$scope.cotizacion.organizacion+'” se obliga a entregar  el equipo en el siguiente domicilio: '+direccion;
                    $scope.contrato_compra_venta.condicion_clausula='Leídas que fueron las cláusulas del dorso del presente contrato, aceptadas las características del equipo y con las condiciones de entrega, “EL COMPRADOR” se obliga a pagar incondicionalmente a la orden de '+name+', en la ciudad de México, firmando en este acto y deseando obligarse a partir de la siguiente fecha: '+$scope.contrato_compra_venta.fecha;
                }else if($scope.contrato_compra_venta.organizacion=="IMS"){//else x  //  alert("IMS");
                    var escritura='Escritura Pública Número 71,394, de fecha 15 de junio de 2004, pasada ante la fe del Notario Público Número 60 del Distrito Federal, Lic. Francisco de P. Morales Díaz, e inscrita en el Registro Público de la Propiedad y del Comercio Bajo el Folio Mercantil Número 321,636;';
                    var domicilio='Que tiene su domicilio en la calle Colonia del Valle, No. 528, int. 304 Col. del Valle Centro C.P. 03100, Del. Benito Juarez Ciudad de México;';
                    var lugarPago='manifestando que conoce cada uno de los lugares de pago señalados en la carátula, entre los que se encuentra el domicilio de "IMS", las cuentas con referencia o las cuentas "CLABE" para transferencias interbancarias, ambas en el Banco Nacional de México, S.A.  y la cuenta en los Estados Unidos de Norteamérica, ';
                    var name='Images Medical Supplies de México, S.A. de C.V.';
                    var rfc='';
                    $scope.contrato_compra_venta.obligacion_comprador='“EL COMPRADOR” se obliga a pagar el precio total y realizar depósitos sólo a favor de Images Medical Supplies de México S.A. de C.V., en caso de que no haya pagado de contado deberá pagar a crédito y en todo caso se entenderá que la obligación de pago es exigible precisamente treinta días a partir de la firma del contrato.  “EL COMPRADOR” se obliga a pagar en el Banco Nacional de México, S.A.  (Banamex), indicando el número de factura y contrato en la referencia alfanumérica, en la cuenta  en Dólares Norteamericanos: 9702182, sucursal 870 con la referencia: ( '+
                    ref2_contrato+' ), así mismo, podrá pagar en moneda nacional a la cuenta: 587658, sucursal: 870 con el número de referencia: ( '+ref1_contrato+' ). Bajo su responsabilidad podrá pagar utilizando medios electrónicos  de pago con una operación interbancaria reconocida por el Banco de México, haciendo uso  de la Clave Bancaria Estandarizada (CLABE) en dólares norteamericanos: (002180026692678894), en su caso podrá pagar en moneda nacional a la clave: (002180026669586359). Los depósitos en moneda nacional serán aceptados en moneda nacional al tipo de cambio de venta en ventanilla en el Banco Nacional de México, S.A. (Banamex), hasta completar la cantidad en Dólares Norteamericanos.'+
                    '\n Cuando “EL COMPRADOR” haya pagado o se hayan acordado las condiciones de pago a crédito, “'+$scope.cotizacion.organizacion+'” se obliga a entregar  el equipo en el siguiente domicilio: '+direccion;
                    $scope.contrato_compra_venta.condicion_clausula='Leídas que fueron las cláusulas del dorso del presente contrato, aceptadas las características del equipo y con las condiciones de entrega, “EL COMPRADOR” se obliga a pagar incondicionalmente a la orden de '+name+', en la ciudad de México, firmando en este acto y deseando obligarse a partir de la siguiente fecha: '+$scope.contrato_compra_venta.fecha;
                }else if($scope.contrato_compra_venta.organizacion=="SMD"){//else x  //  alert("IMS");
                    var escritura='Escritura Pública Número 98,596, de fecha 28 de julio de 2015, pasada ante la fe del Notario Público Número 22 del Distrito Federal, Lic. Luis Felipe Morales Viesca, e inscrita en el Registro Público de la Propiedad y del Comercio';
                    var domicilio='Que tiene su domicilio en la calle Colonia del Valle, No. 528, int. 501 Col. del Valle Centro C.P. 03100, Del. Benito Juarez Ciudad de México;';
                    var lugarPago='manifestando que conoce cada uno de los lugares de pago señalados en la carátula, entre los que se encuentra el domicilio de "SMD", la cuenta o las cuentas "CLABE" para transferencias interbancarias, en el Banco Santander, S.A.';
                    var name=    'SMD Servicios Médicos para Diagnóstico S.A. de C.V.';
                    var rfc='SSM150730BB0';
                    $scope.contrato_compra_venta.condicion_clausula='Leídas que fueron las cláusulas del dorso del presente contrato, aceptadas las características del equipo y con las condiciones de entrega, “EL COMPRADOR” se obliga a pagar incondicionalmente a la orden de '+name+', en la ciudad de México, firmando en este acto y deseando obligarse a partir de la siguiente fecha: '+$scope.contrato_compra_venta.fecha;
                    $scope.contrato_compra_venta.obligacion_comprador='“EL COMPRADOR” se obliga a pagar el precio total y realizar depósitos sólo a favor de SMD Servicios Médicos para Diagnóstico S.A. de C.V., en caso de que no haya pagado de contado deberá pagar a crédito y en todo caso se entenderá que la obligación de pago es exigible precisamente treinta días a partir de la firma de este contrato.  “EL COMPRADOR” se obliga a pagar en el Banco Santander S.A. en la cuenta: 65-50551327-7.'+
                    'Bajo su responsabilidad podrá pagar utilizando medios electrónicos de pago  con una operación interbancaria reconocida por el Banco de México, haciendo uso de la Clave Bancaria Estandarizada (CLABE) en Moneda Nacional a la CLABE: (0141806555055132776)'+
                    '\n Cuando “EL COMPRADOR” haya pagado o se hayan acordado las condiciones de pago a crédito, “'+$scope.cotizacion.organizacion+'” se obliga a entregar  el equipo en el siguiente domicilio: '+direccion;
                }//else x//else x
                $scope.contrato_compra_venta.leyenda_comprador=$scope.dorso($scope.contrato_compra_venta.organizacion,name,escritura,domicilio,rfc,lugarPago);
                //console.error($scope.contrato_compra_venta.leyenda_comprador);
                $scope.contrato_compra_venta.condicion_entrega='Condiciones de entrega y contacto: '+$scope.contrato_compra_venta.entrega+' '+$scope.cotizacion.contacto;
                $scope.contrato_compra_venta.condicion_adecuacion='Para estar en posibilidades de cumplir con la entrega, además de cumplir con las condiciones de pago “EL COMPRADOR”  se obliga a proporcionar el área y todas las condiciones eléctricas y técnicas necesarias.'+
                '\nEn los términos establecidos en el dorso de este contrato, “'+$scope.cotizacion.organizacion+'”, garantiza el equipo por un término de: '+$scope.cotizacion.garantia+' MESES.';
            $scope.contrato_compra_venta.id=$scope.id_contrato;
            $scope.contrato_compra_venta.anexo=$scope.anexo;
            $scope.contrato_compra_venta.leyenda_comprador=$scope.reverso;
                console.info($scope.contrato_compra_venta.id);

            });
        });
    }

    $scope.actualizar=function (){ console.info("ACTUALIZANDO");
        console.log($scope.contrato_compra_venta.anexo);
        console.log($scope.contrato_compra_venta.leyenda_equipo);
        contratosCompraVentaSrc.update($scope.contrato_compra_venta,function(data){
            window.location = '/contratos_compra_venta?numero_contrato_compra_venta='+$scope.contrato_compra_venta.numero_contrato_compra_venta;
        });
    }
    /*===================*/
    /*===================*/

    /*===================*/
    $scope.dorso=function(org,name,escritura,domicilio,rfc,lugar_pago){
        return 'CONTRATO DE COMPRA-VENTA con reserva de dominio que celebran por una parte '+name+', en su carácter de vendedor, representada por la persona señalada  en la parte inferior derecha de la carátula de este contrato, en lo sucesivo "'+org+'"; y por la otra parte el comprador con la personalidad establecida en la parte superior de la carátula del presente contrato en lo  sucesivo "EL COMPRADOR";\n\n'+
            'I.- DECLARA "'+org+'":\n'+
            'a)  Que es una sociedad legalmente constituida de conformidad con las Leyes Mexicanas, según consta la '+escritura+'; y dentro de su objeto jurídico se permite contratar en los términos de este contrato;\n'+
            'b)  Que su representante en este acto cuenta con las facultades necesarias para su celebración, mismas que a la fecha no le han sido limitadas o revocadas;\n'+
            'c)  Que en caso de que se firme este contrato, puede importar y vender el equipo que se describe en la caratula; y\n'+
            'd)  '+domicilio+'; mismo que señala para todos los fines y efectos legales que deriven del presente contrato, con el Registro Federal de Contribuyentes: '+rfc+'.\n\n'+
            'II.- DECLARA "EL COMPRADOR":\n'+
            'a)  Que actualmente realiza actividades comerciales y necesita el equipo descrito en la carátula;\n'+
            'b)  Que esta registrado ante la Secretaría de Hacienda con el Registro Federal de Contribuyentes (RFC) que se señala en la carátula de este contrato;\n'+
            'c)  Que su domicilio y correo electrónico utilizados para todos los actos, aún los de carácter personal son los que aparecen en la carátula del presente contrato; y\n'+
            'd)  Que conoce el domicilio de "'+org+'" y los lugares de pago establecidos en la carátula.\n\n'+
            'III.- DECLARAN LAS PARTES: Que se reconocen la personalidad con la que se ostentan y después de haber tenido a la vista los documentos que acreditan sus declaraciones, se someten a las siguientes:\n\n'+
            '    CLÁUSULAS \n\n'+
            'PRIMERA.- (OBJETO DEL CONTRATO)\n'+
            'Con el carácter de reserva de dominio "'+org+'" vende a "EL COMPRADOR", el equipo que se describe en la carátula de este contrato. Una vez acordadas las características generales del equipo, las partes proceden a firmar el contrato y se obligan en sus términos para cumplirlos en la forma señalada en las siguientes cláusulas. Por tratarse de una venta que se realiza bajo la modalidad de reserva de dominio, la propiedad del equipo médico no se transmitirá hasta en tanto "EL COMPRADOR" no haya cubierto la totalidad del precio a "'+org+'", más sus accesorios\n\n'+
            'SEGUNDA.- (PRECIO)\n'+
            'Las partes convienen que el precio de contado de la Compra-Venta, incluyendo el Impuesto al Valor Agregado (I.V.A.) es el que aparece como precio total en la carátula del presente contrato, obligándose "EL COMPRADOR" a pagarlo en los términos y lugares establecidos.\n\n'+
            'TERCERA.- (FORMA DE PAGO)\n'+
            'Para que "'+org+'" este en posibilidades de entregar el equipo, "EL COMPRADOR" se obliga a pagar el precio total de este contrato en la forma establecida en la carátula de este contrato o cualquiera de sus mensualidades en dólares norteamericanos o su equivalente en moneda nacional al tipo de cambio bancario a la venta vigente fijado por el Banco Nacional de México, S.A. (Banamex) al día en que se realice el pago.\n\n'+
            'Para el caso de que "'+org+'" haya autorizado a "EL COMPRADOR" pagar el precio total de este contrato a crédito, "EL COMPRADOR" se obliga a pagar el enganche antes de recibir el equipo y a realizar pagos consecutivos hasta completar el precio total, en el entendido de que el primer pago después del enganche será precisamente el día 30 (treinta) después de la fecha de entrega del equipo o según la fecha de la remisión de entrega del equipo y las mensualidades serán consecutivas a partir del primer pago sin que puedan interrumpirse por ninguna causa.\n\n'+
            'CUARTA.- (LUGAR DE PAGO)\n'+
            '"EL COMPRADOR" se obliga a realizar cualquier pago a favor de '+name+', dentro del horario que comprenderá de las 9:00 a las 18:00 horas, '+lugar_pago+', en todo caso se obliga a comprobar el pago con el recibo certificado correspondiente.\n\n'+
            'QUINTA.- (FALTA DE PAGO)\n'+
            'Convienen expresamente las partes que la falta de uno de los pagos descritos en la cláusula tercera y carátula de este contrato, originará que "'+org+'" haga exigible la totalidad del saldo insoluto que corresponda  a "EL COMPRADOR", y este último se obliga a pagar la cantidad adeudada más los intereses moratorios a razón del 5% mensual más el Impuesto al Valor Agregado (I.V.A.), calculados sobre el saldo insoluto, intereses que se seguirán generando hasta en tanto "EL COMPRADOR" no pague el precio total de este contrato. En este caso todos los pagos serán aplicados primero a los intereses moratorios más el Impuesto al Valor Agregado (I.V.A.) y después al capital adeudado.\n\n'+
            'SEXTA.- (RESERVA DEL DOMINIO)\n'+
            'Las partes convienen en que el presente contrato se realiza bajo la modalidad de reserva de dominio, razón por la que "'+org+'" seguirá conservando la propiedad del equipo hasta en tanto "EL COMPRADOR" no cubra la totalidad del precio, así como sus accesorios.\n\n'+
            'SEPTIMA.-(LUGAR DE ENTREGA Y DEPOSITO)\n'+
            'Después de la firma de este contrato "'+org+'" se obliga a importar el equipo e identificarlo con los números de serie que se relacionarán en la remisión de entrega, así como, entregarlo, instalarlo y ponerlo en operación en la dirección que aparece en la carátula, siempre que "EL COMPRADOR" cuente con el espacio y las especificaciones técnicas necesarias para el funcionamiento del equipo; en caso de que "EL COMPRADOR" no cuente con las condiciones, se tendrá por recibido el equipo y estará a su disposición en los almacenes de "'+org+'" o en el lugar acordado, bajo el riesgo y costo de "EL COMPRADOR".\n\n'+
            'Durante la vigencia de este contrato "EL COMPRADOR" se obliga a considerarse depositario a título gratuito a partir de que se reciba el equipo, aceptando y protestando dicho cargo de manera personal desde la firma del contrato, obligándose a desempeñar este cargo sin reservas y a mantener el equipo en el domicilio que aparece en la carátula del presente contrato, así mismo, en caso de atraso en los pagos se obliga a devolver el equipo al primer requerimiento que le haga "'+org+'", en términos de la primera fracción de la cláusula décima quinta de este contrato.\n\n'+
            'OCTAVA.- (VIGENCIA)\n'+
            'El presente contrato tendrá vigencia desde la firma y permanecerá vigente hasta que "EL COMPRADOR" termine de pagar el precio total del contrato y "'+org+'" reconozca haber recibido todas las cantidades que se relacionan en la carátula, más los intereses moratorios cuando haya atrasos en el pago. Las partes podrán terminar anticipadamente el contrato cuando "EL COMPRADOR" se encuentre al corriente con los pagos establecidos en la carátula y deje a favor de "'+org+'" los pagos realizados.\n\n'+
            'NOVENA.- (GARANTIA)\n'+
            '"'+org+'" garantiza el equipo materia del presente contrato contra cualquier defecto atribuible a la calidad de sus materiales, durante el tiempo establecido en la carátula de este contrato.\n\n'+
            'Para hacer efectiva esta garantía “EL COMPRADOR” se obliga a contactar por escrito al área de servicio técnico de "'+org+'" detallando la falla y solicitando su número de reporte; "'+org+'" se obliga  a levantar un acta pormenorizada de la falla o el defecto del equipo, obligándose a realizar un diagnóstico de la falla, repararlo o reemplazar cualquier parte del equipo en que se encontrara la falla sin ningún cargo por la mano de obra, refacciones o gastos. La garantía no podrá hacerse efectiva en los siguientes casos:\n\n'+
            'I.- Por encontrarse fuera del plazo señalado en la carátula de este contrato;\n'+
            'II.- Por transportación sin la intervención del personal de "'+org+'";\n'+
            'III.-Por operación de forma distinta a lo señalado en los manuales de operación y servicio;\n'+
            'IV.-Por revisar el equipo con personas y/o talleres de servicio distintos a los de "'+org+'";\n'+
            'V.- Por reemplazar componentes con otros no genuinos;\n'+
            'VI.-Por causarle daños al equipo por golpes, agregar líquidos, mal uso o negligencia;\n'+
            'VII.-Por daños causados por variaciones de voltaje y/o temperatura distinta a lo señalado en manuales.\n\n'+
            'Esta garantía estará vigente a partir de la fecha de entrega del equipo y por todo el tiempo establecido en la carátula de este contrato, pero terminado el plazo “EL COMPRADOR” se obliga a contratar con "'+org+'" un contrato de mantenimiento preventivo y correctivo por el tiempo que dure el crédito, hasta la liquidación del precio total.\n\n'+
            '"'+org+'" no estará obligado a cumplir con la garantía establecida en esta cláusula cuando “EL COMPRADOR” no pague en tiempo las mensualidades pactadas y se libera de responsabilidad en el funcionamiento del equipo por cualquier incumplimiento de “EL COMPRADOR”.\n\n'+
            'DECIMA. - (SEGUROS)\n'+
            'En caso de que el pago sea a crédito “EL COMPRADOR” se obliga no dañar el equipo y será responsable por el robo, pérdida parcial o total, debiendo contratar un seguro ante la compañía de su elección para el equipo médico, designando a "'+org+'" beneficiario del mismo, teniendo la obligación de mantener vigente el mismo, hasta en tanto no cubra la totalidad del precio.\n\n'+
            '“EL COMPRADOR” se obliga a contratar un seguro contra daños a terceros; en el entendido que será responsable del uso del equipo, evitando causar daños a terceros, liberando de cualquier responsabilidad a “'+org+'” por el mal uso.\n\n'+
            'DECIMA PRIMERA.- (REGISTRO DE CONTRATO)\n'+
            '“EL COMPRADOR” bajo su más estricta responsabilidad y costo se obliga a ratificar la suscripción y términos de este contrato ante Notario Público o Corredor Público.\n\n'+
            'DECIMA SEGUNDA .- (COMUNICADOS POR CORREO ELECTRONICO)\n'+
            '“EL COMPRADOR” se obliga a reconocer como recibidos, leídos y aceptados todos los comunicados que se hagan al correo electrónico (e-mail) que aparece en la carátula de este contrato, el cual podrá ser utilizado por "'+org+'" para enviarle cualquier información, propuesta, requerimiento o modificación a las obligaciones pactadas, surtiendo efectos desde el envío por parte de “'+org+'”. “EL COMPRADOR” podrá utilizar este medio para proponer modificaciones a sus obligaciones o derechos y sólo surtirán efectos cuando el representante legal de “'+org+'” las acepte ratificándolas con su firma autógrafa al calce. En caso de modificación o variación del correo electrónico “EL COMPRADOR” se obliga a notificarlo a "'+org+'", mientras tanto serán validados los comunicados al correo de este contrato.\n\n'+
            'DECIMA TERCERA.- (CANCELACION DE CONTRATO)\n'+
            '“EL COMPRADOR” podrá cancelar total o parcialmente el contrato, obligándose a pagar a "'+org+'", todos los gastos que implica la tramitación del pedido, así como, gastos de importación, gastos de instalación y desmontaje. En todo caso este pago por concepto de cancelación será de 30% del precio total del contrato, quedando autorizado "'+org+'" para descontarlo de la cantidad recibida por concepto de anticipo.\n\n'+
            '“EL COMPRADOR” se obliga a proporcionar todas las facilidades para la instalación del equipo y acondicionar el área con las especificaciones técnicas, eléctricas y ambientales solicitadas por "'+org+'" en las negociaciones previas a la firma del contrato o en los anexos del mismo. En caso contrario "'+org+'" podrá entregar el equipo fuera de los plazos establecidos en la carátula de este contrato sin responsabilidad por el atraso o podrá cancelar el contrato con los efectos del párrafo anterior.\n\n'+
            'DECIMA CUARTA.- (TRANSMISION DE DERECHOS)\n'+
            '“EL COMPRADOR” autoriza expresamente a "'+org+'" a transmitir total o parcialmente los derechos y obligaciones derivados de este contrato.\n\n'+
            'DECIMA QUINTA.- (INCUMPLIMIENTO)\n'+
            'Las partes  convienen expresamente que ante el incumplimiento de “EL COMPRADOR” de cualquiera de las obligaciones contenidas en este contrato, en especial la del pago, "'+org+'" podrá elegir por cualquiera de las siguientes opciones:\n\n'+
            'I.- Exigir la rescisión del presente contrato y “EL COMPRADOR” se obliga a no retener indebidamente el equipo y devolverlo a "'+org+'" ante cualquier requerimiento, así mismo, se obliga a pagar las reparaciones que necesite el equipo y a cubrir una renta mensual equivalente al 10% del precio total de este contrato, por cada mes que haya tenido en su posesión el equipo hasta la devolución total del mismo. Después de la devolución del equipo, las partes acuerdan que las cantidades entregadas a "'+org+'" por parte de “EL COMPRADOR” no generaran ningún interés y "'+org+'" se obliga a aplicarlas al pago total de las reparaciones y arrendamiento del equipo, en la inteligencia que si después de realizar las deducciones ya señaladas existiere un remanente en favor de “EL COMPRADOR”, "'+org+'" procederá a devolverlo; o\n\n'+
            'II.- Exigir el cumplimiento forzoso de este contrato lo cual significara que "'+org+'" tendrá derecho a exigir el pago total del saldo insoluto a “EL COMPRADOR”, así como exigir el pago de los intereses moratorios pactados en la clausula quinta de este contrato.\n\n'+
            'En caso de que "'+org+'" se vea obligado a solicitar extrajudicial o judicialmente el cumplimiento de este contrato “EL COMPRADOR” se obliga a pagar todos los gastos administrativos, de representación de honorarios y demás gastos judiciales que “'+org+'” tenga que erogar ante el incumplimiento de las obligaciones a cargo.\n\n'+
            'DECIMA SEXTA.- (REPRESENTANTES Y AVALES)\n'+
            'Los que firman la remisión en recepción y empleados se consideran representantes de “EL COMPRADOR”, asi mismo, se obligan solidariamente de todas y cada una de las obligaciones pactadas en este contrato, sin limitación alguna, renunciando a cualquier beneficio, de orden, excusión, excepción o cualquier otro que le pudiese corresponder.\n\n'+
            'DECIMA SEPTIMA.- (JURISDICCION)\n'+
            '"'+org+'" y “EL COMPRADOR” manifiestan conocer el contenido de la carátula y clausulas del presente contrato, sometiéndolas a la interpretación, jurisdicción, y competencia de los tribunales del fuero común del Distrito Federal, así como a la aplicación de sus leyes, renunciando a cualesquiera otra que les pudiere corresponder por razón de sus domicilios presentes o futuros. Leído que fue el presente contrato y enteradas las partes del contenido de la carátula y alcance de cada clausula lo aprueban en sus términos por no contener términos contrarios a la moral, al derecho o a las buenas costumbres, y conscientes de que el mismo no existe error, dolo, violencia, enriquecimiento ilegitimo o mala fe de ninguna de las partes, por ser la libre y soberana expresión de sus voluntades, lo celebran y firman en la Ciudad de México, en la fecha de la carátula del presente contrato.';
    }


}

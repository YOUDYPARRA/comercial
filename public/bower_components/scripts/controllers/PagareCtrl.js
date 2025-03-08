function PagareFnCtrl($timeout,$location,$scope,$controller,$filter,pagareSrc,contratosCompraVentaSrc,cotizacionPaqueteInsumoSrc){
    var self = this;
    angular.extend(this,$controller('NumeroAletraCtrl',{$scope:$scope}));
        
    $scope.pagare=     {
        'id':'',
        'id_cotizacion':'',
        'organizacion':'',
        'id_contrato_compra_venta':'',
        'lugar_suscripcion':'Ciudad de México',
        'fecha_suscripcion':"",
        'obligacion_suscriptor':"",
        'financiamiento':0,
        'forma_pago':'',
        'mensualidad':'',
        'fecha_pago':'',
        'falta_pago':'La falta del pago oportuno de alguno de los abonos pactados a que se refiere la tabla anterior, en su fecha de vencimiento, facultará al tenedor para dar por vencido anticipadamente el plazo para el pago de la totalidad del saldo insoluto de este PAGARE incluyendo el importe de todos los abonos restantes, desde entonces se causarán intereses moratorios mensuales a la tasa del ',
        'porcentaje':5,
        'controversia_suscripcion':'Para cualquier controversia que se suscite en relación con la suscripción, validez y pago de este PAGARE, el Suscriptor y el Aval se someten a la jurisdicción de los tribunales competentes en la Ciudad de México, renunciando expresamente a cualquier otro fuero que le corresponda o pudiere llegar a corresponderles por cualquier causa generadora de competencia territorial. \n\n El suscriptor se obliga incondicionalmente a pagar el premio de cambio de plaza después del primer requerimiento, a razón del 2% sobre el monto total a pagar, en caso de que el tenedor de este documento, tenga que requerir al suscriptor en una plaza distinta a la establecida para pago.',
        'aval':"",
        'moneda':"",
    };

    $scope.conf={
        headerCrear:"GENERAR NUEVO ",
        headerEditar:"ACTUALIZACION ",
        successEdit:"ACTUALIZAR",
        successCrea:"GUARDAR"
    };        
        
    $scope.eliminar=function (i){
        pagareSrc.delete({id:i.id},function(data){
               window.location = $location.absUrl();
        });
    }

    $scope.pagarePdf=function(){        //alert("CONSULTAR PDF");                       //console.log($scope.pagare); //CONSULTAR DATOS DE LA COTIZACION Y EQUIPOS
        cotizacionPaqueteInsumoSrc.get({id:$scope.pagare.id_cotizacion},function(data){                 //console.log(data);
            if(data.cotizacion!=undefined){                                                             console.log($scope.pagare);
                $scope.cotizacion=data.cotizacion;                                                      console.log($scope.cotizacion);
                $scope.openPagarePdf($scope.pagare,$scope.cotizacion);
            }else{
                alert('ERROR DE PETICION A SERVIDOR.');
            }
        },function (err) {
            alert('ERROR DE PETICION A SERVIDOR.');
        });
    }

    $scope.guardar=function (){                                                                         //console.log("GUARDAR EL ARCHIVO: " );
         if(confirm('¿DESEA GUARDAR EL PAGARE CORRESPONDIENTE AL NO DE CONTRATO: '+$scope.contrato_compra_venta.numero_contrato_compra_venta+' ?')){
            pagareSrc.save($scope.pagare,function(data){  console.info(data.msg);                                              //window.location = $location.absUrl();
                if(data.msg=='Success'){
                    $scope.save=true;
                }
            });
            alert("¡¡ Pagare guardado exitosamente !!");
         }else{alert("¡¡ Solicitud cancelada !!")}
    }
    
self.consultar=function (){
    pagareSrc.get({id:$scope.pagare.id},function(data){
       $scope.pagare=data.pagares; console.log($scope.pagare);
       cotizacionPaqueteInsumoSrc.get({id:$scope.pagare.id_cotizacion},function(data){                                        console.log(data.cotizacion);
        $scope.pagare.organizacion=data.cotizacion.organizacion;
        $scope.pagare.suscriptor=data.cotizacion.nombre_fiscal;
        $scope.pagare.direccion=data.cotizacion.calle_fiscal+' '+data.cotizacion.colonia_fiscal+' '+data.cotizacion.ciudad_fiscal;;
        $scope.pagare.moneda = data.cotizacion.tipo_moneda;
        $scope.calcPago($scope.pagare.fecha_suscripcion);
        if($scope.pagare.organizacion=="IMS"){
                            $scope.organizacion="IMAGES MEDICAL SUPPLIES, S.A. DE C.V.";
                        }else if($scope.pagare.organizacion=="SMH"){
                            $scope.organizacion="SUMINISTRO PARA USO MÉDICO Y HOSPITALARIO, S.A. de C.V.";
                        }else if($scope.pagare.organizacion=="SMD"){
                            $scope.organizacion="SMD SISTEMAS MÉDICOS PARA DIAGNOSTICO S.A. DE C.V.";
                        }
       //$scope.condiciones_pagare.obligacion_suscriptor=$scope.pagare.obligacion_suscriptor;
       });
    },function(err){alert('VERIFIQUE EL NUMERO DE PAGARE...');window.location='/cotizacionPaqueteInsumo'});
}

$scope.actualizar=function (){
        pagareSrc.update($scope.pagare,function(data){ console.info(data);
            if(data.msg=='Success'){
                    $scope.save=true;
                }
            //window.location = '/cotizacionPaqueteInsumo';            
        },function(err){
            alert('VERIFIQUE EL NUMERO DE PAGARE...');window.location='/cotizacionPaqueteInsumo';
        });
}



$scope.calcPago = function(d){
            //var n=365/12,m=0;
            var res = d.split("-");    console.log(res);
            var dia=res[0];                                          //console.log(dia);
            if(dia<3){
                var n=29,m=0;       console.log("n=29");
            }else{  
                var n=30.5,m=0;       console.log("n=30.5");
            }
            var i=0,j=1;;
            var mensualidad=parseInt($scope.pagare.mensualidad);
            var fechas=[];
            var fecha="";
            var fechaF="";
            var fec =res[2]+'-'+res[1]+'-'+res[0];
            var meses = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
            while(i < mensualidad){                                 //console.log(i);
            m=j*n;                                                  //console.log(m);
            fecha = $scope.sumaFecha(m,0,fec);                          //console.log(fecha);
            fechaF = fecha.split("-");                              //console.log(fechaF);
            fechas[i] = dia+" de "+fechaF[1]+" de "+fechaF[2];               console.log(fechas[i]);
            i++; 
            j++; 
            }
            $scope.fecha_pago=fechas;
            $scope.pagare.fecha_pago = fechas.toString();   //al teclear la fecha de suscripcion se verifica si mensualidad //es entero para calcular las fechas de pago y llenar el campo fecha_pago
}

$scope.sumaFecha = function(d,n,fec){
 var Fecha = new Date();
 var sFecha = fecha || (Fecha.getDate() + "-" + (Fecha.getMonth() +1) + "-" + Fecha.getFullYear());
 var sep = sFecha.indexOf('/') != -1 ? '/' : '-'; 
 var aFecha = sFecha.split(sep);
 var fecha = aFecha[2]+'-'+aFecha[1]+'-'+aFecha[0];
 fecha= new Date(fec);
 fecha.setDate(fecha.getDate()+(parseInt(d)+n));
 var anno=fecha.getFullYear();
 var mes= fecha.getMonth();//+1;
 var dia= fecha.getDate();
 var meses = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
 dia = (dia < 10) ? ("0" + dia) : dia; var fechaFinal = dia+sep+meses[mes]+sep+anno;
 return (fechaFinal);
 }

$scope.txtFaltaPago=function(){
    var letra_porcentaje=$scope.NumeroALetras($scope.pagare.porcentaje);            //$scope.pagare.falta_pago=$scope.condiciones_pagare.falta_pago+') sobre el saldo insoluto, hasta la fecha en que se efectúe el pago total del adeudo.';
    $scope.pagare.falta_pago=$scope.pagare.falta_pago+' '+$scope.pagare.porcentaje+'% ('+letra_porcentaje+' PORCIENTO) sobre el saldo insoluto, hasta la fecha en que se efectúe el pago total del adeudo.';
}

$scope.obligacion=function(){
                        var monto_pagare_letra = $scope.NumeroALetras($scope.pagare.financiamiento,$scope.pagare.moneda);
                        var mensualidad=parseInt($scope.pagare.mensualidad);
                        $scope.calcPago($scope.pagare.fecha_suscripcion);
                        if(mensualidad==1){
                            var texto_mensualidad="pago de $"; 
                            var relacion="con vencimiento como a continuacion se relaciona";
                        }else{
                            var texto_mensualidad="pagos mensuales, cada uno de $ ";
                            var relacion="cada uno con vencimiento como a continuacion se relacionan";
                        }
                        var numero_meses_letra = $scope.NumeroALetras(mensualidad);
                        var monto_mensual = parseFloat($scope.pagare.financiamiento)/mensualidad;
                        var monto_mensual_letra = $scope.NumeroALetras(monto_mensual,$scope.pagare.moneda);

                        $scope.pagare.obligacion_suscriptor="Por este PAGARE y por valor recibido, el suscriptor se obliga incondicionalmente a pagar a la orden  de "+$scope.organizacion+", precisamente en la Ciudad de México, D.F., la cantidad de $ "+$filter('number')(($scope.pagare.financiamiento), 2)+' '+$scope.pagare.moneda+' ('+monto_pagare_letra+')'+
                       ' a la vista o mediante '+mensualidad+' ('+numero_meses_letra+') '+texto_mensualidad+$filter('number')((monto_mensual), 2)+' '+$scope.pagare.moneda+' ('+monto_mensual_letra+') '+relacion+':';
}
/**===INICIA PROCESO PARA VERIFICAR EXISTENCIA DE ALTA DE PAGARE; VERIFICACION DEL DOCUMENTO PÁGARE ===**/
$scope.comprobarPagare=function(o){     console.log(o);      //COMPRUEBA QUE PRIMERO SE HAYA GENERADO EL CONTRATO DE COMPRA VENTA
        contratosCompraVentaSrc.get({id_cotizacion:o},function(data){    console.log(data);       //INICIA COMPROBACION CONTRATO
            var contrato=data;
            if(contrato.contratos_compra_venta.data[0]!= undefined || contrato.contratos_compra_venta.data.length>0){//SI HAY CONTRATO DE COMPRA VENTA //REVISAR SI EXISTE PAGARE
                pagareSrc.get({id_cotizacion:o},function(data){
                    var pagare=data.pagares;
                    if(pagare.data[0]!= undefined || pagare.data.length>0){//si existe un pagare                        //REDIRECCIONAR A EDITAR PAGARE.
                        window.location = '/pagares/'+pagare.data[0].id+'/edit';
                    }else{
                        if(confirm('¿DESEA GENERAR PAGARÉ?')){
                            window.location = '/pagares/create?id_cotizacion='+o;
                        }
                    }
                });
            }else{
                if(confirm('¿DESEA GENERAR UN CONTRATO DE COMPRA VENTA?')){
                    window.location = '/contratos_compra_venta/create?id_cotizacion='+o;
                }
            }
        });//FIN COMPROBAR CCV
}

/**===FINALIZA PROCEDIMIENTO PARA ALTA DE PAGARE===**/
    $timeout(function() {
        if($scope.pagare.vista===0){//CONSULTA CONTRATO DE COMPRA VENTA  PARA LLEBAR CAMPOS Y GENERAR PAGARE ...            //INICIA COMPROBACION CONTRATO
            contratosCompraVentaSrc.get({id_cotizacion:$scope.pagare.id_cotizacion},function(data){                 console.log(data);
                if(data.contratos_compra_venta.data!== undefined || data.contratos_compra_venta.data[0].length>0){//verifica si existe el contrato de compra venta
                    $scope.contrato_compra_venta =  data.contratos_compra_venta.data[0];            console.warn($scope.contrato_compra_venta);
                    $scope.pagare.id_contrato_compra_venta = $scope.contrato_compra_venta.id;
                    $scope.pagare.id_cotizacion = $scope.contrato_compra_venta.id_cotizacion;
                    $scope.pagare.fecha_suscripcion=$scope.contrato_compra_venta.fecha;
                    $scope.pagare.moneda=$scope.contrato_compra_venta.moneda;
                    $scope.pagare.mensualidad = $scope.contrato_compra_venta.mensualidad;                    //CONSULTAR COTIZACION
                    $scope.pagare.financiamiento = $scope.contrato_compra_venta.pagare;
                    cotizacionPaqueteInsumoSrc.get({id:$scope.pagare.id_cotizacion},function(data){                                                     console.log(data);
                    if(data.cotizacion!=undefined){
                        $scope.cotizacion=data.cotizacion;
                        $scope.pagare.organizacion=$scope.cotizacion.organizacion;
                        $scope.pagare.aval = $scope.cotizacion.aval;
                        $scope.pagare.suscriptor = $scope.cotizacion.nombre_fiscal;
                        $scope.pagare.direccion = $scope.cotizacion.calle_fiscal+' '+$scope.cotizacion.colonia_fiscal+' '+$scope.cotizacion.ciudad_fiscal;

                        if($scope.pagare.organizacion=="IMS"){
                            $scope.organizacion="IMAGES MEDICAL SUPPLIES, S.A. DE C.V.";
                        }else if($scope.pagare.organizacion=="SMH"){
                            $scope.organizacion="SUMINISTRO PARA USO MÉDICO Y HOSPITALARIO, S.A. de C.V.";
                        }else if($scope.pagare.organizacion=="SMD"){
                            $scope.organizacion="SMD SISTEMAS MÉDICOS PARA DIAGNOSTICO S.A. DE C.V.";
                        }
                        $scope.obligacion();
                        $scope.calcPago($scope.pagare.fecha_suscripcion);
                        $scope.txtFaltaPago();
                        //self.leyendaMensualidad();
                    }else {
                        alert('ERROR DE PETICION A SERVIDOR.');
                    }
                    },function (err) {
                        alert('ERROR DE PETICION A SERVIDOR.');
                    });                
                }else   {
                    alert('ERROR DE PETICION A SERVIDOR. VERIFICAR ERROR DE CONTRATO');
                }
            });
        }else if($scope.pagare.vista===1){//CONSULTAR Y CARGAR LOS DATOS DEL PAGARE...
            self.consultar();
        }
    }, 1000);
    
}
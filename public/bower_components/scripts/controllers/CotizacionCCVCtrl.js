'use strict';
angular.module('cotizacionApp')
.controller('CotizacionCCVCtrl',function (cotizacionCCV,contratosCompraVentaSrc,organizacion,cotizacionSrc,$window,direccionesSrc,terceroComercial,tercero,$scope,$timeout,$location,cotizacionPaqueteInsumoSrc,referenceBsrc)
    {
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
        $scope.objeto={
        "id":"",
        "contraentrega":"",
        "no_pedido":"",
        "financiamiento":"",
        "identificador":"",
        "dato":"",
        "nombre_cliente":"",
        "calle":"",
        "colonia":"",
        "c_p":"",
        "ciudad":"",
        "estado":"",
        "pais":"",
        "numero":"",
        "numero_exterior":"",

        "c_bpartner_id":"",
        "c_bpartner_location":"",
        "nombre_fiscal":"",
        "calle_fiscal":"",
        "colonia_fiscal":"",
        "c_p_fiscal":"",
        "ciudad_fiscal":"",
        "estado_fiscal":"",
        "pais_fiscal":"",
        "numero_fiscal":"",
        "rfc":"",

        "telefonos":"",
        "correos":"",
        "fax":"",
        "equipo":"",
        "marca":"",
        "modelo":"",
        "c_bpartner_id":"",
        "c_bpartner_location":"",
        "sucursal":"",
        "autor":"",
        "organizacion":"",
        "departamento":"VENTAS PRIVADO",
        "area":"COMERCIAL",
        "numero_cotizacion":"",
        "no_contrato":"",
        "fecha":"",
        "referenciados":"",
        "aval":"",
        "identificacion":"",
        "identificacionno":"",
        "escritura":"",
        "notario":"",
        "ciudadnotario":"",
        "numero_poder":"",
        "notario1":"",
        "ciudadnotario1":"",
        "entrega":"",
        "mensualidades":"",
        "aclaracion_dato_comprador":""
        };
        $scope.equipo_contrato=[],
        
        $scope.filtroTercero=function(){
            if($scope.tercero_filtro.nombre_fiscal.length>2){
                $scope.progress=true;
                $scope.cliente=terceroComercial.qry({nombre_fiscal:'*'+$scope.tercero_filtro.nombre_fiscal+'*'});
            }else{
                $scope.progress=true;
                $scope.clientes=tercero.qry($scope.tercero_filtro);
                console.log($scope.clientes);
            }                        
        }
        $scope.clienteClk=function(e){
            if(e.taxid!= undefined && e.taxid!= null){console.info(e);
                $scope.objeto.nombre_fiscal=e.bpartner_name;
                $scope.objeto.identificador=e.value;
                //$scope.objeto.referencia=e.value;
                //$scope.objeto.referenciados=e.value;
                $scope.objeto.rfc=e.taxid;
                $scope.objeto.organizacion=e.org_name;
                $scope.objeto.calle_fiscal=e.address1;
                $scope.objeto.colonia_fiscal=e.address2;
                $scope.objeto.c_p_fiscal=e.cp;
                $scope.objeto.ciudad_fiscal=e.city;
                $scope.objeto.estado_fiscal=e.region_name;
                $scope.objeto.pais_fiscal=e.country_name;
                //$scopobjeto.e.numero_fiscal=e.
                $scope.objeto.c_bpartner_location=e.c_bpartner_location_id;
                $scope.objeto.c_bpartner_id=e.c_bpartner_id;                    console.log(e.c_bpartner_id);
                referenceBsrc.get({c_bpartner_id:e.c_bpartner_id},function(data){ console.log(data);console.log(data.objetos.length);
                    var i=0;
                    while(i<data.objetos.length){
                        console.warn(data.objetos[i].bank_account_name);
                        var name = data.objetos[i].bank_account_name;
                        var s=name.search("870");
                        var s2=name.search("7234");
                        if(s>-1){ console.info(s);
                            $scope.objeto.referencia=data.objetos[i].reference;
                        }
                        if(s2>-1){console.info(s2);
                            $scope.objeto.referenciados=data.objetos[i].reference;
                        }
                        i++;
                    }
//$scope.objeto.referencia=
//$scope.objeto.referenciados=
                });
                direccionesSrc.get({id_tercero:e.c_bpartner_id,isshipto:'Y'},
                    function(d){
                        $scope.cliente.terceros=d.direcciones;
                        //console.log(d.direcciones.length);
                        if(d.direcciones!= undefined && d.direcciones.length==1){
                            $scope.objeto.calle=d.direcciones[0].address1;
                            $scope.objeto.colonia=d.direcciones[0].address2;
                            $scope.objeto.c_p=d.direcciones[0].cp;
                            $scope.objeto.ciudad=d.direcciones[0].city;
                            $scope.objeto.estado=d.direcciones[0].region_name;
                            $scope.objeto.pais=d.direcciones[0].country_name;
                            $scope.objeto.telefonos=d.direcciones[0].phone;
                            //$scopobjeto.e.numero_fiscal=d.direcciones.
                            //$scope.objeto.c_bpartner_location=d.direcciones[0].c_bpartner_location_id;
                            //$scope.objeto.c_bpartner_id=d.direcciones[0].c_bpartner_id;
                        }
                    }
                    ,function(e){alert(e.status+e.data)});
            }else if(e.name!= undefined && e.name!= null){
                $scope.objeto.nombre_cliente=e.name;
                $scope.objeto.calle=e.address1;
                $scope.objeto.colonia=e.address2;
                $scope.objeto.c_p=e.cp;
                $scope.objeto.ciudad=e.city;
                $scope.objeto.estado=e.region_name;
                $scope.objeto.pais=e.country_name;
                $scope.objeto.telefonos=e.phone;
                $scope.objeto.c_bpartner_location=e.c_bpartner_location_id;
                $scope.objeto.c_bpartner_id=e.c_bpartner_id;
                //$scope.cliente=tercero.qry({id:$scope.objeto.c_bpartner_id});
            }
        }//fin clienteFn
        /**ORGANIZACION**/
        $timeout(function() {
            $scope.filtro={
                organizacion:organizacion.qry(),
            }
            if($scope.id!=undefined){
            console.warn($scope.id);
            $scope.getCotizacion();
            }
        });

        $scope.getCotizacion=function(){console.info($scope.id);
            cotizacionPaqueteInsumoSrc.get({id:$scope.id},function(data){//CONSULTAR DATOS DE LA COTIZACION Y EQUIPOS
                $scope.objeto=data.cotizacion;
                $scope.objeto.c_p_fiscal=data.cotizacion.codigo_postal_fiscal;
                $scope.objeto.telefonos=data.cotizacion.telefono;
                $scope.equipo_contrato=data.cotizacion.insumos;
                var fec=data.cotizacion.fecha;
                        var fecha=fec.split('-'); console.info(fecha);
                        $scope.objeto.fecha=fecha[2].substring(0,2)+'-'+fecha[1]+'-'+fecha[0];
            //console.warn(data);
                
            });
        }

        $scope.verCotizacion=function(){
            if($scope.objeto.numero_cotizacion.length>0){
                cotizacionSrc.get({aprobacion:4,numero_cotizacion:$scope.objeto.numero_cotizacion},
                    function(r){
                        if(r.objetos.length>0){
                            alert('NO DEBE REPETIR EL # COTIZACION');
                            $scope.objeto.numero_cotizacion='';
                        }
                    });
            }
        }
        $scope.verCCV=function(){
            if($scope.objeto.no_contrato.length>0){
                contratosCompraVentaSrc.get({numero_contrato_compra_venta:$scope.objeto.no_contrato},
                    function(r){
                        if(r.contratos_compra_venta.data.length>0){
                            alert('NO DEBE REPETIR EL # CONTRATO');
                            $scope.objeto.no_contrato='';
                        }
                    });
            }
        }
        $scope.agrEquipo=function(){
            var e={
            cantidad:$scope.objeto.cantidad,
            codigo_proovedor:$scope.objeto.codigo_proovedor,
            //equipo:$scope.objeto.equipo,
            marca:$scope.objeto.marca,
            modelo:$scope.objeto.modelo,
            descripcion:$scope.objeto.descripcion
          };
          
          $scope.equipo_contrato.push(e);
        }
        $scope.salContrato=function(i){
            $scope.equipo_contrato.splice(i,1);
        }

        $scope.update=function(i){
            if($scope.equipo_contrato.length==0){alert("NO HA DEFINIDO NINGUN EQUIPO");}console.warn($scope.equipo_contrato.length);
            $scope.objeto.equipos=$scope.equipo_contrato;
            $scope.save=cotizacionCCV.modf($scope.objeto);
            if($scope.save){
                    $scope.msg='ACTUALIZADO CORRECTAMENTE';
                }
            console.warn($scope.save);
        }
        $scope.guardar=function(i){
            if($scope.equipo_contrato.length==0){alert("NO HA DEFINIDO NINGUN EQUIPO");}console.warn($scope.equipo_contrato.length);
                $scope.objeto.equipos=$scope.equipo_contrato;
                $scope.save=cotizacionCCV.crea($scope.objeto);
                if($scope.save){
                    $scope.msg='GUARDADO CORRECTAMENTE';
                }
            console.warn($scope.save);
        }

        $scope.total=function(total){
            /*if(total!=undefined){
                $scope.objeto.iva=total*0.16;
                $scope.objeto.subtotal=total-$scope.objeto.iva;
            }*/
        }

        $scope.subtotal=function(sub){
            if(sub!=undefined || sub!=''){
                $scope.objeto.iva=parseFloat(sub)*.16;
                $scope.objeto.total=parseFloat(sub)+parseFloat($scope.objeto.iva);
            }
        }

        $scope.anticipo=function(anticipo){
            var total=parseFloat($scope.objeto.total);
            var enganche=parseFloat(anticipo);
        if($scope.objeto.total == '' || $scope.objeto.total == undefined){alert("¡¡ FAVOR DE INGRESAR EL TOTAL DE LA COTIZACION !!");
        }else {
            if(anticipo != '' && $scope.objeto.contraentrega =='' && $scope.objeto.financiamiento == ''){
                if(enganche>total){alert("ENGANCHE NO DEBE SER MAYOR A MONTO TOTAL DE LA COTIZACION !!");}else{
                    if(enganche==total){                                            console.warn(enganche +'=='+ total);
                        $scope.objeto.pagare=$scope.objeto.total;
                            $scope.anticipo_porcentaje=100;
                            $scope.pagare_porcentaje=100;
                            $scope.contraentrega_porcentaje=0;
                            $scope.financiamiento_porcentaje=0;
                            $scope.objeto.contraentrega=0;
                            $scope.objeto.financiamiento=0;
                            $scope.objeto.mensualidades=1;
                        }else{
                            $scope.anticipo_porcentaje=(enganche*100)/total;        console.info($scope.anticipo_porcentaje);
                            $scope.objeto.pagare=$scope.objeto.total-enganche;
                            $scope.pagare_porcentaje=$scope.anticipo_porcentaje;
                            $scope.objeto.mensualidades=1;
                        }
                    }
                }
            }
        }

        $scope.contraentrega=function(contraentrega){                                                           console.log(contraentrega);
            var contraentrega=parseFloat(contraentrega);
            if($scope.objeto.total == '' || $scope.objeto.total == undefined){alert("¡¡ FAVOR DE INGRESAR EL TOTAL DE LA COTIZACION !!");
            }else {
                if(contraentrega != '' && $scope.objeto.anticipo != '' && $scope.objeto.financiamiento == ''){
                    var sumAntimasContra=parseFloat($scope.objeto.anticipo)+parseFloat(contraentrega);
                    if(sumAntimasContra==$scope.objeto.total){
                        $scope.objeto.financiamiento=0;
                        $scope.financiamiento_porcentaje=0;
                    }
                    $scope.objeto.pagare=parseFloat($scope.objeto.total)-parseFloat($scope.objeto.anticipo);
                    var dif_por=100-$scope.anticipo_porcentaje;                                                 console.log(dif_por);//ok
                    var dif_res=parseFloat($scope.objeto.total)-parseFloat($scope.objeto.anticipo)  ;           console.log(dif_res);
                    $scope.contraentrega_porcentaje=(contraentrega*dif_por)/dif_res;                            console.log($scope.contraentrega_porcentaje);
                    $scope.pagare_porcentaje=dif_por;
                }else{                                                                                          console.info("else contraentrega");
                    $scope.objeto.financiamiento=$scope.objeto.total-($scope.objeto.anticipo+$scope.objeto.contraentrega);
                    $scope.financiamiento_porcentaje=100-(parseFloat($scope.anticipo_porcentaje)+parseFloat($scope.contraentrega_porcentaje));
                }
            }
        }

        $scope.contraentregaTotal=function(){
            var contra=parseFloat($scope.objeto.anticipo)+parseFloat($scope.objeto.contraentrega);
            if(contra<$scope.objeto.total){
                $scope.objeto.financiamiento=$scope.objeto.total-contra;
                $scope.financiamiento_porcentaje=100-parseFloat($scope.anticipo_porcentaje)-parseFloat($scope.contraentrega_porcentaje);
            }
        }

        $scope.financiamientos=function(financia){ console.info(financia);
            var financia=parseFloat(financia);
            if($scope.objeto.total == '' || $scope.objeto.total == undefined){alert("¡¡ FAVOR DE INGRESAR EL TOTAL DE LA COTIZACION !!");
            }else {
                if((financia != '' || financia > 0) && ($scope.objeto.anticipo == '' || $scope.objeto.anticipo == 0 || $scope.objeto.anticipo == undefined) && ($scope.objeto.contraentrega == '' || $scope.objeto.contraentrega == 0 || $scope.objeto.contraentrega == undefined)){
                    if(financia==$scope.objeto.total){                    
                        $scope.objeto.pagare=$scope.objeto.total; console.warn("financia");
                        $scope.financiamiento_porcentaje=100; 
                        $scope.pagare_porcentaje=100;
                        $scope.objeto.mensualidades=1;
                    }
                    //else{                        alert("FAVOR DE VERIFICAR EL MONTO");                    }
                }
            }
        }

        $scope.finaciamientoTotal=function(){
            if(($scope.objeto.financiamiento != '' || $scope.objeto.financiamiento > 0) && ($scope.objeto.anticipo == '' || $scope.objeto.anticipo == 0 || $scope.objeto.anticipo == undefined) && ($scope.objeto.contraentrega == '' || $scope.objeto.contraentrega == 0 || $scope.objeto.contraentrega == undefined)){
                if($scope.objeto.financiamiento != $scope.objeto.total){
                    alert("FAVOR DE REVISAR EL MONTO DE FINANCIAMIENTO");
                }
            }
        }

$scope.validaPago=function(){
    if(($scope.objeto.financiamiento == '' || $scope.objeto.financiamiento == 0) && ($scope.objeto.anticipo == '' || $scope.objeto.anticipo == 0 || $scope.objeto.anticipo == undefined) && ($scope.objeto.contraentrega == '' || $scope.objeto.contraentrega == 0 || $scope.objeto.contraentrega == undefined)){
        alert("¡¡ FAVOR DE INGRESAR LA MODALIDAD DE PAGO !!");
    }
}

$scope.validaFecha =function (fecha){ //console.log(fecha);
        if(fecha == undefined || fecha ==''){alert("NO HA INGRESADO UNA FECHA, !! FAVOR DE VERIFICAR¡¡")}else{
            var dtCh= "-";
            var minYear=1900;
            var maxYear=2100;

    function isInteger(s){
        var i;
        for (i = 0; i < s.length; i++){
            var c = s.charAt(i);
            if (((c < "0") || (c > "9"))) return false;
        }
        return true;
    }

    $scope.stripCharsInBag =function (s, bag){
        var i;
        var returnString = "";
        for (i = 0; i < s.length; i++){
            var c = s.charAt(i);
            if (bag.indexOf(c) == -1) returnString += c;
        }
        return returnString;
    }
    $scope.daysInFebruary=function  (year){
        return (((year % 4 == 0) && ( (!(year % 100 == 0)) || (year % 400 == 0))) ? 29 : 28 );
    }

    $scope.DaysArray=function (n) {
        for (var i = 1; i <= n; i++) {
            this[i] = 31
            if (i==4 || i==6 || i==9 || i==11) {this[i] = 30}
            if (i==2) {this[i] = 29}
        }
        return this
    }
    $scope.isDate=function (dtStr){
        var daysInMonth = $scope.DaysArray(12)
        var pos1=dtStr.indexOf(dtCh)
        var pos2=dtStr.indexOf(dtCh,pos1+1)
        var strDay=dtStr.substring(0,pos1)
        var strMonth=dtStr.substring(pos1+1,pos2)
        var strYear=dtStr.substring(pos2+1)
        var strYr=strYear
        if (strDay.charAt(0)=="0" && strDay.length>1) strDay=strDay.substring(1)
        if (strMonth.charAt(0)=="0" && strMonth.length>1) strMonth=strMonth.substring(1)
        for (var i = 1; i <= 3; i++) {
            if (strYr.charAt(0)=="0" && strYr.length>1) strYr=strYr.substring(1)
        }
        var month=parseInt(strMonth)
        var day=parseInt(strDay)
        var year=parseInt(strYr)
        if (pos1==-1 || pos2==-1){
            return false
        }
        if (strMonth.length<1 || month<1 || month>12){
            return false
        }
        if (strDay.length<1 || day<1 || day>31 || (month==2 && day>$scope.daysInFebruary(year)) || day > daysInMonth[month]){
            return false
        }
        if (strYear.length != 4 || year==0 || year<minYear || year>maxYear){
            return false
        }
        if (dtStr.indexOf(dtCh,pos2+1)!=-1 || isInteger($scope.stripCharsInBag(dtStr, dtCh))==false){
            return false
        }
        return true
    }

    if($scope.isDate(fecha)){
        return true;    
    }else{
        //return false;
        alert("EL DATO INGRESADO NO ES UNA FECHA VALIDA, ¡¡FAVOR DE VERIFICAR!!");
    }
}
}


    })
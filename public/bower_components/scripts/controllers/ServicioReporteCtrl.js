'use strict';
angular.module('cotizacionApp')
.controller('servicioReporteCtrl',function (contratosSrc,$controller,$window,servicioReporteSrc,servicio,servicioSrc,cotizacionSrc,programacion,tercerosSrc,userSrc,reportesSrc,reporte,insumosSrc,direccionesSrc,terceroComercial,coordinacion,producto,tercero,$scope,$timeout,$location,programacionSrc)
    {
       // angular.extend(this,$controller('contratoCtrl',{$scope:$scope}));
        $scope.insumos=[];
        $scope.trabajo_horas=0;
        $scope.trabajo_tarde=0;
        $scope.trabajo_manana=0;
        $scope.ok=0;
        $scope.objeto={
        "id":"",
        "id_prestamo_refaccion":"",
        "id_cotizacion":"",
        "id_foraneo":"",
        "folio_contrato":"",
        "folio":"",//folio de reporte

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
        "c_bpartner_id":"",
        "c_bpartner_location":"",

        "telefonos":"",
        "correos":"",
        "fax":"",
        "equipo":"",
        "marca":"",
        "modelo":"",
        "numero_serie":"",        
        "nombre_responsable":"",
        "organizacion":"",
        "estatus":"",
        "fecha_inicio":"",
        "fecha_fin":"",
        "hora_atencion":"",
        "sucursal":"",
        "autor":"",        
        "coordinacion":"",        
        "instituto":"",
        "id_user":"",
        "iniciales":"",
        "email":"",
        "asistencia":"",
        "monto_gasto":"",
        "persona":[],
        "insumos":[]
    };
    $scope.horarios=[];
    $scope.persona=[];
    $scope.resul={
        grd:''
    };
        
        $timeout(function() {
              //console.log($location.absUrl());
            $scope.filtro={
                producto:producto.qry({vi:"1"}),
                coordinacion:coordinacion.qry({vi:"1"})
            };
            userSrc.get({vista:2},
            //userSrc.get({vista:2,area:'SERVICIO TECNICO'},
                function(d){
                    $scope.filtro.usuarios=d.usuarios;
                }
                ,function(e){alert('Error: '+e.status+' '+e.data);});
        });
        $timeout(function() {
              var y=$scope.id;
              var programacion=$scope.programacion;
              var servicio=$scope.servicio;

              var z=$scope.objeto.id;
              
              console.log(programacion);
              if(y>0){ 
                //console.log("UPDATE");
                  programacionSrc.get({id:y},function(d){                                   console.log(d);console.log(d.objeto);
                    $scope.objeto.persona=[];
                    $scope.objeto=d.objeto;
                    $scope.objeto.asistencia=d.objeto.personas_servicio[0].asistencia;
                    angular.forEach(d.objeto.personas_servicio, function(value, key) {      console.log(value);
                        $scope.persona.push(value.id_user);
                    });                                                                     console.log($scope.persona.a);
                  },function(e){alert('Error: '+e.status+' '+e.data);})                 
              }
              if(programacion>0){           console.log("HAY PROGRAMACION");                    //console.log('IR POR LA PROGRAMACION'+programacion);
                $scope.btnCarrito=true;
                //$scope.save=true;
                $scope.esc_datosTercero=true;                //$scope.esc_datosEquipo=true;
                $scope.ver_resueltoPor=true;
                programacionSrc.get({id:programacion},function(d){
                    $scope.objeto=d.objeto;
                    if(servicio!=''){
                        $scope.objeto.id=$scope.servicio;                        
                    }else{
                        $scope.objeto.id='0';
                    }
                    if(d.objeto.rel_cotizacion!= null){
                        $scope.objeto.numero_cotizacion=d.objeto.rel_cotizacion.numero_cotizacion;
                        $scope.objeto.id_cotizacion=d.objeto.rel_cotizacion.id;
                    }
                    $scope.objeto.nombre_responsable ="";
                    $scope.objeto.nota_cliente ="";
                    $scope.objeto.resuelto_por="";
                    $scope.objeto.programacion=programacion;
                    $scope.objeto.clase='S';
                    $scope.reporte=d.objeto.folio;
                    $scope.insumos=d.objeto.insumos;
                    angular.forEach(d.objeto.personas_servicio, function(value, key) {          //console.log(value);
                        $scope.persona.push(value.id_user);                                         //buscar el numero de la orden de servicio
                    });                                                                         //console.log(servicio);
                        /*
              $scope.objeto.fecha_atencion='03-08-2017';
              $scope.objeto.trabajo_realizado='SE INSTALA REFACCION';
              $scope.objeto.conclusion_trabajo='SE  DEJA EN OPTIMAS CONDICIONES';
              $scope.objeto.nombre_responsable='JUANITO';
                */
              $scope.horarios[0]={
                manana_entrada:'1:00',
                manana_salida :'1:00',
                tarde_entrada :'1:00',
                tarde_salida :'1:00',
                trabajo_horas :'1:00',
                viaje_horas :'1:00',
                total_horas :'1:00',
                espera:'1:00',
                fecha :'1:00',
                }
                $scope.horarios[1]={
                manana_entrada:'2:00',
                manana_salida :'2:00',
                tarde_entrada :'2:00',
                tarde_salida :'2:00',
                trabajo_horas :'2:00',
                viaje_horas :'2:00',
                total_horas :'2:00',
                espera:'2:00',
                fecha :'2:00',
                }
                    },function(er){alert('ERROR: '+er.status+' '+er.data);});
              }

            //}
        },3000);
        $scope.guardar=function(){
                //console.log($scope.horarios.length);
            if($scope.horarios.length==0){alert("No ha ingresado el horario de trabajo");}else{
                $scope.objeto.persona=$scope.persona;
                $scope.objeto.horarios=$scope.horarios;
                //$scope.objeto.insumos=$scope.insumos;
                $scope.objeto.estatus="CAPTURADO";
                $scope.objeto.calificacion="CAPTURADO";
                console.log($scope.objeto.monto_gasto);
                $scope.objeto.fecha_captura="1";
                //console.log("SAVE NEW");console.log($scope.objeto);
                $scope.rsl=servicioReporteSrc.save($scope.objeto,function(){},
                    function(e){
                        if(e.status=='422'){
                            var msg='';
                            angular.forEach(e.data,function(value, key){
                                msg=msg+','+value;
                            });
                                alert(msg);

                        }else{
                            alert('Error: '+e.status+' '+e.data);
                        }
                    }
                ); 
                if($scope.rsl){ console.log("ok");
                   $scope.save=true;
                }   
            }
        };

        $scope.redirect = function () {
            window.location.href="http://" + $window.location.host + "/servicios";
        };
        
        $scope.agrHora=function(){
            //console.log($scope.espera);
            //console.log('AGREGAR HORA');
            var i=0;
            if($scope.manana_entrada!=undefined){i++;}
            if($scope.manana_salida!=undefined){i++;}
            if($scope.tarde_entrada!=undefined){i++;}
            if($scope.tarde_salida!=undefined){i++;}
            //console.log(i);
            if(i<2){alert("FAVOR DE VERIFICAR LA HORA DE ENTRADA Y SALIDA");}else{
            if(($scope.trabajo_horas==undefined || $scope.trabajo_horas=="") || ($scope.viaje_horas==undefined||$scope.viaje_horas=="") || ($scope.fecha==undefined||$scope.fecha==""))
                {alert("FAVOR DE VERIFICAR DATOS EN HORARIOS");}else{
                    $scope.dia24=parseFloat($scope.trabajo_horas)+parseFloat($scope.viaje_horas);console.log($scope.dia24);
                    if($scope.dia24>24){alert("FAVOR DE VERIFICAR TOTAL DE HORAS");}else{
                        $scope.horarios.push({
                            manana_entrada:$scope.manana_entrada, 
                            manana_salida:$scope.manana_salida, 
                            tarde_entrada:$scope.tarde_entrada, 
                            tarde_salida:$scope.tarde_salida, 
                            trabajo_horas:$scope.trabajo_horas, 
                            viaje_horas:$scope.viaje_horas,
                            espera:$scope.espera,
                            total_horas:0, 
                            fecha:$scope.fecha 
                        });
                        //$scope.save=false;
                }
            //console.log($scope.horarios.length);
            }
            }
        };

        $scope.evaltSalida=function() {//alert("validando:"+$scope.tarde_entrada+">"+$scope.tarde_salida);
            if($scope.tarde_entrada>$scope.tarde_salida){
                alert("LA HORA DE TARDE SALIDA NO DEBE SER MENOR A LA HORA DE ENTRADA ");
                $scope.tarde_salida=0;
            }else
                console.info("OK");
        }

        $scope.evaltEntrada=function() {//alert("validando:"+$scope.manana_salida+">"+$scope.tarde_entrada);
            if($scope.manana_salida>$scope.tarde_entrada){
                alert("LA HORA DE TARDE ENTRADA NO DEBE SER MENOR A LA HORA DE MANANA SALIDA ");
                $scope.tarde_entrada=0;
            }else
                console.info("OK");
        }

        $scope.evalmSalida=function() {//alert("validando:"+$scope.manana_entrada+">"+$scope.manana_salida);
        $scope.manana_entrada=parseFloat($scope.manana_entrada);
        $scope.manana_salida=parseFloat($scope.manana_salida);
            if($scope.manana_entrada>$scope.manana_salida){
                alert("LA HORA DE SALIDA NO DEBE SER MENOR A LA DE HORA DE ENTRADA");
                $scope.manana_salida=0;
            }else
                console.info("OK");
        }
        $scope.validarManana=function(){
            if(($scope.manana_entrada!=undefined || $scope.manana_entrada!="") && ($scope.manana_salida!=undefined || $scope.manana_salida!="")){ console.log("a");
                $scope.trabajo_manana=parseFloat($scope.manana_salida) - parseFloat($scope.manana_entrada); console.info($scope.trabajo_manana);
            }
            if(($scope.manana_entrada!=undefined || $scope.manana_entrada!="") && ($scope.manana_salida!=undefined || $scope.manana_salida!="") && ($scope.tarde_entrada==undefined || $scope.tarde_entrada=="") && ($scope.tarde_salida!=undefined || $scope.tarde_salida=="")){ console.log("b");
                $scope.trabajo_manana=$scope.manana_salida - $scope.manana_entrada;console.info($scope.trabajo_manana);
            }
            $scope.trabajo_horas=$scope.trabajo_manana;
            //$scope.trabajo_horas=$scope.trabajo_manana+$scope.trabajo_tarde;
        }

        $scope.validarTarde=function(){

            if(($scope.tarde_entrada!=undefined || $scope.tarde_entrada!="") && ($scope.tarde_salida!=undefined || $scope.tarde_salida!="")){ console.log("c");
                $scope.trabajo_tarde=$scope.tarde_salida - $scope.tarde_entrada;
            }
            if(($scope.tarde_entrada!=undefined || $scope.tarde_entrada!="") && ($scope.tarde_salida!=undefined || $scope.tarde_salida!="") && ($scope.manana_entrada==undefined || $scope.manana_entrada=="") && ($scope.manana_salida==undefined || $scope.manana_salida=="")){ console.log("d");
                $scope.trabajo_tarde=$scope.manana_salida - $scope.manana_entrada;console.info($scope.trabajo_manana);
            }
           // if(($scope.tarde_entrada!=undefined || $scope.tarde_entrada!="") && ($scope.tarde_salida!=undefined || $scope.tarde_salida!="") && ($scope.manana_entrada!=undefined || $scope.manana_entrada!="") && ($scope.manana_salida!=undefined || $scope.manana_salida!="")){ console.log("c");
           // $scope.trabajo_horas=$scope.trabajo_manana+$scope.trabajo_tarde;
           // }
            $scope.trabajo_horas=$scope.trabajo_manana+$scope.trabajo_tarde;
        }

        $scope.validarHorarios=function(){
            //console.log($scope.manana_entrada);
            //console.log($scope.manana_salida);
            if(($scope.tarde_entrada!=undefined || $scope.tarde_entrada!="") && ($scope.tarde_salida!=undefined || $scope.tarde_salida!="")){   console.log("b");
                $scope.trabajo_horas=$scope.tarde_salida - $scope.tarde_entrada;
            }//else 
            /*
            if($scope.manana_entrada!=undefined && $scope.tarde_salida!=undefined){console.log("c");
                $scope.trabajo_horas=parseInt($scope.tarde_salida)-parseInt($scope.mañana_entrada);
            }//else 
            if(($scope.manana_entrada!=undefined || $scope.manana_entrada!="") && ($scope.manana_salida!=undefined || $scope.manana_salida!="") && ($scope.tarde_entrada!=undefined || $scope.tarde_entrada!="") && ($scope.tarde_salida!=undefined || $scope.tarde_salida!="")){console.log("d");
                $scope.trabajo_horas=($scope.manana_salida - $scope.manana_entrada) + ($scope.tarde_salida - $scope.tarde_entrada);
            }//else*/
        }

        $scope.remover=function(j,tipo){    
            if(confirm("¿ DESEA ELIMINAR EL OBJETO SELECCIONADO?")){
                if(tipo=="h"){
                    $scope.horarios.splice(j,1);       
                }else{
                    $scope.insumos.splice(j,1);       
                }
            }else{
                alert("¡ Accion Cancelada !");
            }
        }

        $scope.setTotals = function(item){     console.log(item);
            item.total_horas = (parseInt(item.trabajo_horas)+parseInt(item.viaje_horas));
            //$scope.total_horas += item.total;   
            console.log(item.total_horas);
        }

        $scope.equipos =function(seleccionado){   console.log(seleccionado);      //OK
  if(confirm("¿Desea agregar el insumo seleccionado?")){
$scope.btnCarrito=false;
$scope.cantidad=1;
$scope.codigo_proovedor=seleccionado.codigo_proovedor;
$scope.unidad_medida=seleccionado.unidad_medida;
$scope.descripcion=seleccionado.descripcion;
$scope.seleccionado=seleccionado;
}else{alert("! ACCION CANCELADA ¡")}
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
}// FIN VALIDAR FECHA
$scope.filtroCotizacion=function(){
            if($scope.objeto.numero_cotizacion.length>0){
                cotizacionSrc.get({buscar:'1',numero_cotizacion:$scope.objeto.numero_cotizacion,aprobacion:'4'},
                    function(d){
                        if(d.objetos.length>0){
                            $scope.objeto.id_cotizacion=d.objetos[0].id;
                        }else{
                            alert('NÚMERO DE COTIZACION NO VALIDO');
                        }
                    }
                    ,function(e){alert(e.status+e.data)});
                
            }
        }
$scope.filtroContrato=function(){
    if($scope.objeto.folio_contrato.length>0){
        contratosSrc.get({v:'2',instituto:$scope.objeto.folio_contrato},
            function(d){
                //console.log('->'+d.objetos.length);
                if(d.objetos.length==0){
                    //$scope.objeto.folio_contrato=d.objeto.instituto;
                    $scope.objeto.folio_contrato='';
                    //alert('VERIFICAR CONTRATO');
                }
            }
            ,function(e){alert(e.status+e.data)});
        
    }
}

})
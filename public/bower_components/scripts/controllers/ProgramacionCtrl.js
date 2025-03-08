'use strict';
angular.module('cotizacionApp')
.controller('programacionCtrl',function (contratosSrc,$window,cotizacionSrc,programacion,tercerosSrc,userSrc,reportesSrc,reporte,insumosSrc,direccionesSrc,terceroComercial,coordinacion,producto,tercero,$scope,$timeout,$location,programacionSrc,cotizacionPaqueteInsumoSrc){
    $scope.objeto={
        "id":"",
        "id_prestamo_refaccion":"",
        "id_cotizacion":"",
        "id_cliente":"",
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
        "persona":[]
    };

    $scope.persona=[];
    $scope.resul={
        grd:''
    };

    $scope.condiciones_servicio=programacion.condiciones_servicio;
    
    $scope.condiciones_servicio=[
        {nombre:'ORDEN DE TRABAJO'},
        {nombre:'ORDEN DE TRABAJO COMERCIAL'},
        {nombre:'ORDEN DE TRABAJO CORTESIA'},
        {nombre:'CONTRATO'},
        {nombre:'FACTURAR'},
        {nombre:'FACTURAR VIP'},
        {nombre:'GARANTIA'},
        {nombre:'GARANTIA SERVICIO'},
        {nombre:'GARANTIA COMERCIAL'},
        {nombre:'MONTAJE'}
    ];

    $scope.cotizaciones=[];

    $scope.asistencias=[
        {nombre:'OFICINA'},
        {nombre:'SITIO CLIENTE'}
    ];
    
    $scope.tipos_servicio=[
        {nombre:'MONTAJE DE EQUIPO'},
        {nombre:'DESMONTAJE DE EQUIPO'},
        {nombre:'CAPACITACION'},
        {nombre:'CALIBRACION'},
        {nombre:'CONFIGURACION'},
        {nombre:'REVISION Y DIAGNOSTICO'},
        {nombre:'MANTENIMIENTO PREVENTIVO'},
        {nombre:'MANTENIMIENTO CORRECTIVO'},
        {nombre:'PRUEBAS RADIOLOGICAS'},
        {nombre:'LEVANTAMIENTO DE AREA'},
        {nombre:'SUPERVISION DE AREA'},
        {nombre:'ENTREGA DE ADECUACION'},
        {nombre:'ELABORACION DE GUIA MECANICA'},
        {nombre:'ENTREGA DE GUIA MECANICA'},
        {nombre:'ELABORACION DE PRESUPUESTO'},
        {nombre:'TRABAJO ADMINISTRATIVO'},
        {nombre:'ENTREGA DE REFACCION'}
    ];

    $scope.sucursales=[
        {nombre:'BJ'},
        {nombre:'GDL'},
        {nombre:'MTY'},
        {nombre:'MER'},
        {nombre:'MX'}
    ];

    $scope.rsl={};
    $scope.fiscal={};
    $scope.tercero_filtro={
            nombre_fiscal:'',
            group_name:''
    };

    $scope.reset=function(){
        $scope.objeto={    
        "id":"",
        "id_prestamo_refaccion":"",
        "id_cotizacion":"",
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
        "asistencia":""
        };
    }

    $scope.clienteClk=function(e){
        if(e.taxid!= undefined && e.taxid!= null){
                $scope.objeto.nombre_fiscal=e.bpartner_name;
                $scope.objeto.rfc=e.taxid;
                $scope.objeto.calle_fiscal=e.address1;
                $scope.objeto.colonia_fiscal=e.address2;
                $scope.objeto.c_p_fiscal=e.cp;
                $scope.objeto.ciudad_fiscal=e.city;
                $scope.objeto.estado_fiscal=e.region_name;
                $scope.objeto.pais_fiscal=e.country_name;//$scopobjeto.e.numero_fiscal=e.
                $scope.objeto.c_bpartner_location=e.c_bpartner_location_id;
                $scope.objeto.c_bpartner_id=e.c_bpartner_id;

                direccionesSrc.get({id_tercero:e.c_bpartner_id,isshipto:'Y'},function(d){
                        $scope.cliente.terceros=d.direcciones;                        //console.log(d.direcciones.length);
                        if(d.direcciones!= undefined && d.direcciones.length==1){
                            $scope.objeto.calle=d.direcciones[0].address1;
                            $scope.objeto.colonia=d.direcciones[0].address2;
                            $scope.objeto.c_p=d.direcciones[0].cp;
                            $scope.objeto.ciudad=d.direcciones[0].city;
                            $scope.objeto.estado=d.direcciones[0].region_name;
                            $scope.objeto.pais=d.direcciones[0].country_name;
                            $scope.objeto.telefonos=d.direcciones[0].phone;                            //$scopobjeto.e.numero_fiscal=d.direcciones.
                            $scope.objeto.id_cliente=d.direcciones[0].c_bpartner_location_id;                            //$scope.objeto.c_bpartner_id=d.direcciones[0].c_bpartner_id;
                        }
                    },function(e){
                        alert(e.status+e.data)
                });
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
                $scope.objeto.c_bpartner_id=e.c_bpartner_id;                                           //$scope.cliente=tercero.qry({id:$scope.objeto.c_bpartner_id});
        }
    }//fin clienteFn

    $scope.direccion_filtro={
        id_tercero:'',
        name:'',
        isshipto:''
    };

    $scope.filtroTercero=function(){
        if($scope.tercero_filtro.nombre_fiscal.length>2){                
            $scope.cliente=terceroComercial.qry({nombre_fiscal:'*'+$scope.tercero_filtro.nombre_fiscal+'*'});                        //$scope.cliente=tercero.qry({nombre_fiscal:'*'+$scope.tercero_filtro.nombre_fiscal+'*'});
        }else{
            $scope.clientes=tercero.qry($scope.tercero_filtro);
        }
    }

    $scope.filtroMarca=function(){
        insumosSrc.get({vista:'3',tipo_equipo:$scope.objeto.equipo,bandera:'E'},function(d){
                    $scope.filtro.marcas=d.objetos;
        },function(e){alert(e.status+e.data)});
    }

    $scope.filtroCotizacion=function(){
        if($scope.objeto.numero_cotizacion.length>0){
            cotizacionSrc.get({buscar:'1',numero_cotizacion:$scope.objeto.numero_cotizacion,aprobacion:'4'},function(d){
                if(d.objetos.length>0){
                    $scope.objeto.id_cotizacion=d.objetos[0].id;
                }else{
                    alert('NÚMERO DE COTIZACION NO VALIDO');
                }
            },function(e){alert(e.status+e.data)});
        }
    }

    $scope.filtroContrato=function(){
        if($scope.objeto.instituto.length>0){
            contratosSrc.get({v:'2',instituto:$scope.objeto.instituto},function(d){        //console.log('->'+d.objetos.length);
                if(d.objetos.length==0){                                                //$scope.objeto.instituto=d.objeto.instituto;
                    $scope.objeto.instituto='';                                         //alert('VERIFICAR CONTRATO');
                }else{
                 //   console.log(d.objetos[0]);
                    $scope.objeto.folio_contrato=d.objetos[0].folio_contrato;
                }
            },function(e){alert(e.status+e.data)});        
        }
    }

    $scope.filtroModelo=function(){
        insumosSrc.get({vista:'4',marca:$scope.objeto.marca,bandera:'E'},function(d){
            $scope.filtro.modelos=d.objetos;
        },function(e){alert(e.status+e.data)});
    }

    $timeout(function() {                                                                   //console.log($location.absUrl());
        $scope.filtroMarca();
        $scope.filtroModelo();
        $scope.filtro={
            producto:producto.qry({vi:"1"}),
            coordinacion:coordinacion.qry({vi:"1"})
        };

        userSrc.get({vista:2},function(d){                                                  console.log(d.usuarios) //userSrc.get({vista:2,area:'SERVICIO TECNICO'},
                $scope.usuarios=d.usuarios;
                $scope.crear=true;
        },function(e){alert('Error: '+e.status+' '+e.data);});
    });

    $timeout(function(){
        var y=$scope.id;
        var x=$scope.id_reporte;
        if(y>0){                                                                            console.log("UPDATE");
            $scope.update=true;
            $scope.crear=false;
            programacionSrc.get({id:y},function(d){                                         console.log(x);console.log(d.objeto);
                $scope.objeto.persona=[];
                $scope.objeto=d.objeto;                                                     console.info(d.objeto.id_cotizacion);
                var id_cotizacion=d.objeto.id_cotizacion.split(",");                        //console.info(id_cotizacion);
                var i=0;
                    $scope.objeto.id_cotizacion=id_cotizacion;                              //console.log($scope.objeto.id_cotizacion);

                /*while(i<id_cotizacion.length){
                    cotizacionPaqueteInsumoSrc.get({id:id_cotizacion[i]},function(data){    console.info(data.cotizacion);
                        $scope.cotizaciones.push({
                            id:data.cotizacion.id,
                            numero_cotizacion:data.cotizacion.numero_cotizacion,
                            version:data.cotizacion.version,
                        });
                    });
                    i++;
                }*/

                var f_i=d.objeto.fecha_inicio.split("-");
                $scope.fec_ini=f_i[2]+"-"+f_i[1]+"-"+f_i[0]+" 00:00:00";
                var f_f=d.objeto.fecha_fin.split("-");
                $scope.fec_fin=f_f[2]+"-"+f_f[1]+"-"+f_f[0]+" 00:00:00";

                $scope.objeto.asistencia=d.objeto.personas_servicio[0].asistencia;
                angular.forEach(d.objeto.personas_servicio,function(value, key) {          //console.log(value);
                    $scope.persona.push(value.id_user);
                });                                                                         //console.log($scope.persona.a);
            
                reportesSrc.get({id:d.objeto.id_foraneo},function(r){                       console.log(r.objeto.r_cotizaciones);
                    if(r.objeto.r_cotizaciones.length>0){                                      
                        $scope.cotizaciones=r.objeto.r_cotizaciones;
                       // $scope.objeto.numero_cotizacion=r.objeto.r_cotizacion.numero_cotizacion;
                       // $scope.objeto.id_cotizacion=r.objeto.r_cotizacion.id;
                    }
                },function(e){
                    $scope.resetFiscal(); 
                    alert('Error: '+e.status+' '+e.data);
                })        
            },function(e){
                alert('Error: '+e.status+' '+e.data);
            })                         //FIN CONSULTA NUMERO DE COTIZACION            
        }

        if(x>0){                        //GENERAR NUEVO PROGRAMACION
            $scope.esc_datosTercero=true;
            $scope.esc_datosEquipo=false;
            reportesSrc.get({id:x},function(d){ 
                $scope.objeto=d.objeto;                                                     console.log(d.objeto);//                      //tercerosSrc.get({nombre_fiscal:'ALGUN OTRO NOMBRE QUE NO EXISTE'},
                $scope.cotizaciones=d.objeto.r_cotizaciones;
                var f_i=$scope.objeto.fecha_inicio.split("-");                              //console.log(f_f_i_c);
                $scope.fec_ini=f_i[2]+"-"+f_i[1]+"-"+f_i[0]+" 00:00:00"; 
                var f_f=$scope.objeto.fecha_fin.split("-");                                 //console.log(f_f_i_c);
                $scope.fec_fin=f_f[2]+"-"+f_f[1]+"-"+f_f[0]+" 00:00:00"; 
                if(d.objeto.r_cotizacion!= undefined){
                    $scope.objeto.numero_cotizacion=d.objeto.r_cotizacion.numero_cotizacion;
                    //$scope.objeto.id_cotizacion=d.objeto.r_cotizacion.id;
                }                                                                           //inicio ir por nombre fiscal para comprobar q sea validado
                tercerosSrc.get({nombre_fiscal:$scope.objeto.nombre_fiscal},function(r){
                    if(r.terceros.length==0){
                        $scope.resetFiscal();
                        alert('LOS DATOS FISCALES NO SON VALIDOS');
                    }
                },function(e){
                    alert('Error: '+e.status+' '+e.data);
                });                                                                         //FIN ir por nombre fiscal para comprobar q sea validado
                if($scope.objeto.numero_serie.length>0){
                    contratosSrc.get({v:1,numero_serie:$scope.objeto.numero_serie},function(d){
                        $scope.contratos=d.objetos;
                    },function(e){alert('Error: '+e.status+' '+e.data);})
                }
            },function(e){
                $scope.resetFiscal(); 
                alert('Error: '+e.status+' '+e.data);
            })
        }
    },3000);

    $scope.getContrato=function(){
        if($scope.objeto.numero_serie.length>0){
            contratosSrc.get({v:1,numero_serie:$scope.objeto.numero_serie},function(d){
                $scope.contratos=d.objetos;
            },function(e){
                alert('Error: '+e.status+' '+e.data);
            })
        }
    }
        
    $scope.guardar=function(){                                                                                 //console.log($scope.objeto);        console.log($scope.objeto.id_cotizacion);
        var cadena=$scope.objeto.id_cotizacion;
        $scope.objeto.id_cotizacion=cadena.toString();                                                           console.log($scope.objeto.id_cotizacion);
        if($scope.id>0){
            $scope.objeto.persona=$scope.persona;
            $scope.rsl=programacion.modf($scope.objeto);
            if($scope.rsl.msg=="Success" || $scope.rsl.msg=='GUARDADO CORRECTAMENTE'){                          // $scope.redirect();
                $scope.save=true;            
            }else{
                $scope.save=false;
            }
        }else{
            programacionSrc.save($scope.objeto,function(data){
                $scope.save=true;   
                $scope.msg='GUARDADO CORRECTAMENTE';
            },function(e){
            if(e.status=='422'){
                var msg='';
                angular.forEach(e.data,function(value, key){
                    msg=msg+','+value;
                });
                $scope.save=false;
                    alert(msg);                                                                                 //return msg;
            }else{
                alert('Error: '+e.status+' '+e.data);                                                           //return 'Error: '+e.status+' '+e.data;
            }
            });      
        }   
    }

    $scope.redirect = function () {
        window.location.href="http://" + $window.location.host + "/programaciones";
    };

    $scope.resetEntrega=function(){
        $scope.objeto.nombre_cliente="";
        $scope.objeto.calle="";
        $scope.objeto.colonia="";
        $scope.objeto.c_p="";
        $scope.objeto.ciudad="";
        $scope.objeto.estado="";
        $scope.objeto.pais="";
        $scope.objeto.numero="";
        $scope.objeto.numero_exterior="";
        $scope.objeto.c_bpartner_id="";
        $scope.objeto.c_bpartner_location="";
    }
        
    $scope.resetFiscal=function(){
        $scope.objeto.nombre_fiscal="";
        $scope.objeto.calle_fiscal="";
        $scope.objeto.colonia_fiscal="";
        $scope.objeto.c_p_fiscal="";
        $scope.objeto.ciudad_fiscal="";
        $scope.objeto.estado_fiscal="";
        $scope.objeto.pais_fiscal="";
        $scope.objeto.numero_fiscal="";
        $scope.objeto.rfc="";
        $scope.objeto.c_bpartner_id="";
        $scope.objeto.c_bpartner_location="";
    }

    $scope.select_fec_ini=function(date){
        $scope.objeto.fecha_inicio=moment(date).format('DD-MM-YYYY');  
    }

    $scope.select_fec_fin=function(date){
        $scope.objeto.fecha_fin=moment(date).format('DD-MM-YYYY');  
    }
        
    $scope.validaFecha =function (fecha){                                   //console.log(fecha);
        if(fecha == undefined || fecha ==''){
            alert("NO HA INGRESADO UNA FECHA, !! FAVOR DE VERIFICAR¡¡");
        }else{
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
            }else{                                                                          //return false;
                alert("EL DATO INGRESADO NO ES UNA FECHA VALIDA, ¡¡FAVOR DE VERIFICAR!!");
            }
        }
    }// FIN VALIDAR FECHA
})
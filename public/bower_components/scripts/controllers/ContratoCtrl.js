'use strict';
angular.module('cotizacionApp')
.controller('contratoCtrl',function (contratosSrc,terceroComercial,contrato,coordinacion,tercero,direccionesSrc,$scope,$timeout,$location,producto,insumosSrc)
    {
        $scope.equipos_f=[];
        $scope.objeto={
        "id":"",
        "folio_contrato":"", //folio de contrato interno
        "folio":"",//folio de contrato para el cliente
        "definiciones":"",//folio de contrato para el cliente

        "nombre_cliente":"",//datos direccion de entrega por equipo
        "calle":"",
        "colonia":"",
        "c_p":"",
        "ciudad":"",
        "estado":"",
        "pais":"",
        "numero":"",
        "numero_exterior":"",
        "equipo":"",
        "marca":"",
        "modelo":"",
        "numero_serie":"",
        "coordinacion":"",        

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

        "estatus":"",
        "fecha_inicio":"",
        "fecha_fin":"",
        //datos de contrato relacionado
        "fecha_inicio_garantia":"",
        "fecha_fin_garantia":"",
        "fecha_inicio_contrato":"",
        "fecha_fin_contrato":"",
        "refacciones":"",
        "refacciones_excepciones":"",
        'numeros_pagos':"",
        'limite_atencion':"",

        'telefonos':"",
        'correos':"-",
        'fax':"-",
        'tipo_contrato':"",
        
    };
    $scope.equipos=[];
    
    $scope.resul={
        grd:''
    };

    
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
    
    $scope.tipos_servicio=[
        {nombre:'MONTAJE DE EQUIPO'},
        {nombre:'DESMONTAJE DE EQUIPO'},
        {nombre:'CAPACITACION'},
        {nombre:'CALIBRACION'},
        {nombre:'CONFIGURACION'},
        {nombre:'REVISION Y DIAGNOSTICO'},
        {nombre:'MANTENIMIENTO PREVENTIVO'},
        {nombre:'MANTENIMIENTO CORRECTIVO'},
        {nombre:'MANTENIMIENTO PREVENTIVO Y CORRECTIVO'},
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
    $scope.tercero_filtro={
            nombre_fiscal:'',
            group_name:''
        
        };

    $scope.representantes_smh=[
        //{nombre:'JORGE RAMIREZ CAMARILLO'},
        //{nombre:'JUAN PABLO GUAJARDO GONZALEZ'},
        {nombre:'CARLOS HERNAN TRINIDAD ANAYA'},
        {nombre:'RENE ORTEGA SILVA'},
        {nombre:'MAUXI ADRIANA ORNELAS KOBAYASHI'},
        {nombre:'ENRIQUE CERVANTES MALFAVON'},
        {nombre:'EDGAR GUERRA GUERRA'},
        //{nombre:'JESÚS ARTURO SALDIVAR RODARTE'},
    ];

    $scope.tipos_contrato=[
        {nombre:'MANTENIMIENTO PREVENTIVO CON REFACCIONES'},
        {nombre:'MANTENIMIENTO PREVENTIVO SIN REFACCIONES'},
        {nombre:'MANTENIMIENTO CORRECTIVO CON REFACCIONES'},
        {nombre:'MANTENIMIENTO CORRECTIVO SIN REFACCIONES'},
        {nombre:'MANTENIMIENTO PREVENTIVO Y CORRECTIVO CON REFACCIONES'},
        {nombre:'MANTENIMIENTO PREVENTIVO Y CORRECTIVO SIN REFACCIONES'},
    ];
    $scope.tipos_persona=[
        {nombre:'FISICA'},
        {nombre:'MORAL'},
    ];

    $scope.tiempos_contrato=[
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
        {nombre:'24'},//2
        {nombre:'35'},//3
        {nombre:'36'},//3
        {nombre:'48'},//4
        {nombre:'60'},//5
        {nombre:'72'},//6
        {nombre:'84'},//7
        {nombre:'96'},//8
    ];
    $scope.modalidad_pagos=[
        {nombre:'1'},//1
        {nombre:'2'},//2
        {nombre:'3'},//3
        {nombre:'4'},//3
        {nombre:'5'},//3
        {nombre:'6'},//4
        {nombre:'7'},//4
        {nombre:'8'},//4
        {nombre:'9'},//4
        {nombre:'10'},//4
        {nombre:'11'},//4
        {nombre:'12'},//5
        {nombre:'24'},//6
        {nombre:'36'},//6
        
    ];

    $scope.getDatosRepresentanteSmh=function(nombre) { console.log(nombre);
        if(nombre=="EDGAR GUERRA GUERRA"){console.log("EGG");
            $scope.objeto.representante_smh=nombre;console.log($scope.objeto.representante_smh);
            $scope.datosRepresentante="b)   Su representante, EDGAR GUERRA GUERRA quien dispone de facultades amplias y suficientes para la firma del presente contrato, según acredita con testimonio de la escritura pública 109,266 de fecha 26 de junio de 2017 pasado ante la fe del Lic. Luis Felipe Morales Viesca Titular de la Notaria Numero 22 de la Ciudad de México, actuando como asociado del Lic. Jos Angel Fernandez Uría Titular de la Notaria Numero 217 y en el protocolo de la Notaria Numero 60 cuyo titular es el Lic. Francisco de P Morales Diaz.";
        }else if(nombre=="RENE ORTEGA SILVA"){console.log("ROS");
            $scope.objeto.representante_smh=nombre;console.log($scope.objeto.representante_smh);
            $scope.datosRepresentante="b)   Su representante, LIC. RENE ORTEGA SILVA quien dispone de facultades amplias y suficientes para la firma del presente contrato, según acredita con testimonio de la escritura pública número 70,068 de fecha 29 de Julio de 2003, otorgada ante el Notario Público número 22 del Distrito Federal, Lic. Luis Felipe de P. Morales Viesca, inscrita ante el Registro Público de la Propiedad y del Comercio, bajo el folio mercantil número 116757 de fecha 21 de agosto de 2003.";
        }else if(nombre=="ENRIQUE CERVANTES MALFAVON"){console.log("ECM");
            $scope.objeto.representante_smh=nombre;console.log($scope.objeto.representante_smh);
            $scope.datosRepresentante="b)   Su representante, ENRIQUE CERVANTES MALFAVON quien dispone de facultades amplias y suficientes para la firma del presente contrato, según acredita con testimonio de la escritura pública 109,266 de fecha 26 de junio de 2017 pasado ante la fe del Lic. Luis Felipe Morales Viesca Titular de la Notaria Numero 22 de la Ciudad de México, actuando como asociado del Lic. Jos Angel Fernandez Uría Titular de la Notaria Numero 217 y en el protocolo de la Notaria Numero 60 cuyo titular es el Lic. Francisco de P Morales Diaz.";
        }else if(nombre=="JORGE RAMIREZ CAMARILLO"){console.log("JRC");
            $scope.objeto.representante_smh=nombre;console.log($scope.objeto.representante_smh);
            $scope.datosRepresentante="b)   Su representante, LIC. JORGE RAMIREZ CAMARILLO con el carácter de Apoderado legal, cuenta con las facultades suficientes para obligarla en términos del presente convenio, situación que acredita en términos de la escritura pública No 94,773 de fecha 24 de Octubre del 2014, otorgada ante la fe del Notario Público No. 60, 22 y 217, Lic. Francisco de P. Morales Díaz, Lic. Luis Felipe Morales Viesca y Lic. José Ángel Fernández Uría, Notarias Asociadas, de esta Ciudad de México, Distrito Federal, manifestando además, bajo protesta de decir verdad que dicho poder no le ha sido revocado ni modificado.";
        }else if(nombre=="JUAN PABLO GUAJARDO GONZALEZ"){console.log("JPGG");
            $scope.objeto.representante_smh=nombre;console.log($scope.objeto.representante_smh);
            $scope.datosRepresentante="b)   Su representante, ING. JUAN PABLO GUAJARDO GONZALEZ con el carácter de Apoderado legal, cuenta con las facultades suficientes para obligarla en términos del presente convenio, situación que acredita en términos de la escritura pública No 109,266 de fecha 26 de Junio de 2017, otorgada ante la fe del Notario Público No. 60, 22 y 217, Lic. Francisco de P. Morales Díaz, Lic. Luis Felipe Morales Viesca y Lic. José Ángel Fernández Uría, Notarias Asociadas, de esta Ciudad de México, Distrito Federal, manifestando además, bajo protesta de decir verdad que dicho poder no le ha sido revocado ni modificado.";
        }else if(nombre=="CARLOS HERNAN TRINIDAD ANAYA"){console.log("CHTA");
            $scope.objeto.representante_smh=nombre; console.log($scope.objeto.representante_smh);
            $scope.datosRepresentante="b)   Su representante, LIC. CARLOS HERNÁN TRINIDAD ANAYA con el carácter de Apoderado legal, cuenta con las facultades suficientes para obligarla en términos del presente convenio, situación que acredita en términos de la escritura pública No 96,129  de fecha 06 de febrero de 2015, otorgada ante la fe del Notario Público No. 22,60  y 217, Lic. Luis Felipe Morales Viesca, Lic. Francisco de P. Morales Díaz,  y Lic. José Ángel Fernández Uría, Notarias Asociadas, de esta Ciudad de México, Distrito Federal, manifestando además, bajo protesta de decir verdad que dicho poder no le ha sido revocado ni modificado.";
        }else if(nombre=="MAUXI ADRIANA ORNELAS KOBAYASHI"){console.log("MAOK");
            $scope.objeto.representante_smh=nombre; console.log($scope.objeto.representante_smh);
            $scope.datosRepresentante="b)   Su representante, MAUXI ADRIANA ORNELAS KOBAYASHI quien dispone de facultades amplias y suficientes para la firma del presente contrato, según acredita con testimonio de la escritura pública 109,266 de fecha 26 de junio de 2017 pasado ante la fe del Lic. Luis Felipe Morales Viesca Titular de la Notaria Numero 22 de la Ciudad de México, actuando como asociado del Lic. Jos Angel Fernandez Uría Titular de la Notaria Numero 217 y en el protocolo de la Notaria Numero 60 cuyo titular es el Lic. Francisco de P Morales Diaz.";
        }else if(nombre=="JESÚS ARTURO SALDIVAR RODARTE"){console.log("");
            $scope.objeto.representante_smh=nombre; console.log($scope.objeto.representante_smh);
            $scope.datosRepresentante="b)   Su representante, ING. JESÚS ARTURO SALDIVAR RODARTE con el carácter de Apoderado legal, cuenta con las facultades suficientes para obligarla en términos del presente convenio, situación que acredita en términos de la escritura pública No 85,043  de fecha 27 de Agosto de 2012, otorgada ante la fe del Notario Público No. 60 y 22, Lic. Francisco de P. Morales Díaz y Lic. Luis Felipe Morales Viesca, Notarias Asociadas, de esta Ciudad de México, Distrito Federal, manifestando además, bajo protesta de decir verdad que dicho poder no le ha sido revocado ni modificado.";
        }else{alert("NO HA ELEGIDO UNA OPCION");}
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
                $scope.objeto.pais_fiscal=e.country_name;
                //$scopobjeto.e.numero_fiscal=e.
                $scope.objeto.c_bpartner_location=e.c_bpartner_location_id;
                $scope.objeto.c_bpartner_id=e.c_bpartner_id;

                direccionesSrc.get({id_tercero:e.c_bpartner_id,isshipto:'Y'},
                    function(d){
                        //$scope.cliente.terceros=d.direcciones;
                        $scope.direcciones=d.direcciones;
                        /*
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
                        */

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

        $scope.direccion_filtro={
        id_tercero:'',
        name:'',
        isshipto:''
        };

        $scope.buscarDireccion=function(name){ console.log($scope.objeto.c_bpartner_id);
            if($scope.objeto.c_bpartner_id==undefined||$scope.objeto.c_bpartner_id==''){
                alert("¡NO HA SELECCIONADO UN CLIENTE, FAVOR DE VERIFICAR!");
            }else{
            direccionesSrc.get({id_tercero:$scope.objeto.c_bpartner_id,isshipto:'Y',name:'*'+name+'*'},function(d){
                    $scope.direcciones=d.direcciones;
                },function(e){alert(e.status+e.data)});
            }
        }

        $scope.filtroTercero=function(){
                        if($scope.tercero_filtro.nombre_fiscal.length>2){ $scope.progress=true;               
            $scope.progress=true;               
                            $scope.cliente=terceroComercial.qry({nombre_fiscal:'*'+$scope.tercero_filtro.nombre_fiscal+'*'});
                            //$scope.progress=false;               
                            //$scope.cliente=tercero.qry({nombre_fiscal:'*'+$scope.tercero_filtro.nombre_fiscal+'*'});
                        }else{
            $scope.progress=true;               
                            $scope.clientes=tercero.qry($scope.tercero_filtro);
                        }
                        /*if($scope.clientes.msg=="Success"){
                            $scope.progress=false;               
                        }else if($scope.clientes.msg=="Success"){
                            $scope.progress=false;               
                        }*/
        }

        $scope.filtroMarca=function(){
            insumosSrc.get({vista:'3',tipo_equipo:$scope.equipo,bandera:'E'},
                function(d){
                    $scope.filtro.marcas=d.objetos;
                }
                ,function(e){alert(e.status+e.data)});
        }
        $scope.filtroModelo=function(){
            insumosSrc.get({vista:'4',marca:$scope.marca,bandera:'E'},
                function(d){
                    $scope.filtro.modelos=d.objetos;
                }
                ,function(e){alert(e.status+e.data)});
        }
        $timeout(function() {
            $scope.objeto.interes_moratorio_cliente=5;
            $scope.objeto.descuento_incumplimiento_smh=0.25;
            $scope.objeto.monto_nueva_ubicacion=600;
            $scope.objeto.refacciones_excepciones="refacciones de alta especialidad, elementos al vacío y accesorios periféricos conectados al equipo, a fin de conservarlos en buen estado de funcionamiento.";
            $scope.objeto.clausula_primera=12;
            $scope.filtroMarca();
            $scope.filtro={
                    producto:producto.qry({vi:"1"}),
                coordinacion:coordinacion.qry({vi:"1"})
            }
            if($scope.email=="p.cruz@smh.com.mx"){
                $scope.recepcion=true;
            }else{
                $scope.recepcion=false;
            }
        });
        
        $timeout(function() {
            $scope.esc_datosTercero=true;
            if($scope.id){console.log("EDIT");
                var id = $scope.id;
                if($scope.email=="p.cruz@smh.com.mx" || $scope.email=="lhernandez@smh.com.mx"){
                    $scope.recepcion=true;
                }else{
                    $scope.recepcion=false;
                }

                contratosSrc.get({id:id},function(d){
                    $scope.objeto=d.objeto;
                    $scope.objeto.folio_contrato=d.objeto.folio_contrato;
                    $scope.equipos=d.objeto.r_conts_eqps;
                    var l=d.objeto.r_conts_eqps.length;
                    l=l-1;
                    $scope.objeto.tipo_servicio=$scope.equipos[l].tipo_servicio;
                    $scope.equipo=$scope.equipos[l].equipo;
                    $scope.marca=$scope.equipos[l].marca;
                    $scope.modelo=$scope.equipos[l].modelo;
                    $scope.filtro.numero_serie=$scope.equipos[l].numero_serie;
                    $scope.objeto.coordinacion=$scope.equipos[l].coordinacion;
                    $scope.filtro.fecha_inicio=$scope.equipos[l].fecha_inicio;
                    var f_f_i_c=$scope.equipos[l].fecha_inicio.split("-");                              //console.log(f_f_i_c);
                    $scope.fec_ini_ser=f_f_i_c[2]+"-"+f_f_i_c[1]+"-"+f_f_i_c[0]+" 00:00:00";            //console.log($scope.filtro.fecha_inicio);
                    $scope.filtro.fecha_fin=$scope.equipos[l].fecha_fin;
                    var f_f_f_c=$scope.equipos[l].fecha_fin.split("-");                              console.log(f_f_i_c);
                    $scope.fec_fin_ser=f_f_f_c[2]+"-"+f_f_f_c[1]+"-"+f_f_f_c[0]+" 00:00:00";    console.log($scope.filtro.fecha_inicio);
                    $scope.filtro.hora_atencion=$scope.equipos[l].hora_atencion;                    //console.log($scope.objeto.nombre_fiscal);
                    $scope.tercero_filtro.nombre_fiscal=$scope.objeto.nombre_fiscal;
                    $scope.clientes=tercero.qry({nombre_fiscal:$scope.objeto.nombre_fiscal}); 

                    direccionesSrc.get({id_tercero:$scope.equipos[0].c_bpartner_id,isshipto:'Y'},function(d){
                        $scope.direcciones=d.direcciones;
                    },function(e){alert(e.status+e.data)});

                    $scope.objeto.tipo_contrato=$scope.objeto.contrato.tipo_contrato;
                    $scope.objeto.monto_total=$scope.objeto.contrato.monto_total;
                    $scope.objeto.monto_total_contrato=$scope.objeto.contrato.monto_total_contrato;
                    $scope.objeto.monto_pago_inicial=$scope.objeto.contrato.monto_pago_inicial;
                    $scope.objeto.numeros_pagos=$scope.objeto.contrato.numeros_pagos;
                    $scope.objeto.fecha_inicio_contrato=$scope.objeto.contrato.fecha_inicio_contrato;
                    var f_i_c=d.objeto.contrato.fecha_inicio_contrato.split("-");
                    $scope.fec_ini_con=f_i_c[2]+"-"+f_i_c[1]+"-"+f_i_c[0]+" 00:00:00";
                    $scope.objeto.fecha_fin_contrato=$scope.objeto.contrato.fecha_fin_contrato;
                    var f_f_c=d.objeto.contrato.fecha_fin_contrato.split("-");
                    $scope.fec_fin_con=f_f_c[2]+"-"+f_f_c[1]+"-"+f_f_c[0]+" 00:00:00";
                    $scope.objeto.dia_final_pago=$scope.objeto.contrato.dia_final_pago;
                    $scope.objeto.interes_moratorio_cliente=$scope.objeto.contrato.interes_moratorio_cliente;
                    $scope.objeto.descuento_incumplimiento_smh=$scope.objeto.contrato.descuento_incumplimiento_smh;
                    $scope.objeto.monto_nueva_ubicacion=$scope.objeto.contrato.monto_nueva_ubicacion;
                    $scope.objeto.fecha_inicio_garantia=$scope.objeto.contrato.fecha_inicio_garantia;
                    var f_i_g=d.objeto.contrato.fecha_inicio_garantia.split("-");
                    $scope.fec_ini_gar=f_i_g[2]+"-"+f_i_g[1]+"-"+f_i_g[0]+" 00:00:00";
                    $scope.objeto.fecha_fin_garantia=$scope.objeto.contrato.fecha_fin_garantia;
                    var f_f_g=d.objeto.contrato.fecha_fin_garantia.split("-");
                    $scope.fec_fin_gar=f_f_g[2]+"-"+f_f_g[1]+"-"+f_f_g[0]+" 00:00:00";
                    $scope.objeto.limite_atencion=$scope.objeto.contrato.limite_atencion;
                    $scope.objeto.representante_cliente=d.objeto.contrato.representante_cliente;
                    $scope.objeto.representante_smh=d.objeto.contrato.representante_smh;
                    $scope.objeto.declaracion_cliente=d.objeto.contrato.declaracion_cliente;
                    $scope.objeto.declaracion_smh=d.objeto.contrato.declaracion_smh;
                    $scope.objeto.lugar_pago_cliente=d.objeto.contrato.lugar_pago_cliente;
                    $scope.objeto.refacciones=d.objeto.contrato.refacciones;
                    $scope.objeto.refacciones_excepciones=d.objeto.contrato.refacciones_excepciones;
                    $scope.objeto.conclusion=d.objeto.contrato.conclusion;
                    $scope.fecha=d.objeto.contrato.fecha_contrato;
                    $scope.fec_pag_ini=d.objeto.contrato.fecha_contrato;
                    var date_contrato=d.objeto.contrato.fecha_contrato.split("-");
                    var b=date_contrato[2].substring(0,2);
                    $scope.objeto.fecha_contrato=b+"-"+date_contrato[1]+"-"+date_contrato[0];
                    $scope.objeto.tiempo_contrato=d.objeto.contrato.tiempo_contrato;
                    $scope.objeto.moneda=d.objeto.contrato.moneda;
                    $scope.objeto.modalidad_pagos=d.objeto.contrato.modalidad_pagos;
                    var fecha_pago_inicial=d.objeto.contrato.fecha_pago_inicial.split("-");
                    var c=date_contrato[2].substring(0,2);
                    $scope.objeto.fecha_pago_inicial=c+"-"+fecha_pago_inicial[1]+"-"+fecha_pago_inicial[0];
                    $scope.objeto.clausula_primera=d.objeto.contrato.clausula_primera;
                    $scope.objeto.definiciones=d.objeto.contrato.definiciones;                    //$scope.objeto=d.objeto.contrato;
                });
            }else{ console.log("CREATE");
            var dat= new Date();            
    //$scope.objeto.fecha_contrato= moment(dat).format('DD-MM-YYYY');  
    //$scope.fecha= moment(dat).format('DD-MM-YYYY');  
                $scope.datosFormato();
            }
        },3000);
        
        $scope.selectFecha=function(f){
            $scope.objeto.fecha_contrato=moment(f).format('DD-MM-YYYY');  
        }

        $scope.selectFechaInicioCon=function(f){
            $scope.objeto.fecha_inicio_contrato=moment(f).format('DD-MM-YYYY');  
        }

        $scope.selectFechaFinCon=function(f){
            $scope.objeto.fecha_fin_contrato=moment(f).format('DD-MM-YYYY');  
        }

        $scope.selectFechaPagIni=function(f){
            $scope.objeto.fecha_pago_inicial=moment(f).format('DD-MM-YYYY');  
        }

        $scope.selectFechaIniGar=function(f){
            $scope.objeto.fecha_inicio_garantia=moment(f).format('DD-MM-YYYY');  
        }

        $scope.selectFechaFinGar=function(f){
            $scope.objeto.fecha_fin_garantia=moment(f).format('DD-MM-YYYY');  
        }

        $scope.selectFechaIniServ=function(f){
            $scope.filtro.fecha_inicio=moment(f).format('DD-MM-YYYY');  
        }

        $scope.selectFechaFinServ=function(f){
            $scope.filtro.fecha_fin=moment(f).format('DD-MM-YYYY');  
        }

        $scope.agrEquipo=function(){
            $scope.mas=$scope.equipos.length;
            $scope.equipos.push({
                nombre_fiscal:$scope.objeto.nombre_fiscal,
                nombre_cliente:$scope.objeto.nombre_cliente,
                colonia:$scope.objeto.colonia,
                ciudad:$scope.objeto.ciudad,
                calle:$scope.objeto.calle,
                c_p:$scope.objeto.c_p,
                estado:$scope.objeto.estado,                
                pais:$scope.objeto.pais,
                c_bpartner_id:$scope.objeto.c_bpartner_id,
                c_bpartner_location:$scope.objeto.c_bpartner_location,
                equipo:$scope.equipo,
                marca:$scope.marca,
                modelo:$scope.modelo,
                numero_serie:$scope.filtro.numero_serie,
                coordinacion:$scope.objeto.coordinacion,
                tipo_servicio:$scope.objeto.tipo_servicio, 
                fecha_inicio:$scope.filtro.fecha_inicio,
                fecha_fin:$scope.filtro.fecha_fin,
                hora_atencion:$scope.filtro.hora_atencion
            }); console.info($scope.equipos);
            $scope.mensaje="SE HA CAPTURADO UBICACION: "+$scope.objeto.nombre_cliente+ ", EQUIPO: "+ $scope.modelo+", NS: "+ $scope.filtro.numero_serie+", FECHA INICIO: "+ $scope.filtro.fecha_inicio+", FECHA FIN: "+ $scope.filtro.fecha_fin;
        }
        $scope.guardar=function(){
            if($scope.objeto.id>0){
                $scope.objeto.equipos=$scope.equipos;
                $scope.objeto.telefonos='';
                $scope.objeto.correos='';
                $scope.objeto.fax='';                   console.log($scope.objeto);
                $scope.rsl=contrato.modf($scope.objeto);
                if($scope.rsl.msg="Success"){console.log("save update");
                    $scope.save=true;
                }  
            }else{                console.log($scope.equipos);                console.log($scope.objeto);
                $scope.objeto.equipos=$scope.equipos;
                $scope.objeto.telefonos='';
                $scope.objeto.correos='';
                $scope.objeto.fax='';
                $scope.rsl=contrato.crea($scope.objeto); 
                if($scope.rsl.msg="Success"){console.log("save create");
                    $scope.save=true;            
                }   
            }

        };

        $scope.remover=function(j){    //console.log(cantidad);
    if(confirm("¿ DESEA ELIMINAR EL PRODUCTO DE LA LISTA?"))      {
      $scope.equipos.splice(j,1);       }else{alert("¡ Accion Cancelada !");}
    }

    $scope.editar=function(indice,seleccionado){console.log(seleccionado)
  if(confirm("¿Desea editar el producto seleccionado?")){
    //$scope.remover(indice);
    //$scope.seleccionado=seleccionado;
    $scope.objeto.nombre_fiscal=seleccionado.nombre_fiscal;
    $scope.objeto.nombre_cliente=seleccionado.nombre_cliente;
    $scope.objeto.colonia=seleccionado.colonia;
    $scope.objeto.ciudad=seleccionado.ciudad;
    $scope.objeto.calle=seleccionado.calle;
    $scope.objeto.c_p=seleccionado.c_p;
    $scope.objeto.estado=seleccionado.estado;
    $scope.objeto.pais=seleccionado.pais;
    $scope.objeto.c_bpartner_id=seleccionado.c_bpartner_id;
    $scope.objeto.c_bpartner_location=seleccionado.c_bpartner_location;
    $scope.equipo=seleccionado.equipo;
    $scope.marca=seleccionado.marca;
    $scope.modelo=seleccionado.modelo;
    $scope.filtro.numero_serie=seleccionado.numero_serie;
    $scope.objeto.coordinacion=seleccionado.coordinacion;
    $scope.objeto.tipo_servicio=seleccionado.tipo_servicio;
    $scope.filtro.fecha_inicio=seleccionado.fecha_inicio;
    $scope.filtro.fecha_fin=seleccionado.fecha_fin;
    $scope.filtro.hora_atencion=seleccionado.hora_atencion;

  }else{alert("! ACCION CANCELADA ¡")}
}
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
        
        $scope.setDir=function(dir){ console.info(dir);
            var d=JSON.parse(dir);console.info(d.name);
            $scope.objeto.nombre_cliente=d.name;console.log($scope.objeto.nombre_cliente);
            $scope.objeto.calle=d.address1;
            $scope.objeto.colonia=d.address2;
            $scope.objeto.c_p=d.cp;
            $scope.objeto.ciudad=d.city;
            $scope.objeto.estado=d.region_name;
            $scope.objeto.pais=d.country_name;
            $scope.objeto.c_bpartner_id=d.c_bpartner_id;
            $scope.objeto.c_bpartner_location=d.c_bpartner_location_id;
            //$scope.objeto.telefonos=d.phone;

        }
        $scope.tipo_persona=function(persona){alert(persona);
            if(persona=='FISICA'){
                $scope.objeto.declaracion_cliente="a)   Ser mayor de edad y tener capacidad legal para contratar y obligarse en los términos del presente contrato.\n\n"+
                "b)  Esta legitimado para solicitar las reparaciones y autorizar para que "+$scope.equipos_formato+"\n\n"+
                "c)  En virtud de no contar con especialistas para repararlo o mantenerlo en óptimo estado de servir, solicita la intervención de SMH.\n\n"+
                "d)  Para los efectos del presente convenio señala como su domicilio Fiscal: "+$scope.objeto.calle_fiscal+" "+$scope.objeto.colonia_fiscal+" "+$scope.objeto.ciudad_fiscal+" "+$scope.objeto.c_p_fiscal+" "+$scope.objeto.estado_fiscal+".\n\n"+
                "e)  Se encuentra inscrito ante el Registro Federal de Contribuyentes bajo la clave número: "+$scope.objeto.rfc+".";
                ;
            }
        };

        $scope.datosFormato =function(){
                console.log($scope.equipos.length);
                console.log($scope.equipos);
            //$scope.objeto.representante_smh="JORGE RAMIREZ CAMARILLO";
            var i=0;
            $scope.equipos_formato="";
            $scope.equipos_f = $scope.arrUnique($scope.equipos); console.log($scope.equipos);

            while(i<$scope.equipos_f.length){
                $scope.equipos_formato+=$scope.equipos_f[i].equipo+" MARCA: "+$scope.equipos_f[i].marca+" MODELO: "+$scope.equipos_f[i].modelo+" NO. DE SERIE: "+$scope.equipos_f[i].numero_serie+" ";
                i++;//console.log($scope.equipos_formato);
            }
            if($scope.equipos_f.length==1){
                $scope.equipos_formato="sea manipulado el equipo: "+$scope.equipos_formato;
            }else{
                $scope.equipos_formato="sean manipulados los equipos: "+$scope.equipos_formato;
            }
            if($scope.objeto.definiciones=='FISICA'){
                //if(persona=='FISICA'){
                $scope.objeto.declaracion_cliente="a)   Ser mayor de edad y tener capacidad legal para contratar y obligarse en los términos del presente contrato.\n\n"+
                "b)  Esta legitimado para solicitar las reparaciones y autorizar para que "+$scope.equipos_formato+"\n\n"+
                "c)  En virtud de no contar con especialistas para repararlo o mantenerlo en óptimo estado de servir, solicita la intervención de SMH.\n\n"+
                "d)  Para los efectos del presente convenio señala como su domicilio Fiscal: "+$scope.objeto.calle_fiscal+" "+$scope.objeto.colonia_fiscal+" "+$scope.objeto.ciudad_fiscal+" "+$scope.objeto.c_p_fiscal+" "+$scope.objeto.estado_fiscal+".\n\n"+
                "e)  Se encuentra inscrito ante el Registro Federal de Contribuyentes bajo la clave número: "+$scope.objeto.rfc+".";
            //}
            }else{
            $scope.objeto.declaracion_cliente="\na)  Que "+$scope.objeto.nombre_fiscal+", es una Sociedad debidamente constituida conforme a las leyes mexicanas, según lo acredita con el testimonio de la Escritura Pública No. ________ de fecha ____________________ ante la fe del Lic. _____________________, Notario Público No. ___ de la Ciudad de _____________________,  inscrita en el Registro Público de Comercio, bajo el folio mercantil No. ________.\n\n"+
            "b)  Que su representante el "+$scope.objeto.representante_cliente+", cuenta con las facultades suficientes para comprometer a su representada en términos de la Escritura Número ________ de fecha _____________________, pasada ante la fe del Notario Público No. ________, Lic. _____________________ con ejercicio en la Ciudad de _____________________ , e inscrita en el Registro Público de la Propiedad y del Comercio, misma que no le ha sido revocada, restringida o modificada en forma alguna.\n\n"+
            "c)  Esta legitimado para solicitar las reparaciones y autorizar para que "+$scope.equipos_formato+"\n\n"+
            "d)  En virtud de no contar con especialistas para repararlo o mantenerlo en óptimo estado de servir, solicita la intervención de SMH.\n\n"+
            "e)  Para los efectos del presente convenio señala como su domicilio Fiscal: "+$scope.objeto.calle_fiscal+" "+$scope.objeto.colonia_fiscal+" "+$scope.objeto.ciudad_fiscal+" "+$scope.objeto.c_p_fiscal+" "+$scope.objeto.estado_fiscal+".\n\n"+
            "f)  Se encuentra inscrito ante el Registro Federal de Contribuyentes bajo la clave número: "+$scope.objeto.rfc+".";
            }
            $scope.objeto.declaracion_smh="\na)   Es una persona moral debidamente constituida conforme a las leyes de los Estados Unidos Mexicanos, situación que se acredita con el testimonio de la escritura número 52,038, de fecha 10 de marzo de 1989, otorgada ante la fe del Notario Público, licenciado Francisco de P. Morales Díaz, titular de la notaria sesenta con ejercicio en el Distrito Federal."+
            "\n\n"+$scope.datosRepresentante+
            "\n\nc)  Para los efectos de este convenio señala como su domicilio fiscal el ubicado en DIAGONAL #29 COLONIA DEL VALLE DELEGACIÓN BENITO JUÁREZ, C.P. 03100 EN LA CIUDAD DE MÉXICO. "+
            "\n\nd)  Que cuenta con Registro Federal de Contribuyentes: SUM890327137.";
            //$scope.objeto.lugar_pago_cliente="El pago se realizará en  las  instalaciones  del  CLIENTE en  el domicilio ubicado en "+$scope.objeto.calle_fiscal+" "+$scope.objeto.colonia_fiscal+" "+$scope.objeto.ciudad_fiscal+" "+$scope.objeto.c_p_fiscal+" "+$scope.objeto.estado_fiscal+". También queda facultado el CLIENTE para pagar en moneda nacional a la cuenta 525245, sucursal 870 con referencia ________, cuenta correspondiente a la Institución de Crédito denominada Banco Nacional de México, S.A. (Banamex). En todos los casos los depósitos se harán a nombre de Suministro para Uso Médico y Hospitalario, S.A. de C.V.";
            $scope.objeto.lugar_pago_cliente="El pago se realizará mediante cheque certificado y/o deposito bancario y/o transferencia electrónica de fondos a la cuenta bancaria en moneda nacional a la cuenta 525245 referencia  ____________________ , sucursal 870 y/o el equivalente en USD al momento del pago en la cuenta en Dólares Americanos 9265908 sucursal 266, ambas cuentas correspondientes a la Institución de Crédito denominada Banco Nacional de México, S.A. (Banamex). En todos los casos los depósitos se harán a nombre de Suministro para Uso Médico y Hospitalario, S.A. de C.V. y queda estrictamente prohibido entregar dinero a los ingenieros o empleados. En su caso podra realizar pagos en el domicilio señalado por SMH en la declaración c.";
        }

        $scope.arrUnique =function (sl) {
            console.log(sl);
        var out = [];
        for (var i = 0, l = sl.length; i < l; i++) {
            var unique = true;
            for (var j = 0, k = out.length; j < k; j++) {
                if ((sl[i].numero_serie === out[j].numero_serie)) {
                    unique = false; console.log(unique);
                }
            }
            if (unique) {
                out.push(sl[i]);
            }
        }
        return out;
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
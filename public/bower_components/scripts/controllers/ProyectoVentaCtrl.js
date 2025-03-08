'use strict';
angular.module('cotizacionApp')
.controller('pVentaCtrl',function (pVenta,ciudad,$window,$scope,$timeout,$location,proyectoVentaSrc,userSrc,orgVsrc)    {
        
        $scope.objeto={
        'id':'',
        'nota_cliente':'',//cantidad
        'id_prestamo_refaccion':'',
        'id_foraneo':'',
        'id_cotizacion':'',
        'id_cliente':'',
        'id_fiscal':'',
        'folio_contrato':'',
        'folio_contrato_venta':'',
        'folio':'',
        'equipo':'',//modalidad
        'marca':'',
        'modelo':'',//equipo
        'numero_serie':'',
        'imagen_serie':'',
        'nombre_responsable':'',
        'nombre_dpto_manto':'',
        'organizacion':'SMH',//compañia ims,smh,etc
        'modificable':'',//enganche
        'estatus':'',//estatus
        'aprobado':'',//estatus_credito
        'fecha_captura':'',
        'fecha_asignacion':'',
        'fecha_recepcion':'',
        'trabajo_realizado':'',
        'fecha_inicio':'',//fecha proyecto
        'fecha_fin':'',//fecha entrega
        'sucursal':'',//mx,bj,mty
        'condicion_servicio':'',//termino_pago
        'complejidad_servicio':'', //probabilidad
        'autor':'',//iniciales representante
        'tipo_servicio':'',
        'hora_atencion':'',
        'resuelto_por':'',
        'coordinacion':'',
        'enviar_aviso':'',//pagos_mensuales
        'clase':'',//PRO
        'instituto':'',// publico, privado
        'vigencia':'',//contraentrega
        'dato':'',// mes_orden, mes_venta, compromiso->si/no, canal->directo,indirecto
        'nombre_cliente':'',//cliente
        'calle':'',
        'colonia':'',
        'c_p':'',
        'ciudad':'',//poblacion
        'estado':'',//estado
        'pais':'',
        'numero':'',
        'numero_exterior':'',//precio_venta,
        'rfc':'',
        'telefonos':'',
        'celular':'',
        'correos':'',
        'fax':'',
        'compromiso':'',
        'mes_orden':'',
        //'mes_venta':'',
        'fecha_atencion':'',
        'canal':'',
        'nota':''//razon
    };
    
    $scope.filtro={
        "institutos":[{nombre:'PUBLICO'},
                     {nombre:'PRIVADO'}]
    };

    $scope.compromisos=[
        {nombre:'SI'},
        {nombre:'NO'}
    ];

    $scope.terminos=[
        {nombre:''},
        {nombre:'CONTADO'},
        {nombre:'CREDITO DIRECTO'}
    ];
    
    $scope.meses=[
            {nombre:''},
            {nombre:'ENERO'},
            {nombre:'FEBRERO'},
            {nombre:'MARZO'},
            {nombre:'ABRIL'},
            {nombre:'MAYO'},
            {nombre:'JUNIO'},
            {nombre:'JULIO'},
            {nombre:'AGOSTO'},
            {nombre:'SEPTIEMBRE'},
            {nombre:'OCTUBRE'},
            {nombre:'NOVIEMBRE'},
            {nombre:'DICIEMBRE'}
    ];

    $scope.estados=[
            {nombre:''},
            {nombre:'GANADO'},
            {nombre:'PERDIDO'},
            {nombre:'ABIERTO'},
            {nombre:'EN PROCESO'},
    ];

    $scope.estatus_credito=[
            {nombre:''},
            {nombre:'RECHAZADO'},
            {nombre:'APROBADO'},
            {nombre:'EN ESPERA DEL CLIENTE'}
        ];
        
    $scope.equipos=[
            {nombre:'ULTRASONIDO'},
            {nombre:'MASTOGRAFIA'},
            {nombre:'DENSITOMETRIA'},
            {nombre:'TOMOGRAFIA'},
            {nombre:'RESONANCIA'},
            {nombre:'RAYOS X'},
            {nombre:'FLUOROSCOPIA'},
            {nombre:'HIT'},
            {nombre:'THINPREP'},
            {nombre:'ACCESORIOS'},
            {nombre:'CONSUMIBLES'},
            {nombre:'PANTHER INSTRUMENTS SYSTEMS'},
            {nombre:'MATERNO INFANTIL'},
            {nombre:'MONITOREO'},
            {nombre:'MICROSCOPIA'},
            {nombre:'OTROS'}
        ];
    
    $scope.canales=[
            {nombre:'DIRECTO'},
            {nombre:'INDIRECTO'},
        ];

    $scope.sucursales=[
            {nombre:'BAJIO'},
            {nombre:'CDMX'},
            {nombre:'GDL'},
            {nombre:'MTY'},
            {nombre:'VGOB'},
            {nombre:'OTROS'},
    ];

    $scope.inicioEdit=function(id){
        $scope.getOrganizaciones();
        $scope.getUsuarios();
        var rs=pVenta.qry({id:id});
        rs.$promise.then(function(r){
            $scope.objeto=r.objeto;
            var f_i=$scope.objeto.fecha_inicio.split("-");                              //console.log(f_f_i_c);
            $scope.fec_ini=f_i[2]+"-"+f_i[1]+"-"+f_i[0]+" 00:00:00";            //console.log($scope.filtro.fecha_inicio);
            var f_f=$scope.objeto.fecha_fin.split("-");                              //console.log(f_f_i_c);
            $scope.fec_fin=f_f[2]+"-"+f_f[1]+"-"+f_f[0]+" 00:00:00";            //console.log($scope.filtro.fecha_inicio);
            var d=JSON.parse(r.objeto.dato);
            $scope.objeto.dato=d.dato;
            $scope.objeto.canal=d.canal;
            $scope.objeto.mes_orden=d.mes_orden;
            $scope.objeto.mes_venta=d.mes_venta;
            $scope.objeto.compromiso=d.compromiso;
            var cd=ciudad.qry({clase:'E'});
            cd.$promise.then(function(r){
                    $scope.ciudad_estados=r.objetos;
                    $scope.filtroCiudad();
            });
        });
    }

    $scope.select_fec_ini=function(date){
        $scope.objeto.fecha_inicio=moment(date).format('DD-MM-YYYY');  
    }

    $scope.select_fec_fin=function(date){
        $scope.objeto.fecha_fin=moment(date).format('DD-MM-YYYY');  
    }

    $scope.inicio=function(autor){
        $scope.getOrganizaciones();
        $scope.getUsuarios();
        $scope.objeto.autor=autor;
        var cd=ciudad.qry({clase:'E'});
        cd.$promise.then(function(r){
                $scope.ciudad_estados=r.objetos;
                $scope.filtroCiudad();
        });  
    };

    $scope.filtroCiudad=function(){
        var cd=ciudad.qry({id:$scope.objeto.estado});
        cd.$promise.then(function(r){
                $scope.ciudades=r.objetos;
            });
    }

    $scope.guardar=function(){
        if($scope.objeto.id>0){ console.log($scope.id+"UPDATE");                                //$scope.rsl=pVenta.modf($scope.objeto);
            proyectoVentaSrc.update($scope.objeto,function(){
                        $scope.save=true;
                        $scope.msg="DATOS GUARDADOS EXITOSAMENTE";
                    },function(e){
                        if(e.status=='422'){
                            var msg='';
                            angular.forEach(e.data,function(value, key){
                                msg=msg+','+value;
                            });
                                alert(msg);
                        }else{
                            alert('Error: '+e.status+' '+e.data);
                        }
            });
        }else{
                proyectoVentaSrc.save($scope.objeto,function(){
                        $scope.save=true;
                        $scope.msg="DATOS GUARDADOS EXITOSAMENTE";
                    },
                    function(e){
                    if(e.status=='422'){
                        $scope.save=false;
                        var msg='';
                        angular.forEach(e.data,function(value, key){
                            msg=msg+','+value;
                        });
                            alert(msg);
                    }else{
                        alert('Error: '+e.status+' '+e.data);
                    }
               });
           }
    };

    $scope.getUsuarios=function(){
        userSrc.get({vista:1,name:"*",puesto:'*VENTAS*'},function(data){ 
            $scope.usuarios=data.users;                                                                                 console.log(data);
        },function(err){alert('ERROR EN SERVIDOR.');});
    }

    $scope.getOrganizaciones=function(){$scope.progress=true;
        orgVsrc.get({name:"*"},function(data){
            $scope.organizaciones=data.objetos;                                                                       //    console.log(data);
        });
    }
    
})
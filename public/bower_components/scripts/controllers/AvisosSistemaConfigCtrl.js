'use strict';
angular.module('cotizacionApp')
.controller('avisosSistemaConfigCtrl',function ($filter,recursoSrc,avisosSistemaSrc,userSrc,$window,$scope,$location)
    {
    $scope.orgnizaciones=[
        {nombre:'SMH'},
        {nombre:'IMS'},
    ];
        $scope.inicio=function(tipo_usuario,usuario){                                             console.log(tipo_usuario);
            /*
            *Cargar todos los items con clase config de la tabla recursos.aviso=1
            * (Ver ctrl Referencia Catalgos)Si usuario es administrador, mostrar todos los usuarios, sino, mostrar solo el actual usuario con sus avisos_sistema.config
            * Al cambiar usuario, mostrar sus avisos_sistema.config actuales
            */
            $scope.tipo_usuario=tipo_usuario;
            $scope.usuario=usuario;
            //var myJSON = JSON.parse(usuario);                                        console.log(myJSON.tipo_usuario);
            this.getRecursos();
            this.getUsuarios();
            /*
            if(myJSON.id_foraneo != undefined && myJSON.id_foraneo>0){
                $scope.obtenerTicket(myJSON.id_foraneo);
            }else if(myJSON.id != undefined && myJSON.id>0){
                $scope.disabled_atencion=false;
                $scope.obtenerObjeto(myJSON.id);
            }
            */
        };
    $scope.guarda=function(){
        var array=[];
        if($scope.slcUsuario.name!=='' && $scope.slcUsuario.name!== undefined)
        {
            angular.forEach($scope.aviso_recursos,function(obj,key){
                //buscar los elementos que tienen el 1 en agregar
                if(obj.agregar=='1')
                {
                    //verificar si usuario tiene permiso de recurso
                    var aviso ={
                        "id_foraneo":"",//id de documento, proceso, u observacion.
                        "id_usuario":$scope.slcUsuario.id,
                        "clase":"CONFIG",//clase de proceso o documento
                        "recurso":obj.recurso,//url
                        "estado":$scope.estado,
                        "dato":"",
                        "organizacion":""
                    };
                    array.push(aviso);
                }
            });
            if(array.length>0)
                {
                    $scope.aviso=array;
                    $scope.guardar();
                }else
                {
                    alert('DEBE SELECCIONAR PERMISOS Y USUARIO');
                }
        }else{
            alert('SELECCIONE USUARIO');
        }
    };

        $scope.getRecursos=function(){
            recursoSrc.get({vi:2},function(data){
                $scope.aviso_recursos=data.recursos;
            });
        };$scope.getUsuarios=function(){
            userSrc.get({vista:1},function(data){
                $scope.usuarios=data.users;
            });
        };$scope.guardar=function(){
            //console.log($scope.aviso);
            avisosSistemaSrc.save($scope.aviso,function(){},function(err){$scope.err(err)});
        };$scope.err=function(e){
                if(e.status=='422'){
                    var msg='';
                    angular.forEach(e.data,function(value, key){
                        msg=msg+','+value;
                    });
                        alert(msg);
                }else{
                    alert('Error: '+e.status+' '+e.data);
                }
        };$scope.chkRecursos=function(x)
        {
            $scope.checked=x;
            //console.log($scope.checked);
            if(x.agregar=='' || x.agregar == undefined)
            {
//               console.log('bandera 1');
                x.agregar='1';
            }else if(x.agregar=='1')
            {
//                console.log('bandera 0');
                x.agregar='';
            }
        };$scope.limpia=function(){
            $scope.checked='';
            $scope.slcUsuario="";
            $scope.menu_recursos="";
            $scope.slcGrupo="";
            $scope.slcMenu="";
        };$scope.busca=function(){
            $scope.permisos_usuarios="";
            if(($scope.slcUsuario=="" || $scope.slcUsuario== undefined) && ($scope.checked!="" || $scope.checked.recurso!== undefined)){
                permisoSrc.get({vista:'3',recurso:$scope.checked.recurso , id_usuario:$scope.slcUsuario.id},function(d){
                    if(d.permisos!=undefined){
                    $scope.permisos_usuarios=d.permisos;
//                    console.log(d.permisos);
                    }
                    },function(){alert('ERROR AL CONSULTAR');});
                
            }else if(($scope.slcUsuario!="" || $scope.slcUsuario!== undefined) && ($scope.checked!="" || $scope.checked.recurso!== undefined)){
                permisoSrc.get({vista:'2',recurso:$scope.checked.recurso , id_usuario:$scope.slcUsuario.id},function(d){
                    if(d.permisos!=undefined){
                    $scope.permisos_usuarios=d.permisos;
//                    console.log(d.permisos);
                    }
                    },function(){alert('ERROR AL CONSULTAR');});
                
            }else if(($scope.slcUsuario!="" || $scope.slcUsuario!== undefined) && ($scope.slcMenu!="" || $scope.slcMenu.id!== undefined))
            {//Buscar permiso por usuario y por menu
                permisoSrc.get({vista:'1',id_menu:$scope.slcMenu.id , id_usuario:$scope.slcUsuario.id},function(d){
                    if(d.permisos!=undefined){
                    $scope.permisos_usuarios=d.permisos;
//                    console.log(d.permisos);
                    }
                    },function(){alert('ERROR AL CONSULTAR');});
                
            }else if($scope.slcMenu.id!=="" && $scope.slcMenu.id!== undefined)
            {//buscar solo por menu
                permisoSrc.get({vista:'1',id_menu:$scope.slcMenu.id},function(d){
                    if(d.permisos!=undefined){
                    $scope.permisos_usuarios=d.permisos;
                    }
                },function (){alert('ERROR AL CONSULTAR');})
            }else if($scope.slcUsuario!="" && $scope.slcUsuario!== undefined)
            {//buscar solo por usuario
                permisoSrc.get({vista:'1',id_usuario:$scope.slcUsuario.id},function(d){
                    if(d.permisos!=undefined){
                    $scope.permisos_usuarios=d.permisos;
                    }
                },function (){alert('ERROR AL CONSULTAR');})
            }
        }


    })
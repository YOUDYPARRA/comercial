function PermisoFunCtrl($timeout,$location,$scope,permisoSrc,userSrc,recursoSrc,menuSrc,grupoSrc,grupousuarioSrc){
	
	var self = this;
	//	self.prueba=prb();
	$scope.permiso=	
	{
		id:"",
		id_usuario:"",
		recurso:"",
		id_grupo:"",
		nombre:"",
		observacion:""
	};
        $scope.slcUsuario={};
        $scope.slcMenu={};
	$scope.usuarios={};
	$scope.permisos_usuarios=[];
	$scope.permisos_usuario={
            id_menu:"",
            recurso:"",
            id_usuario:"",
            nombre:""
        };
	$scope.recursos={};
	$scope.recursos_seleccionados={};
	
	$scope.confPer=
	{
		headerCrear:"GENERAR NUEVO PERMISO",
		headerEditar:"ACTUALIZA NUEVO PERMISO",
		successEdit:"ACTUALIZAR",
		successCrea:"GUARDAR"
	};
    $scope.checked='';
        
        //
    self.eliminar=function (i){
        permisoSrc.delete({id:$scope.permiso.id},function(data){
               //window.location = '/permisos';
        });
        $scope.checked='';
	}
	$scope.guardar=function (){
		//console.log("GUARDAR EL ARCHIVO:" +$scope.permiso.permiso+" observacion "+$scope.permiso.observacion);
		permisoSrc.save($scope.permiso,function(data){
//			   window.location = '/permisos';
                alert('VERIFIQUE NUEVOS PERMISOS ASIGNADOS');
		},function(e){
            var msg='';
                angular.forEach(e.data,function(value, key){
                    msg=msg+','+value;
                });
                $scope.save=false;
                    alert(msg); 
        });
	}
        
	$scope.consultar=function (){
		permisoSrc.get({id:$scope.permiso.id},function(data){
//                    $scope.permisos_usuarios=data.permisos;
//			$scope.permiso=data.permiso;
//			$scope.recursos.push({212
//			
//					id:$scope.permiso.id,
//					recurso:$scope.permiso.recurso
//				});
//				$scope.usuarios.push({
//					id:$scope.permiso.id_usuario,
//					name:$scope.permiso.nombre
//				});
//				
//				var lenRecurso=$scope.recursos.length-1;
//                                var lenUsuario=$scope.usuarios.length-1;
//				$scope.slcRecurso = $scope.recursos[lenRecurso];
//				$scope.slcUsuario = $scope.usuarios[lenUsuario];
//                                $scope.consultaRecursoPorMenu();
		});
	}
//	$scope.actualizar=function (){
//		permisoSrc.update($scope.permiso,function(data){
//			//console.log("actualizars");
//			window.location = '/permisos';
//		});
//	}
        /**
         * Genera un array con los items seleccionados.
         * @returns {undefined}
         */
        self.recursosSeleccionados=function()
        {
            var array=[];
             angular.forEach($scope.menu_recursos,function(obj,key){
                //buscar los elementos que tienen el 1 en agregar
                if(obj.agregar=='1')
                {
                    var permiso ={id_menu:$scope.slcMenu.id,recurso:obj.recurso};
//                    console.log(permiso);
                    
                    array.push(permiso);
                }
            });
            $scope.recursos_seleccionados=array;
//            return array;
        }
//        self.generaPermiso(recursos_seleccionados){
//            
//        }
        /**
         * Recibe un id de usuario y id de grupo y regresa un array de usuarios con los permisos selecionados
         * @type Array
         */
        self.usuariosDeGrupo=function(){
            var us=[]
            var contar_qry_user=0;
            var grpo=grupousuarioSrc.get({id_grupo:$scope.slcGrupo.id},function(data){
                $scope.grupos_usuarios=data.grupos_usuarios;
                if(data.length>0){//verfica el resultado de la consulta
                    //vericar si hay usuarios en el gpo
                }
                angular.forEach($scope.grupos_usuarios,function(obj,key){// va a buscar usuarios
                    
                    userSrc.get({vista:1,id_usuario:obj.id_usuario},function(d){
                        if(d.length>0){//verifica que la consulta tenga un arreglo
                            contar_qry_user++;
                            if(d.users.lenth>0){//Verifica que tenga users la consulta
                                //GUARDAR TODOS LOS USUARIOS EN UN ARREGLO PRIMERO; AL TERMINAR HACER GUARDADO...
                                $scope.usuario=d.users[0];
                                var x=self.recursosUsuario();
                                for(y in x)//recorrer el array de los recursos recorridos
                                {
                                   us.push(x[y]);
                                }
        //                        console.log($scope.grupos_usuarios.length);
        //                        console.log(contar_user);
                                if($scope.grupos_usuarios.length===contar_qry_user){
                                    //ir a guardar
                                    $scope.permiso=us;
                                    $scope.guardar();
                                }
    //                       console.log(us);//3 consulta los usuarios
                                
                            }
                        }else{
                            alert('ERROR DE DATOS.');
                        }
                    },function(){alert('ERROR EN CONSULTA');})
                });
//                console.log('termine foreach');//2 se hace la peticion de grupousuariosSrc y despues se muestra este.
            },function(err){alert('ERROR EN CONSULTA');});
//            console.log(grpo);//1 termina en primer lugar, incluso antes de la peticion
        }
        /**
         * genera arreglo de tantos usuarios como permisos seleccionados
         * @returns {undefined}
         */
            
        self.recursosUsuario= function(){
            var itm={recurso:'',id_menu:''};
//            $scope.permiso={};
//            $scope.permisos_usuarios=[];
            var arr_permisos=[];
            for (recurso in $scope.recursos_seleccionados){//recorrer array objetos de recursos seleccionados
                var recurso_usuario={};
//                console.log($scope.recursos_seleccionados[recurso]);
                    recurso_usuario.nombre=$scope.usuario.name;
                    recurso_usuario.id_usuario=$scope.usuario.id;
                
                for(item in $scope.recursos_seleccionados[recurso]){//recorrer por elementos dentro del objeto
                    for (etq in itm){//recorrer objetos segun la etiqueta qe se solicita
                        recurso_usuario[etq]=$scope.recursos_seleccionados[recurso][etq];
                    }
                }
                arr_permisos.push(recurso_usuario);
//                console.log(recurso_usuario);
//            $scope.permisos_usuarios.push(recurso_usuario);
            }
//            console.log(arr_permisos);
            return arr_permisos;
//            $scope.guardar();
        }
        $scope.limpia=function(){
            $scope.checked='';
            $scope.slcUsuario="";
            $scope.menu_recursos="";
            $scope.slcGrupo="";
            $scope.slcMenu="";
        }
        $scope.limpiaGrupo=function(){
            $scope.slcGrupo=""
        }
        $scope.limpiaUsuario=function(){
            $scope.slcUsuario=""
        }
        $scope.chkRecursos=function(x)
        {
//            console.log($scope.menu_recursos);
            $scope.checked=x;
            console.log($scope.checked);
            if(x.agregar=='' || x.agregar == undefined)
            {
//               console.log('bandera 1');
                x.agregar='1';
            }else if(x.agregar=='1')
            {
//                console.log('bandera 0');
                x.agregar='';
            }
//            x.agregar='YESZZ';
//            console.log(x);
//            console.log($scope.check);
//            $scope.chkRecursos.push(x);
//            console.log($scope.chkRecursos);
        }
        
        $scope.elimina=function(x){
            $scope.permiso=x;
            permisoSrc.delete({id:$scope.permiso.id},function(data){
//                $scope.busca();
            //window.location = '/permisos'
            $scope.permisos_usuarios='';
            });
        }
        $scope.busca=function(){
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
$scope.id=
{
	id:1
};

        $scope.consultaRecursos=function(){										console.log($scope.slcMenu);
            $scope.menu_recursos="";
            if(($scope.slcMenu!==undefined || $scope.slcMenu!=='')){	//recursoSrc.get({id_menu:$scope.slcMenu.id},function(data){
                recursoSrc.get({id_menu:$scope.slcMenu},function(data){
                    if(data.recursos!=undefined){
                        
                    $scope.menu_recursos=data.recursos.data;
                    }else
                    {alert('ACTUALIZAR NAVEGADOR');}
                },function(err){alert('ERROR EN CONSULTA.');});
            }
        }
        $scope.consultaRecurso=function()//YA NO SE USA
        {
            //console.log($scope.permiso.vista);
            if(($scope.slcRecurso!==undefined || $scope.slcRecurso!==''))
            {
               recursoSrc.get({id:$scope.slcRecurso.id},function(data){//CONSULTA EL RECURSO POR ID EN PARAMETRO
			$scope.permiso=data.objeto;//PASA EL RECURSO A PERMISO, INCLUSO EL ID_MENU
			$scope.prueba=data.objeto;//PASA EL RECURSO A PERMISO, INCLUSO EL ID_MENU
                        if($scope.permiso.id_menu>0)
                        {
                            menuSrc.get({id:$scope.permiso.id_menu},function(data){//CONSULTA EL MENU RELACIONADO
//                                $scope.permiso.menu=data.menu.menu;
                                    $scope.array=[];
                                    $scope.array2=[];
                                    $scope.array.push($scope.prueba);
                                    $scope.array2.push(data.menu);
                                    $scope.array2.push(data.menu);
                                    $scope.array.push($scope.array2);
                                    var obj=agregarSrv.agregar($scope.array);
//                                console.log(obj);
                            },function(err){alert('ERROR EN MENU');});
                        }                        
		},function(err){alert('ERROR EN RECURSO');});
            }
        }
        
        $scope.consultaRecursoPorMenu=function()
        {
            if(($scope.slcRecurso.recurso!==undefined || $scope.slcRecurso.recurso!==''))
            {
                recursoSrc.get({recurso:$scope.slcRecurso.recurso},function(data){//CONSULTA EL RECURSO POR ID EN PARAMETRO
                        $scope.permiso.etiqueta=data.recursos.data[0].etiqueta;//PASA EL RECURSO A PERMISO, INCLUSO EL ID_MENU
                        if($scope.permiso.id_menu>0)
                        {
                            menuSrc.get({id:$scope.permiso.id_menu},function(data){//CONSULTA EL MENU RELACIONADO
                                $scope.permiso.menu=data.menu.menu;
                                
                                $scope.permiso.desabilitaUsuario=true;
                            },function(err){alert('ERROR EN MENU');});
                        }                        
                },function(err){alert('ERROR EN RECURSO');});
                
            }
        }
$scope.guarda=function(){
        var array=[];
        if($scope.slcUsuario.name!=='' && $scope.slcUsuario.name!== undefined)
        {
            angular.forEach($scope.menu_recursos,function(obj,key){
                //buscar los elementos que tienen el 1 en agregar
                if(obj.agregar=='1')
//                console.log(obj.agregar);
                {
                    var permiso ={id_menu:$scope.slcMenu,id_usuario:$scope.slcUsuario.id,nombre:$scope.slcUsuario.name,recurso:obj.recurso};
                    array.push(permiso);
                }
            });
                if(array.length>0)
                {
                    $scope.permiso=array;
            //        console.log($scope.permiso);
                    $scope.guardar();
                }else
                {
                    alert('DEBE SELECCIONAR PERMISOS Y USUARIO');
                }
        }else if($scope.slcGrupo!=='')
        {
            //buscar usuarios del grupos seleccionado, en grupo_usuarios.id_usuario
            //generar el arreglo id_usurio e id_nombre
            self.recursosSeleccionados();
            var arr=self.usuariosDeGrupo();
        }else
        {
            alert('SELECCIONE USUARIO O GRUPO');
        }
}
	$timeout(function() {
		if($scope.permiso.vista===1)
		{// consulta para editar el objeto.
//                        menuSrc.get({},function(data){
//                            $scope.menus=data.menus.data;
//                        },function(err){alert('ERROR AL CONSULTAR');});
//
//			userSrc.get({vista:1},function(data){
//				$scope.usuarios=data.users;
//			});
//			
//			recursoSrc.get({vi:1},function(data){
//				$scope.recursos=data.recursos;
//				$scope.consultar();
//			});
                        
			
		}else if ($scope.permiso.vista!=2)
		{// solo para crear.
                    grupoSrc.get({},function(data){
                        $scope.grupos=data.grupos;
                    },function(err){alert('ERROR AL CONSULTAR');});
                    menuSrc.get({vi:1},function(data){
                        $scope.menus=data.menus;
                    },function(err){alert('ERROR AL CONSULTAR');});
                    
			userSrc.get({vista:1},function(data){
				$scope.usuarios=data.users;
			});
			recursoSrc.get({vi:1},function(data){
				$scope.recursos=data.recursos;
			});
		}
		
	}, 1000);
	
}
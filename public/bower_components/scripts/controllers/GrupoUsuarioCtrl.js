function GrupoUsuarioFnCtrl($timeout,$scope,userSrc,grupoSrc,grupousuarioSrc){
	
	var self = this;
	$scope.grupo=	
	{
		id:"",
		grupo:"",
		observacion:""
	};
	$scope.usuarios={
            id:"",
            nombre:""
        };
	$scope.grupo_usuario={
            id:"",
            id_grupo:"",
            grupo:"",        
            nombre:"",        
            id_usuario:""
        };
        $scope.usuario={
        slcUsuario:""};
	self.eliminarGrupo=function (i){
		grupoSrc.delete({id:i.id},function(data){
                    self.refrescaGrupo();
		},function(err){alert('ERROR EN CONSULTA A SERVIDOR');});
	}
	self.restaurarGrupo=function (i){
		grupoSrc.delete({id:i.id},function(data){
                    window.location='/grupos-usuarios';
		},function(err){alert('ERROR EN CONSULTA A SERVIDOR');});
	}
	self.guardarGrupo=function (){
		grupoSrc.save($scope.grupo,function(data){
			   //limpiar tabla, 
                           //consultar todos los grupos
                           //mostrar en la tabla los grupos
                           self.refrescaGrupo();
		},function(err){alert('ERROR EN CONSULTA A SERVIDOR');});
	}
	self.consultarGrupo=function (){
		grupoSrc.get({id:$scope.grupo.id},function(data){
			$scope.grupos=data.grupos;
//			$scope.recursos.push({
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
		},function(err){alert('ERROR EN CONSULTA A SERVIDOR');});
	}
    self.actualizarGrupo=function (){
            grupoSrc.update($scope.grupo,function(data){
                refrescaGrupo();
                    console.log("actualizars, tambien debe actualizar el nombre en los usuarios q estan en el grupo");

            });
    }
    self.refrescaGrupo=function(){
        $scope.grupos="";
        self.consultarGrupo();
    }
    $scope.modificaGrupo=function(x){
        $scope.grupo=x;
    }
    $scope.eliminaGrupo=function(x){
        
        if(confirm('¿DESEA ELIMINAR?'))
        {           
            //console.log('Borrar'+x.id);
            self.eliminarGrupo(x);
            
        }
    }
    $scope.seleccionaGrupo=function(x){
        $scope.grupo_usuario.id_grupo=x.id;
        $scope.grupo_usuario.grupo=x.grupo;
        self.grupoUsuarios();
    }
    $scope.usuarioSeleccionado=function(x){
        $scope.grupo_usuario.id_usuario=x.id;
        $scope.grupo_usuario.nombre=x.nombre;
        //$scope.grupos_usuarios="";
        self.usuarioGrupos();
    }
//CREAR NUEVO PERMISO.
/**
    CONSULTAR USUARIO
    CONSULTAR RECURSOS
**/
$scope.limpiarGrupo=function(){
    $scope.grupo={
        id:"",
        grupo:"",
        observacion:""
    }
    $scope.grupo_usuario={
      id_grupo:"",
      grupo:""
    }
}
$scope.aceptarGrupo=function(){//guarda 
    if($scope.grupo.id){//se va actualizar, verificar y validar existencia...
        self.actualizarGrupo();
            
    }else
    {// se va agregar nuevo elemento, verificar y validar existecia...
	self.guardarGrupo();
        
    }
}
/**
 * Actualiza o Inserta en la tabla usuarios grupos
 * Antes de agregar verificar q no exista un usarios_grupos.id_usuario && usuario_grupos.id_grupo
 * @returns {undefined}
 */
$scope.agrupa=function()
{//agrega un usuario a un nombre de grupo, debe validar que no repita el usuario dentro de un grupo
    grupousuarioSrc.save($scope.grupo_usuario,function(){
        //UNA VEZ AGRUPADO, SE HACE LA CONSULTA PARA LLENAR EL OBJETO grupo_usuario
        grupousuarioSrc.get({id_usuario:$scope.grupo_usuario.id_usuario},function(data){
            self.usuarioGrupos();
//            var grupos_usuarios=data.grupos_usuarios
//            angular.forEach(grupos_usuarios,function(grupo_usuario,key){
//                angular.forEach(grupo_usuario,function(agrupado_a,$key)
//                {
//                });
//            });
        },function(err){alert('ERROR AL CONSULTAR')});
    },function(err){alert('ERROR AL ALMACENAR')});
}
self.usuarioGrupos=function(){
    //consultar el nombre del usuario al que hace referencia grupo_usuario.id_usuario
    //consultar el grupo al que hace referencia grupo_usuario.id_grupo
    //UNA VEZ AGRUPADO, SE HACE LA CONSULTA PARA LLENAR EL OBJETO grupo_usuario
    $scope.grupos_usuarios=""
        var grupo="";
        var usuario="";
    grupousuarioSrc.get({id_usuario:$scope.grupo_usuario.id_usuario},function(data){
        //se obtiene la tabla pivote grupos_usuarios, obtiene grupo_usuario.id_usuario y grupo_usuario.id_grupo
        $scope.grupos_usuarios=data.grupos_usuarios;
        userSrc.get({id_usuario:$scope.grupo_usuario.id_usuario,vista:1},function(data){//consulta el nombre de la tabla grupo_usuario.id_usuario
            usuario=data.users;
            
            angular.forEach($scope.grupos_usuarios,function(grupo_usuario,key){//recorre los grupos_usuarios obtenido de la busqueda por usuario.
    //            if(grupo_usuario.id_grupo!= undefined )
    //            {
                    grupoSrc.get({id:grupo_usuario.id_grupo},function(data){//se hace la busqueda de grupo cada usuario.
                        grupo=data.grupos;
                        grupo_usuario.grupo=grupo[0].grupo;
                        grupo_usuario.nombre=usuario[0].name;
                    },function(err){alert('ERROR AL CONSULTAR')});
                //}
            });//fin foreachh
        },function(){alert('Error en consulta de datos');});//fin query usuario
        
    },function(err){alert('ERROR AL CONSULTAR')});
}
self.grupoUsuarios=function(){//CONSULTA LOS USUARIOS Q EXISTEN EN UN GRUPO
    $scope.grupos_usuarios="";
    var grupo;
    var usuario;
    grupousuarioSrc.get({id_grupo:$scope.grupo_usuario.id_grupo},function(data){//CONSULTA TABLA PIVOTE grupos_usuarios por grupos_usuarios.id_usuario
        $scope.grupos_usuarios=data.grupos_usuarios;
        //CONSULTAR TODOS LOS USUARIOS PARA CADA ITEM DE ESTE GRUPO.
        angular.forEach($scope.grupos_usuarios,function(grupo_usuario,key){
            userSrc.get({id_usuario:grupo_usuario.id_usuario,vista:1},function(data){
               usuario=data.users;
               grupo_usuario.nombre=usuario[0].name;
               grupo_usuario.grupo=$scope.grupo_usuario.grupo;
        },function(err){alert('EROR EN CONSULTA AL SERVIDOR');});
    });
    },function(err){alert('ERROR EN CONSULTA')});
}
$scope.eliminaUsuarioGrupo=function(x)
{
    grupousuarioSrc.delete({id:x.id},function(data){
        self.usuarioGrupos();
    },function(){alert('ERROR AL ELIMINAR');});
}

$scope.restauraGrupo=function(x)
{
    self.restaurarGrupo(x);
}
	$timeout(function() {
		if($scope.grupo.vista===1)
		{// consulta para editar el objeto.
			userSrc.get({vista:1},function(data){
				$scope.usuarios=data.users;
                                self.consultarGrupo();
                                
			});
			
		}
		
	}, 1000);
	
}
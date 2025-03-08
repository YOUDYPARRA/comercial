function grupoUsuarioRel(grupousuarioSrc) {
    /**
     * recibe id_usuario
     * recibe id_grupo
     * @param {type} json
     * @return {undefined}
     */
    this.getGruposUsuarios=function(json){
        var grupos_usuarios="";
        grupousuarioSrc.get({id_usuario:this.json.id_usuario,id_grupo:this.json.id_grupo},function(data){
            return grupos_usuarios=data.grupos_usuarios;
        },function(){alert('ERROR EN CONSULTA');});
    }
}
////'use strict';
//angular.module('cotizacionApp')
//.factory('grupousuarioSrc',function ($resource)
//    {
//                return $resource("/grupos_usuarios/:id",{id:"@_id"},
//                {
//                    update:{method:"PUT",params:{id:"@id"}}
//                })
//    })

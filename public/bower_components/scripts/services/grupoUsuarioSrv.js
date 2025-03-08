'use strict';
angular.module('cotizacionApp')
.factory('grupousuarioSrc',function ($resource)
    {
                return $resource("/grupos_usuarios/:id",{id:"@_id"},
                {
                    update:{method:"PUT",params:{id:"@id"}}
                })
    })
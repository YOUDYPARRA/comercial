'use strict';
angular.module('cotizacionApp')
.factory('permisoSrc',function ($resource)
    {
                return $resource("/permisos/:id",{id:"@_id"},
                {
                    update:{method:"PUT",params:{id:"@id"}}
                })
    })
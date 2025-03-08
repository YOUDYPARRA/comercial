'use strict';
angular.module('cotizacionApp')
.factory('grupoSrc',function ($resource)
    {
                return $resource("/grupos/:id",{id:"@_id"},
                {
                    update:{method:"PUT",params:{id:"@id"}}
                })
    })
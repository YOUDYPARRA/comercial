'use strict';
angular.module('cotizacionApp')
.factory('plantillasSrc',function ($resource)
    {
                return $resource("/plantillas/:id",{id:"@_id"},
                {
                    update:{method:"PUT",params:{id:"@id"}}
                })
    })
'use strict';
angular.module('cotizacionApp')
.factory('productosSrc',function ($resource)
    {
                return $resource("/productos/:id",{id:"@_id"},
                {
                    update:{method:"PUT",params:{id:"@id"}}
                })
    })
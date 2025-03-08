'use strict';
angular.module('cotizacionApp')
.factory('ventaSrc',function ($resource)
    {
                return $resource("/ventas/:id",{id:"@_id"},
                {
                    update:{method:"PUT",params:{id:"@id"}}
                })
    })
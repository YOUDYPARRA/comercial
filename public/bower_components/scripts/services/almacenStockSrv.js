'use strict';
angular.module('cotizacionApp')
.factory('almacenStockSrc',function ($resource)
    {
                return $resource("/almacenstock/:id",{id:"@_id"},
                {
                    update:{method:"PUT",params:{id:"@id"}}
                })
    })
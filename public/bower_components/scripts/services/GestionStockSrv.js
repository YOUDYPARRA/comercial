'use strict';
angular.module('cotizacionApp')
.factory('gestionStockSrc',function ($resource)
    {
                return $resource("/gestionstock/:id",{id:"@_id"},
                {
                    update:{method:"PUT",params:{id:"@id"}}
                })
    })
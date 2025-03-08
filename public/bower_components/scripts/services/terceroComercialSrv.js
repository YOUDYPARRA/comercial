'use strict';
angular.module('cotizacionApp')
.factory('terceroComercialSrc',function ($resource)
    {
                return $resource("/terceroscomerciales/:id",{id:"@_id"},
                {
                    update:{method:"PUT",params:{id:"@id"}}
                })
    })
'use strict';
angular.module('cotizacionApp')
.factory('catalogosCalculoSrc',function ($resource)
    {
                return $resource("/catalogos_calculo/:id",{id:"@_id"},
                {
                    update:{method:"PUT",params:{id:"@id"}}
                })
    }) 
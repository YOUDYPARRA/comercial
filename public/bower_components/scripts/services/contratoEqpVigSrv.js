'use strict';
angular.module('cotizacionApp')
.factory('contratosEqpVigSrc',function ($resource)
    {
                return $resource("/contratos/vigencia/:id",{id:"@_id"},
                {
                    update:{method:"PUT",params:{id:"@id"}}
                })
    })
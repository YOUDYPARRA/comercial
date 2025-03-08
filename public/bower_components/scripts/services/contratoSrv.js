'use strict';
angular.module('cotizacionApp')
.factory('contratosSrc',function ($resource)
    {
                return $resource("/contratos/:id",{id:"@_id"},
                {
                    update:{method:"PUT",params:{id:"@id"}}
                })
    })
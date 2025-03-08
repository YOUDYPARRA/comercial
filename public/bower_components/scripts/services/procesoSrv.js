'use strict';
angular.module('cotizacionApp')
.factory('procesosSrc',function ($resource)
    {
                return $resource("/procesos/:id",{id:"@_id"},
                {
                    update:{method:"PUT",params:{id:"@id"}}
                })
    })
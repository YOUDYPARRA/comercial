'use strict';
angular.module('cotizacionApp')
.factory('equiposSrc',function ($resource)
    {
                return $resource("/equipos:id",{id:"@_id"},
                {
                    update:{method:"PUT",params:{id:"@id"}}
                })
    })
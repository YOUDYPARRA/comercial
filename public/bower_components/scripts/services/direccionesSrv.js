'use strict';
angular.module('cotizacionApp')
.factory('direccionesSrc',function ($resource)
    {
                return $resource("/direccion:id",{id:"@_id"},
                {
                    update:{method:"PUT",params:{id:"@id"}}
                })
    })
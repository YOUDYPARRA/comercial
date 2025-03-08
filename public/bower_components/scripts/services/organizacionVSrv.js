'use strict';
angular.module('cotizacionApp')
.factory('orgVsrc',function ($resource)
    {
                return $resource("/organizacion_v:id",{id:"@_id"})
    })
'use strict';
angular.module('cotizacionApp')
.factory('centroCostoSrc',function ($resource)
    {
                return $resource("/centros_costo:id",{id:"@_id"})
    })
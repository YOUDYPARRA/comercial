'use strict';
angular.module('cotizacionApp')
.factory('tipoMonedaSrc',function ($resource)
    {
                return $resource("/tipos_moneda:id",{id:"@_id"})
    })
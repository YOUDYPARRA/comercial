'use strict';
angular.module('cotizacionApp')
.factory('tipoTransaccionSrc',function ($resource)
    {
                return $resource("/tipos_transaccion:id",{id:"@_id"})
    })
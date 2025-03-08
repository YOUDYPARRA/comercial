'use strict';
angular.module('cotizacionApp')
.factory('metodoPagoSrc',function ($resource)
    {
        return $resource("/metodos_pago:id",{id:"@_id"})
    })
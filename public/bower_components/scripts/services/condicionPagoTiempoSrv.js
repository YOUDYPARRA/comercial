'use strict';
angular.module('cotizacionApp')
.factory('condicionPagoTiempoSrc',function ($resource)
    {
                return $resource("/condiciones_pago_tiempo:id",{id:"@_id"})
    })
'use strict';
angular.module('cotizacionApp')
.factory('condicionFacturaSrc',function ($resource)
    {
                return $resource("/condiciones_factura:id",{id:"@_id"})
    })
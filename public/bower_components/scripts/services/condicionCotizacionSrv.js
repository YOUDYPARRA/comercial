'use strict';
angular.module('cotizacionApp')
.factory('condicionCotizacionSrc',function ($resource)
    {
                return $resource("/condiciones_cotizaciones:id",{id:"@_id"})
    })
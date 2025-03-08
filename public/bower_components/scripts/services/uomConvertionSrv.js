'use strict';
angular.module('cotizacionApp')
.factory('uomConvertionSrc',function ($resource)
    {
                return $resource("/uom_convertion/")
    })
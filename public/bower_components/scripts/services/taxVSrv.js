'use strict';
angular.module('cotizacionApp')
.factory('taxVsrc',function ($resource)
    {
                return $resource("/tax_v:id",{id:"@_id"})
    })
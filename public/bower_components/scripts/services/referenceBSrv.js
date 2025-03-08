'use strict';
angular.module('cotizacionApp')
.factory('referenceBsrc',function ($resource)
    {
                return $resource("/reference_bank:id",{id:"@_id"})
    })
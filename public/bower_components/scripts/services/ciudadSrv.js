'use strict';
angular.module('cotizacionApp')
.factory('ciudadSrc',function ($resource)
    {
                return $resource("/ciudad/:id",{id:"@_id"})
    })
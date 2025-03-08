'use strict';
angular.module('cotizacionApp')
.factory('mensualidadSrc',function ($resource)
    {
        return $resource("/mensualidad/:id",{id:"@_id"})
    })
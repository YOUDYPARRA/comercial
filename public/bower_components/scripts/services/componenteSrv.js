'use strict';
angular.module('cotizacionApp')
.factory('componenteSrc',function ($resource)
    {
                return $resource("/componentes/:id",{id:"@_id"})
    })
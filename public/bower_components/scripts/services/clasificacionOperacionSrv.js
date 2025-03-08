'use strict';
angular.module('cotizacionApp')
.factory('ClasificacionOperacionSrc',function ($resource)
    {
                return $resource("/clasificacion_operacion/:id",{id:"@_id"})
    })
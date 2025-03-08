'use strict';
angular.module('cotizacionApp')
.factory('modoEnvioSrc',function ($resource)
    {
                return $resource("/modos_envios/:id",{id:"@_id"})
    })
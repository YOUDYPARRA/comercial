'use strict';
angular.module('cotizacionApp')
.factory('metodoEnvioSrc',function ($resource)
    {
                return $resource("/metodos_envio:id",{id:"@_id"})
    })
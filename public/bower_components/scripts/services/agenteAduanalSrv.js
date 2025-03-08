'use strict';
angular.module('cotizacionApp')
.factory('agenteAduanalSrc',function ($resource)
    {
                return $resource("/agentes_aduanales/:id",{id:"@_id"})
    })
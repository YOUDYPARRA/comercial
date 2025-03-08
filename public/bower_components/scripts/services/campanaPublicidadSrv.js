'use strict';
angular.module('cotizacionApp')
.factory('campanaPublicidadSrc',function ($resource)
    {
                return $resource("/campanas_publicidad:id",{id:"@_id"})
    })
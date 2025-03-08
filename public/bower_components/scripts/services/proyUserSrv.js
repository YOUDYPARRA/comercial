'use strict';
angular.module('cotizacionApp')
.factory('proyUserSrc',function ($resource)
    {
                return $resource("/proy_user/:id",{id:"@_id"}
                )
    })
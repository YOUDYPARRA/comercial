'use strict';
angular.module('cotizacionApp')
.factory('tipoAlmacenSrc',function ($resource)
    {
                return $resource("/tipos_almacen/:id",{id:"@_id"})
    })
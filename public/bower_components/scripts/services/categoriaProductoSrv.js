'use strict';
angular.module('cotizacionApp')
.factory('categoriaProductoSrc',function ($resource)
    {
                return $resource("/categoria_producto:id",{id:"@_id"})
    })
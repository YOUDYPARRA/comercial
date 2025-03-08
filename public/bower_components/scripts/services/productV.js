'use strict';
angular.module('cotizacionApp')
.factory('productVSrc',function ($resource)
    {
                return $resource("/product_v:id",{id:"@_id"})
    })
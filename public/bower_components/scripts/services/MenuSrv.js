'use strict';
angular.module('cotizacionApp')
.factory('menuSrc',function ($resource)
    {
                return $resource("/menus/:id",{id:"@_id"})
    })
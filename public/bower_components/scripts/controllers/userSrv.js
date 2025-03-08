'use strict';
angular.module('cotizacionApp')
.factory('userSrc',function ($resource)
    {
                return $resource("/users/:id",{id:"@_id"},
                {
                    update:{method:"PUT",params:{id:"@id"}}
                })
    })
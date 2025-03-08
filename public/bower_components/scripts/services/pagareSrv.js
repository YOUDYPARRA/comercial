'use strict';
angular.module('cotizacionApp')
.factory('pagareSrc',function ($resource)
    {
                return $resource("/pagares/:id",{id:"@_id"},
                {
                    update:{method:"PUT",params:{id:"@id"}}
                })
    })
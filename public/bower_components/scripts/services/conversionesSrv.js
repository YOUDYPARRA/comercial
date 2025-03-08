'use strict';
angular.module('cotizacionApp')
.factory('conversionSrc',function ($resource)
    {
                return $resource("/conversiones/:id",{id:"@_id"},
                {
                    update:{method:"PUT",params:{id:"@id"}}
                })
    })
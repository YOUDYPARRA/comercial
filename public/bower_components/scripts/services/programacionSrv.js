'use strict';
angular.module('cotizacionApp')
.factory('programacionSrc',function ($resource)
    {
                return $resource("/programaciones/:id",{id:"@_id"},
                {
                    update:{method:"PUT",params:{id:"@id"}}
                })
    })
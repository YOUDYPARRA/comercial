'use strict';
angular.module('cotizacionApp')
.factory('cotizacionSrc',function ($resource)
    {
                return $resource("/cotizaciones/:id",{id:"@_id"},
                {
                    update:{method:"PUT",params:{id:"@id"}}
                })
    })
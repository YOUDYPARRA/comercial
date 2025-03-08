'use strict';
angular.module('cotizacionApp')
.factory('coordinacionesSrc',function ($resource)
    {
                return $resource("/coordinaciones/:id",{id:"@_id"},
                {
                    update:{method:"PUT",params:{id:"@id"}}
                })
    })
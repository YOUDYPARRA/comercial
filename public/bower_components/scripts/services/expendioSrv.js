'use strict';
angular.module('cotizacionApp')
.factory('expendiosSrc',function ($resource)
    {
                return $resource("/expendios/:id",{id:"@_id"},
                {
                    update:{method:"PUT",params:{id:"@id"}}
                })
    })
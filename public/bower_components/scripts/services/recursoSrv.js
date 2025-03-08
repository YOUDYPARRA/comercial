'use strict';
angular.module('cotizacionApp')
.factory('recursoSrc',function ($resource)
    {
                return $resource("/recursos/:id",{id:"@_id"},
                {
                    update:{method:"PUT",params:{id:"@id"}}
                })
    })
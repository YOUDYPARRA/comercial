'use strict';
angular.module('cotizacionApp')
.factory('precalculosSrc',function ($resource)
    {
                return $resource("/precalculos/:id",{id:"@_id"},
                {
                    update:{method:"PUT",params:{id:"@id"}}
                })
    })
'use strict';
angular.module('cotizacionApp')
.factory('comercialesSrc',function ($resource)
    {
                return $resource("/comerciales/:id",{id:"@_id"},
                {
                    update:{method:"PUT",params:{id:"@id"}}
                })
    })
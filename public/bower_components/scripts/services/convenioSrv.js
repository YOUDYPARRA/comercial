'use strict';
angular.module('cotizacionApp')
.factory('convenioSrc',function ($resource)
    {
        return $resource("/convenios/:id",{id:"@_id"},
                {
                    update:{method:"PUT",params:{id:"@id"}}
                })
    })
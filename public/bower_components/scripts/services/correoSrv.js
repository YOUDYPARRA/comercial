'use strict';
angular.module('cotizacionApp')
.factory('correoSrc',function ($resource)
    {
                return $resource("/sendEmail/:id",{id:"@_id"},
                {
                    update:{method:"PUT",params:{id:"@id"}}
                })
    })
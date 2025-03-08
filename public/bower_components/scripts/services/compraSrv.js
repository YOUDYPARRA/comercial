'use strict';
angular.module('cotizacionApp')
.factory('compraSrc',function ($resource)
    {
                return $resource("/compras/:id",{id:"@_id"},
                {
                    update:{method:"PUT",params:{id:"@id"}}
                })
    })
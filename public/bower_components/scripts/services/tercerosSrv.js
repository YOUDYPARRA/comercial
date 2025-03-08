'use strict';
angular.module('cotizacionApp')
.factory('tercerosSrc',function ($resource)
    {
                return $resource("/terceros/:id",{id:"@_id"},
                {
                    update:{method:"PUT",params:{id:"@id",group_name:"@group_name"}}
                })
    })
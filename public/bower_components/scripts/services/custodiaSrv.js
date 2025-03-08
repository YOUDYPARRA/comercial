'use strict';
angular.module('cotizacionApp')
.factory('custodiaSrc',function ($resource)
    {
                return $resource("/custodias/:id",{id:"@_id"},
                {
                    update:{method:"PUT",params:{id:"@id"}}
                })
    })
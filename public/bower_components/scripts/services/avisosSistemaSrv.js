'use strict';
angular.module('cotizacionApp')
.factory('avisosSistemaSrc',function ($resource)
    {
                return $resource("/avisos_sistema/:id",{id:"@_id"},
                {
                    update:{method:"PUT",params:{id:"@id"}}
                })
    })
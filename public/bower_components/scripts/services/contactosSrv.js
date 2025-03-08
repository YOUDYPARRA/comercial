'use strict';
angular.module('cotizacionApp')
.factory('contactosSrc',function ($resource)
    {
                return $resource("/contactos:id",{id:"@_id"},
                {
                    update:{method:"PUT",params:{id:"@id"}}
                })
    })
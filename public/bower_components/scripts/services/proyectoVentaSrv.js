'use strict';
angular.module('cotizacionApp')
.factory('proyectoVentaSrc',function ($resource)
    {
                return $resource("/proyectoventa/:id",{id:"@_id"},
                {
                    update:{method:"PUT",params:{id:"@id"}}
                })
    })
'use strict';
angular.module('cotizacionApp')
.factory('ordenServicioSrc',function ($resource)
    {
                return $resource("/ordenes_servicio/:id",{id:"@_id"},
                {
                    update:{method:"PUT",params:{id:"@id"}}
                })
    })
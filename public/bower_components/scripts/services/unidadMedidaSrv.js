'use strict';
angular.module('cotizacionApp')
.factory('unidadMedidaSrc',function ($resource)
    {
                return $resource("/unidades_medidas/:id",{id:"@_id"},
                {
                    update:{method:"PUT",params:{id:"@id"}}
                })
    })
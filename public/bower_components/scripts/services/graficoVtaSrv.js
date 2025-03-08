'use strict';
angular.module('cotizacionApp')
.factory('graficoVtaSrc',function ($resource)
    {
                return $resource("/grafico_proyecto_venta/:id",{id:"@_id"},
                {
                    update:{method:"PUT",params:{id:"@id"}}
                })
    })

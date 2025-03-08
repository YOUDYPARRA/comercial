'use strict';
angular.module('cotizacionApp')
.factory('cotizacionContratosSrc',function ($resource)
    {
                return $resource("/cotizaciones_contratos/:id",{id:"@_id"},
                {
                    update:{method:"PUT",params:{id:"@id"}}
                })
    })
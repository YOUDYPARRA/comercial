'use strict';
angular.module('cotizacionApp')
.factory('cotizacionPaqueteInsumoSrc',function ($resource)
    {
                return $resource("/cotizacionPaqueteInsumo/:id",{id:"@_id"},
                {
                    update:{method:"PUT",params:{id:"@id",group_name:"@group_name"}}
                })
    })
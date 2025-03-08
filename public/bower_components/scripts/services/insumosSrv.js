'use strict';
angular.module('cotizacionApp')
.factory('insumosSrc',function ($resource)
    {
                return $resource("/insumos:id",{id:"@_id"},{ok:"@_ok"},
                {
                    update:{method:"PUT",params:{id:"@id"}}
                })
    })
'use strict';
angular.module('cotizacionApp')
.factory('insumoOpcionalSrc',function ($resource)
    {
                return $resource("/insumos-opcionales/:id",{id:"@_id"},
                	{
                    update:{method:"PUT",params:{id:"@id"}}
                })
    })
'use strict';
angular.module('cotizacionApp')
.factory('contratosCompraVentaSrc',function ($resource)
    {
                return $resource("/contratos_compra_venta/:id",{id:"@_id"},
                {
                    update:{method:"PUT",params:{id:"@id"}}
                })
    })
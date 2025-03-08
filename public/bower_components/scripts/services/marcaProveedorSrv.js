'use strict';
angular.module('cotizacionApp')
.factory('marcaProveedorSrc',function ($resource)
    {
                return $resource("/marcas_proveedores/:id",{id:"@_id"},
                {
                    update:{method:"PUT",params:{id:"@id"}}
                })
    })
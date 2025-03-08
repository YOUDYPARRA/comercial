'use strict';
angular.module('cotizacionApp')
.factory('cotizacionesPorUsuarioSrc',function ($resource)
    {
                return $resource("/cotizacionesPorUsuario:id",{id:"@_id"},
                {
                    update:{method:"PUT",params:{m_product_id:"@id"}}
                })
    })
'use strict';
angular.module('cotizacionApp')
.factory('ultimoPreSrc',function ($resource)
    {
                return $resource("/ultimoPre:id",{id:"@_id"},
                {
                    update:{method:"PUT",params:{m_product_id:"@id"}}
                })
    })
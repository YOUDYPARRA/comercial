'use strict';
angular.module('cotizacionApp')
.factory('maximoSrc',function ($resource)
    {
                return $resource("/maximo:id",{id:"@_id"},
                {
                    update:{method:"PUT",params:{m_product_id:"@id"}}
                })
    })
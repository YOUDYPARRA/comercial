'use strict';
angular.module('cotizacionApp')
.factory('paquetesSrc',function ($resource)
    {
                return $resource("/consultarPaquetes:id",{id:"@_id"},
                {
                    update:{method:"PUT",params:{m_product_id:"@id"}}
                })
    })
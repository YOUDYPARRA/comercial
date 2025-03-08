'use strict';
angular.module('cotizacionApp')
.factory('paqueteSrc',function ($resource)
    {
                return $resource("/paquetes/:id",{id:"@_id"},
                {
                    update:{method:"PUT",params:{m_product_id:"@id"}}
                })
    })
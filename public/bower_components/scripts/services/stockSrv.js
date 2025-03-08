'use strict';
angular.module('cotizacionApp')
.factory('stockSrc',function ($resource)
    {
                return $resource("/stocks:id",{id:"@_id"},
                {
                    update:{method:"PUT",params:{m_product_id:"@id"}}
                })
    })
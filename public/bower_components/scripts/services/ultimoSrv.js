'use strict';
angular.module('cotizacionApp')
.factory('ultimoSrc',function ($resource)
    {
                return $resource("/ultimo:id",{id:"@_id"},
                {
                    update:{method:"PUT",params:{m_product_id:"@id"}}
                })
    })
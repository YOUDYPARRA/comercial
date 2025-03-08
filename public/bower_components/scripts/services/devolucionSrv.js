'use strict';
angular.module('cotizacionApp')
.factory('devolucionSrc',function ($resource){
        return $resource("/devoluciones/:id",{id:"@_id"},{
            update:{method:"PUT",params:{id:"@id"}}
        })
    })
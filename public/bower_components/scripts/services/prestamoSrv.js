'use strict';
angular.module('cotizacionApp')
.factory('prestamoSrc',function ($resource){
        return $resource("/prestamos/:id",{id:"@_id"},{
            update:{method:"PUT",params:{id:"@id"}}
        })
    })
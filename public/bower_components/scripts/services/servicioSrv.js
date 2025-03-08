'use strict';
angular.module('cotizacionApp')
.factory('servicioSrc',function ($resource){
        return $resource("/servicios/:id",{id:"@_id"},{
            update:{method:"PUT",params:{id:"@id"}}
        })
    })
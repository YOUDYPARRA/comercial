'use strict';
angular.module('cotizacionApp')
.factory('reportesSrc',function ($resource){
    return $resource("/reportes/:id",{id:"@_id"},{
                    update:{method:"PUT",params:{id:"@id"}}
    })
})
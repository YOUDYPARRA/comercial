'use strict';
angular.module('cotizacionApp')
.factory('servicioReporteSrc',function ($resource)
    {
                return $resource("/servicios_reporte/:id",{id:"@_id"},
                {
                    update:{method:"PUT",params:{id:"@id"}}
                })
    })
'use strict';
angular.module('cotizacionApp')
.factory('cotizacionCCVSrc',function ($resource)
    {
		return $resource("/cotizaciones/contratocompraventa/:id",{id:"@_id"},
           {
                    update:{method:"PUT",params:{id:"@id"}}
            })
    })
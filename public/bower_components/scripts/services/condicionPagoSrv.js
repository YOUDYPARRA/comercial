'use strict';
angular.module('cotizacionApp')
.factory('condicionPagoSrc',function ($resource)
    {
                return $resource("/condiciones_pagos/:id",{id:"@_id"},
	                	{
                    update:{method:"PUT",params:{id:"@id"}}
                })
    })
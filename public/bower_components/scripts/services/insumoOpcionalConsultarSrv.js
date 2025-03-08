'use strict';
angular.module('cotizacionApp')
.factory('insumoOpcionalConsultarSrc',function ($resource)
    {
                return $resource("/consultarInsumoOpcional/:id",{id:"@_id"},
                	{
                    update:{method:"PUT",params:{id:"@id"}}
                })
    })
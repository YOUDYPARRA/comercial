'use strict';
angular.module('cotizacionApp')
.factory('TicketOperacionSrc',function ($resource)
    {
                return $resource("/ticket_operacion/:id",{id:"@_id"},
                {
                    update:{method:"PUT",params:{id:"@id"}}
                })
    })
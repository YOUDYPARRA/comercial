'use strict';
angular.module('cotizacionApp')
.factory('warehouseRuleVsrc',function ($resource)
    {
                return $resource("/warehouse_rule_v:id",{id:"@_id"})
    })
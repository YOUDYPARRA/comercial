'use strict';
angular.module('cotizacionApp')
.service('sucursal',function(){
    this.qry=function(jn){
        return [
	        {nombre:'BJ'},
	        {nombre:'CH'},
	        {nombre:'GDL'},
	        {nombre:'MER'},
	        {nombre:'MTY'},
	        {nombre:'MX'},
    	];
    };

})
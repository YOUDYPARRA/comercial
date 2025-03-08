'use strict';
angular.module('cotizacionApp')
.service('organizacion',function(){
    this.qry=function(jn){
        return [
	        {nombre:'SMH'},
	        {nombre:'IMS'},        
	        {nombre:'SMD'}	        
    	];
    };

})
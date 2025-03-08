'use strict';
angular.module('cotizacionApp')
.service('ciudad',function(ciudadSrc){
	
    this.qry=function(jn){
        return ciudadSrc.get(jn,
            function(d){},
            function(e){alert('Error: '+e.status+' '+e.data)});
    };    

})
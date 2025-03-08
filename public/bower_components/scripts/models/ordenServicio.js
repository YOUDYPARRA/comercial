'use strict';
angular.module('cotizacionApp')
.service('ordenServicio',function(ordenServicioSrc){
    this.qry=function(jn){
        return ordenServicioSrc.get(jn,
            function(d){},
            function(e){alert('Error: '+e.status+' '+e.data)});
    };    
})
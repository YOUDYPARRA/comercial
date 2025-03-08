'use strict';
angular.module('cotizacionApp')
.service('coordinacion',function(coordinacionesSrc){
    this.qry=function(jn){
        return coordinacionesSrc.get(jn,function(d){},function(e){alert('Error: '+e.status+' '+e.data)});
    }

})
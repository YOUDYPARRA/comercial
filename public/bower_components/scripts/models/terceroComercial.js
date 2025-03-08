'use strict';
angular.module('cotizacionApp')
.service('terceroComercial',function(terceroComercialSrc){
    this.qry=function(jn){
        return terceroComercialSrc.get(jn,function(d){},function(e){alert('Error: '+e.status+' '+e.data)});
    }

})
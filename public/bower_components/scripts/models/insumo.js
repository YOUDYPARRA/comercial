'use strict';
angular.module('cotizacionApp')
.service('insumo',function(insumosSrc){
    this.qry=function(jn){
        return insumosSrc.get(jn,function(d){},function(e){alert('Error: '+e.status+' '+e.data)});
    }

})
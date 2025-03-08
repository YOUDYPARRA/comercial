'use strict';
angular.module('cotizacionApp')
.service('producto',function(productosSrc){
    this.qry=function(jn){
        return productosSrc.get(jn,function(d){},function(e){alert('Error: '+e.status+' '+e.data)});
    }

})
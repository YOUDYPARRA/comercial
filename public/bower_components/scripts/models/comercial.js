'use strict';
angular.module('cotizacionApp')
.service('comercial',function(comercialSrc){
    $this.qry=function(jn){
        return comercialSrc.get(jn,function(d){},function(e){alert('Error: '+e.status+' '+e.data)});
    }

})
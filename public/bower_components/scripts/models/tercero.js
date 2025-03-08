'use strict';
angular.module('cotizacionApp')
.service('tercero',function(tercerosSrc){

    this.qry=function(jn){
        return tercerosSrc.get(jn,
            function(d){},
            function(e){alert('Error: '+e.status+' '+e.data)});
    };
  

})
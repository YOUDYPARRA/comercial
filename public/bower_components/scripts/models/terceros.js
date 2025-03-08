'use strict';
angular.module('cotizacionApp')
.service('terceros',function(tercerosSrc,direccionesSrc){


    this.qry=function(jn){
        return tercerosSrc.get(jn,
            function(){},
            function(e){alert('Error: '+e.status+' '+e.data)});
    };
  

})
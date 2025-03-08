'use strict';
angular.module('cotizacionApp')
.service('direccion',function(direccionesSrc){

    this.qry=function(jn){
        return direccionesSrc.get(jn,
            function(d){},
            function(e){alert('Error: '+e.status+' '+e.data)});
    };


})
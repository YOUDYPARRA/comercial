'use strict';
angular.module('cotizacionApp')//##########R E V I S A R . . . ¿ FUNCIONA ?
.provider("condicionPagoPrv", function() {
    this.$inject=['condicionPagoSrv'];
    this.qry=function(jn){
        this.condicion= condicionPagoSrv.get(jn,
            function(d){console.log('XXX'+d);},
            function(e){alert('Error: '+e.status+' '+e.data)});
    };
    this.prb=function(x){
        $scope.x=x;
    }
    this.prb2=function(x){
        this.x=x;
    }
    this.alta=function(jn){
        return condicionPagoSrv.save(jn,
            function(){},
            function(e){alert('Error: '+e.status+' '+e.data)});
    };
    
    this.$get = function() {
        console.log("MyProviderFunction.$get() called."); //ADDED this line
        return {
            'saludo':function(msg){if(msg){console.log('hola: '+msg); this.prb2(msg);return msg;}},
            'getti':function(msg){
                condicionPagoSrv.get(jn,
            function(d){console.log('XXX'+d);},
            function(e){alert('Error: '+e.status+' '+e.data)});
            }
        }
    };

})
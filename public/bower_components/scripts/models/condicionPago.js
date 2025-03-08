'use strict';
angular.module('cotizacionApp')
.service('condicionPago',function(metodoPagoSrc,condicionPagoSrc,marcaProveedorSrc){
    this.qryMetodoPago=function(jn){
        return metodoPagoSrc.get(jn,
            function(d){},
            function(e){alert('Error: '+e.status+' '+e.data)});
    };
    this.qryMarcaProveedor=function(jn){
        return marcaProveedorSrc.get({},
            function(d){},
            function(e){alert('Error: '+e.status+' '+e.data)});
    };

    this.qry=function(jn){
        return condicionPagoSrc.get(jn,
            function(){},
            function(e){alert('Error: '+e.status+' '+e.data)});
    };
    this.crea=function(jn){
        return condicionPagoSrc.save(jn,
            function(){},
            function(e){
                if(e.status=='422'){
                    var msg='';
                    angular.forEach(e.data,function(value, key){
                        msg=msg+','+value;
                    });
                        alert(msg);

                }else{
                    alert('Error: '+e.status+' '+e.data);
                }
            });
    };
    this.baja=function(jn){
        return condicionPagoSrc.delete(jn,
            function(){},
            function(e){alert('Error: '+e.status+' '+e.data)});
    };
    this.modf=function(jn){
        //return condicionPagoSrc.update(jn);
        
        return condicionPagoSrc.update(jn,
            function(){},
            function(e){
                if(e.status=='422'){
                    var msg='';
                    angular.forEach(e.data,function(value, key){
                        msg=msg+','+value;
                    });
                        alert(msg);

                }else{
                    alert('Error: '+e.status+' '+e.data);
                }
            });
            
    };

})
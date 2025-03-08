'use strict';
angular.module('cotizacionApp')
.service('devolucion',function(devolucionSrc){
    
    this.crea=function(jn){
        return devolucionSrc.save(jn,function(){},function(e){
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

    this.qry=function(jn){
        return devolucionSrc.get(jn,function(d){},function(e){
            alert('Error: '+e.status+' '+e.data);
        });
    };  

    this.modf=function(jn){        
        return devolucionSrc.update(jn,function(){},function(e){
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
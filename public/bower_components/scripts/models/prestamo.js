'use strict';
angular.module('cotizacionApp')
.service('prestamo',function(prestamoSrc){
    
    this.crea=function(jn){
        return prestamoSrc.save(jn,function(){},function(e){
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
        return prestamoSrc.get(jn,function(d){},function(e){
            alert('Error: '+e.status+' '+e.data);
        });
    };  

    this.modf=function(jn){        
        return prestamoSrc.update(jn,function(){},function(e){
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
'use strict';
angular.module('cotizacionApp')
.service('servicio',function(servicioSrc){
    this.crea=function(jn){
        return servicioSrc.save(jn,function(){},function(e){
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
        return servicioSrc.get(jn,function(d){},function(e){
            alert('Error: '+e.status+' '+e.data);
        });
    };    

    this.modf=function(jn){
        return servicioSrc.update(jn,function(){},function(e){
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
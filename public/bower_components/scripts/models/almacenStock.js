'use strict';
angular.module('cotizacionApp')
.service('almacenStock',function(almacenStockSrc){
    this.crea=function(jn){
        return almacenStockSrc.save(jn,
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
    this.qry=function(jn){
        return almacenStockSrc.get(jn,
            function(d){},
            function(e){
                
                if(e.status=='422'){
                    var msg='';
                    angular.forEach(e.data,function(value, key){
                        msg=msg+','+value;
                    });
                        alert(msg);

                }else{
                    alert('Error: '+e.status+' '+e.data+' '+e.value);
                }

            });
    };
    this.del=function(jn){
        return almacenStockSrc.delete(jn,
            function(d){},
            function(e){alert('Error: '+e.status+' '+e.data)});
    };
    this.modf=function(jn){
        //return almacenStockSrc.update(jn);
        return almacenStockSrc.update(jn,
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
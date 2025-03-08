'use strict';
angular.module('cotizacionApp')
.service('programacion',function(programacionSrc){
    
    this.crea=function(jn){
        return programacionSrc.save(jn,
            function(){},
            function(e){
                if(e.status=='422'){
                    var msg='';
                    angular.forEach(e.data,function(value, key){
                        msg=msg+','+value;
                    });
                        alert(msg);
                        //return msg;

                }else{
                    alert('Error: '+e.status+' '+e.data);
                    //return 'Error: '+e.status+' '+e.data;
                }
            });
    };
    this.qry=function(jn){
        return programacionSrc.get(jn,
            function(d){},
            function(e){alert('Error: '+e.status+' '+e.data)});
    };    
    this.modf=function(jn){        
        return programacionSrc.update(jn,
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
'use strict';
angular.module('cotizacionApp')
.service('expendio',function(expendiosSrc){
	this.crea=function(jn){
        return expendiosSrc.save(jn,
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
        return expendiosSrc.get(jn,
            function(d){},
            function(e){alert('Error: '+e.status+' '+e.data)});
    };    
    this.modf=function(jn){        
        return expendiosSrc.update(jn,
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
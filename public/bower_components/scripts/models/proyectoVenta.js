'use strict';
angular.module('cotizacionApp')
.service('pVenta',function(proyectoVentaSrc){
	this.crea=function(jn){
        return proyectoVentaSrc.save(jn,
            function(){},
            function(e){
                if(e.status=='422'){
                    //$scope.save=false;
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
        return proyectoVentaSrc.get(jn,
            function(d){},
            function(e){alert('Error: '+e.status+' '+e.data)});
    };    
    this.modf=function(jn){
        return proyectoVentaSrc.update(jn,
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
'use strict';
angular.module('cotizacionApp')
.service('reporte',function(reportesSrc){
    this.crea=function(jn){
        return reportesSrc.save(jn,
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
        return reporteSrc.get(jn,
            function(d){},
            function(e){alert('Error: '+e.status+' '+e.data)});
    };    
    this.modf=function(jn){
        //return reportesSrc.update(jn);
        return reportesSrc.update(jn,
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
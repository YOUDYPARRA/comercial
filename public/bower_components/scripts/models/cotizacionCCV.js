'use strict';
angular.module('cotizacionApp')
.service('cotizacionCCV',function(cotizacionCCVSrc){
    this.crea=function(jn){
        return cotizacionCCVSrc.save(jn,
            function(d){                console.info(d);
                console.info(d.msg);
                //$scope.save=true;
                if(d.msg=="Success"){
                    console.warn("SAVE");
                }

            },
            function(e){
                if(e.status=='422'){
                    var msg='';
                    angular.forEach(e.data,function(value, key){
                        msg=msg+','+value;
                    });
                        alert(msg);

                }else{
                //$scope.save=false;
                    alert('Error: '+e.status+' '+e.data);
                }
            });
    };
    this.qry=function(jn){
        return cotizacionCCVSrc.get(jn,
            function(d){},
            function(e){alert('Error: '+e.status+' '+e.data)});
    };    
    this.modf=function(jn){//return cotizacionCCVSrc.update(jn);
        return cotizacionCCVSrc.update(jn,
            function(d){
                if(d.msg=="Success"){
                    console.warn("UPDATE");
                }},
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
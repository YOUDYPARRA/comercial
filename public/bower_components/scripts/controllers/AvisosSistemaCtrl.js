'use strict';
angular.module('cotizacionApp')
.controller('avisosSistemaCtrl',function ($filter,avisosSistemaSrc,$window,$scope,$location,$sce)
    {
    $scope.orgnizaciones=[
        {nombre:'SMH'},
        {nombre:'IMS'},
    ];

    $scope.avisos=[];
    $scope.hola="ola";
    $scope.id="";
        $scope.inicio=function(tipo_usuario,usuario){                                             console.log(tipo_usuario);
            /*
            *1.Cargar los avisos guardados con la clase AVISO por usuario actual
            * 2.Se actualizara cada N tiempo
            * 3. el Usuario podra eliminar sus avisos
            */
            $scope.tipo_usuario=tipo_usuario;
            $scope.usuario=usuario;
            //this.getAvisos($scope.id);
            $scope.carga();
        };

        $scope.getAvisos=function(){                                                                console.log($scope.id);
            $scope.avisos=[];
            var i=0;
            avisosSistemaSrc.get({clase:"AVISO",i:1,id_usuario:$scope.id},function(d){                      console.log(d);
                while(i<d.objetos.length){
                    $scope.html = $sce.trustAsHtml(d.objetos[i].recurso);
                    $scope.avisos.push({
                id:d.objetos[i].id,
                recurso:$scope.html,
                id_usuario:d.objetos[i].id_usuario,
                estado:d.objetos[i].estado,
                acceso:d.objetos[i].acceso,
                dato:d.objetos[i].dato,
                clase:d.objetos[i].clase,
                })
                i++;
                }
            },function(err){/*$scope.err(err)*/})
        };

        $scope.err=function(e){
                if(e.status=='422'){
                    var msg='';
                    angular.forEach(e.data,function(value, key){
                        msg=msg+','+value;
                    });
                        alert(msg);
                }else{
                    alert('Error: '+e.status+' '+e.data);
                }
        };

        $scope.limpia=function(){};$scope.busca=function(){}

        var cronometro;
        $scope.carga=function(){ console.log("AUTO");
        var contador_s =0;
        var contador_m =0;
        var s = 0;
        var m = 5;
        cronometro = setInterval(
            function(){
                if(contador_s==60){
                    contador_s=0;
                    contador_m++;
                    m = contador_m;     console.log(m)
                    $scope.avisos=[];
                    $scope.getAvisos();
                    if(contador_m==60){
                        contador_m=0;
                    }
                }
                s = contador_s;         //console.log(s);
                contador_s++;
            },1000);
     }



    })
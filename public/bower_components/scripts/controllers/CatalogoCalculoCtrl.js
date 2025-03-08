function CatalogoCalculoFnCtrl($timeout,$location,$scope,catalogosCalculoSrc,formula){
    var self=this;
$scope.catalogo_calculo= 
{
    'id':"",
    'modelo':"",
    'flete':"",
    'fraccion_arancelaria':"",
    'igi_ige':"",
    'dta':"",
    'h_agente_aduanal':"",
    'porcentaje_impuesto_importacion':"",
    'iva':"",
    'costo_hora':"",
    'tiempo_instalacion_total':"",
    'tiempo_viaje_instalacion':"",
    'costo_visita_proyectos':"",
    'costo_instalacion':"",
    'costo_parte':"",
    'gasto_importacion_partes':"",
    'mano_obra_garantia_hrs':"",
    'mano_obra_garantia_usd':"",
    'impuesto_importacion_refacciones':"",
    'costos_garantia':"",
    'total_costo_instalacion_garantia':"",
    'tiempo_preventivo':"",
    'preventivo_anual':"",
    'ingeniero_instalacion':"",
    'tiempo_instalacion':"",
    'usuario':""
};

    self.eliminar=function (i){
        
            catalogosCalculoSrc.delete({id:i},function(data){
               window.location = '/catalogos_calculo';
        },function(err){alert("ERROR EN CONEXION.");});
    }

    self.guardar=function (){
        //COMPROBAR Q NO EXISTA OTRO MODELO DADO DE ALTA PREVIAMENTE...
        //console.log('A GUARDAR...');
        catalogosCalculoSrc.save($scope.catalogo_calculo,function(data){
               //window.location = $location.absUrl();
        },function(err){alert("ERROR EN CONEXION.");});
    }

    self.consultar=function (){
        if($scope.catalogo_calculo!= undefined)
        {
            catalogosCalculoSrc.get({id:$scope.catalogo_calculo.id},function(data){
                $scope.catalogo_calculo=data.catalogo_precalculo;
            },function(err){alert("ERROR EN CONEXION.");});
        }
    }

    self.actualizar=function (){
        catalogosCalculoSrc.update($scope.catalogo_calculo,function(data){
            window.location = '/catalogos_calculo';
        },function(err){alert("ERROR EN CONEXION.");});
    }
    /**FIN MODELO DE DATOS.**/
    /**INICIA CONTROLADOR DE DATOS**/
self.vacio = function(){
    if($scope.catalogo_calculo.flete!="" || $scope.catalogo_calculo.fraccion_arancelaria!="" || $scope.catalogo_calculo.igi_ige!="" || $scope.catalogo_calculo.dta!="" || $scope.catalogo_calculo.h_agente_aduanal!="" || $scope.catalogo_calculo.iva!="" || $scope.catalogo_calculo.tiempo_preventivo!="" || $scope.catalogo_calculo.preventivo_anual!=""|| $scope.catalogo_calculo.ingeniero_instalacion!="" || $scope.catalogo_calculo.tiempo_instalacion!="" || $scope.catalogo_calculo.costo_hora!="" || $scope.catalogo_calculo.tiempo_instalacion_total!="" || $scope.catalogo_calculo.tiempo_viaje_instalacion!="" || $scope.catalogo_calculo.costo_visita_proyectos!="" || $scope.catalogo_calculo.impuesto_importacion_refacciones!="" || $scope.catalogo_calculo.costo_parte!="")
        return true;
    else
        return false;
}

    $scope.si=true;

$scope.calImpuestosImportacion = function(){
if($scope.catalogo_calculo.igi_ige != '' && $scope.catalogo_calculo.dta != ''){
    $scope.catalogo_calculo.porcentaje_impuesto_importacion=formula.getSuma2($scope.catalogo_calculo.igi_ige,$scope.catalogo_calculo.dta);
    }else{
        alert("¡ FAVOR DE VERIFICAR LOS VALORES !");
    }
}

$scope.calCostoInstalacion = function(){
if($scope.catalogo_calculo.tiempo_instalacion_total!='' || $scope.catalogo_calculo.tiempo_viaje_instalacion!='' || $scope.catalogo_calculo.costo_hora!='')
{
    $scope.catalogo_calculo.costo_instalacion=formula.getCostoInstalacion($scope.catalogo_calculo.tiempo_instalacion_total,$scope.catalogo_calculo.tiempo_viaje_instalacion, $scope.catalogo_calculo.costo_hora, $scope.catalogo_calculo.costo_visita_proyectos);
}else{
        alert("¡ FAVOR DE VERIFICAR LOS VALORES !");
}
}

$scope.calImportacionPartes = function(){
if($scope.catalogo_calculo.costo_parte !='' || $scope.catalogo_calculo.impuesto_importacion_refacciones!='')
{
    $scope.catalogo_calculo.gasto_importacion_partes=formula.getMulti2($scope.catalogo_calculo.costo_parte,$scope.catalogo_calculo.impuesto_importacion_refacciones);
    $scope.catalogo_calculo.costos_garantia=formula.getSuma3($scope.catalogo_calculo.costo_parte, $scope.catalogo_calculo.gasto_importacion_partes, $scope.catalogo_calculo.mano_obra_garantia_usd);
    $scope.catalogo_calculo.total_costo_instalacion_garantia=formula.getSuma2($scope.catalogo_calculo.costos_garantia,$scope.catalogo_calculo.costo_instalacion);
}else{
        alert("¡ FAVOR DE VERIFICAR LOS VALORES !");
}
}

$scope.calManoObraHrs = function(){
if($scope.catalogo_calculo.tiempo_preventivo !='' || $scope.catalogo_calculo.preventivo_anual !='')
{
    $scope.catalogo_calculo.mano_obra_garantia_hrs=formula.getMulti2($scope.catalogo_calculo.tiempo_preventivo,$scope.catalogo_calculo.preventivo_anual);
    //this.calManoObraUsd();
    //$scope.catalogo_calculo.mano_obra_garantia_usd=formula.getMulti2($scope.catalogo_calculo.costo_hora,$scope.catalogo_calculo.mano_obra_garantia_hrs);
}else{
        alert("¡ FAVOR DE VERIFICAR LOS VALORES !");
}
}

$scope.calManoObraUsd = function(){
if($scope.catalogo_calculo.costo_hora !='' || $scope.catalogo_calculo.mano_obra_garantia_hrs !='')
{
    $scope.catalogo_calculo.mano_obra_garantia_usd=formula.getMulti2($scope.catalogo_calculo.costo_hora,$scope.catalogo_calculo.mano_obra_garantia_hrs);
}else{
        alert("¡ FAVOR DE VERIFICAR LOS VALORES !");
}
}

/*$scope.borrarModelo = function(){
$scope.modelo="";
}*/

$timeout(function() {
if($scope.catalogo_calculo.vista===1)
{
    self.consultar();
}

}, 1000);
    
$scope.crearCatalogoCalculo=function()
{
    if($scope.modelo != undefined)
    {console.log($scope.modelo);
        catalogosCalculoSrc.get({modelo:$scope.modelo},function(data){ console.log(data.pagares.data.length);
            if(data.pagares.data.length==0 || data.pagares.data == undefined){
                if(confirm("¡ SE CREARA UN NUEVO REGISTRO DE CALCULO !"))
                {//alert("¡ SE CREARA UN NUEVO REGISTRO DE CALCULO !");
                    window.location='/catalogos_calculo/create?modelo='+$scope.modelo;
                    $scope.modelo="";
                }else{
                    alert("¡¡ Se cancelo la peticion !!");
                    $scope.modelo="";
                }                //console.log($scope.modelo);
            }else{
                $scope.catalogo_calculo=data.pagares.data; //console.log($scope.catalogo_calculo[0].modelo);
                if(confirm("YA EXISTE EL REGISTRO, ¿DESEA MODIFICARLO?"))
                {
                    window.location='/catalogos_calculo/'+$scope.catalogo_calculo[0].id+'/edit';
                }else{
                    alert("¡¡ Se cancelo la peticion !!");
                }
            }//    $scope.catalogo_calculo=data.catalogo_precalculo;
            },function(err){
                alert("ERROR EN CONEXION.");
        });
    }
}
$scope.guarda=function()
{//VALIDAR QUE NO EXISTA MODELO REPETIDO
    if(confirm('¿Todos los campos estan validados?'))
    {
        if(self.vacio()){
            alert("LLENO");
            self.guardar(); 
            alert("¡ Registro guardado exitosamente !");
            window.location='/catalogos_calculo';  
        }else{
            alert("FAVOR DE LLENAR TODOS LOS CAMPOS OBLIGATORIOS");
        }
    }
}

$scope.elimina=function(i)
{
    
    if(confirm("¿ELIMINAR CATALOGO?"))
        {
            self.eliminar(i);
        }
}
$scope.restaura=function(i)
{//VALIDAR QUE NO EXISTA OTRO MODELO GENERADO
    
    if(confirm("¿RESTAURAR?"))
        {
            self.eliminar(i);
        }
}
$scope.actualiza=function()
{
    self.actualizar();    
}
}
function concatObjeto() {
    var self=this;
    /**
     * recibe un array con dos items el segundo item debe ser un json o un arreglo 
     * @param {type} objetos
     * @returns {undefined}
     */
    self.relacionar=function(objetoBase,array_objetos){
        if(angular.isArray(objetoBase)&& angular.isArray(array_objetos)){
            var arr=[];
            var objNvo;
            var objeto="";
            angular.forEach(array_objetos,function(objeto,key){
//                objNvo=angular.extend(objetoBase, objeto);
                objNvo=objetoBase.concat(objeto);
                
                arr.push(objNvo);
            });

        }else
        {
            alert('ERROR DE DATOS');
        }
        return arr;
    }
    $scope.returnAlgo=function(){
        console.log('entre hacer algo');
        return 'equis';
    }
    /**
     * concatena varios objetos en un solo arreglo, haciendo q varios items sean tantos 
     * como la longitud del segundo parametro.
     * @param {type} json
     * @param {type} json
     * @returns {Array|concatObjeto.concatObjetos.arr}
     */
    self.concatenarObjeto= function(obj){
            var array=[];
            var base=obj.base;
            var objetos=obj.objetos;//array
            var etiquetas=obj.etiquetas;
                for (objeto in objetos){//recorrer array objetos
                    
                    var o={};
                    for (z in base){
//                        console.log(z);
                        o[z]=base[z];
                    }                    
                    for(item in objetos[objeto]){//recorrer por elementos dentro del objeto
//                        console.log(item);
                        if(obj.etiquetas!='' && obj.etiquetas!=undefined)
                        {
                            for (etq in etiquetas){
    //                            console.log(etq);
                                o[etq]=objetos[objeto][etq];
                            }   
                        }else{
                            o[item]=objetos[objeto][item];
                        }
                    }
                array.push(o);
                }
                return array;
    }
    
}
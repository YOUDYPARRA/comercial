
function unique(){
 return function(collection, primaryKey) { //no need for secondary key
      var output = [], 
          keys = [];
          var splitKeys = primaryKey.split('.'); //split by period
      angular.forEach(collection, function(item) {
            var key = {};
            angular.copy(item, key);
            for(var i=0; i<splitKeys.length; i++){
                key = key[splitKeys[i]];    //the beauty of loosely typed js :)
            }
            if(keys.indexOf(key) === -1) {
              keys.push(key);
              output.push(item);
            }
      });
      return output;
    };
}

 function Formulas() {
  this.getResta2=function(a,b) {
    return parseFloat(a) - parseFloat(b);
  }
  this.getSuma2=function(a,b) {
    return parseFloat(a) + parseFloat(b);
  }
  this.getSuma3=function(a,b,c) {
    return parseFloat(a) + parseFloat(b) + parseFloat(c);
  }
  this.getMN=function(a,b,c) {
    return (parseFloat(a) -( parseFloat(b) + parseFloat(c) ));
  }
  this.getMB=function(a,b,c) {
    return ( (parseFloat(a) + parseFloat(b)) - parseFloat(c) );
  }
  this.getPV=function(a,b,c,d,e,f,g)    
  {
    var x=((parseFloat(d) + parseFloat(e) + parseFloat(f) + parseFloat(g))/100); console.log(x);
    return ((parseFloat(a) + parseFloat(b) + parseFloat(c)) / (1-x ));
  }
  this.getSuma5=function(a,b,c,d,e)    {
    return (parseFloat(a) + parseFloat(b) + parseFloat(c) + parseFloat(d) + parseFloat(e) );//+ parseFloat(h) + parseFloat(i) + parseFloat(j) + parseFloat(k) + parseFloat(l);
  }
  this.getSuma12=function(a,b,c,d,e,f,g,h,i,j,k,l,m,n) {
    return (parseFloat(a) + parseFloat(b) + parseFloat(c) + parseFloat(d) + parseFloat(e) + parseFloat(f) + parseFloat(g) + parseFloat(h) + parseFloat(i) + parseFloat(j) + parseFloat(k) + parseFloat(l) + parseFloat(m) + parseFloat(n));
  }
  this.getMulti2=function(a,b) {
    return parseFloat(a) * parseFloat(b);
  }

  this.getPorcentaje=function(a,b) {
    if(b>0){
    return ((parseFloat(a) / parseFloat(b))*100);
  }else{
    return 0;
  }
  }

    this.getPorcentaje2=function(a,b) {
    return ((parseFloat(a) * parseFloat(b))/100);
  }

  this.getTotalPorcentaje=function(a,b,c,d,e) {
    var sum=(parseFloat(c) + parseFloat(d) + parseFloat(e));
    if(sum > 0){
    return (( (parseFloat(a) + parseFloat(b)) / sum ) * 100);
  }else{
    return 0;
  }
  }

  this.getCostoInstalacion=function(a,b,c,d){                                     console.log(a);
    return (((parseFloat(a) + parseFloat(b))*parseFloat(c))+parseFloat(d)) ;
  }
}

var app = angular.module("cotizacionApp", ['ngResource','ngMaterial','ngMessages','chart.js','ngSanitize'])

 .config(function($interpolateProvider){
      $interpolateProvider.startSymbol('<%');
      $interpolateProvider.endSymbol('%>');
})

.config(function($mdDateLocaleProvider){  
  $mdDateLocaleProvider.formatDate = function(date) {    //var date=new Date();
    var day = date.getDate();
    var monthIndex = date.getMonth()+1;
    var year = date.getFullYear();
    monthIndex = (monthIndex < 10) ? ("0" + monthIndex) : monthIndex;
    day = (day < 10) ? ("0" + day) : day;
    return day + '-' + (monthIndex) + '-' + year;
  };
})

.filter("maxLength", function(){
    return function(text,max){
        if(text != null){
            if(text.length > max){
                return text.substring(0,max) + "";
            }
        }
    }
})

 .directive('numbersOnly', function () {
    return {
        restrict: 'A',
        require: 'ngModel',
        link: function (scope, element, attrs, ctrl) {
            var validateNumber = function (inputValue) {
                var maxLength = 10;
                if (attrs.max) {
                    maxLength = attrs.max;
                }
                if (inputValue === undefined) {
                    return '';
                }
                var transformedInput = inputValue.replace(/[^0-9.:]/g, '');
                if (transformedInput !== inputValue) {
                    ctrl.$setViewValue(transformedInput);
                    ctrl.$render();
                }
                if (transformedInput.length > maxLength) {
                    transformedInput = transformedInput.substring(0, maxLength);
                    ctrl.$setViewValue(transformedInput);
                    ctrl.$render();
                }
                var isNotEmpty = (transformedInput.length === 0) ? true : false;
                ctrl.$setValidity('notEmpty', isNotEmpty);
                return transformedInput;
            };

            ctrl.$parsers.unshift(validateNumber);
            ctrl.$parsers.push(validateNumber);
            attrs.$observe('notEmpty', function () {
                validateNumber(ctrl.$viewValue);
            });
        }
    };
})

.filter('unique', unique)  
.service('formula',Formulas)
 .controller('recursoCtrl', RecursoFunCtrl)
 .controller('permisoCtrl', PermisoFunCtrl)
 .controller('marcaProveedorCtrl', MarcaProveedorFunCtrl)
 .controller('CondicionCotizacionCtrl', CondicionCotizacionFnCtrl)
 .controller('AprobCotCtrl', AprobCotFnCtrl)
 .controller('equipoCtr',EquipoFunCtr)
 .controller('ContratoCompraVentaCtrl',ContratoCompraVentaFnCtrl)
 .controller('PagareCtrl',PagareFnCtrl)
 .controller('catalogoCtrl',CatalogoCalculoFnCtrl)
 .controller('PrecalculoCtrl',PrecalculosFnCtrl)
 .controller('MenuCtrl',MenuFnCtrl)
 .controller('GrupoUsuarioCtrl',GrupoUsuarioFnCtrl)
 .controller('InsumoCtrl',InsumoFnCtrl)
 .controller('EnsableCtrl',EnsableCtrl)
 .controller('StockCtrl',StockFunCtrl)
 .controller('PaqueteCtrl',PaqueteFunCtrl)
// .controller('OrdenVentaCtrl',VentaFnCtrl)

 .controller('terceroCtrl',['$scope','tercerosSrc','direccionesSrc','contactosSrc',function($scope,tercerosSrc,direccionesSrc,contactosSrc){    
    $scope.tercerosLst =function(nacionales){                                                       console.log($scope.fiscal);console.log(nacionales);
      tercerosSrc.get({nombre_fiscal:"*"+$scope.fiscal+"*",group_name:nacionales},function(data){
        $scope.fiscales=data.terceros;                                                              console.log(data);
      },function(err){alert('ERROR EN SERVIDOR.');});
    }

    $scope.cambiaNombreFiscal=function(fiscal){               //console.log(fiscal);
        $scope.fiscal = fiscal.bpartner_name;
        $scope.numero_empleado = fiscal.value;
        $scope.org_name= fiscal.org_name;
        $scope.c_bpartner_id= fiscal.c_bpartner_id;
        $scope.id_fiscal=fiscal.c_bpartner_id;
        $scope.rfc_fiscal=fiscal.taxid;                       //console.log(fiscal.taxid);       // 
        $scope.c_bpartner_id=fiscal.c_bpartner_id;
        $scope.fiscales= null;
          contactosSrc.get({id_tercero:"*"+fiscal.c_bpartner_id+"*"},function(data){
            $scope.contactos=data.contactos;                                             console.log($scope.contactos);
            $scope.email=$scope.contactos[0].email;
          },function(err){alert('ERROR EN SERVIDOR.');});
    }

    $scope.mayusculas = function(){                         //alert("iniciales");
        var res = $scope.fiscal.split(" ");                 //console.log(res);
        var i=0;
        var ini="";
        var inicial="";
        while(i < res.length){
          ini=$scope.MayPrimera(res[i]);                    //console.log(ini);
          inicial=inicial+ini;
          i++;
        }
        $scope.iniciales=inicial;                           //console.log($scope.iniciales);        //$scope.iniciales=ini.toString(""); console.log($scope.iniciales);
    }

    $scope.MayPrimera = function(string){                   //return string.charAt(0).toUpperCase();// + string.slice(1);
        return string.substring(0,1).toUpperCase();         // + string.slice(1);
    }
}])
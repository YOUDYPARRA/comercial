'use strict';
angular.module('cotizacionApp')
.controller('convenioContratoCtrl',function (convenio,$timeout,tipoContrato,procesosSrc,plantilla,expendio,contrato,$scope,$location)
    {
      
      $scope.filtro={
        folio_contrato:'',
        equipo_contrato:[],
        equipos:[],
        plantillas:[],
      };
      $scope.filtro_expendio={};
      $scope.filtro_plan='';      
      $scope.foco='';
      $scope.objeto={
        folio_contrato:[],
        nombre_cliente:'',
        calle:'',
        colonia:'',
        c_p:'',
        ciudad:'',
        estado:'',
        pais:'',
        numero:'',
        numero_exterior:'',
        nombre_fiscal:'',
        calle_fiscal:'',
        colonia_fiscal:'',
        c_p_fiscal:'',
        ciudad_fiscal:'',
        estado_fiscal:'',
        pais_fiscal:'',
        numero_fiscal:'',
        rfc:'',
        c_bpartner_id:'',
        c_bpartner_location:'',
      };
      $scope.tabla=0;
      $scope.tablados=0;
      $scope.folio_contrato={};
      $scope.lmpContrato=function(){
        $scope.filtro.equipo_contrato=[];
      }
      $scope.rslEq=function(r){
        console.log('colocar elquipo');
        angular.forEach(r.objetos.r_conts_eqps, function(v, k) {
          //console.log(k + ': ' + v.modelo+'  '+r.objetos.folio_contrato);
          var vigencia='';
          if(v.vigencia=='0'){
            vigencia='NO';
          }else{
            vigencia='SI';
          }
          var e={
            id:v.id,
            marca:v.marca,
            equipo:v.equipo,
            numero_serie:v.numero_serie,
            modelo:v.modelo,
            vigencia:vigencia,
            folio_contrato:r.objetos.folio_contrato,
            nombre_cliente:r.objetos.nombre_cliente,
            calle:r.objetos.calle,
            colonia:r.objetos.colonia,
            c_p:r.objetos.c_p,
            ciudad:r.objetos.ciudad,
            estado:r.objetos.estado,
            pais:r.objetos.pais,
            numero:r.objetos.numero,
            numero_exterior:r.objetos.numero_exterior,
            nombre_fiscal:r.objetos.nombre_fiscal,
            calle_fiscal:r.objetos.calle_fiscal,
            colonia_fiscal:r.objetos.colonia_fiscal,
            c_p_fiscal:r.objetos.c_p_fiscal,
            ciudad_fiscal:r.objetos.ciudad_fiscal,
            estado_fiscal:r.objetos.estado_fiscal,
            pais_fiscal:r.objetos.pais_fiscal,
            numero_fiscal:r.objetos.numero_fiscal,
            rfc:r.objetos.rfc,
            c_bpartner_id:r.objetos.c_bpartner_id,
            c_bpartner_location:r.objetos.c_bpartner_location,
            fecha_atencion:v.fecha_inicio+'/'+v.fecha_fin
          };
          
          $scope.filtro.equipo_contrato.push(e);
        });
      }
      $scope.bscContrato=function(){
          var r=contrato.qry({v:3,folio_contrato:$scope.filtro.folio_contrato});
          r.$promise.then(function(r){
            var con='';
            angular.forEach(r.objetos, function(value, key) {
              if(con==''){
                  con =r.objetos.folio_contrato;
                  $scope.rslEq(r);
              }else{
                if(con==r.objetos.folio_contrato){                  
                }else{
                  con =r.objetos.folio_contrato;
                  $scope.rslEq(r);
                }
              }
            });
          });
      }
      $scope.slcContrato=function(x){
        //console.log(x);
        $scope.objeto.nombre_cliente=x.nombre_cliente;
        $scope.objeto.calle=x.calle;
        $scope.objeto.colonia=x.colonia;
        $scope.objeto.c_p=x.c_p;
        $scope.objeto.ciudad=x.ciudad;
        $scope.objeto.estado=x.estado;
        $scope.objeto.pais=x.pais;
        $scope.objeto.numero=x.numero;
        $scope.objeto.numero_exterior=x.numero_exterior;
        $scope.objeto.nombre_fiscal=x.nombre_fiscal;
        $scope.objeto.calle_fiscal=x.calle_fiscal;
        $scope.objeto.colonia_fiscal=x.colonia_fiscal;
        $scope.objeto.c_p_fiscal=x.c_p_fiscal;
        $scope.objeto.ciudad_fiscal=x.ciudad_fiscal;
        $scope.objeto.estado_fiscal=x.estado_fiscal;
        $scope.objeto.pais_fiscal=x.pais_fiscal;
        $scope.objeto.numero_fiscal=x.numero_fiscal;
        $scope.objeto.rfc=x.rfc;
        $scope.objeto.c_bpartner_id=x.c_bpartner_id;
        $scope.objeto.c_bpartner_location=x.c_bpartner_location;

        $scope.exist=filContrato(x.folio_contrato);
          //console.log('FILTRAR CONTRATOS'+$scope.exist);
        if($scope.exist>0){
          alert('CONTRATO YA FUE SELECCIONADO');
        }else{
          var eq=x.folio_contrato.toString();
          //console.log('agregar arreglo'+x.folio_contrato);
          $scope.objeto.folio_contrato.push(eq);
        }
      }
      
      var filContrato=function(contratoSeleccionado){
        var encontrado=0;
        if($scope.objeto.folio_contrato.length>0){
        //console.log($scope.objeto.folio_contrato.length);
          angular.forEach($scope.objeto.folio_contrato, function(value) {
            if(value==contratoSeleccionado){
              encontrado=encontrado+1;
            }
          });          
        }
          return encontrado;
      }
      $scope.salContrato=function(quitar_contrato){
        $scope.objeto.folio_contrato.splice(quitar_contrato,1);
      }
      $scope.salEqpContr=function(quitar_eqp_contrato){
        $scope.filtro.equipo_contrato.splice(quitar_eqp_contrato,1);
      }
      $scope.cancEqpContr=function(quitar_eqp_contrato){
        //console.log(quitar_eqp_contrato);
        if(confirm('SE VA ELIMINAR LA VIGENCIA DE ESTE EQUIPO EN EL CONTRATO: '+quitar_eqp_contrato.folio_contrato+' SERIE: '+quitar_eqp_contrato.numero_serie)){
          contrato.modfVigencia({id:quitar_eqp_contrato.id});
        }
      }      
      $scope.bscExpendido=function(){
        var r=expendio.qry($scope.filtro.expendido);
        r.$promise.then(function(r){
          $scope.filtro.equipos=r.objeto;
        });

      }
      $scope.slcEqpExp=function(eqpExp){        
        $scope.filtro_expendio=eqpExp;
      }
      $scope.bscPlan=function(){
        var r=plantilla.qry({nombre:$scope.filtro.nombre});
        r.$promise.then(function(r){
          $scope.filtro.plantillas=r.objeto;
        });
      }
      $scope.slcPlan=function(plan){
        $scope.filtro_plan=plan;
        if($scope.filtro_expendio.id.length>0){
          procesa($scope.filtro_plan);         
        }else{
          alert('SELECCIONE UN MODELO');
        }
      }
      $scope.setFoco=function(f){
        $scope.foco=f;
      }
      var procesa=function(x){
        console.log($scope.filtro_expendio.id);
        if($scope.objeto.rfc.length>0){
            //enviar a server procesar campo texto, para despues mostrarla en campo de texto
            procesosSrc.get({i:$scope.filtro_expendio.id,id:x.id},function(r){
                if($scope.foco=='td' ){
                    if( (x.plantilla[0]=='_') && (x.plantilla[1]=='_') ){
                        if($scope.tablados!=0){
                            $scope.tablados.push(r.txt[1]);
                        } else{
                            $scope.tablados=r.txt;
                        }
                    }else{
                        alert('EL ELEMENTO DEBE SER TABLA');
                    }

                }else if($scope.foco=='tp' ){
                    console.log('el foco esta en la tabla primaria');
                    if( (x.plantilla[0]=='_') && (x.plantilla[1]=='_') ){
                        //console.log('Tabla');
                        $scope.mapa=$scope.mapye(r.txt[0]);
                    }
                    if($scope.tabla!=0){
                    $scope.tabla.push(r.txt[1]);

                    } else{
                        $scope.tabla=r.txt;
                    }
                }else if($scope.foco=='f'){
                    $scope.objeto.foot= $scope.objeto.foot  +'\n'+ r.txt;
                }else if( $scope.foco=='h' ){
                    $scope.objeto.head= $scope.objeto.head  +'\n'+ r.txt;
                }else if($scope.foco=='ff'){
                    $scope.objeto.fin= $scope.objeto.fin  +'\n'+ r.txt;
                }
            },function(er){alert('ERROR EN SERVIDOR');});
        }else{
            alert('DEBE SELECCIONAR UN CLIENTE DESDE EL CONTRATO');
        }
      }
      $scope.mapye=function(arr){
        var map = [];
        angular.forEach(arr, function(value, key) {
          this.push(key );
        }, map);
        return map;

        }
        $scope.equis=function(i){
            $scope.fil=i;
        }
        $scope.ye=function(i,x){
            $scope.col=i;            
            var y=$scope.mapa[i];
            $scope.activar=true;
            console.log(y+'=>'+$scope.fil);
            if($scope.foco=='td' ){
              var yy=y-1

                $scope.tablados[$scope.fil][yy]=x;
            }else{
                $scope.tabla[$scope.fil][y]=x;
            }
        }
        $scope.cmpActiv=function(){
            $scope.activar=false;
        };
        $scope.guardar=function(){
          //console.log("A GUARDAR");
            $scope.objeto.json=$scope.tabla;
            $scope.objeto.tablados=$scope.tablados;
            if($scope.id>0){ console.log($scope.id+"Update");
                $scope.rsl=convenio.crea($scope.objeto);
                $scope.save=true;
                //console.info($scope.rsl);
               // $scope.redirect();
            }else{
                console.log($scope.id+"CREATE");
                $scope.rsl=convenio.crea($scope.objeto); 
                if($scope.rsl){
                $scope.save=true;               
                }
               
            }
        };
        $timeout(function() {
          $scope.tipos_contrato=tipoContrato.qry();
        });
        $scope.elmTbl=function(x){
          $scope.tabla.splice(x,1);
        }
        $scope.elmTblD=function(x){
            $scope.tablados.splice(x,1);
        }

    })
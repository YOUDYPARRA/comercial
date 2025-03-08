'use strict';
angular.module('cotizacionApp')
.controller('pagarePdfCtrl',function ($scope,$controller,$filter,cotizacionPaqueteInsumoSrc,pagareSrc){
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 var pagarePdf = {
       pageSize: 'letter',
pageOrientation: 'portrait',                  //landscape
    pageMargins: [ 40, 180, 40, 40 ],          //  // [left, top, right, bottom] or [horizontal, vertical] or just a number for equal margins
         header:{
                  margin: [40,70],//[10,10,10,60],       //margin: [72,10],  
                   table: { widths: [130, 130, 130, 130],
                    body: [
                    [{text:'PAGARE \n\n',colSpan: 4,alignment: 'center',bold:true,color:'black',fontSize:16},{}],
                    [{text:'Valor total del pagaré: ',fontSize: 8,alignment:'left'},{text:'$ 000,000.00',fontSize: 8, alignment:'left',bold:true},       {text:'',fontSize: 11,alignment:'right'}, {text:'',fontSize: 11, alignment:'left'}],
                    [{text:'Fecha de suscripción: ',fontSize: 8,alignment:'left'}, {text:'28 de abril de 2016',fontSize: 8, alignment:'left',bold:true},{text:'',fontSize: 11,alignment:'right'}, {text:'',fontSize: 11, alignment:'left'}],
                    [{text:'Lugar de suscripción: ',fontSize: 8,alignment:'left'}, {text:'Ciudad de México',fontSize: 8, alignment:'left',bold:true},   {text:'',fontSize: 11,alignment:'right'}, {text:'',fontSize: 11, alignment:'left'}],
                   ]
                  },
                   layout: 'noBorders'
                 },
        content:[ 
                 { text: [
                          {text:'Por este PAGARE y por valor recibido, ',fontSize:8,alignment:'justify'},
                         ]
                  },
                 {style: 'tablee',
                  margin:[100,30],
                  table: {
                          widths: [170, 170], //PARA EL ESPACIO ENTRE CELDAS
                          body: [   
                                    [ 
                                      {text: 'Mensualidad',bold:true,fontSize:10, alignment:'center'}, 
                                      {text: 'Fecha de Pago',bold:true,fontSize:10,alignment:'center'},
                                    ]
                                  ]
                        },
                        layout: 'lightHorizontalLines'
                  },
                  { text: [
                            {text:'La falta del pago oportuno ', fontSize:8,alignment:'justify'},
                          ] 
                  },
                  { margin: [0,30],
                    text: [
                            {text:'Para cualquier controversia ', fontSize:8,alignment:'justify'},
                          ] 
                  },
                  {
            margin:[0,30],
            table: { widths: [250,250],
                    body: [
                    [{text:'____________________________________________',fontSize:8,bold:true,alignment:'left'},{text:'____________________________________________',bold:true,fontSize:8,alignment:'left'}],
                    [{text:'_________________________________________________________________',fontSize:8,bold:true,alignment:'left',decoration:'underline'},{text:'_________________________________________________________________',bold:true,fontSize:8,alignment:'left',decoration:'underline' }],
                    [{text:'SUSCRIPTOR',fontSize:8,bold:true,alignment:'left'},{text:'EL AVAL',bold:true,fontSize:8,alignment:'left' }],
                    [{text:'NOMBRE FISCAL',fontSize:8,bold:true,alignment:'left'},{text:''}],
                    [{text:'DIRECCION FISCAL ',fontSize:8,bold:true,alignment:'left'},{text:''}],
                    [{text:'COLONIA FISCAL',fontSize:8,bold:true,alignment:'left'},{text:''}],
                    [{text:'CIUDAD FISCAL',fontSize:8,bold:true,alignment:'left'},{text:''}],// [{text:'pagina',colSpan: 2,alignment: 'center',bold:'true',color:'gray'},{}],
                   ]
                  },
                  layout: 'noBorders'
                }
                ],
         footer: {},
         styles: {
                    tablee: {
                    fontSize:8,
                    color:'black',
                    alignment:'center'
                  }
                },
           info: {
                title: 'Pagare',
               author: 'EMS, JYPA',
              subject: 'Pagare',
             keywords: 'N/A',
                }
  };
  $scope.openPagarePdf = function(objeto) {  										console.warn(objeto.id_cotizacion);
  	pagareSrc.get({id_cotizacion:objeto.id_cotizacion},function(data){													console.log(data);
  		if(data.pagares.data.length==0){
  			alert("!! NO SE HA GENERADO EL PAGARE FAVOR DE VERIFICAR¡¡")
  		}else{
  		$scope.pagare=data.pagares.data[0];
  		cotizacionPaqueteInsumoSrc.get({id:objeto.id_cotizacion},function(data){                                        console.log(data.cotizacion);
  		$scope.cotizacion=data.cotizacion;
                                                                                   console.log($scope.pagare);
    if($scope.pagare.mensualidad<=12){
      var margin0=[40,70];
      var margin1=[100,30];
      var margin2=[0,30];
      var f=8;
    } else if($scope.pagare.mensualidad>12 && $scope.pagare.mensualidad<=24){
      var margin0=[40,60];
      var margin1=[100,15];
      var margin2=[0,15];
      var f=5;
    } else if($scope.pagare.mensualidad>24 ){
      var margin0=[40,70];
      var margin1=[100,30];
      var margin2=[0,30];
      var f=8;
    }         
                                                                                 	//console.log(pagarePdf.content[1].table.body[0]);
pagarePdf.header.margin=margin0;
pagarePdf.content[1].margin=margin1;
pagarePdf.content[3].margin=margin2;
pagarePdf.content[4].margin=margin2;
//$scope.pagare.financiamiento=Math.round($scope.pagare.financiamiento);                                                              //console.log(pagarePdf.header.table.body[1][1].text);
//pagarePdf.header.table.body[1][1].text="$ "+$filter('number')($scope.pagare.financiamiento, 2);
var meses = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
var mes = $scope.pagare.fecha_suscripcion.split("-");  console.log($scope.pagare.fecha_suscripcion);
var m=parseInt(mes[1])-1;console.info(m);
$scope.pagare.fecha_suscripcion=mes[0]+' de '+meses[m]+' de '+mes[2];
pagarePdf.header.table.body[1][1].text='$ '+$filter('number')(($scope.pagare.financiamiento), 2)+' '+$scope.cotizacion.tipo_moneda;
pagarePdf.header.table.body[2][1].text=$scope.pagare.fecha_suscripcion;
pagarePdf.header.table.body[3][1].text=$scope.pagare.lugar_suscripcion;
                                                                                         // console.log($scope.pagarePdf.content[0].text[0].text);
pagarePdf.content[0].text[0].text=$scope.pagare.obligacion_suscriptor;
var i=0,j=1;                                                                             //console.log(pagare.mensualidad);
var fecha_pago=$scope.pagare.fecha_pago.split(",");                                      //     console.log(fecha_pago);
if($scope.pagare.fecha_pago.length<=1){
  pagarePdf.content[1].table.body[1]=[  [{text:j+" de "+ $scope.pagare.mensualidad,alignment:'center',fontSize:f}],[{text:fecha_pago,alignment:'center',fontSize:f}]];
}else{
      while( i < ($scope.pagare.mensualidad)){
        pagarePdf.content[1].table.body[j]=[  [{text:j+" de "+ $scope.pagare.mensualidad,alignment:'center',fontSize:f}],[{text:''+fecha_pago[i],alignment:'center',fontSize:f}]]; //console.log(i);
        i++;
        j++;
      }
    }

pagarePdf.content[2].text[0].text=$scope.pagare.falta_pago;
pagarePdf.content[3].text[0].text=$scope.pagare.controversia_suscripcion;
                                                                                          //console.log(pagarePdf.footer.table.body[0][1].text);
pagarePdf.content[4].table.body[0][0].text='';
pagarePdf.content[4].table.body[0][1].text=$scope.pagare.aval;
pagarePdf.content[4].table.body[3][0].text=$scope.cotizacion.nombre_fiscal+' Y/O '+$scope.cotizacion.representante_legal;
pagarePdf.content[4].table.body[4][0].text=$scope.cotizacion.calle_fiscal;
pagarePdf.content[4].table.body[5][0].text=$scope.cotizacion.colonia_fiscal;
pagarePdf.content[4].table.body[6][0].text=$scope.cotizacion.codigo_postal_fiscal+" "+$scope.cotizacion.ciudad_fiscal+", "+$scope.cotizacion.estado_fiscal;
pdfMake.createPdf(pagarePdf).open();
		});
  	}
	});
}

})
'use strict';
angular.module('cotizacionApp')
.controller('cotizacionContratoPdfCtrl',function ($scope,$controller,cotizacionContrato){

    	angular.extend(this,$controller('NumeroAletraCtrl',{$scope:$scope}));

    	  var cotizacion_Contrato = {
    // background: {image:'sinAprobacion'},//,width:820},
     //background: {},//,width:820},
       pageSize: 'letter',
pageOrientation: 'portrait',                  
    pageMargins: [ 40, 135, 40, 100 ],        
         header:{},
        content:[],
          footer:{},
         images:{
          smh:'data:image/jpeg;base64,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',
         },
         styles: {},
           info: {
                title: 'Cotizacion contratos',
               author: 'EMS, JYPA',
              subject: 'Cotizacion Contratos',
             keywords: 'N/A',
                }
  };
  var rutina_alpha={pageBreak: 'before',
  	margin:[0,0],
    table: {
        widths: [25,20,100,100,100,120], 
        body: [   
               [{text:'ANEXO N',fontSize:10,bold:true,alignment:'center',colSpan:6},{},{},{},{},{}],
               [{text:'RUTINAS DE MANTENIMIENTO',fontSize:10,bold:true,alignment:'center',colSpan:6},{},{},{},{},{}],
               [{text:'EQUIPO:',fontSize:9,bold:true,alignment:'left',colSpan:2},{},{text:'ULTRASONIDO',fontSize:9,colSpan:2},{},{text:'No. CONTRATO:',fontSize:9,bold:true},{text:''}],
               [{text:'MARCA:',fontSize:9,bold:true,alignment:'left',colSpan:2},{},{text:'ALOKA',fontSize:9,colSpan:2},{},{text:'',fontSize:9},{text:''}],
               [{text:'MODELO:',fontSize:9,bold:true,alignment:'left',colSpan:2},{},{text:'ALPHA-10',fontSize:10,colSpan:2},{},{text:'',fontSize:9},{text:''}],
               [{text:'NO. SERIE:',fontSize:9,bold:true,alignment:'left',colSpan:2},{},{text:'',fontSize:9,colSpan:2},{},{text:'',fontSize:10},{text:''}],
               //[{text:'UBICACION:',fontSize:10,bold:true,alignment:'center',colSpan:2},{},{text:'',colSpan:2},{},{text:'',fontSize:10},{text:''}],
               [{text:'ACTIVIDADES A REALIZAR DE MANTENIMIENTO PREVENTIVO',fontSize:10,bold:true,alignment:'center',colSpan:6},{},{},{},{},{}],
               [{text:'SI',fontSize:8,bold:true,alignment:'center'},{text:'NO',fontSize:8,bold:true,alignment:'center'},{text:'',colSpan:4},{},{},{}],
               [{text:'',fontSize:8},{text:'',fontSize:8},{text:'1.-	LIMPIEZA GENERAL INTERNA Y EXTERNA',fontSize:7,colSpan:4},{},{},{}],
               [{text:'',fontSize:8},{text:'',fontSize:8},{text:'2.-	REVISION, LIMPIEZA Y AJUSTE DE CABLE DE LINEA, O EN SU CASO REEMPLAZAR',fontSize:7,colSpan:4},{},{},{}],
               [{text:'',fontSize:8},{text:'',fontSize:8},{text:'3.-	REVISION, LIMPIEZA Y AJUSTE DE TRANSDUCTORES',fontSize:7,colSpan:4},{},{},{}],
               [{text:'',fontSize:8},{text:'',fontSize:8},{text:'4.-	REVISION, LIMPIEZA Y AJUSTE DE PUERTOS PARA CONEXION DE TRANSDUCTORES, O EN SU CASO REEMPLAZAR',fontSize:7,colSpan:4},{},{},{}],
               [{text:'',fontSize:8},{text:'',fontSize:8},{text:'5.-	REVISION, LIMPIEZA Y AJUSTE DE TERMINALES DE CABLES DE INTERCONEXION CON SISTEMAS DE IMPRESION',fontSize:7,colSpan:4},{},{},{}],
               [{text:'',fontSize:8},{text:'',fontSize:8},{text:'6.-	REVISION, LIMPIEZA Y CALIBRACION DE TRANSDUCTORES',fontSize:7,colSpan:4},{},{},{}],
               [{text:'',fontSize:8},{text:'',fontSize:8},{text:'7.-	REVISION Y AJUSTE DE PROFUNDIDAD DE RESOLUCION DE IMAGEN',fontSize:7,colSpan:4},{},{},{}],
               [{text:'',fontSize:8},{text:'',fontSize:8},{text:'8.-	REVISION Y CALIBRACION DE TONOS GRISES Y TONOS DE COLOR(EN CASO CON EQUIPOS DE COLOR)',fontSize:7,colSpan:4},{},{},{}],
               [{text:'',fontSize:8},{text:'',fontSize:8},{text:'9.-	REVISION Y VERIFICACION DE PROGRAMA DE ORGANOS',fontSize:7,colSpan:4},{},{},{}],
               [{text:'',fontSize:8},{text:'',fontSize:8},{text:'10.-	REVISION Y VERIFICACION DE SOBRECALENTAMIENTO DE ELEMENTOS ELECTRONICOS EN TARJETAS',fontSize:7,colSpan:4},{},{},{}],
               [{text:'',fontSize:8},{text:'',fontSize:8},{text:'11.-	REVISION Y VERIFICACION DE SISTEMAS DE MEDICIONES Y REPORTES OBSTETRICO, GINECOLOGO Y VASCULAR',fontSize:7,colSpan:4},{},{},{}],
               [{text:'',fontSize:8},{text:'',fontSize:8},{text:'12.-	VERIFICACION Y CALIBRACION DE AJUSTE DE LA CURVA DE GANANCIA MEDIANTE LOS CONTROLES DESLIZABLES',fontSize:7,colSpan:4},{},{},{}],
               [{text:'',fontSize:8},{text:'',fontSize:8},{text:'13.-	REVISION, VERIFICACION Y CALIBRACION DE MODOS BIDIMENCIONAL, MODOS DE OPERACION B, B/M, DOPPLER CONTINUO Y PAUSADO',fontSize:7,colSpan:4},{},{},{}],
               [{text:'',fontSize:8},{text:'',fontSize:8},{text:'14.-	REVISION Y VERIFICACION DE SISTEMA DE REGISTRO DE MEDICION(JOYSTICK, TRACK-BALL O MOUSE)',fontSize:7,colSpan:4},{},{},{}],
               [{text:'',fontSize:8},{text:'',fontSize:8},{text:'15.-	REVISION, LIMPIEZA Y CALIBRACION DE PANTALLA TACTIL',fontSize:7,colSpan:4},{},{},{}],
               [{text:'',fontSize:8},{text:'',fontSize:8},{text:'16.-	REVISION Y VERIFICACION DE SISTEMA DE REGISTRO DE PROCESAMIENTO DE VIDEO',fontSize:7,colSpan:4},{},{},{}],
               [{text:'',fontSize:8},{text:'',fontSize:8},{text:'17.-	REVISION Y VERIFICACION DE SISTEMA DE REGISTRO DE GRAFICOS',fontSize:7,colSpan:4},{},{},{}],
               [{text:'',fontSize:8},{text:'',fontSize:8},{text:'18.-	REVISION Y VERIFICACION DE SISTEMA DE REGISTRO DE PROCESOS NUMERICOS',fontSize:7,colSpan:4},{},{},{}],
               [{text:'',fontSize:8},{text:'',fontSize:8},{text:'19.-	REVISION Y VERIFICACION DE SISTEMA DE CONTROL DE PARAMETROS',fontSize:7,colSpan:4},{},{},{}],
               [{text:'',fontSize:8},{text:'',fontSize:8},{text:'20.-	REVISION, LIMPIEZA, LUBRICACION Y AJUSTE DE RUEDAS Y FRENOS',fontSize:7,colSpan:4},{},{},{}],
               [{text:'',fontSize:8},{text:'',fontSize:8},{text:'21.-	LIMPIEZA EXTERNA E INTERNA DE TODO EL EQUIPO (INCLUYENDO FILTROS DE AIRE)',fontSize:7,colSpan:4},{},{},{}],
               [{text:'',fontSize:8},{text:'',fontSize:8},{text:'22.-	EN CASO DE DAÑO FISICO EN TAPAS Y/O CUBIERTAS, TECLADO, TRACK-BALL, ETC. REALIZAR SU REEMPLAZO',fontSize:7,colSpan:4},{},{},{}],
               [{text:'',fontSize:8},{text:'',fontSize:8},{text:'23.-	VERIFICAR QUE LA CALIDAD DE LA IMAGEN SEA IGUAL TANTO EN MONITOR COMO EN IMAGEN IMPRESA',fontSize:7,colSpan:4},{},{},{}],
               [{text:'',fontSize:8},{text:'',fontSize:8},{text:'24.-	DESARROLLAR LAS PRUEBAS DE ACEPTACION QUE RECOMIENDA EL FABRICANTE CON EL PERSONAL PRESENTE',fontSize:7,colSpan:4},{},{},{}],
               [{text:'',fontSize:8},{text:'',fontSize:8},{text:'25.-	REALIZAR PRUEBA DE SEGURIDAD ELECTRICA INCLUYENDO PRUEBA ESPECIFICA A TRANSDUCTORES',fontSize:7,colSpan:4},{},{},{}],
               [{text:'',fontSize:8},{text:'',fontSize:8},{text:'26.-	EL REEMPLAZO DE PARTES ENUNCIADAS SON A CARGO DEL PRESTADOR, SIN COSTO PARA EL INSTITUTO',fontSize:7,colSpan:4},{},{},{}],
               [{text:'',fontSize:8},{text:'',fontSize:8},{text:'27.-	EN SU CASO, ACTUALIZACIONES DE SOFTWARE MANDATORIO DE FABRICA',fontSize:7,colSpan:4},{},{},{}],
               [{text:'',fontSize:8},{text:'',fontSize:8},{text:'28.-	RECOMENDACIONES AL PERSONAL PARA SU BUEN CUIDADO Y USO',fontSize:7,colSpan:4},{},{},{}],
               [{text:'',fontSize:8},{text:'',fontSize:8},{text:'29.-	EL EQUIPO QUEDA FUNCIONANDO EN OPTIMAS CONDICIONES',fontSize:7,colSpan:4},{},{},{}],
               [{text:'OBSERVACIONES',fontSize:8,colSpan:6},{},{},{},{},{}],
               [{text:'.',fontSize:8,colSpan:6},{},{},{},{},{}],
               
              ]
           },
            //layout: 'noBorders'
     };

  var rutina_dimensions={pageBreak: 'before',
  	margin:[0,0],
    table: {
        widths: [25,20,100,100,100,120], 
        body: [   
               [{text:'ANEXO N',fontSize:10,bold:true,alignment:'center',colSpan:6},{},{},{},{},{}],
               [{text:'RUTINAS DE MANTENIMIENTO',fontSize:10,bold:true,alignment:'center',colSpan:6},{},{},{},{},{}],
               [{text:'EQUIPO:',fontSize:10,bold:true,alignment:'left',colSpan:2},{},{text:'MASTOGRAFO DIGITAL',fontSize:10,colSpan:2},{},{text:'No. CONTRATO:',fontSize:10,bold:true},{text:''}],
               [{text:'MARCA:',fontSize:10,bold:true,alignment:'left',colSpan:2},{},{text:'LORAD-HOLOGIC',fontSize:10,colSpan:2},{},{text:'',fontSize:10},{text:''}],
               [{text:'MODELO:',fontSize:10,bold:true,alignment:'left',colSpan:2},{},{text:'DIMENSIONS',fontSize:10,colSpan:2},{},{text:'',fontSize:10},{text:''}],
               [{text:'NO. SERIE:',fontSize:10,bold:true,alignment:'left',colSpan:2},{},{text:'',fontSize:10,colSpan:2},{},{text:'',fontSize:10},{text:''}],
               //[{text:'UBICACION:',fontSize:10,bold:true,alignment:'center',colSpan:2},{},{text:'',colSpan:2},{},{text:'',fontSize:10},{text:''}],
               [{text:'ACTIVIDADES A REALIZAR DE MANTENIMIENTO PREVENTIVO',fontSize:10,bold:true,alignment:'center',colSpan:6},{},{},{},{},{}],
               [{text:'SI',fontSize:10,bold:true,alignment:'center'},{text:'NO',fontSize:10,bold:true,alignment:'center'},{text:'',colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'1.-	REVISION DE FUNCIONAMIENTO GENERAL DEL EQUIPO',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'2.-	SOPLETEO DE TARJETAS Y MODULOS',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'3.-	INSPECCION Y LUBRICACION DEL MECANISMO DE ROTACION DEL BRAZO Y DE TOMOSINTESIS',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'4.-	INSPECCION Y LUBRICACION DEL TORNILLO SINFIN DEL MOVIMIENTO VERTICAL',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'5.-	OBTENCION DEL LOG FILE Y BACK UP',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'6.-	REVISION DEL SISTEMA DE COMPRESION',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'7.-	REVISION DE VOLTAJES DE ENTRADA',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'8.-	REVISION Y CALIBRACION DE FILAMENTOS',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'9.-	REVISION DEL CAMPO DE LUZ DEL COLIMADOR',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'10.-	REVISION DEL CAMPO DE RAYOS X',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'11.-	REVISION Y CALIBRACION DE LA CORRIENTE DE TUBO',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'12.-	REVISION Y CALIBRACION DE VOLTAJE DE TUBO',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'13.-	EVALUACION DE ARTEFACTOS EN DETECTOR',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'14.-	REVISION DE CALIDAD DE IMAGEN EN DETECTOR',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'15.-	REVISION DE FUNCIONAMIENTO DE PARTES MECANICAS',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'16.-	SOPLETEO DE COLIMADOR',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'17.-	REVISION DE FUNCIONAMIENTO DE CONTROLES',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'18.-	REVISION DE FUNCIONAMIENTO DE UPS DE LA CONSOLA',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'19.-	VERIFICAR EL CORRECTO FUNCIONAMIENTO DE LA BATERIA DEL UPS DE LA ESTACION DE ADQUSICION',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'20.-	VERIFICAR EL CORRECTO FUNCIONAMIENTO DE LA BATERIA DEL UPS DE LA ESTACION DE TRABAJO',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'21.-	REVISION DE SENSOR DETECTOR DE PALETAS',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'22.-	PIXFIX',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'23.-	PRUEBAS DE ENVIO DE IMAGENES HACIA LAS DISTINTAS SALIDAS(IMPRESORA-FORWARD SERVER)',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'24.-	PRUEBAS FINALES',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'25.-	EL EQUIPO QUEDA FUNCIONANDO EN OPTIMAS CONDICIONES',fontSize:8,colSpan:4},{},{},{}],
               [{text:'OBSERVACIONES',fontSize:10,colSpan:6},{},{},{},{},{}],
               [{text:'.',fontSize:10,colSpan:6},{},{},{},{},{}],
              ]
           },            //layout: 'noBorders'
     };

  var rutina_selenia={pageBreak: 'before',
  	margin:[0,0],
    table: {
        widths: [25,20,100,100,100,120], 
        body: [   
               [{text:'ANEXO N',fontSize:10,bold:true,alignment:'center',colSpan:6},{},{},{},{},{}],
               [{text:'RUTINAS DE MANTENIMIENTO',fontSize:10,bold:true,alignment:'center',colSpan:6},{},{},{},{},{}],
               [{text:'EQUIPO:',fontSize:10,bold:true,alignment:'left',colSpan:2},{},{text:'MASTOGRAFO DIGITAL',fontSize:10,colSpan:2},{},{text:'No. CONTRATO:',fontSize:10,bold:true},{text:''}],
               [{text:'MARCA:',fontSize:10,bold:true,alignment:'left',colSpan:2},{},{text:'LORAD-HOLOGIC',fontSize:10,colSpan:2},{},{text:'',fontSize:10},{text:''}],
               [{text:'MODELO:',fontSize:10,bold:true,alignment:'left',colSpan:2},{},{text:'SELENIA',fontSize:10,colSpan:2},{},{text:'',fontSize:10},{text:''}],
               [{text:'NO. SERIE:',fontSize:10,bold:true,alignment:'left',colSpan:2},{},{text:'',fontSize:10,colSpan:2},{},{text:'',fontSize:10},{text:''}],
               //[{text:'UBICACION:',fontSize:10,bold:true,alignment:'center',colSpan:2},{},{text:'',colSpan:2},{},{text:'',fontSize:10},{text:''}],
               [{text:'ACTIVIDADES A REALIZAR DE MANTENIMIENTO PREVENTIVO',fontSize:10,bold:true,alignment:'center',colSpan:6},{},{},{},{},{}],
               [{text:'SI',fontSize:10,bold:true,alignment:'center'},{text:'NO',fontSize:10,bold:true,alignment:'center'},{text:'',colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'1.-	REVISION DE FUNCIONAMIENTO GENERAL DEL EQUIPO',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'2.-	SOPLETEO DE TARJETAS',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'3.-	INSPECCION Y LUBRICACION DEL MECANISMO DE ROTACION DEL BRAZO',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'4.-	INSPECCION Y LUBRICACION DEL TORNILLO SINFIN DEL MOVIMIENTO VERTICAL',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'5.-	OBTENCION DEL LOG FILE Y BACK UP',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'6.-	REVISION DEL SISTEMA DE COMPRESION',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'7.-	REVISION DE VOLTAJES DE ENTRADA',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'8.-	REVISION Y CALIBRACION DE FILAMENTOS',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'9.-	REVISION DEL CAMPO DE LUZ DEL COLIMADOR',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'10.-	REVISION DEL CAMPO DE RAYOS X',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'11.-	REVISION Y CALIBRACION DE LA CORRIENTE DE TUBO',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'12.-	REVISION Y CALIBRACION DE VOLTAJE DE TUBO',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'13.-	EVALUACION DE ARTEFACTOS EN DETECTOR',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'14.-	REVISION DE CALIDAD DE IMAGEN EN DETECTOR',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'15.-	REVISION DE FUNCIONAMIENTO DE PARTES MECANICAS',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'16.-	SOPLETEO DE COLIMADOR',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'17.-	REVISION DE FUNCIONAMIENTO DE CONTROLES',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'18.-	REVISION DE FUNCIONAMIENTO DE UPS DE LA CONSOLA',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'19.-	VERIFICAR EL CORRECTO FUNCIONAMIENTO DE LA BATERIA DEL UPS DE LA ESTACION DE ADQUSICION',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'20.-	VERIFICAR EL CORRECTO FUNCIONAMIENTO DE LA BATERIA DEL UPS DE LA ESTACION DE TRABAJO',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'21.-	REVISION DE SENSOR DETECTOR DE PALETAS',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'22.-	PIXEL MAP',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'23.-	PRUEBAS DE ENVIO DE IMAGENES HACIA LAS DISTINTAS SALIDAS(IMPRESORA-FORWARD SERVER)',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'24.-	PRUEBAS FINALES',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'25.-	EL EQUIPO QUEDA FUNCIONANDO EN OPTIMAS CONDICIONES',fontSize:8,colSpan:4},{},{},{}],
               [{text:'OBSERVACIONES',fontSize:10,colSpan:6},{},{},{},{},{}],
               [{text:'.',fontSize:10,colSpan:6},{},{},{},{},{}],
              ]
           },            //layout: 'noBorders'
     };

     var rutina_MIV={pageBreak: 'before',
  	margin:[0,0],
    table: {
        widths: [25,20,100,100,100,120], 
        body: [   
               [{text:'ANEXO N',fontSize:10,bold:true,alignment:'center',colSpan:6},{},{},{},{},{}],
               [{text:'RUTINAS DE MANTENIMIENTO',fontSize:10,bold:true,alignment:'center',colSpan:6},{},{},{},{},{}],
               [{text:'EQUIPO:',fontSize:10,bold:true,alignment:'left',colSpan:2},{},{text:'MASTOGRAFO',fontSize:10,colSpan:2},{},{text:'No. CONTRATO:',fontSize:10,bold:true},{text:''}],
               [{text:'MARCA:',fontSize:10,bold:true,alignment:'left',colSpan:2},{},{text:'LORAD-HOLOGIC',fontSize:10,colSpan:2},{},{text:'',fontSize:10},{text:''}],
               [{text:'MODELO:',fontSize:10,bold:true,alignment:'left',colSpan:2},{},{text:'M-IV',fontSize:10,colSpan:2},{},{text:'',fontSize:10},{text:''}],
               [{text:'NO. SERIE:',fontSize:10,bold:true,alignment:'left',colSpan:2},{},{text:'',fontSize:10,colSpan:2},{},{text:'',fontSize:10},{text:''}],
               //[{text:'UBICACION:',fontSize:10,bold:true,alignment:'center',colSpan:2},{},{text:'',colSpan:2},{},{text:'',fontSize:10},{text:''}],
               [{text:'ACTIVIDADES A REALIZAR DE MANTENIMIENTO PREVENTIVO',fontSize:10,bold:true,alignment:'center',colSpan:6},{},{},{},{},{}],
               [{text:'SI',fontSize:10,bold:true,alignment:'center'},{text:'NO',fontSize:10,bold:true,alignment:'center'},{text:'',colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'1.-	REVISION DE FUNCIONAMIENTO GENERAL DEL EQUIPO',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'2.-	SOPLETEO DE TARJETAS',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'3.-	INSPECCION Y LUBRICACION DEL MECANISMO DE ROTACION DEL BRAZO',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'4.-	INSPECCION Y LUBRICACION DEL TORNILLO SINFIN DEL MOVIMIENTO VERTICAL',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'5.-	REVISION DEL SISTEMA DE COMPRESION',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'6.-	REVISION DE VOLTAJES DE ENTRADA',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'7.-	REVISION Y CALIBRACION DE FILAMENTOS',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'8.-	REVISION DEL CAMPO DE LUZ DEL COLIMADOR',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'9.-	REVISION DEL CAMPO DE RAYOS X',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'10.-	REVISION Y CALIBRACION DE LA CORRIENTE DE TUBO',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'11.-	REVISION Y CALIBRACION DE VOLTAJE DE TUBO',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'12.-	REVISION DE FUNCIONAMIENTO DE PARTES MECANICAS',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'13.-	SOPLETEO DE COLIMADOR',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'14.-	REVISION DE FUNCIONAMIENTO DE CONTROLES',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'15.-	REVISION DE FUNCIONAMIENTO DE UPS DE LA CONSOLA',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'16.-	REVISION DE SENSOR DETECTOR DE PALETAS',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'17.-	PRUEBAS FINALES',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'18.-	EL EQUIPO QUEDA FUNCIONANDO EN OPTIMAS CONDICIONES',fontSize:8,colSpan:4},{},{},{}],
               [{text:'OBSERVACIONES',fontSize:10,colSpan:6},{},{},{},{},{}],
               [{text:'.',fontSize:10,colSpan:6},{},{},{},{},{}],
               
              ]
           },
            //layout: 'noBorders'
     };

      var rutina_discovery={pageBreak: 'before',
  	margin:[0,0],
    table: {
        widths: [25,20,100,100,100,120], 
        body: [   
               [{text:'ANEXO N',fontSize:10,bold:true,alignment:'center',colSpan:6},{},{},{},{},{}],
               [{text:'RUTINAS DE MANTENIMIENTO',fontSize:10,bold:true,alignment:'center',colSpan:6},{},{},{},{},{}],
               [{text:'EQUIPO:',fontSize:10,bold:true,alignment:'left',colSpan:2},{},{text:'DENSITOMETRO',colSpan:2},{},{text:'No. CONTRATO:',fontSize:10,bold:true},{text:''}],
               [{text:'MARCA:',fontSize:10,bold:true,alignment:'left',colSpan:2},{},{text:'LORAD-HOLOGIC',colSpan:2},{},{text:'',fontSize:10},{text:''}],
               [{text:'MODELO:',fontSize:10,bold:true,alignment:'left',colSpan:2},{},{text:'DISCOVERY',colSpan:2},{},{text:'',fontSize:10},{text:''}],
               [{text:'NO. SERIE:',fontSize:10,bold:true,alignment:'left',colSpan:2},{},{text:'',colSpan:2},{},{text:'',fontSize:10},{text:''}],
               //[{text:'UBICACION:',fontSize:10,bold:true,alignment:'center',colSpan:2},{},{text:'',colSpan:2},{},{text:'',fontSize:10},{text:''}],
               [{text:'ACTIVIDADES A REALIZAR DE MANTENIMIENTO PREVENTIVO',fontSize:10,bold:true,alignment:'center',colSpan:6},{},{},{},{},{}],
               [{text:'SI',fontSize:10,bold:true,alignment:'center'},{text:'NO',fontSize:10,bold:true,alignment:'center'},{text:'',colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'1.-	DESENSAMBLADO DEL EQUIPO',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'2.-	LIMPIEZA GENERAL DE PARTICULAS ACENTADAS EN LOS CIRCUITOS ELECTRONICOS Y SISTEMAS DE VENTILACION',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'3.-	LIMPIEZA Y LUBRICACION GENERAL DE SISTEMAS MECANICOS',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'4.-	REENSAMBLADO PARCIAL DEL EQUIPO PARA PRUEBAS DEL MISMO',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'5.-	VERIFICACION Y AJUSTE DE LOS VOLTAJES DE LA FUENTE DE ALIMENTACION',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'6.-	REVISION DE SOFTWARE EN LA COMPUTADORA',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'7.-	MANTENIMIENTO DE COMPUTADORA Y DISCO DURO E IMPRESORA',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'8.-	LIMPIEZA INTERNA DE LA COMPUTADORA',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'9.-	REVISION DE COMUNICACION ENTRE LA COMPUTADORA Y ESCANER DE DENSITOMETRIA',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'10.-	ARMADO GENERAL DEL EQUIPO',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'11.-	VERIFICACION DE VALORES DE UNIFORMIDAD',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'12.-	REVISION DE VALORES DE AREA Y CONTENIDO MINERAL EN HUESO CON RESPECTO AL FANTOM DE CALIBRACION',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'13.-	CALIRACION DE PARAMETROS',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'14.-	PRUEBA GENERAL DEL EQUIPO',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'15.-	EL EQUIPO QUEDA FUNCIONANDO EN OPTIMAS CONDICIONES',fontSize:8,colSpan:4},{},{},{}],
               [{text:'OBSERVACIONES',fontSize:10,colSpan:6},{},{},{},{},{}],
               [{text:'.',fontSize:10,colSpan:6},{},{},{},{},{}],
               
              ]
           },
            //layout: 'noBorders'
     };

     var rutina_multicare={pageBreak: 'before',
  	margin:[0,0],
    table: {
        widths: [25,20,100,100,100,120], 
        body: [   
               [{text:'ANEXO N',fontSize:10,bold:true,alignment:'center',colSpan:6},{},{},{},{},{}],
               [{text:'RUTINAS DE MANTENIMIENTO',fontSize:10,bold:true,alignment:'center',colSpan:6},{},{},{},{},{}],
               [{text:'EQUIPO:',fontSize:10,bold:true,alignment:'left',colSpan:2},{},{text:'MESA DE ESTEREOTAXIA',fontSize:10,colSpan:2},{},{text:'No. CONTRATO:',fontSize:10,bold:true},{text:''}],
               [{text:'MARCA:',fontSize:10,bold:true,alignment:'left',colSpan:2},{},{text:'LORAD-HOLOGIC',fontSize:10,colSpan:2},{},{text:'',fontSize:10},{text:''}],
               [{text:'MODELO:',fontSize:10,bold:true,alignment:'left',colSpan:2},{},{text:'MULTICARE',fontSize:10,colSpan:2},{},{text:'',fontSize:10},{text:''}],
               [{text:'NO. SERIE:',fontSize:10,bold:true,alignment:'left',colSpan:2},{},{text:'',fontSize:10,colSpan:2},{},{text:'',fontSize:10},{text:''}],
               //[{text:'UBICACION:',fontSize:10,bold:true,alignment:'center',colSpan:2},{},{text:'',colSpan:2},{},{text:'',fontSize:10},{text:''}],
               [{text:'ACTIVIDADES A REALIZAR DE MANTENIMIENTO PREVENTIVO',fontSize:10,bold:true,alignment:'center',colSpan:6},{},{},{},{},{}],
               [{text:'SI',fontSize:10,bold:true,alignment:'center'},{text:'NO',fontSize:10,bold:true,alignment:'center'},{text:'',colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'1.-	REVISION DE FUNCIONAMIENTO GENERAL DEL EQUIPO',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'2.-	SOPLETEO DE TARJETAS',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'3.-	INSPECCION Y LUBRICACION DE TORNILLOS SINFIN DE LA MESA',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'4.-	LIMPIEZA DE MECANISMOS DE POSICIONAMIENTO DE AGUA',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'5.-	REVISION DE SISTEMAS DE COMPRESION',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'6.-	REVISION DE VOLTAJES DE ENTRADA',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'7.-	REVISION Y CALIBRACION DE FILAMENTOS',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'8.-	REVISION Y CALIBRACION DE LA CORRIENTE DEL TUBO',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'9.-	REVISION Y CALIBRACION DE VOLTAJE DE TUBO',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'10.-	EVALUACION DE ARTEFACTOS EN EL DETECTOR',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'11.-	REVISION DE CALIDAD DE IMAGEN EN DETECTOR',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'12.-	REVISION DE FUNCIONAMIENTO DE PARTES MECANICAS',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'13.-	SOPLETEO DE DETECTOR',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'14.-	REVISION DE FUNCIONAMIENTO DE CONTROLES',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'15.-	PRUEBA DE CALIDAD',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'16.-	CALIBRACION DE LOS EJES X, Y, Z (SI EL EQUIPO LO REQUIERE)',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'17.-	VERIFICACION DE LA RELACION SEÑAL RUIDO',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'18.-	VERIFICACION DE LA LINEALIDAD DE LOS EJES X, Y, Z',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'19.-	VERIFICACION DE LA ALINEACION DE TUBO',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'20.-	PRUEBAS FINALES',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'21.-	EL EQUIPO QUEDA FUNCIONANDO EN OPTIMAS CONDICIONES',fontSize:8,colSpan:4},{},{},{}],
               [{text:'OBSERVACIONES',fontSize:10,colSpan:6},{},{},{},{},{}],
               [{text:'.',fontSize:10,colSpan:6},{},{},{},{},{}],
               
              ]
           },
            //layout: 'noBorders'
     };

    var rutina_securview={pageBreak: 'before',
  	margin:[0,0],
    table: {
        widths: [25,20,100,100,100,120], 
        body: [   
               [{text:'ANEXO N',fontSize:10,bold:true,alignment:'center',colSpan:6},{},{},{},{},{}],
               [{text:'RUTINAS DE MANTENIMIENTO',fontSize:10,bold:true,alignment:'center',colSpan:6},{},{},{},{},{}],
               [{text:'EQUIPO:',fontSize:10,bold:true,alignment:'left',colSpan:2},{},{text:'ESTACION DE TRABAJO',fontSize:10,colSpan:2},{},{text:'No. CONTRATO:',fontSize:10,bold:true},{text:''}],
               [{text:'MARCA:',fontSize:10,bold:true,alignment:'left',colSpan:2},{},{text:'LORAD-HOLOGIC',fontSize:10,colSpan:2},{},{text:'',fontSize:10},{text:''}],
               [{text:'MODELO:',fontSize:10,bold:true,alignment:'left',colSpan:2},{},{text:'SECURVIEW',fontSize:10,colSpan:2},{},{text:'',fontSize:10},{text:''}],
               [{text:'NO. SERIE:',fontSize:10,bold:true,alignment:'left',colSpan:2},{},{text:'',fontSize:10,colSpan:2},{},{text:'',fontSize:10},{text:''}],
               //[{text:'UBICACION:',fontSize:10,bold:true,alignment:'center',colSpan:2},{},{text:'',colSpan:2},{},{text:'',fontSize:10},{text:''}],
               [{text:'ACTIVIDADES A REALIZAR DE MANTENIMIENTO PREVENTIVO',fontSize:10,bold:true,alignment:'center',colSpan:6},{},{},{},{},{}],
               [{text:'SI',fontSize:10,bold:true,alignment:'center'},{text:'NO',fontSize:10,bold:true,alignment:'center'},{text:'',colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'1.-	REVISION DE FUNCIONAMIENTO GENERAL DEL EQUIPO',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'2.-	SOPLETEO DE TARJETAS',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'3.-	REVISION DE VOLTAJES DE ENTRADA',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'4.-	REVISION DE FUNCIONAMIENTO DE CONTROLES',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'5.-	REVISION DE FUNCIONAMIENTO DE UPS DE LA CONSOLA',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'6.-	VERIFICACION DEL CORRECTO FUNCIONAMIENTO DE LA BATERIA DEL UPS DE LA ESTACION DE TRABAJO',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'7.-	SOPLETEO DE CPU DE SCW',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'8.-	SOPLETEO DE MONITORES BARCO',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'9.-	CALIBRACION DE MONITORES EN LA ESTACION DE TRABAJO',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'10.-	LIMPIEZA EXTERNA DE TODO EL EQUIPO',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'11.-	REMOCION DE  POLVO DE LA ESTACION DE TRABAJO',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'12.-	PRUEBAS DE ENVIO DE IMAGENES HACIA LAS DISTINTAS SALIDAS(IMP., ESTAC. TRAB)',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'13.-	PRUEBAS FINALES',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'14.-	EL EQUIPO QUEDA FUNCIONANDO EN OPTIMAS CONDICIONES',fontSize:8,colSpan:4},{},{},{}],
               [{text:'OBSERVACIONES',fontSize:10,colSpan:6},{},{},{},{},{}],
               [{text:'.',fontSize:10,colSpan:6},{},{},{},{},{}],
               
              ]
           },
            //layout: 'noBorders'
     };

     var rutina_virtua={pageBreak: 'before',
  	margin:[0,0],
    table: {
        widths: [25,20,100,100,100,120], 
        body: [   
               [{text:'ANEXO N',fontSize:10,bold:true,alignment:'center',colSpan:6},{},{},{},{},{}],
               [{text:'RUTINAS DE MANTENIMIENTO',fontSize:10,bold:true,alignment:'center',colSpan:6},{},{},{},{},{}],
               [{text:'EQUIPO:',fontSize:10,bold:true,alignment:'left',colSpan:2},{},{text:'GRABADOR DE DISCOS',fontSize:10,colSpan:2},{},{text:'No. CONTRATO:',fontSize:10,bold:true},{text:''}],
               [{text:'MARCA:',fontSize:10,bold:true,alignment:'left',colSpan:2},{},{text:'CODONICS',fontSize:10,colSpan:2},{},{text:'',fontSize:10},{text:''}],
               [{text:'MODELO:',fontSize:10,bold:true,alignment:'left',colSpan:2},{},{text:'VIRTUA',fontSize:10,colSpan:2},{},{text:'',fontSize:10},{text:''}],
               [{text:'NO. SERIE:',fontSize:10,bold:true,alignment:'left',colSpan:2},{},{text:'',fontSize:10,colSpan:2},{},{text:'',fontSize:10},{text:''}],
               //[{text:'UBICACION:',fontSize:10,bold:true,alignment:'center',colSpan:2},{},{text:'',colSpan:2},{},{text:'',fontSize:10},{text:''}],
               [{text:'ACTIVIDADES A REALIZAR DE MANTENIMIENTO PREVENTIVO',fontSize:10,bold:true,alignment:'center',colSpan:6},{},{},{},{},{}],
               [{text:'SI',fontSize:10,bold:true,alignment:'center'},{text:'NO',fontSize:10,bold:true,alignment:'center'},{text:'',colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'1.-	DESENSAMBLADO DEL EQUIPO',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'2.-	LIMPIEZA GENERAL DE PARTICULAS ACENTADAS EN LOS CIRCUITOS ELECTRONICOS',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'3.-	LIMPIEZA GENERAL DE PARTICULAS ACENTADAS EN LOS SISTEMAS DE VENTILACION',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'4.-	LIMPIEZA DE CARCASA DEL EQUIPO',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'5.-	LIMPIEZA DE SISTEMAS MECANICOS',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'6.-	LIMPIEZA DE FUENTE DE ALIMENTACION',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'7.-	VERIFICACION Y AJUSTE DE LOS VOLTAJES DE LA FUENTE DE ALIMENTACION',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'8.-	CALIBRACION DE SENSORES',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'9.-	CALIBRACION DE MOTOR DE TRACCION',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'10.-	VERIFICACION DE COMUNICACION DE RED',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'11.-	VERIFICACION DE COMUNICACION CON LOS EQUIPOS',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'12.-	PRUEBAS GENERALES DE GRABADO',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'13.-	REENSAMBLADO PARCIAL DEL EQUIPO PARA PRUEBAS DEL MISMO',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'14.-	ARMADO GENERAL DEL EQUIPO',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'15.-	PRUEBAS FINALES',fontSize:8,colSpan:4},{},{},{}],
               [{text:'',fontSize:10},{text:'',fontSize:10},{text:'16.-	EL EQUIPO QUEDA FUNCIONANDO EN OPTIMAS CONDICIONES',fontSize:8,colSpan:4},{},{},{}],
               [{text:'OBSERVACIONES',fontSize:10,colSpan:6},{},{},{},{},{}],
               [{text:'.',fontSize:10,colSpan:6},{},{},{},{},{}],
               
              ]
           },
            //layout: 'noBorders'
     };

     

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$scope.openCotizacionContratoPdf=function(objeto) {	// body...	//console.log(objeto);	//console.log(cotizacionContrato);
  var $rsl=cotizacionContrato.qry({id:objeto.id});
      $rsl.$promise.then(function(r){ console.info(r);
      $scope.objeto=r.objeto;
      $scope.tabla=r.objeto.tabla;// console.warn($scope.tabla);//console.warn($scope.tabla.length);//console.warn(r.objeto.tabla[0]);//console.info(r.objeto.tabla);
  var cabeza=function(){
    return{ style: 'texto',
            margin: [40,20],
            table:{ widths: [130, 130, 130, 130],
                  body: [
                    [{image:'smh',width:120,alignment:'bottom'},{text:'SUMINISTRO PARA USO MEDICO Y HOSPITALARIO, SA DE CV \nSUM890327137\nDIAGONAL 29\nDEL VALLE\n03100 - BENITO JUAREZ (CIUDAD DE MEXICO)',fontSize:10, bold: true, alignment:'right',fillColor: '#0033a0',color:'white',colSpan:'3'},{},{}],
                    [{text:'____________________________________________________________________________________________________',colSpan: 4,alignment: 'center',bold:'true',color:'gray'},{}],
                    [{text:'Cotización No: ',alignment:'right',fontSize:10,bold:true},{text:objeto.dato, alignment:'left',fontSize:10},{text:'Versión: ',alignment:'right',fontSize:10},{text:$scope.objeto.version,alignment:'left',fontSize:10}],// [{text:'Fecha: ',alignment:'right',fontSize:10,bold:true},        {text:objeto.created_at, alignment:'left',fontSize:10},{text:'',alignment:'right'},         {text:'', alignment:'left'}],
                   ]
                  },
                   layout: 'noBorders'
          };
     }

var t1={margin:[0,10],
    table: {
        widths: [25,20,100,100,100,120],  //widths: [25,20,100,100,100,120], 
        body: [[],                            ]
           },//layout: 'noBorders'
     };

var t2={margin:[0,10],
    table: {
        widths: [25,20,100,100,100,120],  //widths: [25,20,100,100,100,120], 
        body: [[],              ]
           },//layout: 'noBorders'
     };
console.log(r.objeto.tabla);
if(r.objeto.tabla == null || r.objeto.tabla==0){
  alert("NO HAY DATOS DE PRODUCTOS VERIFICAR COTIZACION");
}else{
var tr_t=r.objeto.tabla[0];
var length = Object.keys(tr_t).length;                          //console.log(length);
var c=[];
var tr=[];
var td=[];
var caracter="*";
var i=0;
while(i<length){
  c[i]=caracter;                                                //console.info(c);
  i++;
}
i=0;
for (var k in tr_t){
  tr[i]={text:tr_t[k],bold:true,alignment:'center',fontSize:7};
  i++;
}                                                               //console.log(tr); //ok
  t1.table.widths=c;
  t1.table.body[0]=tr;                                          //console.info(r.objeto.tabla.length);//3
  var l=0;  i=0;  var lineas=[];
  for(var j=1;j<r.objeto.tabla.length;j++){                     //console.log(j);
    lineas=r.objeto.tabla[j];                                   //console.warn(lineas);
    l=0;      
      for (var y in lineas){                                    //console.info(y);    ////console.info(y.indexOf(y));////console.log(j);      console.info(lineas[y]);
      td[l]={text:lineas[y],bold:true,alignment:'center',fontSize:7};//      console.log(td);console.log(length);
      if(l==length-1){                                          //console.log(l);//
          t1.table.body.push(td);                               // i++;
          td=[];  
      }
      l++;
    } 
      
    }
}

////////////////////////////////////////////////////////////////////
if(r.objeto.tablados == null || r.objeto.tablados==0){
alert("NO HAY DATOS DE CALENDARIO VERIFICAR COTIZACION");
}  else{
var tr_t2=r.objeto.tablados[0];
var length2 = Object.keys(tr_t2).length;          //console.log(length);
var c2=[];
var tr2=[];
var td2=[];
var caracter2="*";
var i=0;
while(i<length2){
  c2[i]=caracter2;                               //console.info(c);
  i++;
}
i=0;
for (var k in tr_t){
  tr2[i]={text:tr_t2[k],bold:true,alignment:'center',fontSize:7};
  i++;
}                                               //console.log(tr); //ok
  t2.table.widths=c2;
  t2.table.body[0]=tr2;                         //console.info(r.objeto.tabla.length);//3
  var l=0;
  i=0;
  var lineas2=[];
  for(var j=1;j<r.objeto.tablados.length;j++){  //console.log(j);
    lineas2=r.objeto.tablados[j];               //console.warn(lineas2);
    l=0;      
      for (var y in lineas2){//console.info(y);    ////console.info(y.indexOf(y));//     console.log(j);console.info(lineas2[y]);
      td2[l]={text:lineas2[y],bold:true,alignment:'center',fontSize:7}; //      console.log(td2);console.log(length2);
      if(l==length2-1){                                                 //console.log(l);//
          t2.table.body.push(td2);// i++;
          td2=[];  
      }
      l++;
    } 
  }
}
 //var tercero={text:r.objeto.nombre_fiscal+"\n"+r.objeto.calle_fiscal+"\nCOL. "+r.objeto.colonia_fiscal+"\nC.P. "+r.objeto.c_p_fiscal+" "+r.objeto.ciudad_fiscal+" "+r.objeto.estado_fiscal,fontSize:10,bold:true};
 //var presente={text:"\n",fontSize:10};
 var body=r.objeto.foot;
 var cal1=body.search("CALENDARIO");             console.info(cal1);
 var cal2=body.length;                         console.info(cal2);
 if(cal1<=0){//SI ES = -1
  var body={text:body,fontSize:10,bold:false,alignment:'justify'};
 }else{//SI ES MAYOR A 0
 var textobody=body.substr(0,cal1);                   console.info(textobody);
 var textbodyfin=body.substr(cal1+10,cal2); 
 var calendario="CALENDARIO \n\n"
 var body={text:[{text:textobody,fontSize:10,bold:false,alignment:'justify'}],pageBreak: 'after'};
 var body2={text:[{text:calendario,fontSize:10,bold:true,alignment:'center'},{text:textbodyfin,fontSize:10,bold:false,alignment:'justify'}]}; ;
}
 var title={text:r.objeto.head,fontSize:10,bold:true};
 
 //var body={text:r.objeto.foot,fontSize:10,bold:false,alignment:'justify'};
 if(r.objeto.fin){
var fin={text:r.objeto.fin+"",fontSize:10,bold:false,alignment:'justify'};
}else{console.warn("NO HAY TEXTO EN FIN");}
 var footer=function(currentPage, pageCount) { return [
                  { text: 'ATENTAMENTE', fontSize:8,alignment:'center',bold:true,decoration:'underline'},
                  { text: '\n\n\n\n', fontSize:8,alignment:'center'},
                  { text:'___________________________________' , fontSize:8,alignment:'center' },
                  { text: 'Lic. Raúl Prieto García\nCoordinador de Contratos', fontSize:8,alignment:'center',bold:true },//{ text: 'emarquez@smh.com.mx', fontSize:8,alignment:'center',decoration:'underline' },
                  { text:'La información descrita en la presente propuesta es de caracter confidencial y solo puede ser utilizada por la persona a la cual está dirigida.',fontSize:6,bold:true,alignment:'center'},
                  { text:'Páginas: '+ currentPage.toString() + ' de ' + pageCount,alignment:'center',fontSize:8,color:'gray'}
                  ]; 
                };

  cotizacion_Contrato.header=cabeza;
  cotizacion_Contrato.content.push(title);
  cotizacion_Contrato.content.push(t1);
  cotizacion_Contrato.content.push(body);
  if(cal1>0){//SI ES = -1
   cotizacion_Contrato.content.push(body2);
  }
  if(r.objeto.tablados != null){
    cotizacion_Contrato.content.push(t2);
  }else{console.warn("NO HAY CALENDARIO");
} if(r.objeto.fin){
    cotizacion_Contrato.content.push(fin);
  }else{console.warn("NO HAY FIN");}
  cotizacion_Contrato.footer=footer;
	pdfMake.createPdf(cotizacion_Contrato).open();
  /*
  cotizacion_Contrato.content.push(rutina_selenia);
  cotizacion_Contrato.content.push(rutina_MIV);
  cotizacion_Contrato.content.push(rutina_discovery);
  cotizacion_Contrato.content.push(rutina_multicare);
  cotizacion_Contrato.content.push(rutina_alpha);
  cotizacion_Contrato.content.push(rutina_virtua);*/
  //console.log(cotizacion_Contrato);
  }); <!-- // FIN DE QRY -->
}


})
'use strict';
angular.module('cotizacionApp')
.service('tipoServicio',function(){
    this.qry=function(jn){
        return [
        {nombre:'MONTAJE DE EQUIPO'},
        {nombre:'DESMONTAJE DE EQUIPO'},
        {nombre:'CAPACITACION'},
        {nombre:'CALIBRACION'},
        {nombre:'CONFIGURACION'},
        {nombre:'REVISION Y DIAGNOSTICO'},
        {nombre:'MANTENIMIENTO PREVENTIVO'},
        {nombre:'MANTENIMIENTO CORRECTIVO'},
        {nombre:'MANTENIMIENTO PREVENTIVO Y CORRECTIVO'},
        {nombre:'PRUEBAS RADIOLOGICAS'},
        {nombre:'LEVANTAMIENTO DE AREA'},
        {nombre:'SUPERVISION DE AREA'},
        {nombre:'ENTREGA DE ADECUACION'},
        {nombre:'ELABORACION DE GUIA MECANICA'},
        {nombre:'ENTREGA DE GUIA MECANICA'},
        {nombre:'ELABORACION DE PRESUPUESTO'},
        {nombre:'TRABAJO ADMINISTRATIVO'},
        {nombre:'ENTREGA DE REFACCION'}
        ];
    };

})
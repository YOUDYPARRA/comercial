'use strict';
angular.module('cotizacionApp')
.service('tipoContrato',function(){
    this.qry=function(jn){
        return [
      	{nombre:'MANTENIMIENTO PREVENTIVO CON REFACCIONES'},
        {nombre:'MANTENIMIENTO PREVENTIVO SIN REFACCIONES'},
        {nombre:'MANTENIMIENTO CORRECTIVO CON REFACCIONES'},
        {nombre:'MANTENIMIENTO CORRECTIVO SIN REFACCIONES'},
        {nombre:'MANTENIMIENTO PREVENTIVO Y CORRECTIVO CON REFACCIONES'},
        {nombre:'MANTENIMIENTO PREVENTIVO Y CORRECTIVO SIN REFACCIONES'},
    	];
    };

})
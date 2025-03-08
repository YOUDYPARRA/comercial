'use strict';
//angular.module('cotizacionApp')
angular.module('cotizacionApp', ['ngMaterial', 'ngMessages', 'material.svgAssetsCache'])
//angular.module('cotizacionApp')
//.controller('DatepickerPopupDemoCtrl',function ($scope){

//var myApp = angular.module('myApp', []);

.controller('AppCtrl', function() {
  this.myDate = new Date();
  this.isOpen = false;

});
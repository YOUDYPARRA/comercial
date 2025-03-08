@extends('app')
@section('content') 
<div class="container" ng-controller="graficasCtrl">
	<div class="panel panel-info">
		<div class='panel-heading'>GRAFICA PARA PROYECTOS</div>
		<div class='panel-body' ng-init="inicio()">
			@include('proyecto_venta.partials.FormDatosGrafico') 
			@include('partials.FormGraficaPastel') 
			@include('partials.FormGraficaBarra') 
		</div>
		<div class="panel-footer"> 
		</div>
	</div>
</div>
@endsection
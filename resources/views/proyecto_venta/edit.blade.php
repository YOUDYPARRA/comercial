@extends('app')
@section('content') 
<div class="container">
	<div class="panel panel-info" ng-controller="pVentaCtrl">
		<div class='panel-heading'>ACTUALIZACIÓN DEL PROYECTO</div>
		<div class='panel-body' ng-init="inicioEdit({{$id}});c='{{$id}}'">
		{!! Form::open(array('name'=>'formProyectoVentas')) !!} 
			@include('proyecto_venta.partials.FormProyecto') 
		</div>
		<div class="panel-footer"> 
			<button type="button" ng-click='guardar()' ng-disabled="save||formReporte.$invalid" class="btn btn-raised btn-info btn-lg" title="GUARDAR" ><i class="material-icons">save</i></button>
			<span><%msg%></span>
			<a href="{{ route('proyectoventa.index')}}" type="button" class="btn btn-success" title="IR A LA LISTA DE PROYECTOS"><i class="material-icons">list</i></a>
		{!! Form::close() !!} 
		</div>
	</div>
</div>
@endsection
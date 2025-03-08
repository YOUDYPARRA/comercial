@extends('app')
@section('content') 
<div class="container">
	<div class="panel panel-info" ng-controller="pVentaCtrl">
		<div class='panel-heading'>CREAR PROYECTO</div>
		<div class='panel-body' ng-init="inicio('{{Auth::user()->iniciales}}');id='0'">
		{!! Form::open(array('name'=>'formProyectoVentas')) !!} 
			@include('proyecto_venta.partials.FormProyecto') 
		</div>
		<div class="panel-footer"> 
			<button type="button" ng-click='guardar()' ng-disabled="save||formProyectoVentas.$invalid" class="btn btn-raised btn-info btn-lg" title="GUARDAR" ><i class="material-icons">save</i></button>
			<span><%msg%></span>
			<a href="{{ route('proyectoventa.index')}}" type="button" class="btn btn-success" title="IR A LA LISTA DE PROYECTOS"><i class="material-icons">list</i></a>
		{!! Form::close() !!} 
		</div>
	</div>
</div>
@endsection
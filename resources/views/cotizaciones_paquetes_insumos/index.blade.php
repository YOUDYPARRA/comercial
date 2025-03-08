@extends('app')
@section('content')
<div class="container">	

{!! Form::model(Request::all(),['route'=>'cotizacionPaqueteInsumo.index','method'=>'GET']) !!}
<div class="container">
    <div class="panel panel-default">
<ul class="nav nav-pills" >
  <li role="presentation" >
    <div class="panel-group">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" href="#collapse2" ng-click="consultar_ventas()"><i class="material-icons">search</i> BUSCAR</a>
          </h4>
        </div>
        <div id="collapse2" class="panel-collapse collapse">
          <div class="panel-body">
        {!! Form::hidden('aprobacion',null,['class'=>'form-group']) !!}
            @include('cotizaciones.partials.FormBuscar')
          </div>
        </div>
      </div>
    </div>
  </li>
  </ul>     
    <div class="panel panel-footer">
        {!! Form::hidden('buscar','buscar',['class'=>'form-group']) !!}
        {!! $cotizaciones->appends(['sort' => 'auto','buscar'=>'buscar','fecha'=>$request->fecha,'numero_cotizacion'=>$request->numero_cotizacion,'nombre_fiscal'=>$request->nombre_fiscal,'aprobacion'=>$request->aprobacion])->render() !!}
    </div>
</div>
</div>    
{!! Form::close() !!}

	@if($request->user()->area=='VENTAS')
	<!--//reañozar la busqeda de cotizaciones por empleado!-->
	<h4>DEPARTAMENTO DE VENTAS</h4>
			<!-- USUARIOS  VENDEDORES-->
		@include('cotizaciones_paquetes_insumos.partials.IndexUsu')
	@else
	<!-- JURIDICO Y OTROS-->
	<!--<h4>LISTADO DE COTIZACIONES</h4>-->
		@include('cotizaciones_paquetes_insumos.partials.Index')
	@endif
</div>
@include('cotizaciones_paquetes_insumos.partials.modals.email')
@endsection
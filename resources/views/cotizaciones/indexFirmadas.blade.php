@extends('app')
@section('content')
@if(isset($objetos))
{!! Form::model(Request::all(),['route'=>'cotizaciones.index','method'=>'GET']) !!}
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
	            {!! Form::hidden('aprobacion',1,['class'=>'form-group','placeholder'=>'ESTATUS'])!!}
	            @include('cotizaciones.partials.FormBuscar')
	          </div>
	        </div>
	      </div>
	    </div>
	  </li>
	  </ul>
	    <div class="panel panel-footer">
	        {!! $objetos->appends(['fecha'=>$request->fecha,'numero_cotizacion'=>$request->numero_cotizacion,'nombre_fiscal'=>$request->nombre_fiscal,'aprobacion'=>$request->aprobacion])->render()!!}
	    </div>
	</div>
	</div>
	{!! Form::close() !!}

<!--FIN DE PANTALLA DE BUSQUEDA DE COTIZACIONES!-->
	<div class="container">
	    <div class="row">
	        <div class="col-md-16 col-md-offset-0">
	            <div class="panel panel-default">
	                <div class='panel-heading'>COTIZACIONES CONFIRMADAS POR EL CLIENTE</div>
	                    <div class='panel-body'>
	                        <p>Hay {{ $objetos->total() }} COTIZACIONES</p>
	                        <div style="height: 600px; overflow: scroll">
	                            <table class="table table-striped table-condensed">
	                               <tr>
	                                <th># Cot.</th>
	                                <th>Estatus</th>
	                                <th>Fecha</th>
	                                <th>Empleado</th>
	                                <th>Nombre fiscal</th>
	                                <th>Total</th>
	                                <th>Moneda</th>
	                                <th>observación</th>
	                                <th></th>
	                            </tr>

	                            @foreach($objetos as $key=>$objeto)
	                            <tr>
	                                <td>{!! $objeto->numero_cotizacion!!}</td>
	                                <td>{!! $objeto->estatus!!}</td>
	                                <td>{!! $objeto->fecha!!}</td>
	                                <td>{!! $objeto->nombre_empleado!!}</td>
	                                <td>{!! $objeto->nombre_fiscal !!}</td>
	                                <td>-</td>
	                                <td>{!! $objeto->tipo_moneda!!}</td>
	                                <td>
	                                @can('acceso','cotizaciones.update')
        	                            @include('cotizaciones.partials.FormNota')
	                                @else
    	                                {!! Form::textarea('nota',$objeto->nota,['readonly'=>'readonly','size'=>'10x4'])!!}
                                	@endif

	                                </td>
	                                <td>
	                                <button type="button" ng-controller="CotizacionPdfCtrl" class="btn btn-info btn-lg" ng-click="openCotizacionPdf({{$objeto->id}});"><i class="material-icons">picture_as_pdf</i></button>
	                                @can('acceso','compras.create')
	                                	<a href="{{ route('compras.create', $objeto->id)}}" type="button" class="btn btn-primary" title="ENVIAR A COMPRAS"><i class="material-icons">shopping_cart</i></button>    </a>
	                                @endcan
	                                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>
	                                @include('compras.modals.CompraStock_modal')
	                                </td>
	                            </tr>
	                            @endforeach
	                            </table>
	                        </div>
	                    </div>
	                    <div class="panel-footer">

	                    </div>
	            </div>
	        </div>
	    </div>
	</div>
@endif
@endsection

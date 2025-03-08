@extends('app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 col-md-offset-1">
			<div class="panel panel-info">
				<div class='panel-heading'>DETALLE COTIZACION<span class="badge badge-warning"></span></div>
    			<div class='panel-body'>
    				<table class="table table-striped table-condensed">
	                               <tr>
	                                <th>Folio</th>
	                                <th>Fecha Creacion</th>
	                                <th>Fecha Actualizacion</th>
	                                <th>Iniciales</th>
	                                <th>Estatus</th>
	                            </tr>
    				@foreach($calificacion as $key=>$objeto)
    				<tr>
	                                <td>{{$cotizacion->numero_cotizacion}}</td>
	                                <td>{{$cotizacion->created_at}}</td>
	                                <td>{!! $objeto->created_at !!}</td>
	                                <td>{!! $objeto->iniciales !!}</td>
	                                <td>{!! $objeto->calificacion !!}</td>
	                </tr>
    				@endforeach
					</table>
				</div>
				<div class="panel-footer"></div>
			</div>
		</div>
	</div>
</div>
@endsection

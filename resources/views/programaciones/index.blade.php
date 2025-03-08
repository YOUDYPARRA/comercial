@extends('app')
@section('content')
@include('programaciones.partials.FormBuscar')
	<div class="panel panel-info">
		<div class='panel-heading panel-info' > ASIGNACION DE SERVICIO <span class="badge">TOTAL: {{$objetos->total()}}</span></div>
		<div class='panel-body'>
			<div style="height: 600px; overflow: scroll">
    		<table border=0 class="table table-striped"><thead>
    			<tr>
					<th>FECHA</th>
					<th>ORGANIZACION</th>
					<th>REPORTE</th>
					<th>COORDINACION</th>
					<th>AUTOR</th>
					<th>ATIENDE</th>
					<th>PROGRAMACION</th>
					<th>CONDICION</th>
					<th>TIPO</th>
					<th>ESTATUS</th>
					<th>CLIENTE</th>
					<th>SUCURSAL</th>
					<th>MARCA</th>
					<th>MODELO</th>
					<th>SERIE</th>
					<th></th>
					<th></th>
				</tr>
    			@foreach($objetos as $objeto)
        		<tr>
					<td>{!! $objeto->created_at!!}</td>
					<td>{!! $objeto->organizacion!!}</td>
					<td>
						@can('acceso','reportes.index')
							{!! link_to_route('reportes.index',$objeto->folio,['folio'=>$objeto->folio]) !!}
						@else
							{!! $objeto->folio !!}
						@endcan
					</td>
					<td>{!! $objeto->coordinacion!!}</td>
					<td>{!! $objeto->autor!!}</td>
					<td>
						@foreach($objeto->personas_servicio as $atiende)
							{!! $atiende->iniciales !!}<br>
						@endforeach
					</td>
					<td>{!! $objeto->fecha_inicio !!} {!! $objeto->fecha_fin !!} {!! $objeto->hora_atencion !!}</td>
					<td>{!! $objeto->condicion_servicio!!}</td>
					<td>{!! $objeto->tipo_servicio!!}</td>
					<td>{!! $objeto->estatus!!}</td>
					<td>{!! $objeto->nombre_fiscal!!}</td>
					<td>{!! $objeto->nombre_cliente !!}</td>
					<td>{!! $objeto->marca!!}</td>
					<td>{!! $objeto->modelo!!}</td>
					<td>{!! $objeto->numero_serie!!}</td>
					<td>
						@can('acceso','programaciones.correo')
							@if($objeto->estatus!='CERRADO')
								@include('programaciones.partials.FormCorreo')
							@endif
						@endcan
						@can('acceso','programaciones.edit')
							@if($objeto->estatus!='CERRADO')
								<a href="{{ route('programaciones.edit', $objeto->id)}}" type="button" class="btn btn-warning btn-xs" title="ACTUALIZAR"><i class="material-icons">cached</i></a>
							@endif
						@endcan
					</td><!-- 1-->
					<td>
						@can('acceso','programaciones.show')
							@if($objeto->estatus!='CERRADO')
								<a href="{{ route('programaciones.show', $objeto->id)}}" type="button" class="btn btn-danger btn-xs" title="ELIMINAR"><i class="material-icons">delete</i></a>
							@endif
						@endcan
					</td><!-- 2-->
				</tr>
    			@endforeach
			</table>
		</div>
		</div>
		<div class="panel-footer">
		</div>
	</div>
@endsection

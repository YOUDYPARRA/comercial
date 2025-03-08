@extends('app')
@section('content')

	{!! Form::model(Request::all(),['route'=>'proyectoventa.index','method'=>'GET']) !!}
		@include('proyecto_venta.partials.FormBuscar')
	{!! Form::close() !!}

<div class="panel panel-info">
	<div class='panel-heading'>LISTA DE PROYECTOS <span class="badge badge-warning">@if(empty($request->id))TOTAL: {{$objetos->total()}}@endif</span></div>
		<div class='panel-body'>
			
	{!! Form::model(Request::all(),['route'=>'proyectoventa.descarga','method'=>'GET']) !!}
		@include('proyecto_venta.partials.Descargar')
	{!! Form::close() !!}
		<table border='0' class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Organización</th>
						<th>Fecha</th>
						<th>Agente</th>
						<th>Cliente</th>
						<th>Localidad</th>
						<th>Sucursal / Tipo</th>
						<th>Equipo</th>
						<th>Fecha Orden / Venta</th>
						<th>Estatus Credito</th>
						<th>Ganado / Perdido</th>
						<th>Razón</th>
						<th>Estatus</th>
						<th>Probabilidad</th>
						<th>Observaciones</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($objetos as $objeto)
					<?php
					$obj=json_decode($objeto->dato);
					?>
						<tr>
							<td>{{$objeto->id}}</td>
							<td>{{$objeto->organizacion}}</td>
							<td>{{$objeto->fecha_inicio}}</td>
							<td>{{$objeto->autor}}</td>
							<td>{{$objeto->nombre_cliente}}</td>
							<td>
								@if(!empty($objeto->ciudad))
									{{$objeto->r_ciudad->nombre}}
									{{$objeto->r_estado->nombre}}
								@endif
							</td>
							<td>{{$objeto->sucursal}} <br>{{$objeto->instituto}}</td>
							<td>{{$objeto->cantidad}} {{$objeto->equipo}} {{$objeto->modelo}}</td>
							<td>
								@if(!empty($obj->mes_orden))
									{{$obj->mes_orden}}
								@endif
								@if(!empty($objeto->fecha_atencion))
								/
									{{$objeto->fecha_atencion}}
								@endif
							</td>
							<td>{{$objeto->aprobado}}{{--'ESTATUS CREDITO'--}}</td>
							<td>
								@if(!empty($obj->dato))
									{{$obj->dato}}{{--'GANADO/PERDIDO'--}}
								@endif
							</td>
							<td>{{$objeto->nota}}</td>
							<td>{{$objeto->estatus}}
								@can('acceso','proyectoventa.estatus')
									{!! Form::model($objeto,['method'=>'PUT','action'=>['ProyectoVentaController@estatus',$objeto->id]]) !!}
						                    {!! Form::select('calificacion',[
						                    ''=>'',
						                    'REGISTRADO'=>'REGISTRADO',
						                    'CANCELADO'=>'CANCELADO',
						                    'ADUANA'=>'ADUANA',
						                    'INSTALACION'=>'INSTALACION',
						                    'FACTURACION'=>'FACTURACION',
						                    'PERDIDO'=>'PERDIDO',
						                    'MERCADO'=>'MERCADO',
						                    'OPORTUNIDAD'=>'OPORTUNIDAD',
						                    'PROSPECTO'=>'PROSPECTO',
						                    'RECONOCIDO'=>'RECONOCIDO',
						                    'LIBERADO'=>'LIBERADO',
						                    'EMBARCADO'=>'EMBARCADO',
						                    'FIRMADO'=>'FIRMADO',
						                    'ESPERANDO AREA'=>'ESPERANDO AREA',
						                    'DECISION CLIENTE'=>'DECISION CLIENTE',
						                    ],null,array('class'=>'form-control','style'=>'font-size:12px;color:red')) !!}
									        <button type="submit" class="btn btn-danger btn-sm" title="ACTUALIZAR ESTATUS"><i class="material-icons">refresh</i></button>
									{!!Form::close()!!}
								@endcan
							</td>
							<td>{{$objeto->complejidad_servicio}}{{--PROBABILIDAD--}}
								@can('acceso','proyectoventa.probabilidad')
									{!! Form::model($objeto,['method'=>'PUT','action'=>['ProyectoVentaController@probabilidad',$objeto->id]]) !!}
						                    {!! Form::select('calificacion',[
						                    ''=>'',
						                    '0'=>'0',
						                    '20'=>'20',
						                    '40'=>'40',
						                    '60'=>'60',
						                    '80'=>'80',
						                    '100'=>'100'
						                    ],null,array('class'=>'form-control','style'=>'font-size:12px;color:red')) !!}
									        <button type="submit" class="btn btn-primary btn-sm" title="ACTUALIZAR ESTATUS"><i class="material-icons">update</i></button>
									{!!Form::close()!!}
								@endcan
							</td>
							<td>			{{--'INICIO OBSERVACIONES'--}}
								@can('acceso','proyectoventa.observar')
								@if($objeto->estatus!='CANCELADO')
									{!! Form::model(['nombre_tipo'=>'PRO','observaciones'=>$objeto->observacion,'id_producto'=>$objeto->id],['method'=>'POST','action'=>['ProyectoVentaController@observar']]) !!}
		                    			@include('observaciones.partials.Form')
		                			{!! Form::close() !!}
		        			   @else
	        			           {!! Form::textarea('observaciones',$objeto->observacion,['readonly'=>'readonly','size'=>'10x1'])!!}
			        			   @endif
								@endcan		{{--FIN OBSERVACOINES--}}
							</td>
							<td>
								@if($objeto->editar())
									<a href="{{ route('proyectoventa.edit',$objeto->id)}}" type="button" class="btn btn-success btn-xs" title="EDITAR REGISTRO"><i class="material-icons">edit</i></a>
								@endif
								<a href="{{ route('proyectoventa.show',$objeto->id)}}" type="button" class="btn btn-success btn-xs" title="DETALLE DEL REGISTRO"><i class="material-icons">subject</i></a>
							</td>
							<td>
							{!! Form::model($objeto, ['route'=>['proyectoventa.destroy',$objeto->id],'method'=>'DELETE']) !!}
			                    <button type="submit" class="btn btn-warning btn-sm"><i class="material-icons">delete</i></button>
			                {!! Form::close() !!}
							</td>
						</tr>
						@endforeach
				</tbody>
		</table>
	</div>
		<div class="panel-footer">
			<button></button>
		</div>
</div>
@if(empty($request->id))
	{!! $objetos->appends($request->all())->render() !!}
@endif
@endsection

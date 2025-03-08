@extends('app')
@section('content')
	<div class="panel panel-info">
		<div class='panel-heading'>DETALLE PROYECTO</div>
		<div class='panel-body'>{{$objeto->CalificacionDetalle}}
			<p>Última actualizacion: {{$objeto->updated_at}}</p>
			<table border="0" class="table table-striped">
				<thead><tr>
							<th>Empresa</th>
							<th>Fecha</th>						
							<th>Autor</th>
							<th>Cliente</th>
							<th>Localidad</th>
							<th>Suc / Inst</th>
							<th>Equipo</th>
							<th>Estatus</th>
							<th>Fecha: Orden <br> Venta</th>
							<th>Probabilidad</th>
							<th>Estatus Credito</th>
							<th>Ganado Perdido</th>
							<th>Razón</th>
							<th>Termino Pago</th>
							<th>Orden Contrato</th>
							<th>Enganche</th>
							<th>Contraentrega</th>
							<th>No. pagos</th>
							<th>Observaciones</th>
						</tr></thead>
					<tbody>
					<?php
					$obj=json_decode($objeto->dato);
					?>
						<tr>
							<td>{{$objeto->organizacion}} </td>
							<td>{{$objeto->fecha_inicio}}</td>
							<td>{{$objeto->autor}}</td>
							<td>{{$objeto->nombre_cliente}}</td>
							<td>
								@if(!empty($objeto->ciudad))
									{{$objeto->r_estado->nombre}}
									{{$objeto->r_ciudad->nombre}}
								@endif
							</td>
							<td>{{$objeto->sucursal}} <br>{{$objeto->instituto}}</td>
							<td>{{$objeto->cantidad}} {{$objeto->equipo}} {{$objeto->modelo}}</td>
							<td>{{$objeto->estatus}}</td>
							<td>
								@if(!empty($obj->mes_orden))
									{{$obj->mes_orden}}
								@endif
								@if(!empty($obj->mes_venta)) <br>
									{{$obj->mes_venta}}
								@endif
							</td>
							<td>{{$objeto->complejidad_servicio}}{{--termino pago--}}</td>
							<td>{{$objeto->aprobado}}{{--'ESTATUS CREDITO'--}}</td>
							<td>
								@if(!empty($obj->dato))
									{{$obj->dato}}{{--'GANADO/PERDIDO'--}}
								@endif
							</td>
							<td>{{$objeto->nota}}</td>
							<td>{{$objeto->condicion_servicio}}</td>
							<td>{{$objeto->folio_contrato_venta}}{{--orden contrato--}}</td>
							<td>{{$objeto->modificable}}{{--enganche--}}</td>
							<td>{{$objeto->vigencia}}{{--contraentrega--}}</td>
							<td>{{$objeto->enviar_aviso}}{{--pagos mensuales--}}</td>
							<td>
								{{--'INICIO OBSERVACIONES'--}}
								@can('acceso','proyectoventa.observar')
								@if($objeto->estatus!='CANCELADO')
									{!! Form::model(['nombre_tipo'=>'PRO','observaciones'=>$objeto->observacion,'id_producto'=>$objeto->id],['method'=>'POST','action'=>['ProyectoVentaController@observar']]) !!}
		                    			@include('observaciones.partials.Form')
		                			{!! Form::close() !!}
		        			   @endif
								@endcan
								{{$objeto->observacionDetalle}}
								{{--FIN OBSERVACOINES--}}
							
							</td>
							<td>
							@can('acceso','proyectoventa.edit')
								@if($objeto->editar())
									<a href="{{ route('proyectoventa.edit',$objeto->id)}}" type="button" class="btn btn-success btn-xs" title="EDITAR REGISTRO"><i class="material-icons">edit</i></a>
								@endif
							@endcan
							@can('acceso','proyectoventa.edit')
								@if($objeto->editar())
									<a href="{{ route('mensualidad.create',['id'=>$objeto->id])}}" type="button" class="btn btn-success btn-xs" title="DETALLE DE MENSUALIDADES"><i class="material-icons">money</i></a>
								@endif
							@endcan
							</td>
						</tr>
					</tbody>
				</table>
				{{--!! link_to_route('mensualidad.create','MENSUALIDADES',['id'=>$objeto->id]) !!--}}
				<table class="table table-striped table-bordered table-list table-responsive">
				<tr>
					<td>MES</td>
					<td>AÑO</td>
					<td>MONTO</td>
				</tr>
				@foreach($objeto->mensualidades as $mes)
				<tr>
					<td>{{$mes->vigencia}}</td>
					<td>{{$mes->dato}}</td>
					<td>{{$mes->nota}}</td>
				</tr>
				@endforeach
			</table>
		</div>
		<div class="panel-footer"> </div>
		</div>
	</div>
@endsection
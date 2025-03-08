@extends('app')
@section('content')
{!! Form::model(Request::all(),['route'=>'ticket_operacion.index','method'=>'GET']) !!}
		@include('tickets_operaciones.partials.FormBuscar')
	{!! Form::close() !!}
<div class="panel panel-info">
		<div class='panel-heading panel-info' > LISTADO DE TICKET <span class="badge">TOTAL: {{$objetos->total()}}</span>{!! $objetos->appends($request->all())->render() !!}</div>
		<div class='panel-body'>
		<table border='0' class="table table-striped">
				<thead>
					<tr>
						<th>{!!util::lnkOr($request->all(),'id','folio')!!}</th>						
						<th>{!!util::lnkOr($request->all(),'Entrega','Entrega')!!}</th>						
						<th>RESPUESTAS</th>
						<th>{!!util::lnkOr($request->all(),'nombre','NOMBRE/TÍTULO')!!}</th>						
						<th>{!!util::lnkOr($request->all(),'created_at','CREACION')!!}</th>						
						<th>{!!util::lnkOr($request->all(),'prioridad','PRIORIDAD')!!}</th>						
						<th>{!!util::lnkOr($request->all(),'autor')!!}</th>
						<th>{!!util::lnkOr($request->all(),'modulo')!!}</th>
						<th>{!!util::lnkOr($request->all(),'estatus')!!}</th>
						<th>VER</th>
						<th>ENVIAR</th>
					</tr>
				</thead>
				<tbody>
					@foreach($objetos as $objeto)
						<tr>
							<td>{{$objeto->id}}</td>
							<td>{{$objeto->entrega}}</td>
							<td>{{count($objeto->hilos)}}</td>
							<td>
								{{$objeto->nombre}}</td>
							<td>
								{{$objeto->diasCorrientes($objeto->created_at)}}
							</td>
							<td>{{$objeto->prioridad}}</td>
							<td>{{$objeto->autor}}</td>
							<td>
								{{$objeto->modulo}}
							</td>
							<td>{{$objeto->estatus}}</td>
							<td>
								<a href="{{ route('ticket_operacion.edit', $objeto->id)}}" type="button" class="btn btn-primary btn-xs" title="CALENDARIO DE ACTIVIDADES"><i class="material-icons">date_range</i></a>
								<a href="{{ route('ticket_operacion.show', $objeto->id)}}" type="button" class="btn btn-primary btn-xs" title="REVISAR"><i class="material-icons">rate_review</i></a>
							</td>
							<td>{{--AVISOS--}}
									@if(count($aprobadores=BuscarUsuario::listUsuario('ticket_operacion.enviar'))>1)
						    	    	{!! Form::model( $aprobadores,['method'=>'PUT','action'=>['TicketController@enviar',$objeto->id]]) !!}
					    	    			@include('partials.FormEnvios')
							    	    {!! Form::close() !!}
						    	    @elseif(count($aprobadores)==1)
						    	    	{!! Form::model($objeto,['method'=>'PUT','action'=>['TicketOperacionController@enviar',$objeto->id]]) !!}
						    	    		@include('partials.FormEnviar')
							    	    {!! Form::close() !!}
						    	    @else
						    	    {{'AÚN NO HAY USUARIOS'}}
					    			@endif
							</td>
						
						</tr>
					@endforeach
				</tbody>
		</table>
	</div>
		<div class="panel-footer"> 
			{!! $objetos->appends($request->all())->render() !!}
		</div>
</div>
@endsection
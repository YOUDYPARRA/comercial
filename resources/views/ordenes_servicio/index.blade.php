@extends('app')
@section('content')
	{!! Form::model(Request::all(),['route'=>'ordenes_servicio.index','method'=>'GET']) !!}
		@include('ordenes_servicio.partials.BscOs')
	{!! Form::close() !!}
	<div class="panel panel-info">
	<div class='panel-heading panel-info' > LISTADO POR VALIDAR <span class="badge">TOTAL: {{$objetos->total()}}</span></div>	
	{!! $objetos->appends($request->all())->render() !!}
		<div class='panel-body'>
		<div style="height: 600px; overflow: scroll">
    		<table border=0 class="table table-striped"><thead>
    			<tr>					
					<th>{!!util::lnkOr($request->all(),'noordenservicio','NO. ORDEN')!!}</th>	
					<th>{!!util::lnkOr($request->all(),'cliente_nombre')!!}</th>	
					<th>{!!util::lnkOr($request->all(),'condicionprestamoservicio','servicio')!!}</th>	
					<th>{!!util::lnkOr($request->all(),'fecha')!!}</th>	
					<th>{!!util::lnkOr($request->all(),'serie')!!}</th>	
					<th>{!!util::lnkOr($request->all(),'equipo')!!}</th>
					<th>{!!util::lnkOr($request->all(),'marca')!!}</th>
					<th>{!!util::lnkOr($request->all(),'modelo')!!}</th>
					<th>{!!util::lnkOr($request->all(),'direccion')!!}</th>	
					<th>{!!util::lnkOr($request->all(),'ciudad')!!}</th>	
					<th>{!!util::lnkOr($request->all(),'codigo_postal')!!}</th>	
					<th>{!!util::lnkOr($request->all(),'estado')!!}</th>
					<th></th>
				</tr></thead>
    @foreach($objetos as $objeto)
        <tr>
			<td>{!! $objeto->noordenservicio!!}</td>
			<td>{!! $objeto->cliente_nombre!!}</td>
			<td>
				{!! $objeto->condicionprestamoservicio!!}
				{{$objeto->contrato}}
			</td>
			<td>{!! $objeto->fechaatencion!!}</td>
			<td>{!! $objeto->serie!!}</td>
			<td>{!! $objeto->equipo!!}</td>
			<td>{!! $objeto->marca!!}</td>
			<td>{!! $objeto->modelo!!}</td>
			<td>{!! $objeto->direccion!!}</td>
			<td>{!! $objeto->ciudad!!}</td>
			<td>{!! $objeto->codigo_postal!!}</td>
			<td>{!! $objeto->estado!!}</td>
			<td>
			@if(empty($objeto->maestro) )
					{!! link_to_route('ordenes_servicio.edit','VALIDAR',['id'=>$objeto->pk_orden_servicio]) !!}
				@else
					{!! link_to_route('expendios.index','VER CAPTURADO',['numero_serie'=>$objeto->maestro]) !!}
			@endif
			</td>
		</tr>
    @endforeach
</table>
</div>
</div>
<div class="panel-footer">
{!! $objetos->appends($request->all())->render() !!}
</div>
</div>
@endsection
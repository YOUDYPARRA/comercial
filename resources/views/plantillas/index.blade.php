@extends('app')
@section('content')
	<div class="panel panel-info">
		{!! $objetos->appends($request->all())->render() !!}
		<div class='panel-heading panel-info' > LISTADO PLANTILLAS <span class="badge">TOTAL: {{$objetos->total()}}</span></div>
		<div class='panel-body'>
		<div style="height: 600px; overflow: scroll">
    		<table border=0 class="table table-striped"><thead>
    			<tr>
					<th>{!!util::lnkOr($request->all(),'nombre')!!} </th>
					<th>{!!util::lnkOr($request->all(),'autor')!!} </th>
					<th>{!!util::lnkOr($request->all(),'clase')!!}</th>
					<th>{!!util::lnkOr($request->all(),'plantilla')!!}</th>	
					<th>OBSERVACIÓNES</th>
					<th></th>
					<th></th>
					<th></th>
				</tr></thead>
    @foreach($objetos as $objeto)
        <tr>
			<td>{!! $objeto->nombre!!}</td>
			<td>{!! $objeto->autor!!}</td>
			<td>{!! $objeto->clase!!}</td>
			<td>{!! $objeto->plantilla!!}</td>
			<td>{!! $objeto->observacion!!}</td>
			<td></td>
			<td></td>
			<td>
					<a href="{{ route('plantillas.edit', $objeto->id)}}" type="button" class="btn btn-warning btn-xs" title="ACTUALIZAR"><i class="material-icons">cached</i></a>
			@can('update',$objeto->id)
			@else
			{{'no se pudo actualizar'}}
			@endcan
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

@extends('app')
@section('content')
<h4><small>LISTADO </small></h4>
    <table border=1 class="table table-striped"><thead><tr><td>id</td>	
	<td>tipo_envio</td>	
	<td></td>	
	<td></td>	
</tr>
</thead>
    
@foreach($objetos as $objeto)
 <tr>
        <td>{!! $objeto->id!!}</td>	
		<td>{!! $objeto->tipo_envio!!}</td>
		<td>
			<a href="{{ route('modos_envios.edit', $objeto->id)}}" type="button" class="btn btn-warning"><i class="material-icons">cached</i></a>
		</td>
		<td>
			<a href="{{ route('modos_envios.show', $objeto->id)}}" type="button" class="btn btn-danger"><i class="material-icons">delete</i></a>
		</td>	
</tr>
@endforeach
</table>
@endsection

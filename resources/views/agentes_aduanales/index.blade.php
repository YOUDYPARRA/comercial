@extends('app')
@section('content')
<h4><small>LISTADO AGENTES ADUANALES </small></h4>
    <table border=1 class="table table-striped"><thead><tr>
    	<td>id</td>	
		<td>agente_aduanal</td>	
		<td>telefono</td>	
		<td>fax</td>	
		<td>email</td>	
		<td></td>	
		<td></td>	
</tr></thead>
    
    @foreach($objetos as $objeto)
        <tr><td>{!! $objeto->id!!}</td>	
<td>{!! $objeto->agente_aduanal!!}</td>	
<td>{!! $objeto->telefono!!}</td>	
<td>{!! $objeto->fax!!}</td>	
<td>{!! $objeto->email!!}</td>	
<td>
@can('acceso','agentes_aduanales.edit')
	<a href="{{ route('agentes_aduanales.edit', $objeto->id)}}" type="button" class="btn btn-warning"><i class="material-icons">cached</i></a>
@endcan
</td>
<td>
@can('acceso','agentes_aduanales.show')
	<a href="{{ route('agentes_aduanales.show', $objeto->id)}}" type="button" class="btn btn-danger"><i class="material-icons">delete</i></a>
@endcan
</td>
</tr>
    @endforeach
</table>
@endsection

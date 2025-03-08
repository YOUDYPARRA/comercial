@extends('app')
@section('content')
<h4><small>LISTADO AGENTES ADUANALES ELIMINADOS</small></h4>
    <table border=1 class="table table-striped"><thead><tr>
    	<td>id</td>	
		<td>agente_aduanal</td>	
		<td>telefono</td>	
		<td>fax</td>	
		<td>email</td>	
		<td></td>	
</tr></thead>
    
    @foreach($objetos as $objeto)
        <tr><td>{!! $objeto->id!!}</td>	
<td>{!! $objeto->agente_aduanal!!}</td>	
<td>{!! $objeto->telefono!!}</td>	
<td>{!! $objeto->fax!!}</td>	
<td>{!! $objeto->email!!}</td>	
<td>
	{!! Form::model($objeto, ['route'=>['agentes_aduanales.destroy',$objeto->id],'method'=>'DELETE']) !!}
                    <button type="submit" class="btn btn-raised btn-danger btn-lg"><i class="material-icons">restore</i></button>
                {!! Form::close() !!}
            </td>
</td>
</tr>
    @endforeach
</table>
@endsection

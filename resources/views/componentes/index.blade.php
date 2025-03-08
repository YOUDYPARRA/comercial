@extends('app')
@section('content')
<h4><small>LISTADO COMPONENTES PARA EQUIPOS</small></h4>
<h4><small> <a href="componentes/create">GENERAR NUEVO</a></small></h4>
    <table border=1 class="table table-striped"><thead><tr>
<td>#</td>	
<td>Linea</td>	
<td>Componente</td>
<td</td>
{{$objetos->render()}}

</tr></thead>
    
    @foreach($objetos as $objeto)
        <tr><td>{!! $objeto->id!!}</td>	
<td>{!! $objeto->linea!!}</td>	
<td>{!! $objeto->componente!!}</td>

@can('acceso','componentes.edit')
    <td><a href="{{ route('componentes.edit', $objeto->id)}}" type="button" class="btn btn-warning"><i class="material-icons">cached</i></a></td>	
@endcan
</tr>
    @endforeach
    {{$objetos->render()}}
{{$objetos->total()}}
</table>
@endsection

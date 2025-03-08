@extends('app')
@section('content')
@can('acceso','roles_usuarios.index')
<p>{!! link_to_route('roles_usuarios.index','ROL POR USUARIO') !!}</p>
  @endcan
<hr>
<h4><small>LISTADO </small></h4>
    <table border=1 class="table table-striped"><thead><tr><td>id</td>
<td>clase</td>
<td>condicion</td>
<td>condicionante</td>
<td>etiqueta</td>
<td>id_foraneo</td>
</tr></thead>

    @foreach($objetos as $objeto)
    <tr>
      <td>{!! $objeto->id!!}</td>
      <td>{!! $objeto->clase!!}</td>
      <td>{!! $objeto->condicion!!}</td>
      <td>{!! $objeto->condicionante!!}</td>
      <td>{!! $objeto->etiqueta!!}</td>
      <td>{!! $objeto->id_foraneo!!}</td>
   </tr>
    @endforeach
</table>
@endsection

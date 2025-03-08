@extends('app')
@section('content')
@can('acceso','roles_usuarios.create')
  <p>{!! link_to_route('roles_usuarios.create','CREAR ROL POR USUARIO') !!}</p>
@endcan
<hr>
<h4><small>LISTADO </small></h4>
    <table border=1 class="table table-striped"><thead>
<tr>
  <td>id</td>
  <td>ROL</td>
  <td>USUARIO</td>
</tr></thead>

    @foreach($objetos as $objeto)
        <tr>
          <td>{{$objeto->id}}</td>
          <td>{!! $objeto->id_rol!!} {{$objeto->rol->etiqueta}} {{$objeto->rol->condicion}} {{$objeto->rol->condicionante}} {!! link_to_route('roles_usuario.index','CONDICIONES',['id'=>$objeto->rol->id]) !!}</td>
          <td>{!! $objeto->id_usuario!!} {{$objeto->usuario->name}}</td>
          </tr>
    @endforeach
</table>
@endsection

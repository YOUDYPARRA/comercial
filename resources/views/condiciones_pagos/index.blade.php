@extends('app')
@section('content')
<h4><small>LISTADO </small></h4>
    <table border=1 class="table table-striped"><thead><tr><td>id</td>	
    <td>MARCA</td>	
    <td>ETIQUETA</td>	
    <td>INSTITUTO</td>	
    <td>CONDICIÓN</td>	
    <td>EDITAR</td>	
    <td>ELIMINAR</td>	
    </tr></thead>
    
    @foreach($objetos as $objeto)
        <tr>
            <td>{!! $objeto->id!!}</td>	
            <td>
                {!! $objeto->marca->nombre_proveedor!!}
            </td>	
            <td>{!! $objeto->etiqueta!!}</td>	
            <td>{!! $objeto->instituto!!}</td>	
            <td>{!! $objeto->condicion!!}</td>	
            <td>
            @can('acceso','condiciones_pagos.edit')
                <a href="{{ route('condiciones_pagos.edit', $objeto->id)}}" type="button" class="btn btn-warning"><i class="material-icons">cached</i></a>
            @endcan
            </td>
            <td>
            @can('acceso','condiciones_pagos.show')
                <a href="{{ route('condiciones_pagos.show', $objeto->id)}}" type="button" class="btn btn-danger"><i class="material-icons">delete</i></a>
            @endcan
            </td>


            </td>	
        </tr>
    @endforeach
</table>
@endsection

@extends('app')
@section('content')
<h4><small>LISTADO ELIMINADOS</small></h4>
    <table border=1 class="table table-striped"><thead><tr><td>id</td>	
<td>MARCA</td>	
<td>ETIQUETA</td>	
<td>INSTITUTO</td>	
<td>CONDICIÓN</td>	
<td>RESTAURAR</td>	
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
            {!! Form::model($objeto, ['route'=>['condiciones_pagos.destroy',$objeto->id],'method'=>'DELETE']) !!}
                    <button type="submit" class="btn btn-raised btn-danger btn-lg"><i class="material-icons">restore</i></button                         
                    
                {!! Form::close() !!}
            </td>


            </td>	
        </tr>
    @endforeach
</table>
@endsection

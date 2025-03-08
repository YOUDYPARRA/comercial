@extends('app')
@section('content')
@include('compras.partials.FormBuscar')
<h4><small>LISTADO ELIMINADOS </small></h4>
    <table border=1 class="table table-striped"><thead><tr><td>id</td>  
<td>Número orden</td>   
<td>Número cotización</td>  
<td>Tipo documento</td> 
<td>Vendedor</td>   
<td>Nombre_cliente</td> 
<td>Fecha pedido</td>   
<td>Fecha embarque</td> 
<td>Observaciónes</td>  
<td>Editar</td>
<td>Estatus</td>
<td>Pdf</td>
<td>Restaurar</td>
</tr></thead>
    
    @foreach($objetos as $objeto)
        <tr>
            <td>{!! $objeto->folio!!}</td>
            <td>{!! $objeto->numero_orden!!}</td>
            <td>{!! $objeto->tipo_archivo!!}</td>
            <td>{!! $objeto->nombre_tercero!!}</td>
            <td>-</td>
            <td>-</td>
            <td>{!! $objeto->fecha!!}</td>
            <td>{!! $objeto->fecha_embarque!!}</td>
            <td>
                   {!! Form::textarea('observaciones',$objeto->observacion,['readonly'=>'readonly','size'=>'10x1'])!!}
            </td><td>
            <td></td>
            <td>PDF</td>
            <td>            
            {!! Form::model($objeto, ['route'=>['compras.destroy',$objeto->id],'method'=>'DELETE']) !!}
                    <div class="panel-footer"> 
                        @can('acceso','compras.destroy')
                            <button type="submit" class="btn btn-raised btn-danger btn-lg"><i class="material-icons">restore</i></button>
                        @endcan
                    </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
</table>
@endsection


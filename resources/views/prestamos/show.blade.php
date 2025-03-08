@extends('app')
@section('content')
<h4><small>¿ELIMINAR REQUISICIÓN?: {!! $objeto->folio!!} , CON NÚMERO  {!! $objeto->folio !!}, PEDIDO {!!$objeto->prestamo->pedido!!}</small></h4>
    <table border=1 class="table table-striped"><thead>
            {!! Form::model($objeto, ['route'=>['prestamos.destroy',$objeto->id],'method'=>'DELETE']) !!}
                    <div class="panel-footer"> 
                        @can('acceso','prestamos.destroy')
                                <button type="submit" class="btn btn-raised btn-danger btn-lg"><i class="material-icons">delete</i></button>
                        @endcan
                    </div>
                {!! Form::close() !!}
            </td>   
        </tr>
    {{$objeto->observacion_detalle}}
    <tr>
        <td>ACTUALIZADO</td>
        <td>{{$objeto->updated_at}}</td>
    </tr>
    <tr>
    <td>CREADO</td>
        <td>{{$objeto->created_at}}</td>
    </tr>
</table>
@endsection
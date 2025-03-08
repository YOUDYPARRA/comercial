@extends('app')
@section('content')
<h4><small>¿ELIMINAR? ORDEN VENTA: {!! $objeto->folio!!} , CON NÚMERO DE ORDEN DE ORDEN VENTA {!! $objeto->folio !!}</small></h4>
    <table border=1 class="table table-striped"><thead>
            {!! Form::model($objeto, ['route'=>['ventas.destroy',$objeto->id],'method'=>'DELETE']) !!}
                    <div class="panel-footer"> 
                        @can('acceso','ventas.destroy')
                                            <button type="submit" class="btn btn-raised btn-danger btn-lg"><i class="material-icons">delete</i></button>
                        @endcan
                    </div>
                {!! Form::close() !!}
            </td>   
        </tr>
    {{$objeto->observaciones_detalle}}
</table>
@endsection




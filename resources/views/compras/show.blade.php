            @extends('app')
@section('content')
<h4><small>¿ELIMINAR? COMPRA: {!! $objeto->folio!!} , CON NÚMERO DE ORDEN DE COMPRA {!! $objeto->folio !!}</small></h4>
    <table border=1 class="table table-striped"><thead>
            {!! Form::model($objeto, ['route'=>['compras.destroy',$objeto->id],'method'=>'DELETE']) !!}
                    <div class="panel-footer"> 
                        @can('acceso','compras.destroy')
                                            <button type="submit" class="btn btn-raised btn-danger btn-lg"><i class="material-icons">delete</i></button>
                        @endcan
                    </div>
                {!! Form::close() !!}
            </td>   
        </tr>
    {{$objeto->observacion_detalle}}
</table>
@endsection




@extends('app')
@section('content')
<h4><small>¿ELIMINAR? UNIDAD MEDIDA: {!! $objeto->p_uom_type!!}</small></h4>
    <table border=1 class="table table-striped"><thead>
            {!! Form::model($objeto, ['route'=>['unidades_medidas.destroy',$objeto->id],'method'=>'DELETE']) !!}
                    <div class="panel-footer"> 
                        @can('acceso','unidades_medidas.destroy')
                            <button type="submit" class="btn btn-raised btn-danger btn-lg"><i class="material-icons">delete</i></button>
                        @endcan
                    </div>
                {!! Form::close() !!}
            </td>	
        </tr>
    
</table>
@endsection




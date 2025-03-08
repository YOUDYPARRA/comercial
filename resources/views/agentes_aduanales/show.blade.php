            @extends('app')
@section('content')
<h4><small>¿ELIMINAR? {!! $objeto->agente_aduanal!!} {!! $objeto->telefono!!} {!! $objeto->email!!}</small></h4>
    <table border=1 class="table table-striped"><thead>
            {!! Form::model($objeto, ['route'=>['agentes_aduanales.destroy',$objeto->id],'method'=>'DELETE']) !!}
                    <div class="panel-footer"> 
                    <tr>
			        </tr>
@can('acceso','agentes_aduanales.destroy')
                    <button type="submit" class="btn btn-raised btn-danger btn-lg"><i class="material-icons">delete</i></button>
@endcan
                    </div>
                {!! Form::close() !!}



            </td>	
        </tr>
    
</table>
@endsection




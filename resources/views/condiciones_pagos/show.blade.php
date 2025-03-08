            @extends('app')
@section('content')
<h4><small>¿ELIMINAR? {!! $objeto->etiqueta!!} {!! $objeto->instituto!!} {!! $objeto->condicion!!}</small></h4>
    <table border=1 class="table table-striped"><thead>
            {!! Form::model($objeto, ['route'=>['condiciones_pagos.destroy',$objeto->id],'method'=>'DELETE']) !!}
                    <div class="panel-footer"> 
                    <tr>
			            <td>{!! $objeto->id!!}</td>	
			            <td>
			                {!! $objeto->marca->nombre_proveedor!!}
			            </td>	
			            <td>{!! $objeto->etiqueta!!}</td>	
			            <td>{!! $objeto->instituto!!}</td>	
			            <td>{!! $objeto->condicion!!}</td>
			        </tr>
@can('acceso','condiciones_pagos.destroy')
                    <button type="submit" class="btn btn-raised btn-danger btn-lg"><i class="material-icons">delete</i></button>
@endcan
                    </div>
                {!! Form::close() !!}



            </td>	
        </tr>
    
</table>
@endsection




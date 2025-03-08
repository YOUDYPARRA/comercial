@extends('app')
@section('content')
<h4><small>¿ELIMINAR? {!! $objeto->tipo_envio!!}</small></h4>
    <table border=1 class="table table-striped"><thead>
            {!! Form::model($objeto, ['route'=>['modos_envios.destroy',$objeto->id],'method'=>'DELETE']) !!}
                    <div class="panel-footer"> 
                    <button type="submit" class="btn btn-raised btn-danger btn-lg"><i class="material-icons">delete</i></button 		 				
                    </div>
                {!! Form::close() !!}



            </td>	
        </tr>
    
</table>
@endsection




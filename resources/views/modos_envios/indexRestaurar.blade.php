@extends('app')
@section('content')
<h4><small>LISTADO ELIMINADOS</small></h4>
    <table border=1 class="table table-striped"><thead><tr><td>id</td>	
<td>TIPO</td>
<td>RESTAURAR</td>	
</tr></thead>
        <tr>
            <td>{!! $objeto->id!!}</td>	
            <td>{!! $objeto->tipo_envio!!}</td>	
            <td>
            {!! Form::model($objeto, ['route'=>['modos_envios.destroy',$objeto->id],'method'=>'DELETE']) !!}
                    <button type="submit" class="btn btn-raised btn-danger btn-lg"><i class="material-icons">restore</i></button>
                {!! Form::close() !!}
            </td>


            </td>	
        </tr>
    
</table>
@endsection

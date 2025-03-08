            @extends('app')
@section('content')
<h4><small>¿ELIMINAR PROGRAMACION CON REPORTE?: {!! $objeto->folio!!} , CON NÚMERO DE PROGRAMACION  {!! $objeto->folio !!}</small></h4>
    <table border=1 class="table table-striped"><thead>
        <tr>
             <td>
            {!! Form::model($objeto, ['route'=>['programaciones.destroy',$objeto->id],'method'=>'DELETE']) !!}
                    <div class="panel-footer">
                        @can('acceso','programaciones.destroy')
                                <button type="submit" class="btn btn-raised btn-danger btn-lg"><i class="material-icons">delete</i></button>
                        @endcan
                    </div>
                {!! Form::close() !!}
            </td>   
        </tr>
    <tr>
    <tr>

        <td>
        @foreach($objeto->personas_servicio as $atiende)
            {!! $atiende->iniciales !!}
            <br>
        @endforeach
        </td>
    </tr>
    
        <td>ACTUALIZADO</td>
        <td>{{$objeto->updated_at}}</td>
    </tr>
    <tr>
    <td>CREADO</td>
        <td>{{$objeto->created_at}}</td>
    </tr>
</table>
@endsection




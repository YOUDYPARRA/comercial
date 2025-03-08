@extends('app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-13 col-md-offset-0">
            <div class="panel panel-info">
                <div class="panel-heading">LISTA DE PROYECTOS. TOTAL:<span class="badge badge-info">{{ $objetos->total() }}</span></div>
                <div class="panel-body">
                {!! $objetos->render() !!}
    
                <table border=0 class="table table-striped">
                    <thead><tr>
                    <th>#</th>	
                    <th>CLASE</th>
                    <th>SUBCLASE</th>
                    <th>NOMBRE</th>
                    <th>Actualizar</th>
                    <th>Eliminar</th>

                    @foreach($objetos as $objeto)
                    <tr>
                        <td>{!! $objeto->id!!}</td>
                        <td>{!! $objeto->clase!!}</td>
                        <td>{!! $objeto->subclase!!}</td>
                        <td>{!! $objeto->nombre!!}</td>
                        <td>
                            <a href="{{ route('clasificacion.edit', $objeto->id)}}" type="button" class="btn btn-warning"><i class="material-icons">cached</i></a>
                        </td>
                        <td>
                            {!! Form::model($objeto, ['route'=>['clasificacion.destroy',$objeto->id],'method'=>'DELETE']) !!}
                            <button type="submit" class="btn btn-warning btn-lg"><i class="material-icons">delete</i></button>      
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

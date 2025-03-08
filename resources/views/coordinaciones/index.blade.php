@extends('app')
@section('content')
<h4><small>LISTADO COORDINACIONES</small></h4>
<div class="container">
    {!! $objetos->render() !!}
    <h4> Total: {{ $objetos->total() }}</h4>
        <table border=1 class="table table-striped">
            <thead>
                <tr>
                    <td>#</td>	
                    <td>nombre</td> 
                    <td>atributo</td>   
                    <td>coordinacion</td>   
                    <td>modelo</td>	
                </tr>
                <tr></tr>

            </thead>

        @foreach($objetos as $objeto)
            <tr>
                <td>{!! $objeto->id!!}</td>
                <td>{!! $objeto->nombre!!}</td>
                <td>{!! $objeto->atributo!!}</td>
                <td>{!! $objeto->coordinacion!!}</td>
                <td>{!! $objeto->modelo!!}</td>
            <td>
                {!! Form::model($objeto, ['route'=>['coordinaciones.destroy',$objeto->id],'method'=>'DELETE']) !!}
                    <div class="panel-footer"> 
                    <button type="submit" class="btn btn-raised btn-warning btn-lg"><i class="material-icons">delete</i>ELIMINAR</button> 		 				
                    </div>
                {!! Form::close() !!}

                <a href="{{ route('coordinaciones.edit', $objeto->id)}}" type="button" class="btn btn-warning"><i class="material-icons">cached</i></a>
            </td>
    </tr>
        @endforeach
    </table>
</div>
@endsection

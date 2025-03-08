@extends('app')
@section('content')
<h4><small>LISTADO</small></h4>
<div class="container">
    {!! $objetos->paginar !!}
    <h4> Total: {{ $objetos->total() }}</h4>
        <table border=1 class="table table-striped">
            <thead>
                <tr>
                    <td>NOMBRE</td>	
                </tr>
                <tr></tr>

            </thead>

        @foreach($objetos as $objeto)
            <tr>
                <td>{!! $objeto->menu!!}</td>
            <td>
                {!! Form::model($objeto, ['route'=>['productos.destroy',$objeto->id],'method'=>'DELETE']) !!}
                    <div class="panel-footer"> 
                    <button type="submit" class="btn btn-raised btn-warning btn-lg">Restaurar</button>	
                    </div>
                {!! Form::close() !!}
            </td>
    </tr>
        @endforeach
    </table>
</div>
@endsection

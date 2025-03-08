@extends('app')
@section('content')
<h4><small>LISTADO MENUS</small></h4>
<div class="container">
    {!! $objetos->render() !!}
    <h4> Total: {{ $objetos->total() }}</h4>
        <table border=1 class="table table-striped">
            <thead>
                <tr>
                    <td>#</td>	
                    <td>menu</td>	
                </tr>
                <tr></tr>

            </thead>

        @foreach($objetos as $objeto)
            <tr>
                <td>{!! $objeto->id!!}</td>
                <td>{!! $objeto->menu!!}</td>
            <td>
                {!! Form::model($objeto, ['route'=>['menus.destroy',$objeto->id],'method'=>'DELETE']) !!}
                    <div class="panel-footer"> 
                    <button type="submit" class="btn btn-raised btn-warning btn-lg"><i class="material-icons">delete</i>ELIMINAR</button> 		 				
                    </div>
                {!! Form::close() !!}

                <a href="{{ route('menus.edit', $objeto->id)}}" type="button" class="btn btn-warning"><i class="material-icons">cached</i></a>
            </td>
    </tr>
        @endforeach
    </table>
</div>
@endsection

@extends('app')
@section('content')
<div class='panel panel-default'>
    <div class='panel-heading'><i class='material-icons'>nombre_icono</i> EDITAR </div>
        {!! Form::model($objeto,['method'=>'PATCH','action'=>['roles_usuariosController@update',$objeto->id]]) !!}
                <div class='panel-body'>
                    <h4><small>EDITAR </small></h4>
                    @include('roles_usuarios.partials.Form')
                </div>
            <div class='panel-footer'>
                <button type='button' class='btn btn-warning btn-lg' ><i class='material-icons'>blur_on</i>BORRAR</button>
            </div>
        {!! Form::close() !!}
</div>
@endsection

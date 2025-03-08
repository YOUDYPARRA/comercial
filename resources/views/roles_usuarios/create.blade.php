@extends('app')
@section('content')
<div class='panel panel-default'>
<div class='panel-heading'><i class='material-icons'>nombre_icono</i> NUEVO </div>
    {!! Form::open(['route'=>'roles_usuarios.store']) !!}
        <div class='panel-body'>
            <h4>GENERAR NUEVO</h4>
            @include('roles_usuarios.partials.Form')
        </div>
        <div class='panel-footer'>
            {!! Form::submit('AGREGAR',array('class'=>'btn btn-primary')) !!}
        </div>
    {!! Form::close() !!}
</div>
@endsection

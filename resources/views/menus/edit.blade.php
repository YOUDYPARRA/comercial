@extends('app')
@section('content')
<div class='panel panel-default'>
    <div class='panel-heading'><i class='material-icons'>nombre_icono</i> EDITAR </div>
        {!! Form::model($objeto,['method'=>'PUT','action'=>['MenuController@update',$objeto->id]]) !!}
                <div class='panel-body'>
                    <h4><small>EDITAR </small></h4>
                    @include('menus.partials.Form')
                </div>
            <div class='panel-footer'> 
                {!! Form::submit('Guardar',array('class'=>'btn btn-primary')) !!}
            </div>
        {!! Form::close() !!}
</div>
@endsection

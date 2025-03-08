@extends('app')
@section('content')
<div class='panel panel-default'>
    <div class='panel-heading'><i class='material-icons'>nombre_icono</i> EDITAR ÉNVIO</div>
        {!! Form::model($objeto,['method'=>'PUT','action'=>['ModoEnvioController@update',$objeto->id]]) !!}
                <div class='panel-body'>
                    @include('modos_envios.partials.Form')
                </div>
            <div class='panel-footer'> 
                {!! Form::submit('GUARDAR',array('class'=>'button')) !!}
            </div>
        {!! Form::close() !!}
</div>
@endsection 

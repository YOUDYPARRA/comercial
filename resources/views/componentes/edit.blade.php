@extends('app')
@section('content')

<div class='panel panel-default'>
    <div class='panel-heading'><i class='material-icons'>nombre_icono</i> EDITAR CATEGORIA </div>
        {!! Form::model($objeto,['method'=>'PUT','action'=>['ComponenteController@update',$objeto->id]]) !!}
                <div class='panel-body'>
                    <h4><small>EDITAR </small></h4>
                    @include('componentes.partials.Form')
                </div>
            <div class='panel-footer'> 
                {!! Form::submit('ACEPTAR',array('class'=>'button')) !!}
            </div>
        {!! Form::close() !!}
</div>
@endsection

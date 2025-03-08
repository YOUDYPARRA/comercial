@extends('app')
@section('content')
<div class='panel panel-default'>
    <div class='panel-heading'><i class='material-icons'>nombre_icono</i> EDITAR </div>
        {!! Form::model($objeto,['method'=>'PUT','action'=>['RemisionController@update',$objeto->id]]) !!}
                <div class='panel-body'>
                    <h4><small>EDITAR </small></h4>
                    @include('remisiones.partials.Form')
                </div>
            <div class='panel-footer'> 
                <button type='button'>ACTUALIZAR</button> 
                {!! Form::submit('AGREGAR',array('class'=>'btn btn-primary')) !!}
            </div>
        {!! Form::close() !!}
</div>
@endsection

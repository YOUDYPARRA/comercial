@extends('app')
@section('content')
<div class='panel panel-default'>
    <div class='panel-heading'><i class='material-icons'>nombre_icono</i> EDITAR </div>
        {!! Form::model($objeto,['method'=>'PATCH','action'=>['AgenteAduanalController@update',$objeto->id]]) !!}
                <div class='panel-body'>
                    <h4><small>EDITAR </small></h4>
                    @include('agentes_aduanales.partials.Form')
                </div>
            <div class='panel-footer'> 
                {!! Form::submit('GUARDAR',array('class'=>'button')) !!}
            </div>
        {!! Form::close() !!}
</div>
@endsection

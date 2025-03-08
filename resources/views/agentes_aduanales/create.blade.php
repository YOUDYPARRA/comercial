@extends('app')
@section('content')
<div class='panel panel-default'>
<div class='panel-heading'><i class='material-icons'>nombre_icono</i> NUEVO AGENTE ADUANAL</div>
    {!! Form::open(['route'=>'agentes_aduanales.store']) !!}
        <div class='panel-body'>
            <h4>GENERAR NUEVO</h4>
            @include('agentes_aduanales.partials.Form')
        </div>
        <div class='panel-footer'> 
            {!! Form::submit('AGREGAR',array('class'=>'btn btn-primary')) !!}
        </div>
    {!! Form::close() !!}
</div>
@endsection

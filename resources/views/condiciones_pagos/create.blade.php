@extends('app')
@section('content')
<div class='panel panel-default' ng-controller="condicionPagoCtrl">
<div class='panel panel-heading'><i class='material-icons'>nombre_icono</i> NUEVA CONDICIÓN DE PAGO</div>
    
        <div class='panel panel-body'>
            @include('condiciones_pagos.partials.Form')
        </div>
    <div class='panel panel-footer'>
        {!! Form::submit('AGREGAR',['class'=>'btn btn-primary','ng-click'=>'guardar()']) !!}
        <span><%resul.msg%></span>
    </div>
    
</div>
@endsection

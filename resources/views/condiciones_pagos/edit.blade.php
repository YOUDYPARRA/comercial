@extends('app')
@section('content')
<div class='panel panel-default' ng-controller="condicionPagoCtrl">
    <div class='panel-heading' ng-init="objeto.id={{$objeto->id}}"><i class='material-icons'>nombre_icono</i> EDITAR </div>
        <div class='panel-body'>
            <h4><small>EDITAR CONDICION PAGO</small></h4>
            @include('condiciones_pagos.partials.Form')
        </div>
<div class='panel-footer'>
    {!! Form::submit('MODIFICAR',['class'=>'btn btn-primary','ng-click'=>'guardar()']) !!}
    <span><%resul.msg%></span>
</div>
</div>
@endsection

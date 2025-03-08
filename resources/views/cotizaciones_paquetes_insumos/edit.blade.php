@extends('app')
@section('content')
<div class="container">
    <h4><small>EDITAR OBJETO DE PROGRAMACION</small></h4>
        {!! Form::model($objeto,['method'=>'PUT','action'=>'CotizacionPaqueteInsumoController@update',$objeto->id]) !!}
            @include('cotizaciones_paquetes_insumos.partials.Form')
            {!! Form::submit('GUARDAR',array('class'=>'button')) !!}
            {!! Form::submit('VA ELIMINAR',array('class'=>'button')) !!}
        {!! Form::close() !!}
</div>

@endsection

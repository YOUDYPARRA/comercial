@extends('app')
@section('content')
<div class="container">
    <h4>GENERAR NUEVO</h4>
    {!! Form::open(['route'=>'cotizaciones_paquetes_insumos.store']) !!}
        @include('cotizaciones_paquetes_insumos.partials.Form')
        {!! Form::submit('AGREGAR',array('class'=>'btn btn-primary')) !!}
    {!! Form::close() !!}
</div>
@endsection

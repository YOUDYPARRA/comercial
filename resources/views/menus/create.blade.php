@extends('app')
@section('content')
<div class='panel panel-default'>
<div class='panel-heading'><i class='material-icons'>nombre_icono</i> NUEVO </div>
    {!! Form::open(['route'=>'menus.store']) !!}
        <div class='panel-body'>
            <h4>GENERAR NUEVO</h4>
            @include('menus.partials.Form')
        </div>
        <div class='panel-footer'> 
            <button type='button' class='btn btn-warning btn-lg' ng-click='' confirm='are you sure?'><i class='material-icons'>blur_on</i>BORRAR</button> 
            {!! Form::submit('AGREGAR',array('class'=>'btn btn-primary','ng-click'=>'')) !!}
        </div>
    {!! Form::close() !!}
</div>
@endsection

@extends('app')
@section('content')

{!! Form::model( $objeto,['method'=>'PUT','action'=>['ClasificacionOperacionController@update',$objeto->id]]) !!}
    @include('clasificaciones.partials.Form')
<div class='panel-footer'> 
    {!! Form::submit('AGREGAR',array('class'=>'btn btn-primary','ng-click'=>'')) !!}
</div>
    {!! Form::close() !!}
@endsection
@extends('app')
@section('content') 
<div class="container">
	<div class="row">
            {!! Form::model($objeto,['method'=>'PUT','action'=>['EstadoController@update',$objeto->id]]) !!}
                <div class="col-md-12 col-md-offset-0">
                    <div class="panel panel-default">
                            <div class='panel-heading'>EDITA</div>
                            <div class='panel-body'>
                                    @include('estados.partials.Form')
                                 {!! Form::submit('AGREGAR',array('class'=>'btn btn-primary')) !!}
                            </div>  
                            <div class="panel-footer"> 
                            </div>
                    </div>
                </div>                
            {!! Form::close() !!}
    </div>
</div>
@endsection

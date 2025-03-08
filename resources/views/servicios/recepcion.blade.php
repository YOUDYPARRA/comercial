@extends('app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
        <div class="panel panel-info">
        <div class='panel-heading'><i class='material-icons'>note_add</i> RECEPCION DE ORDEN DE SERVICIO. </div>
        <div class='panel-body'>
        {!! Form::model($objeto,['method'=>'PUT','action'=>['ServicioController@update',$objeto->id]]) !!}
        <div class="row">
	        <div class="col-md-2">
	              <div class="form-group has-info">

	                  <div class="form-group">
                          {!! Form::text('folio',null,['readonly'=>'readonly','required'=>'','class'=>'form-group','placeholder'=>'NÚMERO'])!!}
                      </div>
                  </div>
              </div>
              <div class="col-md-2">
                  <div class="form-group has-info">

                      <div class="form-group">
                          {!! Form::hidden('calificacion','RECEPCION',['readonly'=>'readonly','required'=>'','class'=>'form-group'])!!}
                        {!! Form::hidden('estatus','RECEPCION',['readonly'=>'readonly','required'=>'','class'=>'form-group'])!!}
                        {!! Form::hidden('persona[0]',auth()->user()->id,['readonly'=>'readonly','required'=>'','class'=>'form-group'])!!}
	                      {!! Form::hidden('fecha_recepcion',util::getHoy(),['readonly'=>'readonly','required'=>'','class'=>'form-group'])!!}
                        {!! Form::hidden('clase','S')!!}
	                  </div>
	              </div>
	          </div>
        	
        </div>

        </div>
        <div class='panel-footer'>    
	        {!! Form::submit('RECEPCION',array('class'=>'btn btn-primary','ng-click'=>'')) !!}
        </div>
            {!! Form::close() !!} 
        </div>
        
        </div>
    </div>
</div>
@endsection
@extends('app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
        <div class="panel panel-info">
        <div class='panel-heading'><i class='material-icons'>note_add</i> REGUARDO DE ORDEN DE SERVICIO. </div>
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
                        {!! Form::select('persona[0]', BuscarUsuario::getServicio(), auth()->user()->id,['class'=>'form-group']) !!}
	                      {!! Form::hidden('calificacion','RESGUARDO',['readonly'=>'readonly','required'=>'','class'=>'form-group'])!!}
                        {!! Form::hidden('estatus','RESGUARDO',['readonly'=>'readonly','required'=>'','class'=>'form-group'])!!}
                        {!! Form::hidden('resguardo','1',['readonly'=>'readonly','required'=>'','class'=>'form-group'])!!}
                        {!! Form::hidden('clase','resguardo')!!}
	                      
	                  </div>
	              </div>
	          </div>
        	
        </div>

        </div>
        <div class='panel-footer'>    
	        {!! Form::submit('GUARDAR',array('class'=>'btn btn-primary')) !!}
        </div>
            {!! Form::close() !!} 
        </div>
        
        </div>
    </div>
</div>
@endsection
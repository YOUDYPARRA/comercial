@extends('app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
        <div class="panel panel-info">
        <div class='panel-heading'><i class='material-icons'>note_add</i> GENERA Y RESGUARDA ORDEN DE SERVICIO. </div>
        <div class='panel-body'>
        {!! Form::open(['action'=>'ServicioController@store']) !!}
        <div class="row">
	        <div class="col-md-2">
	              <div class="form-group has-info">

	                  <div class="form-group">
	                      {!! Form::text('folio',null,['required'=>'','class'=>'form-group','placeholder'=>'NÚMERO'])!!}
	                  </div>
	              </div>
	          </div>
	          <div class="col-md-2">
	              <div class="form-group has-info">

	                  <div class="form-group">
	                      {!! Form::select('persona', BuscarUsuario::getServicio(), null,['class'=>'form-group']) !!}
                          {!! Form::hidden('clase','resguardo')!!}
	                  </div>
	              </div>
	          </div>
        	
        </div>

        </div>
        <div class='panel-footer'>    
	        {!! Form::submit('AGREGAR',array('class'=>'btn btn-primary','ng-click'=>'')) !!}
        </div>
            {!! Form::close() !!} 
        </div>
        
        </div>
    </div>
</div>
@endsection
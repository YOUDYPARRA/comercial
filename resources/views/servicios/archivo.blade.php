@extends('app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
        <div class="panel panel-info">
        <div class='panel-heading'><i class='material-icons'>note_add</i> REGISTRAR ARCHIVADO DE ORDEN DE SERVICIO. </div>
        <div class='panel-body'>
        {!! Form::model($objeto,['method'=>'PUT','action'=>['ServicioController@archivo',$objeto->id]]) !!}
        <div class="row">
	        <div class="col-md-2">
	              <div class="form-group has-info">

	                  <div class="form-group">
                      <label>FOLIO ARCHIVO</label>
                          {!! Form::text('folio',null,['readonly'=>'readonly','required'=>'','class'=>'form-group','placeholder'=>'NÚMERO'])!!}
                      </div>
                  </div>
              </div>
              <div class="col-md-2">
                  <div class="form-group has-info">

                      <div class="form-group">
                      <label>DESCRIPCION DE SITIO ARCHIVADO</label>
                        {!! Form::text('descripcion_archivado',null,['required'=>'','class'=>'form-group'])!!}
	                      
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
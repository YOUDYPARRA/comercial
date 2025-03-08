
        {!! Form::model($objeto,['method'=>'PUT','action'=>['ServicioController@update',$objeto->id]]) !!}
        <div class="row">
	        <div class="col-md-2">
          <button type="submit" class="btn btn-success btn-lg" title="VALIDAR"><i class="material-icons">assignment_turned_in</i></button>                          
                          {!! Form::hidden('validada','1',['readonly'=>'readonly','required'=>'','class'=>'form-group'])!!}
                          {!! Form::hidden('calificacion','VALIDADA',['readonly'=>'readonly','required'=>'','class'=>'form-group'])!!}
            </div>
        </div>

            {!! Form::close() !!} 
        
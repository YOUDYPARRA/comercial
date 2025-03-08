{!! Form::model($objeto,['method'=>'PUT','action'=>['OrdenController@update',$objeto->id]]) !!}
	<button type="submit" class="btn btn-primary btn-sm" title="COMPLETAR"><i class="material-icons">save</i></button>
{!! Form::close() !!}
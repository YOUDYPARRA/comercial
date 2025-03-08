{!! Form::open(['route'=>'ordenes.store']) !!}
	<button type="submit" class="btn btn-success btn-xs" title="PROCESAR COMPRA"><i class="material-icons">swap_vertical_circle</i></button>
	{!! Form::hidden('id',$objeto->id,array('class'=>'form-control')) !!}
	{!! Form::hidden('issotrx','N',array('class'=>'form-control')) !!}
{!! Form::close() !!}
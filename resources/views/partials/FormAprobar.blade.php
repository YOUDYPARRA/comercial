
@if($objeto->proceso)
	@if(is_array($objeto->procesos))
	<div class="form-group has-primary">
		{!! Form::select('calificacion',$objeto->procesos,null,array('class'=>'form-control','style'=>'font-size:14px;color:red')) !!}
		<button type="submit" class="btn btn-primary btn-lg" title="ACTUALIZAR ESTATUS"><i class="material-icons">done_all</i></button>
	</div>
	@endif
@elseif(auth()->user()->tipo_usuario=='ADMINISTRADOR')
	{!! Form::select('calificacion',util::estados(),null,array('class'=>'form-control','style'=>'font-size:14px;color:red')) !!}
	<button type="submit" class="btn btn-primary btn-lg" title="ACTUALIZAR ESTATUS"><i class="material-icons">done_all</i></button>
@endif

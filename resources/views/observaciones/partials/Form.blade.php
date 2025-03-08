<div ng-controller='NumeroAletraCtrl'>
<button type="button" class="btn btn-info btn-xs" ng-click="goCats = !goCats" title="VER OBSERVACIONES"><i class="material-icons">info</i></button>
	<div ng-show='goCats'>
{!! Form::textarea('observaciones',null,['readonly'=>'readonly','size'=>'15x2','style'=>'resize:both'])!!}
		
<br>
{!! Form::text('observacion',null,array('class'=>'form-control','placeholder'=>'Observacion')) !!}
    <button type="submit" class="btn btn-info btn-xs" title="GUARDAR MENSAJE"><i class="material-icons">message</i></button>
{!! Form::hidden('nombre_tipo',null,array('class'=>'form-control')) !!}
{!! Form::hidden('id_producto',null,array('class'=>'form-control')) !!}
	</div>
</div>
    	
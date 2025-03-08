@extends('app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-info" ng-controller="">
				<div class='panel-heading'>NUEVA CLASIFICACION OPERACION <span class="badge badge-warning"></span></div> 
    			<div class='panel-body'>
					{!! Form::open(['route'=>'clasificacion_operacion.store']) !!}
    					@include('clasificaciones_operaciones.partials.Form')
    			</div>
				<div class='panel-footer'> 
    				{!! Form::submit('AGREGAR NOMBRE PROYECTO',array('class'=>'btn btn-primary','ng-click'=>'')) !!}
				</div>
    			{!! Form::close() !!}
    		</div>
    	</div>
    </div>
</div>
@endsection
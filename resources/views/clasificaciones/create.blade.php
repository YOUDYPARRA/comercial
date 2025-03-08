@extends('app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-info" ng-controller="">
				<div class='panel-heading'>NUEVA CLASIFICACIÓN <span class="badge badge-warning"></span></div> 
    			<div class='panel-body'>
					{!! Form::open(['route'=>'clasificacion.store']) !!}
    				@include('clasificaciones.partials.Form')
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
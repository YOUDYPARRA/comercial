@extends('app')
@section('content') <!--  PAQUETES -->
<div class="container" ng-controller="PaqueteCtrl">
	<div class="row">
		<div class="col-md-12 col-md-offset-0">
			<div class="panel panel-default">
				<div class='panel-heading'>NUEVO PAQUETE</div>
				<div class='panel-body'>
        				@include('paquetes.partials.FormBuscar')
                              {!! Form::open(['route'=>'paquetes.store','method'=>'POST']) !!}
        				@include('paquetes.partials.FormInsumos')
    		    </div>
                <div class="panel-footer"> 
                    <button type="submit" class="btn btn-raised btn-info btn-lg" ng-click="alerta('SE GUARDARAN LOS DATOS')"><i class="material-icons">save</i> GUARDAR</button>
                </div>
                {!! Form::close() !!}
    		</div>
    	</div>
    </div>
</div>
@endsection

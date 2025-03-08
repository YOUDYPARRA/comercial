@extends('app')
@section('content')<!--  INSUMOS -->
<div class="container">

	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-info" ng-controller="InsumoOpcionalCtrl" ng-init="categoria_producto('*')">
				<div class='panel-heading'>NUEVO PRODUCTO <span class="badge badge-warning"></span></div> 
    			<div class='panel-body'>
    				{!! Form::open(['route'=>'insumos.store','name'=>'formProducto']) !!}
                        @include('insumos.partials.form')
        				{{--@include('insumos.partials.formGraphic')--}}
        		</div>
        		<div class="panel-footer"> 
       				<button type="submit" class="btn btn-raised btn-info btn-lg" ng-disabled="formProducto.$invalid"><i class="material-icons">save</i>GUARDAR</button>
    				{!! Form::close() !!}
    			</div>	
    		</div>
    	</div>
    </div>

</div>
@endsection

@extends('app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-13 col-md-offset-0">
			<div class="panel panel-default" ng-controller="InsumoOpcionalCtrl">
				<div class="panel-heading">INSUMOS</div>
				<div class="panel-body">
        @include('insumos.partials.FormInsumosOpcionalesIndex')
				<!--  <h1>ola</h1>-->
        @include('insumos.partials.FormInsumosOpcionales')

				</div>				<!-- div BODY -->
				<div class="panel-footer"> 
            <button type="button" class="btn btn-raised btn btn-info" ng-click="guardar();" ><i class="material-icons">save</i> GUARDAR</button>
            <button type="button" class="btn btn btn-info" ng-click="buscar({bandera_insumo:'E'})" title="ACTUALIZAR DATOS"><i class="material-icons">loop</i></button>
            <a type="button" class="btn btn btn-info" href="{{ route('insumos.create') }}" title="AGREGAR INSUMOS"><i class="material-icons">add_to_queue</i></a>
				</div>

			</div>
		</div>
	</div>
</div>
@endsection

@extends('app')
@section('content')
<div class="container">	<!-- INSUMOS -->
    <div class="row">
        @if (count($errors) > 0)
        @endif
    </div>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-info" ng-controller="InsumoOpcionalCtrl" ng-init="editProducto({{$insumo}});categoria_producto('*')">
				<div class='panel-heading'>EDITAR PRODUCTO: {{$insumo->codigo_proovedor}}</div>
				<div class="panel-body">
        			{!! Form::model($insumo, ['route'=>['insumos.update',$insumo->id],'method'=>'PUT','name'=>'formProducto']) !!}
                       @include('insumos.partials.form')
				</div>
				<div class="panel-footer"> 
					<button type="submit" class="btn btn-raised btn-info btn-lg" ng-disabled="formProducto.$invalid"><i class="material-icons">cached</i>ACTUALIZAR</button> 		 				
				</div>
					{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection

@extends('app')

@section('content')
<div class="container">		<!-- INSUMOS -->
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class='panel-heading'>ELIMINAR INSUMO: {{$insumo->tipo_equipo}}, {{$insumo->codigo_proovedor}}</div>
                            <div class='panel-body'>
                            {!! Form::model($insumo, ['route'=>['insumos.destroy',$insumo->id],'method'=>'DELETE']) !!}


                            </div>
                            @can('acceso','insumos.destroy')
                                <div class="panel-footer" ng-controller="datosCliente"> 
                                    <button type="submit" class="btn btn-raised btn-warning btn-lg"><i class="material-icons">delete</i>ELIMINAR</button> 		 				
                                </div>
                            @endcan
                            {!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection

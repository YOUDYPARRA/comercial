@extends('app')

@section('content')
<div class="container">		<!-- INSUMOS -->
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class='panel-heading'>ELIMINAR PAQUETE: {{ $paquetes[0]->id_pack }} - {{ $paquetes[0]->codigo_proovedor }}</div>
					<div class='panel-body'>
        				{!! Form::model($paquetes, ['route'=>['paquetes.destroy',$paquetes[0]->id_pack],'method'=>'DELETE']) !!}
        				<!-- <input type="text" value="0" name="vista" /> -->
        				<!-- <input type="text"  name="id" /> -->
        			</div>
					<div class="panel-footer" ng-controller="datosCliente"> 
						<button type="submit" class="btn btn-raised btn-warning btn-lg"><i class="material-icons">delete</i>ELIMINAR</button> 		 				
					</div>
					{!! Form::close() 	!!}
			</div>
		</div>
	</div>
</div>
@endsection

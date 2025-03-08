@extends('app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-13 col-md-offset-0">
			<div class="panel panel-default">
				<div class="panel-heading">INSUMOS ELIMINADOS</div>
				<div class="panel-body">
					<p>TOTAL INSUMOS ELIMINADOS: {{ $objetos->total()}}</p>
			    	<table border="0" class="table table-striped table-condensed">
						<thead>
							<tr>
								<!-- <th>id</th>	 -->
								<th>#</th>	
								<th>Código</td>	
								<th>Tipo equipo</th>	
								<th>Marca</th>	
								<th>Modelo</th>	
								<th>Descripción</th>	
								<th>Características</th>	
								<th>Especificaciones</th>	
								<th>Precio</th>	
								<th>Costo</th>	
								<th>Unidad medida</th>	
								<th>Tipo cambio</th>	
								<th></th>	
								<th></th>	
							</tr>
						</thead>
							@foreach($objetos as $objeto)
							<tr>
								<!-- <td>{!! $objeto->id!!}</td>	 -->
								<td>{!! $objeto->bandera_insumo!!}</td>	
								<td>{!! $objeto->codigo_proovedor!!}</td>	
								<td>{!! $objeto->tipo_equipo!!}</td>	
								<td>{!! $objeto->marca!!}</td>	
								<td>{!! $objeto->modelo!!}</td>	
								<td>{!! $objeto->descripcion!!}</td>	
								<td>{!! $objeto->caracteristicas!!}</td>	
								<td>{!! $objeto->especificaciones!!}</td>	
								<td>{!! $objeto->precio!!}</td>	
								<td>{!! $objeto->costos!!}</td>	
								<td>{!! $objeto->unidad_medida!!}</td>	
								<td>{!! $objeto->tipo_cambio!!}</td>
								<td></td>
								<td>
				        				{!! Form::model($objeto, ['route'=>['insumos.destroy',$objeto->id],'method'=>'DELETE']) !!}
				        					<div class="panel-footer" ng-controller="datosCliente"> 
												<button type="submit" class="btn btn-raised btn-warning btn-lg"><i class="material-icons">settings_backup_restore</i>RESTAURAR</button> 		 				
											</div>
									{!! Form::close() !!}
								</td>		
								<!-- <td>{!! $objeto->estado!!}</td> -->	
							</tr>
 							@endforeach
					</table>
					{!! $objetos->paginado !!}
				</div>				
			</div>
		</div>
	</div>
</div>
@endsection

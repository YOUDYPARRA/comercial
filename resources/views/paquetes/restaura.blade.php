@extends('app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-13 col-md-offset-0">
			<div class="panel panel-default">
				<div class="panel-heading">PAQUETES ELIMINADOS</div>
				<div class="panel-body" ng-controller="equipoCtr">
					<!-- <p>Equipos: {{ $objetos->total()}}</p> -->
			    	<table border="0" class="table table-striped table-condensed">
						<tr>
							<th>Paquete</th>	 
							<th></th>	
							<th>B</th>	
							<th>Código</td>	
							<th>Tipo equipo</th>	
							<th>Marca</th>	
							<th>Modelo</th>	
							<!-- <th>Descripcion</th>	 -->					<!-- <th>Caracteristicas</th> -->	
							<th>Especificaciones</th>
							<!--<th></th>	-->
							<th></th>	
						</tr> <!-- ok-->

						@foreach($objetos as $objeto)
						<tr>
									<td>{{$objeto->id_pack}}</td>
							@foreach($objeto['insumos'] as $insumo)
								@if(trim($insumo->bandera_insumo)=="E")
									<td><a href="" class="btn btn-info btn-fab-mini"><i class="material-icons">desktop_mac</i></a></td>
								@else
									<td align="right"><i class="material-icons">keyboard</i></td>
								@endif
									<td>{{$insumo->bandera_insumo}}</td>
									<td>{{$insumo->codigo_proovedor}}</td>
									<td>{{$insumo->tipo_equipo}}</td>
									<td>{{$insumo->marca}}</td>
									<td>{{$insumo->modelo}}</td>
							
							@endforeach
							<td></td>
							<td></td>
							<td>
								
				        			{!! Form::model($objeto, ['route'=>['paquetes.destroy',$objeto->id_pack],'method'=>'DELETE']) !!}
				        				<div class="panel-footer" ng-controller="datosCliente"> 
										<button type="submit" class="btn btn-raised btn-warning btn-lg"><i class="material-icons">settings_backup_restore</i>RESTAURAR</button> 		 				
										</div>
									{!! Form::close() !!}
							</td>
						</tr>						
						@endforeach
					</table>
					{!! $objetos->paginado !!}
				</div>
				<div class="panel-footer"> 
		 			<a type="button" class="btn btn-raised btn btn-info" href="{{ route('paquetes.create') }}"><i class="material-icons">person_add</i> AGREGAR</a>
				</div>
			</div>		<!-- PANEL -->
		</div>	<!-- OFFSET -->
	</div> 	<!-- ROW	-->
</div> 		<!-- CONTAINER 	-->
@endsection
<!-- @foreach($objetos as $objeto)
<tr>
	<td>{!! $objeto->id!!}</td>	
	<td>{!! $objeto->id_equipo!!}</td>	
	<td>{!! $objeto->id_refaccion!!}</td>	
	<td>{!! $objeto->bandera_insumo!!}</td>	
</tr>
    @endforeach -->
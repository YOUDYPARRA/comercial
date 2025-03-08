@extends('app')

@section('content')
<div class="container">										<!-- USUARIOS  -->
	<div class="row">
		<div class="col-md-11 col-md-offset-0">
			<div class="panel panel-default">
				<div class='panel-heading'>Cotizaciones Eliminadas</div>
					
					<div class='panel-body'>
					<p>Hay {{ $cotizaciones->total() }} Cotizacion (es) eliminadas</p>
					<br>
					{{ $cotizaciones->paginado }}
    <table border='0' class="table table-striped"><thead>
<tr>
<th>Numero cotizacion</th>	
<th>Fecha</th>	
<th>Elaborado por.</th>	
<th>Estado</th>	
<th>Cliente</th>	
<th>Total</th>	
<th>Moneda</th>	
<!--<th>Equipos</th>	-->
</tr></thead>
@foreach($cotizaciones as $cotizacion)
<tr>
	       	<td> {!! $cotizacion->numero_cotizacion !!} </td>
        	<td> {!! $cotizacion->fecha !!} </td>
        	<td> {!! $cotizacion->nombre_empleado !!} </td>
        	<td> {!! $cotizacion->estatus !!} </td>
        	<td> {!! $cotizacion->nombre_fiscal !!} </td>
        	<td> {!! $cotizacion->total !!} </td>
        	<td> {!! $cotizacion->tipo_moneda !!} </td>
			
			<td>
				        				{!! Form::model($cotizacion, ['route'=>['cotizaciones.destroy',$cotizacion->id],'method'=>'DELETE']) !!}
				        					<div class="panel-footer" ng-controller="datosCliente"> 
												<button type="submit" class="btn btn-raised btn-warning btn-lg"><i class="material-icons">settings_backup_restore</i>RESTAURAR</button> 		 				
											</div>
									{!! Form::close() !!}
			</td>
			<td></td>
			<td></td>
</tr>
@endforeach

</table>

					</div>
					<div class="panel-footer" ng-controller="datosCliente"> 
		 				<a type="button" class="btn btn-raised btn btn-info" href="{{ route('cotizaciones.create') }}"><i class="material-icons">note_add</i> AGREGAR</a>
					</div>
			</div>
		</div>
	</div>
</div>
@endsection

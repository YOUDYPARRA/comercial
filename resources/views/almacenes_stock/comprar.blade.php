@extends('app')
@section('content')
@include('almacenes_stock.partials.FormBuscar')
	<div class="panel panel-info">
		<div class='panel-heading panel-info' > LISTADO ORDENES DE COMPRA <span class="badge">TOTAL: {{$objetos->total()}}</span></div>
		<div class='panel-body'>
			<table border="0" class="table table-striped table-list table-responsive">
				<thead>
					<tr>
						<th>#</th>
						<th>CODIGO PROVEEDOR</th>
						<th>VENTA MENSUAL (U.VENTA)</th>						
						<th>VENTA TRES MESES (U.VENTA)</th>
						<th>ALMACEN/ORGANIZACION</th>
						<th>EXISTENCIAS</th>
						{{--<th>CONFIGURA % SEGURIDAD</th>--}}
						{{--<th>% ALMACEN ACTUAL</th>--}}
						<th>PEDIR MAXIMO (U. VENTA)</th>
						<th>PEDIDO MAXIMO (U.COMPRA)</th>
						<th>ELIMINAR</th>
					</tr>
				</thead>
				<tbody>
					@foreach($objetos as $objeto)
						<tr>
							<td>{{$objeto->id}}</td>
							<td>{{$objeto->codigo_proovedor}}</td>
							<td>{{$objeto->punto_pedido}}</td>
							<td>{{$objeto->maximo}}{{--CANT VTA. TRES MESES--}}</td>
							<td>{{$objeto->almacen}}/{{$objeto->org_name}}</td>
							<td>{{$objeto->existencia}}</td>
							{{--<td>$objeto->porcentaje_seguridad</td>--}}
							{{--<td>{{$objeto->calcular}}</td>--}}{{--%ALMACEN ACTUAL--}}
							<td>{{$objeto->cantidad_venta}}{{--PEDIR U.VENT.--}}</td>
							<td>{{$objeto->cantidad_compra}}</td>{{--PEDIR U.COMPR.--}}
							<td>
							{!! Form::model($objeto, ['route'=>['pendiente_stock.destroy',$objeto->id],'method'=>'DELETE']) !!}
			                    <button type="submit" class="btn btn-warning btn-lg"><i class="material-icons">delete</i></button>
			                {!! Form::close() !!}
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="panel-footer"> 
			{!! $objetos->render() !!}
		</div>
	</div>
@endsection
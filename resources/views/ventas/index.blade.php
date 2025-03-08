@extends('app')
@section('content')
@can('acceso','ventas.index')
	{!! Form::model(Request::all(),['route'=>'ventas.index','method'=>'GET']) !!}
@else
	{!! Form::model(Request::all(),['route'=>'ventas.enviado','method'=>'GET']) !!}
@endcan
	@include('ventas.partials.FormBuscar')
{!! Form::close() !!}
	<div class="panel panel-info">
		<div class='panel-heading panel-info' > LISTADO ORDENES DE VENTA <span class="badge">TOTAL: {{$objetos->total()}}</span></div>
		<div class='panel-body'>
    		<table border=0 class="table table-striped"><thead>
    		<tr>
    			<th>Organización</th>
    			<th>No. Folio / Folio Financiero</th>
    			<th>No. cotización</th>
				<th>Autor</th>
				<th>Cliente</th>
    			<th>Fecha orden venta</th>
				<th>Fecha entrega</th>
				<th>Estatus</th>
				<th># Contrato</th>
				<th></th>	{{--Observaciones--}}
    			<th></th>
    			<th></th>
				<th></th>
				<th></th>
				<th></th><!--orden de venta-->
			</tr></thead>
    		@foreach($objetos as $objeto)
        	<tr>
        		@if($objeto->org_id=='0FBFA429EE1F41C3B2C43C832212895E')
        			<td> SMH </td>
        		@else
        			<td> IMS </td>
        		@endif
        		<td>{!! $objeto->folio!!} {{$objeto->folioOrden()}}</td>
        		<td>{!! $objeto->numero_cotizacion!!}</td>
        		<td>{!! $objeto->autor!!}</td>
        		<td>{!! $objeto->nombre_fiscal!!}</td>
        		<td>{!! $objeto->fecha!!}</td>
        		<td>{!! $objeto->fecha_entrega!!}</td>
        		<td>{!! $objeto->estatus!!}</td>
        		<td>{!! $objeto->numero_contrato!!}</td>
				<td>{{-- 1 --}}
					@can('acceso','ventas.observar')
						@include('ventas.partials.FormObservar')
					@endcan
				</td>
				<td>{{-- 2 --}}
					@can('acceso','ventas.edit')
						@if($objeto->estatus=='GUARDADO')
							<a href="{{ route('ventas.edit', $objeto->id)}}" type="button" class="btn btn-warning btn-xs" title="ACTUALIZAR ORDEN VENTA"><i class="material-icons">cached</i></a>
							@endif
					@endcan
				</td>
				<td>{{-- 3 --}}
					@can('acceso','ventas.estatus')
						@if(empty($objeto->deleted_at))
							@if($objeto->estatus=='GUARDADO' && util::getSitio()=='ventas')
								@include('ventas.partials.FormEnviar')
							@endif
						@endif
						@can('acceso','ventas.enviado')
							@if($objeto->estatus=='ENVIADO')
								@include('ventas.partials.FormAprobar')
							@endif
						@endcan
					@endcan
				</td>
				<td>{{-- 4 --}}
					@can('acceso','ventas.show')
						<button type="button" class="btn btn-info btn-xs" ng-controller="CompraPdfCtrl" ng-click="openOrdenVenta({{$objeto->id}},'cp')" title="VER ORDEN VENTA"><i class="material-icons">picture_as_pdf</i></button>
					@else
						<button type="button" class="btn btn-info btn-xs" ng-controller="CompraPdfCtrl" ng-click="openOrdenVenta({{$objeto->id}},'sp')" title="VER ORDEN VENTA SIN PRECIOS"><i class="material-icons">picture_as_pdf</i></button>
					@endcan
					@can('acceso','remisiones.digitalizarcotizacion')
						@if(empty($objeto->deleted_at))
							@if($objeto->digitalizacion)
								<a href="{{ route('compras.digital',$objeto->id)}}" type="button" class="btn btn-primary btn-xs" title="VER ARCHIVO"><i class="material-icons">cloud_download</i></a>
							@else
								<a href="{{ route('remisiones.digitalizarcotizacion', $objeto->id)}}" type="button" class="btn btn-danger btn-xs" title="DIGITALIZAR REMISION"><i class="material-icons">cloud_upload</i></a>
							@endif
						@endif
					@endcan
				</td>
				<td>{{-- 5 --}}
					@can('acceso','ventas.observar')
						@if($objeto->deleted_at)
							@include('ventas.partials.FormRestaurar');
						@endif
					@endcan
					@can('acceso','ventas.show')
							@if(empty($objeto->deleted_at))
								<a href="{{ route('ventas.show', $objeto->id)}}" type="button" class="btn btn-danger btn-xs" title="CANCELAR REGISTRO"><i class="material-icons">delete</i></a>
						@endif
					@endcan
				</td>
				<td>{{-- 6 --}}
					@can('acceso','ordenes.store')
						@if( ( ($objeto->estatus != "CERRADO") && ($objeto->estatus != "COMPLETADO") )&& ( ($objeto->estatus != "CANCELADO") ) )
							@include('ventas.partials.FormApi')
						@endif
						@if($objeto->estatus == "CERRADO" )
							@include('partials.FormApiRegistrar')
						@endif
					@endcan
					@can('acceso','calificaciones.show')
						{!! link_to_route('calificaciones.show','Detalle',['id'=>$objeto->id,'clase'=>'venta']) !!}
					@endcan
				</td>
			</tr>
    		@endforeach
		</table>
	</div>
	<div class="panel-footer">
	</div>
</div>
@endsection

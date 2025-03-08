@extends('app')
@section('content')
@include('compras.partials.FormBuscar')
	<div class="panel panel-info">
		<div class='panel-heading panel-info' >LISTADO DE ORDENES DE COMPRA(s): <span class="badge">TOTAL: {{ $objetos->total() }}</span></div>
		<div class='panel-body'>
		    <table border=0 class="table table-striped"><thead>
    		<tr>
				<th>No. Folio</th>
				<th>No. cotización</th><!--<th>Autor</th>-->
				<th>Cliente</th>
				<th>Proovedor</th>
				<th>Fecha pedido</th>
				<th>Fecha embarque</th>
				<th>Fecha entrega</th>
				<th>Estatus</th>
				<th>Observaciónes</th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
			</tr></thead>
    @foreach($objetos as $objeto)
        <tr>
			<td>{!! $objeto->folio!!}</td>
			<td>{!! $objeto->numero_cotizacion!!}</td>
			<td>{!! $objeto->nombre_fiscal!!}</td>
			<td>{!! $objeto->nombre_tercero!!}</td>
			<td>{!! $objeto->fecha!!}</td>
			<td>{!! $objeto->fecha_embarque!!}</td>
			<td>{!! $objeto->fecha_entrega!!}</td>
			<td>{!! $objeto->estatus!!}</td>
			<td>
			@can('acceso','compras.observar')
				@if($objeto->estatus!='CANCELADO')
					@include('compras.partials.FormObservar')
	            @else
	                    {!! Form::textarea('observaciones',$objeto->observacion,['readonly'=>'readonly','size'=>'10x1'])!!}
	            @endif
			@endcan
			</td>
			<td>
				@can('acceso','compras.edit')
					@if( ($objeto->estatus=='GUARDADO')||($objeto->estatus=='DESAPROBADO') ||($objeto->estatus=='APROBADO') ||($objeto->estatus=='ENVIADO') )
						<a href="{{ route('compras.edit', $objeto->id)}}" type="button" class="btn btn-warning btn-xs" title="ACTUALIZAR ORDEN COMPRA"><i class="material-icons">cached</i></a></td>
					@endif
				@endcan
			<td>
				@can('acceso','compras.estatus')
					@if($objeto->estatus=='ENVIADO')
						@include('compras.partials.estatus.FormAprobar')
					@endif
				@endcan
			</td>
			<td>
				<button type="button" class="btn btn-info btn-xs" ng-controller="CompraPdfCtrl" ng-click="openOrdenCompra({{$objeto->id}},'cp')" title="VER ORDEN COMPRA"><i class="material-icons">picture_as_pdf</i></button>
			</td>
			<td>
			@can('acceso','compras.show')
				@if($objeto->estatus=='GUARDADO')
					<a href="{{ route('compras.show', $objeto->id)}}" type="button" class="btn btn-danger btn-xs"><i class="material-icons">delete</i></a>
				@endif
			@endcan
			</td>
			<td>
				@if($objeto->digitalizacion)
					@can('acceso','compras.digital')
						<a href="{{ route('compras.digital',$objeto->id)}}" type="button" class="btn btn-warning btn-xs" title="VER ARCHIVO"><i class="material-icons">cloud_download</i></a>
					@endcan
				@else
					@can('acceso','compras.digitalizar')
							<a href="/compras/digitalizar/{{$objeto->id}}" type="button" class="btn btn-primary btn-xs" title="SUBIR ARCHIVO"><i class="material-icons">cloud_upload</i></a>
					@endcan
				@endif
			</td>
		</tr>
    @endforeach
</table>
</div>
<div class="panel-footer">
<button></button>
</div>
</div>
@endsection

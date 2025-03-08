@extends('app')
@section('content')
@include('compras.partials.FormBuscar')
	<div class="panel panel-info">
		<div class='panel-heading panel-info'> LISTADO ORDENES DE COMPRA <span class="badge">TOTAL: {{$objetos->total()}}</span></div>
		<div class='panel-body'>
    		<table border=0 class="table table-striped"><thead>
    		<tr>
				<th>Organizaccion</th>	<!--<th>Documento</th>	-->
				<th>{!!util::lnkOr($request->all()+['buscar'=>'1'],'numero_cotizacion','Folio')!!}</th>	<!--<th>Documento</th>	-->
				<th>{{'Folio Financiero'}}</th>
				<th>Versión</th>	<!--<th>Documento</th>	-->
				<th>Cotización</th>	<!--<th>Documento</th>	-->
				<th>Autor</th>
				<th>{!!util::lnkOr($request->all()+['buscar'=>'1'],'nombre_tercero','Proovedor')!!}</th>
				<th>Fecha pedido</th>
				<th>Fecha embarque</th>
				<th>Fecha entrega</th>
				<th>Estatus</th>
				<th># Contrato</th>
				<th>Observaciónes</th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
			</tr></thead>
    		@foreach($objetos as $objeto)
        	<tr>
				<td>{!! $objeto->org_name!!}</td>
				<td>{!! $objeto->folio!!} {!! $objeto->id_camp_publ!!}</td>
				<td>{{$objeto->folioOrden()}}</td>
				<td>@if($objeto->version > 0)
					{!! $objeto->version!!}
					@else
					@endif
				</td>
				<td>{!! $objeto->numero_cotizacion!!}</td>						<!--<td>{!! $objeto->tipo_archivo!!}</td>-->
				<td>{!! $objeto->autor!!}</td>
				<td>{!! $objeto->nombre_tercero!!}</td>
				<td>{!! $objeto->fecha!!}</td>
				<td>{!! $objeto->fecha_embarque!!}</td>
				<td>{!! $objeto->fecha_entrega!!}</td>
				<td>{{$objeto->estatus}}</td>
				<td>{{$objeto->numero_contrato}}</td>
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
					@can('acceso','compras.estatus')
						
					{{--ESTATUS--}}
					{{--$objeto->proceso--}}
					{!! Form::model($objeto,['method'=>'PUT','action'=>array('CompraController@estatus',$objeto->id)]) !!}
								@include('partials.FormAprobar')
					{!!Form::close()!!}
					@endcan
				</td>
				<td>
					@can('acceso','compras.edit')
						@if( ($objeto->estatus=='GUARDADO')||($objeto->estatus=='DESAPROBADO') ||($objeto->estatus=='APROBADO') )
							<a href="{{ route('compras.edit', $objeto->id)}}" type="button" class="btn btn-warning btn-xs" title="ACTUALIZAR ORDEN COMPRA"><i class="material-icons">cached</i></a>
						@endif
					@endcan
				</td>
				<td>
					@can('acceso','compras.show')
						<button type="button" class="btn btn-info btn-xs" ng-controller="CompraPdfCtrl" ng-click="openOrdenCompra({{$objeto->id}},'cp')" title="VER ORDEN COMPRA"><i class="material-icons">picture_as_pdf</i></button>
					@endcan
						<button type="button" class="btn btn-info btn-xs" ng-controller="CompraPdfCtrl" ng-click="openOrdenCompra({{$objeto->id}},'sp')" title="VER ORDEN COMPRA SIN PRECIOS"><i class="material-icons">picture_as_pdf</i></button>
					@if($objeto->archivo_digital)
						@can('acceso','compras.digital')
							<a href="{{ route('compras.digital',$objeto->id)}}" type="button" class="btn btn-warning btn-xs" title="VER ARCHIVO"><i class="material-icons">cloud_download</i></a>
						@endcan
					@else
						@can('acceso','compras.digitalizar')
								<a href="compras/digitalizar/{{$objeto->id}}" type="button" class="btn btn-primary btn-xs" title="SUBIR ARCHIVO"><i class="material-icons">cloud_upload</i></a>
						@endcan
					@endif
				</td>
				<td>
				@can('acceso','ordenes.store')
					@if($objeto->estatus == "APROBADO" )
						@include('compras.partials.FormOrdenCompra')
					@endif
				@endcan
					@if($objeto->estatus == "CERRADO")
						@include('partials.FormApiRegistrar')
					@endif
					@can('acceso','compras.cancelar')
						{!! Form::model(array('estatus'=>'CANCELADO','ruta_siguiente'=>'/'),['method'=>'PUT','action'=>['CompraController@cancelar',$objeto->id]]) !!}
								@include('partials.FormCancelar')
						{!! Form::close() !!}
					@endcan
				</td>
				<td>
					@can('acceso','compras.show')
						@if($objeto->estatus=='GUARDADO' || $objeto->estatus=='DESAPROBADO')
							<a href="{{ route('compras.show', $objeto->id)}}" type="button" class="btn btn-danger btn-xs"><i class="material-icons">delete</i></a>
						@endif
					@endcan
				</td>
				<td>{{--DIGITALIZACION--}}
				@if($objeto->digitalizacion)
					<a href="{{ route('digitalizaciones.show',$objeto->digitalizacion->id)}}" type="button" class="btn btn-warning btn-xs" title="VER DIGITALZACION"><i class="material-icons">cloud_download</i></a>
				@else
					@can('acceso','digitalizaciones.create')
						<a href="digitalizaciones/create/{{$objeto->id}}?subclase=compra&clase=c" type="button" class="btn btn-primary btn-xs" title="SUBIR COMPRA"><i class="material-icons">cloud_upload</i></a>
					@endcan
				@endif
				@can('acceso','calificaciones.show')
					{!! link_to_route('calificaciones.show','Detalle',['id'=>$objeto->id,'clase'=>'compra']) !!}
				@endcan
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

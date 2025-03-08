@extends('app')
@section('content')
@include('servicios.partials.FormBuscar')
	<div class="panel panel-info">
		<div class='panel-heading panel-info' > LISTADO ORDENES DE SERVICIO <span class="badge">TOTAL: {{$objetos->total()}}</span></div>
		<div class='panel-body'>
    		<div style="height: 600px; overflow: scroll">
    			<table border=0 class="table table-striped"><thead>
    				<tr>
						<th>FECHA CAPTURA</th>
						<th>ORGANIZACION</th>
						<th>ORDEN SERVICIO</th>
						<th>REPORTE</th>
						<th>FECHA SERVICIO</th>
						<th>COORDINACION</th>
						<th>AUTOR</th>
						<th>RESPONSABLE(S)</th>
						<th>ESTATUS</th>
						<th>CLIENTE</th>
						<th>SUCURSAL</th>
						<th>MARCA</th>
						<th>MODELO</th>
						<th>SERIE</th>
						<th>CTO. INTERNO</th>
						<th>CTO. CLIENTE</th>
						<th>OBSERVACION CLIENTE</th>
						<th>OBSERVACION SMH</th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
					</tr>
    				@foreach($objetos as $objeto)
        			<tr>
						<td>{!! $objeto->created_at!!}</td>
						<td>{!! $objeto->organizacion!!}</td>
						<td>{!! $objeto->folio!!}</td>
						<td>
							@foreach($objeto->rel_reporte()->where('clase','R')->get() as $r)
								@can('acceso','reportes.index')
									{!! link_to_route('reportes.index',$r->folio,['folio'=>$r->folio]) !!}
								@else
									{{$r->folio}}
								@endcan
							@endforeach
						</td>
						<td>{!! $objeto->fecha_atencion!!}</td>
						<td>{!! $objeto->coordinacion!!}</td>
						<td>{!! $objeto->autor!!}</td>
						<td>
							@foreach($objeto->personas_servicio as $persona)
								{{$persona->iniciales}}<br>
							@endforeach
						</td>
						<td>{{$objeto->estatus}}</td>
						<td>{!! $objeto->nombre_fiscal!!}</td>
						<td>{!! $objeto->nombre_cliente!!}</td>
						<td>{!! $objeto->marca!!}</td>
						<td>{!! $objeto->modelo!!}</td>
						<td>{!! $objeto->numero_serie!!}</td>
						<td>{!! $objeto->folio_contrato!!}</td>
						<td>{!! $objeto->instituto!!}</td>
						<td>{!! Form::textarea('observaciones',$objeto->nota_cliente,['readonly'=>'readonly','size'=>'10x1'])!!}</td>
						<td>
							@can('acceso','reportes.observar')
								@include('reportes.partials.FormObservar')
	    			        @else
	        			            {!! Form::textarea('observaciones',$objeto->observacion,['readonly'=>'readonly','size'=>'10x1'])!!}
							@endcan
						</td>
						<td>
							<button type="button" class="btn btn-info btn-xs" ng-controller="OrdenServicioPdfCtrl" ng-click="openOrdenServicioPdf({{$objeto->id}})" title="VER ORDEN DE SERVICIO"><i class="material-icons">picture_as_pdf</i></button>
							@can('acceso','servicios.resguardo')
								<a href="{{ route('servicios.resguardo', $objeto->id)}}" type="button" class="btn btn-warning btn-xs" title="ACTUALIZAR RESGUARDO"><i class="material-icons">cached</i></a>
							@endcan
							@can('acceso','servicios.edit')
								@if(is_object($objeto->rel_servicio))
									@if($objeto->rel_servicio->validada)
										{{'VALIDADA'}}
									@else
										<a href="{{ route('servicios.edit', $objeto->id)}}" type="button" class="btn btn-warning  btn-xs" title="ACTUALIZAR ORDEN DE SERVICIO"><i class="material-icons">cached</i></a>
									@endif
								@endif
							@endcan
						</td><!-- 1-->
						<td>
							@if(!$objeto->deleted_at)
								@if(is_object($objeto->rel_servicio))
									@if($objeto->rel_servicio->digitalizacion)
										@can('acceso','servicios.digital')
											<a href="{{ route('servicios.digital',$objeto->id)}}" type="button" class="btn btn-warning" title="VER ARCHIVO"><i class="material-icons">cloud_download</i></a>
										@endcan
									@endif
								@endif
								@can('acceso','digitalizaciones.create')
				 					<a href="/digitalizaciones/{{$objeto->id}}/servicio?clase=SERV&borrar=1" type="button" class="btn btn-success btn-xs" title="MÁS DIGITALIZACIONES"><i class="material-icons">cloud_upload</i></a>
								@endcan
							@endif
						</td><!-- 5-->
						<td>
							<div ng-controller='NumeroAletraCtrl'>
								<button type="button" class="btn btn-success btn-xs" ng-click="goCats = !goCats" title="VER FORMATOS"><i class="material-icons">folder_especial</i></button>
								<div ng-if='goCats'>
									<button type="button" ng-controller='formatos' class="btn btn-success btn-xs" ng-click="operFormato({{$objeto}},'gdfbitacora')" title="VER BITACORA GDF"><i class="material-icons">picture_as_pdf</i>GDF Bitácora</button>
									<button type="button" ng-controller='formatos' class="btn btn-success btn-xs" ng-click="operFormato({{$objeto}},'gdfgenerador')" title="VER GENERADOR GDF"><i class="material-icons">picture_as_pdf</i>GDF Generador</button>
								</div>
							</div>
						</td><!-- 4-->
    					<td>
							@can('acceso','reportes.show')
								<a href="{{ route('reportes.show', $objeto->id)}}" type="button" class="btn btn-danger" title="ELIMINAR"><i class="material-icons">delete</i></a>
							@endcan
    					</td>
					</tr>
	    			@endforeach
				</table>
			</div>
		</div>
		<div class="panel-footer">
			{!! $objetos->appends($request->all())->render() !!}
		</div>
	</div>
@endsection

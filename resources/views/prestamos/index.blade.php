@extends('app')
@section('content')
@include('prestamos.partials.FormBuscar')
	<div class="panel panel-info">
		<div class='panel-heading panel-info' > SOLICITUDES DE PRESTAMO DE PIEZAS <span class="badge">TOTAL: {{$objetos->total()}}</span></div>
		<div class='panel-body'>
    		<table border=0 class="table table-striped">
    			<tr>
					<th>ORGANIZACION</th>
					<th>FOLIO</th>
					<th>FECHA </th>
					<th>PIEZA EN</th>
					<th>REPORTE</th>
					<th>CLIENTE</th>
					<th>SUCURSAL</th>
					<th>SOLICITADO POR</th>
					<th>ESTADO</th>
					<th>VIGENCIA</th>
					<th>COTIZACION</th>
					<th>OBSERVACION</th>
					<th>OBSERVACION SMH</th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
				</tr>
    			@foreach($objetos as $objeto)
        		<tr>
					<td>{!! $objeto->organizacion!!}</td>
					<td>{!! $objeto->folio!!}</td>
					<td>{!! $objeto->fecha_recepcion !!}</td>
					<td>@if($objeto->dato)
							{!! $objeto->dato !!}
						@else
							{{--'EQUIPO'--}}
						@endif
					</td>
					<td>
						@can('acceso','reportes.index')
							{!! link_to_route('reportes.index',$objeto->rel_reporte->folio,['folio'=>$objeto->rel_reporte->folio]) !!}
						@else
							{!! $objeto->rel_reporte->folio !!}
						@endcan
					</td>
					<td>{!! $objeto->nombre_fiscal!!}</td>
					<td>{!! $objeto->nombre_cliente !!} {!! $objeto->calle_entrega !!} {!! $objeto->colonia_entrega !!} {!! $objeto->codigo_postal_entrega !!} {!! $objeto->ciudad_entrega !!} {!! $objeto->estado_entrega !!} </td>
					<td>{!! $objeto->autor!!}</td>
					<td>{!! $objeto->estatus!!}</td>
					<td>{!! $objeto->vigencia!!}</td>
					<td>{{--RELACION DE COTIZACIONES--}}
						{!!$objeto->cotizacion_folio!!}
						{{--print_r($objeto->cotPaqIns()->get() )--}}
					</td>
					<td>{!! $objeto->nota!!}</td>
					<td>@include('prestamos.partials.FormObservar')</td>
					<td><!-- 1 -->
						<button type="button" class="btn btn-info btn-xs" ng-controller="prestamoPdfCtrl" ng-click="prestamo({{$objeto}})" title="VER SOLICITUD DE PRESTAMO"><i class="material-icons">picture_as_pdf</i></button>
						@if(!$objeto->deleted_at)
							@can('acceso','prestamos.edit')
								<a href="{{ route('prestamos.edit', $objeto->id)}}" type="button" class="btn btn-warning btn-xs" title="ACTUALIZAR"><i class="material-icons">cached</i></a>
							@endcan
						@endif
					</td>
					<td><!-- 2 -->
						@if(!empty($objeto->dato))
							@if(!$objeto->deleted_at)
								@can('acceso','prestamos.estatus')
										@if($objeto->dato=='COMPRAR')
											<?php $objeto->subclase=$objeto->dato; ?>
										@else
											<?php $objeto->subclase=''; ?>
										@endif
									{!! Form::model($objeto,['method'=>'PUT','action'=>array('PrestamoController@estatus',$objeto->id)]) !!}
									{{--$objeto->proceso--}}
										@include('partials.FormAprobar')
									{!!Form::close()!!}
								@endcan
							@endif
						@endif
					</td><!-- 2 -->
					<td><!-- 3 -->
						@if($objeto->estatus=='PRESTADO')
	            			<a href="/devoluciones/create/{{$objeto->id}}" type="button" class="btn btn-warning btn-xs" title="CREAR DEVOLUCION"><i class="material-icons">remove_shopping_cart</i></a>
	            		@endif
		    		   	@if($objeto->estatus=='PRESTADO')
		       				@can('acceso','cotizaciones.create')
								<a href="/cotizaciones/reporte/{{$objeto->id}}" type="button" class="btn btn-success btn-xs" title="CREAR COTIZACION"><i class="material-icons">add_shopping_cart</i></a>
							@endcan
	            		@endif
					</td><!-- 3 -->
					<td><!-- 4 -->
						@include('partials.FormStock')
	        		    @can('acceso','digitalizaciones.create')
					       <a href="digitalizaciones/{{$objeto->id}}/prestamo?clase=F&borrar=1" type="button" class="btn btn-success btn-xs" title="MÁS DIGITALIZACIONES"><i class="material-icons">cloud_upload</i></a>
		    		   @endcan
					</td>
					<td><!-- 5 -->
						@if($objeto->deleted_at)
                    		@can('acceso','prestamos.destroy')
								{!! Form::model($objeto, ['route'=>['prestamos.destroy',$objeto->id],'method'=>'DELETE']) !!}
		                    		<div class="panel-footer">
		                            	<button type="submit" class="btn btn-raised btn-primary btn-lg"><i class="material-icons">restore</i></button>
		                    		</div>
	            	    		{!! Form::close() !!}
                    		@endcan
						@else
							@can('acceso','prestamos.show')
								<a href="{{ route('prestamos.show', $objeto->id)}}" type="button" class="btn btn-danger"><i class="material-icons">delete</i></a>
							@endcan
						@endif
						@can('acceso','calificaciones.show')
							{!! link_to_route('calificaciones.show','Detalle',['id'=>$objeto->id,'clase'=>$objeto->clase]) !!}
						@endcan
						@can('acceso','devoluciones.index')
						{!! link_to_route('devoluciones.index','DEVOLUCIONE(S)',['id'=>$objeto->id,'buscar'=>'1']) !!}{{--SI TIENE PERMISO PRETAMOS.SHOW.ID_COTIZACION Y TIENE VDD EN LN_PREST, MOSTRAR BTN--}}
						@endcan
					</td><!--5-->
					<td>{{--ENVIAR A COORDINADOR--}}<!-- 6 -->
						@can('acceso','prestamos.enviar'){{--ENVIAR Y SELECCIONAR COORDINACION--}}
							@if(count($aprobadores=BuscarUsuario::listCoordinador())>1)
						    	    	{!! Form::model( $aprobadores,['method'=>'PUT','action'=>['PrestamoController@enviar',$objeto->id]]) !!}
			    			    			@include('partials.FormEnvios')
							    	    {!! Form::close() !!}
						    	    @elseif(count($aprobadores)==1)
						    	    	{!! Form::model($objeto,['method'=>'PUT','action'=>['PrestamoController@enviar',$objeto->id]]) !!}
						    	    		@include('partials.FormEnviar')
									    	    {!! Form::close() !!}
						    	    @else
						    	    {{'AÚN NO HAY COORDINACION'}}
							@endif
						@endif
					</td>
				</tr>
		    	@endforeach
			</table>
		</div>
		<div class="panel-footer">
			Total: {{$objetos->total()}}
			{!! $objetos->appends($request->all())->render() !!}
		</div>
	</div>
@endsection

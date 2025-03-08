@extends('app')
@section('content')
@include('prestamos.partials.FormBuscar')
	<div class="panel panel-info">
		<div class='panel-heading panel-info'> LISTADO DE DEVOLUCIONES DE PIEZAS <span class="badge">TOTAL: {{$objetos->total()}}</span></div>
		<div class='panel-body'>
    		<table border=0 class="table table-striped">
    			<tr>
					<th>ORGANIZACION</th>
					<th>FOLIO</th>
					<th>FECHA </th>
					<th>PIEZA EN</th>
					<th>PRESTAMO</th>
					<th>CLIENTE</th>
					<th>SUCURSAL</th>
					<th>SOLICITADO POR</th>
					<th>ESTADO</th>
					<th>VIGENCIA</th>
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
						@can('acceso','prestamos.index')
							{!! link_to_route('prestamos.index',$objeto->rel_reporte->folio,['buscar'=>'1','folio'=>$objeto->rel_reporte->folio]) !!}
						@else
							{!! $objeto->rel_reporte->folio !!}
						@endcan
					</td>
					<td>{!! $objeto->nombre_fiscal!!}</td>
					<td> {!! $objeto->nombre_cliente !!} {!! $objeto->calle_entrega !!} {!! $objeto->colonia_entrega !!} {!! $objeto->codigo_postal_entrega !!} {!! $objeto->ciudad_entrega !!} {!! $objeto->estado_entrega !!} </td>
					<td>{!! $objeto->autor!!}</td>
					<td>{!! $objeto->estatus!!}</td>
					<td>{!! $objeto->vigencia!!}</td>
					<td>{!! $objeto->nota!!}</td>
					<td>@include('prestamos.partials.FormObservar')</td>
					<td><!-- 1-->
						<button type="button" class="btn btn-info btn-xs" ng-controller="prestamoPdfCtrl" ng-click="devolucion({{$objeto}})" title="VER DEVOLUCION"><i class="material-icons">picture_as_pdf</i></button>
						@if(!$objeto->deleted_at)
							@can('acceso','prestamos.edit')
								<a href="{{ route('devoluciones.edit', $objeto->id)}}" type="button" class="btn btn-warning btn-xs" title="ACTUALIZAR DEVOLUCION"><i class="material-icons">cached</i></a>
							@endcan
						@endif
					</td><!-- 1-->
					<td><!-- 2-->
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
					</td><!-- 2-->
					<td><!-- 3-->
	            		@can('acceso','digitalizaciones.create')
			       		<a href="digitalizaciones/{{$objeto->id}}/devolucion?clase=DEV&borrar=1" type="button" class="btn btn-success btn-xs" title="MÁS DIGITALIZACIONES"><i class="material-icons">cloud_upload</i></a>
		       			@endcan
						@can('acceso','calificaciones.show')
							{!! link_to_route('calificaciones.show','Detalle',['id'=>$objeto->id,'clase'=>$objeto->clase]) !!}
						@endcan
					</td><!-- 3-->
					<td><!-- 4-->
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
								<a href="{{ route('devoluciones.show', $objeto->id)}}" type="button" class="btn btn-danger"><i class="material-icons">delete</i></a>
							@endcan
						@endif
					</td><!--4-->
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

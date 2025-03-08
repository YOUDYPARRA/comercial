@extends('app')
@section('content')
@if(isset($objetos))
{!! Form::model(Request::all(),['route'=>'cotizaciones.autorizadas','method'=>'GET']) !!}
	<div class="container">
	    <div class="panel panel-default">
	<ul class="nav nav-pills" >
	  <li role="presentation" >
	    <div class="panel-group">
	      <div class="panel panel-info">
	        <div class="panel-heading">
	          <h4 class="panel-title">
	            <a data-toggle="collapse" href="#collapse2" ng-click="consultar_ventas()"><i class="material-icons">search</i> BUSCAR</a>
	          </h4>
	        </div>
	        <div id="collapse2" class="panel-collapse collapse">
	          <div class="panel-body">
	            {!! Form::hidden('buscar',1,['class'=>'form-group'])!!}
	            @include('cotizaciones.partials.FormBuscar')
	          </div>
	        </div>
	      </div>
	    </div>
	  </li>
	  </ul>
	    <div class="panel panel-footer">
	        {!! $objetos->appends($request->all())->render()!!}
	    </div>
	</div>
	</div>
	{!! Form::close() !!}
	            <div class="panel panel-info">
	                <div class='panel-heading'>COTIZACIONES CONFIRMADAS POR EL CLIENTE. Total: <span class="badge">{{ $objetos->total() }}</span> </div>
	                    <div class='panel-body'>
	                        <div style="height: 600px; overflow: scroll">
	                            <table class="table table-striped table-condensed">
	                               <tr>
	                                <th>Organización</th>
	                                <th>Fecha</th>
	                                <th>Cotización</th>
	                                <th>Versión</th>
	                                <th>Contrato</th>
	                                <th>Procesar</th>
	                                <th>Cliente</th>
	                                <th>Servicio / Entrega</th>
	                                <th>Total</th>
	                                <th>Moneda</th>
	                                <th>Departamento</th>
	                                <th>Autor</th>
	                                <th>Estatus</th>
	                                <th>Ordenes</th>
	                                <th>Observación</th><!-- 10 -->
	                                <th></th>
	                                <th></th>
	                                <th></th>
	                                <th></th>
	                                <th></th>
	                            </tr>
	                            @foreach($objetos as $key=>$objeto)
	                            <tr>
	                                <td>{!! $objeto->org_name!!}</td>
	                                <td>{!! $objeto->created_at!!}</td>
	                                <td>{!! $objeto->numero_cotizacion!!}</td>
	                                <td>{!! $objeto->version!!}</td>
	                                <td>{!! $objeto->no_contrato!!}</td>
	                                @if($objeto->cotizacion=="COTIZACION")
        								<td><span class="badge badge-info"> {!! $objeto->cotizacion !!}</span> </td>
        							@endif
        							@if($objeto->cotizacion=="VENTA")
        								<td><span class="badge badge-success"> {!! $objeto->cotizacion !!}</span> </td>
        							@endif
        							@if($objeto->cotizacion=="COMPRA")
        								<td><span class="badge badge-warning"> {!! $objeto->cotizacion !!}</span> </td>
        							@endif
       							 	@if($objeto->cotizacion=="VENTA Y COMPRA")
        								<td><span class="badge badge-default"> {!! $objeto->cotizacion !!}</span> </td>
        							@endif
        							@if($objeto->cotizacion=="")
        								<td><span class="badge badge-primary"> {!! $objeto->cotizacion !!}</span> </td>
        							@endif
	                                <td>{!! $objeto->nombre_fiscal !!}</td>
	                                <td>{!! $objeto->nombre_cliente !!} {!! $objeto->calle_entrega !!} {!! $objeto->colonia_entrega !!} {!! $objeto->codigo_postal_entrega !!} {!! $objeto->ciudad_entrega !!} {!! $objeto->estado_entrega !!} </td>
	                                <td>
	                                	@if((!is_string($objeto->total)))
            								{!! number_format($objeto->total, 2, '.', ',')!!}
        								@else
            								{!! $objeto->total !!}
        								@endif
	                                </td>
	                                <td>{!! $objeto->tipo_moneda!!}</td>
	                                @if($objeto->clase=="C")
        								<td><span class="badge badge-info">COMERCIAL</span> </td>
        							@endif
        							@if($objeto->clase=="CM")
        								<td><span class="badge badge-success">MEDICINA MOLECULAR</span> </td>
        							@endif
        							@if($objeto->clase=="CST")
        								<td><span class="badge badge-default">SERVICIO TECNICO</span> </td>
        							@endif
	                                <td>{!! $objeto->nombre_empleado!!}</td>
	                                @if($objeto->estatus=="GUARDADO" || $objeto->estatus=="APROBADO" || $objeto->estatus=="VERIFICADO")
            							<td><span class="label label-default"> {!! $objeto->estatus !!}</span> </td>
        							@endif
        							@if($objeto->estatus=="ENVIADO" || $objeto->estatus=="SOLICITUD")
        							    <td><span class="label label-primary"> {!! $objeto->estatus !!}</span> </td>
        							@endif
        							@if($objeto->estatus=="CONCRETADO")
        							    <td><span class="label label-warning"> {!! $objeto->estatus !!}</span> </td>
        							@endif
        							@if($objeto->estatus=="PROCESADO" || $objeto->estatus=="VALIDO" || $objeto->estatus=="ENTREGADO CLIENTE" || $objeto->estatus=="ENTREGADO TERCERO" || $objeto->estatus=="ENTREGADO")
        							    <td><span class="label label-success"> {!! $objeto->estatus !!}</span> </td>
        							@endif
        							@if($objeto->estatus=="RECEPCIONADO" || $objeto->estatus=="PROGRAMADO")
        							    <td><span class="label label-info"> {!! $objeto->estatus !!}</span> </td>
        							@endif
        							@if($objeto->estatus=="RUTA" || $objeto->estatus=="CANCELADO")
        							    <td><span class="label label-danger"> {!! $objeto->estatus !!}</span> </td>
        							@endif

	                                <td>
																		@if(isset($objeto->ordenes))
																		{!! $objeto->ordenes !!}
																		@endif
																	</td>
	                                <td>
																		@if(isset($objeto->observaciones))
			                						@can('acceso','cotizaciones.observar')
			        	                        	    @include('cotizaciones.partials.FormObservar')
				                                	@else
			                							{!! Form::textarea('nota',$objeto->nota,['readonly'=>'readonly','size'=>'19x2'])!!}
                                		@endif
                                		@endif
	                                </td> <!--10 -->
	                                <td>
	                                	@can('acceso','cotizaciones.show')
	                                		<button type="button" ng-controller="CotizacionPdfCtrl" title="VER COTIZACION CON PRECIOS" class="btn btn-info btn-xs" ng-click="openCotizacionPdf({{$objeto->id}});"><i class="material-icons">picture_as_pdf</i></button>
	                                	@else
	                                		<button type="button" ng-controller="CotizacionPdfCtrl" title="VER COTIZACION SIN PRECIOS" class="btn btn-info btn-xs" ng-click="openCotizacionPdfSinPrecios({{$objeto->id}});"><i class="material-icons">picture_as_pdf</i></button>
	                                	@endcan
	                                 <div ng-controller="StockCtrl">
	                                	<button type="button" class="btn btn-info btn-xs" title="VER STOCK DE LA COTIZACION" ng-click="hoverEdit = !hoverEdit;hoverIn({{$objeto->id}},'cot')"><i class="material-icons">filter_1</i> <%cantidad_total%></button>
	                                	@include('partials.FormStock')
	                                </div>
	                                 </td>
	                                <td>
										@can('acceso','digitalizaciones.create')
	 										<a href="/digitalizaciones/{{$objeto->id}}/cotizacion?clase=COT&borrar=1" type="button" class="btn btn-success btn-xs" title="MÁS DIGITALIZACIONES"><i class="material-icons">cloud_upload</i></a>
	 									@endcan
										@if($objeto->cotizacion_digital)
											<a href="{{ route('cotizaciones_digitales.show',$objeto->id)}}" type="button" class="btn btn-warning btn-xs" title="DESCARGAR ARCHIVO"><i class="material-icons">cloud_download</i></a>
										@endif
	                                </td>
	                                <td>
	                               		@can('acceso','compras.create')
																			@if( ($objeto->cotizacion!='VENTA') || ($objeto->cotizacion=='') )
																					@if(is_array($objeto->procesos))
	                                					<a href="{{ route('compras.create', $objeto->id)}}" type="button" class="btn btn-primary btn-xs" title="CREAR ORDEN DE COMPRA"><i class="material-icons">shopping_cart</i>   </a>
																					@endif
																			@endif
	                                	@endcan
	                               		@can('acceso','ventas.create')
																		@if($objeto->cotizacion!='COMPRA')
		                               			@if($objeto->CrearVenta)
																					@if(is_array($objeto->procesos))
		                                				<a  href="{{ route('ventas.create',$objeto->id)}}" type="button" class="btn btn-primary btn-xs" title="CREAR ORDEN DE VENTA"><i class="material-icons">receipt</i></a>
																					@endif
		                                		@endif
	                                		@endif
	                                	@endcan
	                                </td>
																	<td>
	                               		@can('acceso','cotizaciones.update')
																		{{--'SERIE DE AVISOS Y ESTATUS DEL PEDIDO'--}}
				                        	    {!! Form::model($objeto,['method'=>'PUT','action'=>['CotizacionController@update',$objeto->id]]) !!}
												        	    	@include('partials.FormAprobar')				        	{{--print_r($objeto->proceso)--}}       	{{-- Form::text('aviso',2) --}}
																				{{--'FORM PARA APROBACION'--}}
												        	  	{!!Form::close()!!}
																			@if(isset($objeto->proceso))
																		@endif
	                               		@endcan
	                               	</td>
	                               	<td>
										@can('acceso','calificaciones.show')					{{--DETALLE DE ESTADOS--}}
					            			{!! link_to_route('calificaciones.show','Detalle',['id'=>$objeto->id,'clase'=>'cotizacion']) !!}
					          			@endcan
										@can('acceso','cotizaciones.proceso')
							              @include('cotizaciones.partials.FormProcesos')		{{--PROCESOS DE COTIZACION--}}
				            			@endcan
	                                </td>
	                            </tr>
	                            @endforeach
	                            </table>
	                        </div>
	                    </div>
	                    <div class="panel-footer">
												{!! $objetos->appends($request->all())->render()!!}
	                    </div>
	            </div>
@endif
@endsection

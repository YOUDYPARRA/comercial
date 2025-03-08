@extends('app')
@section('content')
@if(util::getSitio()=='reportes')
	{!! Form::model(Request::all(),['route'=>'reportes.index','method'=>'GET']) !!}
		@include('reportes.partials.FormBuscar')
	{!! Form::close() !!}
@else
	{!! Form::model(Request::all(),['route'=>'reportes.validar','method'=>'GET']) !!}
		@include('reportes.partials.FormBuscar')
	{!! Form::close() !!}
@endif

	<div class="panel panel-info">
	@if(util::getSitio()=='reportes')
		<div class='panel-heading panel-info' > LISTADO DE REPORTES <span class="badge">TOTAL: {{$objetos->total()}}</span></div>
	@else
		<div class='panel-heading panel-info' > LISTADO DE REPORTES POR VALIDAR <span class="badge">TOTAL: {{$objetos->total()}}</span></div>
	@endif
		<div class='panel-body'>
		<div style="height: 600px; overflow: scroll">
    		<table border=0 class="table table-striped"><thead>
    			<tr>
					<th>Organización</th>
					<th>{!!util::lnkOr($request->all(),'folio','NO. REPORTE')!!} </th>
					<th>{!!util::lnkOr($request->all(),'created_at','FECHA REPORTE')!!}</th>
					<th>{!!util::lnkOr($request->all(),'nombre_fiscal','CLIENTE')!!}</th>
					<th>{!!util::lnkOr($request->all(),'nombre_fiscal','SUCURSAL')!!}</th>
					<th>{!!util::lnkOr($request->all(),'estatus','ESTATUS')!!}</th>
					<th>{!!util::lnkOr($request->all(),'coordinacion','COORDINACION')!!}</th>
					<th>{!!util::lnkOr($request->all(),'marca')!!}</th>
					<th>{!!util::lnkOr($request->all(),'modelo')!!}</th>
					<th>{!!util::lnkOr($request->all(),'ciudad')!!}</th>
					<th>RESUELTO POR</th>
					<th>{!!util::lnkOr($request->all(),'folio_contrato','CONTRATO')!!}</th>
					<th>{!!util::lnkOr($request->all(),'instituto','INSTITUCIONAL')!!}</th>
					<th>PROGRAMACION</th>
					<th>COTIZACION</th>
					<th>SOLICITUD PZA.</th>
					<th>OBSERVACIÓNES CLIENTE</th>
					<th>OBSERVACIÓNES SMH</th>
					<th>ORDENE(S) SERVICIO(S)</th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
				</tr></thead>
    @foreach($objetos as $objeto)
        <tr>
			<td>{!! $objeto->organizacion!!}</td>
			<td>{!! $objeto->folio!!}</td>
			<td>{!! $objeto->created_at!!}</td>
			<td>{!! $objeto->nombre_fiscal!!}</td>
			<td>{!! $objeto->nombre_cliente !!}</td>
			<td>{!! $objeto->estatus!!}</td>
			<td>{!! $objeto->coordinacion!!}</td>
			<td>{!! $objeto->marca!!}</td>
			<td>{!! $objeto->modelo!!}</td>
			<td>{!! $objeto->ciudad!!}</td>
			<td>{!! $objeto->resuelto_por !!}</td>
			<td>{!! $objeto->folio_contrato!!}</td>
			<td>{!! $objeto->instituto!!}</td>
			<td>{{--PROGRAMACION DE SERVICIO--}}
				@can('acceso','programaciones.index')
					@foreach($objeto->programas->where('clase','P') as $programa)
						{!! link_to_route('programaciones.index','Programacion'.$programa->estatus,['buscar'=>1,'id_foraneo'=>$objeto->id]) !!}
					@endforeach
				@endcan
				<!--INGENIEROS ASIGNADOS PARA ATENDER SERVICIO-->
					@if($objeto->estatus!='CERRADO')
						@foreach($objeto->programas()->where('clase','P')->get() as $p)
							@foreach($p->personas_servicio()->where('clase','P')->where('vigente','1')->get() as $p_p)
							@if($p_p->id_user==auth()->user()->id)
								{!! Form::model($objeto,['method'=>'GET','action'=>['ServicioController@captura']]) !!}
									{!! Form::hidden('programacion',$p->id,['readonly'=>'readonly','required'=>'','class'=>'form-group'])!!}
									<button type="submit" class="btn btn-info btn-xs" title="CAPTURAR ORDEN DE SERVICIO"><i class="material-icons">keyboard</i></button>
								{!! Form::close() !!}
							@endif
							@endforeach
						@endforeach
					@endif
				@if($objeto->estatus=='ENVIADO' )
					@can('acceso','programaciones.create')
						<a href="/programaciones/create/{{$objeto->id}}" type="button" class="btn btn-success btn-xs" title="PROGRAMACION"><i class="material-icons">insert_invitation</i></a>
					@endcan
				@endif
			</td>
			<td>
				@foreach($objeto->r_cotizaciones as $cotizacion)
					@can('acceso','cotizaciones.index')
						{!! link_to_route('cotizaciones.index',$cotizacion->numero_cotizacion.' v'. $cotizacion->version,['numero_cotizacion'=>$cotizacion->numero_cotizacion,'buscar'=>'1']) !!}
						@else
						{!! link_to_route('cotizaciones.servicio',$cotizacion->numero_cotizacion.' v'. $cotizacion->version,['numero_cotizacion'=>$cotizacion->numero_cotizacion,'buscar'=>'1']) !!}

					@endcan
				@endforeach

			</td>
			<td>{{--LISTADO DE PRESTAMOS--}}

				@if(is_object($objeto->re_prestamo))
						@if(count($objeto->re_prestamo)>0)
							@foreach($objeto->re_prestamo as $prestamo)
							@if($prestamo->dato=='COMPRAR'|| $prestamo->dato=='')
								{!! link_to_route('prestamos.index','Reposicion: '.$prestamo->folio.$prestamo->estatus,['folio'=>$prestamo->folio,'buscar'=>'1']) !!}
							@else
								{!! link_to_route('prestamos.index','Requisicion: '.$prestamo->folio.$prestamo->estatus,['folio'=>$prestamo->folio,'buscar'=>'1']) !!}
							@endif
							@endforeach
						@endif
				@endif
			</td>
			<td>{!! $objeto->nota_cliente!!}</td>
			<td>@include('reportes.partials.FormObservar')</td>
			<td>{{--ORDENES DE SERVICIO, DOCUMENTACION DE ORDENES DE SERVICIO--}}
				@foreach($objeto->programas->where('clase','S') as $servicio)
					{!! link_to_route('servicios.index',$servicio->folio,['buscar'=>'1','folio'=>$servicio->folio]) !!}
				@endforeach
			</td>
			<td>
				@can('acceso','reportes.create')
					@if(auth()->user()->departamento=='OPERACIONES' || auth()->user()->tipo_usuario=='ADMNISTRADOR')
						<a href="{{ route('reportes.edit', $objeto->id)}}" type="button" class="btn btn-warning btn-xs" title="ACTUALIZAR REPORTE"><i class="material-icons">cached</i></a>
						<br>
						@include('reportes.partials.FormAutMdf')
					@elseif($objeto->modificable=='1')
						<a href="{{ route('reportes.edit', $objeto->id)}}" type="button" class="btn btn-warning btn-xs" title="ACTUALIZAR REPORTE"><i class="material-icons">cached</i></a>
					@elseif($objeto->modificable=='0')
						@include('reportes.partials.FormSolMdf')
					@endif
				@endcan

			</td><!-- 1-->
			<td>
				<button type="button" class="btn btn-info btn-xs" ng-controller="ReportePdfCtrl" ng-click="openReportePdf({{$objeto}})" title="VER REPORTE"><i class="material-icons">picture_as_pdf</i></button>

			</td><!-- 2-->
			<td>
			@can('acceso','custodias.create')
				<a href="/custodias/create/{{$objeto->id}}" type="button" class="btn btn-primary btn-xs" title="ENTRADA DE EQUIPO"><i class="material-icons">input</i></a>
			@endcan
				<button type="button" class="btn btn-info btn-xs" ng-controller="custodiaPdfCtrl" ng-click="openEntradaEquipoPdf({{$objeto->id}})" title="VER ENTRADA EQUIPO"><i class="material-icons">picture_as_pdf</i></button>
			</td><!-- 3-->
			<td>
				@if(!$objeto->deleted_at)

                	@can('acceso','reportes.update'){{--RESUELTO POR--}}
	                	@if($objeto->estatus != 'CERRADO')
			    	    	{!! Form::model( $objeto,['method'=>'PUT','action'=>['ReporteController@update',$objeto->id]]) !!}
                	<div ng-controller='NumeroAletraCtrl'>
						<button type="button" class="btn btn-success btn-xs" ng-click="goCats = !goCats" title="RESUELTO POR:"><i class="material-icons">beenhere</i></button>
						<div ng-show='goCats'>
			    	    	@include('partials.FormResueltoPor')
						</div>
					</div>
				    	    {!! Form::close() !!}
			    	    @endif
                	@endcan
                @endif
			</td>
			<td>
					@if( ($objeto->estatus!='CERRADO') || ($objeto->estatus!='CANCELADO') )
						@can('acceso','prestamos.requisicion')
							<a href="/prestamos/requisicion/{{$objeto->id}}" type="button" class="btn btn-primary btn-sm" title="REPSICION/COMPRA"><i class="material-icons">move_to_inbox</i></a>
						@endcan
					@endif
{{--count($objeto->getLimitePrestamo())--}}
				@if( $objeto->estatus!='CERRADO' )
					@can('acceso','prestamos.create')
						@if(count($objeto->getLimitePrestamo())<=5 )
							<a href="/prestamos/create/{{$objeto->id}}" type="button" class="btn btn-success btn-xs" title="SOLICITUD DE PIEZA"><i class="material-icons">compare_arrows</i></a>
						@endif
					@endcan
					@can('acceso','cotizaciones.create')
						<a href="/cotizaciones/reporte/{{$objeto->id}}" type="button" class="btn btn-success btn-xs" title="CREAR COTIZACION"><i class="material-icons">add_shopping_cart</i></a>
					@endcan
				@endif
			</td>
			<td>
				@if(!$objeto->deleted_at)
                	@can('acceso','reportes.enviar'){{--ENVIAR Y SELECCIONAR COORDINACION--}}
					@if(count($aprobadores=BuscarUsuario::listCoordinador('contratos.aprobar'))>1)
			    	    	{!! Form::model( $aprobadores,['method'=>'PUT','action'=>['ReporteController@enviar',$objeto->id]]) !!}
		    	    			@include('partials.FormEnvios')
				    	    {!! Form::close() !!}
			    	    @elseif(count($aprobadores)==1)
			    	    	{!! Form::model($objeto,['method'=>'PUT','action'=>['ReporteController@enviar',$objeto->id]]) !!}
			    	    		@include('partials.FormEnviar')
				    	    {!! Form::close() !!}
			    	    @else
			    	    {{'AÚN NO HAY COORDINACION'}}
		    			@endif
					@endif
				@endcan
				@if($objeto->deleted_at)
                    @can('acceso','reportes.destroy')
						{!! Form::model($objeto, ['route'=>['reportes.destroy',$objeto->id],'method'=>'DELETE']) !!}
                        <button type="submit" class="btn btn-raised btn-danger btn-xs"><i class="material-icons">restore</i></button>
	            	    {!! Form::close() !!}
                    @endcan
				@endif
				</td>
				<td>
				@if( $objeto->estatus=='ENVIADO')
					@can('acceso','reportes.show')
						<a href="{{ route('reportes.show', $objeto->id)}}" type="button" class="btn btn-danger btn-xs" title="ELIMINAR REGISTRO"><i class="material-icons">delete</i></a>
					@endcan
				@endif
			</td><!-- 4-->
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

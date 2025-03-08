@extends('app')
@section('content')
@include('contratos.partials.FormBuscar')
	<div class="panel panel-info">
		<div class='panel-heading panel-info' > LISTADO DE CONTRATOS DE SERVICIO <span class="badge">TOTAL: {{$objetos->total()}}</span></div>
		<div class='panel-body'>
    		<table border=0 class="table table-striped"><thead>
    			<tr>
					<th>{!!util::lnkOr($request->all(),'id','FOLIO CONTRATO')!!}</th>
					<th>{!!util::lnkOr($request->all(),'folio_contrato')!!}</th>
					<th>{!!util::lnkOr($request->all(),'nombre_fiscal','CLIENTE')!!}</th>
					<th>{!!util::lnkOr($request->all(),'estatus','ESTATUS')!!}</th>
					<th>{!!util::lnkOr($request->all(),'fecha_inicio_contrato','INICIO CONTRATO')!!} </th>
					<th>{!!util::lnkOr($request->all(),'fecha_fin_contrato','FIN CONTRATO')!!} </th>
					<th>INICIO GARANTIA</th>
					<th>FIN GARANTIA</th>
					<th>VIGENTE</th>
					<th>{!!util::lnkOr($request->all(),'ciudad_fiscal','CIUDAD')!!}</th>
					<th>{!!util::lnkOr($request->all(),'estado_fiscal','ESTADO')!!}</th>
					<!--<th>EXCEPCIONES</th>
					<th>DIAS P/ATENDER</th>-->
					<th>OBSERVACION</th>
					<th>PDF</th>
					<th></th>
					<th>DIGITAL</th><!--CONTRATO DIGITALIZADO-->
					<th>FIANZA</th><!--FIANZA DIGITALIZADA-->
					<th></th>

				</tr></thead>
				
    @foreach($objetos as $objeto)
            <tr>
			<td>{!! $objeto->folio_contrato !!}</td>
			<td>{!! $objeto->instituto !!}</td>
			<td>{!! $objeto->nombre_fiscal!!}</td>
			<td>{!! $objeto->estatus!!}</td>
			<td>{!! $objeto->fecha_inicio_contrato !!}</td>
			<td>{!! $objeto->fecha_fin_contrato !!}</td>
			<td>{!! $objeto->fecha_inicio_garantia !!}</td>
			<td>{!! $objeto->fecha_fin_garantia !!}</td>
			<td>{!! $objeto->vigencia!!}</td>
			<td>{!! $objeto->ciudad_fiscal!!}</td>
			<td>{!! $objeto->estado_fiscal!!}</td>
			<!--<td>{!! $objeto->limite_atencion !!}</td>-->
			<td>
			@if(!$objeto->deleted_at || ($objeto->estatus!='CANCELADO')){{--VERIFICA NO ELIMINADO--}}
				{!! Form::model(['nombre_tipo'=>'contratos','observaciones'=>$objeto->observacion,'id_producto'=>$objeto->id],['method'=>'POST','action'=>['ContratoController@observar']]) !!}
				
					@include('observaciones.partials.Form')
				{!! Form::close() !!}
			@endif
			</td>
			<td>
				<button type="button" class="btn btn-info btn-xs" ng-controller="contratoPdfCtrl" ng-click="openContratoPdf({{$objeto->id}},'c')" title="VER CONTRATO CON MARCA"><i class="material-icons">picture_as_pdf</i></button>
				@if($objeto->folio_contrato=="10-2017" || $objeto->folio_contrato=="4-2017")
					<button type="button" class="btn btn-info btn-xs" ng-controller="contratoPdfCtrl_old" ng-click="openContratoPdf({{$objeto->id}},'s')" title="VER CONTRATO FORMATO ANTERIOR"><i class="material-icons">picture_as_pdf</i></button>
					@else
					<button type="button" class="btn btn-info btn-xs" ng-controller="contratoPdfCtrl" ng-click="openContratoPdf({{$objeto->id}},'s')" title="VER CONTRATO SIN MARCA"><i class="material-icons">picture_as_pdf</i></button>
				@endif
			</td>
			<td>
				@if(!$objeto->deleted_at || ($objeto->estatus!='CANCELADO') || ($objeto->estatus!='CERRADO') || ($objeto->estatus!='ENVIADO') ){{--VERIFICA NO ELIMINADO--}}
					@can('acceso','contratos.edit')
						<a href="{{ route('contratos.edit', $objeto->id)}}" type="button" class="btn btn-warning btn-xs" title="ACTUALIZAR CONTRATO"><i class="material-icons">cached</i></a>
					@endcan
					@can('acceso','contratos.cancelar')
							{!! Form::model(array('estatus'=>'CANCELAR','ruta_siguiente'=>'/'),['method'=>'PUT','action'=>['ContratoController@cancelar',$objeto->id]]) !!}
								@include('partials.FormCancelar')
							{!! Form::close() !!}
					@endcan
				@endif	
			</td>
			<td>
			@if(!$objeto->deleted_at || ($objeto->estatus!='CANCELADO')){{--VERIFICA NO ELIMINADO--}}
				
				@can('acceso','contratos.digital')
					@if($objeto->digitalizacion)
							<a href="{{ route('contratos.digital',$objeto->id)}}" type="button" class="btn btn-warning btn-xs" title="VER ARCHIVO"><i class="material-icons">cloud_download</i></a>
					@endif
				@endcan
				@can('acceso','contratos.digitalizar')
					<a href="contratos/digitalizar/{{$objeto->id}}" type="button" class="btn btn-primary btn-xs" title="SUBIR ARCHIVO"><i class="material-icons">cloud_upload</i></a>
				@endcan
			@else
				@include('observaciones.partials.Form')
			@endif
			</td><!-- 1-->
			<td>{{--FIANZA--}}
			@if(!$objeto->deleted_at)
				@if(count($objeto->digitalizaciones->where('clase',$objeto->clase))>0){{--hay fianza digitalizada--}}
							{!!$objeto->hrefDigitalizaciones()!!}
				@else{{--NO hay fianza digitalizada, hay q digitalizar--}}
					@can('acceso','digitalizaciones.create')
						<a href="digitalizaciones/create/{{$objeto->id}}?subclase=fianza&clase=C" type="button" class="btn btn-primary btn-xs" title="SUBIR FIANZA"><i class="material-icons">cloud_upload</i></a>
					@endcan
				@endif
			@endif
				@if($objeto->deleted_at)
                    @can('acceso','compras.destroy')
							{!! Form::model($objeto, ['route'=>['contratos.destroy',$objeto->id],'method'=>'DELETE']) !!}
			                    <div class="panel-footer"> 
			                            <button type="submit" class="btn btn-raised btn-danger btn-xs"><i class="material-icons">restore</i></button>
			                    </div>
		            	    {!! Form::close() !!}
                    @endcan
				@endif
			</td><!-- 4-->
			<td><!-- detalles-->
			@if(!$objeto->deleted_at)
			{{$objeto->proceso}}
			{{--print_r($objeto->proceso)--}}
				@can('acceso','contratos.aprobar')
	                @if($objeto->estatus=='ENVIADO')
						{!! Form::model($objeto,['method'=>'PUT','action'=>array('ContratoController@aprobar',$objeto->id)]) !!}
							@include('partials.FormAprobarCot')
			    	    {!! Form::close() !!}
	        	    @endif
	    	    @endcan
				@can('acceso','contratos.estatus'){{--SELECCION DE APROBADOR--}}
	                @if($objeto->estatus=='GUARDADO' || $objeto->estatus=='DESAPROBADO')
	                	@if(count($aprobadores=BuscarUsuario::listUsuario('contratos.aprobar'))>1)
			    	    	{!! Form::model( $aprobadores,['method'=>'PUT','action'=>['ContratoController@estatus',$objeto->id]]) !!}
		    	    			@include('partials.FormEnvios')
				    	    {!! Form::close() !!}
			    	    @elseif(count($aprobadores)==1)
			    	    	{!! Form::model($objeto,['method'=>'PUT','action'=>['ContratoController@estatus',$objeto->id]]) !!}
			    	    		@include('partials.FormEnviar')
				    	    {!! Form::close() !!}
			    	    @else
			    	    {{'AÚN NO HAY APROBADOR'}}
		    			@endif
	        	    @endif
	    	    @endcan
				@can('acceso','contratos.cerrar')
					@if($objeto->estatus=='APROBADO')
		    	    	{!! Form::model($objeto,['method'=>'PUT','action'=>['ContratoController@cerrar',$objeto->id]]) !!}
		    	    		@include('partials.FormCerrar')
			    	    {!! Form::close() !!}	    	    		
					@endif
				@endcan
				@can('acceso','contratos.show')
					<a href="{{ route('contratos.show', $objeto->id)}}" type="button" class="btn btn-primary btn-xs">MÁS..</a>
				@endcan

			@endif
			</td>
			<td>
				<button type="button" class="btn btn-warning btn-xs" ng-controller="cotizacionContratoPdfCtrl" ng-click="openCotizacionContratoPdf({{$objeto->id}})" title="TRABAJANDO EN PRUEBAS CONTRATO-COTIZACION"><i class="material-icons">build</i><%var%></button>
			</td>
		</tr>    	
    @endforeach
</table>
</div>
<div class="panel-footer"> 
{!! $objetos->appends($request->all())->render() !!}
</div>
</div>
@endsection

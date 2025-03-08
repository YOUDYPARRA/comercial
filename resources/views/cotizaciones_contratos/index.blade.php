@extends('app')
@section('content')
@include('cotizaciones_contratos.partials.FBscCotCon')
	<div class="panel panel-info">
		<div class='panel-heading panel-info' > LISTADO DE COTIZACION CONTRATOS DE SERVICIO <span class="badge">TOTAL: {{$objetos->total()}}</span></div>
		<div class='panel-body'>
    		<table border=0 class="table table-striped"><thead>
    			<tr>
					<th>{!!util::lnkOr($request->all(),'dato','FOLIO COTIZACION CONTRATO')!!}</th>
					<th>VERSION</th>
					<th>CREADO</th>
					<th>{!!util::lnkOr($request->all(),'nombre_fiscal','CLIENTE')!!}</th>
					<th>{!!util::lnkOr($request->all(),'estatus','ESTADO')!!}</th>
					<th>AUTOR</th>
					<th>OBSERVACION</th>
					<th>PDF</th>
					<th></th>
					<th>DIGITAL</th>					
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
				</tr></thead>
				
    @foreach($objetos as $objeto)
            <tr>			
			<td>{{ $objeto->dato }}</td>{{--folio--}}
			<td>{{ $objeto->documentos->first()->version  }}</td>{{--folio--}}
			<td>{{ $objeto->created_at }}</td>
			<td>{{ $objeto->nombre_fiscal }}</td>
			<td>{{ $objeto->estatus }}</td>
			<td>{{ $objeto->autor }}</td>
			<td>
			@if(!$objeto->deleted_at || ($objeto->estatus!='CANCELADO')){{--VERIFICA NO ELIMINADO--}}
				{!! Form::model(['nombre_tipo'=>'contratos','observaciones'=>$objeto->observacion,'id_producto'=>$objeto->id],['method'=>'POST','action'=>['ContratoController@observar']]) !!}
					@include('observaciones.partials.Form')
				{!! Form::close() !!}
			@endif	
			</td>
			<td>{{--PDF--}}
				<button type="button" class="btn btn-info btn-xs" ng-controller="contratoCompraVentaPdfCtrl" ng-click="openContratoPdf({{$objeto}})" title="VER COTIZACION PARA CONTRATO"><i class="material-icons">picture_as_pdf</i></button>
			</td>
			<td>
				@if((!$objeto->deleted_at) &&  ($objeto->estatus=='GUARDADO') ){{--VERIFICA NO ELIMINADO PARA ACTUALIZAR--}}
					@can('acceso','cotizaciones_contratos.edit')
						<a href="{{ route('cotizaciones_contratos.edit', $objeto->id)}}" type="button" class="btn btn-warning btn-xs" title="ACTUALIZAR COTIZACION CONTRATO"><i class="material-icons">cached</i></a>
					@endcan
					@can('acceso','cotizaciones_contratos.cerrar'){{--CAMBIAR ESTATUS a CERRADO--}}					
			    	    	{!! Form::model($objeto,['method'=>'PUT','action'=>['CotizacionContratoController@estatus',$objeto->id]]) !!}
			    	    		@include('partials.FormCerrar')
				    	    {!! Form::close() !!}	    	    		
					@endcan
					
				@endif
				@if((!$objeto->deleted_at) &&  ($objeto->estatus=='GUARDADO') || ($objeto->estatus=='CERRADO'))
					@can('acceso','cotizaciones_contratos.cancelar')
							{!! Form::model(array('estatus'=>'CANCELADO','ruta_siguiente'=>'/'),['method'=>'PUT','action'=>['CotizacionContratoController@estatus',$objeto->id]]) !!}
								@include('partials.FormCancelar')
							{!! Form::close() !!}
					@endcan
				
				
				@endif
			</td>			
			<td>{{--DIGITALIZACION--}}
			@if(!$objeto->deleted_at)
				@if(count($objeto->digitalizaciones)>0){{--hay digitalizacion--}}
							<a href="{{ route('digitalizaciones.show',$objeto->digitalizaciones[0]->id)}}" type="button" class="btn btn-warning btn-xs" title="VER DIGITALZACION"><i class="material-icons">cloud_download</i>{{$objeto->digitalizaciones[0]->digitalizacion}}</a>
				@else{{--NO hay nada digitalizada, hay q digitalizar--}}
					@can('acceso','digitalizaciones.create')
						<a href="/digitalizaciones/create/{{$objeto->id}}?subclase=cotizacion_contrato_servicio&clase=CCS" type="button" class="btn btn-primary btn-xs" title="SUBIR COTIZACION"><i class="material-icons">cloud_upload</i></a>
					@endcan
				@endif
			@endif
				@if($objeto->deleted_at)
                    @can('acceso','cotizaciones_contratos.destroy')
							{!! Form::model($objeto, ['route'=>['cotizaciones_contratos.destroy',$objeto->id],'method'=>'DELETE']) !!}
			                    <div class="panel-footer"> 
			                            <button type="submit" class="btn btn-raised btn-danger btn-xs"><i class="material-icons">restore</i></button>
			                    </div>
		            	    {!! Form::close() !!}
                    @endcan
				@endif
			</td><!-- 4-->
			<td><!-- detalles-->
			@if(!$objeto->deleted_at)	                
			@endif
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

@extends('app')
@section('content')
{!! Form::model(Request::all(),['route'=>'expendios.index','method'=>'GET']) !!}
	@include('expendios.partials.FormBuscarExp')
{!! Form::close() !!}
{!! $objetos->appends($request->all())->render() !!}
	<div class="panel panel-info">
	<div class='panel-heading'><i class='material-icons'>note_add</i>TOTAL: {{$objetos->total()}} </div>
		<div class='panel-body'>
		<div style="height: 600px; overflow: scroll">
    		<table border=0 class="table table-striped"><thead>
    			<tr>
					<th>{!!util::lnkOr($request->all(),'folio','FOLIO')!!} </th>
					<th>{!!util::lnkOr($request->all(),'nombre_fiscal','CLIENTE')!!}</th>
					<th>{!!util::lnkOr($request->all(),'estatus','ESTATUS')!!}</th>
					<th>{!!util::lnkOr($request->all(),'coordinacion','COORDINACION')!!}</th>	
					<th>{!!util::lnkOr($request->all(),'marca')!!}</th>
					<th>{!!util::lnkOr($request->all(),'modelo')!!}</th>
					<th>{!!util::lnkOr($request->all(),'numero_serie')!!}</th>					
					<th>{!!util::lnkOr($request->all(),'folio_contrato_venta','CONTRATO VENTA')!!}</th>
					<th>{!!util::lnkOr($request->all(),'fecha_inicio','FECHA INCIO GARANTIA')!!}</th>
					<th>{!!util::lnkOr($request->all(),'fecha_fin','FECHA FIN GARANTIA')!!}</th>
					<th></th>
					<th></th>
					<th></th>
				</tr></thead>
    @foreach($objetos as $objeto)
        <tr>
			<td>{!! $objeto->folio!!}</td>
			<td>{!! $objeto->nombre_fiscal!!}</td>
			<td>{!! $objeto->estatus!!}</td>
			<td>{!! $objeto->coordinacion!!}</td>
			<td>{!! $objeto->marca!!}</td>
			<td>{!! $objeto->modelo!!}</td>
			<td>{!! $objeto->numero_serie!!}  {!! $objeto->dato!!}</td>
			<td>{!! $objeto->folio_contrato_venta!!}</td>
			<td>{!! $objeto->fecha_inicio!!}</td>
			<td>{!! $objeto->fecha_fin!!}</td>
			<td>
			@can('acceso','expendios.edit')
				@if($objeto->estatus!='CERRADO')
					@if(!$objeto->deleted_at)
					<a href="{{ route('expendios.edit', $objeto->id)}}" type="button" class="btn btn-warning btn-xs" title="ACTUALIZA EQUIPO"><i class="material-icons">cached</i></a>
					@endif
				@endif
			@endcan
			@can('acceso','expendios.completar')
				@if($objeto->estatus!='CERRADO')
					@if(!$objeto->deleted_at)
					<a href="{{ route('expendios.completar', $objeto->id)}}" type="button" class="btn btn-primary btn-xs" title="COMPLETAR CAMPOS DE EQUIPO"><i class="material-icons">cached</i></a>
					@endif
				@endif
			@endcan
			</td>
			<td>
				@if($objeto->deleted_at)
						{!! Form::model($objeto, ['route'=>['expendios.destroy',$objeto->id],'method'=>'DELETE']) !!}
		                            <button type="submit" class="btn btn-raised btn-danger btn-xs"><i class="material-icons">restore</i></button>
	            	    {!! Form::close() !!}
				@endif
			</td>
			<td>
			@if(!$objeto->deleted_at)
				@can('acceso','expendios.procesar')
					@if($objeto->estatus=='GUARDADO' && $objeto->deleted_at=='')
						{!! Form::model($objeto,['method'=>'PUT','action'=>['ExpendioController@procesar',$objeto->id]]) !!}
			    	    		@include('partials.FormCerrar')
			    	    {!! Form::close() !!}
					@endif
				@endcan
				{{--SERIE DIGITALIZAR--}}
				@if(count($objeto->digitalizaciones)>0){{--hay SERIE digitalizada--}}
							<a href="{{ route('digitalizaciones.show',$objeto->digitalizaciones[0]->id)}}" type="button" class="btn btn-warning btn-xs" title="VER SERIE"><i class="material-icons">cloud_download</i>{{$objeto->digitalizaciones[0]->digitalizacion}}</a>
				@else{{--NO hay SERIE digitalizada, hay q digitalizar--}}
					@can('acceso','digitalizaciones.create')
						<a href="digitalizaciones/create/{{$objeto->id}}?subclase=X&clase=X" type="button" class="btn btn-primary btn-xs" title="SUBIR SERIE"><i class="material-icons">cloud_upload</i></a>
					@endcan
				@endif
			@endif
			{{--INICIO VISLUMBRAR DETALLES--}}
			<br>
			{!! link_to_route('expendios.show','VER',['id'=>$objeto->id]) !!}
			{{--FIN VISLUMBRAR DETALLES--}}
			@if(!$objeto->deleted_at)
	            {!! Form::model($objeto, ['route'=>['expendios.destroy',$objeto->id],'method'=>'DELETE']) !!}
	                    
	                        @can('acceso','expendios.destroy')
	                            
	                                <button type="submit" class="btn btn-raised btn-danger btn-lg"><i class="material-icons">delete</i></button>
	                            
	                        @endcan
	            {!! Form::close() !!}
            @endif
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
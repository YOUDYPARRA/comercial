@extends('app')
@section('content')
<h4><small>LISTADO </small></h4>
    <table border=1 class="table table-striped"><thead><tr>
<td>Reporte</td>	
<td>Número contrato</td>	
<td>Número cotizacion</td>	
<td>Número orden_servicio</td>	
<td>Número orden_compra</td>	
<td>Número orden_venta</td>	
<td>Archivo digital</td>	
</tr></thead>
    
    @foreach($objetos as $objeto)	
<td>{!! $objeto->reporte!!}</td>	
<td>{!! $objeto->numero_contrato!!}</td>	
<td>{!! $objeto->numero_cotizacion!!}</td>	
<td>{!! $objeto->numero_orden_servicio!!}</td>	
<td>{!! $objeto->numero_orden_compra!!}</td>	
<td>{!! $objeto->numero_orden_venta!!}</td>	
<td>
	@if($objeto->archivo_digital)
					@can('acceso','remisiones.digital')
						<a href="{{ route('remisiones.digital',$objeto->id)}}" type="button" class="btn btn-warning" title="VER ARCHIVO"><i class="material-icons">cloud_download</i></a>
					@endcan
	@else
					@can('acceso','remisiones.digital')
							<a href="remisiones/digitalizar/{{$objeto->id}}" type="button" class="btn btn-primary" title="SUBIR ARCHIVO"><i class="material-icons">cloud_upload</i></a>
					@endcan
	@endif
</td>	
</tr>
    @endforeach
</table>
@endsection

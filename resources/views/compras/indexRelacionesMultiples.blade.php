@extends('app')
@section('content')
@include('compras.partials.FormBuscar')
			<div class="panel panel-info">
				<div class='panel-heading panel-info' > LISTADO COMPRAS <span class="badge">{{ $objetos->total() }}</span></div>
				<div class='panel-body'>

    <table border=0 class="table table-striped"><thead>
    <tr>
    <!--<td>id</td>	-->
<td>No. Orden</td>	
<td>Cotización</td>	
<td>Documento</td>	
<td>Vendedor</td>	
<td>Cliente</td>	
<td>Fecha pedido</td>	
<td>Fecha embarque</td>	
<td>Observaciónes</td>	
<td>Editar</td>
<td>Estatus</td>
<td>Pdf</td>
<td>Eliminar</td>
</tr></thead>
    @foreach($objetos as $objeto)
        <tr>
	      <!--  <td>{!! $objeto->id!!}</td>-->
			<td>{!! $objeto->numero_orden!!} {!! $objeto->rel_compras->numero_orden!!}</td>
			<td>{!! $objeto->numero_cotizacion!!} {!! $objeto->rel_compras->numero_cotizacion!!}</td>
			<td>{!! $objeto->tipo_documento!!} {!! $objeto->rel_compras->tipo_documento!!}</td>
			<td>{!! $objeto->vendedor!!} {!! $objeto->rel_compras->vendedor!!}</td>
			<td>{!! $objeto->nombre_cliente!!} {!! $objeto->rel_compras->nombre_cliente!!}</td>
			
			<td>{!! $objeto->fecha_pedido!!} {!! $objeto->rel_compras->fecha_pedido!!}</td>
			<td>{!! $objeto->fecha_embarque!!} {!! $objeto->rel_compras->fecha_embarque!!}</td>
			<td>
			@can('acceso','compras.estatus')
				@if($objeto->estatus!='CANCELADO')
					{!! Form::model($objeto,['method'=>'PUT','action'=>['CompraController@estatus',$objeto->id]]) !!}
	                    <!--<div class="panel-footer"> -->
	                    {!! Form::textarea('observaciones',$objeto->nota. $objeto->rel_compras->nota,['size'=>'10x1'])!!}
	                        <button type="submit" class="btn btn-info btn-lg"><i class="material-icons">message</i></button>
	                    <!--</div>-->
	                {!! Form::close() !!}
	            @else
	                    {!! Form::textarea('observaciones',$objeto->nota. $objeto->rel_compras->nota,['readonly'=>'readonly','size'=>'10x1'])!!}
	            @endif
			@endcan
			</td>
			<td>
			@can('acceso','compras.edit')
				@if(isset($buscar))
					<a href="{{ route('compras.edit', $objeto->id)}}" type="button" class="btn btn-warning" title="ACTUALIZAR ORDEN COMPRA"><i class="material-icons">cached</i></a></td>

				@else
					<a href="{{ route('compras.edit', $objeto->rel_compras->id)}}" type="button" class="btn btn-warning" title="ACTUALIZAR ORDEN COMPRA"><i class="material-icons">cached</i></a></td>
				
				@endif
			@endcan
			<td>
			@can('acceso','compras.estatus')
				@if(isset($buscar))
					@if($objeto->calificacion->calificacion=='GUARDADO')
						{!! Form::model($objeto,['method'=>'PUT','action'=>['CompraController@estatus',$objeto->id]]) !!}
							@include('compras.partials.estatus.FormEnviar')
						{!!Form::close()!!}
					@endif
				@else
				{{$objeto->calificacion}}
					@if($objeto->calificacion=='GUARDADO')
						{!! Form::model($objeto,['method'=>'PUT','action'=>['CompraController@estatus',$objeto->rel_compras->id]]) !!}
							@include('compras.partials.estatus.FormEnviar')
						{!!Form::close()!!}
					@endif
				
				@endif
			
				
			@endcan
				</td>
			<td>
			@if(isset($buscar))
				<button type="button" class="btn btn-info btn-lg" ng-controller="CompraPdfCtrl" ng-click="openOrdenCompra({{$objeto->id}})" title="VER ORDEN COMPRA"><i class="material-icons">picture_as_pdf</i></button></td>
			@else
				<button type="button" class="btn btn-info btn-lg" ng-controller="CompraPdfCtrl" ng-click="openOrdenCompra({{$objeto->rel_compras->id}})" title="IMPRIMIR ORDEN COMPRA"><i class="material-icons">picture_as_pdf</i></button></td>
			@endif
			<td>
			@can('acceso','compras.show')
				@if(isset($buscar))
					@if($objeto->calificacion->calificacion=='GUARDADO')
							<a href="{{ route('compras.show', $objeto->id)}}" type="button" class="btn btn-danger"><i class="material-icons">delete</i></a>
					@endif
				@else
					@if($objeto->calificacion=='GUARDADO')
						<a href="{{ route('compras.show', $objeto->rel_compras->id)}}" type="button" class="btn btn-danger"><i class="material-icons">delete</i></a>
					@endif
				@endif
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

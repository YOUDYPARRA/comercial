@extends('app')
@section('content')
@include('equipos.partials.FormBuscar')
			<div class="panel panel-info">
				<div class='panel-heading panel-info' > LISTADO STOCK EQUIPOS <span class="badge"></span></div>
				<div class='panel-body'>

    <table border=0 class="table table-striped"><thead>
    <tr>
<td>Código</td>	
<td>Descripcion</td>	
<td>Almacen</td>	
<td>Únidad de medida</td>	
<td>Cant.</td>	
<td>Únidad de medida</td>	
<td>Cant.</td>	
</tr></thead>
    @foreach($objetos as $objeto)
        <tr>
        @if($objeto->codigo_proovedor)
	      	<td>{{$objeto->codigo_proovedor}}</td>
        @else
        <td></td>
	      	@endif
	      	<td>{{$objeto->descripcion}}</td>
	      	<td>{{$objeto->almacen}}</td>
	      	<td>{{$objeto->primer_nombre_uom}}</td>
	      	<td>{{$objeto->primer_qty}}</td>
	      	<td>{{$objeto->segundo_nombre_uom}}</td>
	      	<td>{{$objeto->segundo_qty}}</td>
		</tr>
    @endforeach
</table>
</div>
@endsection

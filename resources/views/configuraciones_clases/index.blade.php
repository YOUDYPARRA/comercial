@extends('app')
@section('content')
<div class="panel panel-info">
		<div class='panel-heading panel-info'> LISTADO CONFIGURACION CLASE: <span class="badge">TOTAL: {{$objetos->total()}}</span></div>
		<div class='panel-body'>
    		<table border=0 class="table table-striped">
    			<tr>
					<th>Organizacion</th>
    				<th>Id</th>
					<th>Id foraneo</th>
					<th>Condicionante</th>
					<th>Condicion</th>
					<th>Objeto</th>
					<th>SubObjeto</th>
					<th>clase</th>
					<th>Subclase</th>
					<th>clasificacion</th>
					<th></th>
				</tr>
    			@foreach($objetos as $objeto)
        		<tr>
					<td>{!! $objeto->organizacion!!}</td>
        			<td>{!! $objeto->id!!}</td>
					<td>{!! $objeto->id_foraneo!!}</td>
					<td>{!! $objeto->condicionante!!}</td>
					<td>{!! $objeto->condicion!!}</td>
					<td>{!! $objeto->objeto!!}</td>
					<td>{!! $objeto->subobjeto!!}</td>
					<td>{!! $objeto->clase!!}</td>
					<td>{!! $objeto->subclase!!}</td>
					<td>{!! $objeto->clasificacion!!}</td>
					<td>
						<a href="{{ route('configuracion_clase.edit', $objeto->id)}}" type="button" class="btn btn-warning btn-xs" title="MODIFICAR" ><i class="material-icons">cached</i></a>
						<a href="{{ route('configuracion_clase.destroy', $objeto->id)}}" type="button" class="btn btn-danger btn-xs" title="ELIMINAR" ><i class="material-icons">deleted</i></a>
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

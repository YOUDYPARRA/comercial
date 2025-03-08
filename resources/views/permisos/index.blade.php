@extends('app')
@section('content')
<div class="container" >
<div class="panel-heading">PERMISOS</div>

<p>TOTAL: {{ $objetos->total()}}</p>
{!! $objetos->render() !!}

	<div class="panel-body">
		<table border="0" class="table table-striped table-condensed" ng-controller="permisoCtrl">

						<thead>
							<tr>
								
                                                            <th><%permiso.vista=2%>#</th>	
                                                            <th>NOMBRE</td>	
                                                            <th>RECURSO</td>	
                                                            <th>ETIQUETA RECURSO</td>	
                                                            <th>MENU</td>	
                                                            <th>OBSERVACION</th>	
                                                            <th></th>	
							</tr>
						</thead>
							@foreach($objetos as $key=>$objeto)
							<tr>
								
								<td>{!! $objeto->id!!}</td>	
								<td>{!! $objeto->nombre!!}</td>	
								<td>{!! $objeto->recurso!!}</td>
                                                                @if(count($objeto->relacion_recurso)>0)
								<td>{!! $objeto->relacion_recurso->etiqueta!!}</td>	
                                                                @else
                                                                    <td></td>
                                                                @endif
                                                                @if(count($objeto->menu)>0)
                                                                <td>{!!$objeto->menu->menu!!}</td>
                                                                @else
                                                                <td></td>
                                                                @endif
								<td>{!! $objeto->observacion!!}</td>	
								<td>
								<a href="{{ route('permisos.edit', $objeto->id)}}" type="button" class="btn btn-primary"><i class="material-icons">cached</i>EDITAR</a>
								<span type="button" class="btn btn-danger" ng-init="recurso[{{$key}}].id={{ $objeto->id }}"  ng-click="elimina(recurso[{{$key}}])"><i class="material-icons">delete</i> </span>
								
								</td>
							</tr>
 							@endforeach
					</table>

	</div>
{!! $objetos->render() !!}
</div>
@endsection
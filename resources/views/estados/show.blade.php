@extends('app')
@section('content')
<div class="container" >
<div class="panel-heading">RECURSO</div>

@include('estados.partials.Buscar')
	<div class="panel-body">
		<table border="0" class="table table-striped table-condensed" ng-controller="recursoCtrl">
			<thead>
				<tr>
                    <th>ID</td>
                    <th>ORGANIZACION</td>
                    <th>#</td>
                    <th>CLASE</td>
                    <th>SUBCLASE</td>
                    <th>ESTADO</td>
                    <th>CONDICIONANTE</td>
                    <th>CONDICION</td>
                    <th>APROBACION</td>
                    <th>ETIQ.APROBACION</td>
                    <th>DESAPROBACION</td>
                    <th>ETIQ.DESAPROBACION</td>
                    <th></td>
				</tr>
			</thead>
			@foreach($objetos->avisos as $key=>$objeto)
			<tr>
                <td>{!! $objeto->id !!}</td>
				<td>{!! $objeto->organizacion !!}</td>
				<td>{!! $objeto->id_foraneo !!}</td>
                <td>{!! $objeto->clase !!}</td>
                <td>{!! $objeto->subclase !!}</td>
                <td>{!! $objeto->estado !!}</td>
                <td>{!! $objeto->condicionante !!}</td>
                <td>
                    {!! $objeto->condicion !!}
                </td>
                <td>{!! $objeto->aprobacion !!}</td>
                <td>{!! $objeto->etiqueta_aprobacion !!}</td>
                <td>{!! $objeto->desaprobacion !!}</td>
                <td>{!! $objeto->etiqueta_desaprobacion !!}</td>
                <td>
                    {!! Form::model($objeto, ['route'=>['estado.show',$objeto->id],'method'=>'GET']) !!}
                        <button type="submit" class="btn btn-raised btn-primary btn-sm"><i class="material-icons">list</i></button>
                    {!! Form::close() !!}
										@can('acceso','estado.edit')
                        {!! link_to_route('estado.edit','Editar',['id'=>$objeto->id]) !!}
                    @endcan
                </td>
			</tr>
				@endforeach
	</table>

	</div>
</div>
@endsection

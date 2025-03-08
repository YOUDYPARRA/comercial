@extends('app')
@section('content')
<div class="container" >
<div class="panel panel-info">
<div class="panel-heading">BUSCAR RECURSO</div>
<div class="panel-body">
{!! Form::model(Request::all(),['route'=>'recursos.index','method'=>'GET']) !!}

<div class="row">
    <div class="col-md-3">
        <div class="form-group has-info">
            <label class="control-label">RECURSO</label>
            {!! Form::text('recurso',null,array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group has-info">
            <label class="control-label">MENU</label>
            {!! Form::text('menu',null,array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group has-info">
            <label class="control-label">ETIQUETA</label>
            {!! Form::text('etiqueta',null,array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label></label>
            <button type="submit" class="btn btn-info btn-lg" ><i class="material-icons">search</i>BUSCAR</button>
		</div>
	</div>
</div>
{!! Form::close() !!}
</div>
</div>
<div class="panel-footer">
	{!! $objetos->render() !!}
</div>

<div class="panel panel-info">
	<div class="panel-heading">RECURSOS TOTAL: <span class="badge badge-danger">{{ $objetos->total()}}</span></div>
	<div class="panel-body">
		<table border="0" class="table table-striped table-condensed" ng-controller="recursoCtrl">
			<thead>
				<tr>
					<th>#</th>	
                    <th>RECURSO</th>
                    <th>MENU</th>
                    <th>ETIQUETA</th>
					<th>OBSERVACION</th>	
					<th></th>	
				</tr>
			</thead>
			@foreach($objetos as $key=>$objeto)
				<tr>
					<td>{!! $objeto->id!!}</td>	
					<td>{!! $objeto->recurso!!}</td>
                    @if(count($objeto->menu)>0)
                        <td>{!! $objeto->menu->menu !!}</td>
                    @else
                        <td></td>
                    @endif
                    <td>{!! $objeto->etiqueta !!}</td>
					<td>{!! $objeto->observacion!!}</td>	
					<td>
                        @can('acceso','recursos.show')
                            <a href="{{ route('recursos.show', $objeto->id)}}" type="button" class="btn btn-info" title="CONFIGURAR AVISO"><i class="material-icons">edit</i><span class="badge badge-info"> {{$objeto->aviso}} </span></a>
                        @endcan
					</td>
					<td>
                        @can('acceso','recursos.edit')
                            <a href="{{ route('recursos.edit', $objeto->id)}}" type="button" class="btn btn-warning" title="EDITAR"><i class="material-icons">cached</i></a>
                        @endcan
					</td>
					<td>
                        @can('acceso','recursos.destroy')
                            <a type="button" class="btn btn-danger" ng-init="recurso[{{$key}}].id={{ $objeto->id }}" title="ELIMINAR"  ng-click="eliminar(recurso[{{$key}}])"><i class="material-icons">delete</i> </a> 
						@endcan
					</td>
				</tr>
 			@endforeach
		</table>
	</div>
	<div class="panel-footer">
		{!! $objetos->render() !!}
	</div>
</div>
</div>
@endsection
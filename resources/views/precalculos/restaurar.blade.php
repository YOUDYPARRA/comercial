@extends('app')
@section('content')
<h4><small>LISTADO </small></h4>
{!!$objetos->paginado!!}
{!! Form::model(Request::all(),['route'=>'precalculos.index','method'=>'GET']) !!}
<div class="col-sm-4">
    <div class="form-group">
    {!! Form::hidden('vi',0,array('class'=>'form-control','size'=>'5')) !!}
        <label>MODELO</label>
        {!! Form::text('modelo',null,array('class'=>'form-control','size'=>'15')) !!}
    </div>
</div>
<div class="col-sm-4">
    <div class="form-group">
        <label>NUMERO PROYECTO</label>
        {!! Form::text('numero_proyecto',null,array('class'=>'form-control','size'=>'15')) !!}
        
    </div>
</div>
<div class="col-sm-4">
    <div class="form-group">
            <label>FECHA CREACION</label>
            {!! Form::text('created_at',null,array('class'=>'form-control','size'=>'15')) !!}       
    </div>
    {!! Form::close() !!}
</div>
    <table border="0" class="table table-striped table-condensed" ng-controller="PrecalculoCtrl">
        <thead>
	<tr>
            <td>Número proyecto</td>	
            <td>Modelo equipo</td>
            <td>Fecha creación</td>
            <td></td>
	</tr>
	</thead>
    
    @foreach($objetos as $objeto)
        <tr>
            <td>{!! $objeto->id!!}</td>	
            <td>{!! $objeto->modelo_insumos!!}</td>
            <td>{!! $objeto->created_at!!}</td>
            <td><span type="button" class="btn btn-danger" ng-init="precalculo[{{$key}}].id={{ $objeto->id }}"  ng-click="restaurar(precalculo[{{$key}}])"><i class="material-icons">settings_backup_restore</i> </span></td>
        </tr>
    @endforeach
</table>
{!!$objetos->paginado!!}
@endsection

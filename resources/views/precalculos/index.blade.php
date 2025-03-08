@extends('app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-16 col-md-offset-0">
            <div class="panel panel-default" >
                <div class='panel-heading'><%confApr.headerCre%></div>
                    <div class='panel-body'>
{!!$objetos->render()!!}
{!! Form::model(Request::all(),['route'=>'precalculos.index','method'=>'GET']) !!}
<div class="row">
<div class='col-md-3'>        
<div class="form-group label-floating has-info">
	<label class='control-label'>FECHA CREACION</label>{!! Form::text('created_at',null,array('class'=>'form-control','size'=>'5')) !!}
</div>
</div>
<div class='col-md-3'>  
<div class="form-group label-floating has-info">      
	<label class='control-label'>NUMERO PROYECTO</label>{!! Form::text('numero_proyecto',null,array('class'=>'form-control','size'=>'5')) !!}
</div>
</div>
<div class='col-md-3'>        
<div class="form-group label-floating has-info">
	<label class='control-label'>PRECIO VENTA</label>{!! Form::text('modelo',null,array('class'=>'form-control','size'=>'5')) !!}
</div>
</div>

</div>
{!! Form::close() !!}
<table border=0 class="table table-striped" ng-controller="PrecalculoCtrl"><thead>
	    <tr>
	    	<th>Fecha de Creación</th>
			<th>NÚmero proyecto</th>	
			<th>Precio de Venta</th>	
			<th></th>
		</tr>
	</thead>
    
    @foreach($objetos as $objeto)
        <tr>
	        <td>{!! $objeto->created_at!!}</td>	
			<td>{!! $objeto->numero_proyecto!!}</td>	
			<td>{!! $objeto->precio_venta!!}</td>	
                        
			<td>
                            @can('acceso','precalculos.edit')
                                <a type="button" href="{{ route('precalculos.edit', $objeto->id)}}"  class="btn btn-warning" title="ACTUALIZAR"><i class="material-icons">cached</i></a>
                            @endcan
                            @can('acceso','precalculos.destroy')
                                <span type="button" class="btn btn-danger" ng-init="precalculo[{{$key}}].id={{ $objeto->id }}"  ng-click="eliminar(precalculo[{{$key}}])"><i class="material-icons">delete</i> </span>
                            @endcan
                        </td>
		</tr>
    @endforeach
</table>

					</div>
                    <div class="panel-footer"> 
                       <!-- <a type="button" class="btn btn-raised btn btn-info" href="{{ route('cotizaciones.create') }}"><i class="material-icons">person_add</i> AGREGAR</a>-->
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection

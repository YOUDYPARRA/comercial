@extends('app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-14 col-md-offset-0">
			<div class="panel panel-info">
				<div class="panel-heading">CONTRATOS DE COMPRA VENTA</div>
				<div class="panel-body">
{!!$objetos->paginado!!}
{!! Form::model(Request::all(),['route'=>'contratos_compra_venta.index','method'=>'GET']) !!}
<table border="0" class="table table-striped">
    <thead><tr>
	    <td>
	    </td>	
		<td>
			<div class="form-group label-floating has-info">
            	<label class="control-label" for="numero_contrato_compra_venta">No. Contrato</label>
                {!! Form::text('numero_contrato_compra_venta',null,array('class'=>'form-control','size'=>'5')) !!}
                {!! Form::hidden('vi',0,array('class'=>'form-control','size'=>'5')) !!}
                
            </div>
        </td>
	    <td>
	    </td>		
	    <td>
	    </td>		
	
		<td>
				<button type="submit" class="btn btn-info btn-lg" ><i class="material-icons">search</i>BUSCAR</button>
		</td>	
	</tr></thead>

{!! Form::close() !!}

<!--FIN DE BUSQUEDA!-->
<!--INICIA INDEXADO!-->
    <table border="0" class="table table-striped" ng-controller="ContratoCompraVentaCtrl">
    <thead><tr>
	    <th>NO. COTIZACIÓN</th>	
		<th>NO. CONTRATO</th>	
	    <th>FECHA</th>		
	    <th>NOMBRE FISCAL</th>		

		<th></th>	
</tr>
</thead>
    
    @foreach($objetos as $key =>$objeto)
<tr>
			<td>{!! $objeto->cotizacion->numero_cotizacion!!}</td>	
			<td>{!! $objeto->numero_contrato_compra_venta !!}</td>
			<td>{!! $objeto->cotizacion->fecha !!}</td>	
			<td>{!! $objeto->cotizacion->nombre_fiscal!!}</td>
			<td>
                            <span type="button" class="btn btn-danger" ng-init="contrato_compra_venta[{{$key}}].id={{ $objeto->id }}"  ng-click="restaurar(contrato_compra_venta[{{$key}}])"><i class="material-icons">settings_backup_restore</i> </span>
			</td>	
</tr>
    @endforeach
</table>
{!!$objetos->paginado!!}
				</div>
				<div class="panel-footer"> 
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
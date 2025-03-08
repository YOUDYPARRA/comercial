@extends('app')
@section('content')
<div class="container" ng-controller="stockControlCtrl">
<div class="row" ng-init="id='{{$id}}'">
	<label><%insumo.marca%></label>
	<label><%insumo.descripcion%></label>
	<label><%insumo.codigo_proovedor%></label>
	<label><%insumo.unidad_medida%></label>
</div>
<div class="contianer">
	<div class="row">
		<table class="table table-striped table-bordered table-list table-responsive">
				<thead>
						<tr>
								<th>CODIGO PROVEEDOR</th>
								<th>ORGANIZACION</th>
								<th>ALMACEN</th>
								<th>% SEGURIDAD</th>
								<th>PUNTO DE PEDIDO</th>
								<th>AVISO</th>
								<th>ELIMINAR</th>
								<th>VER MAXIMO</th>
						</tr>
				</thead>
				<tbody>
						<tr ng-repeat="almacen in almacenes_stock">
								<td><%almacen.codigo_proovedor%></td>
								<td><%almacen.org_name%></td>
								<td><%almacen.almacen%></td>
								<td><%almacen.porcentaje_seguridad%></td>
								<td><%almacen.punto_pedido%></td>
								<td><%almacen.aviso%></td>
								<td>
									<button ng-click="salElim(almacen)">Eliminar</button>
								</td>
								<td>
									<button ng-click="verMinimo(almacen)">Calcular</button>
								</td>
						</tr>
				</tbody>
		</table>
	</div>
</div>
<div class="row">
	<div class="col-md-2">
		<div class='form-group'>
			<h5>CODIGO PROVEEDOR <span class="label label-default"></span></h5>
		</div>
		<div class='form-group'>
			{!! Form::text('codigo_proovedor',null,array('ng-model'=>'objeto.codigo_proovedor','required'=>'','class'=>'form-control','id'=>'codigo_proovedor','readonly'=>'readonly')) !!}
		</div>
	</div>
	<div class="col-md-2">
		<div class='form-group'>
			<h5>TIEMPO PROVEEDOR<span class="label label-default">(DIAS)</span></h5>
		</div>
		<div class='form-group'>
			{!! Form::text('tiempo_respuesta',null,array('ng-model'=>'objeto.tiempo_respuesta','required'=>'','class'=>'form-control','id'=>'tiempo_respuesta','readonly'=>'readonly')) !!}
		</div>
	</div>
	<div class="col-md-2">
		<div class='form-group'>
			<h5>% NIVEL DE SEGURIDAD 
			<span class="label label-default">Mayor a 50%</span>
			</h5>
		</div>
		<div class='form-group'>
			{!! Form::text('porcentaje_seguridad',null,array('ng-model'=>'objeto.porcentaje_seguridad','required'=>'','class'=>'form-control','id'=>'porcentaje_seguridad')) !!}
		</div>
	</div>
	<div class="col-md-2">
		<div class='form-group'>
			<h5>ALMACEN <span class="label label-default"></span></h5>
		</div>
		<div class='form-group'>
			<select name="id_warehouse" ng-model="objeto.id_warehouse" ng-options="almacen.m_warehouse_id as almacen.name for almacen in tipos_almacen.objetos | orderBy:'name'" class="form-control" ng-change="slcAlmacen()">
                     <option >Elegir. . .</option>
                </select>
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-group has-info">
            <h5>AVISO PUNTO PEDIDO <span class="label label-default"></span></h5>
            {!! Form::select('unidad_medida',['SI'=>'SI','NO'=>'NO'],null,['class'=>'text-info','class'=>'form-control','required'=>'','size'=>'2','ng-model'=>'objeto.aviso']) !!}
        </div>
	</div>
	<div class="col-md-1">
		<div class='form-group'>
			<h5>PUNTO DE PEDIDO:<span class="label label-default"><% objeto.punto_pedido%></span></h5>
			{!! Form::text('punto_pedido',null,array('ng-model'=>'objeto.punto_pedido','ng-click'=>'noCalcularStock()','class'=>'form-control')) !!}
		</div>
	</div>
	<div class="col-md-1">
		<div class='form-group'>
			<h5>MAXIMO Cant. Vta.<span class="label label-default"></span></h5>
			{!! Form::text('maximo',null,array('ng-model'=>'objeto.maximo','class'=>'form-control')) !!}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-2">
		<div class="btn-group btn-group-lg" role="group" aria-label="...">
		   <button type="button" class="btn btn-success" ng-click="calcularStoclk()">Calcular</button>
  			<button type="button" class="btn btn-primary" ng-click="guardar()">Guardar</button>
		</div>
	</div>
	<div class="col-md-2">
		   <h6>Existencia Actual:</h6><span class="label label-default"><%objeto.stock_actual%></span>
		   <h6>Maximo en Compra:</h6><span class="label label-default"><%objeto.cantidad_compra%> <%objeto.unidad_compra%></span>		
	</div>
</div>

</div>
@endsection
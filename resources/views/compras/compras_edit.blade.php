@extends('app')
@section('content')
<div class="container" ng-controller="CompraCtrl">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-info">
				<div class='panel-heading'><i class='material-icons'>note_add</i> EDITAR ORDEN COMPRA: <span class="badge"> <%compra_venta.folio%></span> <span class="badge" ng-if="compra_venta.version > 0"> <%version%> <%compra_venta.version%></span></div>
		        <div class='panel-body' ng-init="inicio();puesto='{{Auth::user()->puesto}}';getCompraVenta('{{$id}}');">
                {!! Form::open(array('name'=>'formCompra')) !!} 
                    @include('compras_ventas.partials.ComprasVentas_datosForm')
                    @include('compras_ventas.partials.ComprasVentas_proovedorForm')
                    @include('compras_ventas.partials.ComprasVentas_BuscarInsumosForm')
                    @include('compras_ventas.partials.ComprasVentas_insumosForm')
                    @include('compras_ventas.partials.ComprasVentas_agenteForm')
        		</div>
        		<div class='panel-footer'> 
            		<button type="button" class="btn btn-raised btn-info btn-lg" ng-click="actualizar()" ng-if="up" ng-disabled="save||formCompra.$invalid"><i class="material-icons">save</i>ACTUALIZAR<span ng-show="msjActualizar" class="badge badge-warning">Actualizando ...</span> </button>
                    <span><%msge%></span>
                    <button type="button" class="btn btn-raised btn-info btn-lg" ng-click="guardar('Y')" ng-if="sa" ng-disabled="save||formCompra.$invalid"><i class="material-icons">save</i>GUARDAR</button>
                    <span><%msj%></span>
                    <a href="{{ route('compras.index')}}" type="button" class="btn btn-success" title="IR A LA LISTA DE ORDEN DE COMPRA"><i class="material-icons">list</i></a>
        		</div>
                {!! Form::close() !!} 
   			</div>
            <!--{!! Form::close() !!} -->
        </div>
    </div>
</div>
@endsection
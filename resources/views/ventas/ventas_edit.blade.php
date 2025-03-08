@extends('app')
@section('content')
<div class="container" ng-controller="CompraCtrl">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
        <!--{!! Form::model($id, ['route'=>['compras.update',$id],'method'=>'PUT']) !!}-->
            <div class="panel panel-info">
				<div class='panel-heading'><i class='material-icons'>note_add</i> EDITAR ORDEN VENTA: <span class="badge"> <%compra_venta.folio%></span></div>
		        <div class='panel-body' ng-init="inicio();puesto='{{Auth::user()->puesto}}';getCompraVenta('{{$id}}');">
                {!! Form::open(array('name'=>'formVenta')) !!} 
                    @include('compras_ventas.partials.ComprasVentas_datosForm')
                    @include('compras_ventas.partials.ComprasVentas_proovedorForm')
                    @include('compras_ventas.partials.ComprasVentas_BuscarInsumosForm')
                    @include('compras_ventas.partials.ComprasVentas_insumosForm')
        		</div>
        		<div class='panel-footer'> 
            		<button type="button" class="btn btn-raised btn-info btn-lg" ng-click="actualizarVenta()" ng-disabled="save||formVenta.$invalid"><i class="material-icons">save</i>ACTUALIZAR<span ng-show="msjActualizar" class="badge badge-warning">Actualizando ...</span> </button>
                    <span><%msge%></span>
                    <a href="{{ route('ventas.index')}}" type="button" class="btn btn-success" title="IR A LA LISTA DE ORDENES DE VENTA"><i class="material-icons">list</i></a>
                {!! Form::close() !!} 
        		</div>
   			</div>
            <!--{!! Form::close() !!} -->
        </div>
    </div>
</div>
@endsection
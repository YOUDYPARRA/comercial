@extends('app')
@section('content')
<div class="container" ng-controller="CompraCtrl">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-info">
				<div class='panel-heading'><i class='material-icons'>note_add</i> CREAR ORDEN DE VENTA DESDE COTIZACION</div>
                <div class='panel-body' ng-init="inicio();autor='{{Auth::user()->name}}';get_tax_id('P');getCotizacion('{{$id}}','v')">
                {!! Form::open(array('name'=>'formVenta')) !!} 
                    @include('compras_ventas.partials.ComprasVentas_datosForm')
                    @include('compras_ventas.partials.ComprasVentas_proovedorForm')
                    @include('compras_ventas.partials.ComprasVentas_BuscarInsumosForm')
                    @include('compras_ventas.partials.ComprasVentas_insumosForm')
        		</div>
        		<div class='panel-footer'> 
            		<button type="button" class="btn btn-raised btn-info btn-lg" ng-click="guardarVenta()"ng-disabled="save || formVenta.$invalid"><i class="material-icons">save</i>GUARDAR</button> <span><%msg%></span>
                    <a href="{{ route('ventas.index')}}" type="button" class="btn btn-success" title="IR A LA LISTA DE ORDENES DE VENTA"><i class="material-icons">list</i></a>
                {!! Form::close() !!} 
                </div>
   			</div>
        </div>
    </div>
</div>
@endsection
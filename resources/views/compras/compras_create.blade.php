@extends('app')
@section('content')
<div class="container" ng-controller="CompraCtrl">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-info">
				<div class='panel-heading'><i class='material-icons'>note_add</i> CREAR ORDEN DE COMPRA DESDE COTIZACION <span class="badge"> <%compra_venta.folio%></span>
                </div>
                <div class='panel-body' ng-init="inicio();autor='{{Auth::user()->name}}';get_tax_id('P');getCotizacion('{{$id}}','c')">
                {!! Form::open(array('name'=>'formCompra')) !!} 
                    @include('compras_ventas.partials.FormFolio')
                    @include('compras_ventas.partials.ComprasVentas_datosForm')
                    @include('compras_ventas.partials.ComprasVentas_proovedorForm')
                    @include('compras_ventas.partials.ComprasVentas_BuscarInsumosForm')
                    @include('compras_ventas.partials.ComprasVentas_insumosForm')
                    @include('compras_ventas.partials.ComprasVentas_agenteForm')
                </div>
                <div class='panel-footer'> 
                <%objeto%>
            		<button type="button" class="btn btn-raised btn-info btn-lg" ng-click="guardar('N')" ng-disabled="save||formCompra.$invalid"><i class="material-icons">save</i>GUARDAR</button>
                    <span><%msg%></span>
                   <!-- <button type="button" ng-disabled="formCompraVenta.$invalid" class="btn btn-info btn-lg" ng-controller="CompraPdfCtrl" ng-click="openOrdenCompra(cot.id)" title="IMPRIMIR"><i class="material-icons">picture_as_pdf</i></button>-->
                   <a href="{{ route('compras.index')}}" type="button" class="btn btn-success" title="IR A LA LISTA DE ORDEN DE COMPRA"><i class="material-icons">list</i></a>
        		</div>
                {!! Form::close() !!} 
   			</div>
        
        </div>
    </div>
</div>
@endsection
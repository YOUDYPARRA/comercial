@extends('app')
@section('content')
<div class="container" ng-controller="CompraCtrl">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-info">
				<div class='panel-heading'><i class='material-icons'>note_add</i> CREAR NUEVA ORDEN DE COMPRA PARA <%organizacion%>: <span class="badge"> <%compra_venta.folio%></span></div>
                <div class='panel-body' ng-init="inicio();compra_venta.autor='{{Auth::user()->name}}';compra_venta.area='{{Auth::user()->area}}';compra_venta.departamento='{{Auth::user()->departamento}}';compra_venta.tipo_archivo='c';getSolicitud();">
                {!! Form::open(array('name'=>'formSolicitud')) !!} 
                    @include('compras_ventas.partials.FormFolio')
                    @include('compras_ventas.partials.ComprasVentas_datosForm')
                    @include('compras_ventas.partials.ComprasVentas_proovedorForm')
                    @include('compras_ventas.partials.ComprasVentas_BuscarInsumosForm')
                    @include('compras_ventas.partials.ComprasVentas_insumosForm')
                    @include('compras_ventas.partials.ComprasVentas_agenteForm')
                </div>
        		<div class='panel-footer'> 
            		<button type="button" class="btn btn-raised btn-info btn-lg" ng-click="guardar()" ng-disabled="save||formSolicitud.$invalid"><i class="material-icons">save</i>GUARDAR <span ng-show="msjGuardar" class="badge badge-warning">Enviando...</span></button>
                    <span><%msj%></span>
                    <a href="{{ route('compras.index')}}" type="button" class="btn btn-success" title="IR A LA LISTA DE ORDEN DE COMPRA"><i class="material-icons">list</i></a>
        		</div>
                {!! Form::close() !!} 
   			</div>
        
        </div>
    </div>
</div>
@endsection
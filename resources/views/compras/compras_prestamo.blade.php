@extends('app')
@section('content')
<div class="container" ng-controller="Compra_VentaCtrl">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
        
            <div class="panel panel-info">
				<div class='panel-heading'><i class='material-icons'>note_add</i> CREAR ORDEN DE COMPRA DESDE SOLICITUD EQUIPO/REFACCION <%d.objeto.reporte%> </div>
		        <div class='panel-body' ng-init="id={{$id}};tipo_archivo='c';prestamo='1';autor='{{Auth::user()->name}}';departamento='{{Auth::user()->departamento}}'">
                {!! Form::open(array('name'=>'formCompra')) !!} 
                    @include('compras_ventas.partials.ComprasVentas_datosForm')
                    @include('compras_ventas.partials.ComprasVentas_BuscarInsumosForm')
                    @include('compras_ventas.partials.ComprasVentas_insumosForm')
                    @include('compras_ventas.partials.ComprasVentas_proovedorForm')
                    @include('compras_ventas.partials.ComprasVentas_agenteForm')
                    @include('compras_ventas.partials.ComprasVentas_facturacionForm')
                </div>
                <div class='panel-footer'> 
                <%objeto%>
            		<button type="button" class="btn btn-raised btn-info btn-lg" title="GUARDAR" ng-click="guardar()" ng-disabled="save||formCompra.$invalid"><i class="material-icons">save</i></button>
                    <span><%msg%></span> 
                    <a href="{{ route('compras.index')}}" type="button" class="btn btn-success" title="IR A LA LISTA DE ORDEN DE COMPRA"><i class="material-icons">list</i></a>
        		</div>
                {!! Form::close() !!} 
   			</div>
        
        </div>
    </div>
</div>
@endsection
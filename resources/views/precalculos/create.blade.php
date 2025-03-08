@extends('app')
@section('content')
<div class="container" ng-controller="PrecalculoCtrl">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-info">
				<div class='panel-heading'><i class='material-icons'>nombre_icono</i> NUEVO </div>
		        <div class='panel-body'>
                <%precalculos.vista=0%>
                    @include('precalculos.partials.Form')
        		</div>
        		<div class='panel-footer'> 
            		<button type="button" class="btn btn-raised btn-info btn-lg" ng-click="guardar()"><i class="material-icons">save</i>GUARDAR</button>
                          <button type="submit" class="btn btn-warning btn-lg" title="ACTUALIZAR PRECIO DE VENTA EN LA COTIZACION" ng-click="actualizarPrecioVenta();"><i class="material-icons">cached</i>ACTUALIZAR PRECIO</button>
                    <!--<button type="button" class="btn btn-info btn-lg" ng-controller="CotizacionPdfCtrl" ng-click="openPrecalculoPdf()"><i class="material-icons"></i> PDF</button>-->
        		</div>
   			</div>
        </div>
    </div>
</div>
@endsection
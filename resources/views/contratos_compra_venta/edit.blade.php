@extends('app')
@section('content')
<div class="container" ng-controller="ContratoCompraVentaCtrl">
	<div class="row">
		<div class="col-md-13 col-md-offset-0">
			<div class="panel panel-info">
				<div class='panel-heading'><i class="material-icons">import_contacts</i> <%confCon.headerEditar%> NO:  <span class="badge"><%contrato_compra_venta.numero_contrato_compra_venta%> </span></div>
				<div class='panel-body'>
    <%contratos_compra_venta.vista=1%>
            @include('contratos_compra_venta.partials.Form')
  			    </div>
        		<div class="panel-footer"> 
       				<button type="submit" class="btn btn-raised btn-info btn-lg" ng-click="actualizar()"><i class="material-icons">save</i>ACTUALIZAR</button>
    			</div>	
            </div>
    	</div>
    </div>
</div>

@endsection

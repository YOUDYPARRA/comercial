@extends('app')
@section('content')
<div class="container" ng-controller="ContratoCompraVentaCtrl">
	<div class="row">
			<div class="panel panel-info">
				<div class='panel-heading'><i class="material-icons">import_contacts</i> <%confCon.headerCrear%></div>
    			<div class='panel-body'>
					<%contratos_compra_venta.vista=0%>
       				 @include('contratos_compra_venta.partials.Form')
        	</div>
        	<div class="panel-footer">
       			<button type="submit" class="btn btn-raised btn-info btn-lg" ng-click="guarda()"><i class="material-icons">save</i>GUARDAR</button>
            <a href="{{ route('contratos_compra_venta.index')}}" type="button" class="btn btn-success" title="IR A LA LISTA CONTRATOS VENTAS"><i  class="material-icons">list</i></a>
    			</div>	

        </div>
    	
    </div>
  </div>
@endsection

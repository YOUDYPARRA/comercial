@extends('app')
@section('content')
<div class="container" ng-controller="PagareCtrl">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-info">
                <div class='panel-heading'><i class="material-icons">local_atm</i> GENERAR NUEVO PAGARE </div>
                <div class='panel-body'>
                    <%pagare.vista=0%>
                    @include('pagares.partials.Form')
                </div>
                <div class="panel-footer"> 
                    <button type="submit" class="btn btn-raised btn-info btn-lg" ng-click="guardar()" ng-disabled="save"><i class="material-icons">save</i>GUARDAR</button>
                    <a href="{{ route('contratos_compra_venta.index')}}" type="button" class="btn btn-success" title="IR A LA LISTA CONTRATOS VENTAS"><i  class="material-icons">list</i></a>
                </div>
            </div>
        </div>
     </div>
  </div>
@endsection
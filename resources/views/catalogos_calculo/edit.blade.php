@extends('app')
@section('content')
<div class="container" ng-controller="catalogoCtrl">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-info">

    <div class='panel-heading'><i class='material-icons'>assignment</i> EDITAR DATOS DE CÁLCULO 
 <h1><div><% catalogo_calculo.modelo %></div></h1>
    </div>
        <%catalogo_calculo.vista=1%>
                <div class='panel-body'>
                    @include('catalogos_calculo.partials.Form')
                </div>
            <div class='panel-footer'> 
                <button type='button' class='btn btn-info btn-lg' ng-click='actualiza()'><i class='material-icons'>save</i> GUARDAR</button>                 
            </div>
        </div>
        </div>
    </div>
  </div>
@endsection

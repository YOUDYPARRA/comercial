@extends('app')
@section('content')
<div class="container" ng-controller="catalogoCtrl">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-info">
    
            <div class='panel-heading'><i class='material-icons'>assignment</i> CREAR DATOS DE CÁLCULO 
                <div class="form-group has-info">
                    <label class='control-label'><i class='material-icons'>create</i> MODELO</label>
                    <h1><div ng-init="catalogo_calculo.modelo='{{ $modelo }}';catalogo_calculo.usuario='{!! Auth::user()->iniciales !!}'"><% catalogo_calculo.modelo %></div></h1>
                </div>
            </div>
            <div class='panel-body'>
                @include('catalogos_calculo.partials.Form')
            </div>
            <div class='panel-footer'> 
            <button type="button" ng-controller="CotizacionPdfCtrl"  class="btn btn-warning btn-lg" ng-click="openPrecalculoPdf();"><i class="material-icons">blur_on</i>BORRAR</button>
                <button type='button' class='btn btn-info btn-lg' ng-click='guarda()'><i class='material-icons'>save</i> GUARDAR</button> 
            </div>
    
            </div>
        </div>
    </div>
  </div>
@endsection

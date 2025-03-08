@extends('app')
@section('content')
<div class='panel panel-default' ng-controller="PrecalculoCtrl">
    <div class='panel-heading'><i class='material-icons'>nombre_icono</i> EDITAR </div>
        
                <div class='panel-body'>
                    <h4><small>EDITAR </small></h4>
                    <%precalculos.vista=1%>
                    @include('precalculos.partials.Form')
                </div>
            <div class='panel-footer'> 
                <button type='button' class='btn btn-raised btn-warning btn-lg' ng-click='' confirm='are you sure?'><i class='material-icons'>save</i>GUARDAR</button> 
                
            </div>
</div>
@endsection

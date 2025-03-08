@extends('app')
@section('content')
<div class="container" ng-controller="expendioCtrl">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
        <div class="panel panel-info">
        <div class='panel-heading'><i class='material-icons'>note_add</i> CAPTURAR EQUIPO VENDIDO </div>
        <div class='panel-body'>
            <button type="button" class="btn btn-raised btn-primary btn-lg" data-toggle="modal" data-target="#gridSystemModal"><i class="material-icons">search</i> Buscar Fiscal </button>    
            <%objeto.id%>
{{--INICIO Modal--}}@include('partials.modals.tercerosDirecciones'){{--FIN Modal--}}
                    @include('partials.FormTercero')
                    @include('partials.FormEquipo')
                    @include('contratos.partials.FormEquipoContrato')
                    @include('expendios.partials.FormOrganizacion')
        </div>
        <div class='panel-footer'> 
            <button type="button" ng-click='guardar()' class="btn btn-raised btn-info btn-lg" title="GUARDAR" ng-disabled="save||formReporte.$invalid"><i class="material-icons">save</i></button>
            <span><%rsl.msg%></span>            
            <a href="{{ route('expendios.index')}}" type="button" class="btn btn-success" title="IR A LA LISTA DE EQUIPOS"><i class="material-icons">list</i></a>
            
        </div>
        </div>
        </div>
    </div>
</div>
@endsection
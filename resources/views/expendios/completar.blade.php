@extends('app')
@section('content')
<div class="container" ng-controller="expendioCtrl">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
        <div class="panel panel-info" ng-init="id='{{$id}}'">
        <div class='panel-heading'><i class='material-icons'>note_add</i> CAPTURAR EQUIPO VENDIDO </div>
        <div class='panel-body'>
            <button type="button" class="btn btn-raised btn-primary btn-lg" data-toggle="modal" data-target="#gridSystemModal"><i class="material-icons">search</i> Buscar Fiscal </button>
{{--INICIO Modal--}}@include('partials.modals.tercerosDirecciones'){{--FIN Modal--}}
                    @include('partials.FormTercero')
                    @include('expendios.partials.FrmExpendio')
                    @include('expendios.partials.FormOrganizacion')
        </div>
        <div class='panel-footer'> 
            <button type="button" ng-click='actualizar()' class="btn btn-raised btn-info btn-lg" title="ACTUALIZAR" ng-disabled="save||formReporte.$invalid"><i class="material-icons">save</i></button>
            <span><%rsl.msg%></span>            
            <a href="{{ route('expendios.index')}}" type="button" class="btn btn-success" title="IR A LA LISTA DE EQUIPOS"><i class="material-icons">list</i></a>
            
        </div>
        </div>
        </div>
    </div>
</div>
@endsection
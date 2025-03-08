@extends('app')
@section('content')
<div class="container" ng-controller="AExpendioCtrl">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
        <div class="panel panel-info">
        <div class='panel-heading'><i class='material-icons'>note_add</i> CAPTURAR EQUIPO VERIFICADO </div>
        <div class='panel-body' ng-init="orden_servicio.id='{{$id}}'">
        {!! Form::open(array('name'=>'formOrdenes_servicios')) !!}
            <button type="button" class="btn btn-raised btn-primary btn-lg" data-toggle="modal" data-target="#gridSystemModal"><i class="material-icons">search</i> Buscar Fiscal </button>    
            <%objeto.id%>
            <p class="text-info">CLIENTE SUGERIDO: <%nombre_fiscal%></p><p class="text-success">DIRECCION SUGERIDA: <%direccion%></p>
{{--INICIO Modal--}}@include('partials.modals.tercerosDirecciones'){{--FIN Modal--}}
                    @include('partials.FormTercero')
                    @include('expendios.partials.FrmExpendio')
                    @include('expendios.partials.FormOrganizacion')
        </div>
        <div class='panel-footer'> 
            <button type="button" ng-click='guardar()' class="btn btn-raised btn-info btn-lg" title="GUARDAR" ng-disabled="save||formOrdenes_servicio.$invalid"><i class="material-icons">save</i></button>
            <span><%rsl.msg%></span>            <span><%msj%></span>            
            <a href="{{ route('expendios.index')}}" type="button" class="btn btn-success" title="IR A LA LISTA DE EQUIPOS"><i class="material-icons">list</i></a>
            
        </div>
{!! Form::close() !!} 
        </div>
        </div>
    </div>
</div>
@endsection
@extends('app')
@section('content')
<div class="container" ng-controller="reporteCtrl">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-info">
        <div class='panel-heading'><i class='material-icons'>note_add</i> EDITAR REPORTE <span class="badge"><%objeto.folio%></span></div>
            <div class='panel-body' ng-init="id='{{$id}}'">

    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#gridSystemModal"> Buscar Fiscal </button>    
<!--INICIO Modal-->@include('partials.modals.tercerosDirecciones')<!--FIN Modal-->
{!! Form::open(array('name'=>'formReporteEdit')) !!} 
   @include('partials.FormTercero')
   @include('partials.FormEquipo')
   @include('partials.FormDatos')
                </div>
                <div class='panel-footer'> 
                <!--<%objeto%>-->
                <button type="button" class="btn btn-raised btn-info btn-lg" ng-click='guardar()' ng-disabled="save||formReporteEdit.$invalid">Guardar</button>
                <span><%msg%></span>
                <a href="{{ route('reportes.index')}}" type="button" class="btn btn-success" title="IR A LA LISTA DE REPORTES"><i class="material-icons">list</i></a>
            </div>
                {!! Form::close() !!} 
        </div>
        
        </div>
    </div>
</div>
@endsection
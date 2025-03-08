@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0" >
                <div class="panel panel-info" ng-controller="reporteCtrl">
                    <div class='panel-heading'><i class='material-icons'>note_add</i> .CREAR REPORTE </div>
                    <div class='panel-body' ng-init="id='0'">
                        <button type="button" class="btn btn-raised btn-primary btn-lg" data-toggle="modal" data-target="#gridSystemModal"><i class="material-icons">search</i> Buscar Cliente </button>    
                        <button type="button" class="btn btn-raised btn-primary btn-lg" data-toggle="modal" data-target="#gridModalEquip"><%filtro_equipo.cantidad%> Buscar Equipo </button>    
                        @include('partials.modals.tercerosDireccionesContrato')<!--FIN Modal-->
                        @include('expendios.partials.ModBuscarExp')<!--FIN Modal EQUIPOS-->
                        {!! Form::open(array('name'=>'formReporte')) !!} 
                            @include('partials.FormTercero')
                            @include('partials.FormEquipo')
                            @include('partials.FormDatos')
                    </div>
                    <div class='panel-footer'> <!--<%objeto%>-->
                        <button type="button" ng-click='guardar()' class="btn btn-raised btn-info btn-lg" title="GUARDAR" ng-disabled="save||formReporte.$invalid"><i class="material-icons">save</i>GUARDAR</button>
                        <span><%msg%></span><!--<button type="button" ng-click='guardar()' class="btn btn-raised btn-info btn-lg" ng-disabled="save||formReporte.$invalid">Guardar</button>-->
                        <a href="{{ route('reportes.index')}}" type="button" class="btn btn-success" title="IR A LA LISTA DE REPORTES"><i class="material-icons">list</i></a>
                        {!! Form::close() !!} 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
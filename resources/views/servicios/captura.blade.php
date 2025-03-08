@extends('app')
@section('content')
<div class="container" ng-controller="servicioCtrl">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-info">
        <div class='panel-heading'><i class='material-icons'>note_add</i> CAPTURA DE ORDEN DE SERVICIO. <span class="badge badge-success"><%objeto.folio%></span><span class="badge badge-success">NO. REPORTE: <%reporte%></span></div>
            <div class='panel-body' ng-init="servicio='{{$r->servicio}}'; programacion='{{$r->programacion}}'">
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#gridSystemModal"> Buscar Fiscal </button>
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModal">Folio </button>
    {!! Form::open(array('name'=>'formOrdenServicio')) !!}
<!--INICIO Modal-->
                @include('partials.modals.tercerosDirecciones')
                @include('partials.modals.folioServicio')
<!--FIN Modal-->
                    @include('partials.FormCondicionServicio')
                    @include('partials.FormTercero')
                 @include('partials.FormEquipo')
                 @include('partials.FormPersonalEdit')
                 @include('partials.FormHorarios')
                 @include('partials.FormBuscarProductos')
                 @include('partials.FormListaProductos')


                </div>
                <div class='panel-footer'>
                <button type="button" ng-click='guardar()' class="btn btn-raised btn-info btn-lg" ng-disabled="save || formOrdenServicio.$invalid"><i class="material-icons">save</i>GUARDAR</button>
                <!--<button type="button" ng-click='guardar()' class="btn btn-raised btn-info btn-lg" ng-disabled="save||formOrdenServicio.$invalid">Guardar</button>-->
                <span><%rsl.msg%></span>
                <a href="{{ route('servicios.index')}}" type="button" class="btn btn-success" title="IR A LA LISTA DE ORDENES DE SERVICIO"><i class="material-icons">list</i></a>
            </div>
            {!! Form::close() !!}
        </div>

        </div>
    </div>
</div>
@endsection

@extends('app')
@section('content')
<div class="container" ng-controller="servicioCtrl">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-info">
        <div class='panel-heading'><i class='material-icons'>note_add</i>ACTUALIZAR ORDEN DE SERVICIO NO: <span class="badge badge-success"><%objeto.folio%></span><span class="badge badge-success">REPORTE NO: <%reporte%><%objeto.rel_reporte.folio%></span></div>
            <div class='panel-body' ng-init="objeto.id='{{$id}}'">
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#gridSystemModal"> Buscar Cliente </button>    
    {!! Form::open(array('name'=>'formOrdenServicio')) !!} 
<!--INICIO Modal--> @include('partials.modals.tercerosDirecciones')<!--FIN Modal-->
                    @include('partials.FormCondicionServicio')
                    @include('partials.FormTercero')
                 @include('partials.FormEquipo')
                 @include('partials.FormPersonalEdit')
                 @include('partials.FormHorarios')
                 @include('partials.FormBuscarProductos')
                 @include('partials.FormListaProductos')
                </div>                 
                <div class='panel-footer'> 
                <button type="button" ng-click='guardar()' class="btn btn-raised btn-info btn-lg" ng-disabled="save || formOrdenServicio.$invalid"><i class="material-icons">save</i>ACTUALIZAR</button>
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
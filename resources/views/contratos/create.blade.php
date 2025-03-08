@extends('app')
@section('content')
<div class="container" ng-controller="contratoCtrl">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-info">
        <div class='panel-heading'><i class='material-icons'>note_add</i> CREAR CONTRATO </div>
            <div class='panel-body' ng-init="email='{{Auth::user()->email}}';">

    <button type="button" class="btn btn-raised btn-primary btn-lg" data-toggle="modal" data-target="#gridSystemModal"><i class="material-icons">search</i> Buscar Cliente </button>    
{!! Form::open(array('name'=>'formContratos')) !!} 
    @include('partials.modals.tercerosDirecciones')
    @include('partials.FormFiscal')
    @include('contratos.partials.FormContrato')
<!--INICIO EQUIPO SERVICIO-->
    @include('contratos.partials.FormEquipoContrato')<!--FIN EQUIPO SERVICIO-->
    @include('contratos.partials.FormDatosFormato')
                   </div>
                <div class='panel-footer'>
                <button type="button" class="btn btn-raised btn-info btn-lg" ng-click='guardar()' ng-disabled="save||formContratos.$invalid">Guardar</button>
                <span><%rsl.msg%></span>
                  <a href="{{ route('contratos.index')}}" type="button" class="btn btn-success" title="IR A LA LISTA DE CONTRATOS"><i class="material-icons">list</i></a>
            </div>
{!! Form::close() !!} 
        </div>
        
        </div>
    </div>
</div>
@endsection
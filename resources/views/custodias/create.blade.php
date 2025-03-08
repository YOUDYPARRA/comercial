@extends('app')
@section('content')
<div class="container" ng-controller="custodiaCtrl">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-info">
                <div class='panel-heading'><i class='material-icons'>note_add</i> ENTRADA DE EQUIPO <span class="badge badge-success">NO. REPORTE: <%objeto.reporte%></span></div>
                <div class='panel-body' ng-init="id_reporte='{{$id}}'"><!--Inicio Panbody-->
                    {!! Form::open(array('name'=>'formCustodia')) !!} 
			             @include('partials.FormTercero')
			             @include('partials.FormEquipo')
			             @include('custodias.partials.FormCus')
			             @include('partials.FormDatos')<!--fn Panbody-->
                    {!! Form::close() !!} 
                </div>
                <div class='panel-footer'> <!--<%objeto%>-->
                    <button type="button" ng-click='guardar()' class="btn btn-raised btn-info" ng-disabled="formCustodia.$invalid">Guardar</button>
                    <span><%resul.grd%></span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
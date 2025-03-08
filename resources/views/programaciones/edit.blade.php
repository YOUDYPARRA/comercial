@extends('app')
@section('content')
<div class="container" ng-controller="programacionCtrl">
  <div class="row">
    <div class="col-md-12 col-md-offset-0">
      <div class="panel panel-info">
        <div class='panel-heading'><i class='material-icons'>note_add</i>EDITAR PROGRAMACION <span class="badge badge-success"><%objeto.folio%> </span></div>
        <div class='panel-body' ng-init="id='{{$id}}'">{{$id}}
          <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#gridSystemModal"> Buscar Fiscal </button>    <!--INICIO Modal@include('partials.modals.tercerosDirecciones')<!--FIN Modal-->
          {!! Form::open(array('name'=>'formProgramacion')) !!} 
            @include('partials.FormTercero')
            @include('partials.FormEquipo')
            @include('partials.FormPersonalEdit')
            @include('partials.FormDatosServicio')   
        </div>
        <div class='panel-footer'> <!--<%objeto%>-->                <!--<button type="button" ng-click='guardar()' class="btn btn-raised btn-info btn-lg" ng-disabled="formProgramacion.$invalid || save">Guardar</button>-->
          <button type="button" ng-click='guardar()' class="btn btn-raised btn-info btn-lg" ng-disabled="formProgramacion.$invalid">ACTUALIZAR</button>
          <span><%rsl.msg%></span>
          <a href="{{ route('programaciones.index')}}" type="button" class="btn btn-success" title="IR A LA LISTA DE PROGRAMACIONES"><i class="material-icons">list</i></a>
        </div>
          {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection
@extends('app')
@section('content')
  <div class="row">
  <div class="panel panel-info" ng-controller="programacionCtrl">
    <div class='panel-heading'><i class='material-icons'>note_add</i>DOCUMENTOS </div>
        <div class='panel-body' ng-init="id_reporte='{{$id}}'">
          @include('partials.FormLista')
            <div class="row">
              @include('programaciones.partials.FormContratosList')          
              @include('partials.modals.tercerosDirecciones')<!--FIN Modal-->
            </div>
        </div>
  </div>
  </div>
<div class="container">
  <div class="row">
    <div class="col-md-12 col-md-offset-0">
      <div class="panel panel-info" ng-controller="programacionCtrl">
        <!--<div class='panel-heading'><i class='material-icons'>note_add</i>PROGRAMACION <span class="badge badge-success">NO. REPORTE: <%objeto.folio%></span></div>-->
        <div class='panel-body' ng-init="id_reporte='{{$id}}'">
          {!! Form::open(array('name'=>'formProgramacion')) !!}
           
            <button type="button" class="btn btn-raised btn-primary btn-lg" data-toggle="modal" data-target="#gridSystemModal"><i class="material-icons">search</i> Buscar Cliente </button>    
            @include('partials.FormTercero')
            @include('partials.FormEquipo')
            @include('partials.FormPersonal')
            @include('partials.FormDatosServicio')
          {!! Form::close() !!} 
        </div>
        <div class='panel-footer'>                 
          <button type="button" ng-click='guardar()' class="btn btn-raised btn-info btn-lg" ng-disabled="save || formProgramacion.$invalid"><i class="material-icons">save</i>GUARDAR</button>
          <span><%rsl.msg%></span>
          <a href="{{ route('programaciones.index')}}" type="button" class="btn btn-success" title="IR A LA LISTA DE PROGRAMACIONES"><i class="material-icons">list</i></a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
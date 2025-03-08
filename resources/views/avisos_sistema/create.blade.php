@extends('app')
@section('content') 
<div class="container">
  <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-info" ng-controller="avisosSistemaConfigCtrl">
                    <div class='panel-heading' ng-init="inicio('{{Auth::user()->tipo_usuario}}','{{Auth::user()->id}}'); id='{{Auth::user()->tipo_usuario}}'; getAvisos()">AVISOS<%confPer.headerCrear%></div>
                    <div class='panel-body'>
                        @include('avisos_sistema.partials.Form')
                    </div>  
                    <div class="panel-footer"> 
                        <button type="submit" ng-click="busca()" class="btn btn-raised btn-info btn-lg"><i class="material-icons">search</i>BUSCAR</button>        
                        <button type="submit" ng-click="guarda()" class="btn btn-raised btn-info btn-lg"><i class="material-icons">save</i>GUARDAR</button>
                        <button type="submit" ng-click="limpia()" class="btn btn-raised btn-info btn-lg"><i class="material-icons">clear</i>RESET</button>
                    </div>
                </div>
                <div class="panel panel-info">
                    <div class='panel-heading'>AVISOS DE USUARIO: <span class="badge badge-warning"> <%avisos.length%> </span></div>
                    <div class='panel-body'>
                        @include('avisos_sistema.partials.FormTable')
                    </div>  
                    <div class="panel-footer"> 
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
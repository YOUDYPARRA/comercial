@extends('app')
@section('content') 
<div class="container">
  <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-info" ng-controller="avisosSistemaCtrl">
                    <div class="panel-heading"> <h4> AVISOS:<span class="badge badge-info"><%avisos.length%></span></h4></div>
                    <div class="panel-body"  ng-init="id='{{Auth::user()->id}}';carga();getAvisos();">
                        @include('avisos_sistema.partials.FormTableIndex')
                    </div>  
                    <div class="panel-footer"> 
           
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
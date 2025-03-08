@extends('app')
@section('content') 
<div class="container">
	<div class="row">
            <form name="recursoForm" >
		<div class="col-md-12 col-md-offset-0">
                    <div class="panel panel-default" ng-controller="recursoCtrl">
                            <div class='panel-heading'><%confRec.headerCrear%></div>
                            <div class='panel-body'>
                                    @include('recursos.partials.Form')
                            </div>	
                            <div class="panel-footer"> 
                                 <button type="submit" ng-disabled="!recursoForm.$valid" ng-click="guardar()" class="btn btn-raised btn-info btn-lg"><i class="material-icons">save</i><%confRec.successCrea%></button>
                            </div>
                    </div>
                </div>
                
            </form>
    </div>
</div>
@endsection

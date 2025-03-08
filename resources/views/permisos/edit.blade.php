@extends('app')
@section('content') 
<div class="container">
	<div class="row">
		<div class="col-md-12 col-md-offset-0">
			<div class="panel panel-default" ng-controller="permisoCtrl">
            
				<div class='panel-heading'><% permiso.vista=1 %> <%confPer.headerEditar%></div>
    			<div class='panel-body'>
        				@include('permisos.partials.Form')
				</div>	
				<div class="panel-footer"> 
       				 <button type="submit" ng-click="actualizar()" class="btn btn-raised btn-info btn-lg"><i class="material-icons">save</i><%confPer.successEdit%></button>
    			</div>
    		</div>
        
    	</div>
    </div>
</div>
@endsection
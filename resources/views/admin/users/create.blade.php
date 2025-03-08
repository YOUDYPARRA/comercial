@extends('app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-info" ng-controller="terceroCtrl">
				<div class='panel-heading'>NUEVO USUARIO</div>{{--<%empleados%>--}}
				<div class='panel-body'>
					{!! Form::open(['route'=>'users.store','method'=>'POST']) !!}
						@include('admin.users.partials.formuser')
				</div>
				<div class="panel-footer"> 
					<button type="submit" class="btn btn-raised btn-info btn-lg"><i class="material-icons">save</i>GUARDAR</button>
				</div>
					{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection
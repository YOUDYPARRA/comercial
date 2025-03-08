@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class='panel-heading'>ELIMINAR USUARIO: {{$user->name}}</div>
					<div class='panel-body'>
						{!! Form::model($user, ['route'=>['users.destroy',$user->id],'method'=>'DELETE']) !!}
					</div>
					<div class="panel-footer" ng-controller="datosCliente">
							<button type="submit" class="btn btn-raised btn-warning btn-lg"><i class="material-icons">delete</i>ELIMINAR</button>
					</div>
					{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection

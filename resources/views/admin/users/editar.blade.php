@extends('app')
@section('content')
<div class="container">   			<!--USERS -->
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-info">
				<div class='panel-heading'>EDITAR USUARIO: {{$user->name}}</div>
				<div class='panel-body'>
					{!! Form::model($user,['method'=>'PUT','action'=>['Admin\UserController@actualizar',$user->id]]) !!}
                        @include('admin.users.partials.formeditar')
				</div>
				<div class="panel-footer"> 
					<button type="submit" class="btn btn-raised btn-info btn-lg"><i class="material-icons">cached</i>ACTUALIZAR</button> 		 				
				</div>
					{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection
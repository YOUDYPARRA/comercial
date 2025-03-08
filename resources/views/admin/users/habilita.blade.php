@extends('app')

@section('content')
<div class="container">										<!-- USUARIOS  -->
	<div class="row">
		<div class="col-md-11 col-md-offset-1">
			<div class="panel panel-default">
				<div class='panel-heading'>USUARIOS DESHABILITADOS</div>
					@if (Session::has('message'))
					<p class="alert alert-success">{{ Session::get('message') }}</p>
					@endif
					<div class='panel-body'>
					<!-- 	<p>
							<a class='btn btn-info' href="#" >AGREGAR</a>
						</p> -->
						<p>Hay {{ $users->total() }} usuarios deshabilitado(s)</p>
						<table class="table table-striped table-condensed">
							<tr>
								<th>#</th>
								<th>Nombre</th>
								<th>Iniciales</th>
								<th>Email</th>
								<th>Tipo usuario</th>
								<th>Puesto</th>
								<th>Area</th>
								<th>Departamento</th>
								<th></th>
								<th></th>
							</tr>
							@foreach ($users as $user)
							<tr>
								<td>{{ $user->id }}</td>
								<td>{{ $user->name }}</td>
								<td>{{ $user->iniciales }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ $user->tipo_usuario }}</td>
								<td>{{ $user->puesto }}</td>
								<td>{{ $user->area }}</td>
								<td>{{ $user->departamento }}</td>
								<td></td>
								<td>
								{!! Form::model($user, ['route'=>['users.destroy',$user->id],'method'=>'DELETE']) !!}
									</div>
									<div class="panel-footer" ng-controller="datosCliente"> 
										<button type="submit" class="btn btn-raised btn-warning btn-lg"><i class="material-icons">work</i>RESTAURAR</button> 		 				
									</div>
								{!! Form::close() !!}
								</td>
							</tr>
							@endforeach
						</table>
						{!! $users->render() !!}
					</div>
					<div class="panel-footer" ng-controller="datosCliente"> 
		 				<a type="button" class="btn btn-raised btn btn-info" href="{{ route('users.create') }}"><i class="material-icons">person_add</i> AGREGAR</a>
					</div>
			</div>
		</div>
	</div>
</div>
@endsection

@extends('app')
@section('content')
@include('admin.users.partials.frmBuscar')

	
			<div class="panel panel-info">
				<div class='panel-heading'>USUARIOS</div>
					@if (Session::has('message'))
					<p class="alert alert-success">{{ Session::get('message') }}</p>
					@endif
					<div class='panel-body'>
					<!-- 	<p>
							<a class='btn btn-info' href="#" >AGREGAR</a>
						</p> -->
						<p>Hay {{ $users->total() }} usuarios</p>
						<table class="table table-striped table-condensed">
							<tr>
								<th>#</th>
								<th>{!! util::lnkOr($rq->all(),'name','NOMBRE') !!}</th>
								<th>Iniciales</th>
								<th>Email</th>
								<th>Tipo usuario</th>
								<th>{!! util::lnkOr($rq->all(),'puesto') !!}</th>
								<th>{!! util::lnkOr($rq->all(),'area') !!}</th>
								<th>{!! util::lnkOr($rq->all(),'departamento') !!}</th>
								<th>{!! util::lnkOr($rq->all(),'created_at','FECHA ALTA') !!}</th>
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
								<td>{{ $user->created_at }}</td>
                                                                
                                @can('acceso','users.edit')
                                    <td><a href="{{ route('users.edit', $user->id)}}" type="button" class="btn btn-warning"><i class="material-icons">cached</i></a></td>
                                @endcan
                                
                                @can('acceso','users.show')
                                    <td><a href="{{ route('users.show', $user->id)}}" type="button" class="btn btn-danger" ><i class="material-icons">delete</i></a></td>
                                @endcan
							</tr>
							@endforeach
						</table>
						{!! $users->appends($rq->all())->render() !!}
					</div>
					<div class="panel-footer"> 
		 				<a type="button" class="btn btn-raised btn btn-info" href="{{ route('users.create') }}"><i class="material-icons">person_add</i> AGREGAR</a>
					</div>
			</div>
		

@endsection

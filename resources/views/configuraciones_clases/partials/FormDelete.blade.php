@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class='panel-heading'>ELIMINAR OBJETO: {{$objeto->objeto}}</div>
					<div class='panel-body'>
						{!! Form::model($objeto, ['route'=>['configuracion_clase.destroy',$objeto->id],'method'=>'DELETE']) !!}
						@include('configuraciones_clases.partials.Form')
					</div>
					<div class="panel-footer">
							<button type="submit" class="btn btn-raised btn-warning btn-lg"><i class="material-icons">delete</i>ELIMINAR</button>
					</div>
					{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection
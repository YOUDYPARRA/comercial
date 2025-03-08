@extends('app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-1">
			<div class="panel panel-info">
				<div class='panel-heading panel-info' > CREAR UNIDAD DE MEDIDA<span class="badge"></span></div>
					{!! Form::open(array('action' => 'UnidadMedidaController@store')) !!} 
				<div class='panel-body'>
					@include('unidades_medidas.partials.Form')
				</div>
				<div class='panel-footer panel-info'> 
					<button type='submit' class='btn btn-warning btn-lg'><i class='material-icons'>save</i>GUARDAR</button> 
				</div>
					{!! Form::close() !!} 
			</div>
			<div class="panel panel-primary">
				<div class='panel-heading panel-info'> LISTADO UNIDADES DE MEDIDA <span class="badge"></span></div>
				<div class='panel-body'>
					@include('unidades_medidas.partials.FormLista')
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

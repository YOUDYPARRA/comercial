@extends('app')
@section('content')
<div class="panel panel-info">
	<div class='panel-heading panel-info' > LISTADO UNIDADES DE MEDIDA ELIMINADAS <span class="badge"></span></div>
	<div class='panel-body'>
		@include('unidades_medidas.partials.FormRestaurar')
	</div>
</div>
@endsection

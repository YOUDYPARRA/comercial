@extends('app')
@section('content')
		@include('tickets_operaciones.partials.FormShow')
	@foreach($objetos as $objeto)
			@include('tickets_operaciones.partials.FormShow')
	@endforeach
@endsection
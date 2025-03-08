@extends('app')
@section('content')
	{!! Form::model( $objeto,['method'=>'POST','action'=>['TicketController@store',$objeto->id]]) !!}
		@include('tickets.partials.Form')
	{!! Form::close() !!}
	@foreach($objetos as $objeto)
		{!! Form::model( $objeto,['method'=>'POST','action'=>['TicketController@store',$objeto->id]]) !!}
			@include('tickets.partials.Form')
		{!! Form::close() !!}
	@endforeach
@endsection
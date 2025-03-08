@extends('app')
@section('content')
	{!! Form::model( $objeto,['method'=>'POST','action'=>['TicketController@store',$objeto->id]]) !!}
		@include('tickets.partials.Form')
	{!! Form::close() !!}
@endsection
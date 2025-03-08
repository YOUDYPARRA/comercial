@extends('app')
@section('content')
{!! Form::open(['route'=>['compra.archivar'],'files'=>'true']) !!}
	@include('digitalizaciones.partials.FormDigitalizacion')
{!!Form::close!!}
@endsection
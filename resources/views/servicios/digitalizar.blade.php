@extends('app')
@section('content')
{!! Form::open(['route'=>['servicios.archivar'],'files'=>'true']) !!}
	@include('digitalizaciones.partials.FormDigitalizacion')
{!!Form::close()!!}
@if(is_object($objeto->rel_servicio))
	@if($objeto->rel_servicio->digitalizacion)
		Ver Archivo:<a href="{{ route('servicios.digital',$objeto->id)}}" type="button" class="btn btn-success" title="VER ARCHIVO"><i class="material-icons">cloud_download</i></a>
	@endif
@endif
@endsection
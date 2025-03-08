@extends('app')
@section('content')
{!! Form::open(['route'=>['compras.archivar'],'files'=>'true']) !!}
	@include('digitalizaciones.partials.FormDigitalizacion')
{!!Form::close()!!}
@if($objeto->digitalizacion)
	Ver Archivo:<a href="{{ route('compras.digital',$objeto->id)}}" type="button" class="btn btn-success" title="VER ARCHIVO"><i class="material-icons">cloud_download</i></a>
@endif
@endsection
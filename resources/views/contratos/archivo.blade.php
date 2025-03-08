@extends('app')
@section('content')
{!! Form::open(['method'=>'PUT','route'=>['contratos.archivar'],'files'=>'true']) !!}
	@include('digitalizaciones.partials.FormDigitalizacion')
{!!Form::close()!!}
@if(is_object($objeto->contrato))
	@if($objeto->contrato->digitalizacion)
		Ver Archivo:<a href="{{ route('contratos.digital',$objeto->id)}}" type="button" class="btn btn-success" title="VER ARCHIVO"><i class="material-icons">cloud_download</i></a>
	@endif
@endif
@endsection
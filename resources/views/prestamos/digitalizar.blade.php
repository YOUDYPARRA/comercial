@extends('app')
@section('content')
{!! Form::open(['route'=>['prestamos.archivar'],'files'=>'true']) !!}
	@include('digitalizaciones.partials.FormDigitalizacion')
{!!Form::close()!!}
   <div class="col-lg-5">
       @if($objeto->prestamo->digitalizacion)
           <label class="has-info">ARCHIVO GUARDADO CORRECTAMENTE.</label>
       @endif
   </div>
@if($objeto->prestamo->digitalizacion)
	Ver Archivo:<a href="{{ route('prestamos.digital',$objeto->id)}}" type="button" class="btn btn-success" title="VER ARCHIVO"><i class="material-icons">cloud_download</i></a>
@endif
@endsection
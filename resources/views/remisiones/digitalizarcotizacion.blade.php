@extends('app')
@section('content')
<div class='panel panel-default'>
<div class='panel-heading'><i class='material-icons'>nombre_icono</i> AGREGA REMISION </div>
        <div class='panel-body'>
            @include('remisiones.partials.FormDigitalizar')
        </div>
        <div class='panel-footer'> 
        </div>
</div>
@endsection

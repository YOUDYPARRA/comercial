@extends('app')
@section('content')
<div class="container" ng-controller="marcaProveedorCtrl">
    <h4>GENERAR NUEVO</h4>
    
        @include('marcas_proveedores.partials.Form')
        {!! Form::submit('AGREGAR',array('class'=>'btn btn-primary',"ng-click"=>"guarda()")) !!}
    
</div>
@endsection

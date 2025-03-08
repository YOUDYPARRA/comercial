@extends('app')
@section('content')
<div class="container" ng-controller="marcaProveedorCtrl">
        <div class='panel-heading'> <% marcaProveedor.vista=1 %> <%confMar.headerEditar%></div>
            @include('marcas_proveedores.partials.Form')
            {!! Form::submit('GUARDAR',array('class'=>'button',"ng-click"=>"guarda()")) !!}
</div>
@endsection
@extends('app')
@section('content')
<div class="container" ng-controller="prestamoCtrl">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
        <div class="panel panel-info">
        <div class='panel-heading'><i class='material-icons'>edit</i> EDITAR REQUISICIÓN DE PIEZA <span class="badge">FOLIO No. <%objeto.folio%></span></div>
        <div class='panel-body' ng-init="id_edit='{{$id}}';autor='{{Auth::user()->iniciales}}';puesto='{{Auth::user()->puesto}}'"><%autor%>
        {!! Form::open(array('name'=>'formPrestamo')) !!} 
            @include('partials.FormTercero')
            @if(auth()->user()->puesto!='INGENIERO DE SERVICIOS')
                @include('partials.FormCondicionesPrestamo')
            @endif
            @include('prestamos.partials.FormBuscarProductosStock')
            @include('prestamos.partials.FormListaProductos')
        </div>
        <div class='panel-footer'>    
	    <button type="button" ng-click='guardar()' class="btn btn-raised btn-info btn-lg" ng-disabled="formPrestamo.$invalid">Guardar</button>
                <span><%rsl.msg%></span>
        <a href="{{ route('prestamos.index')}}" type="button" class="btn btn-success" title="IR A LA LISTA DE SOLICITUDES DE EQUIPO/REFACCION"><i class="material-icons">list</i></a>
        </div>
        {!! Form::close() !!} 
        
        </div>
        
        </div>
    </div>
</div>
@endsection
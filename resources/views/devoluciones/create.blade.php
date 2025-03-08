@extends('app')
@section('content')
<div class="container" ng-controller="devolucionCtrl">
        <div class="col-md-12 col-md-offset-0">
        <div class="panel panel-info">
            <div class='panel-heading'><i class='material-icons'>note_add</i> CREAR DEVOLUCION DE PIEZA <span class='badge'>NO. PRESTAMO: <%objeto.folio%></span></div>
            <div class='panel-body' ng-init="getPrestamo('{{$id}}');autor='{{Auth::user()->iniciales}}';puesto='{{Auth::user()->puesto}}'">
                {!! Form::open(array('name'=>'formDevolucion')) !!} 
                @include('partials.FormTercero')
                @include('partials.FormCondicionesPrestamo')
                @include('devoluciones.partials.FormBuscarProductosStock')
                @include('devoluciones.partials.FormListaProductos')
        </div>
        <div class='panel-footer'>    
	    <button type="button" ng-click='guardar()' class="btn btn-raised btn-info btn-lg" ng-disabled="save||formPrestamo.$invalid"><i class="material-icons">save</i>GUARDAR</button>
                <span><%rsl.msg%></span>
        <a href="{{ route('devoluciones.index')}}" type="button" class="btn btn-success" title="IR A LA LISTA DE DEVOLUCIONES DE EQUIPO/REFACCION"><i class="material-icons">list</i></a>
        </div>
        {!! Form::close() !!} 
        </div>
        
        </div>
</div>
@endsection
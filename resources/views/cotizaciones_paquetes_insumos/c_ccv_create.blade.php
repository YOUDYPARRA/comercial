@extends('app')
@section('content')
<div class="container" ng-controller="CotizacionCCVCtrl">
        <div class="panel panel-info">
        	<div class='panel-heading'><i class='material-icons'>note_add</i> CREAR COTIZACION CCV </div>
            <div class='panel-body' >
            	<button type="button" class="btn btn-raised btn-primary btn-sm" data-toggle="modal" data-target="#gridSystemModal"><i class="material-icons">search</i> Buscar Fiscal </button>
                {!! Form::open(array('name'=>'formC_CCV')) !!} 
        				@include('partials.modals.tercerosDirecciones')
        		   	    @include('partials.FormTercero')
        				@include('contratos_compra_venta.partials.contacto')
        				@include('contratos_compra_venta.partials.cotizacion')
        				@include('contratos_compra_venta.partials.contrato')
        				@include('partials.FormEquipoCantidadAbierto')
            </div>
            <div class='panel-footer'>
                <button type="button" ng-click='guardar()' class="btn btn-raised btn-info btn-sm" title="GUARDAR" ng-disabled="save||formC_CCV.$invalid"><i class="material-icons">save</i>GUARDAR</button>
                <span><%msg%></span>
                <a href="{{ route('cotizacionPaqueteInsumo.index')}}" type="button" class="btn btn-success" title="IR A LA LISTA COTIZACIONES"><i	 class="material-icons">list</i></a>
            </div>
            {!! Form::close() !!} 
        </div>
</div>
@endsection

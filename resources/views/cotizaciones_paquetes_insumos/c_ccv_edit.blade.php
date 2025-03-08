@extends('app')
@section('content')
<div class="container" ng-controller="CotizacionCCVCtrl">
    <div class="row">
        <div class="panel panel-info">
        	<div class='panel-heading'><i class='material-icons'>note_add</i> EDITAR COTIZACION DE COMPRA VENTA: <span class="badge badge-orange"> <%objeto.numero_cotizacion%></span></div>
            <div class='panel-body' ng-init="id='{{$id}}'">
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
                <button type="button" ng-click='update()' class="btn btn-raised btn-info btn-sm" title="ACTUALIZAR" ng-disabled="save||formC_CCV.$invalid"><i class="material-icons">save</i>ACTUALIZAR</button>
                <!--<button type="button" ng-click='update()' class="btn btn-raised btn-info btn-sm" title="ACTUALIZAR" ng-disabled="save||formC_CCV.$invalid"><i class="material-icons">save</i>ACTUALIZAR</button>-->
                <span><%msg%></span>
                <a href="{{ route('cotizacionPaqueteInsumo.index')}}" type="button" class="btn btn-success" title="IR A LA LISTA COTIZACIONES"><i	 class="material-icons">list</i></a>
            </div>
            {!! Form::close() !!} 
        </div>

    </div>
</div>
@endsection

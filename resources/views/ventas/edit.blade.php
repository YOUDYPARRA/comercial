@extends('app')
@section('content')
<div class="container" ng-controller="OrdenVentaCtrl">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
        {!! Form::model($id, ['route'=>['ventas.update',$id],'method'=>'PUT']) !!}
            <div class="panel panel-info">
                <div class='panel-heading'><i class='material-icons'>note_add</i> EDITAR ORDEN DE VENTA NO: <%auto%></div>
                <div class='panel-body' ng-init="id_venta={{$id}}">
                    @include('ordenes_ventas.partials.DatosCliente')
                  
                    @include('ordenes_ventas.partials.DatosInsumos')
                </div>
                <div class='panel-footer'> 
                    <button type="submit" class="btn btn-raised btn-info btn-lg" ng-click="alerta('SE ACTUALIZARAN DATOS')" ng-disabled="save||formVenta.$invalid"><i class="material-icons">save</i>ACTUALIZAR</button>
                    <span><%msge%></span>
                     <a href="{{ route('compras.index')}}" type="button" class="btn btn-success" title="IR A LA LISTA DE ORDEN DE COMPRA"><i class="material-icons">list</i></a>
                </div>
            </div>
            {!! Form::close() !!} 
        </div>
    </div>
</div>
@endsection

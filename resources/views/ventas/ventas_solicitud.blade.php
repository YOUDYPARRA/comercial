@extends('app')
@section('content')
<div class="container" ng-controller="CompraCtrl">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
        
            <div class="panel panel-info">
				<div class='panel-heading'><i class='material-icons'>note_add</i> CREAR NUEVA </div>
                <div class='panel-body'ng-init="autor='{{Auth::user()->name}}';
                area='{{Auth::user()->area}}';
                departamento='{{Auth::user()->departamento}}';
                org_name='{{Auth::user()->org_name}}';
                "><%nombre%>
                    @include('compras_ventas.partials.Compras_datosForm')
                    @include('compras_ventas.partials.Compras_BuscarInsumosForm')
                    @include('compras_ventas.partials.Compras_insumosForm')
                    @include('compras_ventas.partials.Compras_proovedorForm')
                </div>
        		<div class='panel-footer'> 
            		<button type="submit" class="btn btn-raised btn-info btn-lg" ng-click="guardar()"><i class="material-icons">save</i>GUARDAR</button>
                    <%objeto%>
                   <!-- <button type="button" class="btn btn-info btn-lg" ng-controller="CompraPdfCtrl" ng-click="openOrdenCompra(cot.id)" title="IMPRIMIR"><i class="material-icons">picture_as_pdf</i></button>-->
        		</div>
   			</div>
        
        </div>
    </div>
</div>
@endsection
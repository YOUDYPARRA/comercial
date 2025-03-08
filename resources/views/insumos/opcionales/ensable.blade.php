@extends('app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-13 col-md-offset-0">
			<div class="panel panel-default" ng-controller="EnsableCtrl">
				<div class="panel-heading">ENSABLE DE INSUMOS Y EQUIPOS</div>
				<div class="panel-body">
                                    <!--<div class="container">-->
          <div class="row">
            <div class="col-md-8">
              <div class="form-group has-info" >
                <label class="control-label"><i class="material-icons">laptop_mac</i>ELIGE LA LINEA DE NEGOCIO</label>
                 {!! Form::select('tipo_equipo', equipos::getEquipos(),'',['ng-change'=>'getEquipos()','class'=>'form-control','size'=>'2','ng-model'=>'equipo.tipo_equipo','style'=>'font-size:150%'])!!}
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <h4>     <p class="text-primary"><i class="material-icons">format_list_bulleted</i>Ruta de equipo</p></h4>
              <div class="tags" ng-repeat="ruta in rutas"><!--TAG DE PRUEBA PARA BARRA DE NAVEGACION-->
                <p class="text-primary">   <i class="material-icons"> <%ruta.guion%></i> 
                  <a href="" class="btn-<%ruta.color%>" ng-click="getSigNivel(ruta);" style="font-size:150%;"><%ruta.etiqueta%></a>
                </p>
              </div>
            </div>                                           
          </div>
          <div class="row">
            <div class="col-md-8">
              <h4>     <p class="text-info"><i class="material-icons">print</i>Elige un producto</p></h4>
                      <select size="5"size="5" style="width: 730px;font-size:140%" >
                          <option ng-repeat="item in items" ng-click="setSeleccion(item)" ng-dblclick="getSigNivel(item)"><%item.etiqueta%> </option>
                      </select>
            </div>
          </div>
				</div>				<!-- div BODY -->
				<div class="panel-footer"> 
                                    <%seleccion%><label><<-- ESTA PARTE VA HACIA EL CARRITO DE COMPRA Solo con bandera de cofrepis, para agregar verificar el id pertenece y si existe ya en el carro de compra</label>
                                    <!--<%rutas%>-->
                    <!--{!! Form::text('prueba',null,array('class'=>'form-control','ng-model'=>'prueba')) !!}-->                
            <!--<button type="button" class="btn btn-raised btn btn-info" ng-click="navegaColoca();" ><i class="material-icons">save</i> GUARDAR</button>-->
            <!--<button type="button" class="btn btn btn-info" ng-click="buscar({bandera_insumo:'E'})" title="ACTUALIZAR DATOS"><i class="material-icons">loop</i></button>-->
            <!--<a type="button" class="btn btn btn-info" href="{{ route('insumos.create') }}" title="AGREGAR INSUMOS"><i class="material-icons">add_to_queue</i></a>-->
                    <ensamble-insumos></ensamble-insumos>
				</div>

			</div>
		</div>
	</div>
</div>
@endsection

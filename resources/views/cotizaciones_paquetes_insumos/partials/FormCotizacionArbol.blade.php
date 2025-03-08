<div class="row">
    <div class="col-sm-5">
        <label class="control-label">
            <h4>     <p class="text-primary"><i class="material-icons">format_list_bulleted</i>Ruta de equipo</p></h4></label>
            <div class="tags" ng-repeat="ruta in rutas"><!--TAG PARA BARRA DE NAVEGACION-->
                <p class="text-primary">   <i class="material-icons"> <%ruta.guion%></i> 
                  <a href="" class="btn-<%ruta.color%>" ng-click="getSigNivel(ruta);" style="font-size:140%;"><%ruta.etiqueta%></a>
                </p>
            </div>
        
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group has-info">
            <label class="control-label"><h4>     <p class="text-info"><i class="material-icons">laptop_mac</i>ELIGE LA LINEA DE NEGOCIO</p></h4></label>
            {!! Form::select('tipo_equipo', equipos::getEquipos(),'',['ng-change'=>'getEquipos()','class'=>'form-control','size'=>'7','ng-model'=>'equipo.tipo_equipo','style'=>'font-size:140%'])!!}
        </div>
    </div>
    
    <div class="col-sm-6">
    <div class="form-group has-info">
            <label class="control-label">
        <h4>     <p class="text-info"><i class="material-icons">print</i>ELIGE UN PRODUCTO</p></h4></label>
            <select size="7" style="width: 349px;font-size:140%;width:350px" cols="10" class="form-control">
                <option ng-repeat="item in items | orderBy:'etiqueta'" ng-click="setSeleccion(item)" ng-dblclick="getSigNivel(item)"><%item.codigo_proovedor%> <%item.etiqueta%> </option>
            </select>
        </div>
    </div>
</div>  
    
    
<div class="row">
        <div class='col-md-3' ng-show="false">        
            <div class="form-group has-info">
            <label class='control-label'>UBICACION</label>
            <select name="direccion"  ng-model="objeto.direccion" ng-change='setDir(objeto.direccion)' ng-options="direccion as direccion.name for direccion in direcciones" class="form-control">
                     <option value="">Elegir. . .</option>
            </select>
            </div>
        </div>
        <div class='col-md-1'>  
            <div class="form-group has-info">
              <label class="control-label">Cantidad</label>
                      {!! Form::text('cantidad',1,array('class'=>'form-control','ng-model'=>'cantidad','placeholder'=>'Cantidad','size'=>'3')) !!}
            </div>
        </div>
        <div class='col-md-1'>  
            <div class="form-group has-info">
              <label class="control-label">Unidad</label>
                      {!! Form::text('unidad_medida',null,array('class'=>'form-control','ng-model'=>'unidad_medida','placeholder'=>'Unidad','readonly'=>'readonly')) !!}
            </div>
        </div>
        <div class='col-md-2'>  
            <div class="form-group has-info">
            <label class="control-label">Codigo</label>
                      {!! Form::text('cantidad',null,array('class'=>'form-control','ng-model'=>'codigo_proovedor','placeholder'=>'Codigo','readonly'=>'readonly')) !!}
            </div>
        </div>
        <div class='col-md-3'>  
            <div class="form-group has-info">
            <label class="control-label">Descripción</label>
                      {!! Form::text('descripcion','',array('class'=>'form-control','ng-model'=>'descripcion','placeholder'=>'Descripcion editable')) !!}    
          </div>
        </div>
        <div class='col-md-1'>  
            <div class="form-group has-info">
            <label class="control-label">Precio</label>
                      {!! Form::text('precio','',array('class'=>'form-control','ng-model'=>'precioVenta','placeholder'=>'Precio','ng-disabled'=>'editar_precios_servicio','ng-show'=>'ver_precios_servicio')) !!}    
          </div>
        </div>
        <div class="col-md-1"> 
                  <button class="btn btn-warning btn-fab" for="todoText" type="button" ng-click="add();" value="add" ng-disabled="habilitarCondicion"><i class="material-icons">add_shopping_cart</i></button>
        </div>
</div>


   
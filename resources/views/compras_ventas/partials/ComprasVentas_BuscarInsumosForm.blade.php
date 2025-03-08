<div class="panel panel-info" ng-show="ver_buscarInsumos"> 
  <div class="panel-heading"><i class="material-icons">note_add</i> BUSCAR PRODUCTO</div>
  <div class="panel-body"> 
    <fieldset ng-disabled="esc_p3">
      <div class="row">
        <div class='col-md-3'>  
          <div class="form-group label-floating has-info">
            <label class="control-label"><i class='material-icons'>search</i>LINEA</label>
            {!! Form::text('modelo',null,array('class'=>'form-control','ng-model'=>'busquedaC.tipo_equipo','ng-change'=>'buscarB(busquedaC);')) !!}
          </div>
        </div>
        <div class='col-md-2'>  
          <div class="form-group label-floating has-info">
            <label class="control-label"><i class='material-icons'>search</i> MARCA </label>
            {!! Form::text('descripcion',null,array('class'=>'form-control','ng-model'=>'busquedaC.marca','ng-change'=>'buscarB(busquedaC);')) !!}
          </div>
        </div>
        <div class='col-md-2'>  
          <div class="form-group label-floating has-info">
            <label class="control-label"><i class='material-icons'>search</i>MODELO</label>
            {!! Form::text('modelo',null,array('class'=>'form-control','ng-model'=>'busquedaC.modelo','ng-change'=>'buscarB(busquedaC);')) !!}
          </div>
        </div>
        <div class='col-md-2'>  
          <div class="form-group label-floating has-info">
            <label class="control-label"><i class='material-icons'>search</i>CODIGO PROOVEDOR</label>
            {!! Form::text('codigo_proovedor',null,array('class'=>'form-control','ng-model'=>'busquedaC.codigo_proovedor','ng-change'=>'buscarB(busquedaC);')) !!}
          </div>
        </div>
        <div class='col-md-3'>  
          <div class="form-group label-floating has-info">
            <label class="control-label"><i class='material-icons'>search</i> DESCRIPCION </label>
            {!! Form::text('descripcion',null,array('class'=>'form-control','ng-model'=>'busquedaC.descripcion','ng-change'=>'buscarB(busquedaC);')) !!}
          </div>
        </div>
      </div><!--FIN ROW-->
			<div class="row">
        <div class="col-sm-12">            
          <div style="height: 300px; overflow: scroll"><!-- scroll-glue-top> -->
            <table class="table table-striped table-bordered table-list table-responsive">
              <thead>
                <tr>
                  <th> 
                    <div class="media">
                      <a href="#" class="pull-left">LINEA</a>
                      <div class="media-body"><p class="summary">Descripción</p></div>
                    </div>
                  </th>
                  <th>MARCA</th>
                  <th>MODELO</th>
                  <th>CODIGO</th>
                </tr> 
              </thead>
              <tbody>                          
                <tr ng-repeat="grupo in insumosB" ng-model="grupo" ng-click="equipos(grupo)"> 
                  <td>
                    <div class="media">
                      <a href="#" class="pull-left"><% grupo.tipo_equipo%></a>
                      <div class="media-body">
                        <span class="media-meta pull-right"><small><%grupo.categoria1%></small></span>  <!-- <% insumo.bandera_insumo%> -->
                        <h4 class="title"><span class="pull-right pendiente"><%grupo.categoria2%></span></h4> <!-- <% insumo.codigo_proovedor %> -->
                        <p class="summary"><% grupo.descripcion %></p>
                      </div>
                    </div>
                  </td>
                  <td><% grupo.marca %></td>
                  <td><% grupo.modelo %></td>
                  <td><% grupo.codigo_proovedor %></td>
                </tr>
              </tbody>
            </table>            
          </div>
        </div>
      </div><!--FIN ROW-->
      <div class="row">
        <div class='col-md-1'>  
          <div class="form-group has-info">
            <label class="control-label">Cantidad</label>
            {!! Form::text('cantidad',1,['class'=>'form-control','ng-model'=>'cantidad','placeholder'=>'Cantidad','size'=>'3','ng-change'=>'validaEntero(cantidad)']) !!}
          </div>
        </div>
        <div class='col-md-2'>  
          <div class="form-group has-info">
            <label class="control-label">Unidad</label>
            {!! Form::text('unidad_medida',null,['class'=>'form-control','ng-model'=>'unidad_medida','placeholder'=>'Unidad','readonly'=>'readonly']) !!}
          </div>
        </div>
        <div class='col-md-2'>  
          <div class="form-group has-info">
            <label class="control-label">Codigo</label>
            {!! Form::text('cantidad',null,['class'=>'form-control','ng-model'=>'codigo_proovedor','placeholder'=>'Codigo','readonly'=>'readonly']) !!}
          </div>
        </div>
        <div class='col-md-3'>  
          <div class="form-group has-info">
            <label class="control-label">Descripcion</label>
            {!! Form::text('descripcion',null,['class'=>'form-control','ng-model'=>'descripcion']) !!}
          </div>
        </div>
        <div class='col-md-2'>  
          <div class="form-group has-info">
            <label class="control-label">Categoria</label>
            <select name="categorias" ng-model="categoria" class="form-control">
              <option ng-repeat="categoria in categorias" value="<%categoria.m_product_category_id%>"><%categoria.name%></option>
            </select>
          </div>
        </div>
        <div class='col-md-1'>  
          <div class="form-group has-info">
            <label class="control-label">Precio</label>
            {!! Form::text('precio','',['class'=>'form-control','ng-model'=>'precioCompra','placeholder'=>'Precio']) !!}
          </div>
        </div>
        <div class='col-md-1'>  
          <div class="form-group has-info">
            <label class="control-label">IVA</label>
            <select name="tax_id" ng-model="tax_id" class="form-control" ng-click="btnCarrito=false">
              <option ng-repeat="categoria in impuestos | limitTo : 2" value="<%categoria.c_tax_id%>"><%categoria.name%>:<%categoria.tipo_de_orden%></option>
            </select>
          </div>
        </div>
        <div class='col-md-10'>  
          <div class="form-group has-info">
            <label class="control-label">.</label>
          </div>
        </div>
        <div class='col-md-2'>  
          <div class="form-group has-info">
            <label class="control-label"></label>
            <button class="btn btn-warning btn-fab" for="todoText" type="button" ng-click="agregarCarrito();" ng-disabled="btnCarrito"><i class="material-icons">add_shopping_cart</i></button>
          </div>
        </div>
      </div><!--FIN ROW-->
    </fieldset>
  </div><!--FIN BODY-->
</div>
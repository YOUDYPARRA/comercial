<div class="panel panel-default"><!-- ------------------------------------------ BARRA DE RELOJ INICIO -->
  <div class="panel-heading">LISTA DE PRODUCTOS Total:<span class="badge"><%insumos.length%></span> </div>
  <div class="panel-body panel-info">
    <div class="row">
      <div class='col-md-1'>  
        <div class="form-group has-info">
          <label class="control-label">Cantidad</label>
          {!! Form::text('cantidad',1,['class'=>'form-control','ng-model'=>'cantidad','placeholder'=>'Cantidad','size'=>'3','ng-change'=>'validaEntero(cantidad);validarCantidadPrestamo(cantidad)']) !!}
        </div>
      </div>
      <div class='col-md-1'>  
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
      <div class='col-md-2'>  
        <div class="form-group has-info">
          <label class="control-label">Categoria</label>
          <select name="categorias" ng-model="categoria" class="form-control">
            <option ng-repeat="categoria in categorias | orderBy : 'name'" value="<%categoria.m_product_category_id%>"><%categoria.name%></option>
          </select>
        </div>
      </div>
      <div class='col-md-2'>  
        <div class="form-group has-info">
          <label class="control-label">Descripción</label>
          {!! Form::text('descripcion',null,['class'=>'form-control','ng-model'=>'descripcion']) !!}
        </div>
      </div>
      <div class='col-md-1'>  
        <div class="form-group has-info">
          <label class="control-label">Lista de precios: <span class="badge badge-pill badge-danger"><%preciosMultiples.length%></label><span ng-show="progress" class="badge badge-warning"> Cargando ...</span>
          <select name="repeaSelect" ng-model="tipo" class="form-control" ng-change="montoSeleccionado(tipo);" ng-disabled="editar_precios_servicio">
            <option ng-repeat="option2 in preciosMultiples" value="<%option2.monto%>"><%option2.etiqueta%></option>
          </select>
        </div>
      </div>
      <div class='col-md-1'>  
        <div class="form-group has-info">
            <label class="control-label">Precio</label>
            {!! Form::text('precio','',['class'=>'form-control','ng-model'=>'precioVenta','placeholder'=>'Precio','ng-hide'=>'ver_precio']) !!}    
        </div>
      </div>
      <div class='col-md-1'>  
        <div class="form-group has-info">
            <label class="control-label">Costo</label>
            {!! Form::text('costo','',['class'=>'form-control','ng-model'=>'costo','placeholder'=>'Costo compra','ng-show'=>'ver_costo']) !!}    
        </div>
      </div>
      <div class='col-md-1'>  
        <div class="form-group has-info">
            <label class="control-label">Descuento</label>
            {!! Form::text('descuento','',['class'=>'form-control','ng-model'=>'descuento','placeholder'=>'Descuento monto','ng-change'=>'validaNumero(descuento)']) !!}    
        </div>
      </div>
      <div class='col-md-1'>  
        <div class="form-group has-info">
          <label class="control-label"></label>
          <button class="btn btn-warning btn-fab" for="todoText" type="button" ng-click="agregarCarrito();" value="add" ng-disabled="habilitarBotonCarrito"><i class="material-icons">add_shopping_cart</i></button>
          {!! Form::hidden('serie','',['class'=>'form-control','ng-model'=>'serie','placeholder'=>'No. de serie','ng-disabled'=>'habilitarBotonCarrito']) !!}    
        </div>
      </div>          
    </div>
    <div class="row">
      <div class='col-md-12'>  
        <div class="form-group has-info">
          <label class="control-label">Especificaciones</label>
          <textarea class="form-control" name="especificaciones" ng-model="especificaciones" placeholder="Escriba las especificaciones del codigo"  maxlength="4000" ></textarea>
        </div>
      </div>
    </div>

    <table class="table table-striped table-bordered table-list table-responsive">
      <thead><tr>
        <th>-</th>
        <th>Cantidad</th>
        <th>Unidad</th>
        <th> 
          <div class="media">
              <a href="#" class="pull-left">Codigo</a>
              <div class="media-body">
                <span class="media-meta pull-right"><small class="text-info">Descripción</small></span>
                <p class="summary">Especificaciones</p>
              </div>
          </div>
        </th>
        <th ng-hide="ver_precio">Precio</th>
        <th ng-show="ver_costo">Costo</th>
        <th>Descuento</th>
        <th>Total</th>
        <th></th>
        <th></th>
      </tr></thead>
      <tr ng-repeat="todo in insumos" ng-init="setTotals(todo);"> 
        <td> <%$index + 1%> </td>
        <td align="center"> <% todo.cantidad %> </td>
        <td>  <span class="black"><% todo.unidad_venta %></span> </td>
        <td>
          <div class="media">
            <a href="#" class="pull-left"><% todo.codigo_proovedor%></a>
            <div class="media-body">
              <span class="media-meta pull-right"><small class="text-info"><%todo.descripcion%></small></span>  <!-- <% insumo.bandera_insumo%> -->
                <h4 class="title">
                  <span class="pull-right pendiente"><%todo.categoria2%></span> <!-- <% insumo.codigo_proovedor %> -->
                </h4>
                <p class="summary"><% todo.especificaciones %></p>
            </div>
          </div>
        </td>
        <td ng-hide="ver_precio"> <span class="black"> <% todo.precio %> </span> </td>
        <td ng-show="ver_costo"> <span class="black"> <% todo.costos %> </span> </td>
        <td> <span class="black"> - <% todo.descuento %> </span> </td>
        <td> <span class="black" ng-show="ver_precios_servicio"> <% todo.total | number:2 %> </span> </td>
        <td><p class="text-warning" title="BORRAR PRODUCTO" ng-click="remover($index,todo)"><i class="material-icons">delete_forever</i></p> 
        <td><p class="text-info" title="EDITAR PRECIO" ng-click="editarPrecio($index,todo);"><i class="material-icons">edit</i></p> 
          <input type="hidden"   value="<% todo.id_cotizacion %>"          name="objeto[<%$index + 1%>][id]"              readonly="readonly">            
          <input type="hidden"   value="<% todo.id %>"                     name="objeto[<%$index + 1%>][id_insumo]"              readonly="readonly">            
          <input type="hidden"   value="<% todo.id_pack %>"                name="objeto[<%$index + 1%>][id_paquete]"             readonly="readonly">           
          <input type="hidden"   value="<% todo.tipo_equipo %>"            name="objeto[<%$index + 1%>][tipo_equipo]"            readonly="readonly">           
          <input type="hidden"   value="<% todo.tipo_cambio %>"            name="objeto[<%$index + 1%>][tipo_cambio]"            readonly="readonly">           
          <input type="hidden"   value="<% todo.marca %>"                  name="objeto[<%$index + 1%>][marca]"                  readonly="readonly">           
          <input type="hidden"   value="<% todo.modelo %>"                 name="objeto[<%$index + 1%>][modelo]"                 readonly="readonly">           
          <input type="hidden"   value="<% todo.unidad_compra %>"          name="objeto[<%$index + 1%>][unidad_compra]"          readonly="readonly">           
          <input type="hidden"   value="<% todo.cantidad_unidad_compra %>" name="objeto[<%$index + 1%>][cantidad_unidad_compra]" readonly="readonly">           
          <input type="hidden"   value="<% todo.costo_moneda %>"           name="objeto[<%$index + 1%>][costo_moneda]"           readonly="readonly">           
          <input type="hidden"   value="<% todo.caracteristicas %>"        name="objeto[<%$index + 1%>][caracteristicas]"        readonly="readonly">           
          <input type="hidden"   value="<% todo.especificaciones %>"       name="objeto[<%$index + 1%>][especificaciones]"       readonly="readonly">           
          <input type="hidden"   value="<% todo.costos%>"                  name="objeto[<%$index + 1%>][costos]"                 readonly="readonly">  
          <input type="hidden"   value="<% todo.bandera_insumo %>"         name="objeto[<%$index + 1%>][bandera_insumo]"         readonly="readonly">
          <input type="hidden"   value="<% todo.precio %>"                 name="objeto[<%$index + 1%>][precio]"                 readonly="readonly">
          <input type="hidden"   value="<% todo.total %>"                  name="objeto[<%$index + 1%>][total]"                  readonly="readonly">
          <input type="hidden"   value="<% todo.cantidad %>"               name="objeto[<%$index + 1%>][cantidad]"               readonly="readonly">
          <input type="hidden"   value="<% todo.unidad_venta %>"           name="objeto[<%$index + 1%>][unidad_medida]"          readonly="readonly">
          <input type="hidden"   value="<% todo.codigo_proovedor %>"       name="objeto[<%$index + 1%>][codigo_proovedor]"       readonly="readonly">
          <input type="hidden"   value="<% todo.descripcion %>"            name="objeto[<%$index + 1%>][descripcion]"            readonly="readonly">
          <input type="hidden"   value="<% todo.descuento %>"              name="objeto[<%$index + 1%>][descuento]"              readonly="readonly">
          <input type="hidden"   value="<% todo.m_product_category_id %>"  name="objeto[<%$index + 1%>][m_product_category_id]"  readonly="readonly">
          <input type="hidden"   value="<% todo.id_insumo_prestamo %>"     name="objeto[<%$index + 1%>][id_insumo_prestamo]"     readonly="readonly">
          <input type="hidden"   value="<% todo.id_prestamo %>"            name="objeto[<%$index + 1%>][id_prestamo]"            readonly="readonly">
        </td>
      </tr>
    </table>

    <table class="table table-striped bg-info pull-right" border="0">
      <tr>
        <td>
          <div class="form-group has-info">
            <label class="control-label" for="addon1">SUBTOTAL: <i class="material-icons">monetization_on</i></label>
            <div class="input-group">
              <span class="input-group-addon"></span>
              <span class="black" ng-show="ver_precios_servicio"> <% subTotal | number:2%>     </span>
              {!! Form::hidden('subtotal','<%subTotal%>',array('class'=>'form-control','id'=>'subtotal')) !!}
            </div>
          </div>
        </td>
        <td>
          <div class="form-group has-info">
            <label class="control-label" for="addon1">IVA: <i class="material-icons">monetization_on</i>% 0.16</label>
            <div class="input-group">
              <span class="input-group-addon"></span>
              <span class="black" ng-show="ver_precios_servicio"> <% ivaT | number:2%></span>
              {!! Form::hidden('iva','<%ivaT%>',array('class'=>'form-control','id'=>'iva')) !!}
            </div>
          </div>
        </td>
        <td>
          <div class="form-group has-info">
            <label class="control-label" for="addon1">TOTAL: <i class="material-icons">monetization_on</i></label>
            <div class="input-group">
              <span class="input-group-addon"></span>
              <span class="black" ng-show="ver_precios_servicio"> <% totales | number:2%></span>
              {!! Form::hidden('total','<% totales %>',array('class'=>'form-control')) !!}
            </div>
          </div>
        </td>
        <td>
          <div class="form-group has-info">
            <label class="control-label" for="addon1">  <span class="badge"><h3><% moneda_destino %></h3></span></label>
          </div>
        </td>
      </tr>
      <tr>
        <td colspan="3" align="center"><span class="badge" ng-show="ver_precios_servicio"><p><% letras %></p></span> </td> 
      </tr>
    </table>

  </div>
  <div class="panel-footer" > 
    <button type="button" class="btn btn-warning btn-lg" ng-click="vaciarLista();"><i class="material-icons">blur_on</i>VACIAR LISTA</button> 
  </div>   
</div>
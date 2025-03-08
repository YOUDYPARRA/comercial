<div class="panel panel-default">
  <div class="panel-heading">LISTA DE PRODUCTOS Total:<span class="badge"><%insumos.length%></span> </div>
  <div class="panel-body panel-info">
    <table class="table table-striped table-bordered table-list table-responsive">
      <thead><tr>
        <th>Cantidad</th>
        <th>Unidad</th>
        <th> 
          <div class="media">
              <a href="#" class="pull-left">Codigo</a>
              <div class="media-body"><p class="summary">Descripción</p>
              </div>
          </div>
        </th>
        <th>Precio</th>
        <th>Total</th>
        <th></th>
        <th></th>
      </tr></thead>
      <tr ng-repeat="todo in insumos" ng-init="setTotals(todo);"> 
        <td> <% todo.cantidad %> </td>
        <td>  <span class="black"><% todo.unidad_venta %></span> </td>
        <td>
          <div class="media">
            <a href="#" class="pull-left"><% todo.codigo_proovedor%></a>
            <div class="media-body">
              <span class="media-meta pull-right"><small><%todo.categoria1%></small></span>  <!-- <% insumo.bandera_insumo%> -->
                <h4 class="title">
                  <span class="pull-right pendiente"><%todo.categoria2%></span> <!-- <% insumo.codigo_proovedor %> -->
                </h4>
                <p class="summary"><% todo.descripcion %></p>
            </div>
          </div>
        </td>
        <td> <span class="black" ng-show="ver_precios_servicio"> <% todo.precio %> </span> </td>
        <td> <span class="black" ng-show="ver_precios_servicio"> <% todo.total | number:2 %> </span> </td>
        <td><p class="text-warning" title="BORRAR PRODUCTO" ng-click="remover($index,todo.precio,todo.cantidad)"><i class="material-icons">delete_forever</i></p> 
        <td><p class="text-info" title="EDITAR PRECIO" ng-click="editarPrecio($index,todo);"><i class="material-icons">edit</i></p></td>
      </tr>
    </table>
    <table class="table table-striped bg-info pull-right" border="0">
      <tr>
        <td>
          <div class="form-group has-info">
            <label class="control-label" for="addon1">SUBTOTAL: <i class="material-icons">monetization_on</i></label>
            <div class="input-group">
              <span class="input-group-addon"></span>
              <span class="black" ng-show="ver_precios_servicio"> <% objeto.subtotal | number:2%>     </span>
            </div>
          </div>
        </td>
        <td>
          <div class="form-group has-info">
              <label class="control-label" for="addon1">IVA: <i class="material-icons">monetization_on</i>16 %</label>
              <div class="input-group">
                <span class="input-group-addon"></span>
                <span class="black" ng-show="ver_precios_servicio"> <% objeto.iva | number:2%></span>
              </div>
          </div>
        </td>
        <td>
          <div class="form-group has-info">
            <label class="control-label" for="addon1">TOTAL: <i class="material-icons">monetization_on</i></label>
            <div class="input-group">
              <span class="input-group-addon"></span>
              <span class="black" ng-show="ver_precios_servicio"> <% objeto.total | number:2%></span>
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
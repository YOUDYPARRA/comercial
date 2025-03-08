<div class="panel panel-info"> 
  <div class="panel-heading"><i class="material-icons">note_add</i> LISTA PRODUCTOS A DEVOVER</div>
  <div class="panel-body"> 
    <table class="table table-striped table-bordered table-list table-responsive">
      <tr>
        <th>.</th>
        <th>Cantidad</th>
        <th>Unidad</th>
        <th> 
          <div class="media">
            <a class="pull-left text-info">Codigo</a>
            <div class="media-body"><p class="summary">Descripción</p></div>
              <span class="pull-right"><small>Ubicación</small></span>  <!-- <% insumo.bandera_insumo%> -->
          </div>
        </th>
        <th></th>
      </tr>
      <tr ng-repeat="producto in insumos" ng-init="setTotals(producto)"> 
        <td> <% $index +1 %> </td>
        <td> <% producto.cantidad %> </td>
        <td> <% producto.unidad_venta %></td>
        <td>
          <div class="media">
            <a class="pull-left text-info"><% producto.codigo_proovedor%></a>
            <div class="media-body">
              <span class="media-meta pull-right"><small><%producto.especificaciones%></small></span>  <!-- <% insumo.bandera_insumo%> -->
              <h4 class="title"><span class="pull-right pendiente"><%producto.categoria2%></span> </h4>
              <p class="summary"><% producto.descripcion %></p>
            </div>
          </div>
        </td>
        <td><p class="text-warning" title="BORRAR PRODUCTO" ng-disabled="btnDelete" ng-click="remover($index,producto)"><i class="material-icons">delete_forever</i></p></td>
      </tr>
    </table>
  </div>
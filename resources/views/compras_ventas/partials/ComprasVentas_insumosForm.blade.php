<div class="panel panel-info"> 
  <div class="panel-heading"><i class="material-icons">note_add</i> DATOS PRODUCTOS</div>
 <div class="panel-body"> 
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
                    <th>Marca</th>
                    <th>Precio</th>
                    <th>Total</th>
                    <th></th>
                    <th></th>
          </tr></thead>
          <tbody>                          
          <tr ng-repeat="producto in compra_venta.insumos" ng-model="producto" ng-init="setTotals(producto)"> 
              <td> <% producto.cantidad %> </td>
              <td>  
                  <span class="black" ng-show="ver_insumo_costo"><% producto.unidad_compra %></span> 
                  <span class="black" ng-show="ver_insumo_precio"><% producto.unidad_venta %></span> 
              </td>
              <td>
                <div class="media">
                  <a href="#" class="pull-left"><% producto.codigo_proovedor%></a>
                  <div class="media-body">
                    <span class="media-meta pull-right"><small><span class="badge badge-info"><%producto.tax_id%></span></small></span>  <!-- <% insumo.bandera_insumo%> -->
                      <h4 class="title">
                        <span class="pull-right pendiente"><%producto.categoria2%></span> <!-- <% insumo.codigo_proovedor %> -->
                      </h4>
                      <p class="summary"><% producto.descripcion %></p><!--<%producto.tax_id%>-->
                  </div>
                </div>
              </td>
              <td><% producto.marca%><!--<span class="badge badge-info"><%producto.tax_id | maxLength : 8%></span>--></td>
              <td> 
                    <span class="black" ng-show="ver_insumo_costo"> <% producto.costos %> </span> 
                    <span class="black" ng-show="ver_insumo_precio"> <% producto.precio %> </span> 
              </td>
              <!--<td> <span class="black"> - <% producto.descuento %> </span> </td>-->
              <td> <% producto.total | number:2 %> </td>
              <td><p class="text-warning" title="BORRAR PRODUCTO" ng-hide="btnDelete" ng-click="remover($index,producto)"><i class="material-icons">delete_forever</i></p></td>
              <td><p class="text-info" title="EDITAR PRECIO" ng-hide="btnEdit" ng-click="editarPrecio($index,producto);"><i class="material-icons">edit</i></p> 
          </tr>
        </tbody>
      </table>

<table class="table table-striped bg-info pull-right" border="0">
  <tr>
    <td>
      <div class="form-group has-info">
          <label class="control-label" for="addon1">SUBTOTAL: <i class="material-icons">monetization_on</i></label>
          <div class="input-group">
            <span class="input-group-addon"></span>
              <% subTotal | number:2%>              
          </div>
      </div>
    </td>
    <td>
      <div class="form-group has-info">
          <label class="control-label" for="addon1">IVA: <i class="material-icons">monetization_on</i>% 0.16</label>
          <div class="input-group">
            <span class="input-group-addon"></span>
              <% compra_venta.iva | number:2%>
          </div>
      </div>
    </td>
    <td>
      <div class="form-group has-info">
          <label class="control-label" for="addon1">TOTAL: <i class="material-icons">monetization_on</i></label>
          <div class="input-group">
            <span class="input-group-addon"></span>
              <% compra_venta.total | number:2%>
          </div>
      </div>
    </td>
    <td>
      <div class="form-group has-info">
          <label class="control-label" for="addon1">  <span class="badge"><h3><% cambio %></h3></span></label>
      </div>
    </td>
  </tr>
  <tr>
    <td colspan="4" align="center"><span class="badge"><p><% letras %></p></span> </td> 
    <!--<td>  </td> 
    <td> </td> 
    <td> </td> -->
  </tr>
</table>
  </div>
 </div>
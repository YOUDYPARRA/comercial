<div class="panel panel-info"> 
  <div class="panel-heading"><i class="material-icons">note_add</i> DATOS INSUMOS</div>
 <div class="panel-body"> 
 <!--
      <div class='col-md-3'>
        <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'>nombre_icono</i> MARCAS: <span class="badge"><%option | unique%></span></label>
              <select name="marcass" id="repeaSelect" ng-model="marcass" class="form-control">
                    <option value="">Elije una opcion</option>
                    <option ng-repeat="option in insum" value="<%option.marca%>"><%option.marca%></option>
              </select>
        </div>
      </div>
-->
      <table class="table table-striped table-bordered table-list table-responsive">
                  <thead>
                    
                    <tr>
                    <th>Cantidad</th>
                    <th>Unidad</th>
                        <th> <div class="media">
                              <a href="#" class="pull-left">Codigo</a>
                              <div class="media-body"><p class="summary">Descripción</p>
                              </div>
                              </div>
                        </th>
                        <th>Precio</th>
                        <th>Total</th>
                        <th></th>
                        
                    </tr> 
                  </thead>
                  <tbody>                          
                  <!--  <tr ng-repeat="todo in insum | filter: { marca:marcass}" ng-init="setTotals(todo);" ng-click="enviarMarca(todo.marca)" >     -->
                      <tr ng-repeat="producto in compra_venta.insumos" ng-model="producto" ng-init="setTotals(producto);"> 
                          <td> <% producto.cantidad %> </td>
                          <td>  <% producto.unidad_compra %> </td>
                          <td>
                            <div class="media">
                              <a href="#" class="pull-left"><% producto.codigo_proovedor%></a>
                              <div class="media-body">
                                <span class="media-meta pull-right"><small><%producto.categoria1%></small></span>  <!-- <% insumo.bandera_insumo%> -->
                                  <h4 class="title">
                                    <span class="pull-right pendiente"><%producto.categoria2%></span> <!-- <% insumo.codigo_proovedor %> -->
                                  </h4>
                                  <p class="summary"><% producto.descripcion %></p>
                              </div>
                            </div>
                          </td>
                          
                          <td> 
                                <span class="black" ng-show="ver_insumo_costo"> <% producto.costos %> </span> 
                                <span class="black" ng-show="ver_insumo_precio"> <% producto.precio %> </span> 
                           </td>
                          
                          <td> <% producto.total | number:2 %> </td>
                          <!--<td> <% $index %> </td>->
                          <!--<td> <input type="checkbox" name="checkbox" ng-click="agregarInsumo(grupo);cmpMarca(grupo.marca)" ng-model="checked"> </td> -->
                        <!--  <td> <input type="checkbox" name="checkbox" ng-click="agregarInsumo(grupo)" ng-model="checked"> </td>-->
                          <td><button class="btn btn-warning" title="BORRAR PRODUCTO" ng-disabled="btnDelete" ng-click="remover($index,producto.costos,producto.cantidad)"><i class="material-icons">delete_forever</i></button></td>
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
              <% iva | number:2%>
          </div>
      </div>
    </td>
    <td>
      <div class="form-group has-info">
          <label class="control-label" for="addon1">TOTAL: <i class="material-icons">monetization_on</i></label>
          <div class="input-group">
            <span class="input-group-addon"></span>
              <% total | number:2%>
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
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">STOCK  </h4>
      </div>
      <div class="modal-body">

        <table>
  <tr>
    <th><input type="text" value="" id="combo" placeholder="CANT" size="5" readonly="readonly"></th>
    <th><input type="text" value="" id="combo" placeholder="UNIDAD VENTA" size="10" readonly="readonly"></th>
    <th>=</th>
    <th><input type="text" value="" id="combo" placeholder="CANT" size="5" readonly="readonly"></th>
    <th><input type="text" value="" id="combo" placeholder="UNIDAD COMPRA" size="10" readonly="readonly"></th>
    <th><input type="text" value="" id="combo" placeholder="CÓDIGO" size="10"   readonly="readonly"></th>
    <th><input type="text" value="" id="combo" placeholder="ALMACEN" size="15" readonly="readonly"></th>
    
  </tr>
  <tr ng-repeat="todo in productos"> 
    <td> <span class="badge"> <%todo.cantidad_venta%> </span></td> 
    <td> <input type="text"   value="<% todo.unidad_venta %>"     name="objeto[<%$index + 1%>][unidad_compra]"          size="10"     readonly="readonly">           </td>
    <td><span class="badge"> = </span> </td>
    <td><span class="badge"> <% todo.cantidad_compra %> </span> </td>
    <td> <input type="text"   value="<% todo.unidad_compra %>"     name="objeto[<%$index + 1%>][unidad_compra]"          size="10"     readonly="readonly">           </td>
    <td> <input type="text"   value="<% todo.codigo %>"      name="objeto[<%$index + 1%>][codigo_proovedor]"placeholder="CÓDIGO"      size="10" readonly="readonly">  </td> 
    <td> <input type="text"   value="<% todo.almacen %>" name="objeto[<%$index + 1%>][descripcion]"     placeholder="DESCRIPCIÓN" size="15" readonly="readonly">  </td>
<td><!--
    <select name="repeaSelect" id="repeaSelect" ng-model="tipo" class="form-control" ng-change="buscarAlmacen(tipo,todo.id);"  style="width: 100px;" ng-disabled="habilitarPrecio">
                <option value="">ALMACENES</option>
                    <option ng-repeat="option2 in almacenes" value="<%option2.warehouse_name%>"><%option2.warehouse_name%></option>
    </select>-->
    </td>
  </tr>
  </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
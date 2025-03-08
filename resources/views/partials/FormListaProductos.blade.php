<div class="panel panel-info"> 
  <div class="panel-heading"><i class="material-icons">note_add</i> LISTA PRODUCTOS</div>
  <div class="panel-body"> 
      <table class="table table-striped table-bordered table-list table-responsive">
          <thead><tr>
                    <th>Cantidad</th>
                    <th>Unidad</th>
                    <th> 
                      <div class="media">
                          <a class="pull-left text-info">Codigo</a>
                          <div class="media-body"><p class="summary">Descripción</p>
                          </div>
                      </div>
                    </th>
                    <th>Precio</th>
                    <th>Total</th>
                    <th></th>
                    <th> <!--<p class="text-warning" title="OBLIGATORIO"> <i class="material-icons">warning</i> </p>--></th>
          </tr></thead>
          <tbody>                          
                  <!--  <tr ng-repeat="todo in insum | filter: { marca:marcass}" ng-init="setTotals(todo);" ng-click="enviarMarca(todo.marca)" >     -->
          <tr ng-repeat="producto in insumos" ng-init="setTotals(producto)"> 
              <td> <% producto.cantidad %> </td>
              <td>  
                  <span class="black" ng-show="ver_insumo_costo"><% producto.unidad_compra %></span> 
                  <span class="black" ng-show="ver_unidad_venta"><% producto.unidad_venta %></span> 
              </td>
              <td>
                <div class="media">
                  <a class="pull-left text-info"><% producto.codigo_proovedor%></a>
                  <div class="media-body">
                    <span class="media-meta pull-right"><small><%producto.categoria1%></small></span>  <!-- <% insumo.bandera_insumo%> -->
                      <h4 class="title">
                        <span class="pull-right pendiente"><%producto.dato%><%producto.folio%></span> <!-- <% insumo.codigo_proovedor %> -->
                      </h4>
                      <p class="summary"><% producto.descripcion %></p>
                  </div>
                </div>
              </td>
              <td>
                    <span class="black" ng-show="ver_insumo_costo"> <% producto.costos %> </span> 
                    <span class="black" ng-show="ver_insumo_precio"> <% producto.precio %> </span> 
                </td>
              <td> <span ng-show="ver_precios_servicio"><% producto.total | number:2 %> </span></td>
              <td><p class="text-warning" title="BORRAR PRODUCTO" ng-disabled="btnDelete" ng-click="remover($index,'i')"><i class="material-icons">delete_forever</i></p></td>
              <td><p class="text-info" title="EDITAR PRECIO" ng-click="editarPrecio($index,producto);"><i class="material-icons" ng-show="ver_precios_servicio">edit</i></p></td>
              <td></td>
          </tr>
        </tbody>
      </table>
      <div class="row" ng-show="ver_precios_servicio">
        <div class="col-md-3">
          <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i><h5> SUBTOTAL:  <%subtotal | number:2%></h5></label>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i><h5> IVA:  <%iva | number:2%></h5></label>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i><h5> TOTAL:   <%total | number:2%> </h5></label>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i><h5> <%moneda_destino%> </h5></label>
          </div>
        </div>
      </div>
        <div class="row" ng-show="ver_precios_servicio">
          <div class="col-md-2">
          <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i><%%></label>
          </div>
        </div>
          <div class="col-md-8">
            <div class="form-group has-info">
              <label class='control-label'><i class='material-icons'></i><h5> <%letras%> </h5></label>
            </div>
          </div>
          <div class="col-md-2">
          <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i><%%></label>
          </div>
        </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group has-info">
              <label class='control-label'><i class='material-icons'></i>OBSERVACION INGENIERO SERVICIO</label>
              {!! Form::text('nota',null,array('ng-model'=>'objeto.nota','class'=>'form-control')) !!}
            </div>
          </div>
        </div>
 </div>
 <!--<div class="panel-footer">
    <span><%letras%></span>
    <span>SUBTOTAL: <%subtotal%></span>
    <span>IVA: <%iva%></span>
    <span>TOTAL: <%total%></span>
 </div>-->
<!-- Modal -->
<div id="index" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">STOCK  GENERAL</h4>
      </div>
      <div class="modal-body">
<div class="row">
  <div class='col-md-3'>  
        <div class="form-group label-floating has-info">
            <label class="control-label"><i class='material-icons'>search</i>CODIGO</label>
            {!! Form::text('modelo',null,array('class'=>'form-control','ng-model'=>'busquedaA.codigo','ng-change'=>'buscarA(busquedaA);')) !!}
        </div>
    </div>
    <!--
    <div class='col-md-3'>  
        <div class="form-group label-floating has-info">
            <label class="control-label"><i class='material-icons'>search</i>ALMACEN</label>
            {!! Form::text('modelo',null,array('class'=>'form-control','ng-model'=>'busquedaA.almacen','ng-change'=>'buscarA(busquedaA);')) !!}
        </div>
    </div>
    
    <div class='col-md-3'>  
        <div class="form-group label-floating has-info">
            <label class="control-label"><i class='material-icons'>search</i>CODIGO PROOVEDOR</label>
            {!! Form::text('codigo_proovedor',null,array('class'=>'form-control','ng-model'=>'busquedaC.todoText','ng-change'=>'buscarB(busquedaC);')) !!}
        </div>
    </div>
    <div class='col-md-3'>  
        <div class="form-group label-floating has-info">
            <label class="control-label"><i class='material-icons'>search</i> DESCRIPCION </label>
            {!! Form::text('descripcion',null,array('class'=>'form-control','ng-model'=>'busquedaC.descripcion','ng-change'=>'buscarB(busquedaC);')) !!}
        </div>
    </div>
    -->
    <!--<div class='col-md-3'>  
      <button type="button" class="btn btn-info" ng-click="buscar();" ><i class="material-icons">search</i> BUSCAR</button>        
    </div>-->
</div>

    <div class="row">
        <div class="col-md-12">            
            <div style="height: 400px; overflow: scroll"><!-- scroll-glue-top> -->
                <table class="table table-striped table-bordered table-list table-responsive">
                  <thead>
                    <tr>
                        <th> <div class="media">
                              <a href="#" class="pull-left">CANTIDAD</a>
                              <div class="media-body"><p class="summary">.</p>
                              </div>
                              </div>
                        </th>
                        <th>UNIDAD</th>
                       
                        <th>ALMACEN</th>
                    </tr> 
                  </thead>
                  <tbody>                          
                      <tr ng-repeat="grupo in stocks" ng-model="grupo" ng-click="equipos(grupo)"> 
                          <td>
                            <div class="media">
                              <a href="#" class="pull-left"><% grupo.primary_qty%></a>
                              <div class="media-body">
                                <span class="media-meta pull-right"><small><%grupo.categoria1%></small></span>  <!-- <% insumo.bandera_insumo%> -->
                                  <h4 class="title">
                                    <span class="pull-right pendiente"><%grupo.categoria2%></span> <!-- <% insumo.codigo_proovedor %> -->
                                  </h4>
                                  <p class="summary"><% grupo.descripcion %></p>
                              </div>
                            </div>
                          </td>
                          <td> 
                              <% grupo.primary_uom_name %>
                          </td>
                          
                          <td>
                              <% grupo.warehouse_name %>
                          </td>
                      </tr>
                    </tbody>
                  </table>            
                </div>
        </div>
    </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
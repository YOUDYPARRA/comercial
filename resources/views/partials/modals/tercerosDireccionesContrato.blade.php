<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="gridSystemModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="gridSystemModalLabel">
                {!! Form::text('menu',null,array('ng-model'=>'tercero_filtro.nombre_fiscal','class'=>'form-control','placeholder'=>'Buscar...')) !!}
                <button type="button" class="btn btn-raised btn-info" ng-click="filtroTercero()"><i class="material-icons">search</i>Tercero</button>
                <button type="button" class="btn btn-raised btn-info" ng-click="filtroContrato()"><i class="material-icons">search</i>Contrato: <%filtro_contratos.cantidad%></button>
                <button type="button" class="btn btn-raised btn-info" ng-click="filtroDireccion()"><i class="material-icons">search</i>Dirección</button>
                <span ng-show="progress" class="badge badge-warning"> Cargando ...</span>
            </h4>
          </div>
          <div class="modal-body">
              <table class="table table-striped table-bordered table-list table-responsive">
                      <thead>
                        <tr>
                            <th>
                               <div class="media">
                                    <a href="#" class="pull-left">NOMBRE</a>
                                    <div class="media-body"><p class="summary">Descripción</p></div>
                                </div>
                            </th>
                        </tr> 
                      </thead>
                      <tbody>                          
                          <tr ng-repeat="cliente in cliente.terceros" ng-model="tercero" ng-click="clienteClk(cliente)"> 
                              <td>
                                <div class="media">
                                  <span class="media-meta pull-left"><small><b><%cliente.org_name%> <%cliente.organizacion%></b></small></span><br>
                                  <a href="" class="pull-left"><% cliente.value%> <% cliente.bpartner_name%> <%cliente.taxid%></a> <!-- TERCERO -->
                                  <a href="" class="pull-left"><%cliente.name%></a>   <!--DIRECCION -->
                                  <span class="pull-left "><%cliente.address1%> <%cliente.address2%></span>
                                  <span class="media-meta pull-left"><p class="summary"><%cliente.folio_contrato%> <%cliente.instituto%> </p></span><br>
                                  <span class="media-meta pull-left"><small><%cliente.numero_serie%> <%cliente.modelo%> <%cliente.marca%> <%cliente.modelo%> <%cliente.fecha_fin_garantia%></small></span><br>
                                      <p class="summary"><%cliente.tipo_servicio%></p>
                                </div>
                              </td>
                          </tr>
                          <tr ng-repeat="cliente in direcciones" ng-model="tercero" ng-click="clienteClk(cliente)" ng-init="verOrg(cliente)"> 
                              <td>
                                <div class="media">
                                  <span class="media-meta pull-left"><small><b><%cliente.org_name%> <%cliente.organizacion%><%o%></b></small></span><br>
                                  <a href="" class="pull-left"><% cliente.value%> <% cliente.bpartner_name%> <%cliente.taxid%></a> <!-- TERCERO -->
                                  <a href="" class="pull-left"><%cliente.name%></a>   <!--DIRECCION -->
                                  <span class="pull-left "><%cliente.address1%> <%cliente.address2%></span>
                                  <span class="media-meta pull-left"><p class="summary"><%cliente.folio_contrato%> <%cliente.instituto%> </p></span><br>
                                  <span class="media-meta pull-left"><small><%cliente.numero_serie%> <%cliente.modelo%> <%cliente.marca%> <%cliente.modelo%> <%cliente.fecha_fin_garantia%></small></span><br>
                                      <p class="summary"><%cliente.tipo_servicio%></p>
                                </div>
                              </td>
                          </tr>
                        </tbody>
                      </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-raised btn-inverse" data-dismiss="modal">Cerrar</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
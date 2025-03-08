<div class="row">
        <div class="col-sm-12">            
            <div style="height: 300px; overflow: scroll"><!-- scroll-glue-top> -->
                <table class="table table-striped table-bordered table-list table-responsive">
                  <thead>
                    <tr>
                        <th>Folio cliente</th>{{--campo instituto--}}
                        <th>Folio contrato interno</th>
                        <th> <div class="media">
                              <a href="#" class="pull-left">Equipo</a>
                              <div class="media-body"><p class="summary">Modelo</p>
                              </div>
                              </div>
                        </th>
                        <th>Fecha inicio garantia</th>
                        <th>fecha fin garantia</th>
                    </tr> 
                  </thead>
                  <tbody>                          
                      <tr ng-repeat="contrato in contratos" ng-model="contratos">
                      <td><%contrato.folio%></td>
                      <td><%contrato.folio_contrato%></td>
                          <td>
                            <div class="media">
                              <a href="#" class="pull-left"><% contrato.equipo%></a>
                              <div class="media-body">
                                <span class="media-meta pull-right"><small><%contrato.modelo%></small></span>  <!-- <% insumo.bandera_insumo%> -->
                                  <h4 class="title">
                                    <span class="pull-right pendiente"></span> <!-- <% insumo.codigo_proovedor %> -->
                                  </h4>
                                  <p class="summary"></p>
                              </div>
                            </div>
                          </td>
                          <td> 
                              <% contrato.fecha_inicio %>
                          </td>
                          <td> 
                              <% contrato.fecha_fin %>
                          </td>
                      </tr>
                    </tbody>
                  </table>            
                </div>
        </div>
    </div>
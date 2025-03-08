<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="gridModalEquip">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="gridSystemModalLabel">

                {!! Form::text('serie',null,array('ng-model'=>'filtro_equipo.numero_serie','class'=>'form-control','placeholder'=>'Serie...')) !!}
                <button type="button" class="btn btn-raised btn-primary" ng-click="expediosBsc()"><i class="material-icons">search</i></button><span ng-show="progress" class="badge badge-warning"> Cargando ...</span>
            </h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <table class="table table-striped table-bordered table-list table-responsive">
                      <thead>
                        <tr>
                            <th>
                               <div class="media">
                                    <a href="#" class="pull-left">EQUIPO</a>
                                    <div class="media-body"><p class="summary">Descripción</p>
                                    </div>

                                </div>
                            </th>
                            
                        </tr> 
                      </thead>
                      <tbody>                          
                          <tr ng-repeat="expendido in filtro_equipo.equipos" ng-model="expendido" ng-click="expedios(expendido)"> 
                              <td>
                                <div class="media">
                                  <p>
                                    <a href="#" class="pull-left"><% expendido.nombre_fiscal%></a>
                                  </p>
                                  <div class="media-body">
                                    <span class="media-meta pull-left"><%expendido.numero_serie%></span><br>
                                    <span class="media-meta pull-right">
                                        <small><%expendido.equipo%></small>
                                        <small><%expendido.modelo%></small>
                                        </span>
                                      <h4 class="title">
                                        <span class="pull-right "><%expendido.nombre_cliente%></span> 
                                      </h4>
                                      <p class="summary">
                                      <%expendido.ciudad%>
                                      <%expendido.estado%>
                                      <%expendido.calle%>
                                      <%expendido.colonia%>
                                      </p>
                                  </div>
                                </div>
                              </td>
                              
                          </tr>
                        </tbody>
                      </table>
              
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
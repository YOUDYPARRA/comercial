<div class="modal fade"  role="dialog" id="bscEquipo">
      <div class="modal-dialog modal-lg" >
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" >
              <span ng-show="progress" class="badge badge-warning"> Cargando ...</span>
            </h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <table class="table table-striped table-bordered table-list table-responsive">{{--INICIO TABLA EQUIPO--}}
                    <thead>
                        <tr>
                            <th>SERIE</th>
                            <th>MODELO</th>
                            <th> 
                              <div class="media">
                                  <a href="#" class="pull-left">NOMBRE FISCAL</a>
                                  <div class="media-body"><p class="summary">DIRECCIÓN EQUIPO</p>
                                  </div>
                              </div>
                            </th>
                            <th>GARANTIA INICIO</th>
                            <th>GARANTIA FIN</th>
                            <th>DIRECCION EQUIPO</th>
                        </tr>
                    </thead>
                    <tr ng-repeat="equipo in filtro.expendidos" ng-model="producto" ng-click="slcExpendido(this.equipo)">
                        <th><%equipo.numero_serie%></th>
                            <td><%equipo.modelo%></td>
                            <td> 
                              <div class="media">
                                  <a href="#" class="pull-left"><%equipo.nombre_fiscal%></a>
                                  <div class="media-body"><p class="summary"><%equipo.nombre_cliente%></p></div>
                              </div>
                            </td>
                            <td><%equipo.fecha_inicio%></td>
                            <td><%equipo.fecha_fin%></td>
                            <td><%equipo.nombre_cliente%> <%equipo.calle%> <%equipo.colonia%> <%equipo.c_p%> <%equipo.ciudad%> <%equipo.estado%></td>
                    </tr>
                </table>{{--FIN TABLA EQUIPO--}}
              
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
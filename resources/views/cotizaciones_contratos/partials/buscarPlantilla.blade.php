<div class="modal fade"  role="dialog" id="bscPlantilla">
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
               <table class="table table-striped table-bordered table-list table-responsive">{{--INICIO TABLA PLANTILLA--}}
                    <thead>
                        <tr>
                            <th>NOMBRE</th>
                            <th>AUTOR</th>
                            <th> 
                              <div class="media">
                                  <a href="#" class="pull-left">CLASE</a>
                                  <div class="media-body"><p class="summary">PLANTILLA</p>
                                  </div>
                              </div>
                            </th>
                            
                            <th></th>
                        </tr>
                    </thead>
                    <tr ng-repeat="plan in plantillas" ng-model="plan">
                            <td><%plan.nombre%></td>
                            <td><%plan.autor%></td>
                            <td> 
                              <div class="media">
                                  <a href="#" class="pull-left"><%plan.clase%></a>
                                  <div class="media-body"><p class="summary"><%plan.plantilla%></p>
                                  </div>
                              </div>
                            </td>
                            <td><button ng-click="slcPlantilla(this.plan)">Selccion</button> <button ng-click="elmPlantilla($index)">Elim</button></td>
                            

                    </tr>
                </table>{{--FIN TABLA PLANTILLA--}}
              
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
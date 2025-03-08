<div class="row">
  <div class='col-md-4'>       
    <div class="form-group has-info">
      <label class="control-label"><i class="material-icons">list</i>DETALLE</label>
      <div scroll-glue-top>
        <table class="table table-striped table-bordered table-list table-responsive">
          <thead>
            <tr>
              <th>RECURSOS CON OPCION DE AVISO</th>
            </tr> 
          </thead>
          <tbody>                          
            <tr ng-repeat="aviso_recurso in aviso_recursos" ng-model="recurso"> 
              <td>
                <div class="media">
                  <a href="#" class="pull-left"><% aviso_recurso.etiqueta%></a>
                  <div class="media-body">
                    <span class="media-meta pull-right"><small><%aviso_recurso.recurso%></small></span>
                  </div>
                  </div>
                </td>
                <td> 
                  <input type="checkbox" name="chkRecurso" value="ON" ng-model="check" ng-click="chkRecursos(aviso_recurso)"/>
                </td>
              </tr>
            </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class='col-md-4'>       
    <div class="form-group has-info">
      <label class="control-label"><i class="material-icons">person</i>USUARIO</label>
      <select ng-options="usuario as usuario.name for usuario in usuarios track by usuario.id" ng-model="slcUsuario" class="form-control"></select>
    </div>
  </div>
  <div class='col-md-4'>       
    <div class="form-group has-info">
      <label class="control-label"><i class="material-icons">status</i>ESTATUS</label>
      <input type="text" name="estado" ng-model="estado" class="form-control">
    </div>
  </div>

</div>
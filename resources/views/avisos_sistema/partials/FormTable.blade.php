
<div scroll-glue-top>
  <table class="table table-striped table-bordered table-list table-responsive">
    <tbody>                          
      <tr ng-repeat="permiso_usuario in permisos_usuarios" ng-model="permiso_usuario"> 
        <td>
          <div class="media">
            <div class="media-body">
              <h4 class="title">
                <span class="pull-right pendiente">.</span>
              </h4>
              <p class="summary"><%permiso_usuario.recurso%>.</p>
            </div>
          </div>
        </td>
        <td> 
          <button type="submit" ng-click="elimina(permiso_usuario)" title="ELIMINAR" class="btn btn-warning btn-lg"><i class="material-icons">delete_forever</i></button>
        </td>
      </tr>
    </tbody>
  </table>
</div>
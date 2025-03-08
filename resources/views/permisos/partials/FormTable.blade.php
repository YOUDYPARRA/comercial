<div scroll-glue-top>
    <table class="table table-striped table-bordered table-list table-responsive">
      <tbody>                          
        <tr ng-repeat="permiso_usuario in permisos_usuarios" ng-model="permiso_usuario"> 
          <td>
            <div class="media">
            <!--<a href="#" class="pull-left"><% permiso_usuario.grupo%></a>-->
              <div class="media-body">
                <span class="media-meta pull-right"><small><%permiso_usuario.nombre%>.</small></span>  <!-- <% insumo.bandera_insumo%> -->
                  <h4 class="title">
                    <span class="pull-right pendiente">.</span> <!-- <% insumo.codigo_proovedor %> -->
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
<div class='form-group'>
  <div class="row">
    <table class="table table-striped table-bordered table-list table-responsive">
      <thead>
        <tr>
          <th></th>
          <th>AVISOS DE USUARIO</th>
          <th></th>
        </tr> 
      </thead>
      <tbody>                          
        <tr ng-repeat="aviso in avisos" ng-model="aviso"> 
          <td><%$index+1%></td>
          <td>
            <div class="media">
              <div class="media-body">
                {{--<h4 class="title">
                  <span class="pull-right pendiente"><p ng-bind-html = "aviso.recurso"> </p></span>
                </h4>--}}
                <p class="summary"><%aviso.acceso%>.</p>
              </div>
            </div>
          </td>
          {{--<td><%aviso.estado%></td>--}}
          {{--<td><%aviso.dato%></td>--}}

          <td><a href="avisos_sistema/<%aviso.id%>" type="button" class="btn btn-info" title="REVISAR"><i class="material-icons">redo</i></a></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
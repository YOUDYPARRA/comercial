@if(isset($id) )
  <label>ID</label>
  {!! Form::text('id',null,array('required'=>'','class'=>'form-control','id'=>'id','readonly'=>'readonly','ng-model'=>'permiso.id','ng-init'=>'permiso.id='.$id)) !!}
@endif
<div class="row">
  <div class='col-md-3'>       
    <div class="form-group has-info">
      <label class="control-label"><i class="material-icons">tab</i>MENU</label>
      <select name="slcMenu"  ng-model="slcMenu" ng-change="consultaRecursos()" class="form-control" >
        <option ng-repeat="user in menus | orderBy : 'menu'" value="<%user.id%>"><%user.menu%></option>
      </select>      <!--<select ng-options="menu as menu.menu for menu in menus track by menu.id" ng-model="slcMenu" ng-change="consultaRecursos()"></select>-->
    </div>
  </div>
  <div class='col-md-3'>       
    <div class="form-group has-info">
      <label class="control-label"><i class="material-icons">list</i>DETALLE</label>
      <div scroll-glue-top>
      <table class="table table-striped table-bordered table-list table-responsive">
        <thead>
          <tr>
            <th>RECURSOS</th>
          </tr> 
        </thead>
        <tbody>                          
          <tr ng-repeat="menu_recurso in menu_recursos" ng-model="recurso"> 
            <td>
              <div class="media">
                <a href="#" class="pull-left"><% menu_recurso.etiqueta%></a>
                <div class="media-body">
                  <span class="media-meta pull-right"><small><%menu_recurso.recurso%></small></span>  <!-- <% insumo.bandera_insumo%> -->
                    <h4 class="title">
                    <span class="pull-right pendiente">.</span> <!-- <% insumo.codigo_proovedor %> -->
                    </h4>
                    <p class="summary"></p>
                </div>
              </div>
            </td>
            <td> 
              <input type="checkbox" name="chkRecurso" value="ON" ng-model="check" ng-click="chkRecursos(menu_recurso)"/>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    </div>
  </div>
  <div class='col-md-3'>       
    <div class="form-group has-info">
      <label class="control-label"><i class="material-icons">person</i>USUARIO</label>
      <select ng-options="usuario as usuario.name for usuario in usuarios track by usuario.id" ng-model="slcUsuario" ng-click="limpiaGrupo()" class="form-control"></select>
    </div>
  </div>
  <div class='col-md-3'>       
    <div class="form-group has-info">
      <label class="control-label"><i class="material-icons">people</i>GRUPO</label>
      <select ng-options="grupo as grupo.grupo for grupo in grupos track by grupo.id" ng-model="slcGrupo" ng-click="limpiaUsuario()" class="form-control"> </select>
    </div>
  </div>

</div>
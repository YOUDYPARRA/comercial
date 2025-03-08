<div class="panel panel-info"> 
  <div class="panel-heading"><i class="material-icons">note_add</i> EQUIPO DE TRABAJO <span class="badge" ng-show="msg">Cargando ...</span></div>
    <div class="panel-body"> 
    <div class="row">        
        <div class='col-md-3'>        
            <div class="form-group has-info">
                <span class="badge badge-warning" ng-show="formOrdenServicio.usuario1.$error.required">*</span>
                <span class="badge badge-warning" ng-show="formProgramacion.usuario1.$error.required">*</span>
                <label class='control-label'><i class='material-icons'>edit</i>INGENIERO DE SERVICIO 1</label>
                <select name="usuario1" ng-model="persona[0]" class="form-control">
                     <option value="">Elegir. . .</option>
                     <option ng-repeat="user in usuarios | orderBy : 'name'" ng-if="user.puesto == 'COORDINADOR DE SERVICIOS' || user.puesto == 'INGENIERO DE SERVICIOS'" value="<%user.id%>"><%user.name%></option>
                </select>
            </div>
        </div>
        <div class='col-md-3'>        
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'>edit</i>INGENIERO DE SERVICIO 2</label>
                <select  ng-model="persona[1]" class="form-control">
                     <option value="">Elegir. . .</option>
                     <option ng-repeat="user in usuarios | orderBy : 'name'" ng-if="user.puesto == 'COORDINADOR DE SERVICIOS' || user.puesto == 'INGENIERO DE SERVICIOS'" value="<%user.id%>"><%user.name%></option>
                </select>
            </div>
        </div>
        <div class='col-md-3'>        
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'>edit</i>INGENIERO DE SERVICIO 3</label>
                <select  ng-model="persona[2]" class="form-control">
                     <option value="">Elegir. . .</option>
                     <option ng-repeat="user in usuarios | orderBy : 'name'" ng-if="user.puesto == 'COORDINADOR DE SERVICIOS' || user.puesto == 'INGENIERO DE SERVICIOS'" value="<%user.id%>"><%user.name%></option>
                </select>
            </div>
        </div>
        <div class='col-md-3'>        
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'>edit</i>INGENIERO DE SERVICIO 4</label>
                <select  ng-model="persona[3]" class="form-control">
                     <option value="">Elegir. . .</option>
                     <option ng-repeat="user in usuarios | orderBy : 'name'" ng-if="user.puesto == 'COORDINADOR DE SERVICIOS' || user.puesto == 'INGENIERO DE SERVICIOS'" value="<%user.id%>"><%user.name%></option>
                </select>
            </div>
        </div>
        <div class='col-md-3'>        
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'>edit</i>INGENIERO DE SERVICIO 5</label>
                <select  ng-model="persona[4]" class="form-control">
                     <option value="">Elegir. . .</option>
                     <option ng-repeat="user in usuarios | orderBy : 'name'" ng-if="user.puesto == 'COORDINADOR DE SERVICIOS' || user.puesto == 'INGENIERO DE SERVICIOS'" value="<%user.id%>"><%user.name%></option>
                </select>
            </div>
        </div>
        <div class='col-md-3'>        
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'>edit</i>INGENIERO DE SERVICIO 6</label>
                <select  ng-model="persona[5]" class="form-control">
                     <option value="">Elegir. . .</option>
                     <option ng-repeat="user in usuarios | orderBy : 'name'" ng-if="user.puesto == 'COORDINADOR DE SERVICIOS' || user.puesto == 'INGENIERO DE SERVICIOS'" value="<%user.id%>"><%user.name%></option>
                </select>
            </div>
        </div>
    </div>
    </div>
</div>
<div class="panel panel-info"> 
  <div class="panel-heading"><i class="material-icons">note_add</i> EQUIPO DE TRABAJO <span class="badge" ng-show="msg">Cargando ...</span></div>
    <div class="panel-body"> 
    <div class="row">
        <div class='col-md-3'>        
        <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'>edit</i>INGENIERO DE SERVICIO 1</label>
            <select ng-model="objeto.persona[0]" ng-change="persona_servicio(objeto.persona[0])" ng-options="usuario as usuario.name for usuario in filtro.usuarios" class="form-control">
                     <option value="">Elegir. . .</option>
            </select>
        </div>
        </div>
        <div class='col-md-3'>        
        <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'>edit</i>INGENIERO DE SERVICIO 2</label>
            <select   ng-model="objeto.persona[1]" ng-change="persona_servicio(objeto.persona[1])" ng-options="usuario as usuario.name for usuario in filtro.usuarios" class="form-control">
                     <option value="">Elegir. . .</option>
            </select>
        </div>
        </div>
        <div class='col-md-3'>        
            <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'>edit</i>INGENIERO DE SERVICIO 3</label>
            <select  ng-model="objeto.persona[2]" ng-change="persona_servicio(objeto.persona[2])" ng-options="usuario as usuario.name for usuario in filtro.usuarios" class="form-control">
                     <option value="">Elegir. . .</option>
            </select>
            </div>
        </div>
        <div class='col-md-3'>            
        <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'>edit</i>INGENIERO DE SERVICIO 4</label>
            <select  ng-model="objeto.persona[3]" ng-change="persona_servicio(objeto.persona[3])" ng-options="usuario as usuario.name for usuario in filtro.usuarios" class="form-control">
                     <option value="">Elegir. . .</option>
            </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class='col-md-3'>        
        <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'>edit</i>INGENIERO DE SERVICIO 5</label>
        	<select ng-model="objeto.persona[4]" ng-change="persona_servicio(objeto.persona[4])" ng-options="usuario as usuario.name for usuario in filtro.usuarios" class="form-control">
                     <option value="">Elegir. . .</option>
            </select>
        </div>
        </div>
        <div class='col-md-3'>        
        <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'>edit</i>INGENIERO DE SERVICIO 6</label>
        	<select   ng-model="objeto.persona[5]" ng-change="persona_servicio(objeto.persona[5])" ng-options="usuario as usuario.name for usuario in filtro.usuarios" class="form-control">
                     <option value="">Elegir. . .</option>
            </select>
        </div>
        </div>
        <div class='col-md-3'>        
        </div>
        <div class='col-md-3'>    
        </div>
    </div>

    </div>
</div>
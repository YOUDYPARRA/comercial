<div class="panel panel-info"> 
  <div class="panel-heading"><i class="material-icons">note_add</i> DATOS EQUIPO <span class="badge" ng-show="msg">Cargando ...</span></div>
    <div class="panel-body"> 
    <fieldset ng-disabled="esc_datosEquipo">
    <div class="row">
        <div class='col-md-3'>        
        <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formOrdenServicio.equipo.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formCustodia.equipo.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formReporte.equipo.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formProgramacion.equipo.$error.required">*</span>
            <label class='control-label'><i class='material-icons'>edit</i>EQUIPOS </label>
        	<select name="equipo" ng-change="filtroMarca()" ng-model="objeto.equipo" ng-options="equipo.nombre as equipo.nombre for equipo in filtro.producto.productos | orderBy : 'nombre'" class="form-control" required>
                     <option value="">Elegir. . .</option>
            </select>
        </div>
        </div>
        <div class='col-md-3'>        
        <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formOrdenServicio.marca.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formCustodia.marca.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formReporte.marca.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formProgramacion.marca.$error.required">*</span>
            <label class='control-label'><i class='material-icons'>edit</i>MARCAS </label>
        	<select name="marca" ng-change="filtroModelo()" ng-model="objeto.marca" ng-options="marca.marca as marca.marca for marca in filtro.marcas | orderBy : 'marca'" class="form-control" required>
                     <option value="">Elegir. . .</option>
            </select>
        </div>
        </div>
        <div class='col-md-3'>        
            <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formOrdenServicio.modelo.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formCustodia.modelo.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formReporte.modelo.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formProgramacion.modelo.$error.required">*</span>
            <label class='control-label'><i class='material-icons'>edit</i>MODELOS</label>
        	<select name="modelo" ng-model="objeto.modelo" ng-options="modelo.modelo as modelo.modelo for modelo in filtro.modelos" class="form-control" required>
                     <option value="">Elegir. . .</option>
            </select>
            </div>
        </div>
        <div class='col-md-3'>        
            <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formOrdenServicio.serie.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formCustodia.serie.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formReporte.serie.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formProgramacion.serie.$error.required">*</span>
            <label class='control-label'><i class='material-icons'>edit</i>SERIE</label>
            {!! Form::text('serie',null,array('ng-model'=>'objeto.numero_serie','class'=>'form-control','placeholder'=>'serie','required','ng-change'=>'getContrato()')) !!}
            
            <label class='control-label'><i class='material-icons'>edit</i>OTRA SERIE</label>
            {!! Form::text('dato',null,array('ng-model'=>'objeto.dato','class'=>'form-control','placeholder'=>'serie')) !!}
            </div>
        </div>
    </div>
</fieldset>
    </div>
</div>
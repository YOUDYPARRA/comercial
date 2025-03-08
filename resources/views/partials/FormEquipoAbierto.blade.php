<div class="panel panel-info"> 
  <div class="panel-heading"><i class="material-icons">note_add</i> DATOS EQUIPO <span class="badge" ng-show="msg">Cargando ...</span></div>
    <div class="panel-body"> 
    <fieldset ng-disabled="esc_datosEquipo">
    <div class="row">
        <div class='col-md-3'>        
        <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formOrdenes_servicio.equipo.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formOrdenServicio.equipo.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formCustodia.equipo.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formReporte.equipo.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formProgramacion.equipo.$error.required">*</span>
            <label class='control-label'><i class='material-icons'>edit</i>EQUIPOS </label>
            {!! Form::text('equipo',null,array('ng-model'=>'objeto.equipo','class'=>'form-control','placeholder'=>'EQUIPO','required')) !!}
        </div>
        </div>
        <div class='col-md-3'>        
        <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formOrdenes_servicio.marca.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formOrdenServicio.marca.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formCustodia.marca.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formReporte.marca.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formProgramacion.marca.$error.required">*</span>
            <label class='control-label'><i class='material-icons'>edit</i>MARCAS </label>
        	{!! Form::text('marca',null,array('ng-model'=>'objeto.marca','class'=>'form-control','placeholder'=>'MARCA','required')) !!}
        </div>
        </div>
        <div class='col-md-3'>        
            <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formOrdenes_servicio.modelo.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formOrdenServicio.modelo.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formCustodia.modelo.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formReporte.modelo.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formProgramacion.modelo.$error.required">*</span>
            <label class='control-label'><i class='material-icons'>edit</i>MODELOS</label>
        	{!! Form::text('modelo',null,array('ng-model'=>'objeto.modelo','class'=>'form-control','placeholder'=>'MODELO','required')) !!}
            </div>
        </div>
        <div class='col-md-3'>        
            <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formOrdenes_servicio.serie.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formOrdenServicio.serie.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formCustodia.serie.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formReporte.serie.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formProgramacion.serie.$error.required">*</span>
            <label class='control-label'><i class='material-icons'>edit</i>SERIE</label>
        	{!! Form::text('serie',null,array('ng-model'=>'objeto.numero_serie','class'=>'form-control','placeholder'=>'serie','required','ng-change'=>'getContrato()')) !!}
            </div>
        </div>
    </div>
</fieldset>
    </div>
</div>
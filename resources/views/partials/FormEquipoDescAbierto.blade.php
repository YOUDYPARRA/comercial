<div class="panel panel-info"> 
  <div class="panel-heading"><i class="material-icons">note_add</i> DATOS EQUIPO <span class="badge" ng-show="msg">Cargando ...</span></div>
    <div class="panel-body"> 
    <div class="row">
        <div class='col-md-3'>        
            <label class='control-label'><i class='material-icons'>edit</i>EQUIPOS </label>
            {!! Form::text('equipo',null,array('ng-model'=>'objeto.equipo','class'=>'form-control','placeholder'=>'EQUIPO','required')) !!}
        
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
            <label class='control-label'><i class='material-icons'>edit</i>DESCRIPCION</label>
            {!! Form::text('descripcion',null,array('ng-model'=>'objeto.descripcion','class'=>'form-control','placeholder'=>'descripcion','required','ng-change'=>'getContrato()')) !!}
            </div>
        </div>
        <div class="row">
            <div class='col-sm-2'>
                <button type="button" class="btn btn-raised btn-primary btn-sm" ng-click="agrEquipo()" ><i class="material-icons">note_add</i> Agregar </button>
            </div>
        </div>
    </div>
    <div class="row">
        <table class="table table-striped table-bordered table-list table-responsive">
            <thead>
                <tr>
                    <th>EQUIPO</th>
                    <th>MARCA</th>
                    <th>MODELO</th>
                    <th>DESCRIPCION</th>
                    <th></th>
                </tr>                        
            </thead>
            <tbody>
                <tr ng-repeat="feq in equipo_contrato">
                    <td><%feq.equipo%></td>
                    <td><%feq.marca%></td>
                    <td><%feq.modelo%></td>
                    <td><%feq.descripcion%></td>
                    <td>
                        <button ng-click="salContrato($index)">Borrar</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>
</div>
<div class="panel panel-info"> 
  <div class="panel-heading"><i class="material-icons">note_add</i> DATOS REPORTE <span class="badge" ng-show="msg">Cargando ...</span></div>
    <div class="panel-body"> 
    <fieldset ng-disabled="esc_datosReporte">
    <div class="row">
        <div class='col-md-12'></div>
    </div>
    <div class="row">
    <div class='col-md-3'>            
            <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i>CONTRATO COMPRA VENTA</label>
            {!! Form::text('folio_contrato_venta',null,array('class'=>'form-control','ng-model'=>'objeto.folio_contrato_venta','ng-change'=>'buscarCCV();')) !!}
            </div>
        </div>
    <div class='col-md-3'>
            <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formOrdenes_servicio.organizacion.$error.required">*</span>
            <label class='control-label'><i class='material-icons'></i>ORGANIZACION</label>
        <select name="organizacion" ng-model="objeto.organizacion" ng-options="organizacion.nombre as organizacion.nombre for organizacion in organizaciones" class="form-control" required>
                       <option value="">Elegir. . .</option>
                </select>   
            </div>
        </div>
        <div class='col-md-3'>        
            <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formOrdenes_servicio.coordinacion.$error.required">*</span>
            <label class='control-label'><i class='material-icons'></i>COORDINACIONES</label>
        <select name="coordinacion" ng-model="objeto.coordinacion" ng-options="coordinacion.nombre as coordinacion.nombre for coordinacion in filtro.coordinacion.objetos" class="form-control" required>
                       <option value="">Elegir. . .</option>
                </select>   
            </div>
        </div>
        <div class="col-md-3">
          <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formOrdenes_servicio.sucursal.$error.required">*</span>
            <label class='control-label'><i class='material-icons'></i>SUCURSAL SMH</label>
              <select name="sucursal" ng-model="objeto.sucursal" ng-options="sucursal.nombre as sucursal.nombre for sucursal in sucursales" class="form-control" required>
                <option value="">Elegir. . .</option>
              </select>          
          </div>
        </div>
        <div class='col-md-3'>
            <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i>FECHA INICIO GARANTIA</label>
            {!! Form::text('fecha_inicio',null,array('class'=>'form-control','ng-model'=>'objeto.fecha_inicio')) !!}
            </div>
        </div>
        <div class='col-md-3'>
            <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i>FECHA FIN GARANTIA</label>
            {!! Form::text('fecha_fin',null,array('class'=>'form-control','ng-model'=>'objeto.fecha_fin')) !!}
            </div>
        </div>
    </div>

</fieldset>    
    </div>
</div>

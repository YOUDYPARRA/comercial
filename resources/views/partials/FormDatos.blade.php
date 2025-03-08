<div class="panel panel-info"> 
  <div class="panel-heading"><i class="material-icons">note_add</i> DATOS REPORTE <span class="badge" ng-show="msg">Cargando ...</span></div>
    <div class="panel-body"> 
    <fieldset ng-disabled="esc_datosReporte">
    <div class="row">
        <div class='col-md-12'>        
            <div class="form-group has-info">
            <div ng-show="ver_etiquetaReporto"><span class="badge badge-warning" ng-show="formReporte.nombre_responsable.$error.required">*</span> <label class='control-label'><i class='material-icons'>edit</i> REPORTO</label>   </div>
            <span class="badge badge-warning" ng-show="formCustodia.nombre_responsable.$error.required">*</span>
            <div ng-show="ver_etiquetaResponsable"> <label class='control-label'><i class='material-icons'>edit</i> RESPONSABLE</label>   </div>
        {!! Form::text('nombre_responsable',null,array('ng-model'=>'objeto.nombre_responsable','class'=>'form-control','required')) !!}
            </div>
        </div>
        <div class='col-md-12'>        
            <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formCustodia.nota_cliente.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formReporte.nota_cliente.$error.required">*</span>
            <label class='control-label'><i class='material-icons'>edit</i> OBSERVACIONES</label>
        {!! Form::text('nota_cliente',null,array('ng-model'=>'objeto.nota_cliente','class'=>'form-control','required')) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class='col-md-3' ng-if="ver_coordinacion">        
            <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formReporte.coordinacion.$error.required">*</span><label class='control-label'><i class='material-icons'></i>COORDINACIONES</label>
        <select name="coordinacion" ng-model="objeto.coordinacion" ng-options="coordinacion.nombre as coordinacion.nombre for coordinacion in filtro.coordinacion.objetos" class="form-control" required>
                       <option value="">Elegir. . .</option>
                </select>   
            </div>
        </div>
        <div class="col-md-3">
          <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formReporte.sucursal.$error.required">*</span><label class='control-label'><i class='material-icons'></i>SUCURSAL SMH</label>
              <select name="sucursal" ng-model="objeto.sucursal" ng-options="sucursal.nombre as sucursal.nombre for sucursal in sucursales" class="form-control" required>
                <option value="">Elegir. . .</option>
              </select>          
          </div>
        </div>
        <div class='col-md-3' ng-if="ver_horaAtencion">        
            <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formReporte.hora_atencion.$error.required">*</span><label class='control-label'><i class='material-icons'></i> HORA ATENCION1</label>
        {!! Form::text('hora_atencion',null,array('ng-model'=>'objeto.hora_atencion','class'=>'form-control','placeholder'=>'00:00','ng-minlength'=>'5')) !!}
        <span ng-show="formReporte.hora_atencion.$error.minlength">Formato incorrecto, 00:00</span>
            </div>
        </div>{{--
        <div class='col-md-3' ng-if="ver_fechaAtencion">        
            <div class="form-group has-info">
            <span class="badge badge-warning"></span><label class='control-label'><i class='material-icons'></i> FECHA ATENCION 1</label>
        {{--!! Form::text('fecha_inicio',null,array('readonly'=>'readonly','ng-model'=>'objeto.fecha_inicio','class'=>'form-control','placeholder'=>'00-00-0000','ng-pattern'=>'/(0?[1-9]|[12][0-9]|3[01])\-^(0?[1-9]|1[012])\-(199\d)|([2-9]\d{3})$/')) 
                        <span ng-show="formReporte.fecha_inicio.$error.pattern">Formato incorrecto, Formato DD-MM-YYYY</span>
            </div>
        </div>!!--}}

    </div>
    <div class="row">
        <div class='col-md-4' ng-if="ver_resueltoPor">        
            <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i>RESUELTO POR:</label>
            <select name="resuelto_por" ng-model="objeto.resuelto_por" class="form-control" ng-change="cerrarReporte(objeto.resuelto_por)">
                    <option value="">Elige una opción</option>
                    <option ng-repeat="nombre in resoluciones" value="<%nombre.nombre%>"><% nombre.nombre | uppercase %></option>
            </select>
            <!--{!! Form::text('resuelto_por',null,array('ng-model'=>'objeto.resuelto_por','class'=>'form-control')) !!}-->
            </div>
        </div>
        <div class='col-md-4' ng-if="ver_condicion_servicio">        
            <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formCustodia.condicion_servicio.$error.required">*</span>
            <label class='control-label'><i class='material-icons'></i>CONDICION DE SERVICIO:</label>
            <select name="condicion_servicio" ng-model="objeto.condicion_servicio" class="form-control" required>
                    <option value="">Elige una opción</option>
                    <option ng-repeat="nombre in condiciones_servicio" value="<%nombre.nombre%>" ng-click="cerrarReporte('ok')"><% nombre.nombre | uppercase %></option>
            </select>
            <!--{!! Form::text('condicion_servicio',null,array('ng-model'=>'objeto.condicion_servicio','class'=>'form-control')) !!}-->
            </div>
        </div>
        <div class='col-md-4' ng-if="ver_estatus">        
            <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i>ESTATUS:</label>
            <select name="estatus" ng-model="objeto.estatus" class="form-control" required>
                    <option value="">Elige una opción</option>
                    <option ng-repeat="nombre in estatus" value="<%nombre.nombre%>"><% nombre.nombre | uppercase %></option>
            </select>
            </div>
        </div>
        <div class='col-md-4' ng-if="ver_fecha_reporte">        
            <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i>FECHA REPORTE</label>
            {!! Form::text('fecha_recepcion',null,array('required','ng-model'=>'objeto.fecha_recepcion','class'=>'form-control','placeholder'=>'00-00-0000','required')) !!}
            </div>
        </div>
    </div>
    <!--
    <div class="row">
        <div class='col-md-4'>        
            <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i></label>
        {!! Form::text('organizacion',null,array('ng-model'=>'objeto.organizacion','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'>        
            <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i></label>
			{!! Form::text('modificable',null,array('ng-model'=>'objeto.modificable','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-4'>        
            <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i></label>
        {!! Form::text('autor',null,array('ng-model'=>'objeto.autor','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'>        
            <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i></label>
			{!! Form::text('resuelto_por',null,array('ng-model'=>'objeto.resuelto_por','class'=>'form-control')) !!}
            </div>
        </div>
    </div>-->
</fieldset>    
    </div>
</div>

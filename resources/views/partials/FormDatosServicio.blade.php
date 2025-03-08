<div class="panel panel-info"> 
  	<div class="panel-heading"><i class="material-icons">note_add</i> DATOS DE SERVICIO <span class="badge" ng-show="msg">Cargando ...</span></div>
    <div class="panel-body"> 

	<div class="row">
		<div class="col-lg-4">
			<div class="form-group has-info">
			<span class="badge badge-warning" ng-show="formProgramacion.fecha_inicio.$error.required">*</span>
	                  <label class='control-label'><i class='material-icons'>edit</i> FECHA INICIO</label>
	                  <md-datepicker ng-model="fec_ini" md-placeholder="Selecciona la fecha ==>" ng-change="select_fec_ini(fec_ini)"></md-datepicker>
	                  {!! Form::hidden('fecha_inicio',null,array('ng-model'=>'objeto.fecha_inicio','class'=>'form-control','placeholder'=>'DD-MM-AAAA','required')) !!}
	        </div>			
		</div>
		<div class="col-lg-4">
			<div class="form-group has-info">
			<span class="badge badge-warning" ng-show="formProgramacion.fecha_fin.$error.required">*</span>
	                  <label class='control-label'><i class='material-icons'>edit</i> FECHA FINALIZA</label>
	                  <md-datepicker ng-model="fec_fin" md-placeholder="Selecciona la fecha ==>" ng-change="select_fec_fin(fec_fin)"></md-datepicker>
	                  {!! Form::hidden('fecha_fin',null,array('ng-model'=>'objeto.fecha_fin','class'=>'form-control','placeholder'=>'DD-MM-AAAA','required')) !!}
	        </div>			
		</div>
		<div class="col-lg-4">
			<div class="form-group has-info">
			<span class="badge badge-warning" ng-show="formProgramacion.hora_atencion.$error.required">*</span>
	                  <label class='control-label'><i class='material-icons'>edit</i> HORA ATENCION</label>
	                  {!! Form::text('hora_atencion',null,array('ng-model'=>'objeto.hora_atencion','class'=>'form-control','placeholder'=>'00:00:00','required')) !!}
	        </div>			
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'>edit</i>CONTRATO INTERNO<h6></h6></label>
                      {!! Form::text('folio_contrato',null,array('ng-model'=>'objeto.folio_contrato','class'=>'form-control')) !!}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'>edit</i>CONTRATO CLIENTE<h6></h6></label>
                      {!! Form::text('instituto',null,array('ng-blur'=>'filtroContrato()','ng-model'=>'objeto.instituto','class'=>'form-control')) !!}
            </div>
        </div>
		<div class="col-md-4">
            <div class="form-group has-info">
                      <label class='control-label'><i class='material-icons'>edit</i>COTIZACION</label>
                      <select name="numero_cotizacion" data-ng-model="objeto.id_cotizacion" class="form-control" multiple="true">
                                <option value="">Elige varias opciones</option>
                                <option data-ng-repeat="cot in cotizaciones" value="<%cot.id%>">Cot: <%cot.numero_cotizacion%> V: <%cot.version%></option>
                      </select>
                      {!! Form::hidden('numero_cotizacion',null,array('ng-blur'=>'filtroCotizacion()','ng-model'=>'objeto.id_cotizacion','class'=>'form-control')) !!}
            </div>
        </div>
		<div class="col-md-4">
            <div class="form-group has-info">
                      <label class='control-label'><i class='material-icons'></i></label>
                      {!! Form::hidden('id_prestamo_refaccion',null,array('ng-model'=>'objeto.id_prestamo_refaccion','class'=>'form-control')) !!}
            </div>
        </div>		
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="form-group has-info">
			<span class="badge badge-warning" ng-show="formProgramacion.coordinacion.$error.required">*</span>
                <label class='control-label'><i class='material-icons'>edit</i>COORDINACION</label>
                <select name="coordinacion" ng-model="objeto.coordinacion" ng-options="coordinacion.nombre as coordinacion.nombre for coordinacion in filtro.coordinacion.objetos" class="form-control" required>
                       <option value="">Elegir. . .</option>
                </select>          
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'>edit</i>TIPO SERVICIO</label>
                <span class="badge badge-warning" ng-show="formProgramacion.tipo_servicio.$error.required">*</span>
                <select name="tipo_servicio" ng-model="objeto.tipo_servicio" ng-options="tipo_servicio.nombre as tipo_servicio.nombre for tipo_servicio in tipos_servicio" class="form-control" required>
                       <option value="">Elegir. . .</option>
                </select>          
            </div>
    	</div>
    	<div class="col-md-4">
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'>edit</i>CONDICION SERVICIO</label>
                <span class="badge badge-warning" ng-show="formProgramacion.condicion_servicio.$error.required">*</span>
                <select name="condicion_servicio" ng-model="objeto.condicion_servicio" ng-options="condicion_servicio.nombre as condicion_servicio.nombre for condicion_servicio in condiciones_servicio" class="form-control" required>
                       <option value="">Elegir. . .</option>
                </select>          
            </div>
		</div>
	</div>
	<div class="row">
			<div class="col-md-4">
				<div class="form-group has-info">
	                <label class='control-label'><i class='material-icons'>edit</i>ASISTECIA</label>
	                <span class="badge badge-warning" ng-show="formProgramacion.asistencia.$error.required">*</span>
	                <select name="asistencia" ng-model="objeto.asistencia" ng-options="asistencia.nombre as asistencia.nombre for asistencia in asistencias" class="form-control" required>
	                       <option value="">Elegir. . .</option>
	                </select>          
	            </div>				
			</div>
			<div class="col-md-4">
				<div class="form-group has-info">
	                <label class='control-label'><i class='material-icons'>edit</i>SUCURSAL SMH</label>
	                <span class="badge badge-warning" ng-show="formProgramacion.sucursal.$error.required">*</span>
	                      <select name="sucursal" ng-model="objeto.sucursal" ng-options="sucursal.nombre as sucursal.nombre for sucursal in sucursales" class="form-control" required>
	                       <option value="">Elegir. . .</option>
	                </select>          
	            </div>
        	</div>
	</div>
	

</div>
</div>
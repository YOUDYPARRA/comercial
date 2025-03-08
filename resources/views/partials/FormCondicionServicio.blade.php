<div class="panel panel-info"> 
  <div class="panel-heading"><i class="material-icons">note_add</i> CONDICION DE SERVICIO <span class="badge" ng-show="msg">Cargando ...</span></div>
    <div class="panel-body"> 

	  <div class="row">
        <div class="col-md-3">
          <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i>CONTRATO</label>
              {!! Form::text('folio_contrato',null,array('ng-model'=>'objeto.folio_contrato','class'=>'form-control')) !!}
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group has-info">
              <label class='control-label'><i class='material-icons'></i>COTIZACION</label>
              <select name="numero_cotizacion" data-ng-model="objeto.id_cotizacion" class="form-control" multiple="true">
                                <option value="">Elige varias opciones</option>
                                <option data-ng-repeat="cot in cotizaciones" value="<%cot.id%>">Cotización: <%cot.numero_cotizacion%> Versión: <%cot.version%></option>
              </select>
              {!! Form::hidden('numero_cotizacion',null,array('ng-blur'=>'filtroCotizacion()','ng-model'=>'objeto.id_cotizacion','class'=>'form-control')) !!}
          </div>
        </div>
			  <div class="col-md-3">
          <div class="form-group has-info">
          <span class="badge badge-warning" ng-show="formOrdenServicio.sucursal.$error.required">*</span>
            <label class='control-label'><i class='material-icons'></i>SUCURSAL SMH</label>
              <select name="sucursal" ng-model="objeto.sucursal" ng-options="sucursal.nombre as sucursal.nombre for sucursal in sucursales" class="form-control" required>
                <option value="">Elegir. . .</option>
              </select>          
          </div>
        </div>
        <div class="col-md-3">
				  <div class="form-group has-info">
          <span class="badge badge-warning" ng-show="formOrdenServicio.fecha_atencion.$error.required">*</span>
	          <label class='control-label'><i class='material-icons'></i>FECHA ATENCION</label>
              <md-datepicker ng-model="fec_at" md-placeholder="Selecciona la fecha =>" ng-change="select_fec_at(fec_at)"></md-datepicker>
	            {!! Form::hidden('fecha_atencion',null,array('ng-model'=>'objeto.fecha_atencion','class'=>'form-control','placeholder'=>'00-00-0000','ng-pattern'=>'/(0?[1-9]|[12][0-9]|3[01])\-^(0?[1-9]|1[012])\-(199\d)|([2-9]\d{3})$/','required'=>'','ng-blur'=>'validaFecha(objeto.fecha_atencion)')) !!}
              <span ng-show="formOrdenServicio.fecha_atencion.$error.pattern">Formato incorrecto, Formato DD-MM-YYYY</span>
          </div>
	      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <div class="form-group has-info">
        <span class="badge badge-warning" ng-show="formOrdenServicio.coordinacion.$error.required">*</span>
          <label class='control-label'><i class='material-icons'></i>COORDINACION</label>
          <select name="coordinacion" ng-model="objeto.coordinacion" ng-options="coordinacion.nombre as coordinacion.nombre for coordinacion in filtro.coordinacion.objetos" class="form-control" required>
                 <option value="">Elegir. . .</option>
          </select>          
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group has-info">
        <span class="badge badge-warning" ng-show="formOrdenServicio.tipo_servicio.$error.required">*</span>
          <label class='control-label'><i class='material-icons'></i>TIPO SERVICIO</label>
          <select name="tipo_servicio" ng-model="objeto.tipo_servicio" ng-options="tipo_servicio.nombre as tipo_servicio.nombre for tipo_servicio in tipos_servicio" class="form-control" required>
            <option value="">Elegir. . .</option>
          </select>          
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group has-info">
          <span class="badge badge-warning" ng-show="formOrdenServicio.condicion_servicio.$error.required">*</span>
          <label class='control-label'><i class='material-icons'></i>CONDICION SERVICIO</label>
          <select name="condicion_servicio" ng-model="objeto.condicion_servicio" ng-options="condicion_servicio.nombre as condicion_servicio.nombre for condicion_servicio in condiciones_servicio" class="form-control" required>
              <option value="">Elegir. . .</option>
          </select>          
        </div>
      </div>
      <div class='col-md-3' ng-show="ver_resueltoPor">        
            <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i>RESUELTO POR:</label>
            <select name="resuelto_por" ng-model="objeto.resuelto_por" class="form-control" ng-change="validar(objeto.resuelto_por)">
                    <option value="">Elige una opción</option>
                    <option ng-repeat="nombre in resoluciones" value="<%nombre.nombre%>"><% nombre.nombre | uppercase %></option>
            </select>
            </div>
        </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="form-group has-info">
        <label class='control-label'><i class='material-icons'></i>TOTAL VIATICOS</label>
        {!! Form::text('monto_gasto',null,array('ng-model'=>'objeto.monto_gasto','class'=>'form-control','ng-pattern'=>'/^[1-9]+[0-9]*$/')) !!}
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group has-info">
        <label class='control-label'><i class='material-icons'></i>TOTAL GASTOS DIVERSOS</label>
        {!! Form::text('monto_gasto_diverso',null,array('ng-model'=>'objeto.monto_gasto_diverso','class'=>'form-control')) !!}
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group has-info">
        <label class='control-label'><i class='material-icons'></i>DESCRIPCION DE GASTOS DIVERSOS</label>
        {!! Form::text('describe_gasto_diverso',null,array('ng-model'=>'objeto.describe_gasto_diverso','class'=>'form-control')) !!}
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group has-info">
        <span class="badge badge-warning" ng-show="formOrdenServicio.trabajo_realizado.$error.required">*</span>
        <label class='control-label'><i class='material-icons'></i>TRABAJO REALIZADO </label> <label class="control-label text-warn"> TOTAL CARACTERES: 1500 - <%lleva%> = <%max%></label>
        {{--{!! Form::text('trabajo_realizado',null,array('ng-model'=>'objeto.trabajo_realizado','class'=>'form-control','required')) !!}--}}
        <textarea class="form-control" name="trabajo_realizado" ng-model="objeto.trabajo_realizado" placeholder="ESCRIBE EL TRABAJO REALIZADO" required maxlength="1500" ng-change="contar(objeto.trabajo_realizado)"></textarea>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group has-info">
      <span class="badge badge-warning" ng-show="formOrdenServicio.conclusion_trabajo.$error.required">*</span>
          <label class='control-label'><i class='material-icons'></i>CONCLUSION DEL TRABAJO</label>
          {!! Form::text('conclusion_trabajo',null,array('ng-model'=>'objeto.conclusion_trabajo','class'=>'form-control','title'=>'Pe. Se deja equipo funcionando en optimas condiciones')) !!}
      </div>
    </div>
    
  </div>
  <div class="row">
    <div class="col-md-6">
            <div class="form-group has-info">
            <!--<span class="badge badge-warning" ng-show="formOrdenServicio.nombre_responsable.$error.required">*</span>-->
                      <label class='control-label'><i class='material-icons'></i>NOMBRE DEL RESPONSABLE</label>
                      {!! Form::text('nombre_responsable',null,array('ng-model'=>'objeto.nombre_responsable','class'=>'form-control')) !!}
            </div>
    </div>
    <div class="col-md-6">
            <div class="form-group has-info">
                      <label class='control-label'><i class='material-icons'></i>DPTO. MANTENIMIENTO</label>
                      {!! Form::text('nombre_dpto_manto',null,array('ng-model'=>'objeto.nombre_dpto_manto','class'=>'form-control')) !!}
            </div>
    </div>
    
  </div>
  <div class="row">
    <div class="col-md-12">
            <div class="form-group has-info">
                      <label class='control-label'><i class='material-icons'></i>OBSERVACIONES CLIENTE</label>
                      {!! Form::text('nota_cliente',null,array('ng-model'=>'objeto.nota_cliente','class'=>'form-control')) !!}
            </div>
    </div>    
	</div>
	

</div>
</div>
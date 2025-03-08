<div class="row">
	<div class="col-md-3">
	    <div class="form-group has-info">
	    	<span class="badge badge-warning" ng-show="formProyectoVentas.fecha_inicio.$error.required">*</span>
		    <label class='control-label'><i class='material-icons'></i>FECHA</label>
		    <md-datepicker ng-model="fec_ini" md-placeholder="Selecciona la fecha =>" ng-change="select_fec_ini(fec_ini)"></md-datepicker>
		    {!! Form::hidden('fecha_inicio',null,array('ng-model'=>'objeto.fecha_inicio','class'=>'form-control','required'=>'')) !!}
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group has-info">
			<span class="badge badge-warning" ng-show="formProyectoVentas.autor.$error.required">*</span>
			<label class='control-label'><i class='material-icons'></i>REPRESENTANTE</label>{{--1--}}
			<select name="autor" ng-model="objeto.autor" class="form-control" required="">
                    <option value="">Elige un agente</option>
                    <option ng-repeat="contacto in usuarios" value="<%contacto.iniciales%>"><% contacto.name%></option>
            </select>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group has-info">
			<span class="badge badge-warning" ng-show="formProyectoVentas.sucursal.$error.required">*</span>
			<label class='control-label'><i class='material-icons'></i>SUCURSAL</label>
            <select name="sucursal" ng-model="objeto.sucursal" class="form-control" required="">
                    <option value="">Elegir opción:</option>
                    <option ng-repeat="objeto in sucursales" value="<%objeto.nombre%>"><% objeto.nombre %></option>
            </select>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group has-info">
			<span class="badge badge-warning" ng-show="formProyectoVentas.organizacion.$error.required">*</span>
			<label class='control-label'><i class='material-icons'></i>COMPAÑIA</label>
			<select name="organizacion" ng-model="objeto.organizacion" class="form-control" required="">
                    <option value="">Elige una organización</option>
                    <option ng-repeat="org in organizaciones | limitTo : 3"  ng-if="org.name!='*'"  value="<%org.name%>"><% org.name %></option>
        	</select>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-3">
		<div class="form-group has-info">
			<span class="badge badge-warning" ng-show="formProyectoVentas.canal.$error.required">*</span>
			<label class='control-label'><i class='material-icons'></i>CANAL</label>{{--1--}}
            <select name="canal" ng-model="objeto.canal" class="form-control" required="">
                    <option value="">Elegir opción:</option>
                    <option ng-repeat="canal in canales" value="<%canal.nombre%>"><% canal.nombre %></option>
            </select>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group has-info">
			<span class="badge badge-warning" ng-show="formProyectoVentas.instituto.$error.required">*</span>
			<label class='control-label'><i class='material-icons'></i>PUBLICO/PRIVADO </label>{{--3--}}
            <select name="instituto" ng-model="objeto.instituto" class="form-control" required="">
                    <option value="">Elegir opción:</option>
                    <option ng-repeat="ins in filtro.institutos" value="<%ins.nombre%>"><% ins.nombre %></option>
            </select>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group has-info">
			<span class="badge badge-warning" ng-show="formProyectoVentas.equipo.$error.required">*</span>
			<label class='control-label'><i class='material-icons'></i>MODALIDAD</label>
            <select name="equipo" ng-model="objeto.equipo" class="form-control" required="">
                    <option value="">Elegir opción:</option>
                    <option ng-repeat="objeto in equipos" value="<%objeto.nombre%>"><% objeto.nombre %></option>
            </select>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group has-info">
			<span class="badge badge-warning" ng-show="formProyectoVentas.modelo.$error.required">*</span>
			<label class='control-label'><i class='material-icons'></i>EQUIPO</label>
			{!! Form::text('modelo',null,array('ng-model'=>'objeto.modelo','class'=>'form-control','required'=>'')) !!}
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-3">
		<div class="form-group has-info">
			<span class="badge badge-warning" ng-show="formProyectoVentas.nombre_cliente.$error.required">*</span>
			<label class='control-label'><i class='material-icons'></i>CLIENTE</label>
			{!! Form::text('nombre_cliente',null,array('ng-model'=>'objeto.nombre_cliente','class'=>'form-control','required'=>'')) !!}
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group has-info">
		<span class="badge badge-warning" ng-show="formProyectoVentas.estado.$error.required">*</span>
			<label class='control-label'><i class='material-icons'></i>ESTADOS</label>
			<select name="estado" ng-model="objeto.estado" ng-options="c_e.id as c_e.nombre for c_e in ciudad_estados" class="form-control" ng-change="filtroCiudad()" required>
			</select>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group has-info">
		<span class="badge badge-warning" ng-show="formProyectoVentas.ciudad.$error.required">*</span>
			<label class='control-label'><i class='material-icons'></i>CIUDAD</label>
			<select  name="ciudad" ng-model="objeto.ciudad" class="form-control" required="">
		      	<option value="">Elegir. . .</option>
	    	  	<option ng-repeat="c in ciudades|orderBy:'nombre'" value="<%c.id%>"><%c.nombre%></option>
	    	</select>	
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group has-info">
		<span class="badge badge-warning" ng-show="formProyectoVentas.compromiso.$error.required">*</span>
			<label class='control-label'><i class='material-icons'></i>COMPROMISO</label>
			<select name="compromiso" ng-model="objeto.compromiso" ng-options="comp.nombre as comp.nombre for comp in compromisos" class="form-control" required>
			</select>             
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-3">
		<div class="form-group has-info">
			<label class='control-label'><i class='material-icons'></i>CANTIDAD</label>
			{!! Form::text('nota_cliente',null,array('ng-model'=>'objeto.nota_cliente','class'=>'form-control')) !!}
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group has-info">
			<label class='control-label'><i class='material-icons'></i>PRECIO VENTA (US)</label>
			{!! Form::text('numero_exterior',null,array('ng-model'=>'objeto.numero_exterior','class'=>'form-control')) !!}
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group has-info">
			<label class='control-label'><i class='material-icons'></i>MES DE LA ORDEN</label> 
			<select name="condicion_servicio" ng-model="objeto.mes_orden" ng-options="mes.nombre as mes.nombre for mes in meses" class="form-control">
			</select>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group has-info">
			<label class='control-label'><i class='material-icons'></i>MES DE LA VENTA</label>
			<select name="fecha_atencion" ng-model="objeto.fecha_atencion" ng-options="mes.nombre as mes.nombre for mes in meses" class="form-control" >
			</select>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-3">
		<div class="form-group has-info">
			<label class='control-label'><i class='material-icons'></i>TERMINOS DEL PAGO</label>
			<select name="condicion_servicio" ng-model="objeto.condicion_servicio" ng-options="term.nombre as term.nombre for term in terminos" class="form-control" >
			</select>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group has-info">
			<label class='control-label'><i class='material-icons'></i>ESTATUS DEL CREDITO</label>
			<select name="aprobado" ng-model="objeto.aprobado" ng-options="es.nombre as es.nombre for es in estatus_credito" class="form-control" >
			</select>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group has-info">
			<label class='control-label'><i class='material-icons'></i>GANADO/PERDIDO</label>
  			<select name="dato" ng-model="objeto.dato" ng-options="es.nombre as es.nombre for es in estados" class="form-control" >
			</select>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group has-info">
			<label class='control-label'><i class='material-icons'></i>RAZON</label>
			{!! Form::text('nota',null,array('ng-model'=>'objeto.nota','class'=>'form-control')) !!}
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-3">
		<div class="form-group has-info">
			<label class='control-label'><i class='material-icons'></i>ORDEN/CONTRATO</label>
			{!! Form::text('folio_contrato_venta',null,array('ng-model'=>'objeto.folio_contrato_venta','class'=>'form-control')) !!}
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group has-info">
			<label class='control-label'><i class='material-icons'></i>ENGANCHE</label>
			{!! Form::text('modificable',null,array('ng-model'=>'objeto.modificable','class'=>'form-control')) !!}
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group has-info">
			<label class='control-label'><i class='material-icons'></i>CONTRA ENTREGA</label>
			{!! Form::text('vigencia',null,array('ng-model'=>'objeto.vigencia','class'=>'form-control')) !!}
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group has-info">
			<label class='control-label'><i class='material-icons'></i>PAGOS MENSUALES</label>
			{!! Form::text('enviar_aviso',null,array('ng-model'=>'objeto.enviar_aviso','class'=>'form-control')) !!}
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group has-info">
			<label class='control-label'><i class='material-icons'></i>FECHA PROBABLE ENTREGA</label>
			<md-datepicker ng-model="fec_fin" md-placeholder="Selecciona la fecha =>" ng-change="select_fec_fin(fec_fin)"></md-datepicker>
			{!! Form::hidden('fecha_fin',null,array('ng-model'=>'objeto.fecha_fin','class'=>'form-control')) !!}
		</div>
	</div>
</div>
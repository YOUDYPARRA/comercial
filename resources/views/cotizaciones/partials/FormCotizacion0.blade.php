<div class="panel panel-default"><!-- ------------------------------------------ BARRA DE RELOJ INICIO -->
    <div class="panel-heading"> <label class="text-info">Cotización:</label> <span class="badge"> <%numero_cotizacion %> </span> <label class="text-info">Versión: <span class="badge"><%cotizacion.version%></span></label>	   <span class="badge badge-warning" ng-show="goCats">CAMPOS OBLIGATORIOS</span> <span class="badge badge-warning" ng-show="goCats">*</span><label class="text-info"><%prestamo%> <span class="badge"><%cotizacion.venta%></span></label></div>
	<div class="panel-body panel-info" ng-init="nombre_empledo='{{Auth::user()->name}}';iniciales_autor='{{Auth::user()->iniciales}}';centro_costo='{{Auth::user()->lugar_centro_costo}}';departamento='{{Auth::user()->departamento}}';area='{{Auth::user()->area}}';tipo_centro_costo='{{Auth::user()->centro_costo}}';tipo_usuario='{{Auth::user()->tipo_usuario}}';email='{{Auth::user()->email}}';puesto='{{Auth::user()->puesto}}'">
		{!! Form::hidden('id', '<%cotizacion.id%>' ,['class'=>'form-control','readonly'=>'true']) !!}
		{!! Form::hidden('ad_user_id','<%cotizacion.ad_user_id%>',['class'=>'form-control','readonly'=>'true']) !!}
		{!! Form::hidden('departamento','<%cotizacion.departamento%>',['class'=>'form-control','readonly'=>'true']) !!}
		{!! Form::hidden('area','<%cotizacion.area%>' ,['class'=>'form-control','readonly'=>'true']) !!}
		{!! Form::hidden('estatus', '<%cotizacion.estatus%>' ,['class'=>'form-control','readonly'=>'true']) !!}
		{!! Form::hidden('version','<%cotizacion.version%>',['required'=>'','class'=>'form-control','readonly'=>'true']) !!}	
		{!! Form::hidden('nombre_empleado','<%cotizacion.nombre_empleado%>',['class'=>'form-control','readonly'=>'true']) !!}
		{!! Form::hidden('numero_cotizacion','<%cotizacion.numero_cotizacion%>',['class'=>'form-control','readonly'=>'true']) !!}
		{!! Form::hidden('auto','<%cotizacion.auto%>',['class'=>'form-control','readonly'=>'true']) !!}
		{!! Form::hidden('centro_costo','<%cotizacion.centro_costo%>',['class'=>'form-control','readonly'=>'true']) !!}
		{!! Form::hidden('usuario','<%cotizacion.usuario%>',['class'=>'form-control','readonly'=>'true']) !!}
		{!! Form::hidden('org_name','<%cotizacion.org_name%>',['class'=>'form-control','readonly'=>'true']) !!}
		{!! Form::hidden('c_bpartner_id_fiscal','<%cotizacion.c_bpartner_id_fiscal%>',['class'=>'form-control']) !!}
        {!! Form::hidden('id_metodo_envio','<%cotizacion.id_metodo_envio%>',['class'=>'form-control']) !!}            
        {!! Form::hidden('org_id','<%cotizacion.org_id%>' ,['class'=>'form-control']) !!}
        {!! Form::hidden('c_bpartner_id','<%cotizacion.c_bpartner_id%>',['class'=>'form-control']) !!}
        {!! Form::hidden('c_location_id','<%cotizacion.c_location_id_fiscal%>',['class'=>'form-control']) !!}
        {!! Form::hidden('ad_user_id','<%cotizacion.ad_user_id%>',['class'=>'form-control']) !!}
        {!! Form::hidden('equipo','<%cotizacion.equipo%>',['class'=>'form-control']) !!}
        {!! Form::hidden('venta','<%cotizacion.venta%>',['class'=>'form-control']) !!}
        {!! Form::hidden('compra','<%cotizacion.compra%>',['class'=>'form-control']) !!}
        {!! Form::hidden('cotizacion','<%procesar%>',array('class'=>'form-control')) !!}
        {!! Form::hidden('sr','<%cotizacion.sr%>',['class'=>'form-control']) !!}
		<div class="row">
			<div class='col-md-3'>       
				<div class="form-group has-info">
					<label class="control-label"><i class="material-icons">event</i>Fecha cotización</label>
					<div class='input-group date'>			
						{!! Form::text('fecha',null,array('class'=>'form-control','ng-model'=>'cotizacion.fecha','id'=>'fecha')) !!}
					</div>
				</div>
			</div>
			<div class='col-md-3' ng-if="ver_org">       
				<div class="form-group has-info">
					<span class="badge badge-warning" ng-show="formCotizacion.org_name.$error.required">*</span>
					<label class="control-label"><i class="material-icons">domain</i>Organización</label>
					<select name="org_name" ng-model="cotizacion.org_name" class="form-control" ng-change="tipo_organizacion(cotizacion.org_name)" required="" ng-disabled="habilitarOrganizacion">
                    	<option value="">Organización</option>
                    	<option ng-repeat="org in organizaciones"  ng-if="org.name == 'SMH' || org.name =='IMS'"  value="<%org.name%>"><% org.name %></option>
        			</select>
				</div>
			</div>
			<div class='col-md-3'>     
				<div class="form-group has-info">
					<span class="badge badge-warning" ng-show="formCotizacion.tipo_cliente.$error.required">*</span>
					<label class="control-label"><i class="material-icons">face</i>Tipo cliente</label>
					<select name="tipo_cliente" ng-model="cotizacion.tipo_cliente" class="form-control" required>
						<option value="">Elige una opción</option>
						<option value="PRIVADO">PRIVADO</option>
						<option value="GOBIERNO">GOBIERNO</option>
		        	</select>
				</div>
			</div>
			<div class='col-md-3'>     
				<div class="form-group has-info">
					<span class="badge badge-warning" ng-show="goCats">*</span>
					<span class="badge badge-warning" ng-show="formCotizacion.tipo_moneda.$error.required">*</span>
					<label class="control-label"><i class="material-icons">attach_money</i>Tipo moneda</label>
						{!! Form::select('tipo_moneda',[''=>'Elige tipo moneda','USD'=>'DOLARES (USD)','MXN'=>'PESOS (MXN)','EUR'=>'EUROS (EUR)','JPY'=>'YENES (JPY)'],'',['class'=>'form-control','ng-model'=>'cotizacion.tipo_moneda','ng-click'=>'moneda(cotizacion.tipo_moneda);goCats = false','required']) !!}
				</div>
			</div>
		</div>
	</div>
</div>   
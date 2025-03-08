<div class="panel panel-default"><!-- ------------------------------------------ BARRA DE RELOJ INICIO -->
     	<div class="panel-heading"> <label class="text-info">Cotización:</label> <span class="badge"> <%numero_cotizacion %> </span> <label class="text-info">Versión: <span class="badge"><%cotizacion.version%></span></label>	   <span class="badge badge-warning" ng-show="goCats">CAMPOS OBLIGATORIOS</span> <span class="badge badge-warning" ng-show="goCats">*</span></div>
		<div class="panel-body panel-info" ng-init="objeto.nombre_empleado='{{Auth::user()->name}}';iniciales_autor='{{Auth::user()->iniciales}}';objeto.lugar_centro_costo='{{Auth::user()->lugar_centro_costo}}';objeto.departamento='{{Auth::user()->departamento}}';objeto.area='{{Auth::user()->area}}';objeto.centro_costo='{{Auth::user()->centro_costo}}';tipo_usuario='{{Auth::user()->tipo_usuario}}';email='{{Auth::user()->email}}'">
			<div class="row">
				<div class='col-md-3'>       
					<div class="form-group has-info">
						<label class="control-label"><i class="material-icons">event</i>Fecha cotización</label>
						<div class='input-group date'>			
							{!! Form::text('fecha',null,array('class'=>'form-control','ng-model'=>'objeto.fecha')) !!}
						</div>
					</div>
				</div>
				<div class='col-md-3'>     
					<div class="form-group has-info">
						<span class="badge badge-warning" ng-show="formC_CCV.tipo_cliente.$error.required">*</span>
						<label class="control-label"><i class="material-icons">face</i>Tipo cliente</label>
							<select name="tipo_cliente" ng-model="objeto.tipo_cliente" class="form-control" required>
								<option value="">Elige una opción</option>
								<option value="PRIVADO">PRIVADO</option>
								<option value="GOBIERNO">GOBIERNO</option>
		        			</select>
					</div>
				</div>
				<div class='col-md-3'>     
					<div class="form-group has-info">
						<span class="badge badge-warning" ng-show="formC_CCV.tipo_moneda.$error.required">*</span>
						<label class="control-label"><i class="material-icons">attach_money</i>Tipo moneda</label>
							{!! Form::select('tipo_moneda',array(''=>'Elige tipo moneda','USD'=>'DOLARES (USD)','MXN'=>'PESOS (MXN)'),'',array('class'=>'form-control','ng-model'=>'objeto.tipo_moneda','required')) !!}
					</div>
				</div>
				<div class='col-md-3' ng-if="ver_gerente">  
        			<div class="form-group has-info" >
            			<span class="badge badge-warning" ng-show="formCotizacion.usuario.$error.required">*</span>
            			<label class="control-label"><i class="material-icons">people</i>Firma</label>
            			<select name="usuario" ng-model="objeto.usuario" class="form-control" required="" ng-change="getGerente(usuario)">
            			        <option value="ENRIQUE CERVANTES MALFAVON">ENRIQUE CERVANTES MALFAVON</option>
            			        <option value="LIZBETH ORTIZ MAULEON">LIZBETH ORTIZ MAULEON</option>
            			        <!--<option ng-repeat="ger in gerentes" value="<%ger.nombre%>"><%ger.nombre%></option>-->
            			</select>
        			</div>  
    			</div>
			</div><!-- DIV ROW -->
		</div><!-- DIV BODY -->
</div>   
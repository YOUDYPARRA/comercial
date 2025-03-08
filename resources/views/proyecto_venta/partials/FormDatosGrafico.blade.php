	<div class="panel panel-info">
		<div class='panel-heading'>DATOS</div>
		<div class='panel-body'>
			<ul id="nav-tabs-wrapper" class="nav nav-tabs nav-tabs-horizontal navbar-custom">
              <li class="active" style="background-color: #BBBBBB"><a href="#htab1" data-toggle="tab"><i class="material-icons">thumbs_up_down</i>COMPROMISO</a></li>
              <li style="background-color: #AAAAAA"><a href="#htab2" data-toggle="tab"><i class="material-icons">people</i>VENDEDOR </a></li>
              <li style="background-color: #999999"><a href="#htab3" data-toggle="tab"><i class="material-icons">print</i> MODALIDAD </a></li>
            </ul>
            <div class="tab-content" >
              	<div role="tabpanel" class="tab-pane fade in active" id="htab1">
              		<p class="text-warning"> POR COMPROMISO</p>
              		<div class='col-md-2'>       
						<div class="form-group has-info">
							<label class="control-label"><i class="material-icons">event_available</i>AÑO</label>
							<select name="anio" ng-model="anio" class="form-control">
            		        	<option value="*">Elige una opción</option>
            		        	<option ng-repeat="obj in anios" value="<%obj.anio%>"><% obj.anio %></option>
        					</select>
						</div>
					</div>
							<div class='col-md-2'>       
						<div class="form-group has-info">
					<label class="control-label"><i class="material-icons">person</i>AUTOR</label>
							<select name="autor" ng-model="autor" class="form-control" multiple="true" ng-change="graficar()">
            		        	<option value="*">Elige una opción</option>
            		        	<option ng-repeat="obj in autores | unique :'autor'" value="<%obj.autor%>"><% obj.autor %></option>
        					</select>
						</div>
					</div>
					<div class='col-md-2'>       
						<div class="form-group has-info">
							<label class="control-label"><i class="material-icons">thumbs_up_down</i>COMPROMISO</label>
							<select name="compromiso" ng-model="compromiso" class="form-control" multiple="true" ng-change="graficar()">
            		        	<option value='*'>Elige una opción</option>
            		        	<option value='SI'>SI</option>
            		        	<option value='NO'>NO</option>
        					</select>
						</div>
					</div>
					<div class='col-md-2'>       
						<div class="form-group has-info">
							<label class="control-label"><i class="material-icons">timeline</i>GRAFICAS:</label>
							<select name="grafica" ng-model="grafica" class="form-control" ng-change="tipoGrafica(grafica)">
                    			<option value='BARRA'>BARRAS</option>
                    			<option value='PASTEL'>PASTEL</option>
        					</select>
						</div>
					</div>
              	</div>                                                              <!-- TAB PANEL 1 -->
              	<div role="tabpanel" class="tab-pane fade" id="htab2">
               		<p class="text-warning"> POR VENDEDOR</p>
               		<div class='col-md-2'>       
						<div class="form-group has-info">
							<label class="control-label"><i class="material-icons">event_available</i>AÑO</label>
							<select name="anio" ng-model="anio" class="form-control">
            		        	<option value="*">Elige una opción</option>
            		        	<option ng-repeat="obj in anios" value="<%obj.anio%>"><% obj.anio %></option>
        					</select>
						</div>
					</div>
							<div class='col-md-2'>       
						<div class="form-group has-info">
					<label class="control-label"><i class="material-icons">person</i>AUTOR</label>
							<select name="autor" ng-model="autor" class="form-control" multiple="true" ng-change="graficar()">
            		        	<option value="*">Elige una opción</option>
            		        	<option ng-repeat="obj in autores | unique :'autor'" value="<%obj.autor%>"><% obj.autor %></option>
        					</select>
						</div>
					</div>
					<div class='col-md-2'>       
						<div class="form-group has-info">
							<label class="control-label"><i class="material-icons">thumbs_up_down</i>COMPROMISO</label>
							<select name="compromiso" ng-model="compromiso" class="form-control" multiple="true" ng-change="graficar()">
            		        	<option value='*'>Elige una opción</option>
            		        	<option value='SI'>SI</option>
            		        	<option value='NO'>NO</option>
        					</select>
						</div>
					</div>
					<div class='col-md-2'>       
						<div class="form-group has-info">
							<label class="control-label"><i class="material-icons">assessment</i>PROBABILIDAD</label>
							<select name="probabilidad" ng-model="probabilidad" class="form-control" ng-change="graficar()">
                    			<option value='*'>Elige una opción</option>
                    			<option ng-repeat="obj in probabilidades | unique :'complejidad_servicio' | orderBy:'complejidad_servicio'" value="<%obj.complejidad_servicio%>"><% obj.complejidad_servicio %></option>
        					</select>
						</div>
					</div>
					<div class='col-md-2'>       
						<div class="form-group has-info">
							<label class="control-label"><i class="material-icons">timeline</i>GRAFICAS:</label>
							<select name="grafica" ng-model="grafica" class="form-control" ng-change="tipoGrafica(grafica)">
                    			<option value='BARRA'>BARRAS</option>
                    			<option value='PASTEL'>PASTEL</option>
        					</select>
						</div>
					</div>
              	</div>                                                              <!-- TAB PANEL 2 -->
              	<div role="tabpanel" class="tab-pane fade" id="htab3">
                	<p class="text-warning"> POR MODALIDAD</p>
                	<div class='col-md-2'>       
						<div class="form-group has-info">
							<label class="control-label"><i class="material-icons">event_available</i>AÑO</label>
							<select name="anio" ng-model="anio" class="form-control">
            		        	<option value="*">Elige una opción</option>
            		        	<option ng-repeat="obj in anios" value="<%obj.anio%>"><% obj.anio %></option>
        					</select>
						</div>
					</div>
							<div class='col-md-2'>       
						<div class="form-group has-info">
					<label class="control-label"><i class="material-icons">person</i>AUTOR</label>
							<select name="autor" ng-model="autor" class="form-control" multiple="true" ng-change="graficar()">
            		        	<option value="*">Elige una opción</option>
            		        	<option ng-repeat="obj in autores | unique :'autor'" value="<%obj.autor%>"><% obj.autor %></option>
        					</select>
						</div>
					</div>
					<div class='col-md-2'>       
						<div class="form-group has-info">
							<label class="control-label"><i class="material-icons">thumbs_up_down</i>COMPROMISO</label>
							<select name="compromiso" ng-model="compromiso" class="form-control" multiple="true" ng-change="graficar()">
            		        	<option value='*'>Elige una opción</option>
            		        	<option value='SI'>SI</option>
            		        	<option value='NO'>NO</option>
        					</select>
						</div>
					</div>
					<div class='col-md-2'>       
						<div class="form-group has-info">
							<label class="control-label"><i class="material-icons">assessment</i>PROBABILIDAD</label>
							<select name="probabilidad" ng-model="probabilidad" class="form-control" ng-change="graficar()">
                    			<option value='*'>Elige una opción</option>
                    			<option ng-repeat="obj in probabilidades | unique :'complejidad_servicio' | orderBy:'complejidad_servicio'" value="<%obj.complejidad_servicio%>"><% obj.complejidad_servicio %></option>
        					</select>
						</div>
					</div>
					<div class='col-md-2'>       
						<div class="form-group has-info">
							<label class="control-label"><i class="material-icons">important_devices</i>MODALIDAD</label>
							<select name="modalidad" ng-model="modalidad" class="form-control" ng-change="graficar()">
                    			<option value='*'>Elige una opción</option>
								<option ng-repeat="obj in modalidades | unique :'equipo' | orderBy:'equipo'" value="<%obj.equipo%>"><% obj.equipo %></option>
        					</select>
						</div>
					</div>
					<div class='col-md-2'>       
						<div class="form-group has-info">
							<label class="control-label"><i class="material-icons">timeline</i>GRAFICAS:</label>
							<select name="grafica" ng-model="grafica" class="form-control" ng-change="tipoGrafica(grafica)">
                    			<option value='BARRA'>BARRAS</option>
                    			<option value='PASTEL'>PASTEL</option>
        					</select>
						</div>
					</div>
              	</div>                                                              <!-- TAB PANEL 3 -->
            </div >
		</div>
		<div class="panel-footer"> 
		</div>
	</div>
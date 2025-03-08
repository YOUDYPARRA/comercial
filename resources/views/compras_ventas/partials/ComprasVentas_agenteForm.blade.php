<div class="panel panel-info" ng-if="verAgenteAduanal"> 
    <div class="panel-heading"><i class="material-icons">note_add</i> DATOS ADUANALES/ENVIO</div>
    <div class="panel-body"> 
        <fieldset ng-disabled="esc_p5">
            <div class="row" >
                <div class='col-md-6'> 
                    <div class="form-group has-info">
                        <span class="badge badge-warning" ng-show="formCompra.nombre_agentes_aduanales.$error.required">*</span>
                        <span class="badge badge-warning" ng-show="formSolicitud.nombre_agentes_aduanales.$error.required">*</span>
                        <label class='control-label'><i class='material-icons'>check</i>SELECCIONES A DONDE SE ENVIA EL PEDIDO</label>
                        <select name="send_to" ng-model="compra_venta.send_to" class="form-control" ng-change="set_send_to(compra_venta.send_to)">
                            <option value="A">AGENTE</option>
                            <option value="C">CLIENTE</option>
                        </select>
                    </div>
                </div>
                <div class='col-md-6'> 
                    <div class="form-group has-info">
                    {!! Form::text('hidden',null,array('class'=>'form-control','readonly'=>'readonly')) !!}
                    </div>
                </div>
            </div>
            <div class="row" >
                <div class='col-md-6'> 
                 <div class="form-group has-info">
                    <span class="badge badge-warning" ng-show="formCompra.nombre_agentes_aduanales.$error.required">*</span>
                    <span class="badge badge-warning" ng-show="formSolicitud.nombre_agentes_aduanales.$error.required">*</span>
                    <label class='control-label'><i class='material-icons'>search</i> NOMBRE </label>
                    {!! Form::text('nombre_agentes_aduanales',null,array('class'=>'form-control','ng-model'=>'compra_venta.nombre_agente_aduanal','ng-change'=>'agenteLst(compra_venta.nombre_agente_aduanal)','placeholder'=>'Nombre agente','required'=>'')) !!}
                </div>
            </div>
            <div class='col-md-6'> 
                <div class="form-group has-info">
                    <span class="badge badge-warning" ng-show="formCompra.direccion_agente.$error.required">*</span>
                    <span class="badge badge-warning" ng-show="formSolicitud.direccion_agente.$error.required">*</span>
                    <label class='control-label'><i class='material-icons'>check</i>Resultados: <span class="badge"><%agentes.length%></span></label>
	               <select name="nombre_agente_aduanal" id="repeaSelect" ng-model="tipo_agente" class="form-control" ng-change="agenteSeleccionado(tipo_agente)">
                            <option value="">Seleccione el agente aduanal:</option>
                            <option ng-repeat="option in agentes" value="<%option.agente_aduanal%>"><%option.agente_aduanal%></option>
            		</select>
                </div>    
            </div>    
            <div class='col-md-6'> 
                <div class="form-group has-info">
                    <span class="badge badge-warning" ng-show="formCompra.direccion_agente.$error.required">*</span>
                    <span class="badge badge-warning" ng-show="formSolicitud.direccion_agente.$error.required">*</span>
                    <label class='control-label'><i class='material-icons'></i> DIRECCION </label>
                    {!! Form::text('direccion_agente',null,array('ng-model'=>'compra_venta.direccion_agente','class'=>'form-control','required'=>'')) !!}
                </div>
            </div>
            <div class='col-md-6'> 
                <div class="form-group has-info">
                    <label class='control-label'><i class='material-icons'></i> TELEFONO </label>
                    {!! Form::text('telefono_agente',null,array('ng-model'=>'compra_venta.telefono_agente','class'=>'form-control')) !!}
                </div>
            </div>
            <div class='col-md-6'>   
                <div class="form-group has-info">
                    <label class='control-label'><i class='material-icons'></i> FAX </label>
                    {!! Form::text('fax_agente',null,array('ng-model'=>'compra_venta.fax_agente','class'=>'form-control')) !!}
                </div>
            </div>
            <div class='col-md-6'>   
                <div class="form-group has-info">
                    <label class='control-label'><i class='material-icons'></i> CORREO </label>
                    {!! Form::text('correo_agente',null,array('ng-model'=>'compra_venta.correo_agente','class'=>'form-control')) !!}
                </div>
            </div>
            </div>
        </fieldset> 
    </div><!-- FIN BODY -->
</div>
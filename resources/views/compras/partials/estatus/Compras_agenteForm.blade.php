<div class="panel panel-info"> 
  <div class="panel-heading"><i class="material-icons">note_add</i> DATOS AGENTE</div>
 <div class="panel-body"> 
<div class="row">
        <div class='col-md-6'> 
  	<div class="form-group has-info">
            <label class='control-label'><i class='material-icons'>search</i> NOMBRE AGENTE</label>
        {!! Form::text('nombre_agentes_aduanales',null,array('class'=>'form-control','ng-model'=>'compra_venta.nombre_agente_aduanal','ng-change'=>'agenteLst(compra_venta.nombre_agente_aduanal)','placeholder'=>'Nombre agente')) !!}
</div>
        </div>
        <div class='col-md-6'> 
        <div class="form-group has-info">
        <label class='control-label'><i class='material-icons'>check</i>Resultados: <span class="badge"><%agentes.length%></span></label>
	        <select name="nombre_agente_aduanal" id="repeaSelect" ng-model="tipo_agente" class="form-control" ng-change="agenteSeleccionado(tipo_agente)">
                    <option value="">Seleccione el agente aduanal:</option>
                    <option ng-repeat="option in agentes" value="<%option.agente_aduanal%>"><%option.agente_aduanal%></option>
    		</select>
    </div>    
    </div>    
</div>    
<div class="row">
        <div class='col-md-6'> 
        <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i> DIRECCION AGENTE</label>
            {!! Form::text('direccion_agente',null,array('ng-model'=>'compra_venta.direccion_agente','class'=>'form-control','readonly'=>'true')) !!}
        </div>
        </div>
        <div class='col-md-6'> 
        
        <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i> TELEFONO AGENTE</label>
            {!! Form::text('telefono_agente',null,array('ng-model'=>'compra_venta.telefono_agente','class'=>'form-control','readonly'=>'true')) !!}
        </div>
        </div>
</div>
<div class="row">
        <div class='col-md-6'>   
        <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i> FAX AGENTE</label>
            {!! Form::text('fax_agente',null,array('ng-model'=>'compra_venta.fax_agente','class'=>'form-control','readonly'=>'true')) !!}
        </div>
        </div>
        <div class='col-md-6'>   
        <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i> CORREO AGENTE</label>
            {!! Form::text('correo_agente',null,array('ng-model'=>'compra_venta.correo_agente','class'=>'form-control','readonly'=>'true')) !!}
        </div>
        </div>
</div>

        
 </div>
 </div>
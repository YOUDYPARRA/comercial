<div class="panel panel-info"> 
  	<div class="panel-heading"><i class="material-icons">note_add</i> DATOS CLIENTE <span class="badge"></span></div>
 	<div class="panel-body"> 
	<div class="row">
		 <div class='col-md-3'>        
        <div class="form-group has-warning">
            <label class='control-label'><i class='material-icons'>lock</i>  FECHA</label>
            {!! Form::text('fecha',null,array('ng-model'=>'fecha','class'=>'form-control','id'=>'fecha_pedido','readonly'=>'true')) !!}
            {!! Form::hidden('nombre_empleado',Auth::user()->name,array('class'=>'form-control')) !!}
            {!! Form::hidden('contacto','<%cotizacion.contacto%>',array('class'=>'form-control','ng-model'=>'cotizacion.contacto')) !!}
            {!! Form::hidden('correo','<%cotizacion.correo%>',array('class'=>'form-control','ng-model'=>'cotizacion.correo')) !!}
            {!! Form::hidden('telefono','<%cotizacion.telefono%>',array('class'=>'form-control','ng-model'=>'cotizacion.telefono')) !!}
            {!! Form::hidden('celular','<%cotizacion.celular%>',array('class'=>'form-control','ng-model'=>'cotizacion.celular')) !!}
            {!! Form::hidden('tipo_moneda','<%cotizacion.tipo_moneda%>',array('class'=>'form-control','ng-model'=>'cotizacion.tipo_moneda')) !!}
            {!! Form::hidden('tipo_cliente','<%cotizacion.tipo_cliente%>',array('class'=>'form-control','ng-model'=>'cotizacion.tipo_cliente')) !!}
            {!! Form::hidden('c_bpartner_id','<%cotizacion.c_bpartner_id%>',array('class'=>'form-control','ng-model'=>'cotizacion.c_bpartner_id')) !!}
            {!! Form::hidden('c_location_id','<%cotizacion.c_location_id%>',array('class'=>'form-control','ng-model'=>'cotizacion.c_location_id')) !!}
            {!! Form::hidden('representante_legal','<%cotizacion.representante_legal%>',array('class'=>'form-control','ng-model'=>'cotizacion.representante_legal')) !!}
            {!! Form::hidden('departamento','<%cotizacion.departamento%>',array('class'=>'form-control','ng-model'=>'cotizacion.departamento')) !!}
            {!! Form::hidden('org_name','<%cotizacion.org_name%>',array('class'=>'form-control','ng-model'=>'cotizacion.org_name')) !!}
            {!! Form::hidden('no_contrato','<%cotizacion.no_contrato%>',array('class'=>'form-control','ng-model'=>'cotizacion.no_contrato')) !!}
        </div>
        </div>
        <div class='col-md-3'>        
        <div class="form-group has-warning">
            <label class='control-label'><i class='material-icons'>lock</i> NUMERO COTIZACION</label>
            {!! Form::text('numero_cotizacion',null,array('ng-model'=>'cotizacion.numero_cotizacion','class'=>'form-control','readonly'=>'true')) !!}
        </div>
        </div>
        <div class='col-md-3'>        
        <div class="form-group has-warning">
            <label class='control-label'><i class='material-icons'>lock</i>NO PEDIDO CLIENTE</label>
            {!! Form::text('no_pedido',null,array('ng-model'=>'cotizacion.no_pedido','class'=>'form-control','readonly'=>'true')) !!}
            
        </div>
        </div>
        <div class='col-md-3'>        
        <div class="form-group has-warning">
            <label class='control-label'><i class='material-icons'>lock</i>  FECHA ENTREGA</label>
            {!! Form::text('fecha_entrega',null,array('ng-model'=>'cotizacion.fecha_entrega','class'=>'form-control','id'=>'fecha_embarque','readonly'=>'true')) !!}
        </div>
        </div>
        

	</div>
	<div class="row">
		<div class='col-md-6'>  
		<div class="form-group has-warning">
            <label class='control-label'><i class='material-icons'>lock</i>  NOMBRE FISCAL</label>
            {!! Form::text('nombre_fiscal',null,array('ng-model'=>'cotizacion.nombre_fiscal','class'=>'form-control','readonly'=>'true')) !!}
		</div>
		</div>
		<div class='col-md-3'>  
		<div class="form-group has-warning">
            <label class='control-label'><i class='material-icons'>lock</i>  RFC</label>
            {!! Form::text('rfc',null,array('ng-model'=>'cotizacion.rfc','class'=>'form-control','readonly'=>'true')) !!}
		</div>
		</div>
		<div class='col-md-3'>  
			<div class="form-group has-warning">
            <label class='control-label'><i class='material-icons'>lock</i>  CALLE FISCAL</label>
            {!! Form::text('calle_fiscal',null,array('ng-model'=>'cotizacion.calle_fiscal','class'=>'form-control','readonly'=>'true')) !!}
        	</div>
		</div>
	</div>

		<div class="row">
		
		<div class='col-md-3'>  
			<div class="form-group has-warning">
            <label class='control-label'><i class='material-icons'>lock</i>  COLONIA FISCAL</label>
            {!! Form::text('colonia_fiscal',null,array('ng-model'=>'cotizacion.colonia_fiscal','class'=>'form-control','readonly'=>'true')) !!}
        	</div>
		</div>
		<div class='col-md-3'>  
			<div class="form-group has-warning">
            <label class='control-label'><i class='material-icons'>lock</i>  CODIGO POSTAL FISCAL</label>
            {!! Form::text('codigo_postal_fiscal',null,array('ng-model'=>'cotizacion.codigo_postal_fiscal','class'=>'form-control','readonly'=>'true')) !!}
        	</div>
		</div>
		<div class='col-md-3'>  
			<div class="form-group has-warning">
            <label class='control-label'><i class='material-icons'>lock</i>  CIUDAD FISCAL</label>
            {!! Form::text('ciudad_fiscal',null,array('ng-model'=>'cotizacion.ciudad_fiscal','class'=>'form-control','readonly'=>'true')) !!}
        	</div>
		</div>
		<div class='col-md-3'>  
			<div class="form-group has-warning">
            <label class='control-label'><i class='material-icons'>lock</i>  ESTADO FISCAL</label>
            {!! Form::text('estado_fiscal',null,array('ng-model'=>'cotizacion.estado_fiscal','class'=>'form-control','readonly'=>'true')) !!}
            {!! Form::hidden('pais_fiscal','<%cotizacion.pais_fiscal%>',array('ng-model'=>'cotizacion.pais_fiscal','class'=>'form-control')) !!}
        	</div>
		</div>
		</div>
		
		<div class="row">
		<div class='col-md-6'>  
			<div class="form-group has-warning">
            <label class='control-label'><i class='material-icons'>lock</i>  SUCURSAL CLIENTE</label>
            {!! Form::text('nombre_cliente',null,array('ng-model'=>'cotizacion.nombre_cliente','class'=>'form-control','readonly'=>'true')) !!}
        	</div>
		</div>
		<div class='col-md-6'>  
			<div class="form-group has-warning">
            <label class='control-label'><i class='material-icons'>lock</i>  CALLE ENTREGA</label>
            {!! Form::text('calle_entrega',null,array('ng-model'=>'cotizacion.calle_entrega','class'=>'form-control','readonly'=>'true')) !!}
        	</div>
		</div>

		</div>

		<div class="row">
		<div class='col-md-3'>  
			<div class="form-group has-warning">
            <label class='control-label'><i class='material-icons'>lock</i>  COLONIA ENTREGA</label>
            {!! Form::text('colonia_entrega',null,array('ng-model'=>'cotizacion.colonia_entrega','class'=>'form-control','readonly'=>'true')) !!}
        	</div>
		</div>
		<div class='col-md-3'>  
			<div class="form-group has-warning">
            <label class='control-label'><i class='material-icons'>lock</i>  CODIGO POSTAL ENTREGA</label>
            {!! Form::text('codigo_postal_entrega',null,array('ng-model'=>'cotizacion.codigo_postal_entrega','class'=>'form-control','readonly'=>'true')) !!}
        	</div>
		</div>
		<div class='col-md-3'>  
			<div class="form-group has-warning">
            <label class='control-label'><i class='material-icons'>lock</i>  CIUDAD ENTREGA</label>
            {!! Form::text('ciudad_entrega',null,array('ng-model'=>'cotizacion.ciudad_entrega','class'=>'form-control','readonly'=>'true')) !!}
        	</div>
		</div>
		<div class='col-md-3'>  
			<div class="form-group has-warning">
            <label class='control-label'><i class='material-icons'>lock</i>  ESTADO ENTREGA</label>
            {!! Form::text('estado_entrega',null,array('ng-model'=>'cotizacion.estado_entrega','class'=>'form-control','readonly'=>'true')) !!}
            {!! Form::hidden('pais_entrega','<%cotizacion.pais_entrega%>',array('ng-model'=>'cotizacion.pais_entrega','class'=>'form-control')) !!}
        	</div>
		</div>
		</div>
		<div class="row">
		<div class='col-md-3'>  
			<div class="form-group has-warning">
            <label class='control-label'><i class='material-icons'>lock</i>  INICIALES AGENTE ASIGNADO</label>
            {!! Form::text('iniciales_asignado',null,array('ng-model'=>'cotizacion.iniciales_asignado','class'=>'form-control')) !!}
        	</div>
		</div>
		<div class='col-md-3'>  
			<div class="form-group has-warning">
            <label class='control-label'><i class='material-icons'>lock</i>  TIPO CAMBIO</label>
            {!! Form::text('tipo_cambio',null,array('ng-model'=>'cotizacion.tipo_cambio','class'=>'form-control','readonly'=>'true')) !!}
        	</div>
		</div>
		<div class='col-md-6'>  
			<div class="form-group has-info">
            <label class='control-label'><i class='material-icons'>edit</i>  CONDICION PAGO</label>
            {!! Form::text('condicion_pago',null,array('ng-model'=>'cotizacion.condicion_pago','class'=>'form-control')) !!}
        	</div>
		</div>
		
		</div>
		<div class="row">
		<div class='col-md-12'>  
			<div class="form-group has-info">
            <label class='control-label'><i class='material-icons'>edit</i>  OBSERVACIONES</label>
            {!! Form::text('nota',null,array('ng-model'=>'nota','class'=>'form-control')) !!}
        	</div>
		</div>
		</div>
		
	</div>
</div>
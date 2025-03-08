<div class="panel panel-info"> 
  <div class="panel-heading"><i class="material-icons">note_add</i> DATOS CLIENTE <span class="badge" ng-show="msg">Cargando ...></span><span class="badge bagde-blue"><%objeto.identificador%></span></div>
    <div class="panel-body"> 
    <fieldset ng-disabled="esc_datosTercero">
    <div class="row">
        <div class='col-md-4'>        
            <div class="form-group has-info">
                <span class="badge badge-warning" ng-show="formOrdenes_servicio.organizacion.$error.required">*</span>
                <span class="badge badge-warning" ng-show="formCustodia.organizacion.$error.required">*</span>
                <span class="badge badge-warning" ng-show="formReporte.organizacion.$error.required">*</span>
                <span class="badge badge-warning" ng-show="formProgramacion.organizacion.$error.required">*</span>
                <span class="badge badge-warning" ng-show="formPrestamo.organizacion.$error.required">*</span>
                <span class="badge badge-warning" ng-show="formC_CCV.organizacion.$error.required">*</span>
                <label class='control-label'><i class='material-icons'></i>ORGANIZACION</label> 
                <select name="organizacion" ng-model="objeto.organizacion" class="form-control" required="">
                    <option value="">Seleccionar:</option>
                    <option value="SMH">SMH</option>
                    <option value="IMS">IMS</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class='col-md-4'>        
            <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formOrdenes_servicio.nombre_fiscal.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formCustodia.nombre_fiscal.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formReporte.nombre_fiscal.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formProgramacion.nombre_fiscal.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formPrestamo.nombre_fiscal.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formC_CCV.nombre_fiscal.$error.required">*</span>
            <label class='control-label'><i class='material-icons'></i> RAZON FISCAL</label> 
        {!! Form::text('nombre_fiscal',null,array('ng-model'=>'objeto.nombre_fiscal','class'=>'form-control','placeholder'=>'razon social','required')) !!}
            </div>
        </div>
        <div class='col-md-2'>        
            <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formOrdenes_servicio.rfc.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formCustodia.rfc.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formReporte.rfc.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formProgramacion.rfc.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formPrestamo.rfc.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formC_CCV.rfc.$error.required">*</span>
            <label class='control-label'><i class='material-icons'></i> RFC</label>
        {!! Form::text('rfc',null,array('ng-model'=>'objeto.rfc','class'=>'form-control','placeholder'=>'rfc','required')) !!}
            </div>
        </div>
        <div class='col-md-4'>        
            <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formOrdenes_servicio.calle_fiscal.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formCustodia.calle_fiscal.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formReporte.calle_fiscal.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formProgramacion.calle_fiscal.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formPrestamo.calle_fiscal.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formC_CCV.calle_fiscal.$error.required">*</span>
            <label class='control-label'><i class='material-icons'></i>DIRECCION</label>
        {!! Form::text('calle_fiscal',null,array('ng-model'=>'objeto.calle_fiscal','class'=>'form-control','placeholder'=>'calle','required')) !!}
            </div>
        </div>
        <div class='col-md-2'>        
            <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formOrdenes_servicio.c_p_fiscal.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formCustodia.c_p_fiscal.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formReporte.c_p_fiscal.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formProgramacion.c_p_fiscal.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formPrestamo.c_p_fiscal.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formC_CCV.c_p_fiscal.$error.required">*</span>
            <label class='control-label'><i class='material-icons'></i>CP.</label>
        {!! Form::text('c_p_fiscal',null,array('ng-model'=>'objeto.c_p_fiscal','class'=>'form-control','placeholder'=>'c.p.','required')) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class='col-md-3'>        
            <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formOrdenes_servicio.colonia_fiscal.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formCustodia.colonia_fiscal.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formReporte.colonia_fiscal.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formProgramacion.colonia_fiscal.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formPrestamo.colonia_fiscal.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formC_CCV.colonia_fiscal.$error.required">*</span>
            <label class='control-label'><i class='material-icons'></i> COLONIA</label>
        {!! Form::text('colonia_fiscal',null,array('ng-model'=>'objeto.colonia_fiscal','class'=>'form-control','placeholder'=>'colonia','required')) !!}
            </div>
        </div>
        <div class='col-md-3'>        
            <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formOrdenes_servicio.ciudad_fiscal.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formCustodia.ciudad_fiscal.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formReporte.ciudad_fiscal.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formProgramacion.ciudad_fiscal.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formPrestamo.ciudad_fiscal.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formC_CCV.ciudad_fiscal.$error.required">*</span>
            <label class='control-label'><i class='material-icons'></i> CIUDAD</label>
        {!! Form::text('ciudad_fiscal',null,array('ng-model'=>'objeto.ciudad_fiscal','class'=>'form-control','placeholder'=>'ciudad','required')) !!}
            </div>
        </div>
        <div class='col-md-3'>        
            <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formOrdenes_servicio.estado_fiscal.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formCustodia.estado_fiscal.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formReporte.estado_fiscal.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formProgramacion.estado_fiscal.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formPrestamo.estado_fiscal.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formC_CCV.estado_fiscal.$error.required">*</span>
            <label class='control-label'><i class='material-icons'></i> ESTADO</label>
        {!! Form::text('estado_fiscal',null,array('ng-model'=>'objeto.estado_fiscal','class'=>'form-control','placeholder'=>'estado','required')) !!}
            </div>
        </div>
        <div class='col-md-3'>        
            <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formOrdenes_servicio.pais_fiscal.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formCustodia.pais_fiscal.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formReporte.pais_fiscal.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formProgramacion.pais_fiscal.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formPrestamo.pais_fiscal.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formC_CCV.pais_fiscal.$error.required">*</span>
            <label class='control-label'><i class='material-icons'></i> PAIS</label>
        {!! Form::text('pais_fiscal',null,array('ng-model'=>'objeto.pais_fiscal','class'=>'form-control','placeholder'=>'pais','required')) !!}
            </div>
        </div>
    </div>
    <hr style="border: 1px solid #00F"/>
    <div class="row">
        <div class='col-md-6'>        
            <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formOrdenes_servicio.nombre_cliente.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formCustodia.nombre_cliente.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formReporte.nombre_cliente.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formProgramacion.nombre_cliente.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formPrestamo.nombre_cliente.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formC_CCV.nombre_cliente.$error.required">*</span>
            <label class='control-label'><i class='material-icons'></i>ENTREGA / SERVICIO</label>
            {!! Form::text('nombre_cliente',null,array('ng-model'=>'objeto.nombre_cliente','class'=>'form-control','placeholder'=>'COMERCIAL','required')) !!}
            </div>
        </div>
        <div class='col-md-4'>        
            <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formOrdenes_servicio.calle.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formCustodia.calle.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formReporte.calle.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formProgramacion.calle.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formPrestamo.calle.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formC_CCV.calle.$error.required">*</span>
            <label class='control-label'><i class='material-icons'></i> DIRECCION</label>
        {!! Form::text('calle',null,array('ng-model'=>'objeto.calle','class'=>'form-control','placeholder'=>'calle','required')) !!}
            </div>
        </div>
        <div class='col-md-2'>        
            <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formOrdenes_servicio.c_p.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formCustodia.c_p.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formReporte.c_p.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formProgramacion.c_p.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formPrestamo.c_p.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formC_CCV.c_p.$error.required">*</span>
            <label class='control-label'><i class='material-icons'></i>CP.</label>
        {!! Form::text('c_p',null,array('ng-model'=>'objeto.c_p','class'=>'form-control','placeholder'=>'c.p.','required')) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class='col-md-3'>        
            <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formOrdenes_servicio.colonia.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formCustodia.colonia.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formReporte.colonia.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formProgramacion.colonia.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formPrestamo.colonia.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formC_CCV.colonia.$error.required">*</span>
            <label class='control-label'><i class='material-icons'></i>COLONIA</label>
        {!! Form::text('colonia',null,array('ng-model'=>'objeto.colonia','class'=>'form-control','placeholder'=>'colonia','required')) !!}
            </div>
        </div>
        <div class='col-md-3'>        
            <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formOrdenes_servicio.ciudad.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formCustodia.ciudad.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formReporte.ciudad.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formProgramacion.ciudad.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formPrestamo.ciudad.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formC_CCV.ciudad.$error.required">*</span>
            <label class='control-label'><i class='material-icons'></i> CIUDAD</label>
        {!! Form::text('ciudad',null,array('ng-model'=>'objeto.ciudad','class'=>'form-control','placeholder'=>'ciudad','required')) !!}
            </div>
        </div>
        <div class='col-md-3'>        
            <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formOrdenes_servicio.estado.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formCustodia.estado.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formReporte.estado.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formProgramacion.estado.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formPrestamo.estado.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formC_CCV.estado.$error.required">*</span>
            <label class='control-label'><i class='material-icons'></i> ESTADO</label>
        {!! Form::text('estado',null,array('ng-model'=>'objeto.estado','class'=>'form-control','placeholder'=>'estado','required')) !!}
            </div>
        </div>
        <div class='col-md-3'>        
            <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formOrdenes_servicio.pais.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formCustodia.pais.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formReporte.pais.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formProgramacion.pais.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formPrestamo.pais.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formC_CCV.pais.$error.required">*</span>
            <label class='control-label'><i class='material-icons'></i> PAIS</label>
        {!! Form::text('pais',null,array('ng-model'=>'objeto.pais','class'=>'form-control','placeholder'=>'pais','required')) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class='col-md-3'>        
            <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formOrdenes_servicio.telefonos.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formCustodia.telefonos.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formReporte.telefonos.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formC_CCV.telefonos.$error.required">*</span>
            <label class='control-label'><i class='material-icons'></i> TELEFONO</label>
        {!! Form::text('telefonos',null,array('ng-model'=>'objeto.telefonos','class'=>'form-control','placeholder'=>'telefonos','required')) !!}
            </div>
        </div>
        <div class='col-md-3'>        
            <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formReporte.celular.$error.required">*</span><label class='control-label'><i class='material-icons'></i> CELULAR</label>
        {!! Form::text('celular',null,array('ng-model'=>'objeto.celular','class'=>'form-control','placeholder'=>'celular')) !!}
            </div>
        </div>
        <div class='col-md-3'>        
            <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formReporte.correos.$error.required">*</span><label class='control-label'><i class='material-icons'></i>CORREO</label>
        {!! Form::text('correos',null,array('ng-model'=>'objeto.correos','class'=>'form-control','placeholder'=>'Correo electronico')) !!}
            </div>
        </div>
        <div class='col-md-3'>        
            <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formReporte.fax.$error.required">*</span><label class='control-label'><i class='material-icons'></i>FAX</label>
        {!! Form::text('fax',null,array('ng-model'=>'objeto.fax','class'=>'form-control','placeholder'=>'fax')) !!}
            </div>
        </div>
    </div>


</fieldset>
</div>
</div>
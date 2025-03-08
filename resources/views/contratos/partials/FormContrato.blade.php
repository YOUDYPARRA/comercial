<div class="panel panel-info"> 
  <div class="panel-heading"><i class="material-icons">note_add</i> DATOS CONTRATO SERVICIO <span class="badge" ng-show="msg">Cargando ...</span></div>
    <div class="panel-body"> 
    <fieldset ng-disabled="esc_datosEquipo">
    <div class="row">
        <div class='col-md-3'>        
            <div class="form-group has-info">
                <span class="badge badge-warning" ng-show="formContratos.definiciones.$error.required">*</span>
                <label class='control-label'>TIPO DE PERSONA</label>
                <select name="definiciones" ng-model="objeto.definiciones" ng-options="tipoPersona.nombre as tipoPersona.nombre for tipoPersona in tipos_persona" class="form-control" required>
                <!--<select name="definiciones" ng-model="objeto.definiciones" ng-options="tipoPersona.nombre as tipoPersona.nombre for tipoPersona in tipos_persona" class="form-control" ng-change="tipo_persona(objeto.definiciones)" required>-->
                           <option value="">Elegir. . .</option>
                </select> 
            </div>
        </div>
        <div class='col-md-3'>        
            <div class="form-group has-info">
                <span class="badge badge-warning" ng-show="formContratos.fecha_contrato.$error.required">*</span>
                <label class='control-label'>FECHA DE CONTRATO</label>
                <md-datepicker ng-model="fecha" md-placeholder="Selecciona la fecha =>" ng-change="selectFecha(fecha)"></md-datepicker>
                {!! Form::hidden('fecha_contrato',null,array('ng-model'=>'objeto.fecha_contrato','class'=>'form-control','placeholder'=>'00-00-0000','ng-pattern'=>'/(0?[1-9]|[12][0-9]|3[01])\-^(0?[1-9]|1[012])\-(199\d)|([2-9]\d{3})$/','required'=>'','ng-blur'=>'validaFecha(objeto.fecha_contrato)')) !!}
                <p class="text-warning"><span ng-show="formContratos.fecha_contrato.$error.pattern">Formato incorrecto, Formato DD-MM-YYYY</span></p>
            </div>
        </div>
        <div class='col-md-3'>        
            <div class="form-group has-info">
                <span class="badge badge-warning" ng-show="formContratos.tipo_contrato.$error.required">*</span>
                <label class='control-label'>TIPO DE CONTRATO</label>
                <select name="tipo_contrato" ng-model="objeto.tipo_contrato" ng-options="tipo_contrato.nombre as tipo_contrato.nombre for tipo_contrato in tipos_contrato" class="form-control" required>
                           <option value="">Elegir. . .</option>
                </select> 
            </div>
        </div>
        <div class='col-md-3'>        
            <div class="form-group has-info">
                <span class="badge badge-warning" ng-show="formContratos.tiempo_contrato.$error.required">*</span>
                <label class='control-label'>DURACION DE CONTRATO</label>
                <select name="tiempo_contrato" ng-model="objeto.tiempo_contrato" class="form-control" required>
                    <option value="">Elige...</option>
                    <option ng-repeat="tiempo in tiempos_contrato" value="<%tiempo.nombre%>"><% tiempo.nombre%> MESES</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class='col-md-3'>        
            <div class="form-group has-info">
                <span class="badge badge-warning" ng-show="formContratos.instituto.$error.required">*</span>
                <label class='control-label'>FOLIO CLIENTE</label>
                {!! Form::text('instituto',null,array('ng-model'=>'objeto.instituto','class'=>'form-control','placeholder'=>'folio')) !!}
            </div>
        </div>
        <div class='col-md-3'>        
            <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formContratos.fecha_inicio_contrato.$error.required">*</span>
            <label class='control-label'>FECHA INICIO CONTRATO</label>
            <md-datepicker ng-model="fec_ini_con" md-placeholder="Selecciona la fecha ==>" ng-change="selectFechaInicioCon(fec_ini_con)"></md-datepicker>
        	{!! Form::hidden('fecha_inicio_contrato',null,array('ng-model'=>'objeto.fecha_inicio_contrato','class'=>'form-control','placeholder'=>'00-00-0000','ng-pattern'=>'/(0?[1-9]|[12][0-9]|3[01])\-^(0?[1-9]|1[012])\-(199\d)|([2-9]\d{3})$/','required','ng-blur'=>'validaFecha(objeto.fecha_inicio_contrato)')) !!}
            <span ng-show="formContratos.fecha_inicio_contrato.$error.pattern">Formato incorrecto, Formato DD-MM-YYYY</span>
            </div>
        </div>
        <div class='col-md-3'>        
            <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formContratos.fecha_fin_contrato.$error.required">*</span>
            <label class='control-label'>FECHA FIN CONTRATO</label>
            <md-datepicker ng-model="fec_fin_con" md-placeholder="Selecciona la fecha ==>" ng-change="selectFechaFinCon(fec_fin_con)"></md-datepicker>
            {!! Form::hidden('fecha_fin_contrato',null,array('ng-model'=>'objeto.fecha_fin_contrato','class'=>'form-control','placeholder'=>'00-00-0000','ng-pattern'=>'/(0?[1-9]|[12][0-9]|3[01])\-^(0?[1-9]|1[012])\-(199\d)|([2-9]\d{3})$/','required','ng-blur'=>'validaFecha(objeto.fecha_fin_contrato)')) !!}
            <span ng-show="formContratos.fecha_fin_contrato.$error.pattern">Formato incorrecto, Formato DD-MM-YYYY</span>
            </div>
        </div>    
        <div class='col-md-3'>        
            <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formContratos.monto_total_contrato.$error.required">*</span>
            <label class='control-label'>MONTO TOTAL DEL CONTRATO</label>
            {!! Form::text('monto_total_contrato',null,array('ng-model'=>'objeto.monto_total_contrato','class'=>'form-control','placeholder'=>'0.00','required','ng-pattern'=>'/^[0-9]+(\.[0-9]{1,2})?$/','title'=>'SOLO NUMEROS')) !!}
            <span ng-show="formContratos.monto_total_contrato.$error.pattern">Formato incorrecto: 0.00</span>
            </div>
        </div>
        <div class='col-md-3'>        
            <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formContratos.monto_pago_inicial.$error.required">*</span>
            <label class='control-label'>MONTO PAGO INICIAL</label>
            {!! Form::text('monto_pago_inicial',null,array('ng-model'=>'objeto.monto_pago_inicial','class'=>'form-control','placeholder'=>'0.00','required','ng-pattern'=>'/^[0-9]+(\.[0-9]{1,2})?$/','title'=>'SOLO NUMEROS')) !!}
            <span ng-show="formContratos.monto_pago_inicial.$error.pattern">Formato incorrecto: 0.00</span>
            </div>
        </div>
        <div class='col-md-3'>        
            <div class="form-group has-info">
                <span class="badge badge-warning" ng-show="formContratos.moneda.$error.required">*</span>
                <label class='control-label'>MONEDA</label>
                <select name="moneda" ng-model="objeto.moneda" class="form-control" required>
                    <option value="">Elige...</option>
                    <option value="MXN">MXN</option>
                    <option value="USD">USD</option>
                </select>
            </div>
        </div>
        <div class='col-md-3'>        
            <div class="form-group has-info">
                <span class="badge badge-warning" ng-show="formContratos.fecha_pago_inicial.$error.required">*</span>
                <label class='control-label'>FECHA PAGO INICIAL</label>
                <md-datepicker ng-model="fec_pag_ini" md-placeholder="Selecciona la fecha ==>" ng-change="selectFechaPagIni(fec_pag_ini)"></md-datepicker>
                {!! Form::hidden('fecha_pago_inicial',null,array('ng-model'=>'objeto.fecha_pago_inicial','class'=>'form-control','placeholder'=>'00-00-0000','required','ng-pattern'=>'/(0?[1-9]|[12][0-9]|3[01])\-^(0?[1-9]|1[012])\-(199\d)|([2-9]\d{3})$/','ng-blur'=>'validaFecha(objeto.fecha_pago_inicial)')) !!}
                <span ng-show="formContratos.fecha_pago_inicial.$error.pattern">Formato incorrecto, Formato DD-MM-YYYY</span>
            </div>
        </div> 
        <div class='col-md-3'>
            <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formContratos.numeros_pagos.$error.required">*</span>
                <label class='control-label'>NÚMERO DE PAGOS</label>
                {!! Form::text('numeros_pagos',null,array('ng-model'=>'objeto.numeros_pagos','class'=>'form-control','placeholder'=>'Pe.: 1','required','ng-pattern'=>'/^[1-9]+[0-9]*$/','title'=>'SOLO NUMEROS')) !!}
                <span ng-show="formContratos.numeros_pagos.$error.pattern">Formato incorrecto: 1-N</span>
            </div>
        </div>
        <div class='col-md-3'>        
            <div class="form-group has-info">
                <span class="badge badge-warning" ng-show="formContratos.modalidad_pagos.$error.required">*</span>
                <label class='control-label'>MODALIDAD DE PAGOS</label>
                <select name="modalidad_pagos" ng-model="objeto.modalidad_pagos" class="form-control" required>
                    <option value="">Elige...</option>
                    <option value="0">UNA EXHIBICION</option>
                    <option ng-repeat="modalidad in modalidad_pagos" value="<%modalidad.nombre%>">CADA <% modalidad.nombre%> MES (ES)</option>
                </select>
            </div>
        </div>
        <div class='col-md-3'>        
            <div class="form-group has-info">
                <span class="badge badge-warning" ng-show="formContratos.dia_final_pago.$error.required">*</span>
                <label class='control-label'>DIA ULTIMO DE PAGO</label>
                    {!! Form::text('dia_final_pago',null,array('ng-model'=>'objeto.dia_final_pago','class'=>'form-control','placeholder'=>'Pe. 2','ng-pattern'=>'/^[1-9]+[0-9]*$/','title'=>'SOLO NUMEROS')) !!}
                <span ng-show="formContratos.dia_final_pago.$error.pattern">Formato incorrecto: 1-31</span>
            </div>
        </div>    
        <div class='col-md-3'>
            <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formContratos.limite_atencion.$error.required">*</span>
                <label class='control-label'><i class='material-icons'></i>NÚMERO DÍAS PARA ATENDER</label>
                {!! Form::text('limite_atencion',null,array('ng-model'=>'objeto.limite_atencion','class'=>'form-control','required','ng-pattern'=>'/^[1-9]+[0-9]*$/','title'=>'SOLO NUMEROS')) !!}
                <span ng-show="formContratos.limite_atencion.$error.pattern">Formato incorrecto: 1-9</span>
            </div>
        </div>
        <div class='col-md-3'>        
            <div class="form-group has-info">
                <span class="badge badge-warning" ng-show="formContratos.fecha_inicio_garantia.$error.required">*</span>
                <label class='control-label'>FECHA GARANTIA INICIO</label>
                <md-datepicker ng-model="fec_ini_gar" md-placeholder="Selecciona la fecha ==>" ng-change="selectFechaIniGar(fec_ini_gar)"></md-datepicker>
                {!! Form::hidden('fecha_inicio_garantia',null,array('ng-model'=>'objeto.fecha_inicio_garantia','class'=>'form-control','placeholder'=>'00-00-0000','ng-pattern'=>'/(0?[1-9]|[12][0-9]|3[01])\-^(0?[1-9]|1[012])\-(199\d)|([2-9]\d{3})$/','ng-blur'=>'validaFecha(objeto.fecha_inicio_garantia)')) !!}
                <span ng-show="formContratos.fecha_inicio_garantia.$error.pattern">Formato incorrecto, Formato DD-MM-YYYY</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class='col-md-3'>
            <div class="form-group has-info">
                <span class="badge badge-warning" ng-show="formContratos.fecha_fin_garantia.$error.required">*</span>
                <label class='control-label'>FECHA GARANTIA FIN</label>
                <md-datepicker ng-model="fec_fin_gar" md-placeholder="Selecciona la fecha ==>" ng-change="selectFechaFinGar(fec_fin_gar)"></md-datepicker>
                {!! Form::hidden('fecha_fin_garantia',null,array('ng-model'=>'objeto.fecha_fin_garantia','class'=>'form-control','placeholder'=>'00-00-0000','ng-pattern'=>'/(0?[1-9]|[12][0-9]|3[01])\-^(0?[1-9]|1[012])\-(199\d)|([2-9]\d{3})$/','ng-blur'=>'validaFecha(objeto.fecha_fin_garantia)')) !!}
                <span ng-show="formContratos.fecha_fin_garantia.$error.pattern">Formato incorrecto, Formato DD-MM-YYYY</span>
            </div>            
        </div>
        <div class='col-md-3'>        
            <div class="form-group has-info">
                <span class="badge badge-warning" ng-show="formContratos.interes_moratorio_cliente.$error.required">*</span>
                <label class='control-label'>% DE INTERES MORATORIO</label>
                {!! Form::text('interes_moratorio_cliente',null,array('ng-model'=>'objeto.interes_moratorio_cliente','class'=>'form-control','placeholder'=>'% INTERES MORATORIO ','required')) !!}
            </div>
        </div> 
        <div class='col-md-3'>        
            <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formContratos.descuento_incumplimiento_smh.$error.required">*</span>
            <label class='control-label'>% DESCUENTO A SMH POR INCUMPLIMIENTO</label>
            {!! Form::text('descuento_incumplimiento_smh',null,array('ng-model'=>'objeto.descuento_incumplimiento_smh','class'=>'form-control','placeholder'=>'% DESCUENTO','required')) !!}
            </div>
        </div>  
        <div class='col-md-3'>        
            <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formContratos.monto_nueva_ubicacion.$error.required">*</span>
            <label class='control-label'>MONTO POR CAMBIO DE UBICACION CLIENTE</label>
            {!! Form::text('monto_nueva_ubicacion',null,array('ng-model'=>'objeto.monto_nueva_ubicacion','class'=>'form-control','placeholder'=>'MONTO','required')) !!}
            </div>
        </div>
        <div class='col-md-3'>        
            <div class="form-group has-info">
                <span class="badge badge-warning" ng-show="formContratos.interes_moratorio_cliente.$error.required">*</span>
                <label class='control-label'>NO DE HOJAS</label>
                {!! Form::text('clausula_primera',null,array('ng-model'=>'objeto.clausula_primera','class'=>'form-control','placeholder'=>'SOLO NUMEROS ')) !!}
            </div>
        </div>
        <div class='col-md-3' ng-if="recepcion">        
            <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formContratos.folio_contrato.$error.required">*</span>
                <label class='control-label'>FOLIO INTERNO </label>
                {!! Form::text('folio_contrato',null,array('ng-model'=>'objeto.folio_contrato','class'=>'form-control','placeholder'=>'folio contrato','required')) !!}
            </div>
        </div>   
        <!--<div class='col-md-3'>
            <div class="form-group has-info">
            <label class='control-label'>TIPO DE CAMBIO</label>
            {!! Form::text('tipo_cambio',null,array('ng-model'=>'objeto.tipo_cambio','class'=>'form-control','placeholder'=>'0.00',)) !!}
            </div>            
        </div>-->
    </div>
    
    </div>
</div>